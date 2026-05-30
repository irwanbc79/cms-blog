<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $site = $request->attributes->get('api_site');

        $query = \App\Models\Article::forSite($site->id)
            ->published()
            ->latest('published_at');

        if ($request->filled('pillar')) {
            $query->where('pillar', $request->query('pillar'));
        }

        if ($request->filled('lang')) {
            $query->where('language', $request->query('lang'));
        }

        $limit = min((int) $request->query('limit', 10), 50);

        $articles = $query->paginate($limit)->withQueryString();

        return response()->json([
            'data' => $articles->map(fn ($a) => $this->transform($a)),
            'meta' => [
                'current_page' => $articles->currentPage(),
                'last_page'    => $articles->lastPage(),
                'total'        => $articles->total(),
                'per_page'     => $articles->perPage(),
            ],
        ]);
    }

    public function show(Request $request, string $slug)
    {
        $site = $request->attributes->get('api_site');

        $article = \App\Models\Article::forSite($site->id)
            ->published()
            ->with('user:id,name')
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json(['data' => $this->transform($article, full: true)]);
    }

    private function transform(\App\Models\Article $article, bool $full = false): array
    {
        $data = [
            'id'                 => $article->id,
            'title'              => $article->title,
            'slug'               => $article->slug,
            'excerpt'            => $article->excerpt,
            'pillar'             => $article->pillar,
            'language'           => $article->language,
            'featured_image_url' => $article->featured_image_url,
            'estimated_read_time'=> $article->estimated_read_time,
            'tags'               => $article->tags,
            'focus_keyword'      => $article->focus_keyword,
            'meta_description'   => $article->meta_description,
            'og_title'           => $article->og_title,
            'canonical_url'      => $article->canonical_url,
            'schema_type'        => $article->schema_type,
            'published_at'       => $article->published_at?->toIso8601String(),
            'updated_at'         => $article->updated_at->toIso8601String(),
        ];

        if ($full) {
            $data['content_html'] = $article->content_html;
            $data['schema_faq']   = $article->schema_faq;
            $data['author']       = $article->user?->name;
        }

        return $data;
    }
}
