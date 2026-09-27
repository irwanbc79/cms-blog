<?php

namespace Tests\Unit;

use App\Models\Site;
use App\Services\Ads\AdService;
use Tests\TestCase;

class AdServiceTest extends TestCase
{
    public function test_normalizes_publisher_id(): void
    {
        $adService = new AdService();

        $this->assertEquals('ca-pub-5616961797801657', $adService->normalizePublisherId('pub-5616961797801657'));
        $this->assertEquals('ca-pub-5616961797801657', $adService->normalizePublisherId('ca-pub-5616961797801657'));
        $this->assertNull($adService->normalizePublisherId(null));
    }

    public function test_resolves_slots_from_site(): void
    {
        $site = new Site([
            'adsense_publisher_id' => 'pub-1234567890',
            'adsense_ad_slots' => [
                'display_top'    => '1111111111',
                'in_article'     => '2222222222',
                'sidebar_sticky' => '3333333333',
                'multiplex'      => '4444444444',
            ],
        ]);

        $adService = new AdService($site);

        $this->assertTrue($adService->enabled());
        $this->assertEquals('ca-pub-1234567890', $adService->publisherId());
        $this->assertEquals('pub-1234567890', $adService->rawPublisherId());
        $this->assertEquals('1111111111', $adService->slot('display_top'));
        $this->assertEquals('2222222222', $adService->slot('in_article_1'));
        $this->assertEquals('3333333333', $adService->slot('sidebar'));
        $this->assertEquals('4444444444', $adService->slot('multiplex'));
    }

    public function test_prevents_ad_stacking_when_multiplex_active(): void
    {
        $siteWithMultiplex = new Site([
            'adsense_publisher_id' => 'ca-pub-1234567890',
            'adsense_ad_slots' => [
                'display_bottom' => '5555555555',
                'multiplex'      => '4444444444',
            ],
        ]);

        $adServiceWithMultiplex = new AdService($siteWithMultiplex);
        // Because multiplex is active, display_bottom should be omitted
        $this->assertFalse($adServiceWithMultiplex->shouldShowDisplayBottom());

        $siteWithoutMultiplex = new Site([
            'adsense_publisher_id' => 'ca-pub-1234567890',
            'adsense_ad_slots' => [
                'display_bottom' => '5555555555',
            ],
        ]);

        $adServiceWithoutMultiplex = new AdService($siteWithoutMultiplex);
        // Because multiplex is not active, display_bottom should be shown
        $this->assertTrue($adServiceWithoutMultiplex->shouldShowDisplayBottom());
    }
}
