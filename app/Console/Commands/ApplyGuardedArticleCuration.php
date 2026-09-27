<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Site;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RuntimeException;

class ApplyGuardedArticleCuration extends Command
{
    protected $signature = 'articles:apply-curation
        {manifest : Manifest filename under database/article-curations}
        {--dry-run : Validate without changing any article}
        {--allow-published : Explicitly allow curation of published articles}';

    protected $description = 'Move checksum-bound low-value articles to draft without deleting their records';

    public function handle(): int
    {
        try {
            $manifest = $this->loadManifest((string) $this->argument('manifest'));
            $site = Site::query()->where('domain', $manifest['site_domain'])->firstOrFail();
            $articles = collect($manifest['articles'])->map(
                fn (array $entry): Article => $this->prepareArticle($site, $manifest, $entry)
            );

            if ($articles->isEmpty() || $articles->pluck('id')->duplicates()->isNotEmpty()) {
                throw new RuntimeException('Manifest must contain unique article entries.');
            }

            $this->table(
                ['Article', 'Current status', 'Action'],
                $articles->map(fn (Article $article): array => [
                    $article->id,
                    $article->status,
                    'move to draft',
                ])->all()
            );

            if ($this->option('dry-run')) {
                $this->info('Curation manifest valid. No database changes were made.');

                return self::SUCCESS;
            }

            DB::transaction(function () use ($articles, $manifest): void {
                $articles->each(function (Article $article) use ($manifest): void {
                    $article->forceFill([
                        'status' => 'draft',
                        'scheduled_at' => null,
                        'editorial_status' => Article::EDITORIAL_NEEDS_REVISION,
                        'editorial_reviewer_id' => null,
                        'editorial_reviewed_at' => null,
                        'editorial_review_notes' => (string) ($manifest['review_notes']
                            ?? 'Temporarily removed from public index during low-value content remediation.'),
                    ])->save();
                });
            });

            Cache::forget("sitemap_{$site->slug}");
            Cache::forget("feed_{$site->slug}");

            $this->info('Curation applied. Records were preserved as drafts for editorial revision.');

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

        $path = database_path('article-curations/'.$filename);
        if (! File::isFile($path)) {
            throw new RuntimeException("Curation manifest not found: {$filename}");
        }

        $manifest = require $path;
        if (! is_array($manifest)) {
            throw new RuntimeException('Curation manifest must return an array.');
        }

        foreach (['site_domain', 'allow_published', 'articles'] as $key) {
            if (! array_key_exists($key, $manifest)) {
                throw new RuntimeException("Curation manifest is missing required key: {$key}");
            }
        }

        if (! is_array($manifest['articles'])) {
            throw new RuntimeException('Curation manifest articles must be an array.');
        }

        return $manifest;
    }

    private function prepareArticle(Site $site, array $manifest, array $entry): Article
    {
        $article = Article::query()
            ->where('site_id', $site->id)
            ->findOrFail((int) ($entry['article_id'] ?? 0));
        $expected = $entry['expected'] ?? [];
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
                throw new RuntimeException("Article {$article->id} {$key} changed; curation aborted.");
            }
        }

        if (
            $article->status === 'published'
            && (! $this->option('allow-published') || $manifest['allow_published'] !== true)
        ) {
            throw new RuntimeException('Published articles require --allow-published and manifest authorization.');
        }

        if ($article->status !== 'published' || filled($article->canonical_url)) {
            throw new RuntimeException("Article {$article->id} must be a published, indexable article.");
        }

        return $article;
    }
}
