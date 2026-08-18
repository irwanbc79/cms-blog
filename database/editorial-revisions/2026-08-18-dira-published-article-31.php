<?php

return [
    'article_id' => 31,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Panduan Lengkap Jasa Undername untuk Eksportir Pemula di Indonesia',
        'slug' => 'panduan-lengkap-jasa-undername-untuk-eksportir-pemula-di-indonesia',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => 'a1970c45591e8b623782a75dd734f06b696264982d2c7c6f86cf5e31f8a616cb',
    ],
    'review_notes' => 'Live low-value remediation on 2026-08-18. Reframed undername as a commercial principal structure rather than a shortcut, separated it from PPJK, added current registration sources, due diligence, responsibility matrix, and decision gates. Requires human editorial re-review and later cluster consolidation.',
    'changes' => [
        'title' => 'Undername Ekspor-Impor vs PPJK: Struktur, Risiko, dan Due Diligence',
        'focus_keyword' => 'undername ekspor impor vs PPJK',
        'meta_description' => 'Pahami beda undername dan PPJK, siapa menjadi eksportir/importir, pembagian tanggung jawab, due diligence, kontrak, serta risiko sebelum shipment.',
        'excerpt' => 'Undername bukan sekadar pinjam nama dan PPJK bukan pemilik izin transaksi. Tentukan principal, kuasa, data, uang, barang, pajak, dan liability secara tertulis.',
        'og_title' => 'Undername vs PPJK: Jangan Salah Menentukan Principal Shipment',
        'og_description' => 'Matriks keputusan untuk membedakan eksportir/importir principal, perusahaan trading, PPJK, forwarder, dan pemilik barang sebelum shipment.',
        'pillar' => 'jasa-undername',
        'tags' => ['undername ekspor', 'undername impor', 'PPJK', 'akses kepabeanan', 'due diligence'],
        'hashtags' => ['Undername', 'PPJK', 'ExportCompliance', 'ImportCompliance', 'Dira'],
        'image_alt_texts' => [
            'Matriks perbedaan undername ekspor impor dan PPJK',
            'Tim memeriksa principal kuasa dokumen pembayaran dan risiko shipment',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah undername sama dengan PPJK?',
                'answer' => 'Tidak. Undername adalah istilah komersial untuk struktur ketika perusahaan lain menjadi pihak bernama atau principal dalam transaksi. PPJK adalah badan usaha yang mengurus pemenuhan kewajiban pabean untuk dan atas kuasa importir atau eksportir. PPJK tidak otomatis menjadi importir, eksportir, pemilik barang, atau pemegang seluruh izin.',
            ],
            [
                'question' => 'Apakah undername dapat digunakan untuk melewati izin atau larangan pembatasan?',
                'answer' => 'Tidak. Barang, perusahaan, kegiatan, penggunaan, dan dokumen tetap harus memenuhi ketentuan yang berlaku. Menggunakan perusahaan lain tidak mengubah karakter barang atau menghapus izin, standar, registrasi, pajak, dan pengawasan.',
            ],
            [
                'question' => 'Siapa yang bertanggung jawab atas data pemberitahuan pabean?',
                'answer' => 'Pihak yang menjadi importir atau eksportir tetap harus memastikan data sumber dan kewajiban transaksi benar. PPJK bekerja berdasarkan kuasa dan data yang diberikan. Tanggung jawab harus dipetakan dalam kontrak, tetapi kuasa kepada penyedia jasa tidak membuat data yang salah menjadi benar.',
            ],
            [
                'question' => 'Kapan perusahaan sebaiknya memakai legalitas sendiri?',
                'answer' => 'Bila transaksi berulang, produk strategis, margin dan buyer stabil, serta perusahaan mampu menjalankan compliance, dokumentasi, pajak, pembayaran, dan audit trail. Undername atau trading principal dapat dipakai untuk pilot tertentu bila strukturnya sah dan transparan, bukan sebagai solusi permanen tanpa kontrol.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>“Undername” sering dipasarkan sebagai cara ekspor atau impor tanpa izin sendiri. Framing tersebut berbahaya. Undername bukan tombol untuk memindahkan seluruh kewajiban kepada pihak lain, dan bukan alasan untuk mengubah identitas transaksi hanya di atas kertas. Struktur yang benar harus menjawab siapa principal, siapa pemilik barang, siapa membuat kontrak, siapa menerima atau membayar uang, siapa memegang izin, dan siapa bertanggung jawab ketika data atau barang bermasalah.</p>

<p>Istilah undername juga tidak boleh dicampur dengan PPJK. JDIH Kementerian Keuangan mendefinisikan <a href="https://jdih.kemenkeu.go.id/kamus-hukum/pengusaha-pengurusan-jasa-kepabeanan?id=073da22ca7598dffd7831cba534e6a27" rel="noopener noreferrer" target="_blank">Pengusaha Pengurusan Jasa Kepabeanan</a> sebagai badan usaha yang mengurus pemenuhan kewajiban pabean untuk dan atas kuasa importir atau eksportir. Artinya, PPJK adalah customs representative; ia tidak otomatis menjadi principal transaksi.</p>

<h2>Empat peran yang harus dipisahkan</h2>

<table>
<thead><tr><th>Peran</th><th>Fungsi utama</th><th>Bukan otomatis</th></tr></thead>
<tbody>
<tr><td>Eksportir atau importir</td><td>Pihak bernama yang menjalankan transaksi dan kewajiban sesuai perannya.</td><td>PPJK, forwarder, atau pemilik barang lain.</td></tr>
<tr><td>Trading principal</td><td>Membeli atau menjual, membuat kontrak, invoice, dan menanggung risiko komersial.</td><td>Sekadar perusahaan yang meminjamkan identitas.</td></tr>
<tr><td>PPJK</td><td>Mengurus pemberitahuan dan kewajiban pabean berdasarkan kuasa.</td><td>Pemilik barang atau pemegang seluruh izin produk.</td></tr>
<tr><td>Freight forwarder</td><td>Mengoordinasikan pengangkutan sesuai scope layanan.</td><td>Customs principal, buyer, seller, atau regulator.</td></tr>
</tbody>
</table>

<p>Satu perusahaan dapat memegang lebih dari satu peran bila memenuhi persyaratan dan kontraknya jelas. Namun peran tidak boleh diasumsikan hanya karena satu pihak menawarkan layanan “all-in”. Mintalah legal entity, nomor registrasi, akses kepabeanan, izin, scope PPJK, dan pihak yang menandatangani dokumen untuk diperiksa secara terpisah.</p>

<h2>Undername adalah struktur principal, bukan pekerjaan administrasi</h2>

<p>Dalam praktik komersial, perusahaan trading dapat menjadi eksportir atau importir yang sebenarnya: ia masuk ke kontrak jual beli, menerbitkan atau menerima invoice, menerima atau melakukan pembayaran, menguasai barang sesuai term, menggunakan izin yang sesuai, dan mencatat transaksi dalam pembukuan. Pemilik produk atau customer berkontrak dengan perusahaan tersebut berdasarkan pembagian peran yang nyata.</p>

<p>Risiko muncul ketika perusahaan hanya dicantumkan namanya, tetapi tidak mengetahui barang, supplier, buyer, nilai, izin, aliran dana, atau dokumen. Struktur semacam itu merusak audit trail dan menimbulkan pertanyaan pada kepabeanan, pajak, bank, regulator teknis, serta pihak penegak hukum. Kontrak “undername” tidak dapat melegalkan informasi palsu atau meniadakan aturan.</p>

<h2>Registrasi dan akses kepabeanan</h2>

<p>Direktorat Jenderal Bea dan Cukai menjelaskan pada laman <a href="https://www.beacukai.go.id/registrasi-kepabeanan" rel="noopener noreferrer" target="_blank">Registrasi Kepabeanan</a> bahwa importir atau eksportir diperlakukan telah memenuhi registrasi setelah memiliki NIB yang berlaku sebagai TDP, API, dan Akses Kepabeanan. PPJK melakukan registrasi melalui Portal Pengguna Jasa CEISA 4.0. Data NIB dan NPWP harus mutakhir.</p>

<p>Kepemilikan NIB atau akses tidak berarti setiap jenis barang otomatis dapat diperdagangkan. Periksa KBLI, identitas pelaku, izin usaha, persyaratan produk, lartas, registrasi fasilitas, laporan, standar, dan batasan lain sesuai transaksi. Untuk impor, Bea Cukai menegaskan pada <a href="https://www.beacukai.go.id/impor-untuk-dipakai" rel="noopener noreferrer" target="_blank">Impor untuk Dipakai</a> bahwa importir bertanggung jawab dalam self-assessment atas penghitungan, pembayaran, dan penyetoran pungutan berdasarkan PIB.</p>

<p>Untuk ekspor, alur PEB, dokumen pelengkap, penelitian, pemeriksaan selektif, pemuatan, dan keberangkatan dijelaskan pada <a href="https://www.beacukai.go.id/tata-laksana-ekspor" rel="noopener noreferrer" target="_blank">Tata Laksana Ekspor</a>. Menggunakan trading principal atau PPJK tidak menghapus kewajiban lartas, bea keluar, origin, atau dokumen komoditas bila berlaku.</p>

<h2>Matriks memilih struktur</h2>

<table>
<thead><tr><th>Kondisi</th><th>Struktur yang dipertimbangkan</th><th>Gate</th></tr></thead>
<tbody>
<tr><td>Perusahaan punya legalitas dan akses, tetapi belum mampu mengurus dokumen.</td><td>Tetap sebagai eksportir/importir, beri kuasa kepada PPJK.</td><td>Tim internal memiliki product data dan approval control.</td></tr>
<tr><td>Pilot satu kali, perusahaan belum siap menjadi principal.</td><td>Trading company menjadi principal yang sebenarnya.</td><td>Kontrak, invoice, uang, barang, izin, pajak, dan liability konsisten.</td></tr>
<tr><td>Beberapa UMKM dikonsolidasikan untuk satu buyer.</td><td>Aggregator atau trading exporter.</td><td>Quality standard, lot traceability, supplier contract, dan payment allocation.</td></tr>
<tr><td>Transaksi berulang dan buyer stabil.</td><td>Bangun akses serta kapabilitas sendiri; PPJK dapat tetap sebagai agent.</td><td>Compliance owner, SOP, audit trail, dan working capital tersedia.</td></tr>
<tr><td>Barang mensyaratkan izin khusus pemegang tertentu.</td><td>Gunakan hanya pihak yang sah dan benar-benar memenuhi scope izin.</td><td>Tidak ada “pinjam izin” di luar cakupan.</td></tr>
</tbody>
</table>

<h2>Due diligence penyedia undername atau trading principal</h2>

<ol>
<li>Verifikasi akta, pengurus, beneficial owner, NIB, NPWP, alamat, rekening, dan status perusahaan.</li>
<li>Periksa akses kepabeanan dan izin yang relevan langsung dari bukti atau sistem resmi.</li>
<li>Pastikan KBLI, kegiatan, produk, fasilitas, dan lokasi sesuai scope transaksi.</li>
<li>Periksa pengalaman pada komoditas dan route dengan bukti yang tidak membuka data klien tanpa izin.</li>
<li>Minta struktur tim: commercial principal, compliance, finance, PPJK, forwarder, dan approver.</li>
<li>Periksa sanctions, dispute, tax, legal, dan reputational risk sesuai nilai transaksi.</li>
<li>Pastikan perusahaan memahami product dossier, supplier, buyer, HS Code, lartas, nilai, dan payment flow.</li>
<li>Periksa insurance, claim handling, document retention, security, serta business continuity.</li>
</ol>

<p>Hindari pihak yang menawarkan tarif tetap tanpa melihat barang, menjanjikan izin atau clearance, meminta description digenerikkan, menggunakan rekening pribadi, menolak memberikan legal entity, atau menyarankan memecah shipment untuk menghindari ketentuan.</p>

<h2>Klausul kontrak minimum</h2>

<table>
<thead><tr><th>Klausul</th><th>Hal yang dikunci</th></tr></thead>
<tbody>
<tr><td>Scope dan peran</td><td>Siapa seller, buyer, exporter/importer, declarant, PPJK, forwarder, dan pemilik barang.</td></tr>
<tr><td>Product data</td><td>Spesifikasi, HS candidate, value, origin, quantity, condition, dan intended use.</td></tr>
<tr><td>Compliance</td><td>Siapa memperoleh, memegang, memperbarui, dan memvalidasi izin atau sertifikat.</td></tr>
<tr><td>Dokumen</td><td>Creator, reviewer, approver, cut-off, amendment, dan record retention.</td></tr>
<tr><td>Uang dan pajak</td><td>Invoice flow, rekening, fee, FX, pungutan, pajak, refund, dan reconciliation.</td></tr>
<tr><td>Barang dan risiko</td><td>Title, custody, loss, damage, storage, inspection, rejection, dan disposal.</td></tr>
<tr><td>Liability</td><td>Misdeclaration, delay, penalty, claim, indemnity, cap, dan exclusion.</td></tr>
<tr><td>Termination</td><td>Hak hold, stop, pengembalian dokumen, outstanding payment, dan data handover.</td></tr>
</tbody>
</table>

<p>Fee harus dipisahkan dari biaya pemerintah, pajak, freight, storage, examination, laboratory, demurrage, dan third-party charge. Quotation tanpa asumsi serta exclusion akan terlihat murah di awal tetapi sulit direkonsiliasi setelah shipment.</p>

<h2>Shipment control dari intake sampai close-out</h2>

<ol>
<li><strong>Intake:</strong> kumpulkan product dossier, supplier, buyer, tujuan, nilai, quantity, dan jadwal.</li>
<li><strong>Feasibility:</strong> validasi HS, lartas, izin, origin, route, payment, dan economics.</li>
<li><strong>Contract:</strong> tetapkan principal, kuasa, incoterm, fee, uang, pajak, dokumen, serta liability.</li>
<li><strong>Pre-shipment:</strong> cocokkan permit, invoice, packing list, label, certificate, booking, dan draft declaration.</li>
<li><strong>Execution:</strong> jaga version control dan approval untuk setiap perubahan data.</li>
<li><strong>Clearance:</strong> tangani query serta examination dengan data dan bukti aktual.</li>
<li><strong>Close-out:</strong> rekonsiliasi biaya, pembayaran, dokumen final, claim, dan record retention.</li>
</ol>

<h2>Simulasi struktur ekspor: UMKM melalui trading exporter</h2>

<p>UMKM A memproduksi rempah dan belum siap menjadi eksportir. Trading Company B menandatangani sales contract dengan Buyer C, membeli produk dari UMKM A, menjadi exporter pada dokumen, menerima pembayaran buyer, dan menunjuk PPJK D untuk pengurusan pabean. Forwarder E mengatur pengangkutan. Dalam struktur ini, B bukan sekadar nama; B harus memahami produk, memenuhi lartas, mengendalikan invoice dan origin, mencatat pembelian-penjualan, serta menangani claim sesuai kontrak.</p>

<p>UMKM A tetap bertanggung jawab atas spesifikasi, mutu, traceability, dan dokumen sumber yang dijanjikan kepada B. PPJK D menyusun pemberitahuan berdasarkan kuasa serta data yang disetujui B. Forwarder E tidak menentukan bahwa produk memenuhi izin negara tujuan. Bila buyer menolak barang karena mutu, kontrak B–C dan B–A menentukan claim flow; masalah tersebut tidak otomatis menjadi tanggung jawab PPJK.</p>

<h2>Simulasi struktur impor: customer melalui trading importer</h2>

<p>Customer X membutuhkan mesin tetapi belum siap menjadi importir. Trading Company Y membeli dari Supplier Z, menjadi importer, memegang izin yang relevan, membayar supplier atau mengatur trade finance, dan menjual mesin kepada X. PPJK mengajukan PIB atas kuasa Y. Invoice luar negeri, pembayaran, PIB, pembukuan persediaan, invoice domestik, dan penyerahan kepada X harus membentuk audit trail yang konsisten.</p>

<p>Bila X sebenarnya membeli langsung dan Y hanya dicantumkan untuk menggunakan identitas tanpa mengetahui nilai, spesifikasi, atau izin, risiko meningkat. Sebelum transaksi, putuskan siapa principal sebenarnya dan sesuaikan kontrak serta aliran uang. Jangan menggunakan reimbursement informal atau rekening yang tidak tercantum hanya untuk membuat dokumen terlihat cocok.</p>

<h3>Change-control untuk kedua skenario</h3>

<p>Perubahan supplier, buyer, model, composition, quantity, price, country of origin, route, consignee, atau payment instruction harus memicu review. Catat perubahan, dampak terhadap HS, izin, origin, pajak, insurance, PEB atau PIB, approver, dan versi dokumen. Jika pihak bernama menolak melakukan review, shipment harus ditahan.</p>

<h2>Gate keputusan</h2>

<ul>
<li><strong>Gunakan PPJK:</strong> perusahaan tetap menjadi principal dan hanya membutuhkan representasi kepabeanan.</li>
<li><strong>Gunakan trading principal:</strong> pihak tersebut benar-benar menjalankan peran komersial, legal, compliance, finance, dan dokumentasi.</li>
<li><strong>Bangun sendiri:</strong> transaksi berulang membuat kontrol, data, dan margin lebih bernilai daripada fee outsourcing.</li>
<li><strong>Hold:</strong> izin, HS, nilai, aliran uang, atau pembagian tanggung jawab belum jelas.</li>
<li><strong>Stop:</strong> struktur meminta pemalsuan data, penyamaran principal, penggunaan izin di luar scope, atau rekening yang tidak konsisten.</li>
</ul>

<p>Dira dapat menilai kelayakan struktur, memetakan peran, menyusun product dossier, compliance matrix, kontrak operasional, dan shipment checklist. Dira tidak menjamin izin, klasifikasi, tarif, hasil pemeriksaan, clearance, atau pelepasan barang.</p>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026. “Undername” digunakan sebagai istilah komersial, bukan nama izin resmi. Verifikasi struktur aktual kepada penasihat hukum, pajak, Bea Cukai, OSS, dan instansi teknis sesuai barang serta transaksi.</p>
HTML,
    ],
];
