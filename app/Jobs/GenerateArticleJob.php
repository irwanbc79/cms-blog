<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\Site;
use App\Services\AnthropicService;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class GenerateArticleJob implements ShouldQueue
{
    use Queueable;

    public int $timeout = 300;
    public int $tries   = 1;

    public function __construct(
        public readonly int    $siteId,
        public readonly string $topic,
        public readonly string $pillar,
        public readonly string $language,
        public readonly string $scheduleDate,
        public readonly int    $userId,
    ) {}

    public function handle(): void
    {
        $site    = Site::findOrFail($this->siteId);
        $service = new AnthropicService($site);

        // Step 1: generate title options and pick the best one
        $titles = $service->generateTitleOptions($this->topic, $this->pillar, $this->language);

        $bestTitle = collect($titles)
            ->sortByDesc(fn (array $t) => match ($t['ctr_score'] ?? 'low') {
                'high' => 3,
                'med'  => 2,
                default => 1,
            })
            ->first();

        $selectedTitle = $bestTitle['title'] ?? $this->topic;

        // Step 2: generate full article (metadata + content)
        $articleData = $service->generateArticle($selectedTitle, $this->pillar, $this->language);

        // Step 3: save to DB
        $slug = $this->ensureUniqueSlug(
            $articleData['slug'] ?: Str::slug($selectedTitle)
        );

        Article::create([
            'site_id'             => $this->siteId,
            'title'               => $selectedTitle,
            'slug'                => $slug,
            'focus_keyword'       => $articleData['focus_keyword'] ?? '',
            'meta_description'    => $articleData['meta_description'] ?? '',
            'excerpt'             => $articleData['excerpt']
                                       ?? Str::limit(strip_tags($articleData['content_html'] ?? ''), 200),
            'og_title'            => $articleData['seo_title'] ?? $selectedTitle,
            'content_html'        => $articleData['content_html'] ?? '',
            'tags'                => $articleData['tags'] ?? [],
            'hashtags'            => $articleData['hashtags'] ?? [],
            'image_alt_texts'     => $articleData['image_alt_texts'] ?? [],
            'schema_faq'          => $articleData['schema_faq'] ?? [],
            'language'            => $this->language,
            'pillar'              => $this->pillar,
            'status'              => 'scheduled',
            'scheduled_at'        => Carbon::parse($this->scheduleDate),
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
