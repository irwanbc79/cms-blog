<?php

return [
    'article_id' => 239,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Transshipment vs Direct Call: Panduan Lengkap Belawan',
        'slug' => 'transshipment-vs-direct-call-belawan-panduan-lengkap',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '171c14549413efcea34cbb9713bb1e64d6c48c2d4e5b63a2003cb1bd4587eddc',
    ],
    'review_notes' => 'GMA Belawan routing pillar rebuilt on 2026-08-28 from UNCTAD liner-connectivity definitions and data, World Bank port-performance methodology, IMO VGM guidance, and Pelindo terminal context. Removes generic superiority claims and replaces them with a date-bound service verification workflow, total-cost and delay-risk model, worked comparison, cargo-specific gates, KPI definitions, and a booking checklist. No route, schedule, transit, rate, terminal, or carrier availability is presented as permanent.',
    'changes' => [
        'title' => 'Transshipment vs Direct Call dari Belawan: Cara Membandingkan',
        'focus_keyword' => 'transshipment vs direct call',
        'meta_description' => 'Bandingkan transshipment vs direct call dari Belawan memakai jadwal aktual, total biaya, risiko koneksi, handling, free time, kebutuhan cargo, dan simulasi.',
        'excerpt' => 'Kerangka memilih layanan direct atau transshipment dari Belawan berdasarkan service string, jadwal, biaya total, risiko koneksi, dan karakter muatan.',
        'og_title' => 'Transshipment vs Direct Call dari Belawan: Cara Membandingkan',
        'og_description' => 'Gunakan matriks layanan, biaya, waktu, risiko koneksi, dan cargo gate untuk memilih rute peti kemas dari Belawan secara terukur.',
        'pillar' => 'logistik-maritim',
        'tags' => ['transshipment vs direct call', 'Belawan', 'container shipping', 'liner service', 'transit time'],
        'hashtags' => ['Transshipment', 'DirectCall', 'Belawan', 'ContainerShipping', 'LinerService'],
        'image_alt_texts' => [
            'Perbandingan rute peti kemas direct call dan transshipment dari Pelabuhan Belawan',
            'Tim logistik mengevaluasi jadwal kapal, hub transit, biaya, dan risiko koneksi peti kemas',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah direct call berarti kapal tidak singgah di pelabuhan lain?',
                'answer' => 'Tidak. Dalam konteks konektivitas liner, direct service berarti peti kemas tidak perlu dipindahkan ke kapal lain. Kapal tetap dapat singgah di beberapa pelabuhan dalam service string sebelum mencapai tujuan.',
            ],
            [
                'question' => 'Apakah transshipment selalu lebih lambat?',
                'answer' => 'Tidak selalu. Hasilnya bergantung pada frekuensi feeder, jadwal mother vessel, buffer koneksi, congestion, rollover, dan perubahan jaringan. Bandingkan jadwal aktual per service dan tanggal keberangkatan, bukan label rutenya saja.',
            ],
            [
                'question' => 'Data apa yang diperlukan untuk membandingkan dua rute?',
                'answer' => 'Gunakan POL/POD dan terminal, service string, vessel/voyage, ETD/ETA, cut-off, jumlah transshipment, hub, minimum connection time, freight dan local charges, free time, penerimaan jenis cargo, serta rekam kinerja layanan.',
            ],
            [
                'question' => 'Pilihan mana yang lebih aman untuk reefer atau dangerous goods?',
                'answer' => 'Tidak ada jawaban universal. Periksa penerimaan carrier dan pelabuhan transit, ketersediaan plug serta monitoring reefer, segregation, dokumen dangerous goods, waktu koneksi, emergency contact, dan contingency plan untuk shipment aktual.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Memilih transshipment atau direct call dari Belawan tidak dapat diputuskan dari tarif ocean freight atau angka transit time pada satu quotation. Keputusan yang benar membandingkan service string, frekuensi, waktu koneksi, jumlah handling, cut-off, free time, penerimaan cargo, biaya lokal, dan dampak keterlambatan pada bisnis.</p>

<p>Jadwal pelayaran adalah data dinamis. Carrier dapat mengubah vessel, voyage, port rotation, hub, terminal, atau bahkan membatalkan sailing. Karena itu, artikel ini tidak menyatakan bahwa suatu tujuan selalu memiliki direct call dari Belawan. Setiap pilihan harus diverifikasi pada carrier atau forwarder untuk tanggal, cargo, dan container tertentu sebelum booking.</p>

<h2>Definisi yang sering disalahpahami</h2>

<p>Menurut penjelasan <a href="https://unctad.org/news/ports-global-liner-shipping-network-understanding-their-position-connectivity-and-changes-over" target="_blank" rel="noopener noreferrer">UN Trade and Development tentang jaringan liner</a>, direct service berarti container tidak memerlukan transshipment. Kapal boleh singgah di pelabuhan lain sepanjang container tetap berada pada kapal yang sama. Jadi, direct call tidak identik dengan non-stop voyage.</p>

<p>Pada rute transshipment, container dibongkar dari kapal pertama di hub, menunggu koneksi, lalu dimuat ke kapal berikutnya. Satu shipment dapat memiliki satu atau lebih hub. Setiap perpindahan menambah interface antara carrier, terminal, vessel, jadwal, stowage plan, dan dokumen, tetapi juga membuka akses ke jaringan tujuan yang tidak dilayani langsung.</p>

<table>
<thead><tr><th>Aspek</th><th>Direct service</th><th>Transshipment service</th></tr></thead>
<tbody>
<tr><td>Pemindahan antar-kapal</td><td>Tidak ada untuk container tersebut</td><td>Satu atau lebih, sesuai service string</td></tr>
<tr><td>Jumlah interface terminal</td><td>Lebih sedikit</td><td>Lebih banyak karena ada hub</td></tr>
<tr><td>Cakupan tujuan</td><td>Terbatas pada jaringan direct yang tersedia</td><td>Dapat menjangkau jaringan yang lebih luas</td></tr>
<tr><td>Risiko koneksi</td><td>Tidak ada risiko missed connection antar-kapal</td><td>Tergantung buffer, jadwal, congestion, dan rollover</td></tr>
<tr><td>Frekuensi</td><td>Dapat lebih rendah atau lebih tinggi; harus dicek</td><td>Dapat memperoleh lebih banyak pilihan melalui hub; harus dicek</td></tr>
<tr><td>Kecocokan cargo</td><td>Tergantung penerimaan carrier dan vessel</td><td>Harus diterima pada seluruh leg dan hub transit</td></tr>
</tbody>
</table>

<h2>Konteks Belawan: gunakan data layanan, bukan asumsi</h2>

<p>Pelindo telah menempatkan Belawan New Container Terminal sebagai bagian pengembangan konektivitas di Selat Malaka, termasuk sasaran peningkatan direct call. Informasi tersebut memberi konteks strategis, bukan bukti bahwa setiap lane memiliki direct service saat ini. Periksa perkembangan terminal melalui <a href="https://pelindo.co.id/media/426/pelindo-dan-konsorsium-ina-dpworld-capai-momen-penting-dalam-mentransformasi-belawan-new-container-terminal-menjadi-pintu-gerbang-maritim" target="_blank" rel="noopener noreferrer">informasi resmi Pelindo mengenai BNCT</a> dan konfirmasi operasional aktual kepada terminal serta carrier.</p>

<p>Sebelum membandingkan quotation dari Belawan, samakan basisnya: origin terminal, destination terminal, container type, commodity, gross weight, dangerous-goods status, temperature setting, cut-off, ETD, ETA, service name, vessel/voyage, port rotation, jumlah transshipment, hub, serta included dan excluded charges. Tanpa basis yang sama, pilihan termurah sering hanya terlihat murah karena sebagian biaya belum dimasukkan.</p>

<h2>Sepuluh variabel pembanding</h2>

<h3>1. Service string dan jumlah handoff</h3>

<p>Minta urutan pelabuhan dan vessel untuk seluruh perjalanan. Catat apakah container tetap pada kapal yang sama atau berpindah. Untuk transshipment, minta nama hub, estimated arrival feeder, estimated departure connecting vessel, dan connection buffer. Istilah “via Singapore” atau “via Port Klang” belum cukup tanpa service dan voyage.</p>

<h3>2. Transit time dengan titik awal dan akhir yang sama</h3>

<p>Pastikan angka dihitung dari terminal departure ke terminal arrival, atau dari gate-in ke availability, secara konsisten. Transit time pemasaran dapat tidak memasukkan waktu sebelum loading, dwell di hub, customs hold, atau waktu sampai container tersedia di tujuan. Tuliskan definisi setiap angka pada comparison sheet.</p>

<h3>3. Frekuensi dan recovery option</h3>

<p>Satu direct sailing yang cepat tetapi jarang belum tentu cocok untuk produksi rutin. Layanan transshipment dengan beberapa koneksi mungkin memiliki recovery option lebih baik ketika satu sailing terlewat, tetapi hanya jika space dan koneksi berikutnya tersedia. Bandingkan jumlah sailing per minggu dan pilihan recovery yang benar-benar dapat dibooking.</p>

<h3>4. Schedule reliability dan port performance</h3>

<p><a href="https://www.worldbank.org/en/topic/transport/publication/cppi-2024" target="_blank" rel="noopener noreferrer">Container Port Performance Index dari World Bank</a> berfokus pada waktu kapal berada di pelabuhan. Data tersebut berguna sebagai konteks performa node, tetapi keputusan shipment harus memakai data lane, service, carrier, dan periode yang lebih spesifik. Skor port tidak menjamin container tertentu tersambung tepat waktu.</p>

<h3>5. Total logistics cost</h3>

<p>Gabungkan ocean freight, origin charges, destination charges, transshipment-related charge bila ada, documentation, seal, VGM service, lift-on/lift-off, trucking, storage, demurrage, detention, reefer electricity, inspection, insurance, dan biaya pembiayaan inventory. Tandai mata uang, kurs, validitas, pajak, serta biaya yang dibayar shipper atau consignee.</p>

<h3>6. Free time dan pola dwell</h3>

<p>Free time di origin, hub, dan destination tidak selalu mempunyai mekanisme yang sama. Tanyakan kapan perhitungan dimulai, hari kalender atau hari kerja, apakah demurrage dan detention digabung, serta apa yang terjadi ketika keterlambatan disebabkan perubahan jadwal carrier. Jawaban harus muncul pada quotation atau terms, bukan hanya percakapan informal.</p>

<h3>7. Cargo handling risk</h3>

<p>Transshipment menambah kegiatan discharge, yard movement, dan loading. Itu tidak berarti cargo pasti rusak, tetapi jumlah interface bertambah. Untuk fragile cargo, over-gauge, flexitank, high-value cargo, atau unit dengan lashing khusus, periksa penerimaan setiap vessel dan terminal serta bukti kondisi container sebelum gate-in.</p>

<h3>8. Reefer continuity</h3>

<p>Untuk reefer, periksa set point, ventilation, humidity bila relevan, pre-trip inspection, plug availability, monitoring, alarm escalation, genset saat inland movement, dan contingency ketika koneksi terlewat. Transit time pendek tidak cukup bila rantai monitoring atau respons alarm tidak jelas.</p>

<h3>9. Dangerous-goods acceptance</h3>

<p>Dangerous goods harus diterima pada setiap leg, vessel, terminal, dan port transit. Periksa UN number, proper shipping name, class, packing group, marine pollutant status, packaging, marking, declaration, segregation, dan batas kuantitas. Persetujuan satu leg tidak otomatis berlaku untuk seluruh perjalanan.</p>

<h3>10. VGM dan data container</h3>

<p><a href="https://www.imo.org/en/ourwork/safety/pages/verification-of-the-gross-mass.aspx" target="_blank" rel="noopener noreferrer">IMO menjelaskan kewajiban verified gross mass</a>: shipper bertanggung jawab menyediakan VGM dalam shipping document cukup awal agar dapat dipakai master dan terminal dalam stowage plan. VGM adalah syarat pemuatan, tetapi bukan hak otomatis untuk dimuat. Perpindahan di hub tidak menghapus kebutuhan konsistensi data container, seal, weight, dan dokumen.</p>

<h2>Comparison sheet sebelum booking</h2>

<table>
<thead><tr><th>Data</th><th>Opsi A</th><th>Opsi B</th><th>Bukti yang diminta</th></tr></thead>
<tbody>
<tr><td>Service dan routing</td><td>Isi nama service</td><td>Isi nama service</td><td>Carrier schedule atau booking proposal bertanggal</td></tr>
<tr><td>Vessel/voyage</td><td>Isi</td><td>Isi</td><td>Booking confirmation</td></tr>
<tr><td>Transshipment</td><td>Jumlah dan hub</td><td>Jumlah dan hub</td><td>Full service string</td></tr>
<tr><td>Cut-off dan ETD</td><td>Tanggal/jam</td><td>Tanggal/jam</td><td>Terminal/carrier notice</td></tr>
<tr><td>ETA dan basis transit</td><td>Isi definisi</td><td>Isi definisi</td><td>Schedule dengan titik awal/akhir</td></tr>
<tr><td>Connection buffer</td><td>N/A atau jam/hari</td><td>N/A atau jam/hari</td><td>Feeder dan connecting voyage</td></tr>
<tr><td>Total quoted cost</td><td>Nilai dan currency</td><td>Nilai dan currency</td><td>Breakdown included/excluded</td></tr>
<tr><td>Free time</td><td>Hari dan ketentuan</td><td>Hari dan ketentuan</td><td>Carrier terms</td></tr>
<tr><td>Cargo acceptance</td><td>Accepted/conditional</td><td>Accepted/conditional</td><td>Written confirmation</td></tr>
<tr><td>Recovery plan</td><td>Alternatif berikutnya</td><td>Alternatif berikutnya</td><td>Space dan cut-off aktual</td></tr>
</tbody>
</table>

<h2>Simulasi biaya dan risiko keterlambatan</h2>

<p>Contoh berikut hanya menunjukkan metode. Angka bukan tarif Belawan dan tidak boleh dipakai untuk quotation.</p>

<table>
<thead><tr><th>Asumsi</th><th>Direct</th><th>Transshipment</th></tr></thead>
<tbody>
<tr><td>Biaya dasar yang sudah disamakan scope</td><td>USD 1.850</td><td>USD 1.650</td></tr>
<tr><td>Probabilitas keterlambatan material</td><td>18%</td><td>30%</td></tr>
<tr><td>Rata-rata hari dampak jika terlambat</td><td>3 hari</td><td>4 hari</td></tr>
<tr><td>Dampak bisnis per hari</td><td>USD 200</td><td>USD 200</td></tr>
<tr><td>Expected delay cost</td><td>18% × 3 × 200 = USD 108</td><td>30% × 4 × 200 = USD 240</td></tr>
<tr><td>Biaya terukur setelah risiko</td><td>USD 1.958</td><td>USD 1.890</td></tr>
</tbody>
</table>

<p>Dalam simulasi ini, transshipment masih lebih rendah USD 68. Namun selisih expected delay exposure adalah 0,66 hari. Titik impas dampak bisnis sekitar USD 303 per hari: di atas angka tersebut, direct menjadi lebih rendah menurut asumsi contoh. Ganti seluruh input dengan data shipment sendiri, lalu lakukan sensitivity test untuk delay dua, empat, dan tujuh hari.</p>

<p>Probabilitas tidak boleh dibuat berdasarkan perasaan. Ambil histori minimal per service, lane, carrier, musim, dan rentang waktu yang relevan. Pisahkan delay karena late gate-in, rollover, vessel schedule, congestion, customs hold, dokumen, dan consignee agar tindakan perbaikannya tepat.</p>

<h2>Pola keputusan berdasarkan cargo</h2>

<ul>
<li><strong>Spare part penghenti produksi:</strong> utamakan probabilitas tiba sesuai required-on-site date, recovery option, dan visibility; biaya freight bukan satu-satunya driver.</li>
<li><strong>Barang reguler dengan safety stock:</strong> transshipment dapat dipertimbangkan bila total biaya dan variasi waktu masih berada dalam buffer inventory.</li>
<li><strong>Reefer:</strong> utamakan kesinambungan plug, monitoring, alarm response, dan acceptance seluruh leg.</li>
<li><strong>Dangerous goods:</strong> pilih hanya rute dengan acceptance tertulis pada vessel, hub, dan terminal terkait.</li>
<li><strong>High-value atau fragile:</strong> bandingkan tambahan handoff, insurance terms, survey, seal control, dan claim procedure.</li>
<li><strong>Over-gauge atau project cargo:</strong> verifikasi slot, lifting, lashing, terminal capability, dan persetujuan setiap leg sebelum menilai harga.</li>
</ul>

<h2>KPI setelah shipment berjalan</h2>

<table>
<thead><tr><th>KPI</th><th>Definisi</th><th>Catatan</th></tr></thead>
<tbody>
<tr><td>On-time departure</td><td>Actual departure dibanding committed departure</td><td>Gunakan toleransi yang ditetapkan di awal</td></tr>
<tr><td>Connection success</td><td>Container naik connecting vessel yang direncanakan</td><td>Khusus transshipment</td></tr>
<tr><td>Rollover rate</td><td>Booking atau container dipindah ke sailing berikutnya</td><td>Pisahkan sebab carrier dan shipper</td></tr>
<tr><td>Total transit variance</td><td>Actual availability dikurangi committed availability</td><td>Lebih relevan daripada ETA kapal saja</td></tr>
<tr><td>Cost variance</td><td>Final cost dikurangi approved estimate</td><td>Jelaskan per item</td></tr>
<tr><td>Exception response time</td><td>Waktu kejadian sampai opsi pemulihan disampaikan</td><td>Ukur kualitas koordinasi</td></tr>
</tbody>
</table>

<h2>Checklist go, hold, atau stop</h2>

<ol>
<li>POL, POD, terminal, service, vessel/voyage, dan routing sudah tertulis.</li>
<li>Direct service telah diverifikasi berarti tanpa perpindahan container, bukan diasumsikan non-stop.</li>
<li>Untuk transshipment, hub, connecting vessel, dan buffer koneksi tersedia.</li>
<li>Cut-off, ETD, ETA, serta basis transit time menggunakan versi dan tanggal yang sama.</li>
<li>Freight dan seluruh local charges dibandingkan dengan scope identik.</li>
<li>Free time, demurrage, detention, storage, dan konsekuensi rollover dipahami.</li>
<li>Container type, weight, VGM, commodity, reefer, DG, dan over-gauge diterima tertulis.</li>
<li>Required delivery date dan biaya keterlambatan telah dimasukkan ke model.</li>
<li>Recovery option dan jalur eskalasi tersedia bila koneksi atau sailing gagal.</li>
<li>Booking confirmation direkonsiliasi terhadap quotation sebelum stuffing dan gate-in.</li>
</ol>

<p>Gunakan <strong>go</strong> bila data, acceptance, biaya, dan buffer memenuhi kebutuhan. Gunakan <strong>hold</strong> bila masih ada data yang dapat ditutup sebelum cut-off. Gunakan <strong>stop</strong> ketika cargo tidak diterima, kewenangan atau biaya tidak jelas, atau jadwal tidak dapat memenuhi batas bisnis dengan risiko yang disetujui.</p>

<h2>Kesimpulan</h2>

<p>Direct call mengurangi perpindahan antar-kapal, tetapi tidak otomatis paling cepat, paling sering, atau paling murah. Transshipment memperluas konektivitas, tetapi menambah titik koneksi dan handling. Pilihan terbaik dari Belawan adalah layanan yang memenuhi cargo gate, required delivery date, total cost, dan toleransi risiko berdasarkan service aktual.</p>

<p>GMA World dapat membantu menyusun comparison sheet dari quotation dan jadwal yang tersedia. Rekomendasi final baru dapat diberikan setelah routing, vessel/voyage, acceptance cargo, biaya, free time, dan recovery option dikonfirmasi untuk tanggal shipment.</p>

<h2>Referensi utama</h2>

<ul>
<li><a href="https://unctad.org/news/ports-global-liner-shipping-network-understanding-their-position-connectivity-and-changes-over" target="_blank" rel="noopener noreferrer">UNCTAD — Ports in the global liner shipping network</a></li>
<li><a href="https://unctadstat.unctad.org/insights/theme/246" target="_blank" rel="noopener noreferrer">UNCTAD Data Hub — Liner Shipping Connectivity Index</a></li>
<li><a href="https://www.worldbank.org/en/topic/transport/publication/cppi-2024" target="_blank" rel="noopener noreferrer">World Bank — Container Port Performance Index 2020–2024</a></li>
<li><a href="https://www.imo.org/en/ourwork/safety/pages/verification-of-the-gross-mass.aspx" target="_blank" rel="noopener noreferrer">IMO — Verification of the gross mass of a packed container</a></li>
<li><a href="https://pelindo.co.id/media/426/pelindo-dan-konsorsium-ina-dpworld-capai-momen-penting-dalam-mentransformasi-belawan-new-container-terminal-menjadi-pintu-gerbang-maritim" target="_blank" rel="noopener noreferrer">Pelindo — Pengembangan Belawan New Container Terminal</a></li>
</ul>
HTML,
    ],
];
