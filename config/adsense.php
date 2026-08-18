<?php

return [
    'automation' => [
        // Publishing and generation stay behind a human editorial gate by default.
        'auto_publish' => env('CONTENT_AUTO_PUBLISH_ENABLED', false),
        'auto_topup' => env('CONTENT_AUTO_TOPUP_ENABLED', false),
    ],
];
