<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AuditEditorialQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adsense:audit-queue
        {--status=scheduled : Article status to audit: scheduled or published}
        {--site= : Limit the audit to one site domain}
        {--include-alternates : Include articles consolidated to another canonical URL}
        {--json : Output the full report as JSON}
        {--store : Store the report under storage/app/private/adsense-audits}
        {--mark-review : Mark scheduled articles that fail pre-review as needs_revision}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Audit scheduled or published articles for source quality, risky claims, and templated content';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $status = (string) $this->option('status');
        if (! in_array($status, ['scheduled', 'published'], true)) {
            $this->error('Status must be scheduled or published.');

            return self::FAILURE;
        }

        if ($status === 'published' && $this->option('mark-review')) {
            $this->error('--mark-review is restricted to scheduled articles.');

            return self::FAILURE;
        }

        $siteDomain = trim((string) $this->option('site'));
        $articles = Article::query()
            ->with('site:id,domain')
            ->where('status', $status)
            ->when(
                $status === 'published' && ! $this->option('include-alternates'),
                fn ($query) => $query->indexable()
            )
            ->when($siteDomain !== '', fn ($query) => $query->whereHas(
                'site',
                fn ($siteQuery) => $siteQuery->where('domain', $siteDomain)
            ))
            ->orderBy($status === 'scheduled' ? 'scheduled_at' : 'published_at')
            ->get();

        $reports = $articles->map(fn (Article $article): array => $this->review($article))->all();

        if ($this->option('mark-review')) {
            foreach ($reports as $report) {
                if ($report['decision'] !== Article::EDITORIAL_NEEDS_REVISION) {
                    continue;
                }

                Article::query()->whereKey($report['id'])->update([
                    'editorial_status' => Article::EDITORIAL_NEEDS_REVISION,
                    'editorial_reviewer_id' => null,
                    'editorial_reviewed_at' => null,
                    'editorial_review_notes' => 'Pre-review: '.implode(', ', $report['findings']),
                ]);
            }
        }

        $payload = [
            'generated_at' => now()->toIso8601String(),
            'scope' => [
                'status' => $status,
                'site_domain' => $siteDomain !== '' ? $siteDomain : null,
                'include_alternates' => (bool) $this->option('include-alternates'),
            ],
            'article_count' => count($reports),
            'scheduled_count' => $status === 'scheduled' ? count($reports) : null,
            'needs_revision_count' => collect($reports)
                ->where('decision', Article::EDITORIAL_NEEDS_REVISION)
                ->count(),
            'articles' => $reports,
        ];

        if ($this->option('store')) {
            $directory = storage_path('app/private/adsense-audits');
            File::ensureDirectoryExists($directory);
            $scope = $status.($siteDomain !== '' ? '-'.str_replace('.', '-', $siteDomain) : '');
            File::put(
                $directory.'/editorial-'.$scope.'-latest.json',
                json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            );
        }

        if ($this->option('json')) {
            $this->line(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        } else {
            $this->table(
                ['ID', 'Domain', 'Title', 'Words', 'Sources', 'Official', 'Evidence', 'Risk', 'Decision'],
                array_map(fn (array $report): array => [
                    $report['id'],
                    $report['domain'],
                    mb_strimwidth($report['title'], 0, 48, '…'),
                    $report['word_count'],
                    $report['external_source_count'],
                    $report['official_source_count'],
                    $report['evidence_signal_count'],
                    $report['risky_claim_count'],
                    $report['decision'],
                ], $reports)
            );
        }

        return self::SUCCESS;
    }

    private function review(Article $article): array
    {
        $html = (string) $article->content_html;
        $plainText = mb_strtolower(strip_tags($html));
        $title = (string) $article->title;
        $sourceDomains = $this->sourceDomains($html, (string) $article->site?->domain);
        $officialSources = array_values(array_filter($sourceDomains, fn (string $domain): bool => $this->isOfficialSource($domain)));

        $genericTitle = str_contains(mb_strtolower($title), 'panduan lengkap');
        $regulated = $this->containsAny(mb_strtolower($title), [
            'ekspor', 'impor', 'bea cukai', 'kepabeanan', 'bpom', 'fitosanitari',
            'sertifikasi', 'izin ', 'pbg', 'slf', 'gacc', 'haccp',
        ]);
        $riskPhrases = $this->matchedPhrases($plainText, [
            'dijamin', 'jaminan pasti', 'tanpa risiko', 'pasti lolos',
            'dipastikan lancar', 'legal dan aman',
        ]);
        if (preg_match('/100%\s+(aman|berhasil|akurat|lolos|legal|lancar|terjamin|bebas risiko)/u', $plainText)) {
            $riskPhrases[] = '100% certainty claim';
        }
        if (preg_match('/(?:dijual|terjual|mendapatkan|meraih)\s+(?:\d+(?:[.,]\d+)?\s*-\s*\d+(?:[.,]\d+)?x\s+lebih\s+mahal|(?:dengan\s+)?harga premium)/u', $plainText)) {
            $riskPhrases[] = 'unsupported premium price claim';
        }
        if (preg_match('/\+\d+(?:[.,]\d+)?(?:\s*-\s*\d+(?:[.,]\d+)?)?%\s+premium/u', $plainText)) {
            $riskPhrases[] = 'unsupported premium percentage claim';
        }
        $evidenceSignals = $this->matchedPhrases($plainText, [
            'studi kasus', 'contoh perhitungan', 'simulasi', 'checklist',
            'data internal', 'pengalaman kami', 'berdasarkan pengalaman',
        ]);
        if (str_contains(mb_strtolower($html), '<table')) {
            $evidenceSignals[] = 'table';
        }

        $findings = [];
        if ($genericTitle) {
            $findings[] = 'templated_title';
        }
        if ($regulated && count($officialSources) === 0) {
            $findings[] = 'regulated_claims_without_primary_source';
        }
        if ($riskPhrases !== []) {
            $findings[] = 'risky_or_promissory_language';
        }
        if ($evidenceSignals === []) {
            $findings[] = 'no_original_evidence_signal';
        }
        if ((int) $article->word_count < (int) config('adsense.quality.thin_word_count', 1200)) {
            $findings[] = 'thin_content';
        }

        return [
            'id' => $article->id,
            'domain' => $article->site?->domain,
            'title' => $title,
            'slug' => $article->slug,
            'scheduled_at' => optional($article->scheduled_at)?->toIso8601String(),
            'published_at' => optional($article->published_at)?->toIso8601String(),
            'word_count' => (int) $article->word_count,
            'external_source_count' => count($sourceDomains),
            'official_source_count' => count($officialSources),
            'source_domains' => $sourceDomains,
            'official_source_domains' => $officialSources,
            'evidence_signal_count' => count(array_unique($evidenceSignals)),
            'evidence_signals' => array_values(array_unique($evidenceSignals)),
            'risky_claim_count' => count($riskPhrases),
            'risky_claims' => $riskPhrases,
            'findings' => $findings,
            'decision' => $findings === [] ? Article::EDITORIAL_APPROVED : Article::EDITORIAL_NEEDS_REVISION,
        ];
    }

    private function sourceDomains(string $html, string $siteDomain): array
    {
        preg_match_all('/href\s*=\s*["\'](https?:\/\/[^"\']+)["\']/i', $html, $matches);

        return collect($matches[1] ?? [])
            ->map(fn (string $url): ?string => parse_url(html_entity_decode($url), PHP_URL_HOST))
            ->filter()
            ->map(fn (string $domain): string => mb_strtolower(preg_replace('/^www\./', '', $domain)))
            ->reject(fn (string $domain): bool => $domain === $siteDomain || str_ends_with($domain, '.'.$siteDomain))
            ->unique()
            ->values()
            ->all();
    }

    private function isOfficialSource(string $domain): bool
    {
        if (str_ends_with($domain, '.go.id')) {
            return true;
        }

        $officialDomains = [
            'beacukai.go.id', 'bpom.go.id', 'bps.go.id', 'bi.go.id', 'ojk.go.id',
            'europa.eu', 'ec.europa.eu', 'wto.org', 'fao.org', 'who.int',
            'imo.org', 'iso.org', 'ippc.int', 'jdih.kemenkeu.go.id',
        ];

        return collect($officialDomains)->contains(
            fn (string $officialDomain): bool => $domain === $officialDomain
                || str_ends_with($domain, '.'.$officialDomain)
        );
    }

    private function containsAny(string $text, array $phrases): bool
    {
        return $this->matchedPhrases($text, $phrases) !== [];
    }

    private function matchedPhrases(string $text, array $phrases): array
    {
        return array_values(array_filter($phrases, fn (string $phrase): bool => str_contains($text, $phrase)));
    }
}
