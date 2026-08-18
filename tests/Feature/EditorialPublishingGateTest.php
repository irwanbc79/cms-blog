<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class EditorialPublishingGateTest extends TestCase
{
    use RefreshDatabase;

    public function test_pending_article_cannot_be_published(): void
    {
        $article = $this->article();

        $this->expectException(ValidationException::class);

        $article->update(['status' => 'published']);
    }

    public function test_approved_article_can_be_published(): void
    {
        $reviewer = User::factory()->create();
        $article = $this->article();

        $article->approveEditorially($reviewer->id, 'Primary sources and claims verified.');
        $article->update(['status' => 'published']);

        $this->assertSame('published', $article->fresh()->status);
        $this->assertSame(Article::EDITORIAL_APPROVED, $article->fresh()->editorial_status);
        $this->assertNotNull($article->fresh()->editorial_reviewed_at);
    }

    public function test_editing_approved_unpublished_content_resets_review(): void
    {
        $reviewer = User::factory()->create();
        $article = $this->article(['status' => 'draft']);
        $article->approveEditorially($reviewer->id, 'Approved before final edit.');

        $article->update(['title' => 'Materially revised title']);

        $article->refresh();
        $this->assertSame(Article::EDITORIAL_PENDING, $article->editorial_status);
        $this->assertNull($article->editorial_reviewer_id);
        $this->assertNull($article->editorial_reviewed_at);
    }

    public function test_scheduler_publishes_only_approved_articles(): void
    {
        $reviewer = User::factory()->create();
        $approved = $this->article(['slug' => 'approved-article']);
        $pending = $this->article(['slug' => 'pending-article']);
        $approved->approveEditorially($reviewer->id, 'Reviewed and approved.');

        $this->artisan('articles:publish-scheduled')->assertSuccessful();

        $this->assertSame('published', $approved->fresh()->status);
        $this->assertSame('scheduled', $pending->fresh()->status);
    }

    private function article(array $overrides = []): Article
    {
        $site = Site::query()->first() ?? Site::query()->create([
            'name' => 'Editorial Test',
            'slug' => 'editorial-test',
            'domain' => 'editorial.test',
            'is_active' => true,
        ]);

        $user = User::factory()->create();

        return Article::query()->create(array_merge([
            'site_id' => $site->id,
            'user_id' => $user->id,
            'title' => 'Scheduled article awaiting review',
            'slug' => 'scheduled-article-'.fake()->unique()->numerify('####'),
            'content_html' => '<p>Substantial test content.</p>',
            'status' => 'scheduled',
            'scheduled_at' => now()->subMinute(),
            'word_count' => 1500,
        ], $overrides));
    }
}
