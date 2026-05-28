<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Site;
use App\Models\TopicIdea;
use App\Services\AnthropicService;
use App\Services\WordPressService;
use Illuminate\Support\Str;
use Livewire\Component;

class ContentGenerator extends Component
{
    public int $step = 0;

    // Step 0: Site Selection
    public ?int $siteId = null;

    // Step 1
    public string $language = 'id';
    public string $pillar   = '';
    public string $topic    = '';
    public ?int   $topicIdeaId = null;

    // Step 2
    public array $titleOptions       = [];
    public ?int  $selectedTitleIndex = null;

    // Step 3
    public bool   $generating   = false;
    public ?array $articleData  = null;
    public string $errorMessage = '';

    // Step 4
    public ?int   $savedArticleId = null;
    public string $publishStatus  = 'draft';
    public string $publishResult  = '';

    // ─── Computed ──────────────────────────────────────────────────────────────

    public function getSelectedSiteProperty(): ?Site
    {
        return $this->siteId ? Site::find($this->siteId) : null;
    }

    public function getPillarOptionsProperty(): array
    {
        return $this->selectedSite?->getPillarOptions() ?? [
            'regulasi' => 'Regulasi',
            'umkm'     => 'UMKM Ekspor',
            'news'     => 'News',
            'logistik' => 'Logistik',
        ];
    }

    public function getLanguageOptionsProperty(): array
    {
        return $this->selectedSite?->getLanguageOptions() ?? [
            'id' => '🇮🇩 Indonesia',
            'en' => '🇬🇧 English',
        ];
    }

    // ─── Step 0 → 1 ────────────────────────────────────────────────────────────

    public function selectSite(int $siteId): void
    {
        $site = Site::find($siteId);
        if ($site) {
            $this->siteId = $siteId;
            $this->pillar = '';
            $this->topic  = '';
            $this->topicIdeaId = null;
            $this->step   = 1;

            // Set defaults from site config
            $langOptions = $site->getLanguageOptions();
            $this->language = array_key_first($langOptions) ?: 'id';

            $pillarOptions = $site->getPillarOptions();
            $this->pillar   = array_key_first($pillarOptions) ?: 'regulasi';
        }
    }

    public function goBackToSites(): void
    {
        $this->step               = 0;
        $this->topic              = '';
        $this->titleOptions       = [];
        $this->selectedTitleIndex = null;
        $this->articleData        = null;
        $this->savedArticleId     = null;
        $this->errorMessage       = '';
        $this->publishResult      = '';
    }

    // ─── Step 1 → 2 ────────────────────────────────────────────────────────────

    public function generateTitles(): void
    {
        $this->validate([
            'siteId'   => 'required|exists:sites,id',
            'language' => 'required|string',
            'pillar'   => 'required|string',
            'topic'    => 'required|min:5|max:255',
        ]);

        $this->errorMessage = '';

        try {
            $site               = Site::findOrFail($this->siteId);
            $service            = new AnthropicService($site);
            $this->titleOptions = $service->generateTitleOptions($this->topic, $this->pillar, $this->language);
            $this->step         = 2;
        } catch (\Throwable $e) {
            $this->errorMessage = $e->getMessage();
        }
    }

    public function pickTopicIdea(int $id): void
    {
        $idea = TopicIdea::find($id);
        if ($idea) {
            $this->topic       = $idea->topic;
            $this->pillar      = $idea->pillar;
            $this->language    = $idea->language;
            $this->topicIdeaId = $id;
        }
    }

    // ─── Step 2 → 3 ────────────────────────────────────────────────────────────

    public function selectTitle(int $index): void
    {
        $this->selectedTitleIndex = $index;
    }

    public function generateArticle(): void
    {
        if ($this->selectedTitleIndex === null || ! isset($this->titleOptions[$this->selectedTitleIndex])) {
            $this->errorMessage = 'Please select a title first.';
            return;
        }

        $this->generating   = true;
        $this->errorMessage = '';
        $selectedTitle      = $this->titleOptions[$this->selectedTitleIndex]['title'];

        try {
            $site    = Site::findOrFail($this->siteId);
            $service = new AnthropicService($site);

            // Step A: Generate article content via AI
            $this->articleData = $this->generateArticleContent($service, $selectedTitle);

            // Step B: Inject internal links
            $this->articleData['content_html'] = $this->injectInternalLinks(
                $service,
                $this->articleData['content_html']
            );

            // Step C: Save to database
            $this->savedArticleId = $this->saveArticle($selectedTitle);

            // Step D: Mark topic idea as used
            $this->markTopicIdeaUsed($selectedTitle);

            $this->step = 3;
        } catch (\Throwable $e) {
            $this->errorMessage = $e->getMessage();
        }

        $this->generating = false;
    }

    /**
     * Call Anthropic API to generate article content.
     */
    private function generateArticleContent(AnthropicService $service, string $selectedTitle): array
    {
        $data = $service->generateArticle($selectedTitle, $this->pillar, $this->language);
        $data['title'] = $selectedTitle;
        return $data;
    }

    /**
     * Auto-inject internal links into article content.
     */
    private function injectInternalLinks(AnthropicService $service, string $contentHtml): string
    {
        $existingArticles = Article::forSite($this->siteId)
            ->published()
            ->select('title', 'slug')
            ->latest('published_at')
            ->take(20)
            ->get()
            ->toArray();

        if (count($existingArticles) >= 3) {
            return $service->generateInternalLinks($contentHtml, $existingArticles);
        }

        return $contentHtml;
    }

    /**
     * Save the generated article to the database.
     */
    private function saveArticle(string $selectedTitle): int
    {
        $slug = $this->ensureUniqueSlug(
            $this->articleData['slug'] ?: Str::slug($selectedTitle)
        );

        $article = Article::create([
            'site_id'             => $this->siteId,
            'title'               => $selectedTitle,
            'slug'                => $slug,
            'focus_keyword'       => $this->articleData['focus_keyword'] ?? '',
            'meta_description'    => $this->articleData['meta_description'] ?? '',
            'excerpt'             => $this->articleData['excerpt']
                                      ?? Str::limit(strip_tags($this->articleData['content_html']), 200),
            'og_title'            => $this->articleData['seo_title'] ?? $selectedTitle,
            'content_html'        => $this->articleData['content_html'],
            'tags'                => $this->articleData['tags'] ?? [],
            'hashtags'            => $this->articleData['hashtags'] ?? [],
            'image_alt_texts'     => $this->articleData['image_alt_texts'] ?? [],
            'schema_faq'          => $this->articleData['schema_faq'] ?? [],
            'language'            => $this->language,
            'pillar'              => $this->pillar,
            'status'              => 'draft',
            'word_count'          => $this->articleData['word_count'] ?? 0,
            'estimated_read_time' => max(1, intval(($this->articleData['word_count'] ?? 0) / 238)),
            'user_id'             => auth()->id(),
        ]);

        return $article->id;
    }

    /**
     * Mark the selected TopicIdea as used.
     */
    private function markTopicIdeaUsed(string $selectedTitle): void
    {
        if ($this->topicIdeaId) {
            TopicIdea::where('id', $this->topicIdeaId)->update([
                'is_used'        => true,
                'used_at'        => now(),
                'article_id'     => $this->savedArticleId,
                'selected_title' => $selectedTitle,
            ]);
        }
    }

    /**
     * Ensure slug uniqueness across all articles.
     */
    private function ensureUniqueSlug(string $slug): string
    {
        $original = $slug;
        $counter  = 1;

        while (Article::where('slug', $slug)->exists()) {
            $slug = "{$original}-{$counter}";
            $counter++;
        }

        return $slug;
    }

    // ─── Step 3 → 4 ────────────────────────────────────────────────────────────

    public function proceedToPublish(): void
    {
        $this->step = 4;
    }

    // ─── Step 4: Publish ────────────────────────────────────────────────────────

    public function publish(): void
    {
        if (! $this->savedArticleId) {
            $this->publishResult = 'error:Article not saved.';
            return;
        }

        $article = Article::with('site')->findOrFail($this->savedArticleId);

        try {
            $wp     = new WordPressService($article->site);
            $result = $wp->publishArticle($article, $this->publishStatus === 'publish' ? 'publish' : 'draft');

            $article->update([
                'wp_post_id'   => $result['id'],
                'wp_post_url'  => $result['link'],
                'status'       => $this->publishStatus === 'publish' ? 'published' : 'draft',
                'published_at' => $this->publishStatus === 'publish' ? now() : null,
            ]);

            $this->publishResult = 'success:' . $result['link'];
        } catch (\Throwable $e) {
            $this->publishResult = 'error:' . $e->getMessage();
        }
    }

    public function restart(): void
    {
        $this->step               = 0;
        $this->siteId             = null;
        $this->topic              = '';
        $this->titleOptions       = [];
        $this->selectedTitleIndex = null;
        $this->articleData        = null;
        $this->savedArticleId     = null;
        $this->errorMessage       = '';
        $this->publishResult      = '';
    }

    public function render()
    {
        $sites = Site::where('is_active', true)->orderBy('name')->get();

        if ($this->siteId) {
            $topicIdeas = TopicIdea::where('is_used', false)
                ->where('site_id', $this->siteId)
                ->where('language', $this->language)
                ->where('pillar', $this->pillar)
                ->latest()
                ->take(10)
                ->get();
        } else {
            $topicIdeas = collect();
        }

        $selectedSite = $this->selectedSite;
        return view('livewire.content-generator', compact('sites', 'topicIdeas', 'selectedSite'));
    }
}
