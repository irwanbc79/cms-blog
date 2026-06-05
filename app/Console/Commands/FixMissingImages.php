<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Services\UnsplashService;
use Illuminate\Console\Command;

class FixMissingImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:fix-missing-images {--force : Force regenerate images for all articles}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find articles with missing or empty featured_image_url and assign a relevant Unsplash/Picsum image';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $force = $this->option('force');

        $query = Article::query();

        if (!$force) {
            $query->where(function ($q) {
                $q->whereNull('featured_image_url')
                  ->orWhere('featured_image_url', '');
            });
        }

        $articles = $query->get();

        if ($articles->isEmpty()) {
            $this->info('No articles with missing images found.');
            return self::SUCCESS;
        }

        $this->info("Found {$articles->count()} articles to process.");
        $unsplash = new UnsplashService();
        $success = 0;
        $failed = 0;

        foreach ($articles as $article) {
            $keyword = $article->focus_keyword ?: $article->title;
            if (!$keyword) {
                $this->warn("Skipping article ID {$article->id} (no keyword or title).");
                continue;
            }

            try {
                $imageUrl = $unsplash->fetchForKeyword($keyword);
                if ($imageUrl) {
                    $article->update([
                        'featured_image_url' => $imageUrl
                    ]);
                    $this->info("✅ Updated article ID {$article->id}: {$article->title}");
                    $success++;
                } else {
                    $this->error("❌ Could not fetch image for article ID {$article->id}: {$article->title}");
                    $failed++;
                }
            } catch (\Throwable $e) {
                $this->error("❌ Error for article ID {$article->id}: {$e->getMessage()}");
                $failed++;
            }
        }

        $this->info("Done! {$success} updated, {$failed} failed.");

        return self::SUCCESS;
    }
}
