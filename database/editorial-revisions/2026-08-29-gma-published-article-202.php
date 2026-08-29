<?php

return [
    'article_id' => 202,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Freight Rate Kontainer: Panduan Lengkap 7 Faktor Utama',
        'slug' => 'freight-rate-kontainer-7-faktor-utama',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '81e0a884b732ecfb7169c946d0508d757933b90fe2e1c643d2a52ac9ca34b8a1',
    ],
    'review_notes' => 'GMA container freight rate pillar rebuilt on 2026-08-29 using UNCTAD Review of Maritime Transport, IMO MARPOL Annex VI fuel compliance, US FMC 46 CFR Part 520/530 tariff principles, ICC Incoterms 2020 cost division rules, DCSA booking and quotation standards, and Indonesia port authority tariff structures. Removes static/unverified rate claims, promotional promises of cheap rates, generic news aggregation widgets, repetitive CTA blocks, and universal pricing assumptions. Adds full cost taxonomy (base freight, surcharges, local charges), spot versus service contract mechanisms, Price Calculation Date (PCD) rules, 7 structural rate drivers, worked quotation-to-invoice reconciliation scenario, dispute gates, and official primary references.',
    'changes' => [
        'title' => 'Freight Rate Kontainer: Komponen, Surcharge, Indeks, dan Audit Tagihan',
        'focus_keyword' => 'freight rate kontainer',
        'meta_description' => 'Pelajari freight rate kontainer: struktur base freight, surcharge BAF/THC, perbedaan spot vs kontrak, Incoterms, serta checklist audit invoice pelayaran.',
        'excerpt' => 'Panduan operasional membaca komponen freight rate kontainer, membedakan tarif spot dan kontrak, serta mengaudit invoice ocean freight secara presisi.',
        'og_title' => 'Freight Rate Kontainer: Komponen, Surcharge, Indeks, dan Audit Tagihan',
        'og_description' => 'Ketahui anatomi freight rate kontainer: base ocean rate, bunker surcharges, THC, Incoterms, serta tata cara rekonsiliasi quotation dan invoice.',
        'pillar' => 'industri-maritim',
        'tags' => ['freight rate kontainer', 'ocean freight', 'bunker adjustment factor', 'terminal handling charge', 'freight forwarding'],
        'hashtags' => ['FreightRate', 'OceanFreight', 'ContainerShipping', 'LogisticsAudit', 'MaritimeLogistics'],
        'image_alt_texts' => [
            'Peti kemas ekspor impor di terminal pelabuhan siap kalkulasi freight rate kontainer',
            'Manajer logistik melakukan audit rekonsiliasi invoice freight rate kontainer dan surcharge',
            'Aktivitas container crane memuat kontainer kargo internasional di dermaga',
        ],
        'schema_faq' => [
            [
                'question' => 'Mengapa freight rate kontainer pada quotation berbeda dari invoice akhir?',
                'answer' => 'Perbedaan umumnya terjadi karena biaya tambahan yang timbul antara tanggal penawaran dan tanggal pelaksanaan, seperti fluktuasi bunker surcharge (BAF), perubahan Price Calculation Date (PCD), selisih kurs mata uang (ROE), detention/demurrage, atau biaya lokal pelabuhan yang belum terinci dalam penawaran awal.',
            ],
            [
                'question' => 'Apa perbedaan mendasar antara spot rate dan contract rate (service contract)?',
                'answer' => 'Spot rate adalah tarif pasar jangka pendek yang berlaku untuk jadwal pelayaran tertentu dengan volatilitas tinggi, sedangkan contract rate adalah tarif jangka panjang yang disepakati melalui komitmen volume minimum (MQC) dengan formula penyesuaian biaya yang telah disepakati.',
            ],
            [
                'question' => 'Bagaimana aturan Incoterms 2020 menentukan penanggung biaya freight rate kontainer?',
                'answer' => 'Incoterms menentukan titik peralihan biaya dan risiko. Pada term FOB atau FCA, freight rate dibayar oleh pembeli (freight collect), sedangkan pada term CFR, CIF, CPT, atau CIP, freight rate wajib dibayar oleh penjual (freight prepaid) hingga pelabuhan/tempat tujuan yang disepakati.',
            ],
            [
                'question' => 'Apa saja komponen wajib yang harus ada dalam quotation freight rate kontainer?',
                'answer' => 'Quotation resmi harus memuat Base Ocean Freight, mandatory surcharges (seperti BAF/LSS, CAF, PSS), origin charges (THC, doc fee, seal fee), destination charges, currency, masa berlaku (validity), Price Calculation Date rule, dan ketentuan free time demurrage/detention.',
            ],
        ],
        'content_html' => <<<'HTML'
<p><strong>Freight rate kontainer</strong> bukan sekadar angka tunggal tarif dasar kapal (<em>base ocean freight</em>). Dalam pengapalan peti kemas internasional, total biaya angkut laut dibentuk oleh struktur multi-komponen yang mencakup tarif dasar rute, berbagai <em>mandatory surcharge</em> operator pelayaran, biaya penanganan terminal asal dan tujuan, serta ketentuan penyesuaian pasar yang dinamis.</p>

<p>Kesalahan fatal yang sering dialami pemilik kargo (<em>shipper</em> maupun <em>consignee</em>) adalah membandingkan penawaran harga hanya dari angka ocean freight termurah tanpa memeriksa rincian surcharge, ketentuan masa berlaku (<em>validity</em>), dasar tanggal perhitungan harga (<em>Price Calculation Date / PCD</em>), dan alokasi tanggung jawab berdasarkan kontrak perdagangan.</p>

<p>Panduan ini diperbarui pada 29 Agustus 2026 sebagai kerangka kerja teknis untuk memahami struktur tarif peti kemas, membedakan mekanisme pasar spot versus kontrak jangka panjang, menganalisis faktor pembentuk biaya, dan melakukan audit rekonsiliasi invoice sebelum pembayaran dilakukan.</p>

<h2>Anatomi struktur freight rate kontainer</h2>

<p>Sesuai dengan standar dokumentasi <a href="https://dcsa.org/standards/ebill-of-lading" target="_blank" rel="noopener noreferrer">DCSA (Digital Container Shipping Association)</a> dan prinsip transparansi tarif pelayaran internasional, total biaya pengiriman peti kemas terbagi ke dalam empat lapisan utama:</p>

<table>
<thead>
<tr>
<th>Lapisan Biaya</th>
<th>Komponen Utama</th>
<th>Dasar Penerapan dan Karakteristik</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>1. Base Ocean Freight (BAS)</strong></td>
<td>Tarif dasar angkutan laut per kontainer (per TEU/FEU)</td>
<td>Ditetapkan berdasarkan pasangan pelabuhan (POL ke POD), jenis komoditas, dan tipe kontainer (Dry, High Cube, Reefer, Open Top).</td>
</tr>
<tr>
<td><strong>2. Carrier Surcharges (Mandatory)</strong></td>
<td>BAF/LSS, CAF, PSS, GRI, WRS</td>
<td>Biaya tambahan bahan bakar, fluktuasi mata uang, peak season, penyesuaian tarif umum, dan risiko area konflik.</td>
</tr>
<tr>
<td><strong>3. Origin &amp; Destination Charges</strong></td>
<td>THC / OTHC / DTHC, Doc Fee, Seal Fee, Lo-Lo</td>
<td>Biaya penanganan kargo di terminal pelabuhan muat dan bongkar, administrasi manifest, serta segel peti kemas.</td>
</tr>
<tr>
<td><strong>4. Contingency &amp; Equipment Charges</strong></td>
<td>Overweight Surcharge (OWS), Demurrage, Detention</td>
<td>Dikenakan jika berat kargo melebihi batas standar jalan/alat atau peti kemas melebihi batas waktu <em>free time</em>.</td>
</tr>
</tbody>
</table>

<p>Pemahaman atas pembagian lapisan ini sangat penting saat membaca <em>freight quotation</em>. Istilah "All-In Rate" dari forwarder atau carrier harus selalu diverifikasi: apakah mencakup origin THC, destination THC, dan documentation fee, atau hanya mencakup Base Freight ditambah Bunker Surcharge.</p>

<h2>Surcharge utama pelayaran dan regulasi dasarnya</h2>

<p>Operator pelayaran peti kemas menerapkan biaya tambahan resmi (<em>surcharges</em>) untuk mengompensasi variabel operasional yang berada di luar kendali jadwal reguler:</p>

<ul>
<li><strong>Bunker Adjustment Factor (BAF) / Low Sulphur Surcharge (LSS):</strong> Penyesuaian harga bahan bakar kapal. Sejak berlakunya batas sulfur global 0,50% m/m berdasarkan <a href="https://www.imo.org/en/OurWork/Environment/Pages/2020-sulphur-limit-IMO-2020.aspx" target="_blank" rel="noopener noreferrer">IMO MARPOL Annex VI (IMO 2020)</a>, carrier menerapkan formula BAF yang dikaitkan langsung dengan indeks harga bahan bakar rendah sulfur (VLSFO / MGO) atau biaya kepatuhan bahan bakar alternatif.</li>
<li><strong>Currency Adjustment Factor (CAF):</strong> Kompensasi fluktuasi nilai tukar antara mata uang penagihan operasional kapal dan mata uang dasar tarif (umumnya USD).</li>
<li><strong>Peak Season Surcharge (PSS):</strong> Tambahan biaya saat permintaan ruang kapal melonjak drastis pada periode sibuk perdagangan musiman (seperti pra-Tahun Baru Imlek atau musim belanja akhir tahun).</li>
<li><strong>General Rate Increase (GRI):</strong> Kenaikan tarif terencana yang diumumkan carrier pada interval tertentu saat utilisasi kapal tinggi. Di yurisdiksi yang diatur ketat seperti Amerika Serikat, <a href="https://www.fmc.gov" target="_blank" rel="noopener noreferrer">US Federal Maritime Commission (FMC)</a> di bawah 46 CFR Part 520 mewajibkan pemberitahuan publik minimal 30 hari sebelum kenaikan tarif berlaku untuk perdagangan luar negeri AS.</li>
<li><strong>War Risk Surcharge (WRS) / Emergency Conflict Surcharge:</strong> Dikenakan saat kapal harus melintasi perairan berisiko tinggi atau memutar melalui rute alternatif (misalnya Tanjung Harapan alih-alih Terusan Suez) yang menambah durasi pelayaran dan premi asuransi lambung kapal.</li>
</ul>

<h2>7 Faktor penentu freight rate kontainer</h2>

<p>Laporan <a href="https://unctad.org/topic/transport-and-trade-logistics/review-of-maritime-transport" target="_blank" rel="noopener noreferrer">UNCTAD Review of Maritime Transport</a> mengidentifikasi dinamika struktural yang membentuk pergerakan freight rate kontainer di pasar global:</p>

<ol>
<li><strong>Keseimbangan Penawaran Kapasitas dan Permintaan Muatan (Supply vs. Demand):</strong> Pertumbuhan kapasitas armada global (penyerahan kapal baru) versus volume perdagangan dunia. Ketika permintaan melemah, carrier dapat melakukan <em>blank sailings</em> (pembatalan jadwal pelayaran) untuk menstabilkan tarif.</li>
<li><strong>Rute Pelayaran dan Jarak Tempuh (Trade Lane &amp; Transshipment):</strong> Pengiriman langsung (<em>direct call</em>) memiliki struktur biaya berbeda dibandingkan pengiriman yang memerlukan satu atau dua kali alih-kapal (<em>feeder transshipment</em> di hub regional seperti Singapura, Tanjung Pelepas, atau Port Klang).</li>
<li><strong>Jenis dan Spesifikasi Peralatan Kontainer:</strong> Kontainer khusus seperti Reefer (memerlukan pasokan daya listrik terus-menerus dan pemantauan suhu), Open Top, Flat Rack, dan ISO Tank memiliki tarif dasar dan surcharge penanganan yang jauh lebih tinggi daripada General Purpose (GP) Dry Container 20ft dan 40ft.</li>
<li><strong>Ketidakseimbangan Arus Perdagangan (Trade Imbalance &amp; Empty Repositioning):</strong> Rute dengan arus barang searah (<em>head-haul</em>) menanggung subsidi biaya reposisi kontainer kosong kembali ke pusat produksi, sehingga tarif pada rute sebaliknya (<em>back-haul</em>) umumnya jauh lebih rendah.</li>
<li><strong>Fluktuasi Harga Bahan Bakar dan Dekarbonisasi:</strong> Efisiensi konsumsi bahan bakar kapal, kecepatan ekonomis (<em>slow steaming</em>), dan implementasi regulasi emisi regional (seperti EU ETS pada pelayaran Eropa) menjadi faktor pembentuk formula BAF.</li>
<li><strong>Kongesti Pelabuhan dan Waktu Tunggu (Port Congestion &amp; Berthing Delays):</strong> Antrean kapal di pelabuhan tujuan yang menyebabkan kapal tertahan mengurangi produktivitas aset pelayaran, memicu pengenaan <em>Port Congestion Surcharge (PCS)</em>.</li>
<li><strong>Geopolitik, Keamanan Jalur Maritim, dan Regulasi:</strong> Gangguan pada selat-selat strategis dunia (chokepoints), perubahan kebijakan tarif perdagangan internasional, dan kepatuhan perizinan lokal.</li>
</ol>

<h2>Spot rate vs. service contract: memilih mekanisme pengadaan</h2>

<table>
<thead>
<tr>
<th>Parameter</th>
<th>Spot Market (Pasar Spot)</th>
<th>Long-Term Service Contract</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Masa Berlaku Tarif</strong></td>
<td>Jangka pendek (7 hingga 14 hari)</td>
<td>3 bulan, 6 bulan, hingga 1 tahun</td>
</tr>
<tr>
<td><strong>Komitmen Volume</strong></td>
<td>Tidak ada komitmen volume minimum</td>
<td>Minimum Quantity Commitment (MQC) dengan penalti atau alokasi tier</td>
</tr>
<tr>
<td><strong>Kepastian Ruang (Space)</strong></td>
<td>Subject to space/equipment availability (risiko kenaikan harga saat penuh)</td>
<td>Alokasi ruang terlindungi sesuai kuota mingguan yang disepakati</td>
</tr>
<tr>
<td><strong>Indeks Rujukan</strong></td>
<td>Mengikuti indeks publik (SCFI, FBX, Platts, WCI Drewry)</td>
<td>Tarif tetap (fixed base) dengan mekanisme peninjauan BAF berkala</td>
</tr>
<tr>
<td><strong>Profil Pengguna Ideal</strong></td>
<td>Shipper dengan volume sporadis, kargo proyek tidak rutin, atau musiman</td>
<td>Manufaktur dan distributor besar dengan jadwal pengapalan teratur setiap minggu</td>
</tr>
</tbody>
</table>

<p>Bagi pelaku usaha, kombinasi strategi <em>hybrid</em> (misalnya 70% volume dialokasikan ke kontrak jangka panjang dan 30% ke pasar spot) sering digunakan untuk menyeimbangkan kepastian ruang kapal dengan peluang harga pasar ketika spot rate sedang turun.</p>

<h2>Peralihan biaya freight berdasarkan Incoterms 2020</h2>

<p>Kewajiban pembayaran freight rate kontainer harus selalu diselaraskan dengan klausul kontrak jual beli internasional (<a href="https://iccwbo.org/business-solutions/incoterms-2020/" target="_blank" rel="noopener noreferrer">ICC Incoterms 2020</a>):</p>

<ul>
<li><strong>FOB (Free On Board) / FCA (Free Carrier):</strong> Penjual bertanggung jawab atas biaya kargo hingga termuat di atas kapal di pelabuhan muat (termasuk Origin THC). <em>Freight rate kontainer utama dibayar oleh pembeli</em> dengan status Bill of Lading: <strong>Freight Collect</strong>.</li>
<li><strong>CFR (Cost and Freight) / CIF (Cost, Insurance and Freight):</strong> Penjual wajib mengontrak dan membayar biaya angkutan laut hingga pelabuhan tujuan yang dinamai. Status Bill of Lading: <strong>Freight Prepaid</strong>. Namun, risiko kehilangan atau kerusakan barang berpindah ke pembeli sejak barang berada di atas kapal di pelabuhan muat.</li>
<li><strong>CPT (Carriage Paid To) / CIP (Carriage and Insurance Paid To):</strong> Serupa dengan CFR/CIF namun berlaku untuk semua moda transportasi (termasuk multimoda dan kontainerisasi darat-laut).</li>
<li><strong>DAP (Delivered at Place) / DPU (Delivered at Place Unloaded):</strong> Penjual menanggung seluruh biaya pengangkutan dan risiko hingga barang tiba di tempat tujuan yang ditentukan (dan dibongkar untuk DPU).</li>
</ul>

<p>Ketidakjelasan penentuan Incoterm sering menimbulkan sengketa tagihan, terutama terkait siapa yang menanggung Destination Terminal Handling Charge (DTHC) dan detention container di pelabuhan bongkar.</p>

<h2>Gate 1: aturan Price Calculation Date (PCD) dan validitas penawaran</h2>

<p>Dalam pengapalan kontainer, tanggal yang menentukan tarif yang berlaku bukanlah tanggal diterbitkannya quotation, melainkan aturan <em>Price Calculation Date (PCD)</em> yang disepakati oleh carrier:</p>

<ol>
<li><strong>PCD berbasis Container Gate-in Date:</strong> Tarif dikunci berdasarkan tanggal peti kemas pertama kali masuk ke pintu gerbang terminal pelabuhan muat (CY Gate-In).</li>
<li><strong>PCD berbasis Vessel Departure Date (ATD):</strong> Tarif ditentukan berdasarkan tanggal aktual kapal bertolak dari pelabuhan muat. Jika terjadi keterlambatan kapal (<em>vessel delay</em>) yang melewati akhir bulan, pengapalan dapat terkena kenaikan tarif bulan berikutnya secara otomatis.</li>
<li><strong>PCD berbasis Booking Date:</strong> Tarif dikunci pada saat booking dikonfirmasi oleh carrier.</li>
</ol>

<p>Pastikan konfirmasi booking (<em>Booking Confirmation</em>) Anda secara tertulis mencantumkan klausul PCD dan masa berlaku tarif (<em>validity window</em>) agar tidak terjadi kejutan kenaikan tarif saat invoice terbit.</p>

<h2>Gate 2: simulasi kalkulasi rekonsiliasi freight invoice</h2>

<p>Contoh skenario hipotetis: Pengapalan 2 unit 40ft High Cube (40HC) General Cargo dari Pelabuhan Tanjung Priok (IDTPP) ke Pelabuhan Hamburg (DEHAM) dengan term CFR.</p>

<table>
<thead>
<tr>
<th>Komponen Biaya</th>
<th>Basis Perhitungan</th>
<th>Tarif Satuan (USD/IDR)</th>
<th>Jumlah Satuan</th>
<th>Subtotal</th>
</tr>
</thead>
<tbody>
<tr>
<td>Base Ocean Freight (BAS)</td>
<td>Per Kontainer (40HC)</td>
<td>USD 2.400</td>
<td>2 Unit</td>
<td>USD 4.800</td>
</tr>
<tr>
<td>Bunker Surcharge (BAF/LSS)</td>
<td>Per Kontainer (40HC)</td>
<td>USD 350</td>
<td>2 Unit</td>
<td>USD 700</td>
</tr>
<tr>
<td>Peak Season Surcharge (PSS)</td>
<td>Per Kontainer (40HC)</td>
<td>USD 150</td>
<td>2 Unit</td>
<td>USD 300</td>
</tr>
<tr>
<td>Origin Terminal Handling (OTHC)</td>
<td>Per Kontainer (40ft di Tj. Priok)</td>
<td>USD 145</td>
<td>2 Unit</td>
<td>USD 290</td>
</tr>
<tr>
<td>Bill of Lading / Doc Fee</td>
<td>Per Dokumen Shipment</td>
<td>USD 50</td>
<td>1 Set</td>
<td>USD 50</td>
</tr>
<tr>
<td>Container Seal Fee</td>
<td>Per Kontainer</td>
<td>USD 10</td>
<td>2 Unit</td>
<td>USD 20</td>
</tr>
<tr>
<td><strong>Total Biaya Freight &amp; Origin</strong></td>
<td>—</td>
<td>—</td>
<td>—</td>
<td><strong>USD 6.160</strong></td>
</tr>
</tbody>
</table>

<p><em>Catatan: Angka di atas adalah simulasi ilustratif untuk menunjukkan metode penyusunan biaya itemized. Tarif aktual wajib merujuk pada rate sheet resmi carrier dan terminal pada tanggal pengapalan.</em></p>

<h2>Konteks tarif kepelabuhanan Indonesia</h2>

<p>Untuk pengapalan dari dan ke pelabuhan utama di Indonesia (seperti Tanjung Priok Jakarta, Tanjung Perak Surabaya, Belawan Medan, dan Makassar), struktur biaya lokal terminal peti kemas (THC/Lo-Lo) diatur melalui kesepakatan asosiasi pengguna jasa dan pengelola terminal yang disupervisi oleh Otoritas Pelabuhan dan Kementerian Perhubungan RI.</p>

<p>Selain biaya terminal, kepatuhan dokumen kepabeanan ekspor-impor di Indonesia harus disiapkan melalui sistem <a href="https://www.insw.go.id" target="_blank" rel="noopener noreferrer">Indonesia National Single Window (INSW)</a> dan portal CEISA Bea Cukai berdasarkan <a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">PMK 155/PMK.04/2022</a>. Keterlambatan customs clearance akibat ketidaklengkapan dokumen dapat memicu biaya penumpukan (<em>storage</em>) dan <em>demurrage</em> yang membengkakkan total biaya logistik di luar freight rate dasar.</p>

<h2>Checklist 6 langkah audit invoice freight rate</h2>

<ol>
<li><strong>Verifikasi Referensi Booking dan Kontrak:</strong> Cocokkan nomor booking, nomor B/L, jumlah peti kemas, ukuran/tipe kontainer, dan nomor kontrak tarif pada invoice pelayaran.</li>
<li><strong>Uji Price Calculation Date (PCD):</strong> Pastikan tanggal acuan penetapan tarif sesuai dengan klausul kesepakatan (gate-in date vs. departure date) dan tidak dikenakan kenaikan tarif di luar masa validitas.</li>
<li><strong>Rekonsiliasi Surcharge per Baris (Line-by-Line):</strong> Periksa apakah formula BAF, CAF, atau PSS yang ditagihkan sesuai dengan rate matrix yang disetujui saat booking.</li>
<li><strong>Cek Duplikasi Biaya Lokal Terminal:</strong> Pastikan biaya OTHC atau DTHC tidak ditagih ganda (misalnya ditagih oleh forwarder dan sekaligus ditagih langsung oleh terminal operator).</li>
<li><strong>Konfirmasi Nilai Tukar Mata Uang (Rate of Exchange / ROE):</strong> Jika invoice diterbitkan dalam Rupiah (IDR) untuk tarif dasar USD, pastikan kurs konversi menggunakan kurs resmi yang disepakati (kurs BI, kurs pajak Kemenkeu, atau bank rate yang tertera dalam kontrak).</li>
<li><strong>Pisahkan Biaya Reguler dari Exception Charges:</strong> Jika muncul tagihan detention, demurrage, atau reefer monitoring plug-in, minta time-log event resmi dari terminal dan depo sebelum menyetujui pembayaran.</li>
</ol>

<h2>Kesimpulan</h2>

<p>Pengelolaan <strong>freight rate kontainer</strong> yang efektif membutuhkan kedisiplinan dalam memahami struktur biaya multi-komponen, membedakan spot rate dan kontrak jangka panjang, mengunci aturan PCD, serta menjalankan audit faktur secara berlapis. Transparansi rincian biaya jauh lebih berharga daripada janji tarif murah yang belum memperhitungkan surcharge dan biaya lokal pelabuhan.</p>

<p>GMA World menyediakan asistensi perencanaan freight forwarding internasional, pemilihan rute laut, kalkulasi perbandingan biaya total (<em>landed cost</em>), dan tata kelola kepatuhan logistik maritim. Tarif dan alokasi ruang aktual selalu tunduk pada kontrak pelayaran, ketersediaan peralatan, regulasi yurisdiksi, dan kondisi operasional pelabuhan saat shipment berlangsung.</p>

<h2>Referensi resmi dan standar maritim</h2>

<ul>
<li><a href="https://unctad.org/topic/transport-and-trade-logistics/review-of-maritime-transport" target="_blank" rel="noopener noreferrer">UNCTAD — Review of Maritime Transport &amp; Container Shipping Market Reports</a></li>
<li><a href="https://www.imo.org/en/OurWork/Environment/Pages/2020-sulphur-limit-IMO-2020.aspx" target="_blank" rel="noopener noreferrer">International Maritime Organization (IMO) — MARPOL Annex VI Sulphur 2020 Regulations</a></li>
<li><a href="https://www.fmc.gov" target="_blank" rel="noopener noreferrer">US Federal Maritime Commission (FMC) — 46 CFR Part 520 &amp; 530 Carrier Tariff Regulations</a></li>
<li><a href="https://dcsa.org/standards/ebill-of-lading" target="_blank" rel="noopener noreferrer">Digital Container Shipping Association (DCSA) — Ocean Freight Industry Standards</a></li>
<li><a href="https://iccwbo.org/business-solutions/incoterms-2020/" target="_blank" rel="noopener noreferrer">International Chamber of Commerce (ICC) — Incoterms 2020 Rules</a></li>
<li><a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">JDIH Kementerian Keuangan — PMK 155/PMK.04/2022 Ketentuan Kepabeanan Ekspor</a></li>
<li><a href="https://www.insw.go.id" target="_blank" rel="noopener noreferrer">Indonesia National Single Window (INSW) — Layanan Informasi Ekspor Impor</a></li>
</ul>
HTML
,
    ],
];
