<?php

return [
    'automation' => [
        // Publishing and generation stay behind a human editorial gate by default.
        'auto_publish' => env('CONTENT_AUTO_PUBLISH_ENABLED', false),
        'auto_topup' => env('CONTENT_AUTO_TOPUP_ENABLED', false),
    ],

    'portfolio' => [
        'm2b.co.id' => [
            '/', '/ads.txt', '/blog/', '/sitemap.xml',
            '/privacy-policy', '/disclaimer', '/ketentuan-layanan',
        ],
        'dira.co.id' => [
            '/', '/ads.txt', '/blog/', '/blog/sitemap.xml', '/blog/feed.xml',
            '/blog/privacy-policy', '/blog/terms-of-service', '/about', '/contact',
        ],
        'gma-world.id' => [
            '/', '/ads.txt', '/blog/', '/blog/sitemap.xml', '/blog/feed.xml',
            '/blog/privacy-policy', '/blog/terms-of-service', '/about', '/contact',
        ],
        'morabangun.com' => [
            '/', '/ads.txt', '/blog', '/blog/sitemap.xml', '/blog/feed.xml',
            '/privacy-policy', '/terms-of-service', '/disclaimer',
        ],
        'ebook.m2b.co.id' => [
            '/stories.html', '/ads.txt', '/sitemap.xml', '/privacy.html',
            '/disclaimer.html', '/comic',
        ],
    ],

    /*
     * Interactive tool pages are served by every portfolio blog, but identical
     * content on several domains reads as duplicate/scaled content to both
     * Search and the AdSense reviewer. Each tool therefore has one owning
     * domain: that domain self-canonicalises and lists the page in its sitemap,
     * every other domain canonicalises across to the owner and drops the page
     * from its own sitemap. The tool stays reachable and usable everywhere.
     *
     * Owner must be a host that actually serves the page with HTTP 200.
     * kalkulator-roi-erp topically belongs to morabangun.com, but that blog
     * runs a separate deployment that does not serve the tool pages, so
     * gma-world.id owns it until morabangun.com serves them too.
     */
    'tool_page_owners' => [
        'kalkulator-bea-masuk' => 'https://m2b.co.id',
        'kalkulator-ekspor-umkm' => 'https://dira.co.id',
        'kalkulator-risiko-buyer' => 'https://dira.co.id',
        'kalkulator-roi-erp' => 'https://gma-world.id',
    ],

    'quality' => [
        'thin_word_count' => 1200,
        'maximum_generic_title_ratio' => 0.35,
        'minimum_published_articles' => 20,
    ],
];
