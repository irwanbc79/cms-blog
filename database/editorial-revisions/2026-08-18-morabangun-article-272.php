<?php

return [
    'article_id' => 272,
    'site_domain' => 'morabangun.com',
    'expected' => [
        'title' => 'Post-Implementation Review ERP: Panduan Lengkap Ukur ROI Bisnis Anda',
        'slug' => 'review-erp-pasca-implementasi-ukur-roi-bisnis',
        'status' => 'scheduled',
        'editorial_status' => 'needs_revision',
        'content_sha256' => '36fa86169f641cb4df5b281b38f686fe52b6ff645fbd3f4394b63826d8b05d24',
    ],
    'review_notes' => 'Rewritten as an original 90-day ERP review scorecard on 2026-08-18. Removed fabricated benchmarks, unsupported client outcome, unrelated news, trend filler, and absolute ROI claims. Awaiting human editorial approval.',
    'changes' => [
        'title' => 'Review ERP 90 Hari Setelah Go-Live: Scorecard ROI dan Risiko Operasional',
        'focus_keyword' => 'review ERP pasca implementasi',
        'meta_description' => 'Template review ERP 90 hari: ukur adopsi, kualitas data, waktu proses, biaya, kontrol, backlog, dan ROI dengan baseline serta bukti yang dapat diaudit.',
        'excerpt' => 'ERP yang sudah go-live belum tentu menghasilkan nilai. Gunakan scorecard 30-60-90 hari untuk memisahkan masalah adopsi, proses, data, kontrol, dan ROI.',
        'og_title' => 'Scorecard Review ERP 90 Hari Setelah Go-Live',
        'og_description' => 'Cara mengukur adopsi, kualitas data, perbaikan proses, biaya total, risiko operasional, dan ROI ERP tanpa mengandalkan asumsi.',
        'pillar' => 'erp-enterprise',
        'tags' => ['review ERP', 'ROI ERP', 'post implementation review', 'digitalisasi bisnis', 'kontrol internal'],
        'hashtags' => ['ERP', 'DigitalisasiBisnis', 'ROIERP', 'OperationalExcellence', 'Morabangun'],
        'image_alt_texts' => [
            'Tim lintas fungsi meninjau scorecard ERP setelah go-live',
            'Dashboard metrik adopsi kualitas data dan ROI ERP',
        ],
        'schema_faq' => [
            [
                'question' => 'Kapan post-implementation review ERP dilakukan?',
                'answer' => 'Gunakan beberapa checkpoint. Hari ke-30 berfokus pada stabilitas dan adopsi, hari ke-60 pada kualitas proses dan data, sedangkan hari ke-90 menilai manfaat awal, biaya, kontrol, dan prioritas perbaikan. Review lanjutan dapat dilakukan per kuartal.',
            ],
            [
                'question' => 'Bagaimana menghitung ROI ERP jika tidak ada baseline?',
                'answer' => 'ROI yang defensible sulit dihitung tanpa baseline. Rekonstruksi baseline dari data sistem lama, dokumen transaksi, timesheet sampling, laporan keuangan, dan wawancara pemilik proses. Tandai angka hasil estimasi dan pisahkan dari data aktual.',
            ],
            [
                'question' => 'Apakah penggunaan sistem yang tinggi berarti ERP berhasil?',
                'answer' => 'Belum tentu. Login dan jumlah transaksi hanya menunjukkan aktivitas. Keberhasilan perlu dilihat bersama waktu siklus, error, rework, kualitas data, kepatuhan proses, kontrol akses, biaya, dan hasil bisnis.',
            ],
            [
                'question' => 'Apa hasil akhir review ERP?',
                'answer' => 'Hasil akhirnya adalah scorecard berbasis bukti, daftar masalah dengan akar penyebab, keputusan stop-fix-scale, pemilik tindakan, tenggat, indikator keberhasilan, dan jadwal review berikutnya.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>ERP yang berhasil login dan mencetak invoice belum tentu menghasilkan ROI. Tiga bulan setelah go-live, manajemen perlu menjawab pertanyaan yang lebih keras: proses mana yang benar-benar lebih cepat, biaya apa yang turun, kontrol apa yang membaik, risiko apa yang justru muncul, dan modul mana yang belum dipakai sebagaimana dirancang.</p>

<p>Post-implementation review bukan audit untuk mencari siapa yang salah. Review ini adalah mekanisme pengambilan keputusan: fitur apa yang dihentikan, masalah apa yang harus segera diperbaiki, dan proses mana yang layak diperluas.</p>

<h2>Gunakan ritme 30-60-90 hari</h2>

<table>
<thead><tr><th>Checkpoint</th><th>Fokus</th><th>Pertanyaan keputusan</th></tr></thead>
<tbody>
<tr><td>Hari ke-30</td><td>Stabilitas, akses, defect, dukungan, dan adopsi awal.</td><td>Apakah operasi inti dapat berjalan tanpa workaround berisiko?</td></tr>
<tr><td>Hari ke-60</td><td>Kualitas master data, disiplin proses, integrasi, dan waktu siklus.</td><td>Apakah sistem baru memperbaiki alur atau hanya memindahkan pekerjaan manual?</td></tr>
<tr><td>Hari ke-90</td><td>Manfaat terverifikasi, biaya total, kontrol, backlog, dan keputusan skala.</td><td>Apakah manfaat cukup kuat untuk melanjutkan investasi berikutnya?</td></tr>
</tbody>
</table>

<p>Jangan menunggu hari ke-90 untuk mencatat data. Ambil snapshot mingguan sejak go-live. Bila baseline sebelum implementasi belum dibuat, rekonstruksi sekarang dari laporan sistem lama, spreadsheet, dokumen transaksi, log insiden, data keuangan, dan sampling waktu kerja. Tandai jelas data aktual, estimasi, dan data yang belum tersedia.</p>

<h2>Scorecard yang harus dibawa ke rapat direksi</h2>

<p>Batasi scorecard utama menjadi 8 sampai 12 metrik. Terlalu banyak indikator membuat tim sibuk mengisi dashboard tetapi tidak mengambil keputusan.</p>

<table>
<thead><tr><th>Dimensi</th><th>Contoh metrik</th><th>Sumber bukti</th><th>Pemilik</th></tr></thead>
<tbody>
<tr><td>Adopsi</td><td>Persentase transaksi yang diselesaikan di ERP tanpa spreadsheet bayangan.</td><td>Log ERP, sampling dokumen, dan wawancara pengguna.</td><td>Process owner</td></tr>
<tr><td>Kecepatan</td><td>Median waktu order-to-invoice atau procure-to-pay.</td><td>Timestamp transaksi sebelum dan sesudah go-live.</td><td>Operasional</td></tr>
<tr><td>Kualitas</td><td>Persentase transaksi yang dikoreksi, dibatalkan, atau dikerjakan ulang.</td><td>Audit log, credit note, retur, dan tiket.</td><td>Quality owner</td></tr>
<tr><td>Data</td><td>Duplikasi customer, SKU tanpa atribut wajib, dan saldo tidak cocok.</td><td>Data quality report dan rekonsiliasi.</td><td>Data owner</td></tr>
<tr><td>Keuangan</td><td>Hari tutup buku, DSO, nilai stok, dan biaya proses per transaksi.</td><td>General ledger dan laporan manajemen.</td><td>Finance</td></tr>
<tr><td>Kontrol</td><td>Konflik akses, transaksi tanpa approval, dan perubahan master tanpa bukti.</td><td>Role matrix, approval log, dan audit trail.</td><td>Risk/control owner</td></tr>
<tr><td>Stabilitas</td><td>Insiden kritis, downtime, waktu pemulihan, dan backlog defect.</td><td>Monitoring dan service desk.</td><td>IT owner</td></tr>
<tr><td>Pengguna</td><td>Task completion rate dan pola kebutuhan bantuan.</td><td>Observasi tugas, survei singkat, dan tiket.</td><td>Change lead</td></tr>
</tbody>
</table>

<p>Untuk setiap metrik, tampilkan baseline, target, angka saat ini, arah tren, sumber data, tingkat keyakinan, dan tindakan. “Lebih efisien” bukan metrik. “Median waktu membuat invoice turun dari 18 menit menjadi 9 menit berdasarkan 120 transaksi” adalah bukti yang dapat diperiksa.</p>

<h2>Pisahkan aktivitas, output, dan hasil bisnis</h2>

<p>Jumlah login, peserta training, atau transaksi yang dibuat adalah aktivitas. Invoice terbit lebih cepat dan stok lebih akurat adalah output proses. Penurunan biaya rework, membaiknya arus kas, atau turunnya modal kerja adalah hasil bisnis. Jangan mengklaim ROI hanya dari aktivitas.</p>

<ul>
<li><strong>Aktivitas:</strong> 80 pengguna login minggu ini.</li>
<li><strong>Output:</strong> 92% purchase order dibuat melalui alur approval ERP.</li>
<li><strong>Hasil:</strong> waktu tunggu approval turun dan pembelian di luar kontrak berkurang.</li>
</ul>

<p>Hubungan sebab-akibat juga perlu diuji. Penjualan dapat naik karena musim atau kampanye, bukan ERP. Nilai persediaan dapat turun karena permintaan melemah, bukan perencanaan yang membaik. Gunakan periode pembanding yang setara dan catat faktor lain yang memengaruhi hasil.</p>

<h2>Rumus ROI yang dapat dipertanggungjawabkan</h2>

<p>Gunakan rumus dasar berikut:</p>

<p><strong>ROI = (manfaat finansial terverifikasi − total biaya ERP) ÷ total biaya ERP × 100%</strong></p>

<p>Total biaya tidak hanya invoice vendor. Masukkan lisensi atau subscription, implementasi, infrastruktur, integrasi, migrasi dan pembersihan data, jam kerja internal, training, support, perangkat, keamanan, downtime, serta biaya mempertahankan sistem lama selama masa transisi.</p>

<p>Manfaat finansial juga harus konservatif. Kelompokkan ke dalam:</p>

<ul>
<li>jam kerja yang benar-benar dialihkan ke pekerjaan bernilai, bukan sekadar waktu yang terasa lebih singkat;</li>
<li>rework, retur, penalti, dan koreksi yang berkurang;</li>
<li>biaya aplikasi lama yang benar-benar dihentikan;</li>
<li>modal kerja dari perbaikan persediaan atau penagihan;</li>
<li>margin tambahan yang dapat dikaitkan dengan kapasitas atau keputusan yang dibantu ERP.</li>
</ul>

<h3>Contoh perhitungan hipotesis</h3>

<p>Sebuah distributor mencatat total biaya ERP tahun pertama Rp480 juta. Setelah tiga bulan, tim memverifikasi penghematan berulang Rp18 juta per bulan dari pengurangan rework dan penghentian dua aplikasi lama. Ada pula manfaat satu kali Rp30 juta dari koreksi stok. Jika penghematan bulanan diproyeksikan selama 12 bulan, manfaat tahun pertama menjadi Rp246 juta.</p>

<p>ROI tahun pertama dalam simulasi ini adalah (Rp246 juta − Rp480 juta) ÷ Rp480 juta, atau negatif 48,75%. Ini tidak otomatis berarti proyek gagal. Investasi awal sering terbebani biaya implementasi satu kali, sedangkan manfaat berulang muncul bertahap. Direksi perlu melihat payback period dan skenario tahun kedua, sekaligus memeriksa apakah asumsi Rp18 juta per bulan benar-benar bertahan. Contoh ini sengaja menunjukkan bahwa review yang jujur tidak selalu menghasilkan angka positif.</p>

<h2>Temukan spreadsheet bayangan dan double entry</h2>

<p>Masalah adopsi sering tersembunyi. Pengguna melakukan transaksi di ERP untuk memenuhi prosedur, tetapi keputusan sebenarnya tetap memakai spreadsheet pribadi. Cari file rekap yang masih beredar, data yang diketik ulang, approval melalui chat tanpa jejak, dan laporan yang dibuat manual karena master data belum dipercaya.</p>

<p>Untuk setiap workaround, catat alasan: fitur kurang, konfigurasi salah, hak akses, performa, kualitas data, training, atau proses bisnis belum disepakati. Memaksa pengguna berhenti memakai spreadsheet sebelum akar penyebab selesai dapat memindahkan risiko ke pekerjaan yang tidak terlihat.</p>

<h2>Audit kualitas data dan rekonsiliasi</h2>

<p>Pilih objek data kritis seperti customer, vendor, SKU, chart of accounts, harga, satuan, pajak, lokasi stok, dan saldo awal. Ukur kelengkapan, validitas, keunikan, konsistensi, ketepatan waktu, dan kepemilikan data.</p>

<ul>
<li>Rekonsiliasi subledger dengan general ledger.</li>
<li>Bandingkan stok sistem dengan cycle count fisik.</li>
<li>Cari customer atau vendor duplikat dan transaksi pada master nonaktif.</li>
<li>Uji transaksi lintas modul dari sumber hingga jurnal.</li>
<li>Periksa siapa yang boleh membuat dan menyetujui perubahan master.</li>
</ul>

<p>Jangan memperbaiki data hanya dengan proyek bersih-bersih satu kali. Tetapkan data owner, aturan validasi, daftar atribut wajib, proses koreksi, dan indikator kualitas bulanan.</p>

<h2>Periksa kontrol, keamanan, dan kemampuan pulih</h2>

<p>Review ERP harus mencakup risiko, bukan hanya produktivitas. Uji role dan permission berdasarkan pekerjaan aktual, bukan jabatan umum. Cari konflik seperti pengguna yang dapat membuat vendor sekaligus membayar, membuat purchase order sekaligus menyetujui, atau mengubah harga dan mengeksekusi penjualan tanpa kontrol tambahan.</p>

<p>Periksa akun bersama, akun mantan karyawan, MFA untuk akses sensitif, log perubahan, patch, integrasi, backup, dan prosedur restore. Bukti backup belum cukup; lakukan uji pemulihan terbatas dan catat waktu serta data yang berhasil dipulihkan. Untuk proses penting, tetapkan prosedur manual sementara ketika ERP atau koneksi tidak tersedia.</p>

<h2>Bedakan defect, change request, dan masalah proses</h2>

<table>
<thead><tr><th>Kategori</th><th>Definisi kerja</th><th>Contoh keputusan</th></tr></thead>
<tbody>
<tr><td>Defect</td><td>Sistem tidak bekerja sesuai desain atau acceptance criteria.</td><td>Perbaiki berdasarkan severity dan dampak operasional.</td></tr>
<tr><td>Change request</td><td>Kebutuhan baru atau desain yang sebelumnya tidak disepakati.</td><td>Nilai manfaat, biaya, dependensi, dan prioritas.</td></tr>
<tr><td>Data issue</td><td>Masalah pada migrasi, master, aturan, atau ownership data.</td><td>Perbaiki data sekaligus kontrol pencegahannya.</td></tr>
<tr><td>Process issue</td><td>Alur kerja atau tanggung jawab belum jelas.</td><td>Selesaikan keputusan proses sebelum menambah fitur.</td></tr>
<tr><td>Training issue</td><td>Pengguna belum mampu menjalankan tugas yang sudah didukung sistem.</td><td>Latihan berbasis tugas dan ukur completion rate.</td></tr>
</tbody>
</table>

<p>Backlog yang tidak diklasifikasi akan berubah menjadi daftar permintaan tanpa batas. Setiap item perlu memiliki dampak, bukti, akar penyebab, owner, estimasi, dependensi, dan indikator selesai.</p>

<h2>Agenda rapat keputusan 90 hari</h2>

<ol>
<li>Tinjau 8–12 metrik utama dan kualitas buktinya.</li>
<li>Pilih lima masalah dengan dampak terbesar terhadap uang, pelanggan, operasi, atau risiko.</li>
<li>Putuskan stop, fix, atau scale untuk setiap modul dan integrasi.</li>
<li>Setujui owner, anggaran, tenggat, dan ukuran keberhasilan.</li>
<li>Bekukan permintaan bernilai rendah sampai masalah fondasi selesai.</li>
<li>Jadwalkan review berikutnya dan tetapkan data yang harus dikumpulkan.</li>
</ol>

<p>Morabangun dapat memfasilitasi review lintas fungsi, membantu menyiapkan scorecard, memetakan proses, memeriksa backlog, dan menerjemahkan temuan menjadi sprint perbaikan. Keputusan ROI tetap harus memakai data keuangan serta bukti operasional milik perusahaan, bukan angka benchmark generik.</p>

<p><strong>Langkah awal:</strong> siapkan business case awal, daftar biaya, baseline proses, akses laporan ERP, daftar insiden, role matrix, dan lima keluhan pengguna yang paling sering muncul. Dari data itu, tim dapat menentukan apakah masalah utama berada pada sistem, data, proses, atau adopsi.</p>
HTML,
    ],
];
