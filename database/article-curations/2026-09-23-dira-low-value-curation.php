<?php

return [
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'review_notes' => 'AdSense low-value remediation for dira.co.id: curate outdated 2023/2024 English palm oil articles (IDs 164, 167) to draft to remove outdated foreign-language content from the public index and resolve the Konten Tanpa Manfaat rejection.',
    'articles' => [
        [
            'article_id' => 164,
            'expected' => [
                'title' => '7 Ways Palm Oil Sustainability Boosts 2024 Export Value',
                'slug' => '7-ways-palm-oil-sustainability-boosts-2024-export-value',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'canonical_url' => '',
                'content_sha256' => '7cbc9729bc5a70be63b3c02f1b73397abe40158169fc71e95a7e061c204e6a63',
            ],
        ],
        [
            'article_id' => 167,
            'expected' => [
                'title' => 'How to Secure Palm Oil Quota Under 2023 Reforms',
                'slug' => 'secure-palm-oil-quota-2023-reforms',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'canonical_url' => '',
                'content_sha256' => '947ff3565fab733d925a2bce70d7cd8cbae90d577eb0c1fbacd499ab3efe3108',
            ],
        ],
    ],
];
