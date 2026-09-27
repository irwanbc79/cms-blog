<?php

return [
    'article_id' => 271,
    'site_domain' => 'm2b.co.id',
    'expected' => [
        'title' => 'Panduan Lengkap Cara Impor Produk Makanan & Minuman Resmi BPOM',
        'slug' => 'cara-impor-makanan-minuman-bpom-m2b',
        'status' => 'scheduled',
        'editorial_status' => 'needs_revision',
        'content_sha256' => '681d501d9ab12bcefb2561df703ec4bd690dcbc2ee82645e1520c5cd6684e788',
    ],
    'review_notes' => 'Rewritten from current official BPOM, Customs, and INSW sources on 2026-08-18. Removed stale tax rates, unsupported cost ranges, unrelated news, absolute clearance claims, and unverified service claims. Awaiting human editorial approval.',
    'changes' => [
        'title' => 'Checklist Impor Pangan Olahan: Izin BPOM ML, SKI, dan Customs Clearance',
        'focus_keyword' => 'impor pangan olahan BPOM',
        'meta_description' => 'Checklist impor pangan olahan: klasifikasi produk, akun importir, izin BPOM ML, SKI, label, lartas INSW, dan kesiapan customs clearance.',
        'excerpt' => 'Izin edar BPOM ML, Surat Keterangan Impor, dan customs clearance adalah tiga kontrol berbeda. Kunci data produk dan kewajiban sebelum supplier mengirim barang.',
        'og_title' => 'Checklist Impor Pangan Olahan BPOM dan Customs Clearance',
        'og_description' => 'Urutan verifikasi produk, izin edar ML, SKI, dokumen pengiriman, lartas INSW, dan kesiapan kepabeanan sebelum pangan olahan dikirim ke Indonesia.',
        'pillar' => 'logistik',
        'tags' => ['impor pangan olahan', 'BPOM ML', 'Surat Keterangan Impor', 'customs clearance', 'dokumen impor'],
        'hashtags' => ['ImporPangan', 'BPOMML', 'CustomsClearance', 'LogistikIndonesia', 'M2B'],
        'image_alt_texts' => [
            'Pemeriksaan label dan dokumen pangan olahan impor',
            'Checklist BPOM ML SKI dan customs clearance pangan impor',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah semua makanan dan minuman impor menggunakan izin edar BPOM ML?',
                'answer' => 'Tidak boleh diasumsikan demikian. Pertama tentukan apakah barang merupakan pangan olahan dalam pengawasan BPOM atau termasuk kategori lain seperti pangan segar, produk hewan, atau produk perikanan yang dapat melibatkan otoritas dan persyaratan berbeda. Klasifikasi harus dilakukan berdasarkan produk aktual, bentuk, penggunaan, HS Code, dan ketentuan yang berlaku.',
            ],
            [
                'question' => 'Apa perbedaan izin edar BPOM ML dan Surat Keterangan Impor?',
                'answer' => 'Izin edar BPOM ML terkait persetujuan pendaftaran pangan olahan impor untuk diedarkan. Surat Keterangan Impor atau SKI adalah persetujuan pemasukan untuk shipment atau komoditas yang diwajibkan sesuai ketentuan BPOM. Keduanya bukan dokumen yang sama dan tidak menggantikan pemberitahuan pabean.',
            ],
            [
                'question' => 'Apakah nomor BPOM ML berarti barang otomatis keluar dari pelabuhan?',
                'answer' => 'Tidak. Importir tetap bertanggung jawab atas klasifikasi HS, nilai pabean, dokumen pemberitahuan impor, pembayaran pungutan, pemenuhan larangan atau pembatasan, serta pemeriksaan yang ditetapkan otoritas. Kesesuaian barang aktual dengan izin dan dokumen juga tetap diperiksa.',
            ],
            [
                'question' => 'Kapan pengecekan regulasi harus dilakukan?',
                'answer' => 'Sebelum purchase order dan booking final. Verifikasi ulang saat data invoice, packing list, lot, dan jadwal keberangkatan telah tersedia karena kewajiban dapat bergantung pada HS Code, jenis produk, kemasan, tujuan penggunaan, dan kebijakan yang berlaku pada tanggal impor.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Impor pangan olahan tidak selesai hanya dengan memiliki nomor BPOM atau menyerahkan dokumen kepada PPJK. Ada tiga kontrol yang harus dipisahkan: legalitas produk untuk diedarkan, persetujuan pemasukan yang diwajibkan untuk shipment, dan penyelesaian kewajiban kepabeanan. Kesalahan paling mahal biasanya terjadi ketika barang sudah berangkat, sementara salah satu kontrol tersebut belum siap.</p>

<p>Checklist ini membantu importir melakukan pemeriksaan sebelum purchase order dan booking final. Hasil akhirnya bukan janji barang akan keluar, melainkan keputusan yang lebih aman: lanjut kirim, lengkapi dokumen, ubah desain produk, atau tunda shipment.</p>

<h2>Langkah pertama: tentukan kategori pangan</h2>

<p>Istilah “makanan dan minuman” terlalu luas untuk menentukan izin. Pastikan apakah produk merupakan pangan olahan dalam kemasan eceran, bahan pangan untuk industri, bahan tambahan pangan, pangan segar asal tumbuhan, produk hewan, produk perikanan, minuman beralkohol, pangan untuk keperluan gizi khusus, atau kategori lain. Otoritas, perizinan, dan dokumen dapat berbeda.</p>

<table>
<thead><tr><th>Pertanyaan klasifikasi</th><th>Data yang dibutuhkan</th><th>Mengapa penting</th></tr></thead>
<tbody>
<tr><td>Apa bentuk produk saat tiba?</td><td>Produk jadi retail, bulk, bahan baku, atau sampel.</td><td>Membedakan jalur registrasi, penggunaan, dan dokumen pemasukan.</td></tr>
<tr><td>Siapa pengguna akhirnya?</td><td>Konsumen, industri pengolahan, hotel/restoran, atau uji internal.</td><td>Tujuan penggunaan dapat memengaruhi kategori dan ketentuan.</td></tr>
<tr><td>Apa komposisinya?</td><td>Daftar bahan, bahan tambahan, alergen, klaim, dan kadar tertentu.</td><td>Menentukan kategori pangan, tingkat risiko, label, dan pengujian.</td></tr>
<tr><td>Bagaimana produk diproses?</td><td>Sterilisasi, pasteurisasi, fermentasi, iradiasi, pembekuan, atau proses lain.</td><td>Proses tertentu dapat memengaruhi kategori risiko registrasi.</td></tr>
<tr><td>Apa HS Code yang diusulkan?</td><td>Spesifikasi, fungsi, komposisi, bentuk, dan literatur produk.</td><td>HS Code memengaruhi tarif dan larangan atau pembatasan, tetapi harus ditetapkan dari karakter barang.</td></tr>
</tbody>
</table>

<p>Jangan menggunakan izin produk yang “mirip” sebagai dasar final. Nama dagang serupa belum tentu memiliki komposisi, proses, klaim, kemasan, produsen, atau klasifikasi yang sama. Bila kategorinya belum jelas, selesaikan analisis teknis sebelum supplier mencetak label massal atau mengirim barang.</p>

<h2>Bedakan izin edar BPOM ML, SKI, dan PIB</h2>

<p>Untuk pangan olahan impor yang didaftarkan di BPOM, persetujuan produk menggunakan identitas BPOM RI ML. Laman resmi <a href="https://registrasipangan.pom.go.id/layanan" rel="noopener noreferrer" target="_blank">Direktorat Registrasi Pangan Olahan</a> menjelaskan bahwa pendaftaran produk impor diajukan oleh importir atau distributor yang memperoleh penunjukan dari perusahaan di negara asal. Layanan tersebut juga menjelaskan persyaratan akun dan dokumen produk berdasarkan kategori risiko.</p>

<p>Surat Keterangan Impor atau SKI adalah kontrol pemasukan yang berbeda. Dasar pengawasan pemasukan tercantum pada <a href="https://jdih.pom.go.id/view/slide/1430/26/2022/dd43a15ff2c0811a47248905ddf6e607" rel="noopener noreferrer" target="_blank">Peraturan BPOM Nomor 26 Tahun 2022</a>, yang pada laman JDIH BPOM berstatus berlaku saat artikel ini ditinjau. Pelaku usaha harus memeriksa apakah produk atau bahan yang dimasukkan memerlukan SKI, jenis SKI, dokumen teknis, serta batas waktu pemenuhannya. Cargo release tidak boleh dianggap sebagai bukti bahwa kewajiban pengawasan pasca-perbatasan telah selesai.</p>

<p>PIB adalah pemberitahuan pabean untuk impor barang. Bea Cukai menjelaskan pada layanan <a href="https://www.beacukai.go.id/impor-untuk-dipakai" rel="noopener noreferrer" target="_blank">Impor untuk Dipakai</a> bahwa importir bertanggung jawab memenuhi ketentuan larangan atau pembatasan dari instansi teknis dan memberitahukannya dalam PIB. Jadi, izin edar, SKI, dan PIB memiliki fungsi masing-masing; satu dokumen tidak otomatis menggantikan yang lain.</p>

<h2>Checklist kesiapan perusahaan importir</h2>

<p>Sebelum registrasi produk, pastikan entitas yang akan menjadi pemegang izin dan importir tercatat dengan benar. Untuk akun perusahaan produk impor, sumber resmi BPOM mencantumkan antara lain NPWP, NIB berbasis risiko dengan KBLI yang sesuai, perizinan berusaha menurut tingkat risiko, Sertifikat Pemenuhan Standar Sistem Manajemen Keamanan Pangan Olahan di Sarana Peredaran, surat penunjukan dari perusahaan luar negeri, serta sertifikat GMP, HACCP, sertifikat setara, atau hasil audit pemerintah setempat untuk pabrik asal sesuai persyaratan.</p>

<ul>
<li>Nama dan alamat badan usaha konsisten pada OSS, perpajakan, akun BPOM, kontrak, dan dokumen shipment.</li>
<li>KBLI mencakup kegiatan perdagangan produk yang benar dan status perizinan berbasis risiko sudah efektif.</li>
<li>Gudang serta sistem keamanan pangan pada sarana peredaran memenuhi persyaratan yang relevan.</li>
<li>Letter of Appointment menyebut pihak, produk, merek, wilayah, masa berlaku, dan pengesahan yang dipersyaratkan.</li>
<li>Produsen luar negeri dan fasilitas yang tercantum pada sertifikat mutu sama dengan sumber barang aktual.</li>
</ul>

<p>Perubahan importir, produsen, alamat, varian, atau desain label tidak boleh dianggap sebagai koreksi administratif biasa. Periksa apakah perubahan tersebut membutuhkan registrasi atau variasi sebelum barang diproduksi untuk pasar Indonesia.</p>

<h2>Checklist dokumen produk untuk registrasi</h2>

<p>Persyaratan teknis ditentukan oleh kategori risiko dan karakter produk. Daftar berikut digunakan sebagai kontrol awal, bukan pengganti daftar persyaratan yang muncul pada aplikasi BPOM untuk produk aktual.</p>

<ul>
<li>Komposisi lengkap, termasuk bahan tambahan pangan, bahan penolong, dan persentase bila dipersyaratkan.</li>
<li>Diagram atau uraian proses produksi yang sesuai dengan fasilitas asal.</li>
<li>Spesifikasi bahan baku dan bahan tambahan yang relevan.</li>
<li>Certificate of Analysis atau hasil uji produk akhir untuk parameter yang dipersyaratkan.</li>
<li>Penetapan masa simpan, kode produksi, dan kondisi penyimpanan.</li>
<li>Rancangan label Indonesia dan foto seluruh sisi produk yang dapat dibaca.</li>
<li>Health Certificate atau Certificate of Free Sale untuk produk impor sesuai persyaratan.</li>
<li>Terjemahan tersumpah untuk label atau dokumen berbahasa selain bahasa Inggris bila diwajibkan.</li>
<li>Dokumen tambahan untuk klaim, SNI wajib, organik, rekayasa genetik, iradiasi, halal, atau karakter khusus lainnya.</li>
</ul>

<p>Label harus direkonsiliasi dengan formula dan dokumen. Periksa nama jenis, merek, komposisi, alergen, berat atau isi bersih, identitas produsen dan importir, kode produksi, kedaluwarsa, petunjuk penyimpanan, informasi gizi, klaim, serta nomor izin edar bila sudah diterbitkan. Jangan mencetak stok kemasan besar sebelum rancangan yang digunakan sesuai dengan persetujuan.</p>

<h2>Gate sebelum supplier mengirim barang</h2>

<p>Buat rapat singkat go/no-go untuk setiap SKU dan shipment. Gunakan bukti, bukan asumsi atau pesan informal dari supplier.</p>

<table>
<thead><tr><th>Gate</th><th>Bukti minimum</th><th>Keputusan bila belum siap</th></tr></thead>
<tbody>
<tr><td>Produk</td><td>Kategori pangan, formula, label, produsen, dan SKU final.</td><td>Tahan produksi atau pengiriman sampai perubahan dikunci.</td></tr>
<tr><td>Izin edar</td><td>PB-UMKU atau nomor BPOM RI ML yang cocok dengan produk aktual, bila diwajibkan.</td><td>Jangan memakai izin SKU lain.</td></tr>
<tr><td>Pemasukan</td><td>Kewajiban SKI dan dokumen pengajuan telah dipetakan.</td><td>Susun timeline SKI berdasarkan ketentuan produk.</td></tr>
<tr><td>Kepabeanan</td><td>HS Code, nilai pabean, lartas, dan dokumen PIB telah direview.</td><td>Lakukan klarifikasi sebelum booking final.</td></tr>
<tr><td>Logistik</td><td>Incoterms, suhu, umur simpan tersisa, lot, pallet, dan jadwal siap.</td><td>Ubah moda, jadwal, atau spesifikasi handling.</td></tr>
</tbody>
</table>

<h2>Verifikasi lartas dan pungutan tanpa memakai angka generik</h2>

<p>Tarif bea masuk dan pajak impor tidak aman dihitung menggunakan satu persentase untuk semua pangan. Hasilnya bergantung pada HS Code, nilai pabean, negara asal dan dokumen asal bila memakai tarif preferensi, fasilitas, jenis barang, serta ketentuan pajak pada tanggal impor. Gunakan spesifikasi produk dan dokumen transaksi aktual untuk simulasi landed cost.</p>

<p>Bea Cukai mengarahkan pengecekan larangan atau pembatasan ke portal Indonesia National Single Window sebagai single reference. Gunakan <a href="https://insw.go.id/intr" rel="noopener noreferrer" target="_blank">Indonesia National Trade Repository</a> untuk memeriksa HS Code dan regulasi terkait, lalu konfirmasi hasilnya terhadap produk aktual. Tangkapan layar lama atau shipment perusahaan lain bukan dasar yang cukup karena ketentuan dan uraian barang dapat berbeda.</p>

<p>Dokumen komersial juga harus konsisten: purchase order, commercial invoice, packing list, bill of lading atau air waybill, polis asuransi bila ada, dokumen asal, dan dokumen perizinan. Selisih nama produk, satuan, jumlah, berat, produsen, consignee, atau Incoterms harus diselesaikan sebelum pengajuan PIB.</p>

<h2>Kontrol khusus pangan dalam perjalanan</h2>

<p>Pangan membawa risiko mutu yang tidak terlihat dari dokumen. Kunci batas suhu, kelembapan, kebersihan kontainer, larangan muat bersama, ventilasi, perlindungan bau, serta umur simpan minimum saat tiba. Catat nomor lot dan tanggal kedaluwarsa per kemasan. Untuk reefer, sepakati set point, toleransi, pre-cooling, sumber listrik, dan bukti pemantauan suhu.</p>

<p>Perhitungkan waktu untuk pemeriksaan, pengujian, atau klarifikasi tanpa membuat janji hari yang sama pada semua shipment. Produk dengan umur simpan pendek memerlukan buffer yang berbeda dari produk kering. Rencana biaya harus memuat skenario storage, demurrage atau detention, pemeriksaan, sampling, relabeling yang diizinkan, pengembalian, dan pemusnahan bila terjadi ketidaksesuaian.</p>

<h2>Pembagian tanggung jawab</h2>

<table>
<thead><tr><th>Pihak</th><th>Tanggung jawab utama</th></tr></thead>
<tbody>
<tr><td>Pemegang izin atau importir</td><td>Kebenaran produk, izin, kepatuhan pemasukan, label, distribusi, dan data yang disampaikan.</td></tr>
<tr><td>Supplier atau produsen</td><td>Formula, proses, mutu, dokumen fasilitas, label sumber, lot, dan kesesuaian barang.</td></tr>
<tr><td>BPOM</td><td>Evaluasi registrasi dan pengawasan pemasukan atau peredaran dalam kewenangannya.</td></tr>
<tr><td>Bea Cukai</td><td>Pengawasan dan pelayanan kepabeanan berdasarkan pemberitahuan serta ketentuan yang berlaku.</td></tr>
<tr><td>PPJK atau freight forwarder</td><td>Pelaksanaan jasa sesuai kuasa dan ruang lingkup, koordinasi dokumen, pengangkutan, dan status operasional.</td></tr>
</tbody>
</table>

<p>M2B dapat membantu menyiapkan timeline logistik, merekonsiliasi data pengiriman, mengidentifikasi dokumen yang belum tersedia, dan menangani proses kepabeanan sesuai ruang lingkup penugasan. Penetapan izin, klasifikasi, tarif, pemeriksaan, dan pelepasan tetap berada pada kewenangan instansi terkait; hasilnya tidak dapat dijanjikan oleh penyedia jasa.</p>

<h2>Data awal untuk review shipment M2B</h2>

<p>Kirimkan nama produk, merek, komposisi, bentuk dan kemasan, negara serta pabrik asal, pemegang izin, nomor BPOM bila ada, HS Code usulan, quantity, berat, nilai dan Incoterms, pelabuhan muat dan bongkar, moda, target keberangkatan, umur simpan, kondisi suhu, serta salinan persyaratan atau dokumen BPOM yang telah tersedia. Tim dapat menyusun daftar gap sebelum quotation dan booking dikunci.</p>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026 dan menggunakan sumber resmi sebagai titik awal. Regulasi, layanan elektronik, klasifikasi, dan kewajiban per produk dapat berubah. Verifikasi ulang pada portal BPOM, Bea Cukai, INSW, dan OSS untuk transaksi yang sebenarnya.</p>
HTML,
    ],
];
