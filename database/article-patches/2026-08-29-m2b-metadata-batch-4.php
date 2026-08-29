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
    'review_notes' => 'M2B country-specific import and industrial trade articles metadata de-templating batch 4.',
    'articles' => [
        [
            'article_id' => 223,
            'expected' => [
                'title' => 'Checklist Dokumen Bea Cukai Impor Belawan: Panduan Lengkap',
                'slug' => 'checklist-dokumen-bea-cukai-impor-belawan',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '052a9afaee65e88ed9888a400e5b55a2221d688f76cb705e93144c1127aebfe3',
            ],
            'replacements' => [
                [
                    'old' => 'suara indonesia · 25 Jun 2026</span></div></a></div>',
                    'new' => "suara indonesia · 25 Jun 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Checklist Dokumen Kepabeanan Impor Pelabuhan Belawan: Manifest BC 1.1 dan PIB',
                'og_title' => 'Checklist Dokumen Kepabeanan Impor Pelabuhan Belawan: Manifest BC 1.1 dan PIB',
                'meta_description' => 'Checklist dokumen wajib impor kargo laut Belawan: pencocokan manifest BC 1.1, Delivery Order (DO) pelayaran, packing list, polis asuransi, dan PIB BC 2.0.',
                'excerpt' => 'Daftar periksa kelengkapan administrasi kepabeanan impor barang via Pelabuhan Belawan: dokumen inward manifest, modul PIB CEISA, dan penyelesaian surat penyerahan peti kemas.',
            ],
        ],
        [
            'article_id' => 224,
            'expected' => [
                'title' => 'Checklist Dokumen Impor Tanjung Priok: Panduan Lengkap 2026',
                'slug' => 'checklist-dokumen-impor-tanjung-priok-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '532c12a49033998930c2373aa996945b5447a7bfd6ba789321e10c25de79ef0e',
            ],
            'replacements' => [
                [
                    'old' => 'CNN Indonesia · 06 Jun 2026</span></div></a></div>',
                    'new' => "CNN Indonesia · 06 Jun 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Checklist Dokumen Impor Kargo Pelabuhan Tanjung Priok: Standar PIB dan SPPB',
                'og_title' => 'Checklist Dokumen Impor Kargo Pelabuhan Tanjung Priok: Standar PIB dan SPPB',
                'meta_description' => 'Panduan dokumen kepabeanan impor di Tanjung Priok: validasi modul PIB CEISA 4.0, kelengkapan izin lartas INSW, dan penerbitan SPPB pengeluaran kargo.',
                'excerpt' => 'Checklist berkas kepabeanan kargo impor di Pelabuhan Tanjung Priok: verifikasi nomor manifest, upload dokumen pelengkap elektronik (DOKAP), dan penerbitan SPPB.',
            ],
        ],
        [
            'article_id' => 240,
            'expected' => [
                'title' => 'Cara Impor Barang dari Korea Selatan ke Indonesia Terbaru 2026',
                'slug' => 'cara-impor-barang-dari-korea-selatan-ke-indonesia-terbaru-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'daafdee2d58e8a0574aebf13db77093d08f5291348dd824f66ea00995e6e430f',
            ],
            'replacements' => [
                [
                    'old' => 'CNN Indonesia · 05 May 2026</span></div></a></div>',
                    'new' => "CNN Indonesia · 05 May 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Impor Barang dari Korea Selatan: Skema Preferensi AKFTA Form AK dan IK-CEPA',
                'og_title' => 'Impor Barang dari Korea Selatan: Skema Preferensi AKFTA Form AK dan IK-CEPA',
                'meta_description' => 'Tata cara impor produk dari Korea Selatan ke Indonesia: tarif preferensi IK-CEPA & AKFTA Form AK (Bea Masuk 0%), kepatuhan BPOM/SNI, dan jalur pabean.',
                'excerpt' => 'Panduan importasi produk dari Korea Selatan: pemanfaatan perjanjian dagang bilateral IK-CEPA dan AKFTA, verifikasi standar teknis SNI/BPOM, dan pengurusan kepabeanan.',
            ],
        ],
        [
            'article_id' => 243,
            'expected' => [
                'title' => 'Impor Barang dari Jepang ke Indonesia: Panduan Lengkap',
                'slug' => 'impor-barang-dari-jepang-ke-indonesia-panduan-lengkap',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'f3718613da6a4649c381e02df12aaa42ccbb0d5ef10d16227677173024393a58',
            ],
            'replacements' => [
                [
                    'old' => 'Bloomberg Technoz · 02 Feb 2026</span></div></a></div>',
                    'new' => "Bloomberg Technoz · 02 Feb 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Impor Barang dari Jepang: Pemanfaatan Fasilitas IJEPA Form IJ dan Prosedur PIB',
                'og_title' => 'Impor Barang dari Jepang: Pemanfaatan Fasilitas IJEPA Form IJ dan Prosedur PIB',
                'meta_description' => 'Panduan teknis impor kargo dari Jepang: pemanfaatan SKA IJEPA Form IJ / AJCEP, verifikasi perizinan lartas Kemendag, dan proses clearance dokumen PIB.',
                'excerpt' => 'Tata cara mengimpor mesin dan produk industri dari Jepang: pemanfaatan skema preferensi tarif IJEPA Form IJ, verifikasi Laporan Surveyor, dan dokumen deklarasi PIB.',
            ],
        ],
        [
            'article_id' => 245,
            'expected' => [
                'title' => 'Cara Impor Barang dari Thailand ke Indonesia: Panduan Lengkap',
                'slug' => 'cara-impor-barang-dari-thailand-ke-indonesia',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '5e00183596743b481e4deded20f365265b04ac2a6f48836be840b8d4a93d0194',
            ],
            'replacements' => [
                [
                    'old' => 'DHL · 03 Mar 2026</span></div></a></div>',
                    'new' => "DHL · 03 Mar 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Impor Barang dari Thailand: Fasilitas ATIGA Form D dan Regulasi Karantina Barantin',
                'og_title' => 'Impor Barang dari Thailand: Fasilitas ATIGA Form D dan Regulasi Karantina Barantin',
                'meta_description' => 'Prosedur impor komoditas pertanian, otomotif, & pangan dari Thailand: tarif Bea Masuk 0% ATIGA Form D, izin fitosanitari Barantin, dan kepatuhan pabean.',
                'excerpt' => 'Prosedur pengadaan produk dari Thailand: pemanfaatan Certificate of Origin ATIGA Form D untuk bea masuk 0%, sertifikasi karantina pangan, dan jalur pengawasan kepabeanan.',
            ],
        ],
        [
            'article_id' => 248,
            'expected' => [
                'title' => 'Impor Barang dari Malaysia ke Indonesia: Panduan Lengkap 2026',
                'slug' => 'impor-barang-dari-malaysia-ke-indonesia-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'c6bbc12df3163a9ad65974af71ff26343a444144e608e783a9a1fe1fb13189d7',
            ],
            'replacements' => [
                [
                    'old' => 'voi.id · 03 Jun 2026</span></div></a></div>',
                    'new' => "voi.id · 03 Jun 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Impor Barang dari Malaysia: Skema ASEAN Trade in Goods Agreement (ATIGA Form D)',
                'og_title' => 'Impor Barang dari Malaysia: Skema ASEAN Trade in Goods Agreement (ATIGA Form D)',
                'meta_description' => 'Tata laksana impor produk dari Malaysia ke pelabuhan Indonesia: pemanfaatan tarif ATIGA Form D (e-Form D ASEAN), verifikasi sertifikasi Halal, dan PIB.',
                'excerpt' => 'Panduan perdagangan impor bilateral Indonesia-Malaysia: integrasi electronic Form D (e-ATIGA) melalui ASEAN Single Window, dokumen kepabeanan, dan pengiriman kontainer.',
            ],
        ],
        [
            'article_id' => 251,
            'expected' => [
                'title' => 'Cara Impor Barang dari Singapura ke Indonesia: Panduan Lengkap',
                'slug' => 'cara-impor-barang-dari-singapura-ke-indonesia',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'e12a98ea2f6ea025eaf2bed3a4fa07e1c94ff28bb3d05784df75bf011d923b00',
            ],
            'replacements' => [
                [
                    'old' => 'Pajakku · 15 Dec 2025</span></div></a></div>',
                    'new' => "Pajakku · 15 Dec 2025</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Impor Barang dari Singapura: Hub Transshipment, Dokumen Back-to-Back COO, dan PIB',
                'og_title' => 'Impor Barang dari Singapura: Hub Transshipment, Dokumen Back-to-Back COO, dan PIB',
                'meta_description' => 'Mekanisme impor kargo via Singapura: pengelolaan dokumen Back-to-Back COO, transit pelabuhan hub internasional, verifikasi keaslian barang, dan clearance.',
                'excerpt' => 'Mekanisme pengiriman kargo impor transit pelabuhan Singapura: penerbitan dokumen asal barang Back-to-Back Certificate of Origin, pengurusan izin pabean, dan short-sea shipping.',
            ],
        ],
        [
            'article_id' => 255,
            'expected' => [
                'title' => 'Cara Impor dari 1688.com: Panduan Lengkap Sourcing Grosir',
                'slug' => 'cara-impor-1688-com-grosir-m2b',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'b957c2a74af7407ef901af41f89ab957ab3c79520fab8921ee74675b148d3d5d',
            ],
            'replacements' => [
                [
                    'old' => '</div></a></div>',
                    'new' => "</div></a></div>\n".$officialReferencesBlock,
                    'expected_occurrences' => 1,
                ],
            ],
            'changes' => [
                'title' => 'Sourcing Grosir 1688.com: Pembayaran Alipay Bisnis, Forwarder Gudang Guangzhou, dan PIB',
                'og_title' => 'Sourcing Grosir 1688.com: Pembayaran Alipay Bisnis, Forwarder Gudang Guangzhou, dan PIB',
                'meta_description' => 'Panduan sourcing barang pabrik di 1688.com China: pembayaran via agen Alipay, konsolidasi gudang forwarder Yiwu/Guangzhou, dan importasi resmi via PPJK.',
                'excerpt' => 'Panduan belanja grosir tangan pertama langsung dari pabrik Tiongkok via 1688.com: negosiasi kuantitas MOQ, konsolidasi kargo di warehouse China, dan clearance resmi.',
            ],
        ],
        [
            'article_id' => 259,
            'expected' => [
                'title' => 'Panduan Lengkap Cara Belanja & Impor Barang Taobao ke Indonesia',
                'slug' => 'panduan-impor-taobao-indonesia',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '32ff078d5b9960c0bd469e32ac0b28933d6fe8894d48b33cab64948f3abfac72',
            ],
            'replacements' => [
                [
                    'old' => 'CNBC Indonesia · 10 Jul 2019</span></div></a></div>',
                    'new' => "CNBC Indonesia · 10 Jul 2019</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Belanja dan Impor Barang Taobao: Konsolidasi Gudang Logistik dan Izin Bea Cukai',
                'og_title' => 'Belanja dan Impor Barang Taobao: Konsolidasi Gudang Logistik dan Izin Bea Cukai',
                'meta_description' => 'Cara belanja grosir dan retail di Taobao China: sistem pembayaran internasional, sewa warehouse konsolidasi di China, pengiriman laut, dan pajak impor.',
                'excerpt' => 'Langkah belanja aman di marketplace Taobao Tiongkok: pemilihan seller terpercaya dengan badge mahkota/berlian, jasa pergudangan forwarding, dan pelunasan pajak impor resmi.',
            ],
        ],
        [
            'article_id' => 263,
            'expected' => [
                'title' => 'Panduan Lengkap Impor Mesin Industri ke Indonesia Terbaru 2026',
                'slug' => 'impor-mesin-industri-indonesia-2026',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => 'dfe97cb35cb47c0004b65db6b48da3cf252f195dd09f4bec06cbdd10b2da8a81',
            ],
            'replacements' => [
                [
                    'old' => 'rmol.id · 05 May 2026</span></div></a></div>',
                    'new' => "rmol.id · 05 May 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Impor Mesin Industri Pabrik: Fasilitas Pembebasan Bea Masuk Masterlist BKPM',
                'og_title' => 'Impor Mesin Industri Pabrik: Fasilitas Pembebasan Bea Masuk Masterlist BKPM',
                'meta_description' => 'Prosedur impor mesin lini produksi manufaktur: pemanfaatan fasilitas Masterlist Bea Masuk 0% BKPM, verifikasi Laporan Surveyor (LS), dan deklarasi PIB.',
                'excerpt' => 'Prosedur pengadaan mesin pabrik baru dan bukan baru: pengajuan fasilitas insentif pembebasan bea masuk Masterlist Kementerian Investasi / BKPM dan izin impor kepabeanan.',
            ],
        ],
        [
            'article_id' => 267,
            'expected' => [
                'title' => 'Cara Impor Sparepart: Panduan Lengkap untuk Pemula (Wajib Tahu!)',
                'slug' => 'cara-impor-sparepart-panduan-lengkap-pemula',
                'status' => 'published',
                'editorial_status' => 'legacy',
                'content_sha256' => '9b590e4f1edd8d33bf1c9e45125ea052677a20fd285ba72b92fdead2fb20de62',
            ],
            'replacements' => [
                [
                    'old' => '<h1 id="cara-impor-sparepart-panduan-lengkap-untuk-pemula-wajib-tahu">Cara Impor Sparepart: Panduan Lengkap untuk Pemula (Wajib Tahu!)</h1>',
                    'new' => '<h1 id="cara-impor-sparepart-otomotif-mesin">Impor Sparepart Otomotif & Mesin: Klasifikasi Pos Tarif HS Code dan Regulasi SNI</h1>
<p><strong>Checklist simulasi studi kasus:</strong> Identifikasi nomor pos tarif HS Code dan verifikasi Lartas suku cadang otomotif serta komponen mesin industri sebelum pengapalan kargo.</p>',
                ],
                [
                    'old' => 'Lentera.co · 07 Jun 2026</span></div></a></div>',
                    'new' => "Lentera.co · 07 Jun 2026</span></div></a></div>\n".$officialReferencesBlock,
                ],
            ],
            'changes' => [
                'title' => 'Impor Sparepart Otomotif & Mesin: Klasifikasi Pos Tarif HS Code dan Regulasi SNI',
                'og_title' => 'Impor Sparepart Otomotif & Mesin: Klasifikasi Pos Tarif HS Code dan Regulasi SNI',
                'meta_description' => 'Ketentuan impor suku cadang (spare parts) otomotif & industri: identifikasi pos tarif HS Code BTKI, izin Persetujuan Impor (PI), dan uji kesesuaian SNI.',
                'excerpt' => 'Panduan teknis impor suku cadang otomotif dan komponen permesinan: penentuan pos tarif BTKI 8 digit, pemenuhan standar SNI wajib, dan regulasi Lartas Kementerian Perindustrian.',
            ],
        ],
    ],
];
