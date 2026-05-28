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
        $search = $request->query('q') ? substr(trim($request->query('q')), 0, 100) : null;

        $query = Article::forSite($site->id)
            ->published()
            ->latest('published_at');

        if ($pillar) {
            $query->where('pillar', $pillar);
        }

        if ($search) {
            $escaped = str_replace(['%', '_'], ['\\%', '\\_'], $search);
            $query->where(function ($q) use ($escaped) {
                $q->where('title', 'like', "%{$escaped}%")
                  ->orWhere('excerpt', 'like', "%{$escaped}%")
                  ->orWhere('focus_keyword', 'like', "%{$escaped}%");
            });
        }

        $articles = $query->paginate(9)->withQueryString();

        // Get pillar counts for filter sidebar
        $pillarCounts = Article::forSite($site->id)
            ->published()
            ->selectRaw('pillar, count(*) as count')
            ->whereNotNull('pillar')
            ->groupBy('pillar')
            ->pluck('count', 'pillar');

        $seo = [
            'title' => $site->name . ' - Blog',
            'description' => 'Blog dan artikel terbaru dari ' . $site->name . '. Temukan informasi menarik seputar bisnis dan industri kami.',
            'canonical' => url('/blog'),
        ];

        return view('blog.index', compact('site', 'articles', 'pillar', 'search', 'pillarCounts', 'seo'))
            ->header('Cache-Control', 'public, max-age=300, s-maxage=600');
    }

    /**
     * Display a single article.
     */
    public function show(Request $request, string $slug)
    {
        $site = $this->siteResolver->resolveOrFail();

        $article = Article::forSite($site->id)
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Parse content for table of contents
        $toc = $this->generateToc($article->content_html);

        // Get related articles with smart fallback (single query)
        $relatedArticles = Article::forSite($site->id)
            ->published()
            ->where('id', '!=', $article->id)
            ->orderByRaw("CASE WHEN pillar = ? THEN 0 ELSE 1 END", [$article->pillar])
            ->latest('published_at')
            ->take(3)
            ->get(['id', 'title', 'slug', 'excerpt', 'content_html', 'pillar', 'featured_image_url', 'published_at', 'estimated_read_time', 'image_alt_texts']);

        // Previous / Next article — single query with union for performance
        $prevArticle = null;
        $nextArticle = null;

        if ($article->published_at) {
            $navArticles = Article::forSite($site->id)
                ->published()
                ->where('published_at', '<', $article->published_at)
                ->latest('published_at')
                ->take(1)
                ->union(
                    Article::forSite($site->id)
                        ->published()
                        ->where('published_at', '>', $article->published_at)
                        ->oldest('published_at')
                        ->take(1)
                )
                ->get(['id', 'title', 'slug', 'published_at']);

            foreach ($navArticles as $nav) {
                if ($nav->published_at?->lt($article->published_at)) {
                    $prevArticle = $nav;
                } elseif ($nav->published_at?->gt($article->published_at)) {
                    $nextArticle = $nav;
                }
            }
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
        ))->header('Cache-Control', 'public, max-age=300, s-maxage=600');
    }

    /**
     * Generate table of contents from HTML content.
     * Handles headings with and without id attributes.
     */
    protected function generateToc(?string $html): array
    {
        if (! $html) {
            return [];
        }

        $toc = [];
        preg_match_all('/<h([2-3])(\s+[^>]*)?>(.*?)<\/h[2-3]>/i', $html, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $level = (int) $match[1];
            $attrs = $match[2] ?? '';
            $innerHtml = $match[3];

            // Extract id attribute if present
            $id = '';
            if (preg_match('/\bid=["\']([^"\']+)["\']/i', $attrs, $idMatch)) {
                $id = $idMatch[1];
            } else {
                // Generate id from heading text as fallback
                $id = Str::slug(strip_tags($innerHtml));
            }

            $toc[] = [
                'level' => $level,
                'id'    => $id,
                'title' => strip_tags($innerHtml),
            ];
        }

        return $toc;
    }
}