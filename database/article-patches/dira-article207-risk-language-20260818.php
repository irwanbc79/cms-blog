<?php

return [
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'review_notes' => 'Removed mechanically ambiguous guarantee wording after the full green-coffee rewrite; awaiting human editorial re-review.',
    'articles' => [
        [
            'article_id' => 207,
            'expected' => [
                'title' => 'Impor Kopi Green Bean: HS, Karantina, Dokumen, dan Shipment Gate',
                'slug' => 'izin-impor-kopi-green-bean-panduan-lengkap-umkm',
                'status' => 'published',
                'editorial_status' => 'needs_revision',
                'content_sha256' => '4821cf15e08454c1413aa78ce2d315207a23c3266b68e0b392e35033e56eb6e8',
            ],
            'replacements' => [
                [
                    'old' => '<p>Siapkan PIC, akses sistem, original atau electronic documents, jadwal kedatangan, lokasi pemeriksaan, sampling support, laboratorium bila relevan, transportasi setelah release, dan komunikasi dengan gudang. Catat bahwa tindakan karantina atau pabean dapat bergantung pada hasil penelitian dan kondisi fisik, sehingga waktu serta hasil tidak boleh dijamin.</p>',
                    'new' => '<p>Siapkan PIC, akses sistem, original atau electronic documents, jadwal kedatangan, lokasi pemeriksaan, sampling support, laboratorium bila relevan, transportasi setelah release, dan komunikasi dengan gudang. Catat bahwa tindakan karantina atau pabean bergantung pada hasil penelitian dan kondisi fisik; waktu serta hasil mengikuti keputusan instansi.</p>',
                    'expected_occurrences' => 1,
                ],
                [
                    'old' => '<p>Bandingkan sedikitnya skenario normal, dokumen terlambat, pemeriksaan/sampling, dan treatment tambahan. Simulasi adalah alat keputusan pembelian, bukan jaminan jumlah pungutan atau waktu release.</p>',
                    'new' => '<p>Bandingkan sedikitnya skenario normal, dokumen terlambat, pemeriksaan/sampling, dan treatment tambahan. Simulasi adalah alat keputusan pembelian; jumlah pungutan dan waktu release ditentukan dari kondisi serta proses aktual.</p>',
                    'expected_occurrences' => 1,
                ],
                [
                    'old' => '<p>Dira dapat membantu readiness matrix, product dossier, document reconciliation, dan koordinasi shipment. Dira tidak dapat menjamin izin, hasil tindakan karantina, klasifikasi, tarif, jalur pemeriksaan, release, atau kondisi barang tertentu.</p>',
                    'new' => '<p>Dira dapat membantu readiness matrix, product dossier, document reconciliation, dan koordinasi shipment. Bantuan tersebut tidak mengubah kewenangan instansi atas izin, tindakan karantina, klasifikasi, tarif, jalur pemeriksaan, release, atau kondisi barang tertentu.</p>',
                    'expected_occurrences' => 1,
                ],
            ],
        ],
    ],
];
