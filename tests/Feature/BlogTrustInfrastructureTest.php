<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Site;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTrustInfrastructureTest extends TestCase
{
    use RefreshDatabase;

    public function test_about_page_exposes_editorial_identity_and_process(): void
    {
        $this->site();

        $this->get('https://dira.co.id/blog/about')
            ->assertOk()
            ->assertSee('Tim Editorial PT. Dira Baraka Mulia')
            ->assertSee('AI dan peninjauan manusia')
            ->assertSee('Iklan dan independensi editorial');
    }

    public function test_article_uses_public_editorial_byline_instead_of_cms_login(): void
    {
        $site = $this->site();
        $admin = User::factory()->create(['name' => 'admin']);

        Article::query()->forceCreate([
            'site_id' => $site->id,
            'user_id' => $admin->id,
            'title' => 'Artikel Uji Editorial',
            'slug' => 'artikel-uji-editorial',
            'excerpt' => 'Ringkasan artikel uji.',
            'content_html' => '<p>Isi artikel uji.</p>',
            'status' => 'published',
            'published_at' => now()->subDays(2),
            'editorial_status' => Article::EDITORIAL_APPROVED,
            'word_count' => 1500,
        ]);

        $response = $this->get('https://dira.co.id/blog/artikel-uji-editorial')->assertOk();

        $response->assertSee('Tim Editorial PT. Dira Baraka Mulia');
        $response->assertDontSee('<meta name="author" content="admin">', false);
    }

    public function test_sitemap_includes_indexable_trust_pages(): void
    {
        $this->site();

        $sitemap = $this->get('https://dira.co.id/sitemap.xml')->assertOk();

        $sitemap->assertSee('https://dira.co.id/blog/about', false);
        $sitemap->assertSee('https://dira.co.id/blog/privacy-policy', false);
        $sitemap->assertSee('https://dira.co.id/blog/terms-of-service', false);
    }

    public function test_ad_slots_include_unfilled_collapse_styles_and_wrapper(): void
    {
        $site = $this->site();
        $site->update([
            'adsense_publisher_id' => 'ca-pub-1234567890123456',
            'adsense_ad_slots' => [
                'display_top' => '1234567890',
            ],
        ]);
        $admin = User::factory()->create();

        Article::query()->forceCreate([
            'site_id' => $site->id,
            'user_id' => $admin->id,
            'title' => 'Artikel Uji Slot Iklan',
            'slug' => 'artikel-uji-slot-iklan',
            'excerpt' => 'Ringkasan artikel uji slot iklan.',
            'content_html' => '<p>Isi artikel uji slot iklan.</p>',
            'status' => 'published',
            'published_at' => now()->subDays(2),
            'editorial_status' => Article::EDITORIAL_APPROVED,
            'word_count' => 1500,
        ]);

        $response = $this->get('https://dira.co.id/blog/artikel-uji-slot-iklan')->assertOk();

        $response->assertSee('ins.adsbygoogle[data-ad-status="unfilled"]', false);
        $response->assertSee('.adsense-slot:has(> ins.adsbygoogle[data-ad-status="unfilled"])', false);
        $response->assertSee('class="adsense-slot max-w-4xl', false);
    }

    private function site(): Site
    {
        return Site::query()->create([
            'name' => 'Dira',
            'slug' => 'dira',
            'domain' => 'dira.co.id',
            'contact_email' => 'editorial@dira.co.id',
            'languages' => ['id'],
            'is_active' => true,
        ]);
    }
}
