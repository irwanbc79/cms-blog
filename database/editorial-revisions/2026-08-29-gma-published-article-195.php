<?php

return [
    'article_id' => 195,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Charter Kapal: Panduan Lengkap Time Charter vs Voyage',
        'slug' => 'charter-kapal-time-charter-vs-voyage',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '13a368463a03d43cd0e288e415772fae4326414a89700c919d03c360f07e1230',
    ],
    'review_notes' => 'GMA ship chartering pillar rebuilt on 2026-08-29 using BIMCO standard charter parties (GENCON 2022, NYPE 2015, BARECON 2017), Indonesian maritime law UU 17/2008 and PP 31/2021 cabotage rules, and international laytime/off-hire jurisprudence. Removes irrelevant tourism news widgets, generic rate claims, promotional promises, and universal contract assumptions. Adds complete cost taxonomy (Capital, OPEX, Voyage, Cargo costs), voyage versus time versus bareboat decision matrix, laytime/demurrage/despatch formula, off-hire triggers and bunker reconciliation (BOD/BOR), cabotage compliance checks in Indonesia, and worked comparative scenario.',
    'changes' => [
        'title' => 'Charter Kapal: Perbedaan Time, Voyage, Bareboat, dan Kontrak BIMCO',
        'focus_keyword' => 'charter kapal',
        'meta_description' => 'Panduan charter kapal kargo: bedakan time charter, voyage charter, bareboat, pembagian biaya OPEX/bunker, klausul BIMCO, serta aturan cabotage Indonesia.',
        'excerpt' => 'Kerangka keputusan memilih time charter, voyage charter, atau bareboat: pembagian biaya operasional, mekanisme laytime/off-hire, dan kepatuhan cabotage.',
        'og_title' => 'Charter Kapal: Perbedaan Time, Voyage, Bareboat, dan Kontrak BIMCO',
        'og_description' => 'Pahami time charter, voyage charter, bareboat, pembagian biaya bunker/port dues, klausul BIMCO, serta mitigasi risiko laytime dan off-hire.',
        'pillar' => 'industri-maritim',
        'tags' => ['charter kapal', 'time charter', 'voyage charter', 'bareboat charter', 'bimco gencon'],
        'hashtags' => ['CharterKapal', 'TimeCharter', 'VoyageCharter', 'BIMCO', 'ShippingContract'],
        'image_alt_texts' => [
            'Kapal kargo curah bersandar di dermaga pelabuhan dalam skema charter kapal',
            'Tim komersial pelayaran meninjau kontrak charter party BIMCO GENCON dan NYPE',
            'Proses bongkar muat material proyek industri pada kapal sewa charter',
        ],
        'schema_faq' => [
            [
                'question' => 'Apa perbedaan mendasar antara time charter, voyage charter, dan bareboat charter?',
                'answer' => 'Pada voyage charter, kapal disewa untuk rute perjalanan tertentu di mana pemilik kapal menanggung biaya operasi dan bahan bakar. Pada time charter, kapal disewa berdasarkan durasi waktu di mana penyewa menanggung biaya bahan bakar dan pelabuhan. Pada bareboat charter, penyewa menyewa lambung kapal kosong dan menanggung seluruh operasional, kru, perawatan, dan asuransi.',
            ],
            [
                'question' => 'Apa itu kontrak standar BIMCO dan mengapa penting dalam charter kapal?',
                'answer' => 'BIMCO (Baltic and International Maritime Council) menyediakan formulir kontrak standar internasional yang teruji secara hukum maritim global, seperti GENCON untuk voyage charter, NYPE untuk time charter, dan BARECON untuk bareboat charter, guna menetapkan hak, kewajiban, dan mitigasi sengketa secara seimbang.',
            ],
            [
                'question' => 'Bagaimana mekanisme laytime, demurrage, dan despatch bekerja pada voyage charter?',
                'answer' => 'Laytime adalah batas waktu yang disepakati untuk pemuatan dan pembongkaran kargo. Jika waktu aktual melampaui laytime, charterer wajib membayar demurrage (kompensasi keterlambatan). Sebaliknya, jika selesai lebih cepat, charterer berhak menerima despatch (insentif penghematan waktu).',
            ],
            [
                'question' => 'Apa yang dimaksud dengan klausul off-hire pada time charter?',
                'answer' => 'Klausul off-hire menangguhkan kewajiban charterer membayar sewa harian (hire) apabila kapal mengalami gangguan teknis, kerusakan mesin, defisiensi kru, atau mogok kerja yang menyebabkan kapal tidak dapat beroperasi secara komersial.',
            ],
        ],
        'content_html' => <<<'HTML'
<p><strong>Charter kapal</strong> (penyewaan kapal niaga) adalah instrumen pengadaan ruang angkut maritim utama untuk kargo curah (<em>bulk cargo</em>), kargo proyek (<em>project cargo</em>), kargo cair (<em>liquid bulk</em>), maupun pengangkutan komoditas industri bervolume besar yang tidak dapat dilayani oleh kapal kontainer reguler (<em>liner service</em>).</p>

<p>Keputusan menyewa kapal bukan sekadar membandingkan tarif sewa harian atau tarif per ton muatan. Pemilihan skema kontrak—antara <em>Voyage Charter</em>, <em>Time Charter</em>, atau <em>Bareboat Charter</em>—secara fundamental memindahkan alokasi biaya bahan bakar, risiko keterlambatan cuaca, kewajiban navigasi, hak manajemen komersial, hingga tanggung jawab hukum atas kargo.</p>

<p>Panduan ini diperbarui pada 29 Agustus 2026 sebagai kerangka kerja komersial dan hukum bagi pemilik kargo, trader, dan manajer logistik dalam mengevaluasi kontrak standar maritim internasional (<a href="https://www.bimco.org" target="_blank" rel="noopener noreferrer">BIMCO</a>), menghitung risiko <em>laytime/off-hire</em>, dan memastikan kepatuhan asas <em>cabotage</em> di wilayah perairan Indonesia.</p>

<h2>Taksonomi pembagian biaya dalam charter kapal</h2>

<p>Untuk menghindari sengketa biaya pasca-pelayaran, pemahaman atas empat kategori struktur biaya perkapalan menjadi prasyarat mutlak:</p>

<table>
<thead>
<tr>
<th>Kategori Biaya</th>
<th>Komponen Pembentuk</th>
<th>Voyage Charter</th>
<th>Time Charter</th>
<th>Bareboat Charter</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>1. Capital Costs</strong></td>
<td>Bunga pinjaman kapal, depresiasi aset, pengembalian modal</td>
<td>Ditanggung Shipowner</td>
<td>Ditanggung Shipowner</td>
<td>Ditanggung Charterer / Owner*</td>
</tr>
<tr>
<td><strong>2. Operating Costs (OPEX)</strong></td>
<td>Gaji &amp; konsumsi kru, asuransi H&amp;M dan P&amp;I, perawatan berkala, suku cadang, pelumas (lube oil)</td>
<td>Ditanggung Shipowner</td>
<td>Ditanggung Shipowner</td>
<td>Ditanggung Charterer</td>
</tr>
<tr>
<td><strong>3. Voyage Costs (VOPOEX)</strong></td>
<td>Bahan bakar kapal (Bunkers / VLSFO / MGO), jasa labuh/tambat (Port Dues), pandu dan tunda (Pilotage/Towage), biaya kanal/terusan</td>
<td>Ditanggung Shipowner</td>
<td>Ditanggung Charterer</td>
<td>Ditanggung Charterer</td>
</tr>
<tr>
<td><strong>4. Cargo Handling Costs</strong></td>
<td>Bongkar muat (Stevedoring), lashing, securing, dunnage, tally</td>
<td>Sesuai Klausul (FILO / FIOST)</td>
<td>Ditanggung Charterer</td>
<td>Ditanggung Charterer</td>
</tr>
</tbody>
</table>

<p><em>*Keterangan: Pada Bareboat Charter murni, kepemilikan aset tetap pada owner, namun pada Bareboat Charter Hire Purchase (BBHP), penyewa mencicil kepemilikan kapal hingga akhir periode kontrak.</em></p>

<h2>Membandingkan tiga skema utama charter kapal</h2>

<h3>1. Voyage Charter (Sewa Berdasarkan Perjalanan)</h3>
<p>Dalam <em>Voyage Charter</em>, pemilik kapal (<em>shipowner</em>) menyediakan kapal dan kru untuk mengangkut muatan dalam jumlah tertentu dari satu atau beberapa pelabuhan muat (POL) ke pelabuhan bongkar (POD). Tarif disepakati dalam bentuk nilai lump-sum atau tarif per metrik ton muatan (<em>freight rate per ton</em>).</p>
<ul>
<li><strong>Karakteristik Utama:</strong> Owner mengendalikan manajemen teknis dan navigasi sekaligus menanggung seluruh biaya operasional dan bahan bakar perjalanan.</li>
<li><strong>Formulir Kontrak Standar:</strong> <a href="https://www.bimco.org/contracts-and-clauses/bimco-contracts/gencon-2022" target="_blank" rel="noopener noreferrer">BIMCO GENCON 2022 (atau GENCON 94)</a> untuk kargo kering umum.</li>
<li><strong>Risiko Kritis Charterer:</strong> Perhitungan <em>Laytime</em> dan denda keterlambatan (<em>Demurrage</em>) di pelabuhan muat dan bongkar.</li>
</ul>

<h3>2. Time Charter (Sewa Berdasarkan Durasi Waktu)</h3>
<p>Dalam <em>Time Charter</em>, penyewa menyewa kapal beserta kru yang kompeten untuk jangka waktu tertentu (misalnya 3 bulan, 1 tahun, atau <em>trip time charter</em> untuk satu rute). Penyewa membayar tarif sewa harian (<em>hire rate per day</em>) dan bebas mengarahkan kapal ke pelabuhan mana pun yang aman (<em>safe port / safe berth</em>).</p>
<ul>
<li><strong>Karakteristik Utama:</strong> Owner bertanggung jawab atas kelaiklautan kapal (<em>seaworthiness</em>), kru, dan perawatan. Charterer mengendalikan rute komersial dan wajib membayar bahan bakar, biaya pelabuhan, serta agen kapal.</li>
<li><strong>Formulir Kontrak Standar:</strong> <a href="https://www.bimco.org/contracts-and-clauses/bimco-contracts/nype-2015" target="_blank" rel="noopener noreferrer">BIMCO NYPE 2015 (New York Produce Exchange)</a> atau Baltime.</li>
<li><strong>Risiko Kritis Charterer:</strong> Biaya tetap berjalan saat kapal mengalami antrean pelabuhan (<em>congestion</em>), kecuali berlaku klausul <em>off-hire</em> akibat kelalaian teknis kapal/kru.</li>
</ul>

<h3>3. Bareboat / Demise Charter (Sewa Lambung Kosong)</h3>
<p>Dalam <em>Bareboat Charter</em>, penyewa menyewa fisik kapal tanpa awak kapal dan tanpa perlengkapan operasional. Charterer bertindak layaknya pemilik sementara kapal (<em>disponent owner</em>), bertanggung jawab merekrut kru, mengasuransikan kapal, melakukan perawatan teknis, dan mengurus perizinan operasional.</p>
<ul>
<li><strong>Formulir Kontrak Standar:</strong> <a href="https://www.bimco.org/contracts-and-clauses/bimco-contracts/barecon-2017" target="_blank" rel="noopener noreferrer">BIMCO BARECON 2017</a>.</li>
<li><strong>Pengguna Ideal:</strong> Perusahaan pelayaran yang ingin memperluas armada tanpa belanja modal awal (CAPEX), atau lembaga pembiayaan maritim.</li>
</ul>

<h2>Mekanisme laytime, demurrage, dan despatch pada voyage charter</h2>

<p>Pada kontrak <em>Voyage Charter</em>, titik kritis penentuan keuntungan terletak pada klausul penanganan waktu di pelabuhan (<em>Port Laytime</em>):</p>

<ol>
<li><strong>Notice of Readiness (NOR):</strong> Pernyataan tertulis dari Nakhoda kapal (<em>Master</em>) bahwa kapal telah tiba di batas pelabuhan, bersandar atau siap sandar, dan siap secara fisik serta dokumen untuk melakukan muat/bongkar. Waktu perhitungan <em>laytime</em> dimulai setelah masa tunggu (<em>turn time</em>) yang ditentukan dalam kontrak terlampaui.</li>
<li><strong>Definisi Hari Kerja Laytime:</strong>
  <ul>
    <li><strong>WWD (Weather Working Days):</strong> Hari kerja di mana cuaca memungkinkan kegiatan bongkar muat secara aman.</li>
    <li><strong>SHINC (Sundays and Holidays Included):</strong> Hari Minggu dan libur resmi tetap dihitung sebagai waktu laytime.</li>
    <li><strong>SHEX (Sundays and Holidays Excluded):</strong> Hari Minggu dan libur resmi tidak memotong jatah laytime kecuali kegiatan operasional tetap berlangsung.</li>
  </ul>
</li>
<li><strong>Demurrage:</strong> Ganti rugi finansial yang wajib dibayarkan oleh charterer kepada shipowner per hari (atau pro-rata) apabila durasi muat/bongkar melebihi total jatah laytime yang disepakati. Prinsip hukum maritim yang berlaku umum adalah <em>"once on demurrage, always on demurrage"</em> (pengecualian hari libur tidak berlaku lagi saat kapal sudah masuk masa demurrage).</li>
<li><strong>Despatch:</strong> Insentif finansial yang dibayarkan shipowner kepada charterer apabila kargo berhasil dimuat atau dibongkar lebih cepat dari jatah laytime. Nilai despatch umumnya disepakati sebesar 50% dari tarif demurrage (<em>despatch half demurrage</em>).</li>
</ol>

<h2>Mekanisme hire, off-hire, dan rekonsiliasi bunker pada time charter</h2>

<p>Pada kontrak <em>Time Charter</em>, tata kelola finansial berpusat pada penyerahan kapal, pembayaran sewa, dan penghentian sementara pembayaran sewa:</p>

<ul>
<li><strong>Pembayaran Hire:</strong> Wajib dibayarkan di muka (<em>in advance</em>) setiap 15 atau 30 hari kalender. Kegagalan pembayaran tepat waktu memberi hak hukum kepada owner untuk menarik kapal (<em>withdrawal of vessel</em>).</li>
<li><strong>Klausul Off-Hire:</strong> Penangguhan kewajiban pembayaran sewa harian dan konsumsi bahan bakar yang ditanggung charterer apabila kapal tidak dapat beroperasi karena:
  <ol>
    <li>Kerusakan mesin, lambung kapal, atau derek kapal (<em>cargo gear failure</em>);</li>
    <li>Kekurangan jumlah atau defisiensi kualifikasi kru kapal;</li>
    <li>Pemogokan awak kapal atau perselisihan ketenagakerjaan internal kapal;</li>
    <li>Pemeriksaan darurat kelas (<em>Port State Control detention</em>) akibat kelalaian owner.</li>
  </ol>
</li>
<li><strong>Bunker on Delivery (BOD) vs. Bunker on Redelivery (BOR):</strong> Charterer membeli sisa bahan bakar di atas kapal saat penyerahan kapal (<em>delivery</em>) sesuai harga pasar yang disepakati, dan owner membeli kembali sisa bahan bakar saat kapal dikembalikan (<em>redelivery</em>). Selisih kuantitas dan harga wajib direkonsiliasi melalui survei independen (<em>bunker survey</em>).</li>
</ul>

<h2>Kepatuhan regulasi cabotage di perairan Indonesia</h2>

<p>Bagi kegiatan pelayaran domestik di Indonesia, pelaksanaan charter kapal wajib tunduk pada <a href="https://peraturan.bpk.go.id/Details/39736/uu-no-17-tahun-2008" target="_blank" rel="noopener noreferrer">UU No. 17 Tahun 2008 tentang Pelayaran</a> dan <a href="https://peraturan.bpk.go.id/Details/161474/pp-no-31-tahun-2021" target="_blank" rel="noopener noreferrer">PP No. 31 Tahun 2021 tentang Penyelenggaraan Bidang Pelayaran</a>:</p>

<ul>
<li><strong>Asas Cabotage:</strong> Angkutan laut dalam negeri wajib dilakukan oleh perusahaan angkutan laut nasional dengan menggunakan kapal berbendera Indonesia serta diawaki oleh awak kapal berkewarganegaraan Indonesia.</li>
<li><strong>Penggunaan Kapal Asing Terbatas (Izin Khusus / PPKA):</strong> Penggunaan kapal asing untuk kegiatan selain angkutan penumpang/barang umum di dalam negeri (misalnya survei migas, dredging, konstruksi anjungan lepas pantai, atau instalasi kabel laut) hanya diizinkan secara terbatas apabila kapal berbendera Indonesia belum tersedia atau belum mencukupi, dengan persetujuan resmi Kementerian Perhubungan RI.</li>
</ul>

<h2>Simulasi perbandingan skema: proyek pengangkutan 15.000 MT material proyek</h2>

<p>Contoh skenario: Pengangkutan 15.000 Metrik Ton kargo material konstruksi dari Pelabuhan Ciwandan ke Pelabuhan Kariangau (Balikpapan). Jarak tempuh: ~1.200 mil laut. Estimasi waktu pelayaran: 5 hari berlayar, estimasi muat 3 hari, estimasi bongkar 3 hari (Total 11 hari tanpa antrean).</p>

<table>
<thead>
<tr>
<th>Parameter Evaluasi</th>
<th>Opsi A: Voyage Charter (Lump-Sum)</th>
<th>Opsi B: Time Charter (Harian)</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Tarif Kontrak</strong></td>
<td>USD 22 per MT (Total USD 330.000)</td>
<td>USD 12.000 / hari</td>
</tr>
<tr>
<td><strong>Biaya Bahan Bakar (Bunkers)</strong></td>
<td>Termasuk dalam tarif kontrak</td>
<td>Ditanggung Charterer (~USD 85.000)</td>
</tr>
<tr>
<td><strong>Biaya Jasa Pelabuhan &amp; Pandu</strong></td>
<td>Termasuk dalam tarif kontrak</td>
<td>Ditanggung Charterer (~USD 35.000)</td>
</tr>
<tr>
<td><strong>Total Biaya Dasar (Skenario Normal 11 Hari)</strong></td>
<td><strong>USD 330.000</strong></td>
<td><strong>USD 252.000</strong> (Hire 132k + Bunker 85k + Port 35k)</td>
</tr>
<tr>
<td><strong>Dampak Jika Terjadi Antrean Pelabuhan 7 Hari</strong></td>
<td>Charterer membayar Demurrage (misal USD 15.000/hari × 7 hari = USD 105.000)</td>
<td>Charterer membayar Hire + Bunker harian tambahan (~USD 14.000/hari × 7 hari = USD 98.000)</td>
</tr>
<tr>
<td><strong>Profil Risiko Finansial</strong></td>
<td>Kepastian total biaya tinggi jika risiko pelabuhan terkendali.</td>
<td>Potensi penghematan biaya lebih tinggi, namun menanggung penuh fluktuasi harga bahan bakar dan risiko keterlambatan cuaca.</td>
</tr>
</tbody>
</table>

<h2>Checklist 5 langkah sebelum menandatangani charter party</h2>

<ol>
<li><strong>Uji Kelaiklautan dan Sertifikasi Kapal (Vetting &amp; Class):</strong> Periksa sertifikat statutoria kapal, status klasifikasi (IACS / BKI), asuransi P&amp;I Club, dan catatan inspeksi PSC (Port State Control).</li>
<li><strong>Perjelas Klausul Deskripsi Kecepatan dan Konsumsi BBM (Speed &amp; Consumption):</strong> Pada time charter, pastikan klausul konsumsi mencantumkan toleransi cuaca (<em>"about .. knots on .. MT fuel oil"</em>) untuk menghindari klaim sepihak atas <em>underperformance</em> kapal.</li>
<li><strong>Tetapkan Batasan Pelabuhan dan Dermaga Aman (Safe Port / Safe Berth):</strong> Pastikan charter party memuat klausul kewajiban menyediakan pelabuhan yang selalu dapat diakses secara terapung (<em>always afloat</em>).</li>
<li><strong>Sinkronisasi Klausul Laytime dengan Kontrak Komersial Barang:</strong> Pastikan durasi laytime dan tarif demurrage pada charter party sejalan dengan kontrak jual-beli barang (<em>Sales Contract / Proforma Invoice</em>) agar tidak terjadi kerugian selisih klaim.</li>
<li><strong>Verifikasi Kepatuhan Asas Cabotage dan Dokumen Keagenan:</strong> Pastikan kapal memenuhi ketentuan bendera dan telah menunjuk agen pelayaran lokal resmi untuk pengurusan Surat Persetujuan Berlayar (SPB / Port Clearance).</li>
</ol>

<h2>Kesimpulan</h2>

<p>Pemilihan skema <strong>charter kapal</strong> harus didasarkan pada analisis mendalam atas karakteristik muatan, durasi proyek, kemampuan mengelola risiko bahan bakar, dan kesiapan operasional di pelabuhan. Pemahaman klausul standar BIMCO dan tata kelola kontrak maritim yang ketat adalah perlindungan utama dari sengketa klaim biaya pelayaran.</p>

<p>GMA World menyediakan asistensi konsultasi charter kapal, pemilihan armada tongkang/tugboat dan kapal kargo curah, perhitungan estimasi laytime/demurrage, serta kepatuhan perizinan keagenan kapal di pelabuhan-pelabuhan strategis Indonesia. Ketersediaan armada, tarif sewa, dan syarat pelayaran aktual selalu tunduk pada negosiasi fixture recap dan penandatanganan charter party resmi.</p>

<h2>Referensi resmi dan standar maritim</h2>

<ul>
<li><a href="https://www.bimco.org/contracts-and-clauses/bimco-contracts/gencon-2022" target="_blank" rel="noopener noreferrer">BIMCO — GENCON 2022 Standard General Voyage Charter Party</a></li>
<li><a href="https://www.bimco.org/contracts-and-clauses/bimco-contracts/nype-2015" target="_blank" rel="noopener noreferrer">BIMCO — NYPE 2015 Time Charter Party Standard</a></li>
<li><a href="https://www.bimco.org/contracts-and-clauses/bimco-contracts/barecon-2017" target="_blank" rel="noopener noreferrer">BIMCO — BARECON 2017 Standard Bareboat Charter Party</a></li>
<li><a href="https://peraturan.bpk.go.id/Details/39736/uu-no-17-tahun-2008" target="_blank" rel="noopener noreferrer">JDIH BPK RI — Undang-Undang No. 17 Tahun 2008 tentang Pelayaran</a></li>
<li><a href="https://peraturan.bpk.go.id/Details/161474/pp-no-31-tahun-2021" target="_blank" rel="noopener noreferrer">JDIH BPK RI — Peraturan Pemerintah No. 31 Tahun 2021 Penyelenggaraan Bidang Pelayaran</a></li>
<li><a href="https://hubla.dephub.go.id" target="_blank" rel="noopener noreferrer">Direktorat Jenderal Perhubungan Laut — Kementerian Perhubungan RI</a></li>
</ul>
HTML
,
    ],
];
