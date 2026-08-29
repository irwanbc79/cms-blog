<?php

return [
    'article_id' => 172,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Biaya Pengiriman Logistik ke Luar Negeri 2025: Panduan Lengkap',
        'slug' => 'biaya-pengiriman-logistik-ke-luar-negeri-2025',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '14c31f299a3553d3c80c11de5e9aec9951f9c1115a57df002896df62665f0412',
    ],
    'review_notes' => 'GMA International freight logistics costing guide rebuilt on 2026-08-29 using FMC (Federal Maritime Commission 46 CFR Part 520) ocean freight tariff transparency standards, IATA (TACT Rules) air cargo chargeable weight formulas, ICC Incoterms 2020 cost allocation boundaries, and PMK 155/PMK.04/2022 export-import customs clearance procedures. Removes outdated 2025 references, generic marketing advice, unrelated domestic news widgets, and unqualified pricing estimates. Adds full fee breakdowns (Base Freight, Ocean/Air Surcharges, Origin/Destination Port Handling, LCL Revenue Ton calculation), worked cost simulations, and official primary references.',
    'changes' => [
        'title' => 'Biaya Pengiriman Logistik Luar Negeri: Struktur Tarif Laut, Udara, dan Incoterms',
        'focus_keyword' => 'biaya pengiriman logistik',
        'meta_description' => 'Panduan struktur biaya pengiriman logistik internasional: ocean freight FCL/LCL, rumus chargeable weight IATA, surcharge BAF/THC, dan Incoterms 2020.',
        'excerpt' => 'Kerangka kalkulasi biaya logistik ekspor impor: komponen ocean freight, rumus chargeable weight IATA, surcharge maritim, dan titik alokasi biaya Incoterms.',
        'og_title' => 'Biaya Pengiriman Logistik Luar Negeri: Struktur Tarif Laut, Udara, dan Incoterms',
        'og_description' => 'Pelajari cara menghitung ongkos kirim kargo internasional: rincian THC/BAF, simulasi LCL per revenue ton, rumus berat volume udara IATA, dan Incoterms 2020.',
        'pillar' => 'industri-maritim',
        'tags' => ['biaya pengiriman logistik', 'ocean freight fcl lcl', 'air freight iata', 'incoterms 2020', 'surcharge baf thc', 'kalkulasi freight'],
        'hashtags' => ['BiayaLogistik', 'OceanFreight', 'AirCargo', 'Incoterms2020', 'LogistikInternasional'],
        'image_alt_texts' => [
            'Rincian komponen biaya ocean freight kontainer dan penanganan kargo di pelabuhan internasional',
            'Penimbangan berat aktual kargo dan perhitungan chargeable weight kargo udara IATA',
            'Peti kemas ekspor dan impor disusun di lapangan penumpukan container yard pelabuhan',
        ],
        'schema_faq' => [
            [
                'question' => 'Apa saja komponen utama pembentuk biaya pengiriman logistik kargo laut (Ocean Freight)?',
                'answer' => 'Komponen utama terdiri atas Base Freight Rate (tarif dasar kapal), Origin Terminal Handling Charge (THC), Surcharges (BAF/Bunker, CAF/Currency, PSS/Peak Season), biaya dokumen kepabeanan (PEB/NPE), serta Destination Charges (Destuffing, CFS, D/O Fee).',
            ],
            [
                'question' => 'Bagaimana rumus perhitungan Chargeable Weight untuk pengiriman kargo udara (Air Freight) menurut IATA?',
                'answer' => 'Menurut aturan IATA TACT, Chargeable Weight adalah nilai tertinggi antara Berat Aktual (Gross Weight dalam kg) dan Berat Volumetrik (Volume Weight). Rumus berat volume adalah: (Panjang x Lebar x Tinggi dalam cm) / 6.000.',
            ],
            [
                'question' => 'Bagaimana cara menghitung biaya pengiriman kargo laut skema LCL (Less than Container Load)?',
                'answer' => 'Biaya LCL dihitung berdasarkan Revenue Ton (w/m), yaitu nilai terbesar antara total volume kargo dalam Cubic Meter (CBM) dan total berat kargo dalam Metric Ton (1.000 kg). Tarif dasar dikalikan dengan Revenue Ton yang diperoleh.',
            ],
            [
                'question' => 'Apa perbedaan alokasi pembebanan biaya antara term FOB, CIF, dan DDP menurut Incoterms 2020?',
                'answer' => 'Pada FOB, eksportir menanggung biaya lokal asal hingga barang di atas kapal; pada CIF, eksportir menanggung biaya lokal asal, ocean freight, dan asuransi maritim; sedangkan pada DDP, eksportir menanggung seluruh biaya pengiriman pintu ke pintu (door-to-door) termasuk bea masuk dan pajak impor di negara tujuan.',
            ],
        ],
        'content_html' => <<<'HTML'
<p><strong>Biaya pengiriman logistik</strong> perdagangan internasional merupakan elemen biaya paling krusial yang menentukan profitabilitas dan kelayakan harga komersial bagi eksportir maupun importir. Dalam praktiknya, penawaran harga dari operator pelayaran (<em>shipping line</em>), maskapai kargo (<em>airline</em>), atau perusahaan <em>freight forwarder</em> tidak pernah berupa angka tunggal, melainkan gabungan dari tarif dasar angkut, biaya penanganan terminal, berbagai biaya tambahan (<em>surcharges</em>), serta pungutan kepabeanan.</p>

<p>Ketidakpahaman terhadap struktur rincian tagihan logistik (<em>freight breakdown</em>), kesalahan perhitungan berat volumetrik kargo, atau ketidakjelasan pembagian titik risiko biaya dalam klausul <a href="https://iccwbo.org/resources-for-business/incoterms-rules/" target="_blank" rel="noopener noreferrer">Incoterms 2020</a> kerap memicu biaya tak terduga (<em>unexpected demurrage &amp; handling charges</em>) yang menggerus margin transaksi ekspor-impor.</p>

<p>Panduan ini diperbarui pada 29 Agustus 2026 sebagai kerangka standar audit dan kalkulasi biaya logistik kargo internasional berdasarkan aturan transparansi tarif maritim <a href="https://www.fmc.gov" target="_blank" rel="noopener noreferrer">Federal Maritime Commission (FMC / 46 CFR Part 520)</a>, standar kargo udara <a href="https://www.iata.org" target="_blank" rel="noopener noreferrer">International Air Transport Association (IATA TACT Rules)</a>, standar perdagangan <a href="https://iccwbo.org" target="_blank" rel="noopener noreferrer">ICC Incoterms 2020</a>, serta tata laksana pabean <a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">PMK 155/PMK.04/2022</a>.</p>

<h2>Struktur 4 layer pembentuk biaya logistik internasional</h2>

<table>
<thead>
<tr>
<th>Layer Komponen Biaya</th>
<th>Item Rincian Operasional</th>
<th>Pihak Penerbit Tagihan</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Layer 1: Origin Local Charges (Biaya Pelabuhan Asal)</strong></td>
<td>Trucking/drayage ke pelabuhan, Terminal Handling Charge (THC Origin), Lift-on/Lift-off (Lo-Lo), Seal Fee, Bill of Lading Fee, Verified Gross Mass (VGM), Export Customs Clearance (PEB BC 3.0 &amp; NPE).</td>
<td>Depo Truk, Operator Terminal Pelabuhan (Pelindo), Shipping Line, PPJK/Forwarder.</td>
</tr>
<tr>
<td><strong>Layer 2: Main Freight (Biaya Angkut Utama)</strong></td>
<td>Base Ocean Freight (per kontainer FCL atau per Revenue Ton LCL) atau Base Air Freight Rate (per kg Chargeable Weight).</td>
<td>Shipping Line / Maskapai Penerbangan Kargo.</td>
</tr>
<tr>
<td><strong>Layer 3: Mandatory Freight Surcharges (Biaya Tambahan Wajib)</strong></td>
<td>Bunker Adjustment Factor (BAF / LSS / IMO 2020 Fuel), Currency Adjustment Factor (CAF), Peak Season Surcharge (PSS), Emergency Bunker Surcharge (EBS), War Risk Surcharge, Air Fuel/Security Surcharge (FSC/SSC).</td>
<td>Shipping Line / Airline via Forwarder.</td>
</tr>
<tr>
<td><strong>Layer 4: Destination Local Charges (Biaya Pelabuhan Tujuan)</strong></td>
<td>THC Destination, Delivery Order (D/O) Fee, Container Cleaning Fee, CFS/Destuffing Fee (LCL), Import Customs Clearance (PIB BC 2.0), Bea Masuk, PPN Impor, PPh 22, Destination Trucking ke gudang penerima.</td>
<td>Operator Terminal Bongkar, Shipping Line, Bea Cukai Negara Tujuan, Forwarder Tujuan.</td>
</tr>
</tbody>
</table>

<h2>Mekanisme surcharges angkutan laut (Ocean Surcharges)</h2>

<p>Biaya tambahan angkutan laut diberlakukan operator pelayaran untuk menyesuaikan fluktuasi biaya operasional bahan bakar, risiko geopolitik, dan lonjakan musiman:</p>

<ul>
<li><strong>Bunker Adjustment Factor (BAF) / Low Sulphur Surcharge (LSS):</strong> Penyesuaian biaya bahan bakar kapal berdasarkan regulasi lingkungan IMO 2020 (kandungan sulfur bahan bakar maksimal 0,5%). BAF biasanya diperbarui setiap bulan atau kuartal mengikuti indeks harga minyak bunker maritim global (VLSFO).</li>
<li><strong>Peak Season Surcharge (PSS):</strong> Dikenakan maskapai pelayaran saat lonjakan volume kargo terjadi menjelang hari libur besar internasional (seperti Q3/Q4 menjelang Natal atau Tahun Baru Imlek) saat ruang muat kapal (*space allocation*) terbatas.</li>
<li><strong>General Rate Increase (GRI):</strong> Kenaikan tarif dasar serentak yang diumumkan operator pelayaran pada rute tertentu untuk memulihkan tingkat profitabilitas rute maritim.</li>
<li><strong>War Risk &amp; Piracy Surcharge:</strong> Biaya premi asuransi kapal tambahan untuk kapal yang melintasi zona perairan berisiko tinggi (seperti Laut Merah, Teluk Aden, atau Selat Hormuz).</li>
</ul>

<h2>Kalkulasi angkut laut: FCL vs LCL per Revenue Ton</h2>

<p>Pemilihan skema pengiriman laut menentukan formula perhitungan biaya dasar:</p>

<h3>1. Pengiriman Full Container Load (FCL)</h3>
<p>Biaya FCL ditagihkan per unit kontainer (per box rate), terlepas dari berat aktual kargo (selama tidak melampaui batas muatan maksimum / <em>payload limit</em> kontainer):</p>
<ul>
<li><strong>Kontainer 20ft Dry:</strong> Kapasitas volume ~33 CBM, payload aman ~21–25 Ton. Cocok untuk kargo padat dan berat (seperti semen, rempah giling, arang briket).</li>
<li><strong>Kontainer 40ft Dry / High Cube:</strong> Kapasitas volume ~67–76 CBM, payload aman ~26–28 Ton. Cocok untuk kargo ringan atau bervolume besar (seperti furnitur, garmen, karton kemasan).</li>
</ul>

<h3>2. Pengiriman Less than Container Load (LCL)</h3>
<p>Kargo LCL dikonsolidasikan dalam satu kontainer bersama kargo pengirim lain di Container Freight Station (CFS). Biaya LCL ditagihkan berdasarkan <strong>Revenue Ton (w/m - Weight or Measurement)</strong>, yaitu nilai tertinggi antara berat dalam Metric Ton (1.000 kg) dan volume dalam Cubic Meter (CBM):</p>

$$\text{Revenue Ton (RT)} = \max\left(\frac{\text{Gross Weight (kg)}}{1000}, \text{Total CBM}\right)$$

<p><em>Perhatian untuk LCL:</em> Tarif dasar LCL ocean freight sering kali terlihat sangat murah (bahkan terkadang negatif / zero freight), namun importir akan dibebani biaya penanganan terminal bongkar (CFS unpack fee, destuffing charge, documentation fee) yang signifikan di pelabuhan tujuan.</p>

<h2>Kalkulasi kargo udara: rumus Chargeable Weight IATA TACT</h2>

<p>Untuk pengiriman kargo udara (<a href="https://www.iata.org" target="_blank" rel="noopener noreferrer">IATA Cargo Rules</a>), maskapai menagihkan biaya berdasarkan <strong>Chargeable Weight</strong>, yaitu nilai terbesar antara Berat Aktual (Gross Weight) dan Berat Volumetrik (Volume Weight):</p>

$$\text{Volumetric Weight (kg)} = \frac{\text{Panjang (cm)} \times \text{Lebar (cm)} \times \text{Tinggi (cm)}}{6000}$$

<ul>
<li><strong>Rasio Standar IATA (1:6000):</strong> Digunakan untuk kargo kargo udara reguler (Air Freight). 1 CBM setara dengan 166,67 kg.</li>
<li><strong>Rasio Kurir Ekspres (1:5000):</strong> Banyak digunakan oleh jasa kurir internasional (DHL/FedEx/UPS) untuk kiriman paket ekspres, di mana 1 CBM setara dengan 200 kg.</li>
<li><strong>Kargo Padat/Berat (Dense Cargo):</strong> Jika Berat Aktual (150 kg) &gt; Berat Volumetrik (80 kg), maka Chargeable Weight = <strong>150 kg</strong>.</li>
<li><strong>Kargo Ringan/Ruwah (Voluminous Cargo):</strong> Jika kargo karton ringan berukuran $100 \times 100 \times 120\text{ cm}$ memiliki berat aktual 50 kg, maka Berat Volumetriknya adalah $(100 \times 100 \times 120) / 6000 = 200\text{ kg}$. Chargeable Weight yang ditagih maskapai adalah <strong>200 kg</strong>.</li>
</ul>

<h2>Alokasi tanggung jawab biaya berdasarkan Incoterms 2020</h2>

<p>Klausul kontrak perdagangan (<a href="https://iccwbo.org/resources-for-business/incoterms-rules/" target="_blank" rel="noopener noreferrer">ICC Incoterms 2020</a>) menetapkan secara hukum siapa yang wajib membayar setiap layer biaya logistik:</p>

<table>
<thead>
<tr>
<th>Term Incoterms 2020</th>
<th>Origin Trucking &amp; Origin THC</th>
<th>Export Customs (PEB)</th>
<th>Main Ocean/Air Freight</th>
<th>Marine Cargo Insurance</th>
<th>Destination Charges &amp; Import Duty</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>EXW (Ex Works)</strong></td>
<td>Buyer</td>
<td>Buyer</td>
<td>Buyer</td>
<td>Buyer</td>
<td>Buyer</td>
</tr>
<tr>
<td><strong>FOB (Free on Board)</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td>Buyer</td>
<td>Buyer</td>
<td>Buyer</td>
</tr>
<tr>
<td><strong>CFR (Cost and Freight)</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td>Buyer</td>
<td>Buyer</td>
</tr>
<tr>
<td><strong>CIF (Cost, Insurance &amp; Freight)</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td>Buyer</td>
</tr>
<tr>
<td><strong>DDP (Delivered Duty Paid)</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
<td><strong>Seller</strong></td>
</tr>
</tbody>
</table>

<h2>Simulasi worked example: perbandingan biaya ekspor 1 FCL 20ft (FOB vs CIF)</h2>

<p>Contoh skenario: Pengapalan 1 kontainer 20ft berisi komoditas furnitur (18.000 kg / 28 CBM) dari Tanjung Priok Jakarta ke Port of Hamburg (Jerman).</p>

<table>
<thead>
<tr>
<th>Komponen Biaya Pengiriman</th>
<th>Rincian Biaya (Estimasi USD)</th>
<th>Dibayar Seller (FOB)</th>
<th>Dibayar Seller (CIF)</th>
</tr>
</thead>
<tbody>
<tr>
<td>Trucking Pabrik ke Depo &amp; Priok CY</td>
<td>USD 200</td>
<td>Ya</td>
<td>Ya</td>
</tr>
<tr>
<td>Origin THC Pelindo &amp; Lo-Lo Priok</td>
<td>USD 110</td>
<td>Ya</td>
<td>Ya</td>
</tr>
<tr>
<td>Jasa PPJK &amp; Transmisi PEB CEISA 4.0</td>
<td>USD 75</td>
<td>Ya</td>
<td>Ya</td>
</tr>
<tr>
<td>B/L Fee, VGM, &amp; Seal Kontainer</td>
<td>USD 65</td>
<td>Ya</td>
<td>Ya</td>
</tr>
<tr>
<td><strong>Total Biaya Lokal Asal (Origin Charges)</strong></td>
<td><strong>USD 450</strong></td>
<td><strong>USD 450 (Total FOB)</strong></td>
<td><strong>USD 450</strong></td>
</tr>
<tr>
<td>Base Ocean Freight (Priok - Hamburg)</td>
<td>USD 1.850</td>
<td>Tidak (Buyer)</td>
<td>Ya</td>
</tr>
<tr>
<td>Bunker Surcharge (BAF / IMO 2020)</td>
<td>USD 350</td>
<td>Tidak (Buyer)</td>
<td>Ya</td>
</tr>
<tr>
<td>Asuransi Maritim Kargo (ICC Clause A)</td>
<td>USD 120</td>
<td>Tidak (Buyer)</td>
<td>Ya</td>
</tr>
<tr>
<td><strong>Total Biaya Ditanggung Eksportir</strong></td>
<td>—</td>
<td><strong>USD 450</strong></td>
<td><strong>USD 2.770</strong></td>
</tr>
</tbody>
</table>

<h2>Manajemen risiko biaya tersembunyi: Demurrage, Detention, dan Storage</h2>

<p>Biaya tak terduga di pelabuhan dapat dihindari melalui pemahaman batasan waktu sewa:</p>

<ol>
<li><strong>Demurrage:</strong> Denda harian yang ditagihkan oleh maskapai pelayaran jika kontainer penuh masih berada di dalam area terminal pelabuhan setelah batas waktu bebas sewa (*Free Time*) berakhir.</li>
<li><strong>Detention:</strong> Denda harian jika kontainer kosong terlambat dikembalikan ke depo penumpukan pelayaran setelah dikeluarkan dari pelabuhan untuk proses bongkar barang di gudang.</li>
<li><strong>Port Storage:</strong> Biaya sewa lapangan penumpukan yang ditagihkan langsung oleh operator terminal pelabuhan (Pelindo) atas kontainer yang menginap di container yard.</li>
</ol>

<h2>Checklist 5 langkah audit penawaran biaya logistik (Freight Quotation)</h2>

<ol>
<li><strong>Audit Batas Akhir Masa Berlaku Tarif (Validity Date):</strong> Pastikan penawaran freight mencakup tanggal kesiapan kargo (Cargo Readiness Date) dan tanggal kapal berlayar (ETD).</li>
<li><strong>Verifikasi Klausul Surcharge All-In vs Itemized:</strong> Periksa apakah penawaran ocean freight bersifat <em>All-In</em> (sudah termasuk BAF/CAF) atau masih dikenakan biaya tambahan bahan bakar terpisah.</li>
<li><strong>Konfirmasi Free Time Demurrage &amp; Detention:</strong> Minta forwarder mengonfirmasi minimal 14–21 hari *Combined Free Time* di pelabuhan tujuan untuk mencegah denda keterlambatan pengembalian kontainer.</li>
<li><strong>Hindari Jebakan Zero Freight pada LCL:</strong> Minta forwarder merinci seluruh *Destination Handling Tariff* di negara tujuan sebelum menyetujui kontrak pengiriman LCL.</li>
<li><strong>Klarifikasi Klausul Incoterms 2020:</strong> Cantumkan nama pelabuhan atau titik serah spesifik pada kontrak dagang (misalnya: *CIF Port of Hamburg, Incoterms 2020*).</li>
</ol>

<h2>Kesimpulan</h2>

<p>Pengendalian <strong>biaya pengiriman logistik</strong> menuntut ketelitian analisis terhadap empat layer pembentuk biaya, pemahaman formula penagihan FCL/LCL dan *chargeable weight* IATA, ketegasan klausul alokasi Incoterms 2020, serta verifikasi transparansi biaya penanganan pelabuhan asal dan tujuan.</p>

<p>GMA World menyediakan layanan manajemen logistik perdagangan global yang transparan: konsultasi freight forwarding laut (FCL/LCL) dan udara, optimasi rute pelayaran internasional, penyelesaian administrasi kepabeanan PEB/PIB, serta pendampingan negosiasi *free time demurrage* dengan maskapai pelayaran terkemuka dunia. Seluruh struktur tarif angkut dan biaya kepabeanan aktual tunduk pada fluktuasi pasar maritim, tarif resmi operator terminal pelabuhan, serta regulasi pemerintah yang berlaku.</p>

<h2>Referensi resmi dan regulasi perdagangan</h2>

<ul>
<li><a href="https://www.fmc.gov" target="_blank" rel="noopener noreferrer">Federal Maritime Commission (FMC) — 46 CFR Part 520 Ocean Freight Tariffs &amp; Regulations</a></li>
<li><a href="https://www.iata.org/en/programs/cargo/" target="_blank" rel="noopener noreferrer">International Air Transport Association (IATA) — Air Cargo Tariff Rules (TACT)</a></li>
<li><a href="https://iccwbo.org/resources-for-business/incoterms-rules/" target="_blank" rel="noopener noreferrer">International Chamber of Commerce (ICC) — Incoterms 2020 Official Rules</a></li>
<li><a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">JDIH Kementerian Keuangan — PMK 155/PMK.04/2022 Ketentuan Kepabeanan Ekspor</a></li>
<li><a href="https://jdih.kemenkeu.go.id/dok/71-pmk-03-2022/files" target="_blank" rel="noopener noreferrer">JDIH Kementerian Keuangan — PMK 71/PMK.03/2022 Pajak Pertambahan Nilai Jasa Logistik</a></li>
<li><a href="https://fiata.org" target="_blank" rel="noopener noreferrer">International Federation of Freight Forwarders Associations (FIATA) — Freight Best Practices</a></li>
<li><a href="https://www.insw.go.id" target="_blank" rel="noopener noreferrer">Lembaga National Single Window — Layanan Ekspor Impor &amp; Tarif Kepabeanan</a></li>
</ul>
HTML
,
    ],
];
