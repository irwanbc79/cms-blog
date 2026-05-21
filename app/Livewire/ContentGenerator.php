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
            $site              = Site::findOrFail($this->siteId);
            $service           = new AnthropicService($site);
            $this->articleData = $service->generateArticle($selectedTitle, $this->pillar, $this->language);
            $this->articleData['title'] = $selectedTitle;

            $article = Article::create([
                'site_id'            => $this->siteId,
                'title'              => $selectedTitle,
                'slug'               => $this->articleData['slug'] ?: Str::slug($selectedTitle),
                'focus_keyword'      => $this->articleData['focus_keyword'] ?? '',
                'meta_description'   => $this->articleData['meta_description'] ?? '',
                'og_title'           => $this->articleData['seo_title'] ?? $selectedTitle,
                'content_html'       => $this->articleData['content_html'],
                'tags'               => $this->articleData['tags'] ?? [],
                'hashtags'           => $this->articleData['hashtags'] ?? [],
                'image_alt_texts'    => $this->articleData['image_alt_texts'] ?? [],
                'schema_faq'         => $this->articleData['schema_faq'] ?? [],
                'language'           => $this->language,
                'pillar'             => $this->pillar,
                'status'             => 'draft',
                'word_count'         => $this->articleData['word_count'] ?? 0,
                'estimated_read_time' => max(1, intval(($this->articleData['word_count'] ?? 0) / 200)),
                'user_id'            => auth()->id(),
            ]);

            $this->savedArticleId = $article->id;

            if ($this->topicIdeaId) {
                TopicIdea::where('id', $this->topicIdeaId)->update([
                    'is_used'        => true,
                    'used_at'        => now(),
                    'article_id'     => $article->id,
                    'selected_title' => $selectedTitle,
                ]);
            }

            $this->step = 3;
        } catch (\Throwable $e) {
            $this->errorMessage = $e->getMessage();
        }

        $this->generating = false;
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
