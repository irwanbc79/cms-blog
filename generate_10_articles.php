<?php

// Bootstrap Laravel
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Site;
use App\Models\Article;
use App\Services\AnthropicService;
use App\Jobs\GenerateArticleJob;
use Carbon\Carbon;

// Prevent time limits
set_time_limit(0);
ini_set('memory_limit', '512M');

$sites = Site::all();

foreach ($sites as $site) {
    echo "=========================================\n";
    echo "Processing site: {$site->name} ({$site->domain})\n";
    echo "=========================================\n";
    
    // 1. Determine start date and time
    // Find the latest scheduled article
    $latestArticle = Article::where('site_id', $site->id)
        ->where('status', 'scheduled')
        ->orderBy('scheduled_at', 'desc')
        ->first();
        
    if ($latestArticle) {
        $scheduleDate = Carbon::parse($latestArticle->scheduled_at)->addDays(2);
    } else {
        // No scheduled articles, start from tomorrow or a safe default date
        $scheduleDate = Carbon::now()->addDay();
        // Set default hours based on site
        if ($site->id == 1) { // dira
            $scheduleDate->setTime(8, 0, 0);
        } elseif ($site->id == 2) { // gma
            $scheduleDate->setTime(12, 0, 0);
        } elseif ($site->id == 3) { // m2b
            $scheduleDate->setTime(16, 0, 0);
        } else { // morabangun
            $scheduleDate->setTime(20, 0, 0);
        }
    }
    
    echo "Next article scheduling starts at: {$scheduleDate->toDateTimeString()}\n";
    
    // 2. Resolve pillars
    $pillars = array_keys($site->getPillarOptions());
    if (empty($pillars)) {
        $pillars = ['news'];
    }
    
    $service = new AnthropicService($site);
    
    // 3. Generate 7 Indonesian Topics
    echo "Suggesting 7 Indonesian topics...\n";
    $indonesianTopics = [];
    $pillarIndex = 0;
    while (count($indonesianTopics) < 7) {
        $pillar = $pillars[$pillarIndex % count($pillars)];
        try {
            $suggested = $service->suggestTopics($pillar, 'id', 1);
            if (!empty($suggested)) {
                $indonesianTopics[] = [
                    'topic' => $suggested[0],
                    'pillar' => $pillar,
                    'language' => 'id'
                ];
                echo "  - Suggested ID topic: '{$suggested[0]}' (Pillar: {$pillar})\n";
            }
        } catch (\Throwable $e) {
            echo "Error suggesting ID topic for pillar {$pillar}: {$e->getMessage()}\n";
        }
        $pillarIndex++;
        sleep(2); // small rate limit buffer
    }
    
    // 4. Generate 3 English Topics
    echo "Suggesting 3 English topics...\n";
    $englishTopics = [];
    $pillarIndex = 0;
    while (count($englishTopics) < 3) {
        $pillar = $pillars[$pillarIndex % count($pillars)];
        try {
            $suggested = $service->suggestTopics($pillar, 'en', 1);
            if (!empty($suggested)) {
                $englishTopics[] = [
                    'topic' => $suggested[0],
                    'pillar' => $pillar,
                    'language' => 'en'
                ];
                echo "  - Suggested EN topic: '{$suggested[0]}' (Pillar: {$pillar})\n";
            }
        } catch (\Throwable $e) {
            echo "Error suggesting EN topic for pillar {$pillar}: {$e->getMessage()}\n";
        }
        $pillarIndex++;
        sleep(2); // small rate limit buffer
    }
    
    // Merge and interleave them so they are mixed in the schedule
    // Pattern: ID, ID, EN, ID, ID, EN, ID, ID, EN, ID
    $allTasks = [];
    $idCount = 0;
    $enCount = 0;
    
    for ($i = 0; $i < 10; $i++) {
        if (($i % 3 == 2) && ($enCount < 3)) {
            $allTasks[] = $englishTopics[$enCount++];
        } elseif ($idCount < 7) {
            $allTasks[] = $indonesianTopics[$idCount++];
        } else {
            // fallback
            $allTasks[] = isset($englishTopics[$enCount]) ? $englishTopics[$enCount++] : $indonesianTopics[$idCount++];
        }
    }
    
    // 5. Generate and schedule articles
    foreach ($allTasks as $index => $task) {
        $topic = $task['topic'];
        $pillar = $task['pillar'];
        $lang = $task['language'];
        
        echo "--> [Article " . ($index + 1) . "/10] Generating '{$topic}' ({$lang}) for pillar '{$pillar}' at {$scheduleDate->toDateTimeString()}\n";
        
        try {
            $job = new GenerateArticleJob(
                $site->id,
                $topic,
                $pillar,
                $lang,
                $scheduleDate->toDateTimeString(),
                1, // Admin user ID
                'scheduled'
            );
            $job->handle();
            echo "    ✅ Done! Scheduled at {$scheduleDate->format('d M Y H:i')}\n";
            $scheduleDate->addDays(2);
        } catch (\Throwable $e) {
            echo "    ❌ Failed: {$e->getMessage()}\n";
        }
        
        // Wait 10 seconds to avoid API limit errors
        sleep(10);
    }
    
    echo "Finished processing site: {$site->name}\n\n";
}

echo "All 40 articles scheduled successfully!\n";
