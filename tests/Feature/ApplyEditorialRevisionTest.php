<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ApplyEditorialRevisionTest extends TestCase
{
    use RefreshDatabase;

    private string $revisionFilename;

    protected function setUp(): void
    {
        parent::setUp();

        $this->revisionFilename = 'test-editorial-revision-'.getmypid().'.php';
        $revision = [
            'article_id' => 270,
            'site_domain' => 'dira.co.id',
            'expected' => [
                'title' => 'Original title',
                'slug' => 'original-slug',
                'status' => 'scheduled',
                'editorial_status' => Article::EDITORIAL_NEEDS_REVISION,
                'content_sha256' => hash('sha256', '<p>Original draft.</p>'),
            ],
            'review_notes' => 'Rewritten; awaiting human editorial approval.',
            'changes' => [
                'title' => 'Checklist Fitosanitari Ekspor Jahe dan Kunyit Sebelum Pengiriman',
                'meta_description' => 'Meta description for a source-grounded editorial revision.',
                'excerpt' => 'Revision excerpt.',
                'content_html' => '<p>'.str_repeat('kata ', 1200).'</p>',
            ],
        ];

        File::ensureDirectoryExists(database_path('editorial-revisions'));
        File::put(
            database_path('editorial-revisions/'.$this->revisionFilename),
            "<?php\n\nreturn ".var_export($revision, true).";\n"
        );
    }

    protected function tearDown(): void
    {
        File::delete(database_path('editorial-revisions/'.$this->revisionFilename));

        parent::tearDown();
    }

    public function test_revision_is_applied_without_approving_or_publishing_article(): void
    {
        $article = $this->sourceArticle();

        $this->artisan('articles:apply-editorial-revision', ['revision' => $this->revisionFilename])
            ->assertSuccessful();

        $article->refresh();
        $this->assertSame('scheduled', $article->status);
        $this->assertSame(Article::EDITORIAL_NEEDS_REVISION, $article->editorial_status);
        $this->assertSame('Checklist Fitosanitari Ekspor Jahe dan Kunyit Sebelum Pengiriman', $article->title);
        $this->assertGreaterThanOrEqual(1200, $article->word_count);
        $this->assertNull($article->editorial_reviewer_id);
        $this->assertNull($article->editorial_reviewed_at);
    }

    public function test_revision_aborts_when_source_checksum_has_changed(): void
    {
        $article = $this->sourceArticle();
        $article->update(['content_html' => '<p>Someone edited this draft.</p>']);

        $this->artisan('articles:apply-editorial-revision', ['revision' => $this->revisionFilename])
            ->expectsOutputToContain('Source content_sha256 changed; revision aborted.')
            ->assertFailed();

        $this->assertSame(
            'Original title',
            $article->fresh()->title
        );
    }

    private function sourceArticle(): Article
    {
        $site = Site::query()->create([
            'name' => 'Dira',
            'slug' => 'dira',
            'domain' => 'dira.co.id',
            'is_active' => true,
        ]);
        $user = User::factory()->create();

        return Article::query()->forceCreate([
            'id' => 270,
            'site_id' => $site->id,
            'user_id' => $user->id,
            'title' => 'Original title',
            'slug' => 'original-slug',
            'content_html' => '<p>Original draft.</p>',
            'status' => 'scheduled',
            'scheduled_at' => now()->addDay(),
            'editorial_status' => Article::EDITORIAL_NEEDS_REVISION,
            'word_count' => 1954,
            'pillar' => 'komoditas-ekspor',
        ]);
    }

}
