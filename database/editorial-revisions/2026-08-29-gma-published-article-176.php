<?php

return [
    'article_id' => 176,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Demurrage dan Detention: Panduan Lengkap 7 Cara Hemat',
        'slug' => 'demurrage-dan-detention-7-cara-hemat',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '434e2b36689e480d76b1ca3a009e34aa08031e07ab49f6945a78b716b69cb76b',
    ],
    'review_notes' => 'GMA demurrage-and-detention pillar rebuilt on 2026-08-29 using current carrier terms, Maersk Indonesia local information, CMA CGM Indonesia July 2026 tariff advisory, PMK 155/PMK.04/2022, and the current FMC post-court-decision billing status as a clearly labelled US-jurisdiction example. Removes universal definitions, generic one-day buffer, unrelated old news, guaranteed savings, repetitive CTA blocks, false claims that D&D is always avoidable, and mixing of carrier equipment charges with terminal storage. Adds split/combined clocks, import/export events, tariff-version controls, progressive-tier calculation, hypothetical invoice reconciliation, cost ownership, dispute evidence, exceptions, KPIs, and official references.',
    'changes' => [
        'title' => 'Demurrage, Detention, dan Storage: Cara Hitung dan Kontrol',
        'focus_keyword' => 'demurrage dan detention',
        'meta_description' => 'Bedakan demurrage, detention, dan storage; pahami free time, event clock, progressive tier, combined tariff, serta audit tagihan per kontainer.',
        'excerpt' => 'Kerangka operasional untuk membaca free time, menghitung tier biaya, menetapkan cost owner, dan menyiapkan bukti dispute demurrage–detention.',
        'og_title' => 'Demurrage, Detention, dan Storage: Cara Hitung dan Kontrol',
        'og_description' => 'Gunakan event clock, tariff version, container register, dan invoice reconciliation untuk mengendalikan biaya penggunaan peti kemas.',
        'pillar' => 'logistik',
        'tags' => ['demurrage dan detention', 'container free time', 'terminal storage', 'logistics cost', 'container detention'],
        'hashtags' => ['Demurrage', 'Detention', 'ContainerFreeTime', 'LogisticsCost'],
        'image_alt_texts' => [
            'Timeline demurrage detention dan storage dari discharge hingga empty return',
            'Tim logistik merekonsiliasi free time dan tarif progresif per kontainer',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah demurrage selalu terjadi di terminal dan detention selalu di luar terminal?',
                'answer' => 'Itu definisi yang sering dipakai pada tarif split, tetapi tidak universal. Carrier dapat memakai combined demurrage and detention dengan satu clock dari event awal hingga pengembalian empty. Selalu gunakan definisi, lokasi, dan event pada tariff sheet atau service contract shipment.',
            ],
            [
                'question' => 'Apakah terminal storage sama dengan demurrage?',
                'answer' => 'Tidak selalu. Storage membayar penggunaan ruang terminal atau depot, sedangkan demurrage/detention umumnya terkait penggunaan equipment carrier. Pada sebagian setup storage ditagih terpisah oleh terminal; pada setup lain komponen dapat digabung. Periksa siapa penerbit invoice dan dasar tarifnya.',
            ],
            [
                'question' => 'Bagaimana menghitung chargeable days?',
                'answer' => 'Tentukan start event, end event, aturan hari inklusif, calendar atau working days, free time, serta tier. Chargeable days kemudian dialokasikan ke masing-masing slab sesuai metode progresif atau ketentuan kontrak. Jangan menghitung hanya dari ETA dan tanggal invoice.',
            ],
            [
                'question' => 'Apakah gangguan terminal otomatis menghapus tagihan?',
                'answer' => 'Tidak otomatis. Hak waiver atau mitigation bergantung pada kontrak, tariff rule, yurisdiksi, bukti bahwa equipment tidak dapat digunakan atau dikembalikan, serta prosedur dispute. Simpan outage notice, screenshot appointment, gate record, correspondence, dan timeline per kontainer.',
            ],
        ],
        'content_html' => <<<'HTML'
<p><strong>Demurrage dan detention</strong> tidak dapat dihitung hanya dengan rumus “hari terlambat × tarif harian”. Tim harus mengetahui siapa pemilik equipment, apakah tarif split atau combined, event yang memulai dan menghentikan clock, jenis hari, free time, tier, container type, serta versi tarif atau service contract.</p>

<p>Kesalahan paling umum adalah mencampur tiga biaya: penggunaan container milik carrier, penggunaan ruang terminal, dan layanan operasional lain. Akibatnya, perusahaan membandingkan tagihan yang basisnya berbeda atau menggugat invoice tanpa bukti event.</p>

<p>Panduan ini diperbarui pada 29 Agustus 2026. Angka free time dan tarif sengaja tidak dijadikan patokan permanen karena carrier dapat mengubahnya berdasarkan trade, lokasi, equipment, price calculation date, kontrak, dan periode.</p>

<h2>Tiga biaya yang harus dipisahkan</h2>

<p><a href="https://terms.maersk.com/dnd" target="_blank" rel="noopener noreferrer">Maersk D&amp;D Terms</a> memberi contoh definisi operasional: demurrage untuk penggunaan container carrier di dalam terminal/port/depot setelah free time, detention untuk penggunaan di luar area tersebut, dan storage untuk penggunaan fasilitas terminal atau depot. Carrier juga dapat memakai combined demurrage and detention untuk periode gabungan di dalam dan di luar terminal.</p>

<table>
<thead><tr><th>Komponen</th><th>Objek biaya</th><th>Data utama</th></tr></thead>
<tbody>
<tr><td>Demurrage</td><td>Equipment carrier di area yang ditentukan tariff</td><td>Gate/discharge/load event, free days, equipment type</td></tr>
<tr><td>Detention</td><td>Equipment carrier di luar terminal/depot</td><td>Empty release, full gate-in, full gate-out, empty return</td></tr>
<tr><td>Storage</td><td>Ruang/fasilitas terminal, port, atau depot</td><td>Terminal event, tariff operator, occupancy days</td></tr>
<tr><td>Combined D&amp;D</td><td>Equipment carrier sepanjang satu periode gabungan</td><td>Start–end event tunggal dan combined free time</td></tr>
</tbody>
</table>

<p>Nama biaya pada invoice tidak cukup. Baca definisi dan application period. Pada <a href="https://www.maersk.com/local-information/asia-pacific/indonesia/export" target="_blank" rel="noopener noreferrer">informasi ekspor Indonesia Maersk</a>, setup ekspor dijelaskan sebagai split demurrage dan detention, sedangkan demurrage ekspor dikumpulkan terminal. Untuk impor tertentu, carrier dapat memakai combined D&amp;D. Ini membuktikan bahwa satu diagram tidak berlaku untuk semua shipment.</p>

<h2>Petakan clock impor dan ekspor</h2>

<table>
<thead><tr><th>Flow</th><th>Event yang perlu dicatat</th><th>Risiko utama</th></tr></thead>
<tbody>
<tr><td>Impor</td><td>Discharge, availability, customs/DO ready, full gate-out, empty gate-in</td><td>Combined clock, terminal storage, empty-return restriction</td></tr>
<tr><td>Ekspor</td><td>Empty gate-out, stuffing, full gate-in, load/on-board, rollover</td><td>Detention sebelum gate-in, demurrage karena early gate-in/rollover</td></tr>
</tbody>
</table>

<p>ETA bukan start event yang aman untuk semua perhitungan. Import combined D&amp;D dapat dimulai pada discharge; export detention dapat dimulai saat empty container keluar depot; export demurrage dapat dimulai saat full container masuk terminal. Periksa apakah hari pertama dan terakhir dihitung secara inklusif.</p>

<h2>Gate 1: kunci tariff version sebelum booking</h2>

<p>Buat tariff snapshot yang menyimpan:</p>

<ul>
<li>carrier/issuer, service contract atau tariff reference;</li>
<li>trade, origin, destination, terminal, dan depot;</li>
<li>import/export serta split atau combined model;</li>
<li>dry, reefer, dangerous, special, 20/40/45 foot;</li>
<li>start event, end event, calendar/working day, inclusion rule;</li>
<li>free time, tier/slab, currency, tax, dan effective/price calculation date;</li>
<li>storage, plug-in, monitoring, lift-on/off, atau surcharge terpisah;</li>
<li>tautan sumber, tanggal unduh, approver, dan expiry review.</li>
</ul>

<p>Perubahan bukan teori. <a href="https://www.cma-cgm.com/assets/public/documents/01%20Customer%20Advisory_Adjustment%20of%20Demurrage%20%26%20Detention%20Tariffs.pdf" target="_blank" rel="noopener noreferrer">CMA CGM Indonesia advisory 6 Juni 2026</a> mengubah tier terakhir combined D&amp;D untuk beberapa brand, efektif 1 Juli 2026. Karena itu, spreadsheet tanpa effective date tidak layak menjadi basis accrual atau quotation.</p>

<h2>Gate 2: buat container-level clock register</h2>

<p>Satu shipment dapat memiliki beberapa container dengan event berbeda. Register minimum harus memuat:</p>

<ul>
<li>booking, B/L, container, seal, equipment type, dan owner;</li>
<li>vessel/voyage, ETA/ETD, actual discharge/load;</li>
<li>availability, customs/DO ready, gate-out, delivery, unloading, empty return;</li>
<li>last free day per charge type;</li>
<li>appointment attempts, terminal closure, depot refusal, dan hold reason;</li>
<li>estimated accrued, invoiced amount, cost owner, dispute, dan recovery status.</li>
</ul>

<p>Gunakan actual event dari carrier, terminal, depot, EIR, dan gate record. Jangan menutup clock hanya karena truk tiba di depot; empty return selesai ketika equipment diterima sesuai prosedur yang berlaku.</p>

<h2>Cara menghitung tarif bertingkat</h2>

<p>Contoh hipotetis: combined free time lima calendar days. Clock dihitung inklusif dari discharge sampai empty gate-in. Container discharge 2 Agustus dan empty kembali 13 Agustus, sehingga total penggunaan menurut asumsi ini 12 hari. Setelah lima free days, terdapat tujuh chargeable days.</p>

<p>Jika tier pertama berlaku untuk hari ke-6 sampai ke-10 dan tier kedua untuk hari ke-11 sampai ke-15, alokasikan lima hari ke tier pertama dan dua hari ke tier kedua. Rumusnya:</p>

<p><strong>Total = (5 × tarif tier 1) + (2 × tarif tier 2)</strong></p>

<p>Jangan mengalikan seluruh tujuh hari dengan tarif tier terakhir kecuali aturan menyatakan metode non-progresif tersebut. Sebaliknya, extended free time juga tidak selalu membuat hitungan tier kembali ke tier pertama. <a href="https://www.maersk.com/news/articles/2021/01/20/indonesia-export-detention-calculation-revision" target="_blank" rel="noopener noreferrer">Maersk Indonesia</a> pernah menjelaskan metode progresif untuk export detention setelah extended free time; kontrak aktual tetap menjadi sumber keputusan.</p>

<h2>Gate 3: rencanakan last free day, bukan sekadar ETA</h2>

<table>
<thead><tr><th>Milestone</th><th>Owner</th><th>Escalation trigger</th></tr></thead>
<tbody>
<tr><td>Pre-arrival documents/permit</td><td>Compliance/PPJK</td><td>Belum ready sebelum ETA threshold internal</td></tr>
<tr><td>Delivery order/payment</td><td>Finance/documentation</td><td>Hold belum tertutup sebelum availability</td></tr>
<tr><td>Trucking appointment</td><td>Transport</td><td>Tidak ada slot sebelum last free day</td></tr>
<tr><td>Warehouse unloading</td><td>Warehouse</td><td>Labor/equipment/space belum confirmed</td></tr>
<tr><td>Empty return</td><td>Transport/depot desk</td><td>Depot menolak atau return location berubah</td></tr>
</tbody>
</table>

<p>Buffer satu hari bukan kebijakan universal. Reefer, special equipment, pemeriksaan, akhir pekan, antrean terminal, dan jarak depot memerlukan buffer berbeda. Gunakan probabilistic plan: best case, committed plan, dan exception deadline.</p>

<h2>Gate 4: tetapkan cost owner sebelum biaya muncul</h2>

<p>Incoterms saja tidak selalu menjawab siapa membayar D&amp;D. Tetapkan dalam kontrak atau SOP:</p>

<ul>
<li>siapa memilih carrier dan menegosiasikan free time;</li>
<li>siapa menyediakan dokumen, dana, izin, trucking, gudang, dan empty return;</li>
<li>event apa yang memindahkan tanggung jawab;</li>
<li>bagaimana biaya akibat buyer, seller, carrier, terminal, customs hold, atau force majeure dialokasikan;</li>
<li>siapa berwenang meminta extension, waiver, mitigation, atau dispute;</li>
<li>bukti dan batas waktu untuk meneruskan biaya kepada pihak yang bertanggung jawab.</li>
</ul>

<p>Forwarder tidak otomatis menjadi penanggung seluruh biaya hanya karena mengoordinasikan shipment. Namun forwarder juga tidak boleh meneruskan invoice tanpa tariff basis, event evidence, dan rekonsiliasi.</p>

<h2>Gate 5: audit invoice sebelum dibayar</h2>

<ol>
<li>Cocokkan issuer, billed party, shipment, B/L, dan container.</li>
<li>Verifikasi tariff/service-contract version serta effective date.</li>
<li>Cocokkan start/end event dengan terminal, carrier, depot, dan EIR.</li>
<li>Periksa free time, hari inklusif, calendar/working days, dan extension.</li>
<li>Hitung ulang setiap tier, equipment, currency, tax, dan surcharge.</li>
<li>Pastikan storage atau charge lain tidak diduplikasi.</li>
<li>Catat accepted amount, disputed amount, reason code, due date, dan approver.</li>
</ol>

<p>Untuk shipment yang melibatkan Amerika Serikat, periksa yurisdiksi khusus. <a href="https://www.fmc.gov/articles/u-s-court-of-appeals-issues-decision-in-case-on-demurrage-and-detention-billing-practices/" target="_blank" rel="noopener noreferrer">FMC pada November 2025</a> menjelaskan bahwa pengadilan membatalkan hanya 46 CFR 541.4 mengenai pihak yang dapat ditagih; persyaratan lain seperti informasi invoice dan deadline penerbitan tetap berlaku. Ini bukan aturan otomatis untuk shipment Indonesia tanpa hubungan dengan perdagangan AS.</p>

<h2>Dispute pack yang dapat diperiksa</h2>

<p>Siapkan satu paket per container:</p>

<ul>
<li>tariff/service contract dan quotation yang berlaku;</li>
<li>arrival/discharge/load notice serta carrier movement;</li>
<li>EIR full gate-out/full gate-in/empty return;</li>
<li>terminal/depot appointment, rejection, closure, dan alternate instruction;</li>
<li>customs/agency hold dan waktu release;</li>
<li>email, ticket, screenshot sistem, serta outage notice dengan timestamp;</li>
<li>perhitungan versi perusahaan dan invoice yang ditandai per baris;</li>
<li>waiver/mitigation request, submission receipt, dan respons.</li>
</ul>

<p>Gangguan sistem, depot penuh, atau tidak tersedianya appointment tidak otomatis membatalkan biaya. Bukti harus menunjukkan kapan equipment tersedia, upaya realistis yang dilakukan, hambatan yang berada di luar kontrol pihak tertagih, dan hubungan hambatan tersebut dengan hari yang disengketakan.</p>

<h2>Konteks kepabeanan Indonesia</h2>

<p>Keterlambatan dokumen dapat memperpanjang penggunaan equipment, tetapi biaya D&amp;D bukan tarif kepabeanan. <a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">PMK 155/PMK.04/2022</a> relevan untuk kesiapan ekspor Indonesia, termasuk pemberitahuan dan dokumen pelengkap, bukan sebagai sumber harga carrier.</p>

<p>Untuk impor atau ekspor berkondisi lartas, pemeriksaan requirement harus dilakukan sebelum shipment melalui sumber resmi seperti <a href="https://www.insw.go.id/intr" target="_blank" rel="noopener noreferrer">Indonesia National Trade Repository</a>. Dokumen yang terlambat bisa menjadi penyebab operasional, tetapi invoice D&amp;D tetap harus diuji terhadap kontrak dan event.</p>

<h2>KPI pengendalian bulanan</h2>

<ul>
<li>D&amp;D cost per container dan per shipment;</li>
<li>persentase container returned sebelum last free day;</li>
<li>days lost menurut reason: document, customs, trucking, warehouse, terminal, depot, carrier;</li>
<li>forecast accuracy tujuh hari sebelum last free day;</li>
<li>invoice error rate, disputed value, recovery value, dan resolution time;</li>
<li>free-time utilization serta biaya extension versus biaya aktual.</li>
</ul>

<h2>Checklist final</h2>

<ol>
<li>Tariff model dan version disimpan sebelum booking.</li>
<li>Clock register aktif untuk setiap container.</li>
<li>Last free day dihitung per charge, equipment, dan event aktual.</li>
<li>Dokumen, pembayaran, trucking, gudang, dan depot memiliki owner.</li>
<li>Alert berjalan sebelum escalation deadline, bukan setelah charge muncul.</li>
<li>Invoice dihitung ulang dan dicek dari potensi duplikasi storage.</li>
<li>Dispute pack serta cost-recovery evidence disimpan tepat waktu.</li>
</ol>

<h2>Kesimpulan</h2>

<p>Demurrage dan detention tidak dikendalikan dengan slogan “hindari keterlambatan”, tetapi dengan tariff snapshot, container event clock, last-free-day planning, cost ownership, invoice reconciliation, dan exception evidence. Pisahkan pula equipment charge dari terminal storage.</p>

<p>GMA World dapat membantu membangun D&amp;D register, accrual dashboard, last-free-day alert, invoice audit, dan dispute pack. Free time, tarif, waiver, serta hasil sengketa tetap mengikuti carrier/terminal terms, kontrak, yurisdiksi, dan fakta shipment aktual.</p>

<h2>Referensi resmi dan carrier</h2>

<ul>
<li><a href="https://terms.maersk.com/dnd" target="_blank" rel="noopener noreferrer">Maersk — Detention and Demurrage Terms</a></li>
<li><a href="https://www.maersk.com/local-information/asia-pacific/indonesia/export" target="_blank" rel="noopener noreferrer">Maersk — Indonesia Export Local Information</a></li>
<li><a href="https://www.cma-cgm.com/assets/public/documents/01%20Customer%20Advisory_Adjustment%20of%20Demurrage%20%26%20Detention%20Tariffs.pdf" target="_blank" rel="noopener noreferrer">CMA CGM — Indonesia D&amp;D Tariff Advisory, July 2026</a></li>
<li><a href="https://www.fmc.gov/articles/u-s-court-of-appeals-issues-decision-in-case-on-demurrage-and-detention-billing-practices/" target="_blank" rel="noopener noreferrer">US Federal Maritime Commission — Current Status of Billing Rule</a></li>
<li><a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">JDIH Kementerian Keuangan — PMK 155/PMK.04/2022</a></li>
<li><a href="https://www.insw.go.id/intr" target="_blank" rel="noopener noreferrer">Indonesia National Single Window — Indonesia NTR</a></li>
</ul>
HTML,
    ],
];
