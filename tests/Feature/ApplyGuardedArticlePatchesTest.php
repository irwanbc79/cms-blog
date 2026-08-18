<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ApplyGuardedArticlePatchesTest extends TestCase
{
    use RefreshDatabase;

    private string $manifestFilename;

    protected function setUp(): void
    {
        parent::setUp();

        $this->manifestFilename = 'test-guarded-patches-'.getmypid().'.php';
        File::ensureDirectoryExists(database_path('article-patches'));
    }

    protected function tearDown(): void
    {
        File::delete(database_path('article-patches/'.$this->manifestFilename));

        parent::tearDown();
    }

    public function test_published_patch_requires_double_opt_in(): void
    {
        $article = $this->article();
        $this->writeManifest($article, true);

        $this->artisan('articles:apply-guarded-patches', [
            'manifest' => $this->manifestFilename,
        ])->expectsOutputToContain('Published articles require manifest allow_published=true and --allow-published.')
            ->assertFailed();

        $this->assertStringContainsString('legal dan aman', $article->fresh()->content_html);
    }

    public function test_patch_changes_only_exact_text_and_requires_re_review(): void
    {
        $article = $this->article();
        $this->writeManifest($article, true);

        $this->artisan('articles:apply-guarded-patches', [
            'manifest' => $this->manifestFilename,
            '--allow-published' => true,
        ])->assertSuccessful();

        $article->refresh();
        $this->assertSame('published', $article->status);
        $this->assertSame(Article::EDITORIAL_NEEDS_REVISION, $article->editorial_status);
        $this->assertStringNotContainsString('legal dan aman', $article->content_html);
        $this->assertStringContainsString('perlu diverifikasi', $article->content_html);
        $this->assertNull($article->editorial_reviewer_id);
        $this->assertNull($article->editorial_reviewed_at);
    }

    public function test_patch_aborts_when_exact_occurrence_changed(): void
    {
        $article = $this->article();
        $this->writeManifest($article, true, 2);

        $this->artisan('articles:apply-guarded-patches', [
            'manifest' => $this->manifestFilename,
            '--allow-published' => true,
        ])->expectsOutputToContain("Article {$article->id} replacement occurrence changed: expected 2, found 1.")
            ->assertFailed();

        $this->assertStringContainsString('legal dan aman', $article->fresh()->content_html);
    }

    private function article(): Article
    {
        $site = Site::query()->create([
            'name' => 'Dira',
            'slug' => 'dira',
            'domain' => 'dira.co.id',
            'is_active' => true,
        ]);
        $article = Article::query()->create([
            'site_id' => $site->id,
            'user_id' => User::factory()->create()->id,
            'title' => 'Published claim test',
            'slug' => 'published-claim-test',
            'content_html' => '<p>Proses ini legal dan aman.</p><p>'.str_repeat('kata ', 1250).'</p>',
            'status' => 'published',
            'published_at' => now()->subDay(),
            'editorial_status' => Article::EDITORIAL_APPROVED,
            'word_count' => 1255,
        ]);
        Article::query()->whereKey($article->id)->update([
            'editorial_status' => Article::EDITORIAL_LEGACY,
        ]);

        return $article->refresh();
    }

    private function writeManifest(Article $article, bool $allowPublished, int $occurrences = 1): void
    {
        $manifest = [
            'site_domain' => 'dira.co.id',
            'allow_published' => $allowPublished,
            'articles' => [[
                'article_id' => $article->id,
                'expected' => [
                    'title' => $article->title,
                    'slug' => $article->slug,
                    'status' => $article->status,
                    'editorial_status' => $article->editorial_status,
                    'content_sha256' => hash('sha256', (string) $article->content_html),
                ],
                'replacements' => [[
                    'old' => 'legal dan aman',
                    'new' => 'perlu diverifikasi',
                    'expected_occurrences' => $occurrences,
                ]],
            ]],
        ];

        File::put(
            database_path('article-patches/'.$this->manifestFilename),
            "<?php\n\nreturn ".var_export($manifest, true).";\n"
        );
    }
}
