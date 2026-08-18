<?php

return [
    'article_id' => 105,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Panduan Lengkap Aturan Terbaru Tarif Bea Masuk Impor Barang Kargo 2026',
        'slug' => 'panduan-lengkap-aturan-terbaru-tarif-bea-masuk-impor-barang-kargo-2026',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '3ef825aad229b546e299fb87cf597e8e09ced4610f50346e81ffe236072097a8',
    ],
    'review_notes' => 'Live misinformation remediation on 2026-08-18. Removed fabricated HS 2026, PMK 26/2026, commodity tariffs, CEISA version, statistics, testimonials, and tax calculations. Rebuilt around PMK 50/2026 and official verification gates. Requires human editorial re-review.',
    'changes' => [
        'title' => 'Tarif Bea Masuk Kargo: Workflow HS Code, MFN, dan FTA',
        'focus_keyword' => 'tarif bea masuk kargo',
        'meta_description' => 'Workflow tarif bea masuk kargo: klasifikasikan barang, cek MFN dan FTA, nilai pabean, trade remedies, lartas, lalu dokumentasikan simulasi.',
        'excerpt' => 'Tarif impor tidak ditentukan dari nama komoditas. Kunci spesifikasi dan HS Code, lalu periksa MFN, FTA, trade remedies, nilai pabean, serta lartas.',
        'og_title' => 'Tarif Bea Masuk Kargo: Workflow HS Code, MFN, dan FTA',
        'og_description' => 'Checklist menentukan HS Code, tarif MFN, preferensi FTA, nilai pabean, trade remedies, lartas, dan landed cost sebelum shipment.',
        'pillar' => 'regulasi-impor',
        'tags' => ['tarif bea masuk', 'HS Code', 'MFN', 'FTA', 'nilai pabean'],
        'hashtags' => ['BeaMasuk', 'HSCode', 'MFN', 'FTA', 'CustomsCompliance'],
        'image_alt_texts' => [
            'Tim impor memeriksa HS Code tarif MFN dan FTA barang kargo',
            'Worksheet nilai pabean bea masuk dan landed cost impor',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah Indonesia memakai HS 2026 untuk seluruh barang impor?',
                'answer' => 'Artikel ini tidak menggunakan istilah HS 2026 sebagai nomenklatur umum. Per 18 Agustus 2026, sumber resmi yang diperiksa adalah PMK 26/PMK.010/2022 beserta perubahan terakhir PMK 50 Tahun 2026. Gunakan struktur dan tarif yang berlaku pada tanggal pemberitahuan.',
            ],
            [
                'question' => 'Apakah tarif FTA selalu nol persen?',
                'answer' => 'Tidak. Tarif preferensi mengikuti perjanjian, pos tarif, jadwal komitmen, asal barang, bukti asal, direct consignment, dan ketentuan prosedural. Bila satu syarat tidak terpenuhi, tarif preferensi dapat tidak digunakan.',
            ],
            [
                'question' => 'Apakah PPJK dapat menjamin HS Code dan tarif?',
                'answer' => 'Tidak. PPJK dapat membantu menyiapkan klasifikasi dan pemberitahuan berdasarkan data yang diberikan. Importir tetap harus memastikan spesifikasi, klasifikasi, nilai, izin, dan dokumen benar; penetapan berada pada kewenangan Bea Cukai.',
            ],
            [
                'question' => 'Kapan simulasi landed cost harus diperbarui?',
                'answer' => 'Perbarui ketika spesifikasi, HS Code, harga, incoterm, freight, insurance, negara asal, skema FTA, kurs, regulasi, atau jadwal shipment berubah. Cantumkan tanggal dan sumber setiap asumsi.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Tarif bea masuk kargo tidak dapat ditentukan hanya dari nama barang atau tabel lama. “Kopi”, “mesin”, “karet”, dan “komponen elektronik” masih terlalu umum. Tarif baru dapat disimulasikan setelah karakter barang, HS Code, nilai pabean, negara asal, fasilitas, serta kewajiban tambahan diperiksa.</p>

<p>Per 18 Agustus 2026, kerangka tarif yang diperiksa adalah <a href="https://jdih.kemenkeu.go.id/dok/26-pmk-010-2022/overview" target="_blank" rel="noopener noreferrer">PMK 26/PMK.010/2022</a> beserta perubahan terbarunya, <a href="https://jdih.kemenkeu.go.id/dok/pmk-50-tahun-2026" target="_blank" rel="noopener noreferrer">PMK 50 Tahun 2026</a>, yang berlaku sejak 28 Juli 2026. Artikel lama menyebut “HS 2026”, PMK 26/2026, tarif komoditas, sistem CEISA tertentu, serta statistik tanpa sumber. Semua klaim tersebut telah dihapus.</p>

<h2>Pisahkan tujuh pertanyaan yang sering tercampur</h2>

<table>
<thead><tr><th>Pertanyaan</th><th>Output yang dibutuhkan</th><th>Sumber kerja</th></tr></thead>
<tbody>
<tr><td>Apa barangnya?</td><td>Spesifikasi teknis yang lengkap dan konsisten.</td><td>Katalog, datasheet, foto, komposisi, fungsi, dan penjelasan produsen.</td></tr>
<tr><td>Apa HS Code-nya?</td><td>Pos tarif kandidat dan argumentasi klasifikasi.</td><td>Ketentuan klasifikasi, uraian pos, catatan bagian/bab, dan data barang.</td></tr>
<tr><td>Berapa tarif MFN?</td><td>Tarif umum pada pos yang berlaku.</td><td>PMK tarif dan <a href="https://insw.go.id/intr" target="_blank" rel="noopener noreferrer">INTR INSW</a>.</td></tr>
<tr><td>Apakah ada FTA?</td><td>Tarif preferensi serta syarat asal dan prosedurnya.</td><td>Perjanjian, PMK pelaksana, rules of origin, dan bukti asal.</td></tr>
<tr><td>Apakah ada trade remedies?</td><td>BMAD, BMTP, imbalan, atau tindakan lain yang relevan.</td><td>Peraturan produk, negara, eksportir, dan periode berlaku.</td></tr>
<tr><td>Berapa nilai pabean?</td><td>Dasar penghitungan yang didukung dokumen transaksi.</td><td>Invoice, pembayaran, kontrak, freight, insurance, dan penyesuaian.</td></tr>
<tr><td>Apa kewajiban non-tarif?</td><td>Lartas, izin, label, standar, karantina, atau pengawasan lain.</td><td>INTR dan JDIH instansi teknis.</td></tr>
</tbody>
</table>

<p>Kesalahan umum adalah mengambil satu angka tarif dari internet lalu menggunakannya untuk seluruh biaya impor. Padahal pos tarif dapat berubah karena material, fungsi, kapasitas, proses produksi, atau kondisi barang. Tarif preferensi juga tidak otomatis berlaku hanya karena supplier berada di negara mitra.</p>

<h2>Langkah 1: kunci spesifikasi sebelum klasifikasi</h2>

<p>Buat product dossier sebelum meminta kode. Untuk mesin, catat fungsi utama, cara kerja, daya, kapasitas, komponen, dan apakah unit lengkap atau bagian. Untuk bahan kimia, catat komposisi, kadar, bentuk, penggunaan, dan safety data sheet. Untuk pangan atau komoditas, catat spesies, proses, grade, bentuk, kadar, kemasan, dan tujuan penggunaan.</p>

<p>Supplier HS Code dapat dipakai sebagai referensi, tetapi bukan keputusan otomatis. Digit nasional, interpretasi, serta informasi yang dimiliki supplier dapat berbeda. Jangan memilih kode berdasarkan tarif paling rendah atau izin paling mudah.</p>

<h2>Langkah 2: susun argumentasi HS Code</h2>

<ol>
<li>Tulis uraian barang dengan bahasa teknis, bukan merek.</li>
<li>Identifikasi bahan, fungsi, tingkat pengerjaan, dan bentuk saat diimpor.</li>
<li>Susun dua atau tiga kandidat bila klasifikasi belum jelas.</li>
<li>Baca uraian pos, catatan bagian, catatan bab, dan ketentuan klasifikasi terkait.</li>
<li>Dokumentasikan alasan kandidat diterima atau ditolak.</li>
<li>Catat reviewer, tanggal, dokumen produk, dan tingkat keyakinan.</li>
</ol>

<p>Jika selisih kode mengubah tarif, izin, trade remedies, atau kelayakan impor, naikkan keputusan untuk kajian yang lebih kuat sebelum purchase order atau shipment. Dossier yang baik memungkinkan tim mengulang analisis ketika model atau komposisi berubah.</p>

<h2>Langkah 3: periksa tarif MFN yang berlaku</h2>

<p>Buka INTR menggunakan kode lengkap. Cocokkan uraian barang, satuan, tarif bea masuk, pajak, dan lartas. Lalu buka dasar regulasinya. PMK 50 Tahun 2026 adalah perubahan ketiga atas PMK 26/PMK.010/2022; keberadaan perubahan tidak berarti seluruh pos tarif berubah. Periksa lampiran dan riwayat dokumen untuk pos yang benar-benar terdampak.</p>

<p>Simpan bukti pemeriksaan berisi tanggal, kode, uraian, tarif, tautan peraturan, dan nama pemeriksa. Screenshot tanpa tanggal atau kode lengkap tidak cukup menjadi working paper.</p>

<h2>Langkah 4: uji kelayakan tarif FTA</h2>

<p>Tarif preferensi bukan diskon otomatis. Tim perlu menjawab:</p>

<ul>
<li>Apakah pos tarif memiliki komitmen preferensi dalam perjanjian yang digunakan?</li>
<li>Apakah barang memenuhi rules of origin, bukan sekadar dikirim dari negara mitra?</li>
<li>Apakah bukti asal diterbitkan atau dibuat sesuai prosedur?</li>
<li>Apakah eksportir, produsen, invoice, dan rute konsisten?</li>
<li>Apakah ketentuan direct consignment atau transit dipenuhi?</li>
<li>Apakah bukti asal tersedia dalam waktu yang dipersyaratkan?</li>
</ul>

<p>Buat dua skenario landed cost: MFN dan FTA. Gunakan FTA sebagai skenario dasar hanya setelah persyaratan asal serta prosedur dapat dibuktikan. Bila dokumen masih menunggu, catat siapa penanggung jawab dan batas waktu sebelum pengapalan.</p>

<h2>Langkah 5: periksa pungutan tambahan dan lartas</h2>

<p>Tarif MFN bukan seluruh kewajiban. Barang tertentu dapat terkait trade remedies, cukai, PPnBM, larangan atau pembatasan, karantina, standar, label, atau izin teknis. Trade remedies dapat bergantung pada produk, negara asal, produsen atau eksportir, dan masa berlaku. Jangan menyimpulkan hanya dari empat digit HS.</p>

<p>Pemeriksaan lartas dilakukan terpisah dari tarif. Tarif nol tidak menghapus izin, dan izin tidak otomatis memberi tarif preferensi. Rekonsiliasi seluruh hasil pada satu matriks shipment.</p>

<h2>Langkah 6: hitung nilai pabean dengan asumsi terbuka</h2>

<p>Mulai dari harga transaksi yang dapat dibuktikan, lalu petakan freight, insurance, assists, royalty, proceeds, atau penyesuaian lain bila relevan. Incoterm membantu membaca komponen harga, tetapi tidak menggantikan penelitian dokumen. Hubungan antara penjual dan pembeli, diskon, barang gratis, atau pembayaran tidak langsung perlu dijelaskan.</p>

<table>
<thead><tr><th>Komponen</th><th>Sumber angka</th><th>Status</th></tr></thead>
<tbody>
<tr><td>Harga barang</td><td>Invoice, kontrak, purchase order, dan bukti pembayaran.</td><td>Terkonfirmasi atau sementara.</td></tr>
<tr><td>Freight</td><td>Quotation dan invoice pengangkut.</td><td>Aktual atau estimasi.</td></tr>
<tr><td>Insurance</td><td>Polis atau dasar perhitungan yang digunakan.</td><td>Ada, tidak ada, atau perlu penyesuaian.</td></tr>
<tr><td>Kurs</td><td>Ketentuan kurs pada periode pemberitahuan.</td><td>Belum final sampai tanggal relevan.</td></tr>
<tr><td>Tarif</td><td>HS Code, MFN/FTA, dan peraturan yang berlaku.</td><td>Diverifikasi beserta tanggal.</td></tr>
</tbody>
</table>

<h2>Simulasi landed cost yang dapat diaudit</h2>

<p>Misalkan sebuah perusahaan mengimpor komponen pengolahan pangan. Tim memiliki dua HS Code kandidat dan supplier menawarkan bukti asal. Jangan memasukkan satu tarif ke spreadsheet sebelum klasifikasi selesai. Buat tiga skenario:</p>

<ol>
<li><strong>Skenario A:</strong> kode kandidat pertama dengan tarif MFN.</li>
<li><strong>Skenario B:</strong> kode kandidat kedua dengan tarif MFN dan kemungkinan lartas berbeda.</li>
<li><strong>Skenario C:</strong> kode yang disetujui dengan tarif FTA, hanya jika origin serta prosedur terpenuhi.</li>
</ol>

<p>Untuk setiap skenario, hitung nilai pabean, bea masuk, pajak impor sesuai ketentuan dan profil transaksi, trade remedies bila ada, handling, storage, pemeriksaan, izin, transportasi lokal, jasa profesional, serta buffer keterlambatan. Tuliskan formula, tanggal kurs, dan sumber tarif. Hasil simulasi adalah rentang keputusan pembelian, bukan janji penetapan.</p>

<h2>Gate sebelum supplier mengirim</h2>

<ul>
<li>Spesifikasi final sama dengan product dossier.</li>
<li>HS Code memiliki argumentasi dan reviewer.</li>
<li>Tarif MFN diperiksa pada peraturan terakhir.</li>
<li>Kelayakan FTA dan bukti asal dikonfirmasi.</li>
<li>Trade remedies serta lartas sudah dipetakan.</li>
<li>Nilai transaksi dan seluruh penyesuaian dapat dijelaskan.</li>
<li>Invoice, packing list, izin, bukti asal, dan draft PIB konsisten.</li>
<li>Spreadsheet landed cost mencantumkan asumsi, sumber, tanggal, dan owner.</li>
</ul>

<h2>Pembagian tanggung jawab</h2>

<p>Importir bertanggung jawab atas kebenaran barang, klasifikasi, nilai, perizinan, serta pemberitahuan. Supplier menyediakan spesifikasi dan dokumen transaksi. PPJK dapat membantu menyiapkan klasifikasi serta pemberitahuan berdasarkan kuasa dan data yang diterima. Freight forwarder menangani pengangkutan sesuai ruang lingkup. Bea Cukai memiliki kewenangan penelitian, pemeriksaan, dan penetapan.</p>

<p>Dira dapat membantu menyusun dossier produk, matriks HS–tarif–lartas, checklist dokumen, dan simulasi landed cost. Bantuan tersebut tidak memindahkan tanggung jawab importir dan tidak menjamin kode, tarif, fasilitas, jalur pemeriksaan, atau pelepasan barang.</p>

<h2>Monitoring perubahan regulasi</h2>

<p>Jangan menamai file “tarif final” tanpa tanggal. Gunakan register perubahan yang mencatat nomor regulasi, tanggal berlaku, pos terdampak, shipment terkait, reviewer, dan tindakan. Ketika PMK baru terbit, jangan langsung mengubah seluruh master tarif; bandingkan lampiran dan identifikasi pos yang benar-benar berubah.</p>

<p>Perbarui simulasi bila produk, model, komposisi, negara asal, pemasok, harga, incoterm, rute, fasilitas, atau jadwal berubah. Arsipkan bukti yang digunakan agar perbedaan antara estimasi dan penetapan dapat dianalisis setelah clearance.</p>

<h2>Review selisih setelah clearance</h2>

<p>Setelah barang keluar, jangan langsung menutup file shipment. Bandingkan master estimasi dengan data pada pemberitahuan dan tagihan aktual. Kelompokkan selisih berdasarkan HS Code, nilai pabean, kurs, tarif, asal barang, penggunaan fasilitas, pajak, trade remedies, storage, handling, pemeriksaan, dan biaya penyedia jasa. Pisahkan kesalahan data dari perubahan yang memang terjadi setelah simulasi dibuat.</p>

<p>Catat akar masalah dan tindakan pencegahan. Contohnya: katalog supplier tidak lengkap, freight baru diketahui setelah keberangkatan, bukti asal terlambat, invoice memakai uraian umum, atau model barang berubah tanpa pemberitahuan. Tentukan apakah master data produk, kontrak supplier, checklist purchase order, atau gate pengapalan perlu diubah. Satu shipment tidak boleh dijadikan preseden tarif bagi barang lain tanpa pemeriksaan spesifikasi.</p>

<p>Buat register produk yang menghubungkan SKU internal dengan spesifikasi, HS Code kandidat, dasar klasifikasi, tarif MFN, FTA yang mungkin digunakan, lartas, sumber regulasi, tanggal review, dan pemilik data. Register membantu konsistensi, tetapi setiap perubahan produk atau regulasi harus memicu review ulang. Dengan demikian, spreadsheet landed cost menjadi alat keputusan yang dapat diaudit, bukan kumpulan angka lama yang diwariskan tanpa konteks.</p>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026. PMK 50 Tahun 2026 berlaku sejak 28 Juli 2026 dan mengubah PMK 26/PMK.010/2022. Artikel ini bukan penetapan klasifikasi, tarif, nilai pabean, fasilitas, atau izin. Verifikasi data barang dan sumber resmi untuk setiap shipment.</p>
HTML,
    ],
];
