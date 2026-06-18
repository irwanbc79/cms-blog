<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Services\WordPressService;
use Illuminate\Console\Command;

class PublishScheduledArticles extends Command
{
    protected $signature = 'articles:publish-scheduled';
    protected $description = 'Auto-publish articles that are scheduled for now or past, and push to WordPress';

    public function handle(): int
    {
        $articles = Article::with('site')
            ->scheduled()
            ->where('scheduled_at', '<=', now())
            ->get();

        if ($articles->isEmpty()) {
            $this->info('No scheduled articles to publish.');
            return self::SUCCESS;
        }

        $success = 0;
        $failed = 0;

        foreach ($articles as $article) {
            try {
                if ($article->site && $article->site->wp_url) {
                    $wp = new WordPressService($article->site);
                    $result = $wp->publishArticle($article, 'publish');

                    $article->update([
                        'status'       => 'published',
                        'published_at' => $article->scheduled_at,
                        'wp_post_id'   => $result['id'],
                        'wp_post_url'  => $result['link'],
                    ]);
                } else {
                    $article->update([
                        'status'       => 'published',
                        'published_at' => $article->scheduled_at,
                    ]);
                }

                $this->info("✅ Published: {$article->title}");
                $success++;
            } catch (\Throwable $e) {
                $this->error("❌ Failed: {$article->title} — {$e->getMessage()}");
                $failed++;
            }
        }

        $this->newLine();
        $this->info("Done. {$success} published, {$failed} failed.");

        if ($success > 0) {
            $this->info("Running database synchronization...");
            $syncPath = '/home/u301249154/sync_articles.php';
            if (file_exists($syncPath)) {
                ob_start();
                require $syncPath;
                ob_end_clean();
            } else {
                $localSyncPath = base_path('../sync_articles.php');
                if (file_exists($localSyncPath)) {
                    ob_start();
                    require $localSyncPath;
                    ob_end_clean();
                }
            }
        }

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
    }
}
