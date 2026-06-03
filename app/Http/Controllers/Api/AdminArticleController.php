<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{
    /** GET /api/admin/sites */
    public function sites()
    {
        $sites = Site::where('is_active', true)
            ->select('id', 'name', 'slug', 'domain', 'content_pillars', 'languages')
            ->get();

        return response()->json(['data' => $sites]);
    }

    /** GET /api/admin/articles */
    public function index(Request $request)
    {
        $query = Article::with('site:id,name,slug,domain')
            ->latest('updated_at');

        if ($request->filled('site_id')) {
            $query->where('site_id', $request->query('site_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->query('status'));
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->query('search') . '%');
        }

        $limit = min((int) $request->query('limit', 20), 100);
        $articles = $query->paginate($limit);

        return response()->json([
            'data' => $articles->map(fn ($a) => $this->transform($a)),
            'meta' => [
                'current_page' => $articles->currentPage(),
                'last_page'    => $articles->lastPage(),
                'total'        => $articles->total(),
            ],
        ]);
    }

    /** POST /api/admin/articles */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'site_id'           => 'required|exists:sites,id',
            'title'             => 'required|string|max:255',
            'content_html'      => 'required|string',
            'excerpt'           => 'nullable|string|max:500',
            'focus_keyword'     => 'nullable|string|max:100',
            'meta_description'  => 'nullable|string|max:320',
            'og_title'          => 'nullable|string|max:255',
            'og_description'    => 'nullable|string|max:320',
            'canonical_url'     => 'nullable|url',
            'tags'              => 'nullable|array',
            'pillar'            => 'nullable|string|max:100',
            'language'          => 'nullable|string|in:id,en',
            'status'            => 'nullable|in:draft,scheduled,published',
            'featured_image_url'=> 'nullable|url',
            'schema_type'       => 'nullable|string',
            'schema_faq'        => 'nullable|array',
            'scheduled_at'      => 'nullable|date',
        ]);

        $validated['slug'] = $this->uniqueSlug($validated['title'], $validated['site_id']);
        $validated['status'] = $validated['status'] ?? 'draft';
        $validated['word_count'] = str_word_count(strip_tags($validated['content_html']));
        $validated['estimated_read_time'] = max(1, (int) round($validated['word_count'] / 200));
        $validated['user_id'] = 1; // admin

        $article = Article::create($validated);

        return response()->json(['data' => $this->transform($article)], 201);
    }

    /** PUT /api/admin/articles/{id} */
    public function update(Request $request, int $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title'             => 'sometimes|string|max:255',
            'content_html'      => 'sometimes|string',
            'excerpt'           => 'nullable|string|max:500',
            'focus_keyword'     => 'nullable|string|max:100',
            'meta_description'  => 'nullable|string|max:320',
            'og_title'          => 'nullable|string|max:255',
            'og_description'    => 'nullable|string|max:320',
            'canonical_url'     => 'nullable|url',
            'tags'              => 'nullable|array',
            'pillar'            => 'nullable|string|max:100',
            'language'          => 'nullable|string|in:id,en',
            'status'            => 'nullable|in:draft,scheduled,published',
            'featured_image_url'=> 'nullable|url',
            'schema_type'       => 'nullable|string',
            'schema_faq'        => 'nullable|array',
            'scheduled_at'      => 'nullable|date',
        ]);

        if (isset($validated['content_html'])) {
            $validated['word_count'] = str_word_count(strip_tags($validated['content_html']));
            $validated['estimated_read_time'] = max(1, (int) round($validated['word_count'] / 200));
        }

        $article->update($validated);

        return response()->json(['data' => $this->transform($article->fresh())]);
    }

    /** DELETE /api/admin/articles/{id} */
    public function destroy(int $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'Article deleted.']);
    }

    /** GET /api/admin/articles/{id} */
    public function show(int $id)
    {
        $article = Article::with('site:id,name,slug,domain')->findOrFail($id);

        return response()->json(['data' => $this->transform($article, full: true)]);
    }

    private function uniqueSlug(string $title, int $siteId): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (Article::where('site_id', $siteId)->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }

    private function transform(Article $article, bool $full = false): array
    {
        $data = [
            'id'                  => $article->id,
            'site_id'             => $article->site_id,
            'site'                => $article->site ? [
                'id'     => $article->site->id,
                'name'   => $article->site->name,
                'domain' => $article->site->domain,
            ] : null,
            'title'               => $article->title,
            'slug'                => $article->slug,
            'excerpt'             => $article->excerpt,
            'status'              => $article->status,
            'pillar'              => $article->pillar,
            'language'            => $article->language,
            'focus_keyword'       => $article->focus_keyword,
            'meta_description'    => $article->meta_description,
            'tags'                => $article->tags,
            'featured_image_url'  => $article->featured_image_url,
            'word_count'          => $article->word_count,
            'estimated_read_time' => $article->estimated_read_time,
            'published_at'        => $article->published_at?->toIso8601String(),
            'scheduled_at'        => $article->scheduled_at?->toIso8601String(),
            'updated_at'          => $article->updated_at->toIso8601String(),
        ];

        if ($full) {
            $data['content_html'] = $article->content_html;
            $data['og_title']     = $article->og_title;
            $data['schema_type']  = $article->schema_type;
            $data['schema_faq']   = $article->schema_faq;
            $data['canonical_url']= $article->canonical_url;
        }

        return $data;
    }
}
