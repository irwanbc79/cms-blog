<?php

namespace Tests\Unit;

use App\Models\Site;
use App\Services\Ads\AdInjector;
use App\Services\Ads\AdService;
use Tests\TestCase;

class AdInjectorTest extends TestCase
{
    public function test_inject_after_paragraph(): void
    {
        $injector = new AdInjector();
        $html = "<p>Paragraf satu.</p><p>Paragraf dua.</p><p>Paragraf tiga.</p>";
        $adHtml = '<div class="ad-unit">IKLAN</div>';

        $result = $injector->injectAfterParagraph($html, $adHtml, 2);

        $this->assertStringContainsString("<p>Paragraf dua.</p>\n<div class=\"ad-unit\">IKLAN</div>\n<p>Paragraf tiga.</p>", $result);
    }

    public function test_inject_article_ads_single_ad(): void
    {
        $site = new Site([
            'adsense_publisher_id' => 'pub-1234567890',
            'adsense_ad_slots' => [
                'in_article' => '2222222222',
            ],
        ]);
        $adService = new AdService($site);
        $injector = new AdInjector();

        $html = "<p>Paragraf satu.</p><p>Paragraf dua.</p><p>Paragraf tiga.</p><p>Paragraf empat.</p>";
        $result = $injector->injectArticleAds($html, $adService);

        $this->assertStringContainsString('data-ad-slot="2222222222"', $result);
        $this->assertStringContainsString('data-ad-layout="in-article"', $result);
        $this->assertStringContainsString('data-ad-lazy="true"', $result);
    }

    public function test_no_injection_when_article_too_short(): void
    {
        $site = new Site([
            'adsense_publisher_id' => 'pub-1234567890',
            'adsense_ad_slots' => [
                'in_article' => '2222222222',
            ],
        ]);
        $adService = new AdService($site);
        $injector = new AdInjector();

        $shortHtml = "<p>Paragraf pendek cuma satu.</p>";
        $result = $injector->injectArticleAds($shortHtml, $adService);

        $this->assertEquals($shortHtml, $result);
    }
}
