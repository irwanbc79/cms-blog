<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WebhookService
{
    public function pingOnPublish(Article $article): void
    {
        $site = $article->site;

        if (! $site?->webhook_url) {
            return;
        }

        $payload = [
            'event'      => 'article.published',
            'site'       => $site->slug,
            'article_id' => $article->id,
            'slug'       => $article->slug,
            'published_at' => $article->published_at?->toIso8601String(),
        ];

        try {
            Http::timeout(5)->post($site->webhook_url, $payload);
        } catch (\Throwable $e) {
            // Non-fatal — log and continue
            Log::warning("Webhook ping failed for site {$site->slug}: " . $e->getMessage());
        }
    }
}
