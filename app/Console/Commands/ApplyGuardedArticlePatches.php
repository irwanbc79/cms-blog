<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Site;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RuntimeException;

class ApplyGuardedArticlePatches extends Command
{
    protected $signature = 'articles:apply-guarded-patches
        {manifest : Manifest filename under database/article-patches}
        {--dry-run : Validate without changing any article}
        {--allow-published : Explicitly allow patches whose manifest also permits published articles}';

    protected $description = 'Apply checksum-bound article text or metadata patches without auto-approval';

    public function handle(): int
    {
        try {
            $manifest = $this->loadManifest((string) $this->argument('manifest'));
            $site = Site::query()->where('domain', $manifest['site_domain'])->firstOrFail();
            $patches = collect($manifest['articles'])->map(
                fn (array $patch): array => $this->preparePatch($site, $manifest, $patch)
            );

            if ($patches->isEmpty() || $patches->pluck('article.id')->duplicates()->isNotEmpty()) {
                throw new RuntimeException('Manifest must contain unique article patches.');
            }

            $this->table(
                ['Article', 'Status', 'Replacements', 'Old words', 'New words'],
                $patches->map(fn (array $patch): array => [
                    $patch['article']->id,
                    $patch['article']->status,
                    $patch['replacement_count'],
                    $patch['article']->word_count,
                    $patch['word_count'],
                ])->all()
            );

            if ($this->option('dry-run')) {
                $this->info('Patch manifest valid. No database changes were made.');

                return self::SUCCESS;
            }

            DB::transaction(function () use ($patches, $manifest): void {
                $patches->each(function (array $patch) use ($manifest): void {
                    $patch['article']->forceFill(array_merge($patch['changes'], [
                        'content_html' => $patch['content_html'],
                        'word_count' => $patch['word_count'],
                        'estimated_read_time' => max(1, (int) ceil($patch['word_count'] / 220)),
                        'editorial_status' => Article::EDITORIAL_NEEDS_REVISION,
                        'editorial_reviewer_id' => null,
                        'editorial_reviewed_at' => null,
                        'editorial_review_notes' => (string) ($manifest['review_notes'] ?? 'Guarded claim remediation; awaiting human editorial re-review.'),
                    ]))->save();
                });
            });

            $this->info('Guarded patches applied. Published articles remain published and require editorial re-review.');

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

        $path = database_path('article-patches/'.$filename);
        if (! File::isFile($path)) {
            throw new RuntimeException("Patch manifest not found: {$filename}");
        }

        $manifest = require $path;
        if (! is_array($manifest)) {
            throw new RuntimeException('Patch manifest must return an array.');
        }

        foreach (['site_domain', 'articles'] as $key) {
            if (! array_key_exists($key, $manifest)) {
                throw new RuntimeException("Patch manifest is missing required key: {$key}");
            }
        }

        if (! is_array($manifest['articles'])) {
            throw new RuntimeException('Patch manifest articles must be an array.');
        }

        return $manifest;
    }

    private function preparePatch(Site $site, array $manifest, array $patch): array
    {
        $article = Article::query()
            ->where('site_id', $site->id)
            ->findOrFail((int) ($patch['article_id'] ?? 0));
        $expected = $patch['expected'] ?? [];
        $checks = [
            'title' => (string) $article->title,
            'slug' => (string) $article->slug,
            'status' => (string) $article->status,
            'editorial_status' => (string) $article->editorial_status,
            'content_sha256' => hash('sha256', (string) $article->content_html),
        ];

        foreach ($checks as $key => $actual) {
            if (($expected[$key] ?? null) !== $actual) {
                throw new RuntimeException("Article {$article->id} {$key} changed; patch aborted.");
            }
        }

        if (
            $article->status === 'published'
            && (! $this->option('allow-published') || ($manifest['allow_published'] ?? false) !== true)
        ) {
            throw new RuntimeException('Published articles require manifest allow_published=true and --allow-published.');
        }

        $replacements = $patch['replacements'] ?? [];
        $changes = $patch['changes'] ?? [];
        if (! is_array($replacements) || ! is_array($changes) || ($replacements === [] && $changes === [])) {
            throw new RuntimeException("Article {$article->id} has no text or metadata changes.");
        }

        $allowedChanges = ['title', 'og_title', 'meta_description', 'excerpt', 'focus_keyword'];
        $unsupportedChanges = array_diff(array_keys($changes), $allowedChanges);
        if ($unsupportedChanges !== []) {
            throw new RuntimeException('Unsupported metadata fields: '.implode(', ', $unsupportedChanges));
        }

        foreach ($changes as $field => $value) {
            if (! is_string($value) || trim($value) === '') {
                throw new RuntimeException("Article {$article->id} metadata cannot be blank: {$field}.");
            }
        }

        if (
            isset($changes['title'])
            && Article::query()
                ->where('site_id', $site->id)
                ->where('title', $changes['title'])
                ->whereKeyNot($article->id)
                ->exists()
        ) {
            throw new RuntimeException("Article {$article->id} title already exists on this site.");
        }

        $content = (string) $article->content_html;
        $replacementCount = 0;
        foreach ($replacements as $replacement) {
            $old = (string) ($replacement['old'] ?? '');
            $new = (string) ($replacement['new'] ?? '');
            $expectedOccurrences = (int) ($replacement['expected_occurrences'] ?? 1);

            if ($old === '' || $new === '' || $old === $new || $expectedOccurrences < 1) {
                throw new RuntimeException("Article {$article->id} contains an invalid replacement.");
            }

            $actualOccurrences = substr_count($content, $old);
            if ($actualOccurrences !== $expectedOccurrences) {
                throw new RuntimeException(
                    "Article {$article->id} replacement occurrence changed: expected {$expectedOccurrences}, found {$actualOccurrences}."
                );
            }

            $content = str_replace($old, $new, $content, $applied);
            $replacementCount += $applied;
        }

        $plainText = trim(preg_replace('/\s+/u', ' ', strip_tags($content)));
        $wordCount = str_word_count($plainText);
        if ($wordCount < 1200) {
            throw new RuntimeException("Article {$article->id} would become thin: {$wordCount} words.");
        }

        return [
            'article' => $article,
            'content_html' => $content,
            'word_count' => $wordCount,
            'replacement_count' => $replacementCount,
            'changes' => $changes,
        ];
    }
}
