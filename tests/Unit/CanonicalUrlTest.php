<?php

namespace Tests\Unit;

use App\Http\Controllers\BlogController;
use App\Models\Site;
use App\Services\SiteResolver;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

class CanonicalUrlTest extends TestCase
{
    #[DataProvider('canonicalCases')]
    public function test_it_builds_canonical_urls_from_the_configured_site_domain(
        string $domain,
        string $path,
        string $expected,
    ): void {
        $site = new Site;
        $site->domain = $domain;

        $controller = new BlogController(new SiteResolver);
        $method = new ReflectionMethod($controller, 'canonicalUrl');

        $this->assertSame($expected, $method->invoke($controller, $site, $path));
    }

    public static function canonicalCases(): array
    {
        return [
            'apex article' => ['m2b.co.id', '/blog/example', 'https://m2b.co.id/blog/example'],
            'www and scheme removed' => ['https://www.m2b.co.id/', '/', 'https://m2b.co.id'],
            'portfolio domain preserved' => ['dira.co.id', 'blog', 'https://dira.co.id/blog'],
        ];
    }
}
