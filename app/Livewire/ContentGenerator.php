<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\TopicIdea;
use App\Services\AnthropicService;
use App\Services\WordPressService;
use Illuminate\Support\Str;
use Livewire\Component;

class ContentGenerator extends Component
{
    public int $step = 1;

    // Step 1
    public string $language = 'id';
    public string $pillar   = 'regulasi';
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

    // ─── Step 1 → 2 ────────────────────────────────────────────────────────────

    public function generateTitles(): void
    {
        $this->validate([
            'language' => 'required|in:id,en',
            'pillar'   => 'required|in:regulasi,umkm,news,logistik',
            'topic'    => 'required|min:5|max:255',
        ]);

        $this->errorMessage = '';

        try {
            $service            = new AnthropicService();
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
            $service           = new AnthropicService();
            $this->articleData = $service->generateArticle($selectedTitle, $this->pillar, $this->language);
            $this->articleData['title'] = $selectedTitle;

            $article = Article::create([
                'title'            => $selectedTitle,
                'slug'             => $this->articleData['slug'] ?: Str::slug($selectedTitle),
                'focus_keyword'    => $this->articleData['focus_keyword'] ?? '',
                'meta_description' => $this->articleData['meta_description'] ?? '',
                'og_title'         => $this->articleData['seo_title'] ?? $selectedTitle,
                'content_html'     => $this->articleData['content_html'],
                'tags'             => $this->articleData['tags'] ?? [],
                'hashtags'         => $this->articleData['hashtags'] ?? [],
                'image_alt_texts'  => $this->articleData['image_alt_texts'] ?? [],
                'schema_faq'       => $this->articleData['schema_faq'] ?? [],
                'language'         => $this->language,
                'pillar'           => $this->pillar,
                'status'           => 'draft',
                'word_count'       => $this->articleData['word_count'] ?? 0,
                'user_id'          => auth()->id(),
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

        $article = Article::findOrFail($this->savedArticleId);

        try {
            $wp     = new WordPressService();
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
        $this->step               = 1;
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
        $topicIdeas = TopicIdea::where('is_used', false)
            ->where('language', $this->language)
            ->where('pillar', $this->pillar)
            ->latest()
            ->take(10)
            ->get();

        return view('livewire.content-generator', compact('topicIdeas'));
    }
}
