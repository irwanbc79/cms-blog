<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\UsedImage;
use App\Services\ImageService;
use App\Services\UnsplashService;
use Illuminate\Console\Command;

/**
 * Perbaiki featured image artikel dengan me-refetch pakai logika relevansi + dedup terbaru.
 * Mode:
 *   (default)    : hanya artikel yang gambarnya DUPLIKAT antar-artikel.
 *   --relevance  : hanya artikel bertopik NON-maritim (foto kapal = salah konteks).
 *   --all        : semua artikel.
 * Reversible: URL lama di-backup ke storage/app/image_backups sebelum diubah.
 */
class FixDuplicateImages extends Command
{
    protected $signature = 'articles:fix-duplicate-images
        {--dry-run : Tampilkan rencana tanpa mengubah apa pun}
        {--relevance : Target artikel bertopik non-maritim (kapal salah konteks)}
        {--all : Target semua artikel}
        {--limit=0 : Batasi jumlah artikel (0=semua)}';
    protected $description = 'Re-fetch featured image (duplikat / non-maritim / semua) pakai relevansi + dedup baru';

    public function handle(ImageService $images, UnsplashService $unsplash): int
    {
        $dry   = (bool) $this->option('dry-run');
        $limit = (int) $this->option('limit');
        $mode  = $this->option('all') ? 'all' : ($this->option('relevance') ? 'relevance' : 'duplicates');

        $seeded = $this->seedUsedImages();
        $this->info("Mode: {$mode} | Seed used_images: {$seeded} entri.");

        $all = Article::whereNotNull('featured_image_url')
            ->orderBy('id')
            ->get(['id', 'site_id', 'title', 'focus_keyword', 'featured_image_url']);

        if ($mode === 'duplicates') {
            $groups = [];
            foreach ($all as $a) {
                $groups[strtok($a->featured_image_url, '?')][] = $a;
            }
            $targets = [];
            foreach ($groups as $g) {
                if (count($g) > 1) {
                    array_shift($g);
                    foreach ($g as $a) {
                        $targets[] = $a;
                    }
                }
            }
        } elseif ($mode === 'relevance') {
            $targets = $all->filter(function ($a) use ($unsplash) {
                $q = $unsplash->buildImageQuery($a->focus_keyword ?: $a->title);
                return ! $this->isMaritime($q);   // hanya non-maritim
            })->values()->all();
        } else { // all
            $targets = $all->all();
        }

        usort($targets, fn ($x, $y) => $x->id <=> $y->id);
        if ($limit > 0) {
            $targets = array_slice($targets, 0, $limit);
        }

        if (empty($targets)) {
            $this->info('Tidak ada target. Selesai.');
            return self::SUCCESS;
        }
        $this->info(count($targets) . ' artikel akan di-refetch' . ($dry ? ' (DRY-RUN)' : '') . '.');

        if (! $dry) {
            $backup = collect($targets)->mapWithKeys(fn ($a) => [$a->id => $a->featured_image_url])->all();
            $dir = storage_path('app/image_backups');
            @mkdir($dir, 0775, true);
            $file = $dir . '/featured_' . $mode . '_' . date('Ymd_His') . '.json';
            file_put_contents($file, json_encode($backup, JSON_PRETTY_PRINT));
            $this->info("Backup URL lama: {$file}");
        }

        $changed = 0;
        $picsum  = 0;
        foreach ($targets as $a) {
            $keyword = $a->focus_keyword ?: $a->title;
            $new     = $images->fetchForKeyword($keyword, $a->site_id, $a->title);
            $isPic   = str_contains((string) $new, 'picsum');
            $newSlug = substr(strtok((string) $new, '?'), -26);
            $mark    = $isPic ? 'PIC' : (($new && $new !== $a->featured_image_url) ? 'OK ' : '== ');
            $this->line(sprintf('%s#%-4d [%s] %s', $mark, $a->id, $newSlug, mb_substr($a->title, 0, 44)));

            // Jangan turunkan kualitas: kalau hasil cuma picsum (acak), pertahankan gambar lama.
            if (! $dry && $new && ! $isPic && $new !== $a->featured_image_url) {
                $a->featured_image_url = $new;
                $a->saveQuietly();
                $changed++;
            }
            if ($isPic) {
                $picsum++;
            }
            usleep(250000);
        }

        $this->newLine();
        $this->info($dry
            ? "DRY-RUN selesai. (picsum/tanpa hasil: {$picsum})"
            : "Selesai. {$changed} artikel diperbarui. (dilewati karena hanya picsum: {$picsum})");
        return self::SUCCESS;
    }

    private function isMaritime(string $query): bool
    {
        return (bool) preg_match('/\b(ship|cargo|container|containers|port|freight|maritime|vessel|dock|harbour|harbor|shipping)\b/i', $query);
    }

    private function seedUsedImages(): int
    {
        $n = 0;
        foreach (Article::whereNotNull('featured_image_url')->get(['site_id', 'featured_image_url']) as $a) {
            $key = $this->imageKey($a->featured_image_url);
            if (! $key) {
                continue;
            }
            [$provider, $photoId] = $key;
            UsedImage::firstOrCreate(['site_id' => $a->site_id, 'provider' => $provider, 'photo_id' => $photoId]);
            $n++;
        }
        return $n;
    }

    private function imageKey(string $url): ?array
    {
        $host = (string) parse_url($url, PHP_URL_HOST);
        $path = (string) parse_url(strtok($url, '?'), PHP_URL_PATH);
        if (str_contains($host, 'unsplash')) {
            $slug = ltrim($path, '/');
            return $slug !== '' ? ['unsplash', $slug] : null;
        }
        if (str_contains($host, 'pexels') && preg_match('#/photos/(\d+)#', $path, $m)) {
            return ['pexels', $m[1]];
        }
        return null;
    }
}
