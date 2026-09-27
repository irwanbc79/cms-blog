<?php

return [
    'article_id' => 193,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Bill of Lading: Panduan Lengkap Jenis dan Fungsi',
        'slug' => 'bill-of-lading-jenis-fungsi-panduan-lengkap',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '22a1f0e7557af88c414489624590c501bb108bc8d38ccc770bdffb49e100db1a',
    ],
    'review_notes' => 'GMA bill-of-lading pillar rebuilt on 2026-08-29 using PMK 155/PMK.04/2022, DCSA Bill of Lading 3.0, ICC UCP 600 Articles 20-21, UNCITRAL MLETR, and FIATA transport-document references. Removes absolute title/ownership claims, the false framing of telex release as a standalone B/L type, the false requirement that HBL and MBL be identical, unrelated 2026 news, repetitive CTA blocks, promises of smooth clearance, and universal strategy recommendations. Adds document-versus-release distinctions, governing-law caveat, HBL/MBL reconciliation, SI-to-surrender lifecycle, documentary-credit checks, amendment control, worked shipment scenario, exception gates, RACI, and official references.',
    'changes' => [
        'title' => 'Bill of Lading: Jenis, Release, Draft Check, dan Risiko',
        'focus_keyword' => 'bill of lading',
        'meta_description' => 'Panduan Bill of Lading untuk ekspor: bedakan original B/L, sea waybill, HBL, MBL, surrender dan telex release, lalu periksa draft sebelum terbit.',
        'excerpt' => 'Decision guide untuk memilih transport document, mengendalikan draft B/L, merekonsiliasi HBL–MBL, dan mencegah release tanpa otorisasi.',
        'og_title' => 'Bill of Lading: Jenis, Release, Draft Check, dan Risiko',
        'og_description' => 'Kenali perbedaan B/L, sea waybill, HBL, MBL, surrender, dan telex release serta gate pemeriksaan sebelum issuance.',
        'pillar' => 'maritim',
        'tags' => ['bill of lading', 'sea waybill', 'house bill of lading', 'master bill of lading', 'telex release'],
        'hashtags' => ['BillOfLading', 'SeaWaybill', 'FreightForwarding', 'ShippingDocuments'],
        'image_alt_texts' => [
            'Tim ekspor memeriksa draft bill of lading terhadap shipping instruction dan invoice',
            'Kontrol original bill of lading dan instruksi release sebelum penyerahan kargo',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah setiap Bill of Lading merupakan dokumen yang dapat dinegosiasikan?',
                'answer' => 'Tidak. Kemampuan untuk dialihkan bergantung pada bentuk consignment, wording dokumen, hukum yang berlaku, endorsement, dan syarat penerbit. Straight bill dapat memiliki perlakuan berbeda dari order bill. Sea waybill adalah dokumen non-negotiable.',
            ],
            [
                'question' => 'Apakah telex release merupakan jenis Bill of Lading?',
                'answer' => 'Telex release lebih tepat dipahami sebagai instruksi atau konfirmasi carrier kepada kantor tujuan untuk melakukan release setelah persyaratan surrender dipenuhi. Ia bukan kategori yang setara dengan original Bill of Lading atau sea waybill.',
            ],
            [
                'question' => 'Apakah data House B/L dan Master B/L harus identik?',
                'answer' => 'Tidak seluruh field. Para pihak dapat berbeda karena HBL merekam hubungan forwarder dengan customer, sedangkan MBL merekam hubungan carrier dengan pihak yang melakukan booking. Namun data kargo, rute, container, seal, jumlah, berat, dan tanggal harus dapat direkonsiliasi tanpa konflik.',
            ],
            [
                'question' => 'Apa yang harus diperiksa bila transaksi memakai Letter of Credit?',
                'answer' => 'Periksa teks kredit dan UCP yang dirujuk sebelum mengirim shipping instruction. Carrier, tanda tangan, on-board notation, vessel, port, tanggal shipment, consignee atau order party, originals, freight indication, endorsement, dan presentation period harus sesuai persyaratan yang berlaku.',
            ],
        ],
        'content_html' => <<<'HTML'
<p><strong>Bill of Lading</strong> bukan satu formulir yang dapat dipilih hanya berdasarkan kebiasaan. Pilihan antara original B/L, sea waybill, House B/L (HBL), atau dokumen multimoda memengaruhi kontrol penyerahan, alur bank, kewajiban surrender, dan hubungan hukum para pihak.</p>

<p>Kesalahan yang paling berbahaya bukan typo semata, melainkan salah memilih mekanisme. Contohnya: memakai sea waybill ketika penjual masih membutuhkan kontrol dokumen, meminta surrender sebelum pembayaran terkonfirmasi, atau menganggap telex release sebagai dokumen baru yang menggantikan seluruh proses original B/L.</p>

<p>Panduan ini diperbarui pada 29 Agustus 2026. Syarat carrier, platform elektronik, Letter of Credit (L/C), negara tujuan, dan hukum yang mengatur kontrak harus diperiksa untuk shipment aktual.</p>

<h2>Definisi kerja dan batas hukumnya</h2>

<p><a href="https://dcsa.org/standards/bill-of-lading/documentation-bill-of-lading-3/bill-of-lading-3-introduction" target="_blank" rel="noopener noreferrer">DCSA Bill of Lading 3.0</a> menjelaskan B/L sebagai dokumen kontraktual yang diterbitkan kepada shipper, mengonfirmasi penerimaan atau pemuatan kargo, serta menjadi bukti kontrak pengangkutan. DCSA membedakannya dari sea waybill yang non-negotiable, diterbitkan kepada named consignee, dan tidak mensyaratkan penyerahan original sea waybill untuk mengambil barang.</p>

<p>Ungkapan “document of title” tidak boleh diterjemahkan sebagai kepemilikan absolut dalam setiap kasus. Hak yang mengikuti dokumen dipengaruhi oleh wording, consignment, endorsement, terms and conditions, hukum yang berlaku, serta fakta transaksi. <a href="https://uncitral.un.org/en/texts/ecommerce/modellaw/electronic_transferable_records" target="_blank" rel="noopener noreferrer">UNCITRAL MLETR</a> juga menegaskan bahwa substantive law menentukan dokumen mana yang transferable; straight bill dapat memiliki pembatasan berbeda.</p>

<h2>Pisahkan jenis dokumen dari metode release</h2>

<table>
<thead><tr><th>Istilah</th><th>Apa sebenarnya</th><th>Kontrol utama</th></tr></thead>
<tbody>
<tr><td>Original B/L</td><td>B/L yang diterbitkan sebagai original dalam jumlah yang dinyatakan</td><td>Custody, endorsement, full set, surrender, duplicate risk</td></tr>
<tr><td>Sea waybill</td><td>Transport document non-negotiable kepada named consignee</td><td>Verifikasi identity consignee dan release instruction</td></tr>
<tr><td>House B/L</td><td>Dokumen yang diterbitkan forwarder/NVOCC kepada customer</td><td>Terms penerbit, liability, serta rekonsiliasi ke MBL</td></tr>
<tr><td>Master B/L</td><td>Dokumen carrier untuk pihak yang melakukan booking dengan carrier</td><td>Carrier data, voyage, route, container, dan agent destination</td></tr>
<tr><td>Surrender</td><td>Proses menyerahkan atau meniadakan kontrol original sesuai prosedur carrier</td><td>Otorisasi, original status, pembayaran, fraud control</td></tr>
<tr><td>Telex release</td><td>Pesan atau konfirmasi release dari origin kepada destination</td><td>Authenticity, shipment reference, consignee, hold status</td></tr>
</tbody>
</table>

<p>Karena itu, “telex release B/L” tidak seharusnya diperlakukan sebagai jenis dokumen yang setara dengan original B/L dan sea waybill. Dalam praktik carrier, istilah ini merujuk pada mekanisme release setelah surrender dan persyaratan lain dipenuhi. Prosedur, biaya, cut-off, serta wording berbeda antar-carrier.</p>

<h2>Gate 1: tentukan kebutuhan kontrol transaksi</h2>

<p>Sebelum booking, jawab lima pertanyaan:</p>

<ol>
<li>Apakah penjual harus mempertahankan kontrol penyerahan sampai pembayaran atau kondisi tertentu terpenuhi?</li>
<li>Apakah transaksi memakai L/C, collection, open account, intercompany, atau mekanisme lain?</li>
<li>Apakah dokumen harus dapat dialihkan kepada bank atau pihak berikutnya?</li>
<li>Apakah waktu transit lebih singkat daripada waktu pengiriman original?</li>
<li>Apakah carrier, bank, buyer, hukum tujuan, dan platform menerima electronic B/L atau release method yang dipilih?</li>
</ol>

<p>Jangan memilih sea waybill hanya karena lebih cepat. Jangan pula memakai original B/L hanya karena dianggap selalu lebih aman. Original menambah custody, courier, kehilangan, duplicate-presentation, dan surrender risk. Pilih berdasarkan kontrol yang benar-benar diperlukan.</p>

<h2>Gate 2: bangun shipping instruction dari sumber data yang disetujui</h2>

<p>DCSA menempatkan Shipping Instructions (SI) sebagai sumber utama penyusunan transport document. Buat satu SI master yang dikendalikan versinya dan memuat:</p>

<ul>
<li>shipper, consignee, order party, notify party, serta alamat;</li>
<li>place of receipt, port of loading, port of discharge, dan place of delivery;</li>
<li>vessel/voyage bila tersedia serta mode pre-carriage atau on-carriage;</li>
<li>marks and numbers, packages, cargo description, gross weight, dan measurement;</li>
<li>container, seal, verified gross mass reference, dan dangerous-goods data bila berlaku;</li>
<li>freight prepaid/collect, originals, release method, dan dokumentasi bank;</li>
<li>contract, invoice, packing list, booking, dan internal shipment reference.</li>
</ul>

<p>Deskripsi pada B/L tidak harus menyalin seluruh uraian invoice kata demi kata, tetapi tidak boleh menimbulkan konflik material. Hindari meminta carrier mencantumkan klaim kualitas, nilai, atau kondisi yang tidak dapat diverifikasi.</p>

<h2>Gate 3: review draft sebelum issuance</h2>

<table>
<thead><tr><th>Kelompok</th><th>Draft check</th><th>Jika salah</th></tr></thead>
<tbody>
<tr><td>Para pihak</td><td>Legal name, address, consignee/order wording, notify</td><td>Release atau endorsement bermasalah</td></tr>
<tr><td>Rute</td><td>Place/port, vessel, voyage, transshipment</td><td>Konflik booking, L/C, atau manifest</td></tr>
<tr><td>Kargo</td><td>Packages, marks, description, weight, measurement</td><td>Discrepancy dan amendment</td></tr>
<tr><td>Unit</td><td>Container, seal, equipment, reefer/DG information</td><td>Data fisik dan dokumen tidak cocok</td></tr>
<tr><td>Komersial</td><td>Freight indication, originals, charges, release instruction</td><td>Hold, salah tagih, atau release prematur</td></tr>
<tr><td>Shipment</td><td>Received/shipped on board wording dan tanggal</td><td>Risiko bank dan cut-off kontrak</td></tr>
</tbody>
</table>

<p>Gunakan four-eyes review: satu orang memeriksa terhadap SI dan booking, orang kedua terhadap invoice, packing list, kontrak, serta persyaratan bank. Simpan draft yang disetujui, waktu approval, nama approver, dan perubahan setelah approval.</p>

<h2>Gate 4: perlakukan L/C sebagai aturan dokumen tersendiri</h2>

<p>Jika credit tunduk pada UCP 600, gunakan <a href="https://library.iccwbo.org/content/tfb/RULES/tfb-ucp600-rules.htm?AGENT=ICC_HQ" target="_blank" rel="noopener noreferrer">ICC UCP 600</a>. Article 20 membahas B/L port-to-port, termasuk identifikasi carrier dan tanda tangan, shipped-on-board indication, named vessel, port, serta tanggal shipment. Article 21 membahas non-negotiable sea waybill.</p>

<p>Jangan berasumsi bahwa dokumen yang diterima carrier otomatis diterima bank. Buat L/C document matrix sebelum SI dikirim: latest shipment date, presentation period, full set, consignee/order wording, endorsement, freight indication, clean transport document, transshipment, partial shipment, port, dan originals.</p>

<h2>Gate 5: rekonsiliasi HBL dan MBL secara logis</h2>

<p>HBL dan MBL tidak harus identik pada semua field. Shipper dan consignee dapat berbeda karena HBL menggambarkan hubungan forwarder dengan customer, sedangkan MBL menggambarkan hubungan carrier dengan forwarder/NVOCC. Namun data berikut harus terhubung tanpa konflik:</p>

<ul>
<li>vessel/voyage, port, place, dan movement yang sama;</li>
<li>container dan seal yang dapat dipetakan;</li>
<li>packages, gross weight, measurement, marks, dan cargo description yang dapat direkonsiliasi;</li>
<li>dangerous-goods, reefer, atau special handling tidak hilang pada salah satu layer;</li>
<li>agent destination mengetahui pihak dan dokumen yang dipakai untuk release.</li>
</ul>

<p><a href="https://fiata.org/resources/" target="_blank" rel="noopener noreferrer">FIATA</a> membedakan Negotiable FIATA Multimodal Transport Bill of Lading (FBL) dan non-negotiable FIATA Multimodal Transport Waybill (FWB). Logo atau nama forwarder saja tidak cukup; periksa authority penerbit, terms, insurance requirement, dan tanggung jawabnya.</p>

<h2>Gate 6: kontrol issuance, amendment, dan surrender</h2>

<ol>
<li>Carrier/issuer menerbitkan dokumen hanya dari approved draft.</li>
<li>Nomor dokumen, jumlah original, issue date, dan status dicatat.</li>
<li>Original disimpan/dikirim dengan custody log dan penerima terverifikasi.</li>
<li>Setiap amendment memiliki alasan, requester, approval, biaya, dan dampak manifest/bank.</li>
<li>Surrender atau telex release memerlukan bukti authority, original status, payment gate, dan konfirmasi destination.</li>
<li>Dokumen yang void atau superseded diberi status jelas agar tidak dipakai kembali.</li>
</ol>

<p>Untuk eBL, PDF biasa bukan otomatis electronic transferable record. UNCITRAL MLETR menekankan identifikasi record, integrity, dan exclusive control sebagai functional equivalent dari possession. Periksa pengakuan hukum, platform, interoperability, carrier, bank, dan negara terkait. <a href="https://dcsa.org/standards/bill-of-lading" target="_blank" rel="noopener noreferrer">DCSA</a> menyediakan standar data dan proses untuk issuance, amendment, serta surrender, tetapi penerapan teknologi tidak menggantikan penilaian hukum.</p>

<h2>Simulasi kontrol satu shipment</h2>

<p>Eksportir menjual mesin dengan pembayaran 20% di muka dan 80% melalui L/C. Forwarder menerbitkan HBL, carrier menerbitkan MBL, dan transit hanya 12 hari. Tim tidak langsung memilih telex release.</p>

<p>Pertama, trade finance memetakan syarat Article 20 dan credit. Kedua, operasi mengunci SI serta draft HBL/MBL. Ketiga, HBL dibuat sesuai kebutuhan transaksi customer, sementara MBL menempatkan forwarder pada posisi yang sesuai dengan booking carrier. Container, seal, vessel, route, packages, dan weight direkonsiliasi. Original tidak disurrender sebelum bank/payment owner memberikan approval tertulis. Jika L/C diubah, SI dan draft menjalani review ulang.</p>

<h2>Red flags yang menghentikan release</h2>

<ul>
<li>Consignee atau order wording tidak sesuai kontrak/L/C.</li>
<li>Original telah diterbitkan tetapi keberadaannya tidak diketahui.</li>
<li>Permintaan surrender datang dari email atau nomor yang tidak terverifikasi.</li>
<li>Container, seal, packages, weight, port, vessel, atau tanggal tidak cocok.</li>
<li>HBL dan MBL tidak dapat direkonsiliasi ke shipment fisik.</li>
<li>Amendment dilakukan tanpa menilai manifest, customs, bank, dan destination impact.</li>
<li>Sea waybill dipakai padahal seller masih membutuhkan document control.</li>
<li>PDF disebut eBL tanpa mekanisme exclusive control dan legal acceptance.</li>
</ul>

<h2>Konteks kepabeanan ekspor Indonesia</h2>

<p><a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">PMK 155/PMK.04/2022</a> menyebut bill of lading/airway bill sebagai dokumen pelengkap pabean dalam penelitian dokumen ekspor. Data B/L atau AWB pada PEB dapat dilengkapi paling lama tiga hari sejak keberangkatan sarana pengangkut menuju luar daerah pabean.</p>

<p>Ketentuan tersebut tidak berarti B/L menggantikan invoice, packing list, PEB, NPE, izin komoditas, atau persyaratan tujuan. Rekonsiliasi data tetap diperlukan, dan NPE maupun terbitnya B/L bukan jaminan import clearance di negara tujuan.</p>

<h2>Checklist final</h2>

<ol>
<li>Jenis transport document dan release method disetujui berdasarkan pembayaran dan risiko.</li>
<li>Carrier/issuer, terms, governing law, serta authority penerbit diverifikasi.</li>
<li>SI memakai satu sumber data dan memiliki version lock.</li>
<li>Draft B/L direview terhadap booking, invoice, packing list, kontrak, dan L/C.</li>
<li>HBL–MBL serta data PEB dapat direkonsiliasi.</li>
<li>Original custody, amendment, surrender, dan destination release memiliki approval trail.</li>
<li>Void/superseded document diblokir dari penggunaan ulang.</li>
<li>Final B/L/AWB dan arsip pascakeberangkatan diperbarui sesuai kewajiban.</li>
</ol>

<h2>Kesimpulan</h2>

<p>Pengendalian Bill of Lading dimulai sebelum dokumen diterbitkan: pilih instrumen berdasarkan kebutuhan kontrol, bentuk SI yang konsisten, review draft, rekonsiliasi HBL–MBL, lalu kendalikan original, amendment, surrender, dan release. Jangan menyederhanakan masalah hukum dan pembayaran menjadi pilihan “original versus telex”.</p>

<p>GMA World dapat membantu menyiapkan SI master, draft-check matrix, HBL–MBL reconciliation, document custody log, dan release checklist. Keputusan bank, carrier, otoritas, serta penyerahan kargo tetap mengikuti dokumen, terms, hukum, dan fakta shipment aktual.</p>

<h2>Referensi resmi dan standar</h2>

<ul>
<li><a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">JDIH Kementerian Keuangan — PMK 155/PMK.04/2022</a></li>
<li><a href="https://dcsa.org/standards/bill-of-lading/documentation-bill-of-lading-3/bill-of-lading-3-introduction" target="_blank" rel="noopener noreferrer">DCSA — Bill of Lading 3.0 Introduction</a></li>
<li><a href="https://library.iccwbo.org/content/tfb/RULES/tfb-ucp600-rules.htm?AGENT=ICC_HQ" target="_blank" rel="noopener noreferrer">ICC — UCP 600 Articles 20 and 21</a></li>
<li><a href="https://uncitral.un.org/en/texts/ecommerce/modellaw/electronic_transferable_records" target="_blank" rel="noopener noreferrer">UNCITRAL — Model Law on Electronic Transferable Records</a></li>
<li><a href="https://fiata.org/resources/" target="_blank" rel="noopener noreferrer">FIATA — Transport Documents and Resources</a></li>
<li><a href="https://dcsa.org/standards/bill-of-lading" target="_blank" rel="noopener noreferrer">DCSA — Electronic Bill of Lading Standard</a></li>
</ul>
HTML,
    ],
];
