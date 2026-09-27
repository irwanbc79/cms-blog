<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\SiteResolver;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    protected SiteResolver $siteResolver;

    public function __construct(SiteResolver $siteResolver)
    {
        $this->siteResolver = $siteResolver;
    }

    /**
     * Generate sitemap.xml for the current site.
     */
    public function index()
    {
        $site = $this->siteResolver->resolveOrFail();

        $articles = Cache::remember("sitemap_{$site->slug}", 3600, function () use ($site) {
            return Article::where('site_id', $site->id)
                ->where('status', 'published')
                ->indexable()
                ->whereNotNull('published_at')
                ->select('slug', 'updated_at', 'published_at', 'pillar')
                ->orderBy('published_at', 'desc')
                ->get();
        });

        $content = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $content .= '<?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?>'."\n";
        $content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

        // Homepage / blog index
        $content .= '  <url>'."\n";
        $content .= '    <loc>'.url('/blog').'</loc>'."\n";
        $content .= '    <lastmod>'.($articles->first()?->updated_at?->toAtomString() ?? now()->toAtomString()).'</lastmod>'."\n";
        $content .= '    <changefreq>daily</changefreq>'."\n";
        $content .= '    <priority>1.0</priority>'."\n";
        $content .= '  </url>'."\n";

        // Legal & editorial trust pages are genuinely per-site, so every blog
        // lists its own.
        $indexablePages = ['about', 'privacy-policy', 'terms-of-service'];

        // Interactive tool pages are served by every portfolio blog but only
        // indexed by their owning domain (config/adsense.php); the others
        // canonicalise across to the owner and stay out of their own sitemap.
        $host = rtrim(url('/'), '/');
        foreach (config('adsense.tool_page_owners', []) as $slug => $owner) {
            if (rtrim($owner, '/') === $host) {
                $indexablePages[] = $slug;
            }
        }

        foreach ($indexablePages as $trustPage) {
            $content .= '  <url>'."\n";
            $content .= '    <loc>'.url('/blog/'.$trustPage).'</loc>'."\n";
            $content .= '    <changefreq>monthly</changefreq>'."\n";
            $content .= '    <priority>0.7</priority>'."\n";
            $content .= '  </url>'."\n";
        }



        // Articles
        foreach ($articles as $article) {
            $content .= '  <url>'."\n";
            $content .= '    <loc>'.url('/blog/'.$article->slug).'</loc>'."\n";
            $content .= '    <lastmod>'.$article->updated_at->toAtomString().'</lastmod>'."\n";
            $content .= '    <changefreq>monthly</changefreq>'."\n";
            $content .= '    <priority>0.6</priority>'."\n";
            $content .= '  </url>'."\n";
        }

        $content .= '</urlset>';

        return response($content, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
