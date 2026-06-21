<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\WebhookService;

class ArticleObserver
{
    public function creating(Article $article): void
    {
        // Auto-populate featured_image_url if empty
        if (empty($article->featured_image_url)) {
            $keyword = $article->focus_keyword ?: $article->title;
            if ($keyword) {
                try {
                    $unsplash = new \App\Services\UnsplashService();
                    $article->featured_image_url = $unsplash->fetchForKeyword($keyword, $article->title);
                } catch (\Throwable) {
                    // Fail silently, don't crash the article creation
                }
            }
        }
    }

    public function updated(Article $article): void
    {
        // Fire webhook only when status transitions to published
        if ($article->wasChanged('status') && $article->status === 'published') {
            app(WebhookService::class)->pingOnPublish($article);
        }
    }
}
