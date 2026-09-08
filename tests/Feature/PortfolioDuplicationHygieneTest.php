<?php

namespace Tests\Feature;

use App\Models\Site;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioDuplicationHygieneTest extends TestCase
{
    use RefreshDatabase;

    public function test_tool_page_self_canonicalises_on_its_owning_domain(): void
    {
        $this->site('Dira', 'dira', 'dira.co.id');

        $this->get('https://dira.co.id/blog/kalkulator-ekspor-umkm')
            ->assertOk()
            ->assertSee('<link rel="canonical" href="https://dira.co.id/blog/kalkulator-ekspor-umkm">', false);
    }

    public function test_tool_page_canonicalises_across_to_the_owner_on_other_domains(): void
    {
        $this->site('GMA World', 'gma', 'gma-world.id');

        $this->get('https://gma-world.id/blog/kalkulator-ekspor-umkm')
            ->assertOk()
            ->assertSee('<link rel="canonical" href="https://dira.co.id/blog/kalkulator-ekspor-umkm">', false);
    }

    public function test_sitemap_lists_only_the_tool_pages_the_domain_owns(): void
    {
        $this->site('GMA World', 'gma', 'gma-world.id');

        $sitemap = $this->get('https://gma-world.id/sitemap.xml')->assertOk();

        $sitemap->assertSee('https://gma-world.id/blog/kalkulator-roi-erp', false);
        $sitemap->assertDontSee('https://gma-world.id/blog/kalkulator-ekspor-umkm', false);
        $sitemap->assertDontSee('https://gma-world.id/blog/kalkulator-risiko-buyer', false);
        $sitemap->assertDontSee('https://gma-world.id/blog/kalkulator-bea-masuk', false);
    }

    public function test_sitemap_still_lists_per_site_trust_pages(): void
    {
        $this->site('GMA World', 'gma', 'gma-world.id');

        $sitemap = $this->get('https://gma-world.id/sitemap.xml')->assertOk();

        $sitemap->assertSee('https://gma-world.id/blog/about', false);
        $sitemap->assertSee('https://gma-world.id/blog/privacy-policy', false);
        $sitemap->assertSee('https://gma-world.id/blog/terms-of-service', false);
    }

    private function site(string $name, string $slug, string $domain): Site
    {
        return Site::query()->create([
            'name' => $name,
            'slug' => $slug,
            'domain' => $domain,
            'contact_email' => 'editorial@'.$domain,
            'languages' => ['id'],
            'is_active' => true,
        ]);
    }
}
