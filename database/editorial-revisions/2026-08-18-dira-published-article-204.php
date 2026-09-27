<?php

return [
    'article_id' => 204,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'HS Code Impor UMKM 2026: Panduan Lengkap Terbaru',
        'slug' => 'hs-code-impor-umkm-2026-panduan-lengkap-terbaru',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '124c6b11f3b312cbb39f6f0f2d43402013790fa26cf274f65842cb260b2627ac',
    ],
    'review_notes' => 'Live source-quality remediation on 2026-08-18. Removed unrelated commercial and news links, trend padding, promotional certainty, and unsupported HS claims. Rebuilt as a product-dossier, KUM HS, INTR, and PKSI decision workflow. Requires human editorial re-review.',
    'changes' => [
        'title' => 'Menentukan HS Code Impor: Product Dossier, KUM HS, dan PKSI',
        'focus_keyword' => 'menentukan HS Code impor',
        'meta_description' => 'Cara menentukan HS Code impor dengan product dossier, KUM HS, catatan bagian dan bab, INTR, impact test, reviewer, serta escalation gate PKSI.',
        'excerpt' => 'HS Code tidak dipilih dari nama dagang atau tarif termurah. Susun product dossier, uji kandidat dengan KUM HS, cek INTR, lalu eskalasi bila dampaknya material.',
        'og_title' => 'Menentukan HS Code Impor: Product Dossier, KUM HS, dan PKSI',
        'og_description' => 'Workflow klasifikasi barang impor yang dapat diaudit: identifikasi barang, kandidat pos, KUM HS, INTR, impact test, review, dan PKSI.',
        'pillar' => 'regulasi-impor',
        'tags' => ['HS Code', 'klasifikasi barang', 'product dossier', 'KUM HS', 'PKSI'],
        'hashtags' => ['HSCode', 'KlasifikasiBarang', 'PKSI', 'INTR', 'CustomsCompliance'],
        'image_alt_texts' => [
            'Tim impor menyusun product dossier untuk menentukan HS Code',
            'Matriks kandidat HS Code KUM HS tarif dan lartas',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah HS Code dari supplier dapat langsung dipakai di Indonesia?',
                'answer' => 'Tidak otomatis. Kode supplier dapat menjadi referensi, tetapi importir perlu memeriksa spesifikasi, kondisi barang saat diimpor, struktur pos Indonesia, catatan hukum, KUM HS, dan regulasi yang berlaku.',
            ],
            [
                'question' => 'Apakah memilih HS Code dengan tarif terendah diperbolehkan?',
                'answer' => 'Klasifikasi ditentukan oleh karakter dan kondisi barang serta ketentuan klasifikasi, bukan oleh tarif yang diinginkan. Dampak tarif baru diperiksa setelah kandidat klasifikasi disusun secara objektif.',
            ],
            [
                'question' => 'Kapan importir perlu mempertimbangkan PKSI?',
                'answer' => 'Pertimbangkan eskalasi ketika klasifikasi tidak pasti dan perbedaannya berdampak material pada tarif, lartas, fasilitas, atau kelayakan transaksi. Periksa syarat, kanal, status aturan, dan kecocokan kasus sebelum mengajukan.',
            ],
            [
                'question' => 'Apakah hasil pencarian INTR merupakan jaminan klasifikasi?',
                'answer' => 'Tidak. INTR membantu memeriksa uraian, tarif, dan lartas untuk kode kandidat. Penetapan klasifikasi tetap berada pada kewenangan Bea Cukai berdasarkan barang dan data yang sebenarnya.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>HS Code bukan kata kunci produk, bukan kode dari marketplace, dan bukan angka yang dipilih karena tarifnya paling rendah. Klasifikasi barang dimulai dari kondisi objektif barang pada saat diimpor: bahan, fungsi, cara kerja, komposisi, tingkat pengerjaan, bentuk penyajian, dan kelengkapannya.</p>

<p>Per 18 Agustus 2026, kerangka tarif Indonesia yang diperiksa adalah <a href="https://jdih.kemenkeu.go.id/dok/26-pmk-010-2022/overview" target="_blank" rel="noopener noreferrer">PMK 26/PMK.010/2022</a> beserta perubahan terakhir melalui <a href="https://jdih.kemenkeu.go.id/dok/pmk-50-tahun-2026" target="_blank" rel="noopener noreferrer">PMK 50 Tahun 2026</a>. Artikel lama memakai tautan DHL dan berita umum untuk menjelaskan klasifikasi kepabeanan. Tautan serta materi tren yang tidak membuktikan klaim tersebut telah dihapus.</p>

<h2>Output yang benar bukan hanya satu kode</h2>

<p>Working paper klasifikasi yang dapat dipertanggungjawabkan sekurang-kurangnya menghasilkan enam keluaran:</p>

<ol>
<li>identitas dan spesifikasi barang yang terkunci;</li>
<li>kondisi barang saat melintasi batas pabean;</li>
<li>pos atau subpos kandidat beserta dasar penerimaan atau penolakannya;</li>
<li>kode nasional yang paling sesuai berdasarkan sumber yang berlaku;</li>
<li>dampak tarif, lartas, trade remedies, fasilitas, dan dokumen; serta</li>
<li>reviewer, tanggal, sumber, asumsi, dan escalation decision.</li>
</ol>

<p>Menulis “HS 1234 karena supplier menyatakan demikian” belum merupakan analisis. Demikian pula, hasil pencarian berdasarkan nama umum seperti “mesin”, “food supplement”, atau “spare part” belum cukup untuk mengunci pos.</p>

<h2>Langkah 1: susun product dossier</h2>

<table>
<thead><tr><th>Kelompok barang</th><th>Data minimum yang dicari</th><th>Bukti</th></tr></thead>
<tbody>
<tr><td>Mesin/peralatan</td><td>Fungsi utama, cara kerja, kapasitas, daya, konfigurasi, komponen, dan apakah unit lengkap atau bagian.</td><td>Datasheet, manual, diagram, foto, video kerja, dan penjelasan engineer.</td></tr>
<tr><td>Bahan kimia</td><td>Nama kimia, CAS bila relevan, komposisi, kadar, bentuk, penggunaan, dan kemasan.</td><td>SDS, certificate of analysis, formula, technical data sheet.</td></tr>
<tr><td>Pangan/hasil pertanian</td><td>Spesies, bahan, proses, kadar, kondisi segar/kering/beku, bentuk, kemasan, dan tujuan penggunaan.</td><td>Spesifikasi, foto, hasil uji, flow proses, label, dan dokumen produsen.</td></tr>
<tr><td>Tekstil/produk jadi</td><td>Komposisi serat, konstruksi, coating, ukuran, gender atau penggunaan, tingkat pengerjaan.</td><td>Material breakdown, sampel, foto, test report, dan katalog teknis.</td></tr>
<tr><td>Set atau barang gabungan</td><td>Seluruh komponen, fungsi masing-masing, cara dikemas, nilai, kuantitas, dan fungsi yang memberi karakter utama.</td><td>Bill of material, packing configuration, foto set, dan kontrak.</td></tr>
</tbody>
</table>

<p>Nama merek diletakkan sebagai data tambahan, bukan inti uraian. Dossier harus menjelaskan barang tanpa mengandalkan brosur pemasaran. Bila supplier memberi beberapa versi model, pisahkan dossier karena perubahan material, kapasitas, atau kelengkapan dapat mengubah analisis.</p>

<h2>Langkah 2: tetapkan kondisi barang saat diimpor</h2>

<p>Klasifikasi mengikuti barang sebagaimana disajikan saat diimpor. Karena itu, dokumentasikan apakah barang lengkap, belum dirakit, terurai, berupa campuran, bagian, aksesori, set penjualan eceran, kemasan kombinasi, atau dikirim dalam beberapa lot. Jangan menganalisis hanya dari produk akhir yang akan dibuat setelah barang masuk.</p>

<p>Rekonsiliasi dossier dengan purchase order, invoice, packing list, foto pengemasan, dan rencana pengapalan. Bila invoice hanya menulis “parts” sementara dossier menunjukkan beberapa komponen berbeda, minta supplier memperbaiki uraian sebelum booking.</p>

<h2>Langkah 3: cari kandidat secara objektif</h2>

<p>Mulai dari fungsi dan karakter teknis, lalu cari uraian pos yang relevan. Baca struktur dari bagian, bab, pos, subpos, hingga kode nasional. Jangan berhenti pada hasil pencarian pertama. Susun sedikitnya satu kandidat utama dan kandidat pembanding bila barang berpotensi masuk ke lebih dari satu pos.</p>

<p>Untuk setiap kandidat, tulis:</p>

<ul>
<li>uraian pos dan ruang lingkupnya;</li>
<li>catatan bagian atau bab yang memasukkan atau mengecualikan barang;</li>
<li>KUM HS yang relevan terhadap kondisi barang;</li>
<li>fakta teknis dossier yang mendukung;</li>
<li>fakta yang melemahkan atau menggugurkan kandidat; dan</li>
<li>data tambahan yang masih harus diminta.</li>
</ul>

<p>Proses ini mencegah tim menyesuaikan alasan setelah melihat tarif. Kode dengan bea masuk lebih rendah tidak menjadi lebih benar hanya karena membuat landed cost terlihat menarik.</p>

<h2>Langkah 4: gunakan KUM HS dan catatan hukum</h2>

<p>KUM HS digunakan secara berurutan sesuai kebutuhan untuk membaca uraian pos, barang tidak lengkap atau belum dirakit, campuran atau gabungan, barang yang tampak masuk beberapa pos, kemasan, dan kondisi lain yang diatur. Analisis tidak boleh melompat langsung ke aturan yang menghasilkan kode yang diinginkan.</p>

<p>Catatan bagian dan bab merupakan bagian penting dari struktur klasifikasi. Sebuah fungsi yang tampak sesuai pada judul bab dapat dikecualikan oleh catatan hukum. Karena itu, matriks kandidat wajib mencatat bukan hanya alasan “masuk”, tetapi juga uji pengecualian.</p>

<h2>Langkah 5: validasi kode nasional di INTR</h2>

<p>Setelah kandidat disusun, buka <a href="https://insw.go.id/intr" target="_blank" rel="noopener noreferrer">INTR INSW</a>. Cocokkan kode lengkap, uraian, satuan, tarif, lartas, dan dasar regulasinya. Simpan tanggal pemeriksaan serta tautan aturan; hasil cetak atau screenshot tanpa kode lengkap dan tanggal mudah disalahgunakan untuk shipment berikutnya.</p>

<p>INTR adalah alat validasi dan pemetaan dampak, bukan pengganti analisis barang. Bila kata kunci menghasilkan beberapa kode, kembali ke dossier dan catatan hukum. Bila uraian barang berubah, pemeriksaan harus diulang.</p>

<h2>Langkah 6: lakukan impact test sebelum keputusan</h2>

<table>
<thead><tr><th>Perbedaan kandidat</th><th>Dampak yang diperiksa</th><th>Keputusan</th></tr></thead>
<tbody>
<tr><td>Tarif berbeda</td><td>Bea masuk, pajak, trade remedies, dan landed cost.</td><td>Review klasifikasi dan skenario biaya.</td></tr>
<tr><td>Lartas berbeda</td><td>Izin, registrasi, rekomendasi, survey, standar, karantina, atau label.</td><td>Tahan shipment sampai kewajiban dipastikan.</td></tr>
<tr><td>Fasilitas berbeda</td><td>Kelayakan skema, persyaratan asal, dan bukti pendukung.</td><td>Gunakan skenario konservatif sampai syarat terbukti.</td></tr>
<tr><td>Satuan atau uraian berbeda</td><td>Konsistensi invoice, packing list, izin, dan draft PIB.</td><td>Perbaiki master data dan dokumen.</td></tr>
</tbody>
</table>

<p>Beri rating keyakinan tinggi, sedang, atau rendah berdasarkan kelengkapan data dan kekuatan dasar. Rating bukan persentase keberhasilan. Ia menentukan siapa reviewer dan apakah keputusan boleh dilanjutkan.</p>

<h2>Kapan eskalasi ke PKSI dipertimbangkan</h2>

<p><a href="https://jdih.kemenkeu.go.id/dok/194-pmk-04-2016" target="_blank" rel="noopener noreferrer">PMK 194/PMK.04/2016</a> mengatur tata cara pengajuan dan penetapan klasifikasi barang impor sebelum penyerahan pemberitahuan pabean. PKSI patut dipertimbangkan ketika data sudah lengkap, tetapi perbedaan klasifikasi memiliki dampak material terhadap tarif, lartas, fasilitas, atau kelayakan transaksi.</p>

<p>Sebelum mengandalkan mekanisme tersebut, periksa status regulasi, kriteria pemohon, kondisi yang tidak dapat diajukan, format data, kanal, dan penggunaan hasil penetapan yang berlaku pada saat permohonan. Jangan menjanjikan hasil atau waktu terbit. Dossier yang tidak lengkap tetap menghasilkan permintaan data atau analisis yang lemah.</p>

<h2>Gate sebelum purchase order dan shipment</h2>

<ul>
<li>Produk, model, komposisi, fungsi, dan kondisi saat impor sudah terkunci.</li>
<li>Dossier terhubung ke supplier, PO, invoice, dan packing plan.</li>
<li>Kandidat utama serta pembanding memiliki alasan dan uji pengecualian.</li>
<li>KUM HS dan catatan bagian/bab telah diperiksa.</li>
<li>Kode nasional, tarif, satuan, dan lartas telah dicek pada sumber bertanggal.</li>
<li>Dampak kandidat terhadap biaya dan izin telah disimulasikan.</li>
<li>Reviewer independen telah mencatat keputusan dan gap.</li>
<li>Shipment berstatus hold bila data atau izin material belum selesai.</li>
</ul>

<h2>Contoh kerja: satu nama dagang, tiga kemungkinan kondisi</h2>

<p>Sebuah UMKM hendak mengimpor perangkat pengemasan yang oleh supplier ditulis sebagai “automatic packing machine”. Nama itu belum cukup. Tim meminta diagram proses dan menemukan tiga opsi penawaran: mesin lengkap dengan unit penimbang, mesin tanpa unit penimbang, dan modul kontrol pengganti. Ketiganya tidak boleh langsung memakai satu kode hanya karena berada dalam katalog yang sama.</p>

<p>Untuk mesin lengkap, dossier mencatat fungsi utama, aliran produk, cara penutupan kemasan, kapasitas, sumber daya, komponen, dan konfigurasi saat dikirim. Untuk mesin tanpa unit penimbang, tim memeriksa apakah kondisi belum lengkapnya diperlakukan seperti barang lengkap berdasarkan fakta dan ketentuan yang relevan, atau justru masuk pada klasifikasi lain. Modul kontrol dianalisis tersendiri berdasarkan fungsi, konstruksi, dan hubungan dengan mesin; istilah “spare part” pada invoice bukan dasar akhir.</p>

<p>Tim lalu membangun matriks kandidat. Setiap baris memuat uraian pos, catatan hukum, KUM HS, fakta pendukung, fakta yang tidak sesuai, serta dokumen yang masih kurang. Setelah kandidat mengerucut, kode nasional diperiksa di INTR untuk melihat satuan, tarif, dan lartas. Dampak setiap kandidat dicatat, tetapi besarnya tarif tidak dipakai untuk memilih pemenang.</p>

<p>Keputusan tetap <em>hold</em> ketika supplier belum mengunci konfigurasi pengiriman. Setelah konfigurasi dan dokumen konsisten, reviewer menandatangani working paper. Bila dua kandidat masih sama kuat dan perbedaannya mengubah izin atau biaya secara material, transaksi dieskalasi untuk kajian lebih lanjut atau mekanisme resmi yang relevan sebelum pengapalan. Contoh ini tidak memberikan kode untuk mesin tertentu; kode memerlukan spesifikasi produk aktual.</p>

<h2>Kelola HS Code sebagai master data berversi</h2>

<p>Simpan hasil review dalam register produk, bukan hanya di folder shipment. Hubungkan SKU internal dengan produsen, model, revision number, spesifikasi, foto, kandidat HS, kode yang digunakan, dasar analisis, sumber peraturan, lartas, reviewer, dan tanggal. Tandai dokumen yang berlaku untuk satu shipment dan dokumen yang dapat dipakai kembali.</p>

<p>Master tidak berarti kode berlaku selamanya. Buat pemicu review ulang ketika material, komposisi, fungsi, kapasitas, firmware yang mengubah fungsi, kelengkapan, kemasan set, supplier, negara asal, atau regulasi berubah. Purchasing tidak boleh membuat PO untuk varian baru dengan menyalin kode lama tanpa pemeriksaan perubahan.</p>

<p>Batasi hak edit dan simpan audit trail. Analis mengusulkan perubahan; reviewer menyetujui atau menolak dengan alasan; operator PIB menggunakan versi yang telah dilepas. Bila kode aktual berbeda dari master, sistem harus meminta exception note agar selisih tidak hilang setelah clearance.</p>

<h2>Pembagian tanggung jawab</h2>

<p>Supplier menyediakan fakta teknis dan dokumen produk. Purchasing memastikan barang yang dipesan sama dengan dossier. Customs compliance menyusun analisis, memetakan dampak, dan menjaga sumber. PPJK dapat membantu berdasarkan kuasa dan data yang diterima. Importir tetap bertanggung jawab atas kebenaran pemberitahuan, sedangkan Bea Cukai berwenang melakukan penelitian, pemeriksaan, dan penetapan.</p>

<p>Dira dapat membantu menyiapkan product dossier, matriks kandidat, daftar gap, dan rekonsiliasi dokumen. Bantuan tersebut bukan penetapan HS Code dan tidak menjamin tarif, izin, jalur pemeriksaan, atau pelepasan barang.</p>

<h2>Kontrol setelah clearance</h2>

<p>Bandingkan kode, uraian, satuan, tarif, lartas, dan biaya aktual dengan working paper. Bila terdapat koreksi atau informasi baru, catat akar masalah dan perbarui master produk. Jangan menyalin kode shipment lama ke model lain tanpa menguji apakah material, fungsi, komposisi, atau kondisi impornya sama.</p>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026 berdasarkan PMK 26/PMK.010/2022 beserta perubahan terakhir PMK 50 Tahun 2026, INTR INSW, dan PMK 194/PMK.04/2016. Artikel ini bukan penetapan klasifikasi, tarif, lartas, fasilitas, atau persetujuan shipment tertentu.</p>
HTML,
    ],
];
