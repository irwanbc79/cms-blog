<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Site;
use App\Services\AnthropicService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class BulkContentGenerator extends Command
{
    protected $signature = 'content:bulk-generate
        {site_id : The Site ID to generate content for}
        {--topics= : Comma-separated list of topics}
        {--pillar=news : Content pillar}
        {--language=id : Language code (id or en)}
        {--schedule-days=1 : Days between each scheduled publish}
        {--start-hour=8 : Hour of day to schedule (0-23)}';

    protected $description = 'Bulk generate articles from a list of topics and auto-schedule them';

    public function handle(): int
    {
        $site = Site::find($this->argument('site_id'));

        if (! $site) {
            $this->error('Site not found.');
            return self::FAILURE;
        }

        $topicsRaw = $this->option('topics');
        if (! $topicsRaw) {
            $this->error('Please provide --topics="topic1,topic2,topic3"');
            return self::FAILURE;
        }

        $topics       = array_map('trim', explode(',', $topicsRaw));
        $pillar       = $this->option('pillar');
        $language     = $this->option('language');
        $scheduleDays = max(1, (int) $this->option('schedule-days'));
        $startHour    = (int) $this->option('start-hour');

        $scheduleDate = now()->addDay()->setTime($startHour, 0);
        $totalTopics  = count($topics);
        $success      = 0;
        $failed       = 0;

        $this->info("🚀 Bulk generating {$totalTopics} articles for {$site->name}");
        $this->info("   Pillar: {$pillar} | Language: {$language}");
        $this->newLine();

        foreach ($topics as $index => $topic) {
            $num = $index + 1;
            $this->info("📝 [{$num}/{$totalTopics}] Topic: {$topic}");

            try {
                $anthropic = new AnthropicService($site);

                // Step 1: Generate titles
                $this->comment('   → Generating title options...');
                $titles = $anthropic->generateTitleOptions($topic, $pillar, $language);

                // Auto-pick best title (highest CTR score)
                $bestTitle = collect($titles)
                    ->sortByDesc(fn (array $t) => match ($t['ctr_score'] ?? 'low') {
                        'high' => 3,
                        'med'  => 2,
                        default => 1,
                    })
                    ->first();

                $selectedTitle = $bestTitle['title'] ?? $topic;
                $this->comment("   → Selected: {$selectedTitle}");

                // Step 2: Generate article
                $this->comment('   → Generating full article (~60s)...');
                $articleData = $anthropic->generateArticle($selectedTitle, $pillar, $language);

                // Step 3: Create article record
                $slug = $this->ensureUniqueSlug(
                    $articleData['slug'] ?: Str::slug($selectedTitle)
                );

                $article = Article::create([
                    'site_id'             => $site->id,
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
                    'language'            => $language,
                    'pillar'              => $pillar,
                    'status'              => 'scheduled',
                    'scheduled_at'        => $scheduleDate,
                    'word_count'          => $articleData['word_count'] ?? 0,
                    'estimated_read_time' => max(1, intval(($articleData['word_count'] ?? 0) / 238)),
                    'user_id'             => 1,
                ]);

                $this->info("   ✅ Created (ID #{$article->id}) — Scheduled: {$scheduleDate->format('d M Y H:i')}");
                $scheduleDate = $scheduleDate->addDays($scheduleDays);
                $success++;

                // Rate limit between API calls
                if ($index < $totalTopics - 1) {
                    $this->comment('   ⏳ Waiting 5s before next...');
                    sleep(5);
                }
            } catch (\Throwable $e) {
                $this->error("   ❌ Failed: {$e->getMessage()}");
                $failed++;
            }
        }

        $this->newLine();
        $this->info("🏁 Done! {$success} created, {$failed} failed.");

        return $failed > 0 ? self::FAILURE : self::SUCCESS;
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
