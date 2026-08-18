<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditorialQueueAuditTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_audit_can_be_limited_to_one_site_without_mutating_review_state(): void
    {
        $article = $this->article([
            'status' => 'published',
            'published_at' => now()->subDay(),
            'editorial_status' => Article::EDITORIAL_LEGACY,
            'word_count' => 300,
        ], 'dira.co.id');

        $this->artisan('adsense:audit-queue', [
            '--status' => 'published',
            '--site' => 'dira.co.id',
        ])->expectsTable(
            ['ID', 'Domain', 'Title', 'Words', 'Sources', 'Official', 'Evidence', 'Risk', 'Decision'],
            [[
                $article->id,
                'dira.co.id',
                $article->title,
                300,
                0,
                0,
                0,
                0,
                Article::EDITORIAL_NEEDS_REVISION,
            ]]
        )->assertSuccessful();

        $this->assertSame(Article::EDITORIAL_LEGACY, $article->fresh()->editorial_status);
    }

    public function test_published_audit_rejects_mark_review_mutation(): void
    {
        $article = $this->article([
            'status' => 'published',
            'published_at' => now()->subDay(),
            'editorial_status' => Article::EDITORIAL_LEGACY,
        ]);

        $this->artisan('adsense:audit-queue', [
            '--status' => 'published',
            '--mark-review' => true,
        ])->expectsOutput('--mark-review is restricted to scheduled articles.')
            ->assertFailed();

        $this->assertSame(Article::EDITORIAL_LEGACY, $article->fresh()->editorial_status);
    }

    public function test_pre_review_marks_templated_regulated_content_for_revision(): void
    {
        $article = $this->article([
            'title' => 'Panduan Lengkap Impor Produk Wajib 2026',
            'content_html' => '<p>Proses ini legal dan aman serta dipastikan lancar.</p>',
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $article->refresh();
        $this->assertSame(Article::EDITORIAL_NEEDS_REVISION, $article->editorial_status);
        $this->assertStringContainsString('templated_title', $article->editorial_review_notes);
        $this->assertStringContainsString('regulated_claims_without_primary_source', $article->editorial_review_notes);
    }

    public function test_pre_review_never_auto_approves_content(): void
    {
        $article = $this->article([
            'title' => 'Menghitung Kebutuhan Dokumen Impor Berdasarkan Jenis Barang',
            'content_html' => <<<'HTML'
                <p>Studi kasus berikut menggunakan simulasi dan checklist dokumen.</p>
                <table><tr><td>Jenis barang</td><td>Dokumen</td></tr></table>
                <p>Sumber: <a href="https://www.beacukai.go.id/">Direktorat Jenderal Bea dan Cukai</a>.</p>
                HTML,
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $this->assertSame(Article::EDITORIAL_PENDING, $article->fresh()->editorial_status);
    }

    public function test_subdomains_of_primary_authorities_count_as_official_sources(): void
    {
        $article = $this->article([
            'title' => 'Checklist Fitosanitari Ekspor Rimpang',
            'content_html' => <<<'HTML'
                <p>Checklist pemeriksaan disusun dari persyaratan negara tujuan.</p>
                <table><tr><td>Produk</td><td>Dokumen</td></tr></table>
                <p><a href="https://food.ec.europa.eu/plants/plant-health-and-biosecurity/plant-health-rules_en">European Commission</a></p>
                HTML,
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $article->refresh();
        $this->assertSame(Article::EDITORIAL_PENDING, $article->editorial_status);
        $this->assertNull($article->editorial_review_notes);
    }

    public function test_hs_code_and_import_duty_titles_require_primary_sources(): void
    {
        $article = $this->article([
            'title' => 'Perubahan HS Code dan Bea Masuk Barang Kiriman',
            'content_html' => '<p>Simulasi klasifikasi dan tarif untuk pelaku usaha.</p>',
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $article->refresh();
        $this->assertSame(Article::EDITORIAL_NEEDS_REVISION, $article->editorial_status);
        $this->assertStringContainsString('regulated_claims_without_primary_source', $article->editorial_review_notes);
    }

    public function test_percentage_in_formula_is_not_treated_as_a_promissory_claim(): void
    {
        $article = $this->article([
            'title' => 'Scorecard ROI Sistem Operasional',
            'content_html' => <<<'HTML'
                <p>Contoh perhitungan: ROI = manfaat bersih dibagi biaya lalu dikali 100%.</p>
                <table><tr><td>Biaya</td><td>Manfaat</td></tr></table>
                HTML,
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $this->assertSame(Article::EDITORIAL_PENDING, $article->fresh()->editorial_status);
    }

    public function test_percentage_certainty_claim_is_still_flagged(): void
    {
        $article = $this->article([
            'title' => 'Evaluasi Sistem Operasional',
            'content_html' => <<<'HTML'
                <p>Metode ini 100% berhasil untuk semua perusahaan.</p>
                <table><tr><td>Proses</td><td>Hasil</td></tr></table>
                HTML,
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $article->refresh();
        $this->assertSame(Article::EDITORIAL_NEEDS_REVISION, $article->editorial_status);
        $this->assertStringContainsString('risky_or_promissory_language', $article->editorial_review_notes);
    }

    public function test_no_risk_warning_is_not_treated_as_a_promise(): void
    {
        $article = $this->article([
            'title' => 'Evaluasi Kesiapan Administrasi Perusahaan',
            'content_html' => <<<'HTML'
                <p>Jangan menganggap izin teknis bisa menyusul tanpa risiko.</p>
                <table><tr><td>Dokumen</td><td>Status</td></tr></table>
                HTML,
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $this->assertSame(Article::EDITORIAL_PENDING, $article->fresh()->editorial_status);
    }

    public function test_unqualified_no_risk_claim_is_still_flagged(): void
    {
        $article = $this->article([
            'title' => 'Evaluasi Kesiapan Administrasi Perusahaan',
            'content_html' => '<p>Layanan ini menyelesaikan proses tanpa risiko.</p>',
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $article->refresh();
        $this->assertSame(Article::EDITORIAL_NEEDS_REVISION, $article->editorial_status);
        $this->assertStringContainsString('risky_or_promissory_language', $article->editorial_review_notes);
    }

    public function test_premium_price_warning_is_not_treated_as_a_promise(): void
    {
        $article = $this->article([
            'title' => 'Scorecard Harga Produk Organik',
            'content_html' => <<<'HTML'
                <p>Harga premium tidak boleh dijadikan asumsi. Gunakan simulasi biaya dan kontrak buyer.</p>
                <table><tr><td>Skenario</td><td>Margin</td></tr></table>
                HTML,
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $this->assertSame(Article::EDITORIAL_PENDING, $article->fresh()->editorial_status);
    }

    public function test_unsupported_premium_multiplier_is_flagged(): void
    {
        $article = $this->article([
            'title' => 'Harga Produk Organik',
            'content_html' => '<p>Kopi organik bisa dijual 3-5x lebih mahal di pasar ekspor.</p>',
        ]);

        $this->artisan('adsense:audit-queue --mark-review')->assertSuccessful();

        $article->refresh();
        $this->assertSame(Article::EDITORIAL_NEEDS_REVISION, $article->editorial_status);
        $this->assertStringContainsString('risky_or_promissory_language', $article->editorial_review_notes);
    }

    private function article(array $overrides = [], string $domain = 'queue-audit.test'): Article
    {
        $site = Site::query()->create([
            'name' => 'Queue Audit',
            'slug' => 'queue-audit-'.fake()->unique()->numerify('####'),
            'domain' => $domain,
            'is_active' => true,
        ]);
        $user = User::factory()->create();

        $requestedEditorialStatus = $overrides['editorial_status'] ?? Article::EDITORIAL_PENDING;
        if (($overrides['status'] ?? 'scheduled') === 'published') {
            $overrides['editorial_status'] = Article::EDITORIAL_APPROVED;
        }

        $article = Article::query()->create(array_merge([
            'site_id' => $site->id,
            'user_id' => $user->id,
            'title' => 'Scheduled article',
            'slug' => 'queue-article-'.fake()->unique()->numerify('####'),
            'content_html' => '<p>Content under review.</p>',
            'status' => 'scheduled',
            'scheduled_at' => now()->addDay(),
            'word_count' => 1500,
        ], $overrides));

        if ($article->status === 'published' && $requestedEditorialStatus !== Article::EDITORIAL_APPROVED) {
            Article::query()->whereKey($article->id)->update([
                'editorial_status' => $requestedEditorialStatus,
            ]);
        }

        return $article->refresh();
    }
}
