<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RuntimeException;

class ApplyEditorialRevision extends Command
{
    protected $signature = 'articles:apply-editorial-revision
        {revision : Revision filename under database/editorial-revisions}
        {--dry-run : Validate without changing the article}';

    protected $description = 'Apply a versioned editorial rewrite with source-state safety checks';

    public function handle(): int
    {
        try {
            $revision = $this->loadRevision((string) $this->argument('revision'));
            $article = Article::query()->with('site:id,domain')->findOrFail($revision['article_id']);
            $this->validateSourceState($article, $revision);
            $changes = $this->changes($revision);

            $this->table(
                ['Article', 'Domain', 'Status', 'Old words', 'New words', 'New title'],
                [[
                    $article->id,
                    $article->site?->domain,
                    $article->status,
                    $article->word_count,
                    $changes['word_count'],
                    $changes['title'],
                ]]
            );

            if ($this->option('dry-run')) {
                $this->info('Revision valid. No database changes were made.');

                return self::SUCCESS;
            }

            DB::transaction(function () use ($article, $changes): void {
                $article->fill($changes);
                $article->save();
            });

            $this->info('Revision applied. Article remains unpublished and requires editorial approval.');

            return self::SUCCESS;
        } catch (\Throwable $exception) {
            $this->error($exception->getMessage());

            return self::FAILURE;
        }
    }

    private function loadRevision(string $filename): array
    {
        if ($filename !== basename($filename) || ! str_ends_with($filename, '.php')) {
            throw new RuntimeException('Revision must be a PHP filename without a directory path.');
        }

        $path = database_path('editorial-revisions/'.$filename);
        if (! File::isFile($path)) {
            throw new RuntimeException("Revision file not found: {$filename}");
        }

        $revision = require $path;
        if (! is_array($revision)) {
            throw new RuntimeException('Revision file must return an array.');
        }

        foreach (['article_id', 'site_domain', 'expected', 'changes'] as $key) {
            if (! array_key_exists($key, $revision)) {
                throw new RuntimeException("Revision is missing required key: {$key}");
            }
        }

        return $revision;
    }

    private function validateSourceState(Article $article, array $revision): void
    {
        $expected = $revision['expected'];

        if ($article->site?->domain !== $revision['site_domain']) {
            throw new RuntimeException('Site domain mismatch; revision aborted.');
        }

        if ($article->status === 'published') {
            throw new RuntimeException('Published articles cannot be changed by this command.');
        }

        $checks = [
            'title' => (string) $article->title,
            'slug' => (string) $article->slug,
            'status' => (string) $article->status,
            'editorial_status' => (string) $article->editorial_status,
            'content_sha256' => hash('sha256', (string) $article->content_html),
        ];

        foreach ($checks as $key => $actual) {
            if (($expected[$key] ?? null) !== $actual) {
                throw new RuntimeException("Source {$key} changed; revision aborted.");
            }
        }
    }

    private function changes(array $revision): array
    {
        $changes = $revision['changes'];
        $allowed = [
            'title', 'focus_keyword', 'meta_description', 'excerpt', 'content_html',
            'og_title', 'og_description', 'schema_faq', 'tags', 'hashtags',
            'image_alt_texts', 'pillar',
        ];
        $unknown = array_diff(array_keys($changes), $allowed);

        if ($unknown !== []) {
            throw new RuntimeException('Unsupported revision fields: '.implode(', ', $unknown));
        }

        foreach (['title', 'meta_description', 'excerpt', 'content_html'] as $required) {
            if (blank($changes[$required] ?? null)) {
                throw new RuntimeException("Revision field cannot be blank: {$required}");
            }
        }

        $plainText = trim(preg_replace('/\s+/u', ' ', strip_tags((string) $changes['content_html'])));
        $wordCount = str_word_count($plainText);
        if ($wordCount < 1200) {
            throw new RuntimeException("Revision is too thin: {$wordCount} words.");
        }

        $changes['word_count'] = $wordCount;
        $changes['estimated_read_time'] = max(1, (int) ceil($wordCount / 220));
        $changes['editorial_status'] = Article::EDITORIAL_NEEDS_REVISION;
        $changes['editorial_reviewer_id'] = null;
        $changes['editorial_reviewed_at'] = null;
        $changes['editorial_review_notes'] = (string) ($revision['review_notes'] ?? 'Rewritten; awaiting human editorial approval.');

        return $changes;
    }
}
