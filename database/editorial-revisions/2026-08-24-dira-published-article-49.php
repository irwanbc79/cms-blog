<?php

return [
    'article_id' => 49,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Cara Menghitung Harga Pokok Ekspor Kopi agar Tidak Rugi',
        'slug' => 'cara-menghitung-harga-pokok-ekspor-kopi',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => 'a293b2a61f14e3de3fbf288d02df3cfbebd56e39ebdd39cfb47f3b38eca8b46a',
    ],
    'review_notes' => 'Live low-value remediation on 2026-08-24. Replaced promotional and unsupported cost claims with a source-backed HPP worksheet, saleable-quantity denominator, Incoterms cost gate, currency policy, document reconciliation, and variance review. Requires human editorial re-review.',
    'changes' => [
        'title' => 'HPP Ekspor Kopi: Kalkulator Biaya, Kurs, dan Margin Minimum',
        'focus_keyword' => 'HPP ekspor kopi',
        'meta_description' => 'Cara menghitung HPP ekspor kopi dengan quantity saleable, biaya origin, kurs, Incoterms, margin minimum, buffer risiko, dan variance review shipment.',
        'excerpt' => 'HPP ekspor kopi harus memakai quantity yang benar-benar dapat dijual, seluruh biaya origin, kurs defensif, Incoterms, dan buffer exception sebelum quotation.',
        'og_title' => 'HPP Ekspor Kopi: Kalkulator Biaya, Kurs, dan Margin Minimum',
        'og_description' => 'Worksheet operasional HPP kopi ekspor: product cost, yield, origin charges, kurs, FOB/CIF gate, margin floor, dan post-shipment variance.',
        'pillar' => 'strategi-ekspor',
        'tags' => ['HPP ekspor', 'ekspor kopi', 'quotation', 'Incoterms 2020', 'risiko kurs'],
        'hashtags' => ['HPPEkspor', 'EksporKopi', 'Incoterms2020', 'Kurs', 'ExportCosting'],
        'image_alt_texts' => [
            'Tim ekspor menghitung HPP kopi berdasarkan biaya dan quantity saleable',
            'Worksheet quotation kopi ekspor dengan kurs Incoterms dan margin minimum',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah HPP ekspor sama dengan harga beli kopi?',
                'answer' => 'Tidak. HPP ekspor perlu memasukkan product cost, penyusutan atau yield, proses, kemasan, pengujian, biaya origin, dokumen, pembiayaan, overhead teralokasi, dan komponen lain sesuai shipment.',
            ],
            [
                'question' => 'Apakah JISDOR dapat langsung dipakai sebagai kurs quotation buyer?',
                'answer' => 'JISDOR berguna sebagai kurs referensi USD/IDR. Kurs kontrak dan settlement tetap perlu mengikuti kebijakan perusahaan, quotation bank atau penyedia pembayaran, waktu pembayaran, spread, biaya transfer, dan mata uang transaksi.',
            ],
            [
                'question' => 'Apakah harga CIF cukup dihitung dengan menambahkan ocean freight ke harga FOB?',
                'answer' => 'Belum tentu. CIF juga memerlukan cargo insurance sesuai rule serta pemeriksaan surcharge, validity, inclusion, exclusion, destination charge, dan pembagian biaya serta risiko dalam kontrak.',
            ],
            [
                'question' => 'Apakah margin pada spreadsheet menjamin shipment memperoleh laba?',
                'answer' => 'Tidak. Spreadsheet adalah alat keputusan. Hasil aktual dipengaruhi quantity saleable, biaya, kurs, klaim mutu, keterlambatan, perubahan freight, pembayaran, dan exception lain yang harus direkonsiliasi setelah shipment.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>HPP ekspor kopi bukan harga beli biji kopi ditambah ongkos kirim. Angka yang dipakai untuk quotation harus menjawab tiga hal: berapa biaya yang benar-benar melekat pada shipment, berapa kilogram yang benar-benar dapat dijual, dan biaya mana yang menjadi tanggung jawab seller berdasarkan kontrak. Tanpa tiga jawaban itu, margin pada spreadsheet dapat terlihat positif padahal cash-out dan risiko belum seluruhnya masuk.</p>

<p>Artikel ini diperbarui pada 24 Agustus 2026 dengan merujuk pada <a href="https://www.jdih.kemenkeu.go.id/dok/155-pmk-04-2022/summary" target="_blank" rel="noopener noreferrer">PMK 155/PMK.04/2022 tentang ketentuan kepabeanan di bidang ekspor</a>, <a href="https://www.beacukai.go.id/faq-tatalaksana-ekspor" target="_blank" rel="noopener noreferrer">FAQ Tata Laksana Ekspor DJBC</a>, <a href="https://www.bi.go.id/id/statistik/informasi-kurs/jisdor/default.aspx" target="_blank" rel="noopener noreferrer">JISDOR Bank Indonesia</a>, dan <a href="https://iccwbo.org/business-solutions/incoterms-rules/incoterms-2020/" target="_blank" rel="noopener noreferrer">Incoterms 2020 dari ICC</a>. Sumber tersebut menjadi kontrol untuk dokumen ekspor, referensi kurs, serta pembagian biaya dan risiko; harga kopi dan quotation vendor tetap harus menggunakan bukti transaksi aktual.</p>

<h2>Bedakan HPP, cash-out, dan harga quotation</h2>

<table>
<thead><tr><th>Angka</th><th>Fungsi</th><th>Jangan dicampur dengan</th></tr></thead>
<tbody>
<tr><td>HPP shipment</td><td>Biaya produk dan pekerjaan yang dialokasikan ke quantity saleable.</td><td>Seluruh arus kas perusahaan.</td></tr>
<tr><td>Cash-out</td><td>Dana yang harus tersedia sesuai jadwal pembayaran supplier, vendor, carrier, dan instansi.</td><td>Biaya akuntansi yang belum dibayar atau deposit yang dapat kembali.</td></tr>
<tr><td>Price floor</td><td>Harga minimum internal berdasarkan HPP, target margin, dan kebijakan risiko.</td><td>Harga pasar atau janji keuntungan.</td></tr>
<tr><td>Buyer quotation</td><td>Penawaran komersial dengan quantity, quality, currency, Incoterm, place/port, validity, dan payment term.</td><td>HPP internal yang bersifat rahasia.</td></tr>
</tbody>
</table>

<p>Satu shipment dapat memiliki HPP sehat tetapi cash-out bermasalah karena buyer membayar jauh setelah seller melunasi kopi, kemasan, inland transport, dan freight. Sebaliknya, kas masuk awal tidak otomatis berarti margin sehat bila quantity ditolak atau biaya exception belum direkonsiliasi.</p>

<h2>Gate 1: kunci produk dan quantity saleable</h2>

<p>Mulai dari lot dan spesifikasi buyer: jenis kopi, origin, process, grade, screen size, moisture, defect tolerance, crop year, kemasan, net weight, dan toleransi quantity. Catat berat masuk, susut pengeringan, hasil sortasi, sampel, reject, serta berat bersih yang dapat ditagihkan.</p>

<p>Gunakan denominator <strong>quantity saleable</strong>, bukan quantity pembelian. Rumus dasarnya:</p>

<p><strong>HPP per kg saleable = total biaya shipment ÷ quantity saleable</strong></p>

<p>Jika 1.000 kg dibeli tetapi setelah sortasi, sampling, dan susut hanya 980 kg memenuhi spesifikasi, seluruh biaya yang relevan dibagi 980 kg. Membagi dengan 1.000 kg membuat HPP per kg terlalu rendah.</p>

<h2>Gate 2: bangun cost ledger berlapis</h2>

<table>
<thead><tr><th>Lapisan biaya</th><th>Contoh komponen</th><th>Bukti minimum</th></tr></thead>
<tbody>
<tr><td>Produk</td><td>Pembelian kopi, premium mutu, sortasi, drying, grading, dan loss normal.</td><td>PO, invoice supplier, weighbridge, yield report.</td></tr>
<tr><td>Packaging</td><td>GrainPro atau inner liner, jute bag, label, pallet bila dipakai, fumigasi atau treatment bila disyaratkan.</td><td>BOM kemasan, invoice, packing specification.</td></tr>
<tr><td>Quality</td><td>Sampling, cupping, COA, laboratorium, inspeksi, sertifikasi yang memang dipersyaratkan.</td><td>Quotation dan report yang terkait ke lot.</td></tr>
<tr><td>Origin logistics</td><td>Pickup, trucking, warehouse, stuffing, lift-on/lift-off, terminal, weighing, VGM, dan handling.</td><td>Vendor quotation dengan inclusion dan exclusion.</td></tr>
<tr><td>Export process</td><td>Dokumen, PPJK berdasarkan kuasa, certificate of origin bila digunakan, bank charge, courier, dan administrasi shipment.</td><td>Tarif vendor dan dokumen aktual.</td></tr>
<tr><td>Commercial</td><td>Sales commission, marketplace atau agent fee, sample, financing, hedging, dan payment charge.</td><td>Kontrak, rate sheet, tenor, dan approval.</td></tr>
<tr><td>Overhead teralokasi</td><td>Tenaga kerja, fasilitas, utilitas, sistem, dan quality control yang memang terkait produksi atau shipment.</td><td>Basis alokasi yang konsisten.</td></tr>
<tr><td>Exception buffer</td><td>Perubahan freight, keterlambatan dokumen, rework, storage, claim reserve, dan deviasi kurs.</td><td>Scenario register; bukan angka asal.</td></tr>
</tbody>
</table>

<p>Setiap baris cost ledger wajib memiliki owner, currency, quantity basis, quotation date, validity, status estimasi atau aktual, tax treatment, payment date, dan evidence link. Biaya tanpa sumber diberi status <em>hold</em>, bukan diisi dengan angka “pasaran” tanpa tanggal.</p>

<h2>Gate 3: pisahkan biaya menurut Incoterm</h2>

<p>Incoterms membantu membagi kewajiban, biaya, dan risiko tertentu antara seller dan buyer. Rule tidak menentukan harga produk, metode pembayaran, peralihan kepemilikan, atau hasil klaim. Tulis rule bersama named place atau named port dan versi, lalu buat peta biaya serta risiko.</p>

<ul>
<li><strong>FCA:</strong> cocok dievaluasi ketika barang diserahkan kepada carrier di titik yang disepakati, termasuk pola container tertentu.</li>
<li><strong>FOB:</strong> untuk sea atau inland waterway ketika delivery terjadi on board vessel di named port of shipment.</li>
<li><strong>CFR:</strong> seller mengatur main carriage ke named destination port, tetapi cost point tidak boleh disamakan dengan risk point.</li>
<li><strong>CIF:</strong> selain freight, seller mengatur cargo insurance sesuai rule; scope dan kecukupan cover harus diperiksa.</li>
</ul>

<p>Jangan menambahkan ocean freight ke harga ex-warehouse lalu menyebut hasilnya CIF. Origin charges, delivery point, insurance, surcharge, documentation, serta inclusion dan exclusion carrier harus diselesaikan lebih dahulu.</p>

<h2>Simulasi HPP satu lot kopi</h2>

<p>Berikut simulasi edukasi, bukan quotation pasar. Angka harus diganti dengan invoice dan quotation aktual.</p>

<table>
<thead><tr><th>Komponen</th><th>Nilai simulasi</th></tr></thead>
<tbody>
<tr><td>Pembelian 1.000 kg kopi</td><td>Rp85.000.000</td></tr>
<tr><td>Sortasi, grading, dan handling</td><td>Rp6.000.000</td></tr>
<tr><td>Kemasan dan label</td><td>Rp3.000.000</td></tr>
<tr><td>Quality control dan sampling</td><td>Rp2.000.000</td></tr>
<tr><td>Inland logistics dan origin handling</td><td>Rp4.000.000</td></tr>
<tr><td>Dokumen dan administrasi ekspor</td><td>Rp3.000.000</td></tr>
<tr><td>Overhead teralokasi dan pembiayaan</td><td>Rp6.000.000</td></tr>
<tr><td><strong>Total biaya sebelum main carriage</strong></td><td><strong>Rp109.000.000</strong></td></tr>
</tbody>
</table>

<p>Dengan quantity saleable 980 kg, HPP simulasi sebelum main carriage adalah sekitar Rp111.225 per kg. Bila kebijakan perusahaan menetapkan gross margin minimum 15% dari harga jual, rumus price floor adalah:</p>

<p><strong>Price floor = HPP ÷ (1 − target gross margin)</strong></p>

<p>Hasil simulasi sekitar Rp130.853 per kg sebelum penyesuaian komponen sesuai Incoterm, currency, dan risiko. Ini bukan harga yang dijamin diterima buyer. Tim tetap membandingkan spesifikasi, market evidence, payment term, serta alternatif transaksi.</p>

<h2>Gate 4: gunakan kebijakan kurs, bukan satu angka internet</h2>

<p>Bank Indonesia menjelaskan JISDOR sebagai kurs referensi USD/IDR yang merepresentasikan transaksi spot antarbank. Gunakan JISDOR sebagai benchmark dan timestamp, bukan otomatis sebagai kurs settlement. Untuk quotation, catat mata uang biaya, mata uang penjualan, quotation bank atau payment provider, spread, transfer fee, tenor pembayaran, serta siapa menanggung selisih kurs.</p>

<p>Buat tiga skenario: kurs dasar, Rupiah menguat, dan Rupiah melemah. Tetapkan siapa yang boleh mengubah quotation serta batas waktunya. Quotation dengan validity 14 hari tidak boleh memakai freight atau kurs yang hanya berlaku satu hari tanpa mekanisme review.</p>

<h2>Gate 5: rekonsiliasi commercial dan customs data</h2>

<p>PMK 155/PMK.04/2022 mengatur bahwa barang yang diekspor diberitahukan melalui Pemberitahuan Pabean Ekspor dan eksportir bertanggung jawab atas kelengkapan serta kebenaran data. Karena itu, cost sheet harus konsisten dengan kontrak, commercial invoice, packing list, quantity, currency, Incoterm, freight, insurance, dan data yang digunakan untuk pemberitahuan.</p>

<p>Rekonsiliasi sebelum shipment:</p>

<ul>
<li>nama seller, buyer, exporter, consignee, dan pihak penerima pembayaran;</li>
<li>uraian kopi, lot, origin, grade, kemasan, net/gross weight, dan quantity;</li>
<li>harga satuan, total, currency, Incoterm, named place/port, dan payment term;</li>
<li>freight, insurance, commission, discount, serta biaya yang dibayar pihak terkait;</li>
<li>invoice, packing list, transport document, dokumen mutu, origin, dan pemberitahuan ekspor.</li>
</ul>

<p>Perbedaan tidak otomatis berarti salah, tetapi harus memiliki dasar dan penjelasan terdokumentasi. Jangan mengubah invoice hanya agar cocok dengan target margin atau nilai yang diminta pihak lain.</p>

<h2>Checklist keputusan quotation</h2>

<ol>
<li>Spesifikasi buyer dan acceptance criteria sudah final.</li>
<li>Quantity saleable serta yield memiliki bukti.</li>
<li>Seluruh quotation vendor masih berlaku dan jelas inclusion/exclusion-nya.</li>
<li>Incoterm, named place/port, delivery point, risk point, dan cost owner sudah dipetakan.</li>
<li>Kurs dasar, sumber, spread, payment timing, dan sensitivity scenario disetujui.</li>
<li>Price floor dan approval discount terpisah dari harga yang dikirim ke buyer.</li>
<li>Dokumen commercial, logistics, dan customs dapat direkonsiliasi.</li>
<li>Exception buffer memiliki dasar dari skenario, bukan persentase acak.</li>
</ol>

<h2>Kesalahan costing yang harus dihentikan</h2>

<p>Pertama, jangan memakai satu cost sheet untuk semua buyer. Perbedaan grade, kemasan, port, quantity, payment term, Incoterm, dan jadwal dapat mengubah biaya serta risiko. Kedua, jangan memasukkan pajak yang dapat dikreditkan, deposit yang dapat kembali, dan biaya final ke satu kelompok tanpa penjelasan; dampaknya terhadap HPP dan kebutuhan kas berbeda. Ketiga, jangan membagi biaya shipment dengan quantity kontrak bila hasil sortasi aktual lebih rendah.</p>

<p>Keempat, jangan memakai freight quotation kedaluwarsa atau tanpa rincian surcharge. Kelima, jangan menutup selisih dengan “biaya lain-lain” yang tidak memiliki owner dan bukti. Keenam, jangan menganggap discount buyer hanya mengurangi laba; discount dapat membuat price floor terlewati sehingga transaksi perlu approval baru, perubahan scope, atau renegosiasi. Ketujuh, jangan menghapus biaya exception dari histori setelah masalah selesai. Data tersebut diperlukan untuk memperbaiki buffer dan vendor selection pada shipment berikutnya.</p>

<h2>Variance review setelah shipment</h2>

<p>Setelah biaya final diterima, bandingkan budget dengan actual per komponen dan per kilogram saleable. Pisahkan variance harga kopi, yield, packaging, trucking, origin charge, freight, insurance, kurs, pembiayaan, dokumen, storage, claim, dan biaya lain. Catat penyebab, owner, tindakan koreksi, serta perubahan master cost untuk quotation berikutnya.</p>

<p>Dira dapat membantu menyusun product dossier, cost ledger, document reconciliation, dan shipment readiness. Keputusan harga tetap berada pada perusahaan, sedangkan penelitian dokumen, pemeriksaan, dan keputusan kepabeanan berada pada instansi berwenang sesuai transaksi aktual.</p>

<p><strong>Catatan editorial:</strong> contoh angka di atas hanya simulasi perhitungan. Verifikasi ulang biaya, kurs, regulasi, spesifikasi, Incoterm, dan dokumen pada tanggal transaksi. Artikel ini tidak menjamin margin, kelancaran ekspor, atau penerimaan dokumen.</p>
HTML,
    ],
];
