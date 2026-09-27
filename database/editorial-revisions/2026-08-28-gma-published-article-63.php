<?php

return [
    'article_id' => 63,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Panduan Lengkap Jenis Kapal Kargo untuk Logistik 2026',
        'slug' => 'panduan-lengkap-jenis-kapal-kargo-logistik-2026',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '5a6c2508f3b2b76090b5a1a8c0563656b5eaa1726da83ae189d5474861059fa2',
    ],
    'review_notes' => 'GMA cargo-vessel pillar rebuilt on 2026-08-28 from IMO cargo guidance, IMSBC and IMDG references, and UNCTAD fleet data. Removes unsourced capacity and promotional claims; adds cargo-vessel matching, capacity-unit explanations, port constraints, a worked selection example, and a controlled enquiry checklist.',
    'changes' => [
        'title' => 'Jenis Kapal Kargo: Muatan, Kapasitas, dan Kriteria Pemilihan',
        'focus_keyword' => 'jenis kapal kargo',
        'meta_description' => 'Kenali jenis kapal kargo, satuan kapasitas, kecocokan muatan, batas pelabuhan, aturan keselamatan, dan checklist sebelum memilih kapal atau meminta freight.',
        'excerpt' => 'Kerangka memilih kapal kargo berdasarkan bentuk muatan, kemasan, volume, berat, pelabuhan, alat bongkar muat, jadwal, dan persyaratan keselamatan.',
        'og_title' => 'Jenis Kapal Kargo: Muatan, Kapasitas, dan Kriteria Pemilihan',
        'og_description' => 'Bandingkan container ship, bulk carrier, general cargo, tanker, Ro-Ro, reefer, dan heavy-lift memakai data muatan serta batas operasional pelabuhan.',
        'pillar' => 'industri-maritim',
        'tags' => ['jenis kapal kargo', 'container ship', 'bulk carrier', 'general cargo', 'freight chartering'],
        'hashtags' => ['KapalKargo', 'MaritimeLogistics', 'CargoPlanning', 'Shipping', 'Freight'],
        'image_alt_texts' => [
            'Perbandingan kapal kontainer, bulk carrier, dan general cargo untuk perencanaan muatan',
            'Tim operasi memeriksa dimensi muatan dan batas pelabuhan sebelum memilih kapal',
        ],
        'schema_faq' => [
            [
                'question' => 'Apa perbedaan DWT, GT, dan TEU pada kapal?',
                'answer' => 'DWT menggambarkan kemampuan membawa total beban tertentu, GT mengukur volume internal untuk keperluan administratif, sedangkan TEU adalah satuan kapasitas kontainer setara kontainer 20 kaki. Ketiganya tidak dapat saling menggantikan.',
            ],
            [
                'question' => 'Apakah kapal dengan DWT lebih besar selalu lebih ekonomis?',
                'answer' => 'Tidak. Kapal harus cocok dengan volume dan bentuk muatan, draft serta panjang dermaga, alat bongkar muat, parcel size, rute, jadwal, dan biaya pelabuhan. Kapal besar yang tidak terisi atau tidak cocok dengan pelabuhan dapat meningkatkan biaya.',
            ],
            [
                'question' => 'Kapal apa yang digunakan untuk barang berbahaya dalam kemasan?',
                'answer' => 'Jenis kapal bergantung pada bentuk dan kemasan barang, tetapi pengangkutan dangerous goods dalam packaged form harus memperhatikan klasifikasi, kemasan, marking, dokumentasi, stowage, dan segregation sesuai ketentuan IMDG yang berlaku.',
            ],
            [
                'question' => 'Data apa yang diperlukan sebelum meminta penawaran kapal?',
                'answer' => 'Siapkan uraian teknis muatan, jumlah, berat, volume, kemasan, dimensi tiap unit, titik berat bila relevan, status dangerous goods, kebutuhan suhu, pelabuhan, laycan, loading rate, discharge rate, serta kebutuhan crane atau alat khusus.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Memilih kapal kargo tidak dimulai dari pertanyaan “kapalnya berapa DWT?”, melainkan dari karakter muatan dan batas operasional perjalanan. Dua barang dengan berat sama dapat membutuhkan kapal berbeda karena kemasan, volume, dimensi, suhu, bahaya, cara lifting, fasilitas pelabuhan, dan jadwalnya berbeda. Kapal yang terlalu besar juga tidak otomatis ekonomis bila parcel tidak memenuhi ruang, draft pelabuhan terbatas, atau biaya port call meningkat.</p>

<p>Panduan ini menggunakan halaman <a href="https://www.imo.org/en/ourwork/safety/pages/cargoes.aspx" target="_blank" rel="noopener noreferrer">Cargoes dari International Maritime Organization</a>, ketentuan <a href="https://www.imo.org/en/ourwork/safety/pages/cargoesinbulk-default.aspx" target="_blank" rel="noopener noreferrer">IMSBC Code untuk solid bulk cargo</a>, penjelasan <a href="https://www.imo.org/en/ourwork/safety/pages/dangerousgoods-default.aspx" target="_blank" rel="noopener noreferrer">IMDG Code untuk dangerous goods dalam kemasan</a>, serta <a href="https://unctad.org/publication/review-maritime-transport-2025" target="_blank" rel="noopener noreferrer">Review of Maritime Transport 2025 dari UNCTAD</a>. Kelayakan kapal dan persyaratan muatan harus dikonfirmasi kepada carrier, owner, class, terminal, surveyor, serta otoritas yang relevan untuk voyage aktual.</p>

<h2>Satuan kapasitas yang sering tertukar</h2>

<table>
<thead><tr><th>Istilah</th><th>Apa yang diukur</th><th>Penggunaan</th><th>Bukan berarti</th></tr></thead>
<tbody>
<tr><td>DWT</td><td>Kemampuan membawa total bobot: muatan, bahan bakar, air, persediaan, kru, dan lainnya</td><td>Orientasi kapasitas berat kapal</td><td>Seluruh angka DWT tersedia untuk cargo</td></tr>
<tr><td>GT</td><td>Ukuran volume internal kapal berdasarkan aturan tonnage</td><td>Administrasi, regulasi, dan biaya tertentu</td><td>Berat atau kapasitas cargo dalam ton</td></tr>
<tr><td>TEU</td><td>Unit ekuivalen kontainer 20 kaki</td><td>Kapasitas kapal dan terminal kontainer</td><td>Semua slot dapat dipakai tanpa batas berat dan stowage</td></tr>
<tr><td>Cubic capacity</td><td>Volume ruang muat</td><td>Cargo ringan atau bulky</td><td>Kapal otomatis aman untuk berat muatan</td></tr>
<tr><td>Lane metre</td><td>Panjang jalur dek untuk kendaraan</td><td>Ro-Ro dan cargo beroda</td><td>Luas dek tanpa batas tinggi atau berat</td></tr>
<tr><td>SWL</td><td>Beban kerja aman alat angkat</td><td>Crane, derrick, spreader, dan lifting gear</td><td>Semua konfigurasi lifting diizinkan</td></tr>
</tbody>
</table>

<p>Untuk cargo padat, perencana juga memerlukan stowage factor, yaitu volume yang ditempati per satuan berat. Cargo dengan stowage factor tinggi dapat memenuhi ruang sebelum batas berat tercapai. Sebaliknya, cargo sangat padat dapat mencapai batas berat atau menimbulkan persoalan distribusi beban walaupun ruang masih tersedia.</p>

<h2>Jenis kapal kargo dan kecocokan muatannya</h2>

<h3>1. Container ship</h3>

<p>Kapal kontainer membawa unit ISO melalui slot yang direncanakan dalam bay, row, dan tier. Pilihan ini cocok untuk barang dalam container dry, reefer, open top, flat rack, atau equipment khusus yang diterima carrier. Perencanaan tidak cukup dengan jumlah TEU. Periksa gross weight per container, verified gross mass, dimensi over-gauge, kebutuhan plug reefer, dangerous goods, stowage, port pair, transshipment, dan cut-off terminal.</p>

<p>Untuk eksportir dengan volume kecil, menggunakan layanan liner dan berbagi kapasitas melalui LCL atau satu container penuh sering lebih realistis daripada mencarter kapal. Namun keputusan LCL, FCL, atau breakbulk tetap harus membandingkan kemasan, risiko handling, jadwal, dan total biaya sampai tujuan.</p>

<h3>2. General cargo dan multipurpose vessel</h3>

<p>General cargo atau multipurpose vessel digunakan untuk breakbulk, bagged cargo, steel product, timber, machinery, dan kombinasi muatan yang tidak selalu masuk kontainer standar. Sebagian kapal memiliki crane sendiri sehingga dapat melayani pelabuhan dengan fasilitas terbatas. Data yang harus diperiksa meliputi hatch opening, hold dimensions, tank top strength, deck strength, crane SWL, outreach, lifting point, lashing, dunnage, serta sequence bongkar.</p>

<p>Label “general cargo” tidak menjamin setiap barang dapat diterima. Mesin dengan titik berat tinggi, coil, plate panjang, atau cargo bernilai tinggi memerlukan method statement dan stowage plan yang berbeda.</p>

<h3>3. Dry bulk carrier</h3>

<p>Bulk carrier mengangkut solid bulk cargo tanpa kemasan individual, misalnya bijih, batu bara, pupuk, semen tertentu, atau komoditas pertanian. IMSBC Code menjelaskan bahaya yang dapat timbul dari distribusi muatan yang tidak tepat, perubahan stabilitas, dan reaksi kimia. Informasi cargo declaration, moisture, transportable moisture limit bila relevan, density, stowage factor, trimming, hold cleanliness, dan loading sequence perlu diselesaikan sebelum operasi.</p>

<p>IMSBC Code tidak mencakup grain in bulk karena terdapat International Grain Code tersendiri. Karena itu, istilah “bulk” tidak boleh dipakai sebagai satu checklist universal.</p>

<h3>4. Tanker dan gas carrier</h3>

<p>Oil tanker, product tanker, chemical tanker, dan gas carrier dirancang untuk liquid atau liquefied gas dengan sistem tangki serta keselamatan khusus. Pemilihan membutuhkan spesifikasi produk, compatibility, tank coating, heating atau cooling, pumping rate, vapour control, previous cargo, cleaning, segregasi, terminal interface, dan aturan pencemaran. Ini bukan area untuk menebak kapal hanya dari jumlah ton.</p>

<h3>5. Ro-Ro vessel</h3>

<p>Roll-on/roll-off vessel memindahkan kendaraan atau cargo beroda melalui ramp. Kapasitas sering dibahas dalam lane metre, tetapi batas axle load, ramp capacity, deck height, turning radius, lashing point, fuel condition, baterai, dan akses pengemudi tetap menentukan penerimaan. Unit berat atau oversized perlu drawing serta persetujuan teknis lebih awal.</p>

<h3>6. Reefer vessel dan reefer container</h3>

<p>Cargo yang sensitif suhu dapat memakai reefer container pada kapal kontainer atau specialized reefer vessel. Keputusan dipengaruhi volume, port coverage, suhu, ventilasi, controlled atmosphere, pre-cooling, packaging, genset saat inland transport, plug availability, dan monitoring. Set point tidak menggantikan kewajiban memastikan kondisi produk dan rantai dingin sebelum stuffing.</p>

<h3>7. Heavy-lift dan project cargo vessel</h3>

<p>Project cargo seperti transformer, module, crane component, atau machinery besar mungkin memerlukan heavy-lift atau multipurpose vessel. Dokumen minimum biasanya mencakup drawing, berat terverifikasi, dimensi, centre of gravity, lifting point, lifting plan, transport frame, seafastening, route survey, ground-bearing capacity, dan interface antara kapal dengan terminal. Kapasitas crane gabungan tidak boleh diasumsikan hanya dengan menjumlahkan SWL tanpa engineering review.</p>

<h2>Dangerous goods mengubah keputusan kapal</h2>

<p>IMO menjelaskan bahwa dangerous goods dalam packaged form tunduk pada ketentuan relevan dalam IMDG Code, termasuk klasifikasi, packing, marking, documentation, stowage, dan segregation. Edisi serta amendment yang berlaku perlu diperiksa pada tanggal shipment. Nama dagang saja tidak cukup; shipper harus menyediakan identitas bahan dan data yang dibutuhkan untuk menentukan penerimaan secara benar.</p>

<p>Dangerous goods dapat diterima pada kapal kontainer atau general cargo tertentu bila kapal, carrier, rute, pelabuhan, dokumentasi, dan stowage mengizinkan. Status berbahaya bukan sekadar tambahan biaya; informasi yang salah dapat memengaruhi keselamatan kapal, kru, terminal, muatan lain, dan lingkungan.</p>

<h2>Checklist data sebelum meminta freight indication</h2>

<ul>
<li>Uraian teknis cargo dan penggunaannya, bukan hanya nama komersial.</li>
<li>Jumlah unit, total gross weight, net weight, serta volume.</li>
<li>Jenis kemasan dan dimensi setiap unit, termasuk over-gauge.</li>
<li>Centre of gravity, lifting point, drawing, serta foto untuk project cargo.</li>
<li>Status dangerous goods, UN number, class, packing group, dan dokumen terkait bila berlaku.</li>
<li>Kebutuhan suhu, ventilasi, kelembapan, atau controlled atmosphere.</li>
<li>Loading port, discharge port, terminal, draft, tide, berth, serta batas alat.</li>
<li>Laycan, target shipment, loading rate, discharge rate, dan working hours.</li>
<li>Ketersediaan crane kapal atau shore crane, spreader, forklift, trailer, dan tenaga kerja.</li>
<li>Incoterm, pihak yang menanggung aktivitas, serta kebutuhan survey dan insurance.</li>
</ul>

<p>Freight indication yang dibuat dari data belum lengkap harus diberi asumsi dan masa berlaku. Sebelum booking atau charter party, rekonsiliasi kembali data cargo, port restriction, scope biaya, laytime, demurrage, serta responsibility matrix.</p>

<h2>Contoh pemilihan: tiga cargo dengan berat yang sama</h2>

<p>Simulasi berikut menunjukkan mengapa berat tidak cukup. Misalkan masing-masing shipment berbobot 500 ton.</p>

<table>
<thead><tr><th>Cargo</th><th>Kandidat awal</th><th>Data penentu</th><th>Risiko bila salah pilih</th></tr></thead>
<tbody>
<tr><td>Mesin dalam 25 wooden cases</td><td>Multipurpose atau container bila dimensi memungkinkan</td><td>Dimensi, berat per unit, lifting point, hatch, crane, lashing</td><td>Unit tidak masuk hatch atau crane tidak memadai</td></tr>
<tr><td>Pupuk curah</td><td>Bulk carrier</td><td>IMSBC schedule, moisture, density, stowage factor, hold condition</td><td>Masalah stabilitas, kontaminasi, atau cargo tidak diterima</td></tr>
<tr><td>Produk ritel dalam karton</td><td>Container ship</td><td>CBM, palletization, gross weight, port pair, schedule, transshipment</td><td>Utilisasi container rendah atau terlalu banyak handling</td></tr>
</tbody>
</table>

<p>Hasil akhir tetap bergantung pada volume, origin-destination, jadwal, ketersediaan kapal, fasilitas pelabuhan, dan total biaya. Simulasi ini bukan rekomendasi booking untuk cargo tertentu.</p>

<h2>Gate operasional sebelum nominasi kapal</h2>

<ol>
<li><strong>Cargo gate:</strong> deskripsi, jumlah, berat, volume, kemasan, bahaya, suhu, dan drawing final.</li>
<li><strong>Vessel gate:</strong> hold, deck, hatch, crane, stability interface, certificate, dan batas penerimaan sesuai.</li>
<li><strong>Port gate:</strong> draft, berth, LOA, tide, equipment, storage, working hours, dan izin operasi tersedia.</li>
<li><strong>Commercial gate:</strong> freight basis, surcharge, laytime, demurrage, detention, handling, survey, dan excluded cost dipahami.</li>
<li><strong>Document gate:</strong> booking, cargo declaration, dangerous-goods document, manifest data, dan shipping instruction konsisten.</li>
</ol>

<p>Gunakan status <strong>go</strong> hanya setelah seluruh gate material ditutup. Gunakan <strong>hold</strong> ketika data atau persetujuan masih dapat dilengkapi. Gunakan <strong>stop</strong> bila kapal, pelabuhan, atau metode handling tidak dapat memenuhi kebutuhan cargo secara bertanggung jawab.</p>

<h2>Kesimpulan</h2>

<p>Jenis kapal kargo harus dipilih dari muatan ke kapal, bukan sebaliknya. Container ship unggul untuk unit yang terstandardisasi; bulk carrier untuk solid bulk; general cargo dan multipurpose untuk breakbulk; tanker serta gas carrier untuk liquid atau gas khusus; Ro-Ro untuk cargo beroda; dan heavy-lift untuk unit proyek yang membutuhkan engineering. DWT, GT, TEU, cubic capacity, lane metre, dan SWL menjawab pertanyaan berbeda.</p>

<p>GMA World dapat membantu menyusun cargo data sheet dan membandingkan opsi pengangkutan. Konfirmasi akhir tetap memerlukan data aktual, persetujuan carrier atau owner, kesiapan terminal, serta validasi pihak keselamatan dan regulator yang berwenang.</p>

<h2>Referensi resmi</h2>

<ul>
<li><a href="https://www.imo.org/en/ourwork/safety/pages/cargoes.aspx" target="_blank" rel="noopener noreferrer">IMO — Cargoes</a></li>
<li><a href="https://www.imo.org/en/ourwork/safety/pages/cargoesinbulk-default.aspx" target="_blank" rel="noopener noreferrer">IMO — International Maritime Solid Bulk Cargoes Code</a></li>
<li><a href="https://www.imo.org/en/ourwork/safety/pages/dangerousgoods-default.aspx" target="_blank" rel="noopener noreferrer">IMO — International Maritime Dangerous Goods Code</a></li>
<li><a href="https://unctad.org/publication/review-maritime-transport-2025" target="_blank" rel="noopener noreferrer">UNCTAD — Review of Maritime Transport 2025</a></li>
</ul>
HTML,
    ],
];
