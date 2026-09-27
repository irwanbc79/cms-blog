<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Site;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RuntimeException;

class ApplyCanonicalConsolidation extends Command
{
    protected $signature = 'articles:apply-canonical-consolidation
        {manifest : Manifest filename under database/canonical-consolidations}
        {--dry-run : Validate without changing any article}';

    protected $description = 'Consolidate duplicate articles into one same-site canonical URL with source-state checks';

    public function handle(): int
    {
        try {
            $manifest = $this->loadManifest((string) $this->argument('manifest'));
            $site = Site::query()->where('domain', $manifest['site_domain'])->firstOrFail();
            $target = $this->articleForSite($site, (int) ($manifest['target']['article_id'] ?? 0));
            $this->validateArticle($target, $manifest['target']['expected'] ?? [], 'Target');

            if ($target->status !== 'published' || filled($target->canonical_url)) {
                throw new RuntimeException('Target must be a published, indexable article.');
            }

            $canonicalUrl = 'https://'.$site->domain.'/blog/'.$target->slug;
            $alternates = collect($manifest['alternates'])->map(function (array $alternate) use ($site, $target) {
                $article = $this->articleForSite($site, (int) ($alternate['article_id'] ?? 0));

                if ($article->is($target)) {
                    throw new RuntimeException('Target cannot also be an alternate.');
                }

                $this->validateArticle($article, $alternate['expected'] ?? [], 'Alternate '.$article->id);

                if ($article->status !== 'published' || filled($article->canonical_url)) {
                    throw new RuntimeException("Alternate {$article->id} must be published and indexable.");
                }

                return $article;
            });

            if ($alternates->isEmpty() || $alternates->pluck('id')->duplicates()->isNotEmpty()) {
                throw new RuntimeException('Manifest must contain unique alternate articles.');
            }

            $this->table(
                ['Article', 'Current slug', 'Canonical target'],
                $alternates->map(fn (Article $article) => [
                    $article->id,
                    $article->slug,
                    $canonicalUrl,
                ])->all()
            );

            if ($this->option('dry-run')) {
                $this->info('Manifest valid. No database changes were made.');

                return self::SUCCESS;
            }

            DB::transaction(function () use ($alternates, $canonicalUrl): void {
                $alternates->each(function (Article $article) use ($canonicalUrl): void {
                    $article->forceFill(['canonical_url' => $canonicalUrl])->save();
                });
            });

            Cache::forget("sitemap_{$site->slug}");
            Cache::forget("feed_{$site->slug}");

            $this->info('Canonical consolidation applied. Article records, statuses, and comments were preserved.');

            return self::SUCCESS;
        } catch (\Throwable $exception) {
            $this->error($exception->getMessage());

            return self::FAILURE;
        }
    }

    private function loadManifest(string $filename): array
    {
        if ($filename !== basename($filename) || ! str_ends_with($filename, '.php')) {
            throw new RuntimeException('Manifest must be a PHP filename without a directory path.');
        }

        $path = database_path('canonical-consolidations/'.$filename);
        if (! File::isFile($path)) {
            throw new RuntimeException("Manifest file not found: {$filename}");
        }

        $manifest = require $path;
        if (! is_array($manifest)) {
            throw new RuntimeException('Manifest file must return an array.');
        }

        foreach (['site_domain', 'target', 'alternates'] as $key) {
            if (! array_key_exists($key, $manifest)) {
                throw new RuntimeException("Manifest is missing required key: {$key}");
            }
        }

        if (! is_array($manifest['target']) || ! is_array($manifest['alternates'])) {
            throw new RuntimeException('Manifest target and alternates must be arrays.');
        }

        return $manifest;
    }

    private function articleForSite(Site $site, int $articleId): Article
    {
        return Article::query()
            ->where('site_id', $site->id)
            ->findOrFail($articleId);
    }

    private function validateArticle(Article $article, array $expected, string $label): void
    {
        $checks = [
            'title' => (string) $article->title,
            'slug' => (string) $article->slug,
            'status' => (string) $article->status,
            'editorial_status' => (string) $article->editorial_status,
            'canonical_url' => trim((string) $article->canonical_url),
            'content_sha256' => hash('sha256', (string) $article->content_html),
        ];

        foreach ($checks as $key => $actual) {
            if (($expected[$key] ?? null) !== $actual) {
                throw new RuntimeException("{$label} {$key} changed; consolidation aborted.");
            }
        }
    }
}
