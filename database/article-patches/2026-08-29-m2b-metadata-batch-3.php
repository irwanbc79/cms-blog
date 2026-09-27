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
    'review_notes' => 'M2B sourcing, commodity export, and port clearance articles metadata de-templating batch 3.',
    'articles' => [
        [
            'article_id' => 188,
            'expected' => [
                'title' => 'Impor Barang dari China ke Indonesia: Panduan Lengkap 2026',
                'slug' => 'impor-barang-dari-china-ke-indonesia-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '65c5a2ed8e0b0e7508304fdc6fcd1b51031dcf0571abb71386a158d45ed07bc2',
            ],
            'replacements' => [
                [
                    'old' => 'Kompas.com · 01 May 2026</span></div></a></div>',
                    'new' => "Kompas.com · 01 May 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Tata Laksana Impor Barang dari Tiongkok: Skema ACFTA Form E, Jalur Pabean, dan Forwarder',
                'og_title' => 'Tata Laksana Impor Barang dari Tiongkok: Skema ACFTA Form E, Jalur Pabean, dan Forwarder',
                'meta_description' => 'Panduan impor kargo laut & udara dari China ke Indonesia: pembuatan Form E ACFTA (Bea Masuk 0%), pengurusan dokumen PIB BC 2.0, dan pemilihan forwarder.',
                'excerpt' => 'Panduan komprehensif mengimpor produk dari Tiongkok ke pelabuhan Indonesia: pemanfaatan fasilitas tarif preferensi ACFTA Form E, pengurusan PIB, dan pengiriman kontainer.',
            ],
        ],
        [
            'article_id' => 189,
            'expected' => [
                'title' => 'Impor Kosmetik: Panduan Lengkap Izin BPOM 2026',
                'slug' => 'impor-kosmetik-panduan-izin-bpom-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '34d24f6d4ce30b81a719e1cc2aad7302640d7668d0009ce763c452c632d046f4',
            ],
            'replacements' => [
                [
                    'old' => 'Focus Taiwan · 12 Jun 2026</span></div></a></div>',
                    'new' => "Focus Taiwan · 12 Jun 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Prosedur Impor Kosmetik Resmi: Surat Keterangan Impor (SKI) BPOM dan Notifikasi Kosmetika',
                'og_title' => 'Prosedur Impor Kosmetik Resmi: Surat Keterangan Impor (SKI) BPOM dan Notifikasi Kosmetika',
                'meta_description' => 'Persyaratan impor kosmetik legal ke Indonesia: registrasi nomor notifikasi BPOM, Surat Keterangan Impor (SKI Border/Post-Border), dan verifikasi lartas.',
                'excerpt' => 'Tata cara impor produk perawatan kulit dan kosmetika legal: pengurusan izin edar notifikasi BPOM, penerbitan Surat Keterangan Impor (SKI), dan clearance kepabeanan.',
            ],
        ],
        [
            'article_id' => 190,
            'expected' => [
                'title' => 'Cara Impor dari Alibaba: Panduan Lengkap untuk Pemula',
                'slug' => 'cara-impor-dari-alibaba-panduan-lengkap-pemula',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'a20d799594037f06f44aa978c230bfaedbd246c01cbc7d0a2bfc4112ac1fecf4',
            ],
            'replacements' => [
                [
                    'old' => 'kontan.co.id · 21 Jan 2026</span></div></a></div>',
                    'new' => "kontan.co.id · 21 Jan 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Sourcing Impor dari Alibaba B2B: Verifikasi Trade Assurance, Incoterms, dan Jasa PPJK',
                'og_title' => 'Sourcing Impor dari Alibaba B2B: Verifikasi Trade Assurance, Incoterms, dan Jasa PPJK',
                'meta_description' => 'Langkah aman sourcing impor di Alibaba: audit status Gold Supplier & Trade Assurance, pemilihan Incoterms FOB/CIF, serta pengurusan izin impor via PPJK.',
                'excerpt' => 'Strategi transaksi bisnis impor melalui platform Alibaba: verifikasi pabrik terpercaya, perlindungan pembayaran Trade Assurance, dan pengurusan kepabeanan kargo laut.',
            ],
        ],
        [
            'article_id' => 191,
            'expected' => [
                'title' => 'Cara Ekspor Minyak Atsiri: Panduan Lengkap UMKM 2026',
                'slug' => 'cara-ekspor-minyak-atsiri-panduan-umkm-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'ded9224934255dd56136e174676369ba622c22c8b5079c253e98d948e56b4ba4',
            ],
            'replacements' => [
                [
                    'old' => 'Kompas.com · 10 Nov 2025</span></div></a></div>',
                    'new' => "Kompas.com · 10 Nov 2025</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Ekspor Minyak Atsiri Indonesia: Standar GC-MS, Sertifikat Fitosanitari, dan Regulasi MSDS',
                'og_title' => 'Ekspor Minyak Atsiri Indonesia: Standar GC-MS, Sertifikat Fitosanitari, dan Regulasi MSDS',
                'meta_description' => 'Standar mutu ekspor essential oil / minyak atsiri: sertifikat analisis kromatografi GC-MS, dokumen Material Safety Data Sheet (MSDS), dan izin Barantin.',
                'excerpt' => 'Prosedur ekspor minyak atsiri dan minyak nilam ke pasar dunia: pemenuhan baku mutu kemurnian, sertifikasi kargo berbahaya (DG MSDS), dan dokumen ekspor resmi.',
            ],
        ],
        [
            'article_id' => 192,
            'expected' => [
                'title' => 'Ekspor Arang Briket: Panduan Lengkap 7 Langkah UMKM',
                'slug' => 'ekspor-arang-briket-panduan-lengkap-7-langkah-umkm',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'fdbb2acb850c80baeb15dcd87e02aec228d2cac58aa1567604e931ba4d266a5f',
            ],
            'replacements' => [
                [
                    'old' => 'Kantor Staf Presiden · 02 Aug 2022</span></div></a></div>',
                    'new' => "Kantor Staf Presiden · 02 Aug 2022</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Ekspor Arang Briket Kelapa: Sertifikasi Self-Heating SHTC, MSDS, dan Prosedur PEB',
                'og_title' => 'Ekspor Arang Briket Kelapa: Sertifikasi Self-Heating SHTC, MSDS, dan Prosedur PEB',
                'meta_description' => 'Persyaratan ekspor briket arang kelapa ke Timur Tengah & Eropa: uji Self-Heating SHTC IMO Code, sertifikat Vanning Karantina, dan dokumen PEB BC 3.0.',
                'excerpt' => 'Langkah sukses ekspor briket arang tempurung kelapa: pengujian keselamatan maritim IMO SHTC, sertifikat fumigasi pelayaran, dan penerbitan PEB kepabeanan.',
            ],
        ],
        [
            'article_id' => 201,
            'expected' => [
                'title' => 'Jasa Customs Clearance Tanjung Priok: Panduan Lengkap 2026',
                'slug' => 'jasa-customs-clearance-tanjung-priok-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '08ffe248d1f209133152f59578f157734575862befe2292b94c3eb8e2430d2da',
            ],
            'replacements' => [
                [
                    'old' => 'detikFinance · 18 Jun 2015</span></div></a></div>',
                    'new' => "detikFinance · 18 Jun 2015</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Jasa Customs Clearance Tanjung Priok: Layanan PPJK, Pengeluaran SPPB, dan Gate Pass',
                'og_title' => 'Jasa Customs Clearance Tanjung Priok: Layanan PPJK, Pengeluaran SPPB, dan Gate Pass',
                'meta_description' => 'Layanan customs clearance di Pelabuhan Tanjung Priok: penerbitan SPPB cepat, asistensi Jalur Merah SPJM, transfer EDI, dan penerbitan Gate Pass terminal.',
                'excerpt' => 'Layanan kepabeanan profesional di Pelabuhan Utama Tanjung Priok Jakarta: pengurusan dokumen PIB/PEB modul CEISA, penanganan nota penolakan, dan armada trucking kontainer.',
            ],
        ],
        [
            'article_id' => 218,
            'expected' => [
                'title' => 'Prosedur Kepabeanan Impor Alat Berat via Tanjung Priok',
                'slug' => 'prosedur-kepabeanan-impor-alat-berat-via-tanjung-priok',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '82039c3e64749d2b2214f94641c17661b0b1ffe563cb216f7ae3ebc3525b876f',
            ],
            'replacements' => [
                [
                    'old' => 'Gaikindo · 18 Jul 2021</span></div></a></div>',
                    'new' => "Gaikindo · 18 Jul 2021</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Prosedur Kepabeanan Impor Alat Berat: Laporan Surveyor BMBB, Uji Emisi, dan PIB Priok',
                'og_title' => 'Prosedur Kepabeanan Impor Alat Berat: Laporan Surveyor BMBB, Uji Emisi, dan PIB Priok',
                'meta_description' => 'Tahapan impor alat berat (excavator, bulldozer, crane) di Tanjung Priok: verifikasi Laporan Surveyor (LS), Surat Persetujuan Impor (PI), dan PIB BC 2.0.',
                'excerpt' => 'Prosedur resmi kepabeanan impor armada alat berat dan mesin konstruksi: audit teknis surveyor pra-pengapalan, kepatuhan regulasi lartas Kemendag, dan proses PIB.',
            ],
        ],
        [
            'article_id' => 219,
            'expected' => [
                'title' => 'Checklist Dokumen Impor via Tanjung Priok: Panduan Lengkap',
                'slug' => 'checklist-dokumen-impor-via-tanjung-priok',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '7a8a6a59eff166088c726085afdf74a2ffd595b7123e57f92688ee7f71fc529e',
            ],
            'replacements' => [
                [
                    'old' => 'TIMES Jatim · 24 Jun 2026</span></div></a></div>',
                    'new' => "TIMES Jatim · 24 Jun 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Checklist Dokumen Impor Kargo Tanjung Priok: Verifikasi Pos Manifest BC 1.1 dan DO',
                'og_title' => 'Checklist Dokumen Impor Kargo Tanjung Priok: Verifikasi Pos Manifest BC 1.1 dan DO',
                'meta_description' => 'Daftar periksa dokumen kepabeanan impor di Pelabuhan Tanjung Priok: pencocokan pos manifest BC 1.1, Delivery Order (DO) pelayaran, packing list, dan PIB.',
                'excerpt' => 'Checklist berkas kepabeanan wajib impor kargo laut Pelabuhan Tanjung Priok: validasi manifes kedatangan kapal, invoice perdagangan, dan kelengkapan dokumen perizinan impor.',
            ],
        ],
        [
            'article_id' => 220,
            'expected' => [
                'title' => 'Cara UMKM Impor Bahan Baku Lewat PPJK Tanjung Priok',
                'slug' => 'cara-umkm-impor-bahan-baku-via-ppjk-tanjung-priok',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '6f4bf7bf61d5bd5b795db143edfa3eb061d2b09aa74c94d44913df5b584b09d0',
            ],
            'replacements' => [
                [
                    'old' => 'CNBC Indonesia · 01 Jul 2026</span></div></a></div>',
                    'new' => "CNBC Indonesia · 01 Jul 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Impor Bahan Baku Industri UMKM: Pemanfaatan Jasa PPJK Tanjung Priok dan Skema KITE',
                'og_title' => 'Impor Bahan Baku Industri UMKM: Pemanfaatan Jasa PPJK Tanjung Priok dan Skema KITE',
                'meta_description' => 'Strategi efisiensi impor bahan baku industri UMKM: penggunaan jasa PPJK profesional Tanjung Priok, skema insentif fasilitas KITE, dan billing pabean.',
                'excerpt' => 'Panduan pengadaan bahan baku impor bagi industri kecil menengah (IKM): kolaborasi PPJK terdaftar, pemanfaatan fasilitas Kemudahan Impor Tujuan Ekspor (KITE), dan bea masuk.',
            ],
        ],
        [
            'article_id' => 221,
            'expected' => [
                'title' => 'Dokumen Wajib Ekspor via Tanjung Priok: Panduan Lengkap',
                'slug' => 'dokumen-wajib-ekspor-via-tanjung-priok',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'b57371136c4376090886dfeea790d07479365d836f7ea35eaba6c729404d286c',
            ],
            'replacements' => [
                [
                    'old' => 'Hukumonline · 17 Jun 2026</span></div></a></div>',
                    'new' => "Hukumonline · 17 Jun 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Dokumen Wajib Ekspor Tanjung Priok: Pendaftaran PEB BC 3.0, NPE, dan COO SKA',
                'og_title' => 'Dokumen Wajib Ekspor Tanjung Priok: Pendaftaran PEB BC 3.0, NPE, dan COO SKA',
                'meta_description' => 'Checklist dokumen ekspor kargo laut Tanjung Priok: pendaftaran modul PEB CEISA 4.0, penerbitan Nota Pelayanan Ekspor (NPE), dan SKA Dinas Perdagangan.',
                'excerpt' => 'Daftar berkas perizinan ekspor komoditas kargo laut Pelabuhan Tanjung Priok: pendaftaran modul kepabeanan PEB, verifikasi fisik peti kemas, dan penerbitan surat jalan ekspor.',
            ],
        ],
        [
            'article_id' => 222,
            'expected' => [
                'title' => 'Checklist Dokumen Impor Alat Berat via Tanjung Priok',
                'slug' => 'checklist-dokumen-impor-alat-berat-via-tanjung-priok',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '4f4e605ec07a5e2f09cb90051fd1595f2edbc4d761b8fc3a1bf21d7fceaf76d5',
            ],
            'replacements' => [
                [
                    'old' => 'Kompas.id · 18 Nov 2025</span></div></a></div>',
                    'new' => "Kompas.id · 18 Nov 2025</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Dokumen Impor Alat Berat Bukan Baru: Verifikasi Teknis Surveyor dan Persetujuan Impor',
                'og_title' => 'Dokumen Impor Alat Berat Bukan Baru: Verifikasi Teknis Surveyor dan Persetujuan Impor',
                'meta_description' => 'Checklist dokumen impor alat berat di Tanjung Priok: Surat Persetujuan Impor (PI) Kemendag, Laporan Surveyor (LS), Certificate of Origin, dan PIB BC 2.0.',
                'excerpt' => 'Persyaratan administratif dan teknis impor alat berat industri: pemeriksaan fisik pra-kapal surveyor internasional, izin impor Kemendag, dan clearance pabean Tanjung Priok.',
            ],
        ],
    ],
];
