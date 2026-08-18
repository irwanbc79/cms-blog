<?php

return [
    'article_id' => 56,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Panduan Lengkap Aturan Baru Bea Masuk Barang Kiriman 2026',
        'slug' => 'panduan-lengkap-aturan-baru-bea-masuk-barang-kiriman-2026',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => 'fe2012330b303823c7815cbbd462a46e8254d7b221939d7055a2e259ce5319b1',
    ],
    'review_notes' => 'Live misinformation remediation on 2026-08-18. Replaced fabricated 2026 thresholds, tariff categories, statistics, and quotes with a PMK 4/2025 and DJBC FAQ-based decision workflow. Requires human editorial re-review.',
    'changes' => [
        'title' => 'Bea Masuk Barang Kiriman: Checklist FOB, HS Code, dan Dokumen',
        'focus_keyword' => 'bea masuk barang kiriman',
        'meta_description' => 'Checklist bea masuk barang kiriman berdasarkan nilai FOB, HS Code, jenis komoditas, CN, lartas, dan dokumen sebelum paket dikirim.',
        'excerpt' => 'Jangan memakai satu tarif untuk semua paket. Bedakan dokumen, FOB sampai USD3, FOB di atas USD3 sampai USD1.500, serta kiriman di atas USD1.500.',
        'og_title' => 'Bea Masuk Barang Kiriman: Checklist FOB, HS Code, dan Dokumen',
        'og_description' => 'Alur memeriksa kategori nilai, tarif, komoditas pengecualian, lartas, data CN, dan estimasi pungutan barang kiriman.',
        'pillar' => 'regulasi-impor',
        'tags' => ['barang kiriman', 'bea masuk', 'PMK 4 Tahun 2025', 'HS Code', 'consignment note'],
        'hashtags' => ['BarangKiriman', 'BeaMasuk', 'HSCode', 'CustomsCompliance', 'Dira'],
        'image_alt_texts' => [
            'Importir memeriksa nilai FOB HS Code dan dokumen barang kiriman',
            'Checklist consignment note dan pungutan impor barang kiriman',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah batas pembebasan bea masuk barang kiriman turun menjadi USD1,5 pada 2026?',
                'answer' => 'Tidak berdasarkan sumber resmi yang diperiksa pada 18 Agustus 2026. FAQ Direktorat Jenderal Bea dan Cukai masih membedakan nilai pabean sampai dengan FOB USD3, di atas USD3 sampai dengan USD1.500, dan di atas USD1.500. Selalu cek kembali sumber resmi sebelum transaksi.',
            ],
            [
                'question' => 'Apakah semua barang kiriman di atas USD3 memakai bea masuk 7,5 persen?',
                'answer' => 'Tidak. Tarif 7,5 persen berlaku pada kelompok nilai tertentu, tetapi terdapat kelompok komoditas dengan perlakuan tarif berbeda. Kiriman di atas FOB USD1.500 menggunakan ketentuan MFN berdasarkan klasifikasi. HS Code dan jenis barang harus diperiksa.',
            ],
            [
                'question' => 'Apakah sampel barang otomatis bebas lartas?',
                'answer' => 'Tidak. FAQ Bea Cukai menyatakan ketentuan larangan dan pembatasan secara umum tetap berlaku pada barang kiriman, dan barang contoh bukan pengecualian otomatis. Periksa ketentuan instansi teknis berdasarkan barang aktual.',
            ],
            [
                'question' => 'Siapa yang menetapkan tagihan barang kiriman?',
                'answer' => 'Pungutan ditetapkan dalam proses kepabeanan berdasarkan data dan dokumen kiriman. Penerima perlu memeriksa sumber tagihan melalui penyelenggara pos dan kanal resmi, serta tidak membayar permintaan yang tidak dapat diverifikasi.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Barang kiriman dari luar negeri tidak boleh dihitung dengan satu tarif generik. Nilai FOB, jenis barang, HS Code, penyelenggara pos, dokumen, larangan atau pembatasan, dan identitas penerima menentukan jalur penyelesaiannya. Artikel lama di halaman ini menyebut batas USD1,5, tarif progresif buatan, dan statistik tanpa sumber. Klaim tersebut telah dihapus.</p>

<p>Per 18 Agustus 2026, dasar yang diperiksa adalah <a href="https://www.jdih.kemenkeu.go.id/dok/pmk-4-tahun-2025/overview" target="_blank" rel="noopener noreferrer">PMK 4 Tahun 2025</a>, yang mengubah PMK 96 Tahun 2023 tentang ketentuan kepabeanan, cukai, dan pajak atas impor serta ekspor barang kiriman. Untuk penerapan praktis, gunakan juga <a href="https://www.beacukai.go.id/faq-impor-barang-kiriman" target="_blank" rel="noopener noreferrer">FAQ Barang Kiriman Direktorat Jenderal Bea dan Cukai</a>. Periksa ulang keduanya pada tanggal transaksi karena regulasi dan tampilan layanan dapat berubah.</p>

<h2>Pastikan transaksi memang memakai mekanisme barang kiriman</h2>

<p>Barang kiriman adalah barang yang dikirim melalui penyelenggara pos, termasuk penyelenggara pos yang ditunjuk atau perusahaan jasa titipan. Mekanisme ini berbeda dari impor kargo umum yang diselesaikan menggunakan pemberitahuan impor untuk dipakai. Nama perusahaan kurir saja belum cukup; mintalah konfirmasi jalur pemberitahuan yang akan digunakan.</p>

<table>
<thead><tr><th>Pertanyaan</th><th>Bukti yang diperiksa</th><th>Risiko bila salah</th></tr></thead>
<tbody>
<tr><td>Siapa penyelenggara posnya?</td><td>Air waybill, resi, nama operator, dan layanan yang dipilih.</td><td>Estimasi tarif serta dokumen memakai jalur yang keliru.</td></tr>
<tr><td>Apa tujuan kiriman?</td><td>Pribadi, sampel, hadiah, pembelian, suku cadang, atau barang dagangan.</td><td>Uraian dan izin tidak menggambarkan penggunaan sebenarnya.</td></tr>
<tr><td>Berapa nilai FOB?</td><td>Invoice, bukti pembayaran, katalog, dan rincian diskon.</td><td>Kiriman masuk kelompok nilai yang salah.</td></tr>
<tr><td>Apa barang aktualnya?</td><td>Nama teknis, fungsi, material, merek, model, jumlah, dan foto.</td><td>HS Code, tarif, atau lartas salah.</td></tr>
</tbody>
</table>

<h2>Empat kelompok perlakuan fiskal</h2>

<p>FAQ resmi Bea Cukai membagi perlakuan fiskal barang kiriman menjadi empat kelompok. Tabel berikut adalah alat penyaringan awal, bukan penetapan tagihan.</p>

<table>
<thead><tr><th>Kelompok</th><th>Pemberitahuan dan perlakuan awal</th><th>Pemeriksaan lanjutan</th></tr></thead>
<tbody>
<tr><td>Kartu pos, surat, dan dokumen</td><td>Diberitahukan dengan daftar barang kiriman atau CN konsolidasi; dibebaskan dari bea masuk dan tidak dipungut pajak dalam rangka impor.</td><td>Pastikan isinya benar-benar dokumen, bukan barang yang disamarkan.</td></tr>
<tr><td>Nilai sampai dengan FOB USD3</td><td>Menggunakan Consignment Note. Bea masuk dibebaskan, PPh dikecualikan, dan PPN dipungut sesuai penjelasan resmi yang berlaku.</td><td>Jenis barang serta lartas tetap diperiksa.</td></tr>
<tr><td>FOB di atas USD3 sampai dengan USD1.500</td><td>Menggunakan Consignment Note. Tarif bea masuk umum pada kelompok ini adalah 7,5 persen, tetapi kelompok komoditas tertentu memakai tarif berbeda.</td><td>Jangan memakai 7,5 persen sebelum memastikan barang tidak masuk pengecualian komoditas.</td></tr>
<tr><td>FOB di atas USD1.500</td><td>Menggunakan PIBK atau PIB sesuai profil penerima dan ketentuan penyelesaian. Bea masuk mengikuti tarif MFN berdasarkan HS Code.</td><td>Periksa klasifikasi, tarif, izin, pajak, dan kebutuhan importir sebelum pengiriman.</td></tr>
</tbody>
</table>

<p>Angka USD3 tidak berarti barang bebas seluruh kewajiban. Pembebasan yang disebut pada kelompok tersebut terkait bea masuk, sedangkan PPN, jenis komoditas, cukai, dan larangan atau pembatasan memiliki perlakuan masing-masing. Jangan menerjemahkan “bea masuk nol” sebagai “tidak ada pungutan dan tidak ada izin”.</p>

<h2>Delapan data minimum sebelum menghitung</h2>

<ol>
<li>Nilai FOB yang dapat dibuktikan.</li>
<li>Freight atau biaya pengangkutan.</li>
<li>Asuransi, jika ada.</li>
<li>Mata uang dan kurs yang digunakan dalam penetapan.</li>
<li>Uraian barang yang spesifik.</li>
<li>Jumlah, satuan, berat, merek, dan model.</li>
<li>HS Code kandidat beserta dasar klasifikasinya.</li>
<li>Identitas pengirim, penerima, invoice, dan nomor air waybill.</li>
</ol>

<p>FAQ Bea Cukai menjelaskan bahwa Consignment Note memuat elemen seperti negara asal, berat kotor, freight, insurance, FOB, mata uang, NDPBM, uraian dan jumlah barang, HS Code, invoice, pengirim, penerima, serta identitas penerima. Data tersebut perlu konsisten. Invoice “sample no commercial value” tidak otomatis membuat nilai pabean menjadi nol bila barang memiliki nilai ekonomi.</p>

<h2>Workflow verifikasi sebelum paket dikirim</h2>

<h3>1. Kunci deskripsi dan nilai transaksi</h3>

<p>Minta supplier menulis nama teknis, fungsi, bahan, merek, model, jumlah, dan harga sebenarnya. Simpan purchase order, invoice, bukti pembayaran, katalog, serta korespondensi diskon. Jangan meminta supplier menurunkan nilai deklarasi untuk mengejar kelompok nilai tertentu.</p>

<h3>2. Tentukan HS Code kandidat</h3>

<p>Klasifikasi tidak ditentukan dari nama pemasaran. Gunakan karakter, material, fungsi, dan kondisi barang. Catat alasan pemilihan kode serta siapa yang memeriksa. Untuk barang kompleks, siapkan katalog atau data teknis sebelum paket berangkat.</p>

<h3>3. Periksa lartas dan barang kena cukai</h3>

<p>FAQ Bea Cukai menegaskan bahwa larangan dan pembatasan tetap berlaku pada barang kiriman. Barang contoh bukan pengecualian otomatis. Periksa HS Code dan ketentuan instansi teknis melalui <a href="https://insw.go.id/intr" target="_blank" rel="noopener noreferrer">Indonesia National Trade Repository</a>. Untuk hasil tembakau, minuman mengandung etil alkohol, atau barang kena cukai lain, periksa batas dan perlakuan khusus sebelum membeli.</p>

<h3>4. Identifikasi kelompok tarif</h3>

<p>Cocokkan nilai FOB dengan kelompok pada FAQ resmi. Bila berada di atas USD3 sampai dengan USD1.500, cek apakah barang termasuk kelompok komoditas yang dikecualikan dari tarif 7,5 persen. Bila di atas USD1.500, gunakan tarif MFN dari HS Code dan jangan mencampur jalur PIBK dengan PIB tanpa memeriksa profil penerima.</p>

<h3>5. Buat simulasi sebagai rentang</h3>

<p>Simulasi internal sebaiknya memisahkan nilai pabean, bea masuk, PPN, PPnBM bila relevan, biaya operator, storage, handling, izin, serta kemungkinan pemeriksaan. Beri label setiap asumsi, sumber, dan tanggal. Jangan mengubah estimasi menjadi janji tagihan final karena penetapan menggunakan data serta hasil penelitian kepabeanan.</p>

<h3>6. Rekonsiliasi data final</h3>

<p>Sebelum pickup, cocokkan invoice, airway bill, uraian barang, nilai, jumlah, negara asal, penerima, dan dokumen teknis. Bila operator meminta data tambahan, jawab berdasarkan dokumen yang sama. Perbedaan kecil pada model atau quantity dapat memengaruhi klasifikasi dan izin.</p>

<h2>Contoh simulasi tanpa menebak tarif</h2>

<p>Sebuah UMKM hendak menerima dua unit alat uji melalui perusahaan jasa titipan. Supplier memberi invoice FOB USD420, freight USD80, dan uraian hanya “testing device”. Tim tidak boleh langsung mengalikan 7,5 persen. Langkah yang benar adalah:</p>

<ol>
<li>Meminta katalog, fungsi, material, daya, model, dan penggunaan alat.</li>
<li>Menyusun HS Code kandidat berdasarkan spesifikasi.</li>
<li>Memeriksa apakah kode tersebut termasuk kelompok tarif khusus atau lartas.</li>
<li>Memastikan nilai, freight, insurance, dan identitas penerima tercermin pada data CN.</li>
<li>Membuat skenario pungutan dari tarif yang telah diverifikasi, bukan dari nama “alat uji”.</li>
<li>Menahan pickup bila izin atau spesifikasi belum jelas.</li>
</ol>

<p>Nilai komersial yang sama dapat menghasilkan perlakuan berbeda bila barangnya berupa buku, alas kaki, kosmetik, elektronik, atau produk yang diawasi instansi teknis. Karena itu, simulasi harus dimulai dari barang aktual dan HS Code, bukan dari nilai semata.</p>

<h2>Red flags yang harus menghentikan shipment</h2>

<ul>
<li>Supplier menawarkan deklarasi nilai lebih rendah dari pembayaran sebenarnya.</li>
<li>Uraian hanya “gift”, “sample”, “parts”, atau “accessories” tanpa spesifikasi.</li>
<li>HS Code dipilih untuk memperoleh tarif lebih rendah tanpa dasar klasifikasi.</li>
<li>Penerima belum memahami kebutuhan izin atau lartas.</li>
<li>Barang dibagi menjadi beberapa paket semata-mata untuk menghindari kewajiban.</li>
<li>Tagihan dikirim melalui rekening pribadi atau tautan yang tidak dapat diverifikasi.</li>
<li>Operator, supplier, dan penerima menggunakan invoice atau quantity yang berbeda.</li>
<li>Barang bernilai di atas USD1.500 dikirim sebelum jalur PIBK atau PIB disepakati.</li>
</ul>

<h2>Pembagian tanggung jawab</h2>

<table>
<thead><tr><th>Pihak</th><th>Tanggung jawab operasional</th></tr></thead>
<tbody>
<tr><td>Pengirim atau penjual</td><td>Memberikan invoice, deskripsi, nilai, dan spesifikasi yang benar.</td></tr>
<tr><td>Penerima</td><td>Memastikan identitas, tujuan penggunaan, izin, pembayaran, dan data barang dapat dibuktikan.</td></tr>
<tr><td>Penyelenggara pos</td><td>Menyampaikan CN, data kiriman, serta proses penagihan dan penyerahan sesuai kewenangannya.</td></tr>
<tr><td>Bea Cukai</td><td>Melakukan penelitian dokumen, pemeriksaan, penetapan, pelayanan, dan pengawasan kepabeanan.</td></tr>
<tr><td>Instansi teknis</td><td>Menetapkan dan melayani ketentuan teknis sesuai komoditas.</td></tr>
<tr><td>Konsultan atau PPJK</td><td>Membantu pemeriksaan dan dokumen sesuai ruang lingkup; tidak menjamin tarif, jalur, atau pelepasan.</td></tr>
</tbody>
</table>

<h2>Checklist keputusan go atau hold</h2>

<ul>
<li>Operator dan mekanisme barang kiriman sudah dikonfirmasi.</li>
<li>FOB, freight, insurance, serta bukti transaksi tersedia.</li>
<li>Deskripsi barang cukup untuk klasifikasi.</li>
<li>HS Code kandidat dan kelompok tarif telah diperiksa.</li>
<li>Lartas, cukai, serta izin teknis telah dipetakan.</li>
<li>Data CN konsisten dengan invoice dan air waybill.</li>
<li>Simulasi memisahkan tarif resmi, pajak, dan biaya operator.</li>
<li>Semua gap memiliki penanggung jawab dan tenggat sebelum pickup.</li>
</ul>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026. Sumber utama adalah PMK 4 Tahun 2025 dan FAQ Barang Kiriman DJBC yang diakses pada tanggal tersebut. Artikel ini bukan penetapan tarif, klasifikasi, nilai pabean, atau izin untuk kiriman tertentu. Gunakan data barang aktual dan sumber resmi pada tanggal transaksi.</p>
HTML,
    ],
];
