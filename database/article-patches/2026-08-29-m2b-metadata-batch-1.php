<?php

$officialReferencesBlock = <<<'HTML'
<div class="mt-8 pt-4 border-t border-gray-200">
<h3>Referensi Resmi Regulasi dan Kepabeanan:</h3>
<ul>
<li><a href="https://beacukai.go.id" target="_blank" rel="noopener noreferrer">Direktorat Jenderal Bea dan Cukai — Portal Layanan Kepabeanan dan Cukai</a></li>
<li><a href="https://jdih.kemenkeu.go.id" target="_blank" rel="noopener noreferrer">JDIH Kementerian Keuangan — Regulasi dan PMK Kepabeanan Terkini</a></li>
<li><a href="https://insw.go.id" target="_blank" rel="noopener noreferrer">Indonesia National Single Window — Portal INSW dan BTKI</a></li>
<li><a href="https://kemendag.go.id" target="_blank" rel="noopener noreferrer">Kementerian Perdagangan RI — Kebijakan dan Pengawasan Perdagangan Luar Negeri</a></li>
<li><a href="https://peraturan.bpk.go.id" target="_blank" rel="noopener noreferrer">JDIH BPK RI — UU No. 17 Tahun 2006 tentang Kepabeanan</a></li>
</ul>
</div>
HTML;

return [
    'site_domain' => 'm2b.co.id',
    'allow_published' => true,
    'review_notes' => 'M2B flagship customs and trade articles metadata de-templating and official sources enrichment batch 1.',
    'articles' => [
        [
            'article_id' => 72,
            'expected' => [
                'title' => 'Panduan Lengkap Dokumen Utama Ekspor untuk Pemula 2026',
                'slug' => 'panduan-lengkap-dokumen-ekspor-pemula-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '76accb987e77b54eded88131c0fd91f4ab5accdaa3ccd33afe167b085c1827f7',
            ],
            'replacements' => [
                [
                    'old' => '</article>',
                    'new' => $officialReferencesBlock."\n</article>",
                ],
            ],
            'changes' => [
                'title' => 'Dokumen Utama Ekspor Indonesia: Prosedur PEB BC 3.0, COO SKA, dan Bill of Lading',
                'og_title' => 'Dokumen Utama Ekspor Indonesia: Prosedur PEB BC 3.0, COO SKA, dan Bill of Lading',
                'meta_description' => 'Checklist dokumen wajib ekspor komoditas Indonesia: pengajuan PEB BC 3.0, Certificate of Origin (SKA Form), packing list, commercial invoice, dan B/L.',
                'excerpt' => 'Panduan komprehensif dokumen kepabeanan dan pengapalan ekspor Indonesia: penyusunan invoice, packing list, penerbitan NPE dari PEB BC 3.0, dan legalitas karantina.',
            ],
        ],
        [
            'article_id' => 73,
            'expected' => [
                'title' => 'Panduan Lengkap Biaya Freight Forwarding: Komponen & Cara Hitung',
                'slug' => 'panduan-lengkap-biaya-freight-forwarding-komponen-cara-hitung',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '7756cbc84b34fdb7caf87110a7b6b132f80f994a1aeeb2334912964e25e344ab',
            ],
            'replacements' => [
                [
                    'old' => '</article>',
                    'new' => $officialReferencesBlock."\n</article>",
                ],
            ],
            'changes' => [
                'title' => 'Biaya Freight Forwarding Ekspor Impor: Komponen Ocean Freight, THC, dan Demurrage',
                'og_title' => 'Biaya Freight Forwarding Ekspor Impor: Komponen Ocean Freight, THC, dan Demurrage',
                'meta_description' => 'Kalkulasi biaya freight forwarding kargo laut & udara: ocean freight FCL/LCL, Terminal Handling Charges (THC), bunker surcharge, dan biaya storage gudang.',
                'excerpt' => 'Struktur komponen tarif jasa freight forwarding: kalkulasi freight rate internasional, biaya lokal pelabuhan THC/CFS, trucking inland, dan mitigasi demurrage.',
            ],
        ],
        [
            'article_id' => 74,
            'expected' => [
                'title' => 'Panduan Lengkap Mengurus Izin Impor API-U 2026',
                'slug' => 'panduan-lengkap-mengurus-izin-impor-api-u-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'bd68beb5b6dc0e9b55fd7eaf2c5ca8248df0ebc0bb7a10cecbf49204a032b406',
            ],
            'replacements' => [
                [
                    'old' => '</article>',
                    'new' => $officialReferencesBlock."\n</article>",
                ],
            ],
            'changes' => [
                'title' => 'Mengurus Izin Impor API-U dan API-P: Registrasi OSS RBA, KBLI, dan Akses Pabean',
                'og_title' => 'Mengurus Izin Impor API-U dan API-P: Registrasi OSS RBA, KBLI, dan Akses Pabean',
                'meta_description' => 'Tata cara aktivasi Angka Pengenal Importir (API-U / API-P) via OSS RBA: kelengkapan dokumen legalitas, penetapan KBLI, dan akses kepabeanan portal INSW.',
                'excerpt' => 'Persyaratan legalitas impor resmi di Indonesia: registrasi Nomor Induk Berusaha (NIB) sebagai API-U / API-P pada sistem OSS RBA dan sinkronisasi CEISA.',
            ],
        ],
        [
            'article_id' => 75,
            'expected' => [
                'title' => 'Panduan Lengkap Prosedur Impor Barang Bekas di Indonesia 2026',
                'slug' => 'panduan-lengkap-prosedur-impor-barang-bekas-indonesia-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'e57c781ebe004b5a16ffddbac533756c56a18fbd3ea03dd524d6b354c71ee988',
            ],
            'replacements' => [
                [
                    'old' => '</article>',
                    'new' => $officialReferencesBlock."\n</article>",
                ],
            ],
            'changes' => [
                'title' => 'Prosedur Impor Barang Modal Bukan Baru: Syarat Persetujuan Impor dan Laporan Surveyor',
                'og_title' => 'Prosedur Impor Barang Modal Bukan Baru: Syarat Persetujuan Impor dan Laporan Surveyor',
                'meta_description' => 'Regulasi impor barang modal bukan baru (BMBB): verifikasi teknis Laporan Surveyor (LS), Surat Persetujuan Impor (PI) Kemendag, dan ketentuan bea masuk.',
                'excerpt' => 'Ketentuan hukum impor mesin dan peralatan industri bukan baru (BMBB): proses audit teknis surveyor independen, izin Kemendag, dan clearance PIB BC 2.0.',
            ],
        ],
        [
            'article_id' => 76,
            'expected' => [
                'title' => 'Panduan Lengkap Menentukan HS Code Barang agar Tidak Kena Denda Bea Cukai',
                'slug' => 'panduan-lengkap-menentukan-hs-code-agar-tidak-kena-denda-bea-cukai',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'eb5e6e57015fef1af4cd4fa7ffe77ef5ca0ad975f27c3e370884b91c95967b78',
            ],
            'replacements' => [
                [
                    'old' => '<p><em>Disclaimer: Informasi dalam artikel ini bersifat umum dan dapat berubah sesuai regulasi. Untuk kasus spesifik, selalu konsultasikan dengan ahli kepabeanan bersertifikat.</em></p>',
                    'new' => '<p><em>Disclaimer: Informasi dalam artikel ini bersifat umum dan dapat berubah sesuai regulasi. Untuk kasus spesifik, selalu konsultasikan dengan ahli kepabeanan bersertifikat.</em></p>'."\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Klasifikasi HS Code Buku Tarif BTKI: Mencegah Notul SPTNP dan Denda Bea Cukai',
                'og_title' => 'Klasifikasi HS Code Buku Tarif BTKI: Mencegah Notul SPTNP dan Denda Bea Cukai',
                'meta_description' => 'Teknik klasifikasi 8 digit HS Code BTKI: interpretasi ketentuan KUMHS, identifikasi pos tarif spesifik, dan mitigasi denda koreksi SPTNP Bea Cukai.',
                'excerpt' => 'Metodologi penentuan Harmonized System (HS) Code pada Buku Tarif Kepabeanan Indonesia: penerapan Ketentuan Umum Menginterpretasi HS (KUMHS) dan perizinan lartas.',
            ],
        ],
        [
            'article_id' => 77,
            'expected' => [
                'title' => 'Panduan Lengkap Fungsi Kawasan Berikat untuk Ekspor Impor 2026',
                'slug' => 'panduan-lengkap-fungsi-kawasan-berikat-ekspor-impor-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'fb9a7b59339e37dcf4ac2ab81533b0b417f761fed5d421acbf8a5f1d1172f6fa',
            ],
            'replacements' => [
                [
                    'old' => '<tr><td>Impor Sementara (ITE)</td><td>❌ Dijamin</td><td>❌ Tidak</td><td>✅ Boleh</td><td>6 bulan</td></tr>',
                    'new' => '<tr><td>Impor Sementara (ITE)</td><td>❌ Wajib Jaminan Pabean</td><td>❌ Tidak</td><td>✅ Boleh</td><td>6 bulan</td></tr>',
                ],
                [
                    'old' => 'Pelabuhan Belawan, Kualanamu, Tanjung Priok, Tanjung Perak, Makassar, dan Balikpapan. 🤝</p>',
                    'new' => "Pelabuhan Belawan, Kualanamu, Tanjung Priok, Tanjung Perak, Makassar, dan Balikpapan. 🤝</p>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Fasilitas Kawasan Berikat: Penangguhan Bea Masuk, PPN Tidak Dipungut, dan IT Inventory',
                'og_title' => 'Fasilitas Kawasan Berikat: Penangguhan Bea Masuk, PPN Tidak Dipungut, dan IT Inventory',
                'meta_description' => 'Kajian fasilitas kepabeanan Kawasan Berikat (KB): penangguhan bea masuk bahan baku, fasilitas PPN tidak dipungut, dan standarisasi IT Inventory Bea Cukai.',
                'excerpt' => 'Insentif fiskal dan operasional fasilitas Tempat Penimbunan Berikat: penangguhan pungutan pabean bahan baku produksi ekspor dan integrasi sistem IT Inventory.',
            ],
        ],
        [
            'article_id' => 78,
            'expected' => [
                'title' => 'Panduan Lengkap Jalur Merah Jalur Kuning Jalur Hijau Bea Cukai 2026',
                'slug' => 'panduan-lengkap-jalur-merah-kuning-hijau-bea-cukai-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'd8afb7b0d0711fd36834b95bb72f915fbc336e88634216f46133c8025b9e66f4',
            ],
            'replacements' => [
                [
                    'old' => 'namun belum memerlukan pemeriksaan fisik 100% seperti jalur merah.',
                    'new' => 'namun belum memerlukan pemeriksaan fisik menyeluruh seperti jalur merah.',
                ],
                [
                    'old' => 'an jasa PPJK profesional untuk memastikan dokumen 100% akurat.</li>',
                    'new' => 'an jasa PPJK profesional untuk memastikan dokumen sepenuhnya akurat dan valid.</li>',
                ],
                [
                    'old' => 'i layanan kepabeanan versi terbaru sudah berjalan 100% di seluruh pelabuhan M2B (Belawan, Kualanamu, Tan',
                    'new' => 'i layanan kepabeanan versi terbaru sudah beroperasi penuh di seluruh pelabuhan M2B (Belawan, Kualanamu, Tan',
                ],
                [
                    'old' => 'Selamat melayarkan bisnis Anda menuju kesuksesan di tahun 2026!</p>',
                    'new' => "Selamat melayarkan bisnis Anda menuju kesuksesan di tahun 2026!</p>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Sistem Jalur Pelayanan Pabean: Prosedur Jalur Hijau SPPB, Jalur Kuning, dan Jalur Merah',
                'og_title' => 'Sistem Jalur Pelayanan Pabean: Prosedur Jalur Hijau SPPB, Jalur Kuning, dan Jalur Merah',
                'meta_description' => 'Perbedaan alur pabean impor: kriteria penetapan profil risiko, syarat penerbitan SPPB Jalur Hijau, dan prosedur pemeriksaan fisik kargo Jalur Merah.',
                'excerpt' => 'Mekanisme penetapan jalur pengeluaran barang impor di pelabuhan: manajemen risiko SKP DJBC, prosedur SPJM Jalur Merah, dan percepatan status SPPB Jalur Hijau.',
            ],
        ],
        [
            'article_id' => 79,
            'expected' => [
                'title' => 'Panduan Lengkap Ekspor untuk UMKM Indonesia Pemula 2026',
                'slug' => 'panduan-lengkap-ekspor-umkm-pemula-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '6ee53344bccbfe9d540816057d889b73ded9d3b21355e736a18ab74c22f05650',
            ],
            'replacements' => [
                [
                    'old' => '</article>',
                    'new' => $officialReferencesBlock."\n</article>",
                ],
            ],
            'changes' => [
                'title' => 'Langkah Ekspor Produk UMKM ke Pasar Global: Legalitas NIB, Skema Buyer, dan Forwarding',
                'og_title' => 'Langkah Ekspor Produk UMKM ke Pasar Global: Legalitas NIB, Skema Buyer, dan Forwarding',
                'meta_description' => 'Panduan ekspor produk UMKM ke mancanegara: pengurusan legalitas NIB ekspor, kurasi standar buyer luar negeri, negosiasi Incoterms, dan sewa forwarder.',
                'excerpt' => 'Roadmap praktis UMKM menembus pasar ekspor internasional: pemenuhan mutu komoditas, perhitungan harga FOB/CIF, pemilihan skema pembayaran, dan pengiriman kontainer.',
            ],
        ],
        [
            'article_id' => 80,
            'expected' => [
                'title' => '7 Langkah Mudah Urus Layanan Kemitraan Ekspor Bea Cukai 2026',
                'slug' => '7-langkah-mudah-urus-layanan-kemitraan-ekspor-bea-cukai-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'df89d7aa129a3cb4b6cbdc9337012f7357f32cc0ad72e90e7c94ee4654b7db4c',
            ],
            'replacements' => [
                [
                    'old' => '<blockquote>💡 <strong>Pesan terakhir</strong>: Tahun 2026 adalah tahun emas UMKM Indonesia untuk ekspor. Mulailah dari langkah kecil — hubungi mitra tepercaya sekarang juga!</blockquote>',
                    'new' => '<blockquote>💡 <strong>Pesan terakhir</strong>: Tahun 2026 adalah momentum UMKM Indonesia untuk ekspor. Mulailah dari langkah nyata bersama mitra kepabeanan terpercaya.</blockquote>'."\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Layanan Fasilitas Kemitraan Ekspor Bea Cukai: Klinik Ekspor, Asistensi Regulasi, dan PPJK',
                'og_title' => 'Layanan Fasilitas Kemitraan Ekspor Bea Cukai: Klinik Ekspor, Asistensi Regulasi, dan PPJK',
                'meta_description' => 'Pemanfaatan fasilitas Klinik Ekspor Bea Cukai: asistensi kepatuhan dokumen, konsultasi penetapan HS Code, fasilitasi business matching, dan peran PPJK.',
                'excerpt' => 'Program asistensi kemitraan ekspor DJBC bagi pelaku usaha nasional: pendampingan regulasi negara tujuan ekspor, verifikasi sertifikat mutu, dan kemudahan logistik.',
            ],
        ],
        [
            'article_id' => 129,
            'expected' => [
                'title' => 'Cara Praktis UMKM Tembus Pasar Ekspor Lewat PPJK',
                'slug' => 'cara-praktis-umkm-tembus-pasar-ekspor-lewat-ppjk',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '73c8db5472461ff81c6b38a9fa96b641ebec8db34ae5c226c447262175ffbb34',
            ],
            'replacements' => [
                [
                    'old' => 'M2B berkomitmen mendukung UMKM Indonesia go global dengan layanan profesional, transparan, dan terpercaya.</em></p>',
                    'new' => "M2B berkomitmen mendukung UMKM Indonesia go global dengan layanan profesional, transparan, dan terpercaya.</em></p>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Peran Strategis PPJK dalam Ekspor UMKM: Pengurusan Dokumen PEB dan Customs Clearance',
                'og_title' => 'Peran Strategis PPJK dalam Ekspor UMKM: Pengurusan Dokumen PEB dan Customs Clearance',
                'meta_description' => 'Manfaat menggunakan jasa PPJK untuk ekspor UMKM: pembuatan modul PEB BC 3.0, koordinasi stuffing kontainer pelabuhan, dan izin clearance kepabeanan.',
                'excerpt' => 'Keuntungan kolaborasi UMKM dengan Pengusaha Pengurusan Jasa Kepabeanan (PPJK): efisiensi administrasi ekspor, kepatuhan hukum kepabeanan, dan percepatan nota pelayanan ekspor.',
            ],
        ],
        [
            'article_id' => 141,
            'expected' => [
                'title' => 'Dampak Regulasi Bea Masuk: Panduan Lengkap UMKM Wajib Tahu',
                'slug' => 'dampak-regulasi-bea-masuk-umkm',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'a7835ede9989f148ffca63fbad4820925487bd5c925be5b5baba24def3b1c81a',
            ],
            'replacements' => [
                [
                    'old' => 'CNBC Indonesia · 29 May 2026</span></div></a></div>',
                    'new' => "CNBC Indonesia · 29 May 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Kebijakan Tarif Bea Masuk dan BMAD: Pengaruh Regulasi Impor terhadap Industri UMKM',
                'og_title' => 'Kebijakan Tarif Bea Masuk dan BMAD: Pengaruh Regulasi Impor terhadap Industri UMKM',
                'meta_description' => 'Analisis kebijakan tarif bea masuk dan BMAD: dampak terhadap harga bahan baku impor, kepatuhan bea cukai, dan daya saing industri manufaktur domestik.',
                'excerpt' => 'Evaluasi dampak instrumen tarif kepabeanan nasional: pengenaan Bea Masuk Anti Dumping (BMAD), Bea Masuk Tindakan Pengamanan (BMTP), dan kalkulasi beban HPP produksi.',
            ],
        ],
    ],
];
