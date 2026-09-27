<?php

return [
    'article_id' => 161,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Panduan Lengkap: Cara Cepat Tentukan HS Code untuk Ekspor Sawit',
        'slug' => 'panduan-cepat-hs-code-ekspor-sawit',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '4829b37a01caefb2bc31ae1565ccc2f8d08321ee84ea500dea08e0e9a120172a',
    ],
    'review_notes' => 'Live low-value remediation on 2026-08-18. Removed fabricated rejection statistics, testimonials, fees, tariff tables, quotes, ratings, and five-minute classification promises; replaced them with a BTKI/KUMHS classification dossier and current 2026 palm-export regulatory checks. Requires human editorial re-review.',
    'changes' => [
        'title' => 'HS Code Produk Sawit: Dossier Klasifikasi dan Gate Ekspor 2026',
        'focus_keyword' => 'HS Code produk sawit',
        'meta_description' => 'Cara menyusun dossier HS Code produk sawit: bedakan CPO, refined oil, fraction, kernel oil, residu, lalu cek BTKI, lartas, bea keluar, dan dokumen.',
        'excerpt' => 'Satu kata “sawit” dapat merujuk banyak produk. Klasifikasi harus mengikuti bahan, proses, komposisi, bentuk, dan catatan BTKI—bukan memilih tarif terendah.',
        'og_title' => 'HS Code Produk Sawit: Dari Spesifikasi ke Gate Ekspor 2026',
        'og_description' => 'Worksheet untuk membedakan minyak sawit, minyak inti, fraksi, produk olahan, dan residu sebelum PEB serta penghitungan kewajiban.',
        'pillar' => 'regulasi-ekspor',
        'tags' => ['HS Code sawit', 'BTKI 2022', 'ekspor sawit', 'bea keluar', 'lartas ekspor'],
        'hashtags' => ['HSCodeSawit', 'BTKI', 'EksporSawit', 'CustomsClassification', 'Dira'],
        'image_alt_texts' => [
            'Tim klasifikasi memeriksa spesifikasi dan proses produk sawit',
            'Worksheet HS Code BTKI lartas dan bea keluar produk kelapa sawit',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah semua produk sawit menggunakan HS Code 1511?',
                'answer' => 'Tidak. Heading 1511 mencakup palm oil dan fraksinya, tetapi palm kernel oil berada pada heading berbeda. Produk yang dimodifikasi secara kimia, residu, fatty acid, biodiesel, atau campuran dapat masuk heading lain tergantung karakter aktual dan ketentuan klasifikasi.',
            ],
            [
                'question' => 'Apakah HS Code dapat ditentukan dari nama invoice?',
                'answer' => 'Tidak aman. Nama invoice adalah salah satu data, tetapi klasifikasi memerlukan bahan baku, bagian tanaman, proses, tingkat pemurnian, fractionation, komposisi, bentuk, penggunaan, dan dokumen teknis. Uraian invoice seharusnya mengikuti karakter barang yang sudah diverifikasi.',
            ],
            [
                'question' => 'Apakah produk refined selalu bebas bea keluar?',
                'answer' => 'Jangan membuat aturan blanket. Jenis barang yang dikenakan bea keluar dan tarifnya mengikuti peraturan serta harga referensi yang berlaku. Periksa pos tarif aktual, PMK terkait, dan keputusan harga ekspor untuk periode pendaftaran PEB.',
            ],
            [
                'question' => 'Apakah PPJK yang menentukan HS Code eksportir?',
                'answer' => 'PPJK dapat membantu menyiapkan pemberitahuan berdasarkan kuasa dan data yang diterima, tetapi eksportir harus memastikan data produk dan klasifikasi memiliki dasar. Untuk kasus material atau ambigu, siapkan dossier dan gunakan kanal klarifikasi resmi sesuai tingkat risiko.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>HS Code produk sawit tidak dapat ditentukan dalam lima menit hanya dari nama “CPO”, “RBD”, “olein”, atau “produk turunan”. Satu rantai pengolahan dapat menghasilkan minyak mentah, minyak dimurnikan, fraksi, minyak inti, fatty acid, residu, biodiesel, dan campuran. Perbedaan bahan serta proses dapat mengubah heading, pos tarif, lartas, satuan, bea keluar, pungutan, dan dokumen.</p>

<p>Direktorat Jenderal Bea dan Cukai menjelaskan bahwa <a href="https://www.beacukai.go.id/btki-dan-tarif" rel="noopener noreferrer" target="_blank">BTKI 2022</a> adalah referensi resmi klasifikasi Indonesia. HS berlaku seragam sampai enam digit, sedangkan AHTN memberikan struktur ASEAN sampai delapan digit. Klasifikasi juga mengikuti Ketentuan Umum untuk Menginterpretasi HS, Catatan Bagian, Catatan Bab, dan Catatan Subpos—bukan sekadar hasil pencarian kata.</p>

<h2>Gate 1: kunci identitas produk</h2>

<p>Sebelum mencari kode, buat product dossier satu versi. Jangan menerima deskripsi supplier tanpa bukti proses. Data minimum:</p>

<ul>
<li>Bahan baku: daging buah atau kernel, serta bahan lain dalam campuran.</li>
<li>Tahap proses: extraction, clarification, refining, bleaching, deodorizing, fractionation, hydrogenation, esterification, atau proses lain.</li>
<li>Status: crude, refined, fractionated, chemically modified, residue, waste, atau finished preparation.</li>
<li>Komposisi dan kadar bahan, termasuk additive bila ada.</li>
<li>Parameter teknis: FFA, moisture, iodine value, melting point, dan parameter relevan lainnya.</li>
<li>Bentuk serta kemasan: bulk liquid, solid fraction, drum, flexibag, retail, atau blend.</li>
<li>Fungsi dan intended use: pangan, oleochemical, fuel, feed, cosmetic, atau industri.</li>
<li>Certificate of analysis, process flow, safety data sheet, photo, dan label.</li>
</ul>

<p>Product name dan trade name dapat berbeda antar perusahaan. Dossier harus menjelaskan barang secara objektif agar laboratory, production, sales, finance, PPJK, surveyor, dan buyer menggunakan fakta yang sama.</p>

<h2>Gate 2: tentukan keluarga heading kandidat</h2>

<table>
<thead><tr><th>Karakter produk</th><th>Keluarga kandidat</th><th>Pertanyaan pembeda</th></tr></thead>
<tbody>
<tr><td>Palm oil dari daging buah dan fraksinya</td><td>Heading 1511</td><td>Crude atau other; refined atau fractionated; apakah dimodifikasi kimia?</td></tr>
<tr><td>Palm kernel oil dan fraksinya</td><td>Heading 1513</td><td>Bagian tanaman, crude atau other, dan proses lanjutan.</td></tr>
<tr><td>Minyak dihidrogenasi atau dimodifikasi kimia</td><td>Periksa heading 1516 dan catatannya</td><td>Jenis modifikasi serta apakah dicampur atau dipreparasi lebih lanjut.</td></tr>
<tr><td>Campuran atau edible preparation</td><td>Periksa heading 1517 dan alternatif relevan</td><td>Komposisi, fungsi, dan apakah sekadar minyak tunggal.</td></tr>
<tr><td>Fatty acid atau industrial derivative</td><td>Dapat berada di bab lain</td><td>Reaksi kimia, purity, composition, dan fungsi.</td></tr>
<tr><td>Residue atau waste</td><td>Tergantung karakter residu</td><td>Asal proses, kandungan, kondisi, dan penggunaan.</td></tr>
</tbody>
</table>

<p>Tabel ini bukan penetapan HS. Gunakan untuk menyusun kandidat, lalu baca uraian heading, catatan, subheading, dan pos AHTN. Hindari mengambil kode delapan digit dari artikel lama karena perubahan nomenklatur atau detail produk dapat membuat kode tidak cocok.</p>

<h2>Gate 3: terapkan KUMHS secara terdokumentasi</h2>

<ol>
<li>Mulai dari wording heading dan Catatan Bagian atau Bab yang relevan.</li>
<li>Periksa apakah barang belum lengkap, campuran, atau terdiri dari beberapa bahan sehingga aturan interpretasi lain diperlukan.</li>
<li>Bandingkan heading kandidat dan catat alasan menerima atau menolak masing-masing.</li>
<li>Setelah heading ditentukan, gunakan wording serta catatan subpos pada level yang setara.</li>
<li>Turunkan ke pos AHTN Indonesia menggunakan deskripsi produk aktual.</li>
<li>Simpan reviewer, tanggal, sumber, versi BTKI, dan tingkat keyakinan.</li>
</ol>

<p>Jangan memilih kode karena tarif atau izinnya terlihat lebih ringan. Tarif adalah konsekuensi dari klasifikasi, bukan kriteria untuk mengubah identitas barang.</p>

<h2>Classification worksheet</h2>

<table>
<thead><tr><th>Kolom</th><th>Isi yang harus dicatat</th></tr></thead>
<tbody>
<tr><td>Barang</td><td>Nama teknis, trade name, producer, batch, dan intended use.</td></tr>
<tr><td>Bahan</td><td>Source oil, bagian tanaman, composition, dan additive.</td></tr>
<tr><td>Proses</td><td>Diagram dari bahan baku sampai produk ekspor.</td></tr>
<tr><td>Data teknis</td><td>COA, test method, parameter, dan specification limit.</td></tr>
<tr><td>Heading kandidat</td><td>Wording, notes, alasan mendukung, dan alasan menolak.</td></tr>
<tr><td>HS final</td><td>Enam digit HS, delapan digit AHTN, reviewer, dan approval.</td></tr>
<tr><td>Dampak</td><td>Lartas, bea keluar, pungutan, origin, izin, dan satuan PEB.</td></tr>
<tr><td>Change trigger</td><td>Perubahan bahan, proses, komposisi, atau nomenklatur.</td></tr>
</tbody>
</table>

<h2>Gate 4: cek lartas sawit yang berlaku</h2>

<p>Klasifikasi selesai belum berarti barang siap diekspor. Pada 2026, kebijakan ekspor komoditas kelapa sawit berubah melalui <a href="https://peraturan.beacukai.go.id/index.html?page=detail%2Ftahun%2F2026%2F1556%2Fperaturan-menteri-perdagangan%2Fmdag-16-2026%2Fperaturan-menteri-perdagangan-republik-indonesia-nomor-16-tahun-2026-tentang-kebijakan-dan-pengaturan-ekspor-komoditas-sumber-daya-alam-strategis-kelapa-sawit.html" rel="noopener noreferrer" target="_blank">Permendag 16 Tahun 2026</a>, berlaku sejak 1 Juni 2026. Daftar barang yang dibatasi berdasarkan peraturan tersebut dituangkan dalam <a href="https://jdih.kemenkeu.go.id/dok/33mkbc2026" rel="noopener noreferrer" target="_blank">KMK 33/MK/BC/2026</a>.</p>

<p>Gunakan <a href="https://insw.go.id/intr" rel="noopener noreferrer" target="_blank">INTR INSW</a> untuk memeriksa pos tarif, uraian, instansi, jenis izin, dan dasar aturan pada tanggal shipment. Baca lampiran peraturan karena sebagian ketentuan menggunakan kode “ex”, sehingga hanya barang dengan deskripsi tertentu dalam pos tersebut yang tercakup.</p>

<h2>Gate 5: pisahkan bea keluar, pungutan, dan biaya</h2>

<p>Artikel lama menuliskan satu tabel persentase tetap. Itu tidak aman. Bea keluar produk sawit mengikuti jenis barang, pos tarif, kelompok harga, harga referensi, dan periode yang berlaku. Kerangka barang serta tarif saat ini merujuk antara lain pada PMK 68 Tahun 2025, sedangkan keputusan harga ekspor ditetapkan untuk periode tertentu.</p>

<p>Selain bea keluar, transaksi dapat memiliki pungutan dana perkebunan, biaya surveyor, testing, handling, freight, storage, dan kewajiban lain. Jangan mencampur semuanya menjadi “tarif HS”. Buat calculation sheet dengan sumber serta tanggal:</p>

<table>
<thead><tr><th>Komponen</th><th>Input</th><th>Sumber verifikasi</th></tr></thead>
<tbody>
<tr><td>Harga patokan atau referensi</td><td>Periode pendaftaran PEB</td><td>Keputusan resmi periode tersebut.</td></tr>
<tr><td>Harga ekspor</td><td>Jenis barang dan satuan</td><td>KMK harga ekspor yang berlaku.</td></tr>
<tr><td>Tarif bea keluar</td><td>HS dan kelompok harga</td><td>PMK barang ekspor dan tarif.</td></tr>
<tr><td>Pungutan lain</td><td>Produk dan rentang harga</td><td>Peraturan lembaga pemungut.</td></tr>
<tr><td>Nilai transaksi</td><td>Quantity, unit, currency, dan contract</td><td>Invoice serta dokumen komersial.</td></tr>
</tbody>
</table>

<p>Hasil simulasi harus memiliki reviewer dan expiry date. Ketika harga referensi atau jadwal berubah, kalkulasi harus dibuat ulang sebelum final quotation atau pendaftaran PEB.</p>

<h2>Gate 6: rekonsiliasi dokumen shipment</h2>

<p>Cocokkan HS, description, quantity, unit, weight, grade, batch, origin, producer, seller, buyer, price, dan process identity pada sales contract, invoice, packing list, certificate of analysis, survey report, izin, origin document, shipping instruction, bill of lading, serta draft PEB. Data harus menggambarkan barang yang sama.</p>

<p>Jika invoice menyebut refined oil tetapi process flow dan COA menunjukkan karakter berbeda, jangan hanya mengubah uraian. Kembalikan ke product owner dan classification reviewer. Perubahan formula, source oil, refining, fractionation, atau intended use dapat memicu review ulang.</p>

<h2>Bedakan kode Indonesia dan negara tujuan</h2>

<p>Enam digit HS dirancang sebagai basis internasional, tetapi digit nasional setelahnya, deskripsi lokal, tariff treatment, dan product measures dapat berbeda. Kode delapan digit Indonesia tidak boleh disalin otomatis ke deklarasi impor negara tujuan. Importir harus memetakan kode lokalnya dari karakter produk yang sama.</p>

<p>Buat cross-border classification record berisi HS enam digit, pos Indonesia untuk PEB, pos negara tujuan untuk import declaration, uraian masing-masing, serta perbedaan yang ditemukan. Bila perbedaan terjadi pada level enam digit, eskalasi karena kemungkinan product understanding atau penerapan rules berbeda. Jangan menyesuaikan invoice menjadi dua deskripsi yang bertentangan; gunakan uraian teknis konsisten dan jelaskan detail lokal pada working paper.</p>

<h3>Data yang dikirim kepada importir</h3>

<ul>
<li>Product dossier dan process flow versi final.</li>
<li>Certificate of analysis untuk batch atau specification yang disepakati.</li>
<li>HS analysis Indonesia beserta asumsi dan dokumen pendukung.</li>
<li>Draft description, quantity, unit, origin, dan intended use.</li>
<li>Daftar perubahan dibanding sample atau shipment sebelumnya.</li>
</ul>

<p>Importir kemudian mengonfirmasi local tariff code, izin, tariff, tax, dan customs description. Konfirmasi buyer komersial tanpa keterlibatan compliance atau customs agent belum cukup untuk shipment berisiko tinggi.</p>

<h2>Pasang classification change-monitor</h2>

<p>HS master bukan file yang dibuat sekali lalu dilupakan. Tetapkan owner dan review berkala. Trigger review mencakup perubahan BTKI atau AHTN, amendemen lartas, peraturan bea keluar, perubahan formula, supplier, process, plant, specification, packaging, intended use, atau keputusan klasifikasi baru.</p>

<table>
<thead><tr><th>Trigger</th><th>Owner</th><th>Output</th></tr></thead>
<tbody>
<tr><td>Perubahan regulasi</td><td>Compliance</td><td>Impact assessment untuk seluruh SKU terdampak.</td></tr>
<tr><td>Perubahan produk</td><td>Technical atau production</td><td>Product dossier baru dan classification review.</td></tr>
<tr><td>Perbedaan negara tujuan</td><td>Importer dan trade compliance</td><td>Cross-border mapping yang disetujui.</td></tr>
<tr><td>Query atau temuan otoritas</td><td>Legal, customs, dan business owner</td><td>Response, corrective action, serta update master.</td></tr>
<tr><td>Shipment baru setelah jeda</td><td>Export operations</td><td>Konfirmasi aturan, harga, izin, dan dokumen terkini.</td></tr>
</tbody>
</table>

<h2>Kesalahan yang harus dihentikan</h2>

<ul>
<li>Menggunakan satu kode untuk semua produk sawit.</li>
<li>Menyalin kode supplier, buyer, atau artikel internet tanpa membandingkan nomenklatur negara.</li>
<li>Menganggap refined otomatis bebas bea keluar dan izin.</li>
<li>Menggunakan HS untuk menyesuaikan tarif target.</li>
<li>Membuat klaim “lolos sistem” tanpa product dossier.</li>
<li>Mengandalkan PPJK sebagai satu-satunya pemilik data teknis produk.</li>
<li>Menggunakan screenshot tarif lama untuk quotation baru.</li>
<li>Mengabaikan kode “ex” dan uraian barang dalam lampiran lartas.</li>
</ul>

<h2>Gate keputusan sebelum PEB</h2>

<ol>
<li>Product dossier lengkap dan disetujui production atau technical owner.</li>
<li>Heading kandidat serta KUMHS analysis terdokumentasi.</li>
<li>HS final memiliki reviewer dan tanggal.</li>
<li>INTR serta aturan sawit diperiksa untuk tanggal shipment.</li>
<li>Izin, laporan, dan certificate cocok dengan legal entity serta barang.</li>
<li>Bea keluar dan pungutan dihitung dari sumber periode terbaru.</li>
<li>Seluruh dokumen shipment direkonsiliasi terhadap master data.</li>
<li>Perubahan setelah approval masuk change-control.</li>
</ol>

<p>Dira dapat membantu mengumpulkan product dossier, menyusun classification worksheet, memetakan lartas, dan merekonsiliasi dokumen. Dira tidak menjamin penetapan HS, tarif, izin, hasil pemeriksaan, atau pelepasan barang.</p>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026. BTKI, daftar lartas, harga referensi, harga ekspor, tarif, dan pungutan dapat berubah. Gunakan dokumen produk serta sumber resmi yang berlaku pada tanggal pendaftaran PEB.</p>
HTML,
    ],
];
