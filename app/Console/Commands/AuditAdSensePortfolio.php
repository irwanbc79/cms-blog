<?php

namespace App\Console\Commands;

use App\Models\Site;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Throwable;

class AuditAdSensePortfolio extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adsense:audit
        {--live : Check required public URLs}
        {--json : Output the full report as JSON}
        {--store : Store the report under storage/app/private/adsense-audits}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Audit AdSense configuration, editorial quality, and live readiness across the portfolio';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $portfolio = config('adsense.portfolio', []);
        $reports = [];

        foreach ($portfolio as $domain => $paths) {
            $site = Site::query()->where('domain', $domain)->first();
            $content = $site ? $this->contentMetrics($site) : null;
            $monetization = $site ? $this->monetizationMetrics($site) : null;
            $live = $this->option('live') ? $this->liveMetrics($domain, $paths) : null;

            $reports[] = [
                'domain' => $domain,
                'checked_at' => now()->toIso8601String(),
                'content' => $content,
                'monetization' => $monetization,
                'live' => $live,
                'decision' => $this->decision($content, $monetization, $live),
            ];
        }

        $payload = [
            'generated_at' => now()->toIso8601String(),
            'editorial_automation' => [
                'auto_publish' => (bool) config('adsense.automation.auto_publish'),
                'auto_topup' => (bool) config('adsense.automation.auto_topup'),
            ],
            'sites' => $reports,
        ];

        if ($this->option('store')) {
            $directory = storage_path('app/private/adsense-audits');
            File::ensureDirectoryExists($directory);
            File::put($directory.'/latest.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            File::put($directory.'/'.now()->format('Y-m-d').'.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        if ($this->option('json')) {
            $this->line(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } else {
            $this->table(
                ['Domain', 'Published', 'Avg words', 'Thin', 'Generic', 'Scheduled', 'Live', 'Decision'],
                array_map(fn (array $report) => [
                    $report['domain'],
                    $report['content']['published'] ?? '-',
                    $report['content']['average_words'] ?? '-',
                    $report['content']['thin_articles'] ?? '-',
                    isset($report['content']['generic_title_ratio'])
                        ? round($report['content']['generic_title_ratio'] * 100).'%'
                        : '-',
                    $report['content']['scheduled'] ?? '-',
                    $report['live'] === null
                        ? 'not checked'
                        : ($report['live']['failed'] === 0 ? 'pass' : $report['live']['failed'].' failed'),
                    $report['decision']['status'],
                ], $reports)
            );
        }

        return collect($reports)->contains(fn (array $report) => $report['decision']['status'] === 'blocked')
            ? self::FAILURE
            : self::SUCCESS;
    }

    private function contentMetrics(Site $site): array
    {
        $published = $site->articles()->published();
        $publishedCount = (clone $published)->count();
        $genericTitles = (clone $published)->where('title', 'like', '%Panduan Lengkap%')->count();
        $thinWordCount = (int) config('adsense.quality.thin_word_count', 1200);

        return [
            'published' => $publishedCount,
            'scheduled' => $site->articles()->scheduled()->count(),
            'average_words' => (int) round((float) ((clone $published)->avg('word_count') ?? 0)),
            'thin_articles' => (clone $published)->where('word_count', '<', $thinWordCount)->count(),
            'generic_titles' => $genericTitles,
            'generic_title_ratio' => $publishedCount > 0 ? $genericTitles / $publishedCount : 0,
            'missing_meta_description' => (clone $published)
                ->where(fn ($query) => $query->whereNull('meta_description')->orWhere('meta_description', ''))
                ->count(),
            'missing_featured_image' => (clone $published)
                ->where(fn ($query) => $query->whereNull('featured_image_url')->orWhere('featured_image_url', ''))
                ->count(),
            'last_published_at' => (clone $published)->max('published_at'),
        ];
    }

    private function monetizationMetrics(Site $site): array
    {
        $publisher = $site->getAdsensePublisher();
        $slots = array_values(array_filter($site->adsense_ad_slots ?? []));
        $invalidSlots = array_values(array_filter(
            $slots,
            fn ($slot) => ! preg_match('/^(?!0{10})\d{10}$/', (string) $slot)
        ));

        return [
            'publisher_valid' => is_string($publisher) && (bool) preg_match('/^ca-pub-\d{16}$/', $publisher),
            'slot_count' => count($slots),
            'slots_valid' => count($slots) > 0 && $invalidSlots === [],
            'analytics_configured' => filled($site->google_analytics_id),
            'site_verification_configured' => filled($site->google_site_verification),
            'ads_txt_configured' => filled($site->ads_txt_content),
        ];
    }

    private function liveMetrics(string $domain, array $paths): array
    {
        $checks = [];

        foreach ($paths as $path) {
            $url = 'https://'.$domain.$path;

            try {
                $response = Http::timeout(12)
                    ->withHeaders(['User-Agent' => 'M2B-AdSense-Readiness-Monitor/1.0'])
                    ->get($url);
                $checks[$path] = $response->status();
            } catch (Throwable $exception) {
                $checks[$path] = 0;
            }
        }

        return [
            'passed' => collect($checks)->filter(fn (int $status) => $status >= 200 && $status < 400)->count(),
            'failed' => collect($checks)->reject(fn (int $status) => $status >= 200 && $status < 400)->count(),
            'checks' => $checks,
        ];
    }

    private function decision(?array $content, ?array $monetization, ?array $live): array
    {
        $critical = [];
        $warnings = [];

        if ($content !== null) {
            if ($content['published'] < (int) config('adsense.quality.minimum_published_articles', 20)) {
                $critical[] = 'insufficient_published_content';
            }
            if ($content['thin_articles'] > 0) {
                $warnings[] = 'thin_articles_present';
            }
            if ($content['generic_title_ratio'] > (float) config('adsense.quality.maximum_generic_title_ratio', 0.35)) {
                $warnings[] = 'templated_title_pattern';
            }
            if ($content['missing_meta_description'] > 0 || $content['missing_featured_image'] > 0) {
                $warnings[] = 'incomplete_article_metadata';
            }
            if ($content['scheduled'] > 0) {
                $warnings[] = 'scheduled_articles_require_review';
            }
        }

        if ($monetization !== null) {
            if (! $monetization['publisher_valid'] || ! $monetization['slots_valid']) {
                $critical[] = 'invalid_adsense_configuration';
            }
            if (! $monetization['analytics_configured']) {
                $warnings[] = 'analytics_not_configured';
            }
            if (! $monetization['site_verification_configured']) {
                $warnings[] = 'site_verification_not_configured';
            }
            if (! $monetization['ads_txt_configured']) {
                $warnings[] = 'ads_txt_not_configured_in_cms';
            }
        }

        if ($live !== null && $live['failed'] > 0) {
            $critical[] = 'required_live_url_failed';
        }

        return [
            'status' => $critical !== [] ? 'blocked' : ($warnings !== [] ? 'editorial-hold' : 'ready-for-account-review'),
            'critical' => array_values(array_unique($critical)),
            'warnings' => array_values(array_unique($warnings)),
        ];
    }
}
