<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class WordPressService
{
    private string $wpUrl;
    private string $authHeader;

    public function __construct()
    {
        $wpUrl    = Setting::get('wp_url', 'https://m2b.co.id');
        $username = Setting::get('wp_username');
        $password = Setting::get('wp_app_password');

        if (! $username || ! $password) {
            throw new \RuntimeException('WordPress credentials not configured in Settings.');
        }

        $this->wpUrl      = rtrim($wpUrl, '/');
        $this->authHeader = 'Basic ' . base64_encode("{$username}:{$password}");
    }

    /**
     * Publish article to WordPress.
     * Returns ['id' => wp_post_id, 'link' => wp_post_url, 'status' => 'publish|draft']
     */
    public function publishArticle(Article $article, string $status = 'draft'): array
    {
        $payload = [
            'title'   => $article->title,
            'content' => $article->content_html,
            'slug'    => $article->slug,
            'status'  => $status,
            'excerpt' => $article->excerpt ?? '',
            'meta'    => [
                '_yoast_wpseo_title'          => $article->og_title ?: $article->title,
                '_yoast_wpseo_metadesc'       => $article->meta_description ?? '',
                '_yoast_wpseo_focuskw'        => $article->focus_keyword ?? '',
                '_yoast_wpseo_opengraph-description' => $article->og_description ?? '',
            ],
        ];

        // Attach featured image if already uploaded
        if ($article->wp_post_id && $article->featured_image_url) {
            $mediaId = $this->uploadFeaturedImage($article->featured_image_url, $article->slug);
            if ($mediaId) {
                $payload['featured_media'] = $mediaId;
            }
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->authHeader,
                'Content-Type'  => 'application/json',
            ])->timeout(30)->post("{$this->wpUrl}/wp-json/wp/v2/posts", $payload);

            if ($response->failed()) {
                throw new \RuntimeException(
                    "WordPress API error {$response->status()}: " . $response->body()
                );
            }

            $data = $response->json();

            return [
                'id'     => $data['id'],
                'link'   => $data['link'],
                'status' => $data['status'],
            ];
        } catch (RequestException $e) {
            throw new \RuntimeException('WordPress API request failed: ' . $e->getMessage());
        }
    }

    /**
     * Upload image from URL to WP Media Library.
     * Returns media ID or null on failure.
     */
    public function uploadFeaturedImage(string $imageUrl, string $slug): ?int
    {
        try {
            // Download image
            $imageResponse = Http::timeout(30)->get($imageUrl);
            if ($imageResponse->failed()) {
                return null;
            }

            $imageData    = $imageResponse->body();
            $contentType  = $imageResponse->header('Content-Type') ?: 'image/jpeg';
            $extension    = $this->extensionFromMime($contentType);
            $filename     = "{$slug}.{$extension}";

            $response = Http::withHeaders([
                'Authorization'       => $this->authHeader,
                'Content-Disposition' => "attachment; filename={$filename}",
                'Content-Type'        => $contentType,
            ])->timeout(30)->withBody($imageData, $contentType)
              ->post("{$this->wpUrl}/wp-json/wp/v2/media");

            if ($response->failed()) {
                return null;
            }

            return $response->json('id');
        } catch (\Throwable) {
            return null;
        }
    }

    private function extensionFromMime(string $mime): string
    {
        return match (true) {
            str_contains($mime, 'png')  => 'png',
            str_contains($mime, 'gif')  => 'gif',
            str_contains($mime, 'webp') => 'webp',
            default                     => 'jpg',
        };
    }
}
