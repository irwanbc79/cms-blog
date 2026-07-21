<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\UsedImage;
use App\Services\ImageService;
use Illuminate\Console\Command;

/**
 * Perbaiki featured image yang DUPLIKAT antar-artikel (satu foto stock dipakai
 * banyak artikel) dengan me-refetch memakai logika relevansi + dedup terbaru.
 * Reversible: URL lama di-backup ke storage/app sebelum diubah.
 */
class FixDuplicateImages extends Command
{
    protected $signature = 'articles:fix-duplicate-images {--dry-run : Tampilkan rencana tanpa mengubah apa pun} {--limit=0 : Batasi jumlah artikel yang diproses (0=semua)}';
    protected $description = 'Re-fetch featured image untuk artikel yang gambarnya duplikat, pakai relevansi + dedup baru';

    public function handle(ImageService $images): int
    {
        $dry   = (bool) $this->option('dry-run');
        $limit = (int) $this->option('limit');

        // 1) Seed used_images dari SEMUA gambar artikel yg ada, supaya re-fetch
        //    menghindari setiap foto yang sedang dipakai (bukan cuma yg di grup ini).
        $seeded = $this->seedUsedImages();
        $this->info("Seed used_images: {$seeded} entri terdaftar.");

        // 2) Kelompokkan artikel per base-URL gambar (abaikan query string).
        $all = Article::whereNotNull('featured_image_url')
            ->orderBy('id')
            ->get(['id', 'site_id', 'title', 'focus_keyword', 'featured_image_url']);

        $groups = [];
        foreach ($all as $a) {
            $base = strtok($a->featured_image_url, '?');
            $groups[$base][] = $a;
        }

        // 3) Target = semua artikel KECUALI yang pertama (id terkecil) di tiap grup duplikat.
        $targets = [];
        foreach ($groups as $g) {
            if (count($g) > 1) {
                array_shift($g);            // sisakan 1 artikel memakai gambar itu
                foreach ($g as $a) {
                    $targets[] = $a;
                }
            }
        }
        usort($targets, fn ($x, $y) => $x->id <=> $y->id);
        if ($limit > 0) {
            $targets = array_slice($targets, 0, $limit);
        }

        if (empty($targets)) {
            $this->info('Tidak ada gambar duplikat. Selesai.');
            return self::SUCCESS;
        }
        $this->info(count($targets) . ' artikel akan di-refetch' . ($dry ? ' (DRY-RUN)' : '') . '.');

        // 4) Backup URL lama (reversible) sebelum perubahan.
        if (! $dry) {
            $backup = collect($targets)->mapWithKeys(fn ($a) => [$a->id => $a->featured_image_url])->all();
            $dir = storage_path('app/image_backups');
            @mkdir($dir, 0775, true);
            $file = $dir . '/featured_' . date('Ymd_His') . '.json';
            file_put_contents($file, json_encode($backup, JSON_PRETTY_PRINT));
            $this->info("Backup URL lama: {$file}");
        }

        // 5) Re-fetch satu per satu.
        $changed = 0;
        foreach ($targets as $a) {
            $keyword = $a->focus_keyword ?: $a->title;
            $new     = $images->fetchForKeyword($keyword, $a->site_id, $a->title);
            $oldSlug = substr(strtok($a->featured_image_url, '?'), -28);
            $newSlug = substr(strtok($new, '?'), -28);
            $mark    = ($new && $new !== $a->featured_image_url) ? 'OK ' : '== ';
            $this->line(sprintf('%s#%-4d [%s] %s', $mark, $a->id, $newSlug, mb_substr($a->title, 0, 46)));

            if (! $dry && $new && $new !== $a->featured_image_url) {
                $a->featured_image_url = $new;
                $a->saveQuietly();      // jangan picu observer/webhook
                $changed++;
            }
            usleep(250000);             // ramah rate-limit API
        }

        $this->newLine();
        $this->info($dry ? 'DRY-RUN selesai (tidak ada yang diubah).' : "Selesai. {$changed} artikel diperbarui.");
        return self::SUCCESS;
    }

    /** Daftarkan setiap gambar artikel yang sedang dipakai ke used_images. */
    private function seedUsedImages(): int
    {
        $n = 0;
        foreach (Article::whereNotNull('featured_image_url')->get(['site_id', 'featured_image_url']) as $a) {
            $key = $this->imageKey($a->featured_image_url);
            if (! $key) {
                continue;
            }
            [$provider, $photoId] = $key;
            UsedImage::firstOrCreate([
                'site_id'  => $a->site_id,
                'provider' => $provider,
                'photo_id' => $photoId,
            ]);
            $n++;
        }
        return $n;
    }

    /** Petakan URL gambar -> [provider, photo_id] sesuai skema Unsplash/Pexels. */
    private function imageKey(string $url): ?array
    {
        $host = (string) parse_url($url, PHP_URL_HOST);
        $path = (string) parse_url(strtok($url, '?'), PHP_URL_PATH);

        if (str_contains($host, 'unsplash')) {
            $slug = ltrim($path, '/');
            return $slug !== '' ? ['unsplash', $slug] : null;
        }
        if (str_contains($host, 'pexels')) {
            if (preg_match('#/photos/(\d+)#', $path, $m)) {
                return ['pexels', $m[1]];
            }
        }
        return null; // picsum/lainnya: tak perlu dedup
    }
}
