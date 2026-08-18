<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class CanonicalConsolidationTest extends TestCase
{
    use RefreshDatabase;

    private string $manifestFilename;

    protected function setUp(): void
    {
        parent::setUp();

        $this->manifestFilename = 'test-canonical-consolidation-'.getmypid().'.php';
        File::ensureDirectoryExists(database_path('canonical-consolidations'));
    }

    protected function tearDown(): void
    {
        File::delete(database_path('canonical-consolidations/'.$this->manifestFilename));

        parent::tearDown();
    }

    public function test_dry_run_validates_without_changing_article(): void
    {
        [$target, $alternate] = $this->articles();
        $this->writeManifest($target, $alternate);

        $this->artisan('articles:apply-canonical-consolidation', [
            'manifest' => $this->manifestFilename,
            '--dry-run' => true,
        ])->expectsOutputToContain('Manifest valid. No database changes were made.')
            ->assertSuccessful();

        $this->assertNull($alternate->fresh()->canonical_url);
    }

    public function test_apply_redirects_alternate_and_excludes_it_from_sitemap(): void
    {
        [$target, $alternate] = $this->articles();
        $this->writeManifest($target, $alternate);
        $canonicalUrl = 'https://dira.co.id/blog/'.$target->slug;

        $this->artisan('articles:apply-canonical-consolidation', [
            'manifest' => $this->manifestFilename,
        ])->assertSuccessful();

        $alternate->refresh();
        $this->assertSame($canonicalUrl, $alternate->canonical_url);
        $this->assertSame('published', $alternate->status);

        Cache::flush();
        $this->get('https://dira.co.id/blog/'.$alternate->slug)
            ->assertStatus(301)
            ->assertRedirect($canonicalUrl);

        $sitemap = $this->get('https://dira.co.id/sitemap.xml')->assertOk();
        $sitemap->assertSee($target->slug, false);
        $sitemap->assertDontSee($alternate->slug, false);
    }

    public function test_apply_aborts_when_source_checksum_changed(): void
    {
        [$target, $alternate] = $this->articles();
        $this->writeManifest($target, $alternate);
        Article::query()->whereKey($alternate->id)->update([
            'content_html' => '<p>Changed after manifest creation.</p>',
        ]);

        $this->artisan('articles:apply-canonical-consolidation', [
            'manifest' => $this->manifestFilename,
        ])->expectsOutputToContain("Alternate {$alternate->id} content_sha256 changed; consolidation aborted.")
            ->assertFailed();

        $this->assertNull($alternate->fresh()->canonical_url);
    }

    private function articles(): array
    {
        $site = Site::query()->create([
            'name' => 'Dira',
            'slug' => 'dira',
            'domain' => 'dira.co.id',
            'is_active' => true,
        ]);
        $user = User::factory()->create();

        $target = Article::query()->forceCreate([
            'site_id' => $site->id,
            'user_id' => $user->id,
            'title' => 'Undername pillar',
            'slug' => 'undername-pillar',
            'content_html' => '<p>Canonical target content.</p>',
            'status' => 'published',
            'published_at' => now()->subDay(),
            'editorial_status' => Article::EDITORIAL_APPROVED,
            'word_count' => 1500,
        ]);

        $alternate = Article::query()->forceCreate([
            'site_id' => $site->id,
            'user_id' => $user->id,
            'title' => 'Duplicate undername article',
            'slug' => 'duplicate-undername',
            'content_html' => '<p>Duplicate content.</p>',
            'status' => 'published',
            'published_at' => now()->subHours(12),
            'editorial_status' => Article::EDITORIAL_APPROVED,
            'word_count' => 1500,
        ]);

        Article::query()->whereKey($target->id)->update([
            'editorial_status' => Article::EDITORIAL_LEGACY,
        ]);
        Article::query()->whereKey($alternate->id)->update([
            'editorial_status' => Article::EDITORIAL_LEGACY,
        ]);

        return [$target->refresh(), $alternate->refresh()];
    }

    private function writeManifest(Article $target, Article $alternate): void
    {
        $expected = fn (Article $article) => [
            'title' => $article->title,
            'slug' => $article->slug,
            'status' => $article->status,
            'editorial_status' => $article->editorial_status,
            'canonical_url' => '',
            'content_sha256' => hash('sha256', (string) $article->content_html),
        ];
        $manifest = [
            'site_domain' => 'dira.co.id',
            'target' => [
                'article_id' => $target->id,
                'expected' => $expected($target),
            ],
            'alternates' => [[
                'article_id' => $alternate->id,
                'expected' => $expected($alternate),
            ]],
        ];

        File::put(
            database_path('canonical-consolidations/'.$this->manifestFilename),
            "<?php\n\nreturn ".var_export($manifest, true).";\n"
        );
    }
}
