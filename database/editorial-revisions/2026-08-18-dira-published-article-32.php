<?php

return [
    'article_id' => 32,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Cara Ekspor ke Malaysia: Panduan Lengkap Prosedur dan Dokumen 2026',
        'slug' => 'cara-ekspor-ke-malaysia-panduan-lengkap-prosedur-dan-dokumen-2026',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '3c2ae9aa65d413f6bf426292f6aa3af482290a237b615295a252adcd4c5b5c7a',
    ],
    'review_notes' => 'Live low-value remediation on 2026-08-18. Removed unsupported trade, tariff, halal, customs-lane, and client-volume claims; replaced them with a bilateral shipment-readiness workflow grounded in Indonesian and Malaysian official sources. Requires human editorial re-review.',
    'changes' => [
        'title' => 'Ekspor ke Malaysia: Checklist Importer, ATIGA, dan Dokumen Shipment',
        'focus_keyword' => 'dokumen ekspor ke Malaysia',
        'meta_description' => 'Checklist ekspor ke Malaysia: validasi importer, HS Code, larangan impor, aturan asal ATIGA, PEB, Form D, izin komoditas, dan dokumen shipment.',
        'excerpt' => 'Ekspor tidak selesai saat barang berangkat dari Indonesia. Kunci kesiapan importir Malaysia, HS Code, izin, origin, dan data dokumen sebelum booking.',
        'og_title' => 'Checklist Ekspor ke Malaysia: Importer, ATIGA, dan Dokumen',
        'og_description' => 'Alur operasional dari product dossier dan pengecekan Malaysia hingga PEB, e-Form D, document reconciliation, serta release shipment.',
        'pillar' => 'pasar-ekspor',
        'tags' => ['ekspor Malaysia', 'ATIGA', 'Form D', 'PEB', 'dokumen ekspor'],
        'hashtags' => ['EksporMalaysia', 'ATIGA', 'FormD', 'ExportCompliance', 'Dira'],
        'image_alt_texts' => [
            'Eksportir Indonesia dan importir Malaysia memeriksa dokumen shipment',
            'Checklist HS Code ATIGA Form D PEB dan izin impor Malaysia',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah semua ekspor Indonesia ke Malaysia mendapat tarif nol persen?',
                'answer' => 'Tidak. Tarif preferensi ATIGA bergantung pada pos tarif, jadwal konsesi, pemenuhan rules of origin, ketentuan pengiriman, dan bukti asal yang sah. Form D bukan jaminan tarif nol untuk semua barang.',
            ],
            [
                'question' => 'Siapa yang mengurus customs clearance di Malaysia?',
                'answer' => 'Importir Malaysia atau agen pabean yang ditunjuk menangani deklarasi impor berdasarkan data dan dokumen shipment. Eksportir tetap harus memastikan data produk, invoice, packing list, origin, dan izin yang disiapkan konsisten dengan kebutuhan importir.',
            ],
            [
                'question' => 'Apakah Form D wajib untuk setiap shipment ke Malaysia?',
                'answer' => 'Form D atau bukti asal ATIGA digunakan bila importir ingin mengklaim tarif preferensi dan barang memenuhi ketentuan asal. Shipment tetap dapat memiliki kewajiban lain meskipun tidak menggunakan preferensi.',
            ],
            [
                'question' => 'Apakah semua produk pangan ke Malaysia wajib sertifikat halal?',
                'answer' => 'Jangan menggunakan aturan blanket. Kebutuhan halal bergantung pada produk, klaim, kanal penjualan, buyer, dan regulasi yang berlaku. Importir harus memetakan otoritas serta persyaratan produk sebelum kontrak dan produksi label.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Ekspor ke Malaysia memiliki dua sisi yang harus selesai bersamaan. Di Indonesia, eksportir memenuhi ketentuan ekspor dan menyerahkan barang untuk dimuat. Di Malaysia, importir memastikan barang dapat diklasifikasikan, diizinkan masuk, dideklarasikan, serta memenuhi ketentuan produk. Shipment dapat lolos sisi Indonesia tetapi tertahan di negara tujuan bila sisi importir belum siap.</p>

<p>Karena itu, jangan memulai dari booking kapal atau daftar dokumen generik. Mulai dari product dossier, identitas importir, HS Code kandidat, intended use, negara bagian atau pelabuhan masuk, izin komoditas, dan keputusan apakah tarif preferensi ATIGA akan diklaim.</p>

<h2>Gate 1: pastikan importir Malaysia siap</h2>

<p>Minta buyer menunjuk legal entity yang akan menjadi importer of record. Nama perusahaan tersebut harus konsisten dengan purchase order, invoice, izin, deklarasi, dan pihak yang membayar kewajiban impor. Konfirmasi apakah importir melakukan deklarasi sendiri atau menunjuk customs agent.</p>

<p>Portal resmi Royal Malaysian Customs Department menjelaskan pada <a href="https://www.customs.gov.my/en/business/import-export/import/import-procedure" rel="noopener noreferrer" target="_blank">Import Procedure</a> bahwa impor perlu dideklarasikan dan klasifikasi tarif harus ditentukan untuk mengetahui kewajiban duti atau pajak. Eksportir tidak boleh mengasumsikan freight forwarder otomatis menjadi importir atau memegang seluruh izin.</p>

<table>
<thead><tr><th>Pertanyaan</th><th>Bukti yang diminta</th><th>Keputusan</th></tr></thead>
<tbody>
<tr><td>Siapa importer of record?</td><td>Nama legal, nomor registrasi, alamat, dan PIC clearance.</td><td>Tahan booking bila belum ditetapkan.</td></tr>
<tr><td>Siapa customs agent?</td><td>Surat penunjukan atau konfirmasi tertulis importir.</td><td>Pastikan agent menerima product dossier.</td></tr>
<tr><td>Apakah ada izin?</td><td>Nomor, pemegang, produk, kuantitas, masa berlaku, dan issuing agency.</td><td>Cocokkan dengan shipment aktual.</td></tr>
<tr><td>Apakah ATIGA diklaim?</td><td>HS Code, tarif normal, tarif preferensi, origin criterion, dan bukti asal.</td><td>Putuskan sebelum pengajuan Form D.</td></tr>
<tr><td>Siapa menyetujui label?</td><td>Approved artwork dan dasar persyaratan.</td><td>Jangan cetak massal sebelum approval.</td></tr>
</tbody>
</table>

<h2>Gate 2: kunci spesifikasi dan HS Code</h2>

<p>Nama “kopi”, “bumbu”, “snack”, “tekstil”, atau “bahan bangunan” belum cukup untuk klasifikasi. Siapkan komposisi, fungsi, material, proses, merek, model, ukuran, bentuk retail atau bulk, kondisi, negara asal, foto, katalog, serta technical data sheet. Untuk pangan, tambahkan ingredient list, formula, label, shelf life, dan proses produksi.</p>

<p>Susun HS Code kandidat dari karakter barang, bukan dari kode supplier atau produk yang tampak mirip. Importir dapat memeriksa <a href="https://ezhs.customs.gov.my/" rel="noopener noreferrer" target="_blank">JKDM HS Explorer</a> untuk informasi tarif dan larangan impor. Malaysia National Trade Repository juga menyediakan referensi ketentuan perdagangan melalui laman resmi <a href="https://www.customs.gov.my/en/business/facilitation/malaysia-national-trade-repository-mntr" rel="noopener noreferrer" target="_blank">MNTR</a>.</p>

<p>Bila eksportir dan importir memakai kode berbeda, jangan menyembunyikan perbedaan tersebut di dokumen. Dokumentasikan alasan klasifikasi, periksa level digit yang digunakan masing-masing negara, dan minta klarifikasi atau ruling sesuai tingkat risiko sebelum harga serta izin dikunci.</p>

<h2>Gate 3: cek larangan, pembatasan, dan aturan produk</h2>

<p>Malaysia menerapkan larangan absolut dan larangan bersyarat untuk barang tertentu. Daftar dan issuing agency mengikuti deskripsi serta tarif barang. Gunakan hasil pencarian HS Explorer, peraturan larangan impor, dan konfirmasi importir untuk memetakan izin, inspection, test report, registration, atau certificate yang diperlukan.</p>

<p>Jangan membuat aturan umum seperti “semua pangan harus halal”, “semua label harus berbahasa Melayu”, atau “semua produk pertanian cukup dengan phytosanitary certificate”. Kewajiban aktual dipengaruhi kategori produk, klaim pada label, bentuk kemasan, tujuan penggunaan, lokasi pemasukan, buyer, dan otoritas yang berwenang. Pisahkan persyaratan customs, food safety, halal, quarantine, standards, dan commercial specification.</p>

<ul>
<li>Siapa issuing agency dan siapa pemegang izinnya?</li>
<li>Apakah izin harus terbit sebelum shipment atau sebelum deklarasi?</li>
<li>Apakah produk, produsen, merek, ukuran, dan negara asal tercakup?</li>
<li>Apakah ada inspection, sampling, treatment, atau designated entry point?</li>
<li>Apakah label dan kemasan harus disetujui sebelum produksi?</li>
<li>Apakah original document atau data elektronik diperlukan untuk release?</li>
</ul>

<h2>Gate 4: hitung manfaat ATIGA secara benar</h2>

<p>ATIGA tidak berarti seluruh barang otomatis mendapat tarif nol persen. Kementerian Perdagangan menjelaskan melalui <a href="https://ftasupportcenter.kemendag.go.id/atiga" rel="noopener noreferrer" target="_blank">FTA Support Center ATIGA</a> bahwa pengurangan tarif menggunakan SKA Form D mensyaratkan Ketentuan Asal Barang. Malaysia MITI juga menegaskan bahwa barang harus memenuhi Rules of Origin agar layak memperoleh tarif preferensi.</p>

<p>Rules of Origin dapat berupa wholly obtained, Regional Value Content, Change in Tariff Classification, product-specific process, atau kombinasi. Angka RVC 40 persen adalah salah satu general rule yang sering dipakai, bukan jawaban universal untuk semua HS Code. Periksa Product Specific Rules dan data material aktual.</p>

<h3>Working paper origin</h3>

<table>
<thead><tr><th>Kolom</th><th>Isi</th></tr></thead>
<tbody>
<tr><td>Produk dan HS</td><td>HS final serta product-specific rule yang berlaku.</td></tr>
<tr><td>Origin criterion</td><td>WO, RVC, CTC, specific process, atau kombinasi.</td></tr>
<tr><td>Bahan baku</td><td>Asal, HS, nilai, supplier, dan bukti pendukung.</td></tr>
<tr><td>Proses</td><td>Tahap produksi di Indonesia dan lokasi fasilitas.</td></tr>
<tr><td>Perhitungan</td><td>Formula, periode data, kurs, cost element, dan reviewer.</td></tr>
<tr><td>Consignment</td><td>Route, transshipment, dan kontrol barang bila transit.</td></tr>
<tr><td>Bukti asal</td><td>e-Form D, Form D, atau deklarasi asal bila skema mengizinkan.</td></tr>
</tbody>
</table>

<p>Bandingkan tarif normal dan preferensi sebelum mengeluarkan biaya origin. Manfaat harus lebih besar daripada biaya administrasi, pengumpulan bukti supplier, potensi verifikasi, dan risiko ketidakpatuhan. Importir tetap yang mengajukan klaim tarif saat impor, sehingga kriteria dan data Form D harus disepakati sebelum keberangkatan.</p>

<h2>Gate 5: selesaikan kewajiban ekspor Indonesia</h2>

<p>Direktorat Jenderal Bea dan Cukai menjelaskan alur terkini pada laman <a href="https://www.beacukai.go.id/tata-laksana-ekspor" rel="noopener noreferrer" target="_blank">Tata Laksana Ekspor</a>. Pemberitahuan Ekspor Barang disampaikan dengan dokumen pelengkap, lalu sistem atau pejabat melakukan penelitian dan dapat melakukan pemeriksaan fisik secara selektif berdasarkan manajemen risiko. Nota Pelayanan Ekspor melindungi pemasukan barang ke kawasan pabean atau pemuatan setelah ketentuan terpenuhi.</p>

<p>Tidak tepat menulis alur ekspor sebagai “jalur hijau atau merah” untuk seluruh kasus tanpa konteks. Eksportir harus memeriksa lartas ekspor, bea keluar bila ada, fasilitas, ketentuan komoditas, tempat pemuatan, serta batas waktu penyampaian berdasarkan shipment aktual.</p>

<h2>Document pack minimum</h2>

<ul>
<li>Purchase order atau sales contract yang menetapkan produk, incoterm, harga, quantity, quality, dan tanggung jawab.</li>
<li>Commercial invoice dengan seller, buyer, description, HS reference, origin, quantity, unit price, currency, dan incoterm.</li>
<li>Packing list dengan package marks, jenis kemasan, jumlah, net weight, gross weight, dan dimension.</li>
<li>Bill of lading, sea waybill, air waybill, atau dokumen angkut lain sesuai moda.</li>
<li>PEB dan NPE sesuai kewajiban ekspor Indonesia.</li>
<li>e-Form D atau bukti asal lain bila tarif preferensi diklaim dan persyaratan dipenuhi.</li>
<li>Permit, certificate, test report, phytosanitary, health, halal, standards, atau dokumen komoditas hanya bila relevan.</li>
<li>Insurance certificate bila kewajiban pengadaan asuransi berada pada eksportir.</li>
</ul>

<h2>Rekonsiliasi sebelum cut-off</h2>

<p>Buat master shipment data dan bandingkan seller, buyer, consignee, notify party, description, HS Code, quantity, unit, lot, container, marks, weight, value, currency, incoterm, origin, vessel, voyage, port, serta tanggal pada semua dokumen. Perbedaan tidak boleh dibiarkan untuk “dikoreksi setelah kapal berangkat”.</p>

<h3>Pasang change-control setelah approval</h3>

<p>Supplier, buyer, atau forwarder dapat mengubah quantity, kemasan, route, consignee, vessel, atau tanggal mendekati cut-off. Setiap perubahan harus masuk change log, diperiksa dampaknya, dan disetujui kembali oleh pemilik dokumen terkait. Perubahan material dapat memengaruhi permit, origin, e-Form D, insurance, booking, PEB, dan deklarasi impor Malaysia.</p>

<p>Tentukan satu versi master data dengan nomor revisi. Jangan mengandalkan attachment dari percakapan berbeda tanpa penanda versi. Ketika final document pack dilepas, eksportir dan importir harus menerima daftar dokumen serta hash atau timestamp versi. Bila ada amendment setelah departure, catat alasan, pihak yang meminta, biaya, deadline, dan konsekuensi terhadap clearance.</p>

<p>Kontrol ini juga mencegah praktik mengganti uraian atau nilai hanya agar dokumen terlihat mudah diterima. Data shipment harus mengikuti transaksi serta barang aktual. Bila perubahan tidak dapat dijustifikasi, keputusan yang benar adalah hold dan klarifikasi, bukan menyesuaikan dokumen secara informal.</p>

<ol>
<li>Importir menyetujui product dossier, HS candidate, permit map, dan label.</li>
<li>Eksportir menyelesaikan lartas serta dokumen komoditas Indonesia.</li>
<li>Origin reviewer mengonfirmasi eligibility ATIGA dan bukti pendukung.</li>
<li>Forwarder mengirim shipping instruction dan draft dokumen angkut.</li>
<li>PPJK atau eksportir menyiapkan PEB dari master data yang sama.</li>
<li>Importir atau customs agent melakukan pre-clearance review.</li>
<li>Semua gap memiliki owner dan keputusan sebelum stuffing atau cargo handover.</li>
</ol>

<h2>Keputusan go, hold, atau stop</h2>

<ul>
<li><strong>Go:</strong> importer of record, HS, izin, origin, dokumen, biaya, dan timeline sudah dikonfirmasi.</li>
<li><strong>Hold:</strong> buyer ada tetapi importer, permit, tariff treatment, atau label belum siap.</li>
<li><strong>Redesign:</strong> margin tidak menutup compliance, testing, freight, atau working-capital risk.</li>
<li><strong>Stop:</strong> pihak meminta under-invoicing, HS Code tanpa dasar, sertifikat milik entitas lain, atau pengiriman sebelum izin wajib tersedia.</li>
</ul>

<p>Dira dapat membantu menyusun product dossier, permit matrix, origin working paper, document checklist, dan timeline lintas pihak. Dira tidak menjamin tarif preferensi, izin, hasil pemeriksaan, waktu clearance, atau penerimaan barang oleh otoritas Malaysia.</p>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026. Tarif, larangan impor, product-specific rules, dan prosedur dapat berubah. Verifikasi kembali pada Bea Cukai Indonesia, Kemendag, JKDM, MITI, issuing agency, dan importir untuk setiap HS Code serta shipment.</p>
HTML,
    ],
];
