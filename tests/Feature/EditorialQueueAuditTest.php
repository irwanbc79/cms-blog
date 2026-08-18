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

    private function article(array $overrides = []): Article
    {
        $site = Site::query()->create([
            'name' => 'Queue Audit',
            'slug' => 'queue-audit-'.fake()->unique()->numerify('####'),
            'domain' => 'queue-audit.test',
            'is_active' => true,
        ]);
        $user = User::factory()->create();

        return Article::query()->create(array_merge([
            'site_id' => $site->id,
            'user_id' => $user->id,
            'title' => 'Scheduled article',
            'slug' => 'queue-article-'.fake()->unique()->numerify('####'),
            'content_html' => '<p>Content under review.</p>',
            'status' => 'scheduled',
            'scheduled_at' => now()->addDay(),
            'word_count' => 1500,
        ], $overrides));
    }
}
