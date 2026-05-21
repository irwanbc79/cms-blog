<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Site;
use App\Services\SiteResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    protected SiteResolver $siteResolver;

    public function __construct(SiteResolver $siteResolver)
    {
        $this->siteResolver = $siteResolver;
    }

    /**
     * Display blog index for the current site.
     */
    public function index(Request $request)
    {
        $site = $this->siteResolver->resolveOrFail();

        $pillar = $request->query('pillar');
        $search = $request->query('q');

        $query = Article::where('site_id', $site->id)
            ->where('status', 'published')
            ->latest('published_at');

        if ($pillar) {
            $query->where('pillar', $pillar);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('focus_keyword', 'like', "%{$search}%");
            });
        }

        $articles = $query->paginate(9)->withQueryString();

        // Get pillar counts for filter sidebar
        $pillarCounts = Article::where('site_id', $site->id)
            ->where('status', 'published')
            ->selectRaw('pillar, count(*) as count')
            ->whereNotNull('pillar')
            ->groupBy('pillar')
            ->pluck('count', 'pillar');

        $seo = [
            'title' => $site->name . ' - Blog',
            'description' => 'Blog dan artikel terbaru dari ' . $site->name . '. Temukan informasi menarik seputar bisnis dan industri kami.',
            'canonical' => url('/blog'),
        ];

        return view('blog.index', compact('site', 'articles', 'pillar', 'search', 'pillarCounts', 'seo'));
    }

    /**
     * Display a single article.
     */
    public function show(Request $request, string $slug)
    {
        $site = $this->siteResolver->resolveOrFail();

        $article = Article::where('site_id', $site->id)
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Parse content for table of contents
        $toc = $this->generateToc($article->content_html);

        // Get related articles (same pillar, excluding current)
        $relatedArticles = Article::where('site_id', $site->id)
            ->where('id', '!=', $article->id)
            ->where('status', 'published')
            ->where('pillar', $article->pillar)
            ->latest('published_at')
            ->take(3)
            ->get();

        // If not enough related articles from same pillar, get latest
        if ($relatedArticles->count() < 3) {
            $excludeIds = $relatedArticles->pluck('id')->push($article->id);
            $moreArticles = Article::where('site_id', $site->id)
                ->where('status', 'published')
                ->whereNotIn('id', $excludeIds)
                ->latest('published_at')
                ->take(3 - $relatedArticles->count())
                ->get();
            $relatedArticles = $relatedArticles->concat($moreArticles);
        }

        // Previous / Next article
        $prevArticle = null;
        $nextArticle = null;

        if ($article->published_at) {
            $prevArticle = Article::where('site_id', $site->id)
                ->where('status', 'published')
                ->where('published_at', '<', $article->published_at)
                ->latest('published_at')
                ->first();

            $nextArticle = Article::where('site_id', $site->id)
                ->where('status', 'published')
                ->where('published_at', '>', $article->published_at)
                ->oldest('published_at')
                ->first();
        }

        // Build breadcrumbs
        $breadcrumbs = [
            ['label' => 'Blog', 'url' => url('/blog')],
            ['label' => $article->pillar ? ucfirst($article->pillar) : 'Artikel', 'url' => $article->pillar ? url('/blog?pillar=' . $article->pillar) : null],
            ['label' => $article->title, 'url' => null],
        ];

        $seo = [
            'title' => $article->og_title ?: $article->title,
            'description' => $article->meta_description ?: Str::limit(strip_tags($article->excerpt ?: $article->content_html), 160),
            'image' => $article->featured_image_url,
            'canonical' => url('/blog/' . $article->slug),
            'published_time' => $article->published_at?->toIso8601String(),
            'modified_time' => $article->updated_at->toIso8601String(),
            'author' => $article->user?->name ?? $site->name,
            'tags' => $article->tags,
            'focus_keyword' => $article->focus_keyword,
        ];

        return view('blog.show', compact(
            'site', 'article', 'toc', 'relatedArticles',
            'prevArticle', 'nextArticle', 'breadcrumbs', 'seo'
        ));
    }

    /**
     * Generate table of contents from HTML content.
     */
    protected function generateToc(?string $html): array
    {
        if (! $html) {
            return [];
        }

        $toc = [];
        preg_match_all('/<h([2-3])\s+[^>]*id=["\']([^"\']+)["\'][^>]*>(.*?)<\/h[2-3]>/i', $html, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $toc[] = [
                'level' => (int) $match[1],
                'id' => $match[2],
                'title' => strip_tags($match[3]),
            ];
        }

        return $toc;
    }
}
