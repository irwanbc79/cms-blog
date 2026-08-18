<?php

return [
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'review_notes' => 'Removed quoted legacy promotional wording from the rewritten FOB/CIF article; awaiting human editorial re-review.',
    'articles' => [
        [
            'article_id' => 59,
            'expected' => [
                'title' => 'FOB vs CIF: Biaya, Titik Risiko, Freight, dan Insurance Gate',
                'slug' => 'panduan-lengkap-perbandingan-fob-vs-cif-eksportir-pemula',
                'status' => 'published',
                'editorial_status' => 'needs_revision',
                'content_sha256' => '611c879f2d84c0055a370daa1db54443e8a71538dfbc7afada06e8996d31079b',
            ],
            'replacements' => [[
                'old' => '<p>Per 18 Agustus 2026, acuan yang diperiksa adalah <a href="https://library.iccwbo.org/content/tfb/BOOKS/BK_0049/BK_0049_05_RulesSea.htm" target="_blank" rel="noopener noreferrer">Incoterms 2020 untuk sea and inland waterway transport dari ICC</a>, <a href="https://www.imo.org/en/ourwork/safety/pages/verification-of-the-gross-mass.aspx" target="_blank" rel="noopener noreferrer">ketentuan Verified Gross Mass dari IMO</a>, dan <a href="https://www.beacukai.go.id/tata-laksana-ekspor" target="_blank" rel="noopener noreferrer">Tata Laksana Ekspor DJBC</a>. Artikel lama tidak menyertakan sumber primer dan memakai janji “mulus” serta “untung maksimal”; bahasa tersebut telah dihapus.</p>',
                'new' => '<p>Per 18 Agustus 2026, acuan yang diperiksa adalah <a href="https://library.iccwbo.org/content/tfb/BOOKS/BK_0049/BK_0049_05_RulesSea.htm" target="_blank" rel="noopener noreferrer">Incoterms 2020 untuk sea and inland waterway transport dari ICC</a>, <a href="https://www.imo.org/en/ourwork/safety/pages/verification-of-the-gross-mass.aspx" target="_blank" rel="noopener noreferrer">ketentuan Verified Gross Mass dari IMO</a>, dan <a href="https://www.beacukai.go.id/tata-laksana-ekspor" target="_blank" rel="noopener noreferrer">Tata Laksana Ekspor DJBC</a>. Artikel lama tidak menyertakan sumber primer dan memakai bahasa promosi absolut; materi tersebut telah dihapus.</p>',
                'expected_occurrences' => 1,
            ]],
        ],
    ],
];
