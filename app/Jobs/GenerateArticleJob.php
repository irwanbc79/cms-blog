<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\Site;
use App\Services\AnthropicService;
use App\Services\UnsplashService;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class GenerateArticleJob implements ShouldQueue
{
    use Queueable;

    public int $timeout = 600;
    public int $tries   = 1;

    /**
     * @param string $topic    Topic/keyword. Empty = autopilot will generate one.
     * @param string $pillar   Pillar slug, or 'auto' to pick from site pillars.
     * @param string $status   published | scheduled | draft
     */
    public function __construct(
        public readonly int    $siteId,
        public readonly string $topic,
        public readonly string $pillar,
        public readonly string $language,
        public readonly string $scheduleDate,
        public readonly int    $userId,
        public readonly string $status = 'scheduled',
    ) {}

    public function handle(): void
    {
        $site    = Site::findOrFail($this->siteId);
        $service = new AnthropicService($site);

        // Resolve pillar: 'auto' or empty -> pick a random pillar from the site
        $pillar = $this->pillar;
        if ($pillar === '' || $pillar === 'auto') {
            $options = array_keys($site->getPillarOptions());
            $pillar  = $options ? $options[array_rand($options)] : 'news';
        }

        // Resolve topic: empty -> autopilot generates a fresh topic for the pillar
        $topic = trim($this->topic);
        if ($topic === '') {
            $suggested = $service->suggestTopics($pillar, $this->language, 1);
            $topic     = $suggested[0] ?? ($site->name . ' ' . str_replace('-', ' ', $pillar));
        }

        // Step 1: generate title options and pick the best one
        $titles = $service->generateTitleOptions($topic, $pillar, $this->language);

        $bestTitle = collect($titles)
            ->sortByDesc(fn (array $t) => match ($t['ctr_score'] ?? 'low') {
                'high' => 3,
                'med'  => 2,
                default => 1,
            })
            ->first();

        $selectedTitle = $bestTitle['title'] ?? $topic;

        // Step 2: generate full article (metadata + content)
        $articleData = $service->generateArticle($selectedTitle, $pillar, $this->language);

        // Step 3: save to DB
        $slug    = $this->ensureUniqueSlug($articleData['slug'] ?: Str::slug($selectedTitle));
        $keyword = $articleData['focus_keyword'] ?? $topic;

        // Publish timing based on status
        $isPublished  = $this->status === 'published';
        $publishedAt  = $isPublished ? now() : null;
        $scheduledAt  = $this->status === 'scheduled' ? Carbon::parse($this->scheduleDate) : null;

        Article::create([
            'site_id'             => $this->siteId,
            'title'               => $selectedTitle,
            'slug'                => $slug,
            'focus_keyword'       => $keyword,
            'meta_description'    => $articleData['meta_description'] ?? '',
            'excerpt'             => $articleData['excerpt']
                                       ?? Str::limit(strip_tags($articleData['content_html'] ?? ''), 200),
            'og_title'            => $articleData['seo_title'] ?? $selectedTitle,
            'content_html'        => $articleData['content_html'] ?? '',
            'featured_image_url'  => (new UnsplashService())->fetchForKeyword($keyword),
            'tags'                => $articleData['tags'] ?? [],
            'hashtags'            => $articleData['hashtags'] ?? [],
            'image_alt_texts'     => $articleData['image_alt_texts'] ?? [],
            'schema_faq'          => $articleData['schema_faq'] ?? [],
            'language'            => $this->language,
            'pillar'              => $pillar,
            'status'              => $this->status,
            'scheduled_at'        => $scheduledAt,
            'published_at'        => $publishedAt,
            'word_count'          => $articleData['word_count'] ?? 0,
            'estimated_read_time' => max(1, intval(($articleData['word_count'] ?? 0) / 238)),
            'user_id'             => $this->userId,
        ]);
    }

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
}
