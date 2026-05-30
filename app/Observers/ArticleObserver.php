<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\WebhookService;

class ArticleObserver
{
    public function updated(Article $article): void
    {
        // Fire webhook only when status transitions to published
        if ($article->wasChanged('status') && $article->status === 'published') {
            app(WebhookService::class)->pingOnPublish($article);
        }
    }
}
