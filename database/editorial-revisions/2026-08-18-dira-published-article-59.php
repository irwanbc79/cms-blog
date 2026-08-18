<?php

return [
    'article_id' => 59,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Panduan Lengkap Perbandingan FOB vs CIF untuk Eksportir Pemula',
        'slug' => 'panduan-lengkap-perbandingan-fob-vs-cif-eksportir-pemula',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => 'fc836d10f9c0f8b3fe20320c5191596c340b0f712e9b9c9c5404b68b4fa1b8c5',
    ],
    'review_notes' => 'Live source-quality remediation on 2026-08-18. Removed generic beginner advice, profit promises, and unsupported FOB/CIF explanations. Rebuilt around ICC Incoterms 2020, separate cost/risk maps, container suitability, insurance, VGM, contract wording, documents, and exception handling. Requires human editorial re-review.',
    'changes' => [
        'title' => 'FOB vs CIF: Biaya, Titik Risiko, Freight, dan Insurance Gate',
        'focus_keyword' => 'FOB vs CIF',
        'meta_description' => 'FOB vs CIF berdasarkan Incoterms 2020: bedakan delivery, perpindahan risiko, freight, insurance, dokumen, container gate, dan perhitungan harga ekspor.',
        'excerpt' => 'FOB dan CIF bukan sekadar siapa membayar freight. Petakan delivery, risiko, biaya, insurance, dokumen, dan kontrol carrier sebelum menulis kontrak.',
        'og_title' => 'FOB vs CIF: Biaya, Titik Risiko, Freight, dan Insurance Gate',
        'og_description' => 'Decision matrix FOB atau CIF untuk eksportir: mode angkut, named port, delivery, risk, freight, insurance, VGM, dokumen, dan exception cost.',
        'pillar' => 'perdagangan-intl',
        'tags' => ['FOB', 'CIF', 'Incoterms 2020', 'freight', 'cargo insurance'],
        'hashtags' => ['FOB', 'CIF', 'Incoterms2020', 'Freight', 'TradeCompliance'],
        'image_alt_texts' => [
            'Perbandingan titik biaya dan risiko FOB versus CIF',
            'Eksportir memeriksa freight insurance dan dokumen Incoterms 2020',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah risiko CIF berpindah ketika barang tiba di pelabuhan tujuan?',
                'answer' => 'Tidak demikian menurut struktur CIF Incoterms 2020. Seller membayar freight dan insurance ke named port of destination, tetapi delivery dan transfer risiko terjadi pada tahap shipment sesuai rule. Kontrak perlu memisahkan cost point dan risk point.',
            ],
            [
                'question' => 'Apakah FOB cocok untuk setiap pengiriman container?',
                'answer' => 'FOB dipakai untuk sea atau inland waterway ketika delivery dimaksudkan terjadi on board vessel. Untuk container yang diserahkan ke carrier sebelum on board, evaluasi FCA dan fakta operasional sebelum memilih rule.',
            ],
            [
                'question' => 'Apakah CIF berarti seluruh risiko pengiriman ditanggung seller?',
                'answer' => 'Tidak. CIF mewajibkan seller mengatur freight dan cargo insurance sesuai rule, tetapi scope, exclusion, deductible, nilai, claim procedure, dan kebutuhan cover tambahan tetap harus diperiksa.',
            ],
            [
                'question' => 'Apakah Incoterms mengatur waktu pembayaran dan peralihan kepemilikan?',
                'answer' => 'Incoterms membagi tugas, biaya, delivery, dan risiko tertentu. Harga, payment term, title, inspection, quality, claim, force majeure, serta dispute perlu diatur terpisah dalam kontrak.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>FOB dan CIF bukan pilihan antara “murah” dan “mahal”. Keduanya adalah aturan kontrak untuk sea dan inland waterway transport yang membagi delivery, risiko, biaya, freight, insurance, ekspor, impor, serta dokumen tertentu. Kesalahan terbesar adalah menganggap pihak yang membayar freight selalu menanggung risiko sampai tujuan.</p>

<p>Per 18 Agustus 2026, acuan yang diperiksa adalah <a href="https://library.iccwbo.org/content/tfb/BOOKS/BK_0049/BK_0049_05_RulesSea.htm" target="_blank" rel="noopener noreferrer">Incoterms 2020 untuk sea and inland waterway transport dari ICC</a>, <a href="https://www.imo.org/en/ourwork/safety/pages/verification-of-the-gross-mass.aspx" target="_blank" rel="noopener noreferrer">ketentuan Verified Gross Mass dari IMO</a>, dan <a href="https://www.beacukai.go.id/tata-laksana-ekspor" target="_blank" rel="noopener noreferrer">Tata Laksana Ekspor DJBC</a>. Artikel lama tidak menyertakan sumber primer dan memakai bahasa promosi absolut; materi tersebut telah dihapus.</p>

<h2>FOB dan CIF dalam satu tabel keputusan</h2>

<table>
<thead><tr><th>Aspek</th><th>FOB</th><th>CIF</th></tr></thead>
<tbody>
<tr><td>Nama rule</td><td>Free On Board</td><td>Cost Insurance and Freight</td></tr>
<tr><td>Mode</td><td>Sea atau inland waterway.</td><td>Sea atau inland waterway.</td></tr>
<tr><td>Delivery/risk</td><td>Barang delivered on board vessel di named port of shipment.</td><td>Barang delivered dan risiko berpindah pada tahap shipment; jangan menunggu arrival untuk membaca risk point.</td></tr>
<tr><td>Main carriage</td><td>Buyer mengatur dan membayar sesuai pembagian rule.</td><td>Seller mengatur dan membayar freight ke named port of destination.</td></tr>
<tr><td>Cargo insurance</td><td>Seller tidak memiliki kewajiban kepada buyer untuk membuat kontrak insurance berdasarkan rule.</td><td>Seller mengadakan cargo insurance sesuai persyaratan CIF; buyer perlu memeriksa kecukupan cover.</td></tr>
<tr><td>Export clearance</td><td>Seller menjalankan formalitas ekspor sesuai rule dan hukum setempat.</td><td>Seller menjalankan formalitas ekspor sesuai rule dan hukum setempat.</td></tr>
<tr><td>Import clearance</td><td>Buyer menangani import clearance dan pungutan tujuan.</td><td>Buyer menangani import clearance dan pungutan tujuan.</td></tr>
</tbody>
</table>

<p>“CIF Singapore” belum lengkap bila tidak menyebut named port secara tepat, versi Incoterms, dan ketentuan kontrak lain. Gunakan format yang mengidentifikasi tempat serta versi, misalnya “CIF [named port of destination], Incoterms 2020”, setelah tim legal dan operasional memastikan tempat tersebut benar.</p>

<h2>Pisahkan lima peta sebelum memilih</h2>

<ol>
<li><strong>Delivery map:</strong> di mana seller memenuhi delivery menurut rule.</li>
<li><strong>Risk map:</strong> kapan risiko loss/damage berpindah.</li>
<li><strong>Cost map:</strong> siapa membayar origin, freight, insurance, destination, dan exception.</li>
<li><strong>Control map:</strong> siapa memilih carrier, forwarder, routing, schedule, dan insurer.</li>
<li><strong>Document map:</strong> siapa menyiapkan PEB, transport document, insurance evidence, origin, dan dokumen buyer.</li>
</ol>

<p>Kelima peta dapat berhenti pada titik yang berbeda. Dalam CIF, seller membayar main freight ke destination, tetapi ini tidak berarti risk point ikut berpindah ke destination. Dalam FOB, buyer mengontrol main carriage, tetapi seller tetap harus menyelesaikan pekerjaan origin sampai delivery on board dan formalitas ekspor sesuai rule.</p>

<h2>Container gate: jangan otomatis memilih FOB</h2>

<p>ICC membedakan rule untuk sea/inland waterway dan rule untuk any mode. Bila container diserahkan ke carrier atau terminal sebelum barang benar-benar on board, fakta operasional dapat tidak cocok dengan delivery point FOB. Evaluasi FCA untuk pola tersebut, termasuk kebutuhan on-board bill of lading bila transaksi dibiayai bank.</p>

<p>Tanyakan:</p>

<ul>
<li>Di titik mana seller menyerahkan kontrol fisik kepada carrier?</li>
<li>Siapa memesan container dan slot kapal?</li>
<li>Siapa menerima terminal receipt atau evidence of delivery?</li>
<li>Apakah bank meminta on-board bill of lading?</li>
<li>Siapa menanggung roll-over, storage, detention, demurrage, dan amendment?</li>
<li>Apakah shipment bulk/breakbulk atau containerized?</li>
</ul>

<p>Nama rule harus mengikuti transaksi yang benar-benar dapat dijalankan, bukan kebiasaan menulis FOB pada semua quotation.</p>

<h2>Insurance gate pada CIF</h2>

<p>CIF mewajibkan seller memperoleh cargo insurance sesuai ketentuan rule. Namun “ada insurance” belum menjawab apakah perlindungannya cocok. Periksa jenis cover, insured value, currency, voyage, commodity, packing, exclusion, deductible, claims payable location, survey requirement, insurer, policy/certificate wording, dan siapa memiliki insurable interest.</p>

<p>Buyer dapat membutuhkan cover tambahan untuk war, strikes, theft, wet damage, contamination, temperature, atau risiko komoditas lain. Kebutuhan tambahan harus dinegosiasikan sebelum harga final karena premium dan availability memengaruhi biaya. Jangan menjanjikan claim diterima; insurer menilai berdasarkan polis, kejadian, bukti, dan prosedur.</p>

<h2>Cost sheet: bandingkan basis yang sama</h2>

<table>
<thead><tr><th>Komponen</th><th>FOB quote</th><th>CIF quote</th><th>Evidence</th></tr></thead>
<tbody>
<tr><td>Product and packing</td><td>Masuk</td><td>Masuk</td><td>BOM, yield, supplier invoice.</td></tr>
<tr><td>Inland origin</td><td>Sesuai pembagian transaksi</td><td>Sesuai pembagian transaksi</td><td>Transport quotation.</td></tr>
<tr><td>Export clearance/origin handling</td><td>Masuk sampai delivery point</td><td>Masuk sampai delivery point</td><td>Forwarder/terminal quotation.</td></tr>
<tr><td>Main freight</td><td>Buyer side</td><td>Seller quote sampai named destination port</td><td>Carrier quotation beserta validity/surcharge.</td></tr>
<tr><td>Cargo insurance</td><td>Buyer evaluates</td><td>Seller arranges sesuai rule/contract</td><td>Insurer quotation dan coverage wording.</td></tr>
<tr><td>Destination costs</td><td>Buyer, subject to contract/carrier terms</td><td>Jangan diasumsikan termasuk; pecah per charge</td><td>Local charge sheet.</td></tr>
<tr><td>Exception buffer</td><td>Owner ditetapkan</td><td>Owner ditetapkan</td><td>Scenario register.</td></tr>
</tbody>
</table>

<p>Untuk CIF, freight quotation harus mencantumkan carrier, route, transit, validity, equipment, free time, surcharge, origin/destination inclusion, dan payment term. Freight “all-in” sering masih memiliki exclusion. Untuk FOB, buyer perlu memberi shipping instruction dan nominated carrier cukup awal agar seller dapat memenuhi cut-off.</p>

<h2>Verified Gross Mass dan shipping instruction</h2>

<p>IMO menjelaskan bahwa shipper bertanggung jawab menyediakan verified gross mass packed container dalam shipping document dan memberikannya cukup awal untuk stowage plan; VGM merupakan condition for loading. Karena itu, kontrak operasional perlu menetapkan metode timbang, fasilitas, PIC, deadline, format, dan exception bila berat berbeda.</p>

<p>Shipping instruction harus direkonsiliasi dengan invoice, packing list, PEB, certificate, booking, container/seal, dan buyer instruction. Perbedaan shipper, consignee, notify party, description, packages, weight, port, freight term, atau document release dapat menimbulkan amendment dan delay.</p>

<h2>Dokumen dan formalitas ekspor</h2>

<p>DJBC menjelaskan kewajiban PEB dalam tata laksana ekspor sesuai cakupan yang berlaku. Incoterms tidak menggantikan hukum kepabeanan atau lartas. Eksportir tetap perlu menyiapkan klasifikasi, izin teknis, invoice, packing list, transport data, dan dokumen pelengkap secara konsisten.</p>

<p>Document matrix minimal:</p>

<ul>
<li>sales contract/purchase order dengan rule, named port, dan versi;</li>
<li>commercial invoice dan packing list;</li>
<li>PEB serta respons sistem;</li>
<li>bill of lading/sea waybill;</li>
<li>insurance policy/certificate untuk CIF;</li>
<li>certificate of origin bila digunakan;</li>
<li>inspection, quality, health, atau phytosanitary document bila disyaratkan;</li>
<li>VGM dan container/seal record; serta</li>
<li>payment document sesuai metode transaksi.</li>
</ul>

<h2>Dua contoh keputusan</h2>

<h3>Scenario A: buyer memiliki kontrak carrier global</h3>

<p>Buyer ingin mengontrol freight, routing, dan destination agent. FOB mungkin dipertimbangkan untuk transaksi yang benar-benar delivered on board. Seller tetap menghitung origin work, cut-off, export clearance, terminal process, dan exception sampai delivery point. Bila barang containerized diserahkan lebih awal ke carrier, evaluasi FCA.</p>

<h3>Scenario B: buyer meminta harga sampai destination port</h3>

<p>Seller memiliki akses freight dan insurance yang dapat diverifikasi. CIF dapat dipertimbangkan, tetapi cost sheet harus memisahkan risk point dari destination cost point. Buyer memeriksa insurance scope dan biaya tujuan. Seller mengunci quotation validity agar perubahan freight tidak menghabiskan margin.</p>

<h2>Contract gate sebelum tanda tangan</h2>

<ul>
<li>Rule sesuai mode dan delivery practice.</li>
<li>Named port/place ditulis tepat dan versi Incoterms disebut.</li>
<li>Product, quantity, quality, tolerance, inspection, dan rejection diatur.</li>
<li>Price serta inclusion/exclusion terdokumentasi.</li>
<li>Payment, title, tax, sanctions, force majeure, law, dan dispute diatur terpisah.</li>
<li>Carrier, freight, insurance, VGM, document, dan cut-off owner jelas.</li>
<li>Storage, detention, demurrage, roll-over, amendment, survey, dan claim memiliki allocation rule.</li>
</ul>

<h2>Quotation worksheet yang dapat diaudit</h2>

<p>Setiap quotation perlu memiliki version number, tanggal, validity, currency, exchange-rate assumption, volume, equipment, route, carrier, sailing window, dan approval. Jangan menimpa file lama ketika freight berubah; selisih antarversi adalah bukti mengapa harga jual berubah.</p>

<table>
<thead><tr><th>Field</th><th>FOB control</th><th>CIF control</th></tr></thead>
<tbody>
<tr><td>Named port</td><td>Port of shipment dan delivery practice cocok.</td><td>Port of destination untuk freight disebut; risk point tetap dibaca sesuai rule.</td></tr>
<tr><td>Freight validity</td><td>Buyer/nominated carrier memberi instruction dan cut-off.</td><td>Seller mencatat expiry, surcharge, routing, dan roll-over exposure.</td></tr>
<tr><td>Insurance</td><td>Buyer menentukan cover; seller memberi informasi sesuai kewajiban rule.</td><td>Seller memperoleh cover dan bukti sesuai rule/contract; buyer memeriksa kebutuhan tambahan.</td></tr>
<tr><td>Weight/volume</td><td>Packing list dan VGM memengaruhi execution.</td><td>Packing list, VGM, freight basis, dan insurance value harus konsisten.</td></tr>
<tr><td>Destination charge</td><td>Buyer menguji local charges.</td><td>Buyer tetap menguji charge yang tidak termasuk freight seller.</td></tr>
<tr><td>Approval</td><td>Commercial, operations, finance, dan compliance.</td><td>Commercial, operations, finance, insurance, dan compliance.</td></tr>
</tbody>
</table>

<p>Quotation kepada buyer sebaiknya tidak hanya menulis total. Cantumkan product, quantity tolerance, rule, named port, Incoterms version, shipment window, payment, validity, dan exclusions penting. Bila freight masih indikatif, statusnya harus terlihat dan ada mekanisme repricing sebelum booking.</p>

<h2>Post-shipment variance review</h2>

<p>Setelah vessel berangkat dan dokumen diterbitkan, bandingkan quote dengan biaya aktual. Kelompokkan selisih menjadi product/packing, inland, terminal, customs service, freight, surcharge, insurance, documentation, storage, amendment, exchange rate, dan finance cost. Jangan menyembunyikan exception dalam “miscellaneous”.</p>

<p>Periksa pula apakah delivery evidence, on-board date, VGM, PEB, bill of lading, insurance evidence, dan invoice konsisten. Bila CIF claim terjadi, simpan notice, survey, photos, packing evidence, loss calculation, correspondence, policy/certificate, dan transport document sesuai prosedur insurer. Bila FOB shipment mengalami roll-over dari nominated carrier, catat pihak yang memberi instruction, cut-off, readiness container, dan biaya yang timbul sebelum menentukan tanggung jawab.</p>

<p>Hasil review mengubah freight vendor scorecard, insurance checklist, contract clause, quotation buffer, dan approval threshold. Satu shipment tidak boleh dijadikan patokan tetap; routing, carrier, season, commodity, packing, dan market freight dapat berubah.</p>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026 berdasarkan Incoterms 2020 ICC, panduan VGM IMO, dan Tata Laksana Ekspor DJBC. Gunakan rule book dan kontrak aktual untuk transaksi tertentu. Artikel ini bukan legal opinion, insurance confirmation, freight booking, atau persetujuan ekspor.</p>
HTML,
    ],
];
