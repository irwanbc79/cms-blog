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

    'quality' => [
        'thin_word_count' => 1200,
        'maximum_generic_title_ratio' => 0.35,
        'minimum_published_articles' => 20,
    ],
];
