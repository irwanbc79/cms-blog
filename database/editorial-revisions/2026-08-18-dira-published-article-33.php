<?php

return [
    'article_id' => 33,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Larangan dan Pembatasan Impor di Indonesia 2026: Panduan Lengkap Importir',
        'slug' => 'larangan-dan-pembatasan-impor-di-indonesia-2026-panduan-lengkap-importir',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '7b3fcf375b0111c9b7012c3fc559ebfa246cf96f92036bceb887065bf6313c66',
    ],
    'review_notes' => 'Live low-value remediation on 2026-08-18. Replaced a 311-word unsourced article containing stale tax rates and blanket lartas claims with an INSW-based verification workflow. Requires human editorial re-review.',
    'changes' => [
        'title' => 'Cara Cek Lartas Impor di INSW Sebelum Barang Dikapalkan',
        'focus_keyword' => 'cara cek lartas impor INSW',
        'meta_description' => 'Cara cek lartas impor di INSW: kunci spesifikasi dan HS Code, telusuri dasar aturan, petakan izin, lalu cocokkan dokumen sebelum pengapalan.',
        'excerpt' => 'Status lartas tidak aman ditentukan hanya dari nama barang. Gunakan spesifikasi aktual, HS Code, INTR INSW, dan aturan instansi teknis sebelum supplier mengirim.',
        'og_title' => 'Checklist Cek Lartas Impor di INSW Sebelum Shipment',
        'og_description' => 'Alur praktis memeriksa HS Code, larangan pembatasan, instansi penerbit, dokumen, masa berlaku, dan data PIB sebelum barang dikapalkan.',
        'pillar' => 'regulasi-impor',
        'tags' => ['lartas impor', 'INSW', 'INTR', 'HS Code', 'dokumen impor'],
        'hashtags' => ['LartasImpor', 'INSW', 'HSCode', 'CustomsCompliance', 'Dira'],
        'image_alt_texts' => [
            'Importir memeriksa larangan pembatasan melalui INTR INSW',
            'Checklist spesifikasi HS Code dan izin sebelum pengapalan impor',
        ],
        'schema_faq' => [
            [
                'question' => 'Apa yang dimaksud barang lartas impor?',
                'answer' => 'Lartas adalah larangan atau pembatasan yang diberlakukan instansi teknis terhadap barang tertentu. Barang yang dibatasi dapat diimpor bila persyaratan yang berlaku dipenuhi, sedangkan barang yang dilarang tidak dapat diimpor melalui skema normal. Status harus diperiksa berdasarkan barang, HS Code, penggunaan, kondisi, dan aturan terkini.',
            ],
            [
                'question' => 'Apakah hasil pencarian INSW cukup untuk menentukan izin impor?',
                'answer' => 'Hasil INTR adalah titik pemeriksaan utama, tetapi tim tetap perlu mencocokkan spesifikasi produk, kode HS, dasar hukum, instansi penerbit, waktu pemenuhan, identitas pemegang izin, dan ketentuan pengecualian. Bila klasifikasi atau cakupan aturan belum jelas, lakukan klarifikasi sebelum shipment.',
            ],
            [
                'question' => 'Kapan pengecekan lartas harus dilakukan?',
                'answer' => 'Sebelum purchase order dan pengapalan final, lalu diverifikasi ulang ketika invoice, packing list, model, jumlah, negara asal, pelabuhan, dan jadwal shipment telah dikunci. Jangan menunggu barang tiba di pelabuhan.',
            ],
            [
                'question' => 'Apakah PPJK bertanggung jawab atas seluruh izin lartas?',
                'answer' => 'Importir tetap bertanggung jawab atas pemenuhan ketentuan larangan dan pembatasan. PPJK bekerja berdasarkan kuasa dan data yang diberikan. Pembagian pekerjaan harus tertulis, tetapi tanggung jawab importir tidak berpindah hanya karena menggunakan penyedia jasa.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Status larangan atau pembatasan impor tidak dapat ditentukan hanya dari nama dagang. “Mesin”, “makanan”, “tekstil”, atau “bahan kimia” belum menjelaskan fungsi, komposisi, kondisi, spesifikasi, maupun HS Code. Kesalahan di tahap ini dapat membuat izin yang diurus tidak cocok dengan barang yang datang.</p>

<p>Direktorat Jenderal Bea dan Cukai menegaskan bahwa importir bertanggung jawab memenuhi ketentuan larangan atau pembatasan dari instansi terkait. Pada laman resmi <a href="https://www.beacukai.go.id/impor-untuk-dipakai" rel="noopener noreferrer" target="_blank">Impor untuk Dipakai</a>, Bea Cukai juga mengarahkan pemeriksaan ketentuan lartas melalui Indonesia National Single Window sebagai single reference. Karena itu, pengecekan harus dilakukan sebelum pengiriman atau pengapalan.</p>

<h2>Tiga kemungkinan hasil pemeriksaan</h2>

<table>
<thead><tr><th>Status</th><th>Arti operasional</th><th>Keputusan awal</th></tr></thead>
<tbody>
<tr><td>Dilarang</td><td>Barang berada dalam cakupan larangan berdasarkan ketentuan yang berlaku.</td><td>Jangan lanjutkan shipment normal; periksa apakah transaksi harus dibatalkan atau termasuk pengecualian yang sah.</td></tr>
<tr><td>Dibatasi</td><td>Barang dapat diimpor apabila persyaratan, izin, laporan, sertifikat, atau pengawasan tertentu dipenuhi.</td><td>Petakan seluruh dokumen, penerbit, pemegang, masa berlaku, dan waktu pemenuhan.</td></tr>
<tr><td>Tidak terindikasi lartas</td><td>Pencarian awal tidak menampilkan ketentuan lartas untuk data yang diperiksa.</td><td>Tetap validasi HS Code dan perubahan aturan; kewajiban pabean, pajak, label, mutu, atau sektor lain dapat tetap berlaku.</td></tr>
</tbody>
</table>

<p>Hasil “tidak terindikasi” bukan surat jaminan. Bila HS Code atau uraian barang yang dipakai salah, hasil pencariannya juga salah. Produk serupa dapat memiliki kewajiban berbeda karena bahan, teknologi, daya, ukuran, kondisi baru atau bekas, tujuan penggunaan, atau kategori konsumen.</p>

<h2>Data yang harus dikunci sebelum membuka INSW</h2>

<ul>
<li>Nama umum dan nama teknis barang.</li>
<li>Fungsi utama serta cara kerja.</li>
<li>Komposisi, material, kandungan, atau bahan aktif.</li>
<li>Merek, model, tipe, daya, kapasitas, dan ukuran.</li>
<li>Kondisi baru, tidak baru, rekondisi, limbah, atau sisa proses.</li>
<li>Bentuk saat diimpor: unit lengkap, bagian, bulk, retail, atau sampel.</li>
<li>Pengguna dan tujuan penggunaan.</li>
<li>Negara asal, produsen, importir, dan lokasi pemasukan.</li>
<li>Foto, katalog, manual, technical data sheet, dan safety data sheet bila relevan.</li>
</ul>

<p>Jangan menerima HS Code supplier luar negeri sebagai keputusan otomatis. Kode yang digunakan di negara ekspor dapat berbeda pada digit nasional, dan supplier belum tentu memahami kondisi serta penggunaan barang di Indonesia. Klasifikasi dibangun dari karakter barang, catatan bagian atau bab, dan ketentuan klasifikasi yang berlaku.</p>

<h2>Langkah cek lartas melalui INTR</h2>

<h3>1. Susun HS Code kandidat</h3>

<p>Gunakan spesifikasi aktual untuk menyusun klasifikasi kandidat. Bila terdapat dua kemungkinan, dokumentasikan alasan untuk masing-masing kode dan selesaikan perbedaannya. Jangan memilih kode berdasarkan tarif atau izin yang lebih ringan.</p>

<h3>2. Cari pada Indonesia National Trade Repository</h3>

<p>Buka <a href="https://insw.go.id/intr" rel="noopener noreferrer" target="_blank">Indonesia National Trade Repository</a>. Cari kode secara lengkap dan baca uraian barang, tarif, lartas, instansi teknis, serta dokumen terkait. Simpan tanggal pemeriksaan dan hasil yang digunakan sebagai working paper shipment.</p>

<h3>3. Buka dasar peraturannya</h3>

<p>Jangan berhenti pada nama izin di tabel. Buka dasar hukum dan lampirannya untuk memeriksa cakupan HS, uraian barang, pengecualian, periode berlaku, pelabuhan tertentu, surveyor, rekomendasi, serta pengawasan border atau post-border. JDIH Kementerian Perdagangan mencatat <a href="https://jdih.kemendag.go.id/peraturan/peraturan-menteri-perdagangan-republik-indonesia-nomor-16-tahun-2025-tentang-kebijakan-dan-pengaturan-impor-1" rel="noopener noreferrer" target="_blank">Permendag 16 Tahun 2025</a> tentang Kebijakan dan Pengaturan Impor beserta perubahan berikutnya. Gunakan versi yang berlaku pada tanggal transaksi dan periksa juga aturan komoditas khusus.</p>

<h3>4. Petakan instansi dan dokumen</h3>

<p>Satu barang dapat menyentuh lebih dari satu instansi. Contohnya dapat melibatkan Persetujuan Impor, Laporan Surveyor, SNI, BPOM, karantina, telekomunikasi, lingkungan, kesehatan, atau ketentuan teknis lain. Contoh tersebut bukan daftar tetap; hasil aktual mengikuti klasifikasi dan aturan produk.</p>

<h3>5. Periksa siapa pemegang izinnya</h3>

<p>Nama perusahaan, NIB, KBLI, jenis API, alamat, gudang, produsen, merek, negara asal, dan data lain pada izin harus cocok dengan transaksi. Izin perusahaan lain tidak menjadi milik importir hanya karena barang, grup usaha, atau penyedia jasa terlihat sama.</p>

<h3>6. Periksa waktu pemenuhan</h3>

<p>Tentukan mana yang harus sudah tersedia sebelum pengapalan, sebelum tiba, saat pemberitahuan pabean, atau setelah pengeluaran dalam mekanisme yang memang diizinkan. Jangan menganggap dokumen dapat diurus setelah barang datang tanpa membaca ketentuannya.</p>

<h3>7. Rekonsiliasi dengan dokumen shipment</h3>

<p>Cocokkan description, HS Code, quantity, satuan, merek, model, serial number, produsen, negara asal, consignee, dan nilai pada purchase order, invoice, packing list, bill of lading atau air waybill, izin, dan draft PIB. Perbedaan harus diselesaikan sebelum submission.</p>

<h2>Worksheet pemeriksaan lartas</h2>

<table>
<thead><tr><th>Kolom</th><th>Isi yang harus dicatat</th></tr></thead>
<tbody>
<tr><td>Identitas barang</td><td>Nama teknis, fungsi, material, model, kondisi, dan penggunaan.</td></tr>
<tr><td>Klasifikasi</td><td>HS Code kandidat, dasar klasifikasi, reviewer, dan tingkat keyakinan.</td></tr>
<tr><td>Hasil INTR</td><td>Tanggal cek, uraian, instansi, jenis ketentuan, dan tautan aturan.</td></tr>
<tr><td>Dokumen</td><td>Nama dokumen, nomor, pemegang, cakupan, masa berlaku, dan status.</td></tr>
<tr><td>Data shipment</td><td>Supplier, invoice, quantity, negara asal, pelabuhan, dan ETA.</td></tr>
<tr><td>Gap</td><td>Data belum ada, perbedaan identitas, izin belum terbit, atau klarifikasi yang diperlukan.</td></tr>
<tr><td>Keputusan</td><td>Go, hold, redesign, change supplier, atau cancel beserta approver dan tanggal.</td></tr>
</tbody>
</table>

<h2>Kesalahan yang sering terlambat diketahui</h2>

<ul>
<li>Mengecek hanya empat atau enam digit HS, padahal ketentuan berada pada pos nasional yang lebih spesifik.</li>
<li>Menggunakan screenshot INSW lama tanpa verifikasi ulang pada tanggal shipment.</li>
<li>Menganggap barang contoh, spare part, hadiah, atau barang pribadi otomatis bebas persyaratan.</li>
<li>Menggunakan izin dengan perusahaan, merek, model, negara asal, atau jumlah yang tidak cocok.</li>
<li>Mengabaikan kondisi barang tidak baru atau rekondisi.</li>
<li>Menganggap SPPB atau jalur pelayanan tertentu menghapus kewajiban instansi teknis.</li>
<li>Menggabungkan beberapa SKU dalam satu uraian umum sehingga lartas salah satu barang terlewat.</li>
<li>Membayar supplier penuh sebelum kelayakan impor dan dokumen kritis dikonfirmasi.</li>
</ul>

<h2>Jangan menghitung landed cost dengan tarif generik</h2>

<p>Biaya impor harus dihitung dari HS Code, nilai pabean, tarif bea masuk, fasilitas atau tarif preferensi yang benar-benar memenuhi syarat, serta ketentuan perpajakan pada tanggal transaksi. Tambahkan freight, insurance, handling, storage, pemeriksaan, pengujian, surveyor, izin, transportasi lokal, jasa profesional, dan skenario keterlambatan.</p>

<p>Artikel lama sering menulis satu angka PPN atau PPh untuk semua importir. Pendekatan itu tidak aman karena tarif dan perlakuan dapat berubah serta bergantung pada profil transaksi. Simulasi harus menyebut asumsi, sumber tarif, tanggal, dan siapa yang memvalidasi.</p>

<h2>Pembagian tanggung jawab</h2>

<p>Importir bertanggung jawab atas kebenaran barang, klasifikasi, izin, dan pemberitahuan yang diajukan. Supplier menyediakan spesifikasi serta dokumen sumber. PPJK menyiapkan pemberitahuan pabean berdasarkan kuasa dan data yang diterima. Freight forwarder mengoordinasikan pengangkutan sesuai ruang lingkup. Instansi teknis menerbitkan izin atau rekomendasi dalam kewenangannya, sedangkan Bea Cukai melakukan pengawasan serta pelayanan kepabeanan.</p>

<p>Dira dapat membantu mengumpulkan data produk, membuat matriks dokumen, menyusun timeline shipment, dan mengoordinasikan pihak terkait. Dira tidak dapat menjanjikan HS Code, izin, jalur pemeriksaan, tarif, atau pelepasan sebelum keputusan dan pemeriksaan instansi yang berwenang.</p>

<h2>Apa yang dilakukan jika hasil pemeriksaan belum jelas?</h2>

<p>Keputusan yang aman bukan langsung mengirim barang sambil menunggu jawaban. Ubah status transaksi menjadi <em>hold</em>, catat isu yang belum selesai, dan tunjuk satu penanggung jawab. Isu dapat berupa dua HS Code kandidat, spesifikasi supplier belum lengkap, izin masih dalam proses, identitas pada dokumen berbeda, atau aturan baru yang belum tercermin pada rencana impor.</p>

<p>Untuk klasifikasi yang masih diperdebatkan, siapkan dossier produk berisi foto, katalog, fungsi, material, cara kerja, dan argumentasi klasifikasi. Minta konfirmasi tertulis dari pihak yang kompeten sesuai tingkat risiko. Untuk persyaratan instansi teknis, gunakan kanal resmi instansi penerbit dan simpan bukti korespondensi. Percakapan informal tanpa konteks produk yang lengkap tidak cukup menjadi dasar keputusan shipment.</p>

<h3>Kontrol perubahan setelah izin diperoleh</h3>

<p>Supplier kadang mengganti model, komposisi, kemasan, produsen, atau negara asal setelah purchase order. Perubahan tersebut harus memicu pemeriksaan ulang, meskipun nama komersial dan harga tetap sama. Bandingkan dokumen final dengan spesifikasi yang digunakan ketika mencari INTR dan mengurus izin. Bila ada perubahan material, hentikan persetujuan dokumen angkut sampai dampaknya terhadap HS Code, lartas, label, sertifikat, dan izin dikonfirmasi.</p>

<p>Buat satu versi data yang disetujui untuk digunakan oleh purchasing, supplier, import compliance, PPJK, dan freight forwarder. Dengan begitu, uraian barang pada invoice tidak dibuat terpisah dari data yang dipakai dalam izin dan PIB. Kontrol sederhana ini lebih murah daripada demurrage, re-ekspor, pemusnahan, koreksi dokumen, atau sengketa dengan supplier setelah barang tiba.</p>

<h2>Gate sebelum purchase order dan pengapalan</h2>

<ol>
<li>Spesifikasi produk lengkap dan tidak berubah.</li>
<li>HS Code kandidat memiliki dasar yang terdokumentasi.</li>
<li>INTR diperiksa menggunakan kode lengkap pada tanggal terkini.</li>
<li>Seluruh dasar aturan dan cakupan lampiran sudah dibaca.</li>
<li>Izin serta dokumen cocok dengan perusahaan dan barang aktual.</li>
<li>Waktu penerbitan dokumen masuk ke jadwal shipment.</li>
<li>Invoice, packing list, dokumen angkut, izin, dan draft PIB konsisten.</li>
<li>Ada keputusan tertulis untuk setiap gap sebelum supplier mengirim.</li>
</ol>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026. Ketentuan lartas bersifat dinamis. Gunakan INTR, JDIH instansi teknis, dan dokumen produk aktual untuk setiap shipment; artikel ini bukan penetapan klasifikasi atau izin.</p>
HTML,
    ],
];
