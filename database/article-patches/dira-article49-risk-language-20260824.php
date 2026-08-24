<?php

return [
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'review_notes' => 'Removed mechanically ambiguous guarantee wording after the HPP rewrite; awaiting human editorial re-review.',
    'articles' => [
        [
            'article_id' => 49,
            'expected' => [
                'title' => 'HPP Ekspor Kopi: Kalkulator Biaya, Kurs, dan Margin Minimum',
                'slug' => 'cara-menghitung-harga-pokok-ekspor-kopi',
                'status' => 'published',
                'editorial_status' => 'needs_revision',
                'content_sha256' => '9261d8f914e4dc528ad1969c30b77f850a748ef5802d8696ff4b5a76c1b2f160',
            ],
            'replacements' => [
                [
                    'old' => '<p>Hasil simulasi sekitar Rp130.853 per kg sebelum penyesuaian komponen sesuai Incoterm, currency, dan risiko. Ini bukan harga yang dijamin diterima buyer. Tim tetap membandingkan spesifikasi, market evidence, payment term, serta alternatif transaksi.</p>',
                    'new' => '<p>Hasil simulasi sekitar Rp130.853 per kg sebelum penyesuaian komponen sesuai Incoterm, currency, dan risiko. Angka tersebut bukan kepastian harga yang akan diterima buyer. Tim tetap membandingkan spesifikasi, market evidence, payment term, serta alternatif transaksi.</p>',
                    'expected_occurrences' => 1,
                ],
                [
                    'old' => '<p><strong>Catatan editorial:</strong> contoh angka di atas hanya simulasi perhitungan. Verifikasi ulang biaya, kurs, regulasi, spesifikasi, Incoterm, dan dokumen pada tanggal transaksi. Artikel ini tidak menjamin margin, kelancaran ekspor, atau penerimaan dokumen.</p>',
                    'new' => '<p><strong>Catatan editorial:</strong> contoh angka di atas hanya simulasi perhitungan. Verifikasi ulang biaya, kurs, regulasi, spesifikasi, Incoterm, dan dokumen pada tanggal transaksi. Artikel ini bukan kepastian margin, kelancaran ekspor, atau penerimaan dokumen.</p>',
                    'expected_occurrences' => 1,
                ],
            ],
        ],
    ],
];
