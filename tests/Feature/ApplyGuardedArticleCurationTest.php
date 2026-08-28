<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ApplyGuardedArticleCurationTest extends TestCase
{
    use RefreshDatabase;

    private string $manifestFilename;

    protected function setUp(): void
    {
        parent::setUp();

        $this->manifestFilename = 'test-article-curation-'.getmypid().'.php';
        File::ensureDirectoryExists(database_path('article-curations'));
    }

    protected function tearDown(): void
    {
        File::delete(database_path('article-curations/'.$this->manifestFilename));

        parent::tearDown();
    }

    public function test_dry_run_validates_without_changing_article(): void
    {
        $article = $this->article();
        $this->writeManifest($article);

        $this->artisan('articles:apply-curation', [
            'manifest' => $this->manifestFilename,
            '--dry-run' => true,
            '--allow-published' => true,
        ])->expectsOutputToContain('Curation manifest valid. No database changes were made.')
            ->assertSuccessful();

        $this->assertSame('published', $article->fresh()->status);
    }

    public function test_apply_preserves_record_as_draft_and_removes_public_url(): void
    {
        $article = $this->article();
        $this->writeManifest($article);

        $this->artisan('articles:apply-curation', [
            'manifest' => $this->manifestFilename,
            '--allow-published' => true,
        ])->assertSuccessful();

        $article->refresh();
        $this->assertSame('draft', $article->status);
        $this->assertSame(Article::EDITORIAL_NEEDS_REVISION, $article->editorial_status);
        $this->assertNotNull($article->editorial_review_notes);

        Cache::flush();
        $this->get('https://gma-world.id/blog/'.$article->slug)->assertNotFound();
        $this->get('https://gma-world.id/sitemap.xml')
            ->assertOk()
            ->assertDontSee($article->slug, false);
    }

    public function test_apply_aborts_when_content_checksum_changed(): void
    {
        $article = $this->article();
        $this->writeManifest($article);
        Article::query()->whereKey($article->id)->update([
            'content_html' => '<p>Changed after manifest creation.</p>',
        ]);

        $this->artisan('articles:apply-curation', [
            'manifest' => $this->manifestFilename,
            '--allow-published' => true,
        ])->expectsOutputToContain("Article {$article->id} content_sha256 changed; curation aborted.")
            ->assertFailed();

        $this->assertSame('published', $article->fresh()->status);
    }

    private function article(): Article
    {
        $site = Site::query()->create([
            'name' => 'GMA World',
            'slug' => 'gma-world',
            'domain' => 'gma-world.id',
            'is_active' => true,
        ]);
        $user = User::factory()->create();

        $article = Article::query()->forceCreate([
            'site_id' => $site->id,
            'user_id' => $user->id,
            'title' => 'Thin legacy article',
            'slug' => 'thin-legacy-article',
            'content_html' => '<p>Legacy content.</p>',
            'status' => 'published',
            'published_at' => now()->subDay(),
            'editorial_status' => Article::EDITORIAL_APPROVED,
            'word_count' => 300,
        ]);

        Article::query()->whereKey($article->id)->update([
            'editorial_status' => Article::EDITORIAL_LEGACY,
        ]);

        return $article->refresh();
    }

    private function writeManifest(Article $article): void
    {
        $manifest = [
            'site_domain' => 'gma-world.id',
            'allow_published' => true,
            'review_notes' => 'Test curation.',
            'articles' => [[
                'article_id' => $article->id,
                'expected' => [
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'status' => $article->status,
                    'editorial_status' => $article->editorial_status,
                    'canonical_url' => '',
                    'content_sha256' => hash('sha256', (string) $article->content_html),
                ],
            ]],
        ];

        File::put(
            database_path('article-curations/'.$this->manifestFilename),
            "<?php\n\nreturn ".var_export($manifest, true).";\n"
        );
    }
}
