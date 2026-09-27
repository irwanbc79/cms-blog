<?php

return [
    'article_id' => 11,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Ekspor Material Konstruksi: Panduan Lengkap untuk Pemula',
        'slug' => 'ekspor-material-konstruksi-panduan-lengkap-pemula',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '37481611126976527f5485120153392ae5a50fb25fcb379d3ccc474a7da74717',
    ],
    'review_notes' => 'GMA construction-material export pillar rebuilt on 2026-08-28 using current Bea Cukai export procedure, INSW/INTR product-control lookup, Kemendag export-policy status, BSN standards catalogue, and IPPC ISPM 15 guidance. Removes unsupported market, port, cost-percentage, payment-guarantee, and smooth-clearance claims. Adds product identity and HS gates, regulatory snapshots, a product-data matrix, document reconciliation, a transparent cost simulation, packaging controls, red flags, and a shipment close-out checklist. Product-specific Indonesian and destination requirements must be rechecked for the actual HS code and shipment date.',
    'changes' => [
        'title' => 'Ekspor Material Konstruksi: HS Code, Lartas, dan Checklist',
        'focus_keyword' => 'ekspor material konstruksi',
        'meta_description' => 'Panduan ekspor material konstruksi: identifikasi produk, HS code, lartas, standar tujuan, PEB, packing, simulasi biaya, dan checklist sebelum shipment.',
        'excerpt' => 'Kerangka verifikasi ekspor keramik, batu, baja, kaca, kayu olahan, dan material lain berdasarkan spesifikasi produk, HS code, lartas, serta negara tujuan.',
        'og_title' => 'Ekspor Material Konstruksi: HS Code, Lartas, dan Checklist',
        'og_description' => 'Verifikasi produk, HS code, lartas, standar buyer, dokumen, packing, biaya, dan shipment gate sebelum mengekspor material konstruksi.',
        'pillar' => 'ekspor-impor',
        'tags' => ['ekspor material konstruksi', 'HS code', 'lartas ekspor', 'PEB', 'packing ekspor'],
        'hashtags' => ['Ekspor', 'MaterialKonstruksi', 'HSCode', 'Lartas', 'ExportCompliance'],
        'image_alt_texts' => [
            'Tim ekspor memeriksa spesifikasi teknis dan HS code material konstruksi sebelum shipment',
            'Petugas gudang memverifikasi label, pallet, berat, dan packing list material konstruksi ekspor',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah semua material konstruksi bebas diekspor?',
                'answer' => 'Tidak dapat disimpulkan dari nama komersialnya. Status ekspor harus diperiksa berdasarkan uraian teknis, HS code, tingkat pengolahan, asal bahan, regulasi yang berlaku pada tanggal transaksi, serta persyaratan negara tujuan.',
            ],
            [
                'question' => 'Apakah forwarder dapat menentukan HS code eksportir?',
                'answer' => 'Forwarder atau PPJK dapat membantu analisis, tetapi eksportir harus menyediakan spesifikasi yang benar dan memastikan pemberitahuan pabean konsisten. Untuk kasus yang meragukan, gunakan jalur konsultasi atau penetapan yang tersedia pada instansi berwenang.',
            ],
            [
                'question' => 'Apakah sertifikat SNI otomatis diterima oleh buyer luar negeri?',
                'answer' => 'Tidak otomatis. SNI, standar negara tujuan, spesifikasi kontrak, metode pengujian, dan skema penilaian kesesuaian dapat berbeda. Buyer dan regulator tujuan harus mengonfirmasi standar serta bukti yang diterima.',
            ],
            [
                'question' => 'Dokumen apa yang harus disiapkan sebelum PEB?',
                'answer' => 'Minimum operasional biasanya meliputi identitas eksportir, invoice, packing list, data booking dan transportasi, uraian serta HS barang, nilai, jumlah, berat, negara tujuan, dan dokumen lartas bila diwajibkan. Daftar final bergantung pada produk dan transaksi aktual.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>“Material konstruksi” bukan satu kategori kepabeanan. Keramik, batu alam, semen, baja, kaca, kayu olahan, panel, dan bahan insulasi memiliki komposisi, tingkat pengolahan, HS code, serta persyaratan yang berbeda. Nama dagang seperti “batu dekoratif” atau “panel bangunan” belum cukup untuk menentukan apakah barang bebas, diatur, atau dilarang diekspor.</p>

<p>Pekerjaan pertama eksportir bukan mencari tarif freight, melainkan mengunci identitas produk. Setelah itu barulah HS code, larangan dan pembatasan, standar negara tujuan, dokumen, kemasan, serta biaya dapat diperiksa secara bertanggung jawab. Panduan ini menggunakan pendekatan product-first agar keputusan tidak dibangun dari tebakan.</p>

<h2>Gate 1: buat technical product dossier</h2>

<p>Satu file produk harus menjawab apa barangnya, terbuat dari apa, bagaimana diproses, bentuk akhirnya, ukuran, fungsi, merek, dan cara dikemas. Lampirkan foto, drawing, katalog, composition sheet, material safety data bila relevan, serta laporan uji yang benar-benar mewakili barang.</p>

<table>
<thead><tr><th>Kelompok produk</th><th>Data teknis minimum</th><th>Risiko klasifikasi atau operasional</th></tr></thead>
<tbody>
<tr><td>Keramik atau tile</td><td>Komposisi, proses pembakaran, glazed/unglazed, dimensi, ketebalan, water absorption</td><td>Uraian terlalu umum, pecah, berat per pallet, spesifikasi buyer</td></tr>
<tr><td>Batu alam</td><td>Jenis batu, block/slab/tile, dipotong atau dipoles, ukuran, asal bahan</td><td>Tingkat pengolahan mengubah klasifikasi; produk tertentu dapat memiliki pengaturan sektoral</td></tr>
<tr><td>Baja</td><td>Grade, chemical composition, bentuk, ukuran, coating, heat number, standard</td><td>Perbedaan alloy/non-alloy, flat/long product, coating, serta product standard</td></tr>
<tr><td>Kaca</td><td>Float/tempered/laminated, ketebalan, coating, dimensi, penggunaan</td><td>Klasifikasi dan standar keselamatan berbeda menurut proses dan fungsi</td></tr>
<tr><td>Kayu olahan</td><td>Species, asal, ukuran, tingkat pengolahan, coating, komponen</td><td>Legalitas bahan, dokumen produk kehutanan, species restriction, dan persyaratan negara tujuan</td></tr>
<tr><td>Semen atau mortar</td><td>Komposisi, bentuk powder/premix, kemasan, berat, data keselamatan</td><td>Dust control, moisture, shelf life, dangerous-goods review, dan standar tujuan</td></tr>
</tbody>
</table>

<p>Jika data teknis belum final, gunakan status <strong>hold</strong>. Mengubah uraian agar cocok dengan kode yang dianggap lebih mudah dapat menghasilkan ketidaksesuaian antara barang, invoice, packing list, hasil pemeriksaan, dan pemberitahuan pabean.</p>

<h2>Gate 2: tentukan HS code dari karakter barang</h2>

<p>HS code ditentukan melalui uraian barang, material, fungsi, bentuk, dan tingkat pengerjaan dengan membaca nomenklatur serta catatan bagian atau bab yang relevan. Jangan memilih kode hanya karena produk pesaing memakai kode tersebut. Barang yang terlihat serupa dapat berbeda komposisi atau proses.</p>

<p>Gunakan <a href="https://intr.insw.go.id/" target="_blank" rel="noopener noreferrer">Indonesia National Trade Repository pada INSW</a> untuk menelusuri informasi HS, lartas, peraturan, tarif, dan rules of origin. Simpan hasil penelusuran beserta tanggal, kata kunci, kode yang dianalisis, dan dasar pemilihannya. Data harus diperiksa ulang sebelum shipment karena regulasi dapat berubah.</p>

<p>Classification memo internal sebaiknya memuat foto barang, spesifikasi, kandidat kode, catatan nomenklatur yang dipakai, alasan kandidat lain ditolak, pihak yang meninjau, serta versi tanggal. Bila terdapat keraguan material, gunakan kanal konsultasi atau penetapan yang tersedia pada otoritas terkait sebelum produksi massal atau kontrak final.</p>

<h2>Gate 3: periksa bebas, diatur, atau dilarang</h2>

<p>Kebijakan dan pengaturan ekspor saat artikel ini diperbarui antara lain tercantum dalam <a href="https://jdih.kemendag.go.id/peraturan/peraturan-menteri-perdagangan-nomor-23-tahun-2023-tentang-kebijakan-dan-pengaturan-ekspor" target="_blank" rel="noopener noreferrer">Permendag 23 Tahun 2023 beserta perubahannya</a>. Barang yang dilarang untuk diekspor diatur terpisah melalui Permendag 22 Tahun 2023, yang telah beberapa kali diubah dan terakhir perlu dibaca bersama <a href="https://jdih.kemendag.go.id/peraturan/peraturan-menteri-perdagangan-republik-indonesia-nomor-6-tahun-2026-tentang-perubahan-keempat-atas-peraturan-menteri-perdagangan-nomor-22-tahun-2023-tentang-barang-yang-dilarang-untuk-diekspor-2" target="_blank" rel="noopener noreferrer">Permendag 6 Tahun 2026</a>.</p>

<p>Jangan menyimpulkan status hanya dari judul peraturan. Telusuri lampiran berdasarkan HS code dan uraian barang, lalu periksa apakah diperlukan eksportir terdaftar, persetujuan ekspor, laporan surveyor, dokumen legalitas, rekomendasi teknis, atau keluaran lain. Untuk produk campuran atau set, periksa setiap komponen yang material.</p>

<h2>Gate 4: bedakan aturan Indonesia dan syarat negara tujuan</h2>

<p>Lolos dari sisi ekspor Indonesia tidak otomatis berarti barang dapat diedarkan atau dipakai di negara tujuan. Buyer dapat meminta product standard, marking, test report, factory audit, certificate of conformity, fire rating, structural performance, chemical limits, atau dokumen lingkungan.</p>

<p>Katalog <a href="https://pesta.bsn.go.id/produk/index/144" target="_blank" rel="noopener noreferrer">Badan Standardisasi Nasional</a> dapat digunakan untuk memeriksa status standar SNI yang relevan di Indonesia. Namun SNI bukan pengganti otomatis bagi standar tujuan. Buat requirement matrix yang membandingkan standar kontrak, metode uji, acceptance criteria, laboratorium yang diterima, masa berlaku laporan, dan pihak yang bertanggung jawab.</p>

<table>
<thead><tr><th>Requirement</th><th>Sumber</th><th>Bukti</th><th>Pemilik tindakan</th><th>Status</th></tr></thead>
<tbody>
<tr><td>Spesifikasi produk</td><td>Purchase order/drawing</td><td>Approved datasheet</td><td>Engineering/QC</td><td>Open/closed</td></tr>
<tr><td>Standar negara tujuan</td><td>Regulator/buyer</td><td>Standard dan test report</td><td>Compliance</td><td>Open/closed</td></tr>
<tr><td>HS dan lartas Indonesia</td><td>INSW/JDIH</td><td>Classification memo dan izin</td><td>Eksportir</td><td>Open/closed</td></tr>
<tr><td>Marking dan label</td><td>Kontrak/aturan tujuan</td><td>Artwork approval dan foto</td><td>Production/QC</td><td>Open/closed</td></tr>
<tr><td>Packing</td><td>Cargo dan carrier rule</td><td>Packing specification</td><td>Warehouse</td><td>Open/closed</td></tr>
</tbody>
</table>

<h2>Gate 5: rekonsiliasi dokumen sebelum PEB</h2>

<p><a href="https://www.beacukai.go.id/tata-laksana-ekspor" target="_blank" rel="noopener noreferrer">Tata laksana ekspor Bea Cukai</a> menjelaskan alur persiapan barang, penyampaian Pemberitahuan Ekspor Barang, penelitian dokumen, pemeriksaan fisik berdasarkan manajemen risiko, pemuatan, dan keberangkatan. PEB bukan pengganti dokumen teknis; datanya harus konsisten dengan barang dan dokumen pelengkap.</p>

<table>
<thead><tr><th>Data kunci</th><th>Invoice</th><th>Packing list</th><th>Booking/BL instruction</th><th>PEB</th></tr></thead>
<tbody>
<tr><td>Eksportir dan consignee</td><td>Harus sesuai</td><td>Referensi konsisten</td><td>Nama/alamat sesuai instruksi</td><td>Sesuai data legal dan transaksi</td></tr>
<tr><td>Uraian barang</td><td>Komersial dan teknis</td><td>Sama per item</td><td>Cukup untuk transportasi</td><td>Konsisten dengan HS dan spesifikasi</td></tr>
<tr><td>Jumlah dan unit</td><td>Sales unit</td><td>Package dan isi</td><td>Container/package count</td><td>Sesuai pemberitahuan</td></tr>
<tr><td>Berat</td><td>Net/gross bila digunakan</td><td>Net/gross per package</td><td>Gross dan VGM sesuai kebutuhan</td><td>Tidak bertentangan</td></tr>
<tr><td>Nilai dan currency</td><td>Contract value</td><td>N/A</td><td>Sesuai freight term</td><td>Sesuai ketentuan nilai pabean ekspor</td></tr>
</tbody>
</table>

<p>Dokumen operasional dapat mencakup invoice, packing list, sales contract atau purchase order, booking confirmation, PEB dan responsnya, transport document, surat keterangan asal bila digunakan, insurance document bila disyaratkan, test report, serta dokumen lartas sesuai HS. Tidak semua dokumen wajib untuk semua produk; document register harus dibuat per shipment.</p>

<h2>Packaging material berat dan rapuh</h2>

<p>Material konstruksi sering mempunyai kombinasi berat tinggi, tepi tajam, permukaan mudah tergores, atau toleransi kelembapan. Packing engineer perlu memeriksa berat per unit, centre of gravity, kapasitas pallet atau crate, lifting point, stacking limit, dunnage, blocking/bracing, corrosion atau moisture protection, dan distribusi beban container.</p>

<p>Bila menggunakan kayu sebagai kemasan atau penyangga dalam perdagangan internasional, periksa penerapan <a href="https://www.ippc.int/en/publications/640/" target="_blank" rel="noopener noreferrer">ISPM 15 dari International Plant Protection Convention</a>. Jenis material kayu, treatment, marking, dan ketentuan negara tujuan harus dikonfirmasi dengan penyedia kemasan serta otoritas terkait. Foto sebelum, selama, dan setelah stuffing membantu membuktikan kondisi dan metode pengamanan.</p>

<h2>Simulasi biaya satu shipment</h2>

<p>Contoh berikut adalah metode perhitungan dengan angka asumsi, bukan quotation atau patokan pasar.</p>

<table>
<thead><tr><th>Komponen</th><th>Asumsi</th><th>Bukti yang harus tersedia</th></tr></thead>
<tbody>
<tr><td>Nilai produk</td><td>USD 18.000</td><td>Costing dan commercial invoice</td></tr>
<tr><td>Export packing</td><td>USD 1.200</td><td>Quotation crate/pallet dan scope</td></tr>
<tr><td>Inland dan stuffing</td><td>USD 700</td><td>Transport quotation dan equipment</td></tr>
<tr><td>Testing/dokumen</td><td>USD 500</td><td>Lab, certificate, dan document fee</td></tr>
<tr><td>Origin handling</td><td>USD 900</td><td>Carrier/terminal/forwarder breakdown</td></tr>
<tr><td>Ocean freight</td><td>USD 3.100</td><td>Carrier quotation dan validity</td></tr>
<tr><td>Insurance</td><td>USD 150</td><td>Insurer quotation dan coverage</td></tr>
<tr><td>Total asumsi sampai batas scope</td><td>USD 24.550</td><td>Belum memasukkan biaya tujuan yang dikecualikan</td></tr>
</tbody>
</table>

<p>Model harus menambahkan contingency yang disetujui perusahaan, biaya pembiayaan, risiko kerusakan, detention, storage, inspection, serta biaya tujuan sesuai Incoterm dan quotation. Jangan menambahkan persentase “standar” tanpa dasar. Tandai setiap nilai sebagai confirmed, estimated, excluded, atau buyer account.</p>

<h2>Alur eksekusi dari inquiry sampai close-out</h2>

<ol>
<li><strong>Inquiry gate:</strong> buyer, negara tujuan, penggunaan produk, volume, target date, dan spesifikasi dikunci.</li>
<li><strong>Product gate:</strong> technical dossier dan sample disetujui.</li>
<li><strong>Compliance gate:</strong> HS, lartas, standar tujuan, test, dan izin ditutup.</li>
<li><strong>Commercial gate:</strong> harga, Incoterm, payment condition, claims, dan acceptance criteria tertulis.</li>
<li><strong>Production gate:</strong> QC plan, lot traceability, marking, dan packing selesai.</li>
<li><strong>Booking gate:</strong> carrier menerima cargo, berat, dimensi, container, dan rute.</li>
<li><strong>Document gate:</strong> invoice, packing list, booking, izin, dan data PEB direkonsiliasi.</li>
<li><strong>Stuffing gate:</strong> container condition, tally, foto, seal, VGM, dan handover tercatat.</li>
<li><strong>Departure gate:</strong> respons kepabeanan dan status pemuatan tersedia sebelum menyatakan barang berangkat.</li>
<li><strong>Close-out:</strong> dokumen final, biaya, discrepancy, claim, dan lesson learned diarsipkan.</li>
</ol>

<h2>Red flags yang harus menghentikan shipment</h2>

<ul>
<li>Buyer atau pemasok hanya memberikan nama dagang tanpa composition dan specification sheet.</li>
<li>HS code dipilih dari internet tanpa classification memo.</li>
<li>Hasil INSW lama dipakai tanpa pemeriksaan tanggal shipment.</li>
<li>Buyer menyatakan “tidak perlu sertifikat” tetapi tidak dapat menunjukkan dasar atau acceptance tertulis.</li>
<li>Test report memakai produk, metode, lot, atau laboratorium yang tidak sesuai kontrak.</li>
<li>Invoice, packing list, booking, dan barang fisik berbeda jumlah, uraian, atau berat.</li>
<li>Kayu kemasan tidak memiliki bukti treatment/marking ketika ISPM 15 berlaku.</li>
<li>Pembayaran atau perubahan rekening hanya dikirim melalui pesan instan tanpa verifikasi kanal kedua.</li>
<li>Tim diminta menjanjikan izin, clearance, NPE, atau penerimaan negara tujuan sebelum verifikasi selesai.</li>
</ul>

<h2>Checklist sebelum memberikan quotation final</h2>

<ul>
<li>Technical product dossier lengkap dan disetujui buyer.</li>
<li>HS analysis memiliki dasar dan peninjau.</li>
<li>Status lartas serta larangan ekspor diperiksa pada INSW/JDIH dan diberi tanggal.</li>
<li>Persyaratan regulator dan buyer di negara tujuan tertulis.</li>
<li>Standard, test method, laboratory, dan acceptance criteria disepakati.</li>
<li>Packing design sesuai berat, dimensi, handling, dan lingkungan perjalanan.</li>
<li>Carrier menerima commodity, berat, container, dan rute.</li>
<li>Semua biaya memiliki scope, currency, validity, tax, dan exclusion.</li>
<li>Payment term, documentary condition, dan dispute process direview pihak berwenang.</li>
<li>Shipment hanya berstatus go setelah seluruh gate material ditutup.</li>
</ul>

<h2>Kesimpulan</h2>

<p>Ekspor material konstruksi dimulai dari identitas teknis produk, bukan dari daftar dokumen generik. HS code mengarahkan pemeriksaan lartas; spesifikasi dan tujuan menentukan standar; sedangkan packing, carrier acceptance, dan rekonsiliasi dokumen menjaga kesiapan shipment. Setiap hasil pemeriksaan harus diberi tanggal karena aturan dan layanan dapat berubah.</p>

<p>GMA World dapat membantu menyusun product data sheet, comparison sheet, dan shipment checklist. Keputusan klasifikasi, perizinan, kepabeanan, penerimaan produk, serta biaya final tetap memerlukan data aktual dan validasi pihak yang berwenang.</p>

<h2>Referensi resmi</h2>

<ul>
<li><a href="https://www.beacukai.go.id/tata-laksana-ekspor" target="_blank" rel="noopener noreferrer">Direktorat Jenderal Bea dan Cukai — Tata Laksana Ekspor</a></li>
<li><a href="https://intr.insw.go.id/" target="_blank" rel="noopener noreferrer">Indonesia National Single Window — Indonesia National Trade Repository</a></li>
<li><a href="https://jdih.kemendag.go.id/peraturan/peraturan-menteri-perdagangan-nomor-23-tahun-2023-tentang-kebijakan-dan-pengaturan-ekspor" target="_blank" rel="noopener noreferrer">JDIH Kemendag — Permendag 23 Tahun 2023 dan status perubahannya</a></li>
<li><a href="https://jdih.kemendag.go.id/peraturan/peraturan-menteri-perdagangan-republik-indonesia-nomor-6-tahun-2026-tentang-perubahan-keempat-atas-peraturan-menteri-perdagangan-nomor-22-tahun-2023-tentang-barang-yang-dilarang-untuk-diekspor-2" target="_blank" rel="noopener noreferrer">JDIH Kemendag — Permendag 6 Tahun 2026</a></li>
<li><a href="https://pesta.bsn.go.id/produk/index/144" target="_blank" rel="noopener noreferrer">Badan Standardisasi Nasional — Katalog SNI</a></li>
<li><a href="https://www.ippc.int/en/publications/640/" target="_blank" rel="noopener noreferrer">IPPC — ISPM 15 Regulation of wood packaging material</a></li>
</ul>
HTML,
    ],
];
