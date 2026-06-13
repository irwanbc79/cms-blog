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
        {--start-hour=8 : Hour of day to schedule (0-23)}
        {--start-date= : Start date for scheduling (YYYY-MM-DD)}';

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
        $startDate    = $this->option('start-date');

        if ($startDate) {
            $scheduleDate = \Carbon\Carbon::parse($startDate)->setTime($startHour, 0);
        } else {
            $scheduleDate = now()->addDay()->setTime($startHour, 0);
        }
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
                $this->comment('   → Dispatching generation job...');
                $job = new \App\Jobs\GenerateArticleJob(
                    $site->id,
                    $topic,
                    $pillar,
                    $language,
                    $scheduleDate->toDateTimeString(),
                    1, // User ID (Admin)
                    'scheduled'
                );
                $job->handle();

                $this->info("   ✅ Created & Scheduled: {$scheduleDate->format('d M Y H:i')}");
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
