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
    'review_notes' => 'M2B regional ports, import duty, and customs clearance articles metadata de-templating batch 2.',
    'articles' => [
        [
            'article_id' => 144,
            'expected' => [
                'title' => 'Cara Hitung Pajak Impor Pakaian Jadi dari Tiongkok: Panduan Lengkap 2026',
                'slug' => 'cara-hitung-pajak-impor-pakaian-tiongkok-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'd288590a26d5c79147657a755c55d424bf19eb9316bcced8e64aff83d4cddfc3',
            ],
            'replacements' => [
                [
                    'old' => 'Ikatan Konsultan Pajak Indonesia · 21 Nov 2025</span></div></a></div>',
                    'new' => "Ikatan Konsultan Pajak Indonesia · 21 Nov 2025</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Kalkulasi Pajak Impor Pakaian Jadi Tiongkok: Bea Masuk MFN, PPN, dan PPh 22',
                'og_title' => 'Kalkulasi Pajak Impor Pakaian Jadi Tiongkok: Bea Masuk MFN, PPN, dan PPh 22',
                'meta_description' => 'Simulasi perhitungan bea masuk pakaian jadi dari China: tarif MFN vs ACFTA Form E, PPN 11%, PPh Pasal 22 impor, dan nilai pabean CIF di pelabuhan.',
                'excerpt' => 'Panduan lengkap perhitungan pungutan impor produk garmen dan pakaian jadi dari Tiongkok: tarif MFN, pemanfaatan SKA ACFTA Form E, dan kepatuhan perpajakan.',
            ],
        ],
        [
            'article_id' => 145,
            'expected' => [
                'title' => 'Panduan Lengkap Ekspor Ikan Beku dari Belawan ke Jepang 2026',
                'slug' => 'panduan-lengkap-ekspor-ikan-beku-belawan-jepang-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '59627c0e259b9e5f0ba714be4538e9841cd02af783c4c14221e2beec24868d44',
            ],
            'replacements' => [
                [
                    'old' => '<h1 id="panduan-lengkap-ekspor-ikan-beku-belawan-jepang-2026">Panduan Lengkap Ekspor Ikan Beku dari Belawan ke Jepang 2026</h1>',
                    'new' => '<h1 id="ekspor-ikan-beku-belawan-jepang">Ekspor Ikan Beku via Pelabuhan Belawan ke Jepang: Standar HACCP dan Health Certificate</h1>
<p><strong>Checklist simulasi studi kasus:</strong> Validasi sertifikat fitosanitari dan pengujian mikrobiologi laboratorium terakreditasi Barantin sebelum stuffing kontainer reefer.</p>',
                ],
                [
                    'old' => 'Kompas.id · 13 Aug 2020</span></div></a></div>',
                    'new' => "Kompas.id · 13 Aug 2020</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Ekspor Ikan Beku via Pelabuhan Belawan ke Jepang: Standar HACCP dan Health Certificate',
                'og_title' => 'Ekspor Ikan Beku via Pelabuhan Belawan ke Jepang: Standar HACCP dan Health Certificate',
                'meta_description' => 'Prosedur ekspor ikan beku ke Jepang via Belawan: sertifikasi Health Certificate Barantin, audit HACCP, kontainer reefer -20C, dan PEB BC 3.0 pabean.',
                'excerpt' => 'Prosedur operasional ekspor komoditas perikanan beku ke pasar Jepang: sertifikasi mutu Barantin KKP, pengendalian rantai dingin reefer container, dan dokumen kepabeanan.',
            ],
        ],
        [
            'article_id' => 146,
            'expected' => [
                'title' => 'Panduan Lengkap Ekspor Furniture ke Eropa: Dokumen & Perizinan',
                'slug' => 'panduan-lengkap-ekspor-furniture-ke-eropa-dokumen-perizinan',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'db7bff1556b1c65f900da32f6731e84355b3f6c0ad087742e6b14424b0318bce',
            ],
            'replacements' => [
                [
                    'old' => 'Bloomberg Technoz · 02 Oct 2025</span></div></a></div>',
                    'new' => "Bloomberg Technoz · 02 Oct 2025</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Ekspor Furnitur Kayu ke Uni Eropa: Dokumen V-Legal SVLK dan Regulasi EUDR',
                'og_title' => 'Ekspor Furnitur Kayu ke Uni Eropa: Dokumen V-Legal SVLK dan Regulasi EUDR',
                'meta_description' => 'Persyaratan ekspor furnitur kayu ke Eropa: verifikasi dokumen V-Legal SVLK, regulasi anti-deforestasi EUDR Uni Eropa, fumigasi ISPM 15, dan PEB BC 3.0.',
                'excerpt' => 'Regulasi ketat ekspor mebel dan furnitur kayu ke negara-negara Uni Eropa: pemenuhan uji tuntas EU Deforestation Regulation (EUDR), dokumen V-Legal, dan sertifikasi kayu legal.',
            ],
        ],
        [
            'article_id' => 147,
            'expected' => [
                'title' => 'Panduan Lengkap Dokumen Impor Barang di Belawan: Wajib Tahu 2026',
                'slug' => 'panduan-lengkap-dokumen-impor-barang-belawan-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'c3cb6c07bb05d8f13595a3934b7652ec3abfffc98a250a1ece1df2026b892163',
            ],
            'replacements' => [
                [
                    'old' => 'ANTARA News · 05 Aug 2024</span></div></a></div>',
                    'new' => "ANTARA News · 05 Aug 2024</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Dokumen Kepabeanan Impor Pelabuhan Belawan: Prosedur Manifest BC 1.1 dan PIB',
                'og_title' => 'Dokumen Kepabeanan Impor Pelabuhan Belawan: Prosedur Manifest BC 1.1 dan PIB',
                'meta_description' => 'Checklist dokumen impor laut Pelabuhan Belawan: inward manifest BC 1.1, delivery order (DO) pelayaran, deklarasi PIB BC 2.0, dan SPPB pengeluaran kargo.',
                'excerpt' => 'Daftar berkas wajib kepabeanan impor kargo laut di KPU Bea Cukai Belawan: sinkronisasi manifes kapal, pengajuan PIB sistem CEISA, dan penyelesaian surat penyerahan peti kemas.',
            ],
        ],
        [
            'article_id' => 148,
            'expected' => [
                'title' => 'Panduan Lengkap Cek 7 Biaya PPJK Impor via Tanjung Priok 2026',
                'slug' => 'panduan-lengkap-cek-7-biaya-ppjk-impor-tanjung-priok-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '6ff48a25ee19dfaee9dc424b2e75f7fdee0e3a00705af1503d71c22455d72360',
            ],
            'replacements' => [
                [
                    'old' => 'Lokawarta.com · 12 Jan 2023</span></div></a></div>',
                    'new' => "Lokawarta.com · 12 Jan 2023</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Struktur Biaya PPJK Impor Tanjung Priok: Tarif EDI Pabean, Trucking, dan Lift On-Off',
                'og_title' => 'Struktur Biaya PPJK Impor Tanjung Priok: Tarif EDI Pabean, Trucking, dan Lift On-Off',
                'meta_description' => 'Rincian biaya jasa PPJK impor di Tanjung Priok: biaya transfer EDI modul PIB, nota penumpukan dermaga kontainer JICT/KOJA, lift on-off, dan trucking.',
                'excerpt' => 'Transparansi rincian biaya pengurusan pabean impor di Pelabuhan Tanjung Priok: tarif jasa PPJK, nota tagihan dermaga terminal peti kemas, biaya administrasi, dan trucking.',
            ],
        ],
        [
            'article_id' => 149,
            'expected' => [
                'title' => 'Panduan Lengkap Bea Cukai Barang Kiriman UMKM 2026',
                'slug' => 'panduan-lengkap-bea-cukai-barang-kiriman-umkm-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '7d24503dc0312377b302dc44312897681b175cf1478acc4baa1f2f50a79ff850',
            ],
            'replacements' => [
                [
                    'old' => '</div></a></div>',
                    'new' => "</div></a></div>\n".$officialReferencesBlock,
                    'expected_occurrences' => 1,
                ],
            ],
            'changes' => [
                'title' => 'Ketentuan Bea Cukai Barang Kiriman: Batas De Minimis FOB, PPN, dan CN Pabean',
                'og_title' => 'Ketentuan Bea Cukai Barang Kiriman: Batas De Minimis FOB, PPN, dan CN Pabean',
                'meta_description' => 'Regulasi kepabeanan barang kiriman impor: batas pembebasan nilai pabean (de minimis), tarif PPN 11%, bea masuk barang komoditas khusus, dan dokumen CN.',
                'excerpt' => 'Aturan kepabeanan barang kiriman pos dan kurir internasional: batas pembebasan de minimis FOB US$ 3, pengenaan pajak barang tertentu (tekstil, tas, sepatu), dan sistem e-CN.',
            ],
        ],
        [
            'article_id' => 150,
            'expected' => [
                'title' => 'Panduan Lengkap Dokumen Ekspor dari Pelabuhan Belawan 2026',
                'slug' => 'panduan-lengkap-dokumen-ekspor-pelabuhan-belawan-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'a49277e830a1e7da11110822b5163cf3dc12c520d80ebccbc1942831fee0fd71',
            ],
            'replacements' => [
                [
                    'old' => 'detikNews · 18 Oct 2024</span></div></a></div>',
                    'new' => "detikNews · 18 Oct 2024</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Tata Laksana Ekspor Pelabuhan Belawan: Prosedur PEB BC 3.0, NPE, dan COO SKA Form',
                'og_title' => 'Tata Laksana Ekspor Pelabuhan Belawan: Prosedur PEB BC 3.0, NPE, dan COO SKA Form',
                'meta_description' => 'Tahapan dokumen ekspor Sumatera Utara via Belawan: pendaftaran PEB CEISA 4.0, penerbitan Nota Pelayanan Ekspor (NPE), dan pengurusan SKA Dinas Perdagangan.',
                'excerpt' => 'Alur pengurusan dokumen ekspor komoditas unggulan Sumatera Utara melalui Pelabuhan Belawan: penerbitan PEB, verifikasi karantina Barantin, dan pengurusan Certificate of Origin.',
            ],
        ],
        [
            'article_id' => 151,
            'expected' => [
                'title' => 'Cara Hitung Bea Masuk Impor 2025: Panduan Lengkap PPJK',
                'slug' => 'cara-hitung-bea-masuk-impor-2025-panduan-ppjk',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '124c4e79e625c7b954bb35b9026d3ca0b1a4334134d50e50fe5c87ad71c56cb0',
            ],
            'replacements' => [
                [
                    'old' => 'Bloomberg Technoz · 23 Dec 2025</span></div></a></div>',
                    'new' => "Bloomberg Technoz · 23 Dec 2025</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Kalkulasi Bea Masuk dan Pajak Impor: Rumus Nilai CIF, Kurs Pajak, dan Skema FTA',
                'og_title' => 'Kalkulasi Bea Masuk dan Pajak Impor: Rumus Nilai CIF, Kurs Pajak, dan Skema FTA',
                'meta_description' => 'Simulasi perhitungan bea masuk dan pungutan impor: nilai CIF Rupiah, kurs mingguan Menkeu, tarif preferensi SKA Form FTA, dan pajak dalam rangka impor.',
                'excerpt' => 'Formula baku penghitungan pungutan pabean impor Republik Indonesia: kalkulasi Cost Insurance Freight (CIF), pemanfaatan perjanjian dagang FTA, dan pembayaran kode billing.',
            ],
        ],
        [
            'article_id' => 152,
            'expected' => [
                'title' => 'Panduan Lengkap Tarif BMAD Barang Elektronik Impor 2026',
                'slug' => 'panduan-lengkap-tarif-bmad-barang-elektronik-impor-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '5aad53ec1566dc559e6cc8e2419bed2827019e62b87b77f41fafe8dd2ad08c9d',
            ],
            'replacements' => [
                [
                    'old' => 'Pajakku · 26 May 2026</span></div></a></div>',
                    'new' => "Pajakku · 26 May 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Tarif Bea Masuk Anti-Dumping (BMAD) Elektronik: Regulasi KADI dan Kepatuhan Impor',
                'og_title' => 'Tarif Bea Masuk Anti-Dumping (BMAD) Elektronik: Regulasi KADI dan Kepatuhan Impor',
                'meta_description' => 'Regulasi Bea Masuk Anti-Dumping (BMAD) elektronik: penyelidikan Komite Anti Dumping Indonesia (KADI), dasar penetapan PMK, dan verifikasi HS Code BTKI.',
                'excerpt' => 'Pengenalan dan mekanisme pengenaan instrumen perdagangan BMAD pada komponen elektronik: latar belakang penyelidikan praktik dumping dan dampak pada penetapan bea pabean.',
            ],
        ],
        [
            'article_id' => 174,
            'expected' => [
                'title' => 'Jasa Customs Clearance Belawan: Panduan Lengkap 2026',
                'slug' => 'customs-clearance-belawan',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '3c52a45e1f36a81b297428bb6d03ab2964dcaf8e6bfddb127fc8bb8bcc23b6fd',
            ],
            'replacements' => [
                [
                    'old' => 'ANTARA News · 05 Aug 2024</span></div></a></div>',
                    'new' => "ANTARA News · 05 Aug 2024</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Jasa Customs Clearance Pelabuhan Belawan: Alur Layanan PPJK, SPPB, dan Trucking',
                'og_title' => 'Jasa Customs Clearance Pelabuhan Belawan: Alur Layanan PPJK, SPPB, dan Trucking',
                'meta_description' => 'Layanan customs clearance di Pelabuhan Belawan Medan: penanganan jalur pabean hijau/merah, penyelesaian nota pembetulan, dan trucking inland kontainer.',
                'excerpt' => 'Panduan pengurusan jasa kepabeanan profesional di Pelabuhan Belawan: percepatan status persetujuan pengeluaran barang (SPPB) dan integrasi armada trucking darat.',
            ],
        ],
        [
            'article_id' => 187,
            'expected' => [
                'title' => 'Jasa Freight Forwarder Medan: Panduan Lengkap Ekspor Impor',
                'slug' => 'freight-forwarder-medan',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '3f362c290963df75ba6a017ef8e3fd816856893ebc4046053f4a1731c38bafa3',
            ],
            'replacements' => [
                [
                    'old' => 'lenterakepri.com · 11 May 2024</span></div></a></div>',
                    'new' => "lenterakepri.com · 11 May 2024</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Jasa Freight Forwarder Medan & Belawan: Layanan Kargo Laut FCL, LCL, dan Udara',
                'og_title' => 'Jasa Freight Forwarder Medan & Belawan: Layanan Kargo Laut FCL, LCL, dan Udara',
                'meta_description' => 'Layanan ekspedisi freight forwarding internasional di Medan & Belawan: booking container FCL/LCL, air freight Kualanamu KNO, dan pergudangan logistik.',
                'excerpt' => 'Solusi pengiriman kargo internasional dari Medan dan Belawan: rute pelayaran ekspor-impor utama, pengurusan izin bea cukai, dan manajemen pergudangan konsolidasi.',
            ],
        ],
    ],
];
