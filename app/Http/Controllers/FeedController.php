<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\SiteResolver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class FeedController extends Controller
{
    protected SiteResolver $siteResolver;

    public function __construct(SiteResolver $siteResolver)
    {
        $this->siteResolver = $siteResolver;
    }

    /**
     * Generate RSS feed for the current site.
     */
    public function index()
    {
        $site = $this->siteResolver->resolveOrFail();

        $articles = Cache::remember("feed_{$site->slug}", 1800, function () use ($site) {
            return Article::where('site_id', $site->id)
                ->where('status', 'published')
                ->whereNotNull('published_at')
                ->latest('published_at')
                ->take(20)
                ->get();
        });

        $siteName = $site->name;
        $siteUrl = url('/');

        $content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $content .= '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">' . "\n";
        $content .= '  <channel>' . "\n";
        $content .= '    <title>' . e($siteName) . ' Blog</title>' . "\n";
        $content .= '    <link>' . $siteUrl . '/blog</link>' . "\n";
        $content .= '    <description>Blog dan artikel terbaru dari ' . e($siteName) . '</description>' . "\n";
        $content .= '    <language>id</language>' . "\n";
        $content .= '    <atom:link href="' . $siteUrl . '/feed.xml" rel="self" type="application/rss+xml"/>' . "\n";
        $content .= '    <lastBuildDate>' . now()->toAtomString() . '</lastBuildDate>' . "\n";

        foreach ($articles as $article) {
            $description = $article->meta_description
                ?: ($article->excerpt ?: Str::limit(strip_tags($article->content_html), 200));

            $content .= '    <item>' . "\n";
            $content .= '      <title>' . e($article->title) . '</title>' . "\n";
            $content .= '      <link>' . url('/blog/' . $article->slug) . '</link>' . "\n";
            $content .= '      <guid isPermaLink="true">' . url('/blog/' . $article->slug) . '</guid>' . "\n";
            $content .= '      <description>' . e($description) . '</description>' . "\n";

            if ($article->featured_image_url) {
                $content .= '      <enclosure url="' . e($article->featured_image_url) . '" type="image/jpeg"/>' . "\n";
            }

            if ($article->published_at) {
                $content .= '      <pubDate>' . $article->published_at->toAtomString() . '</pubDate>' . "\n";
            }

            // Tags as categories
            if ($article->tags) {
                foreach ($article->tags as $tag) {
                    $content .= '      <category>' . e($tag) . '</category>' . "\n";
                }
            }

            if ($article->pillar) {
                $content .= '      <category>' . e(ucfirst($article->pillar)) . '</category>' . "\n";
            }

            $content .= '    </item>' . "\n";
        }

        $content .= '  </channel>' . "\n";
        $content .= '</rss>';

        return response($content, 200, [
            'Content-Type' => 'application/rss+xml; charset=utf-8',
        ]);
    }
}
