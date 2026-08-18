<?php

return [
    'article_id' => 156,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Panduan Lengkap Cara Urus Dokumen Kepabeanan Ekspor Kopi 2026',
        'slug' => 'panduan-lengkap-cara-urus-dokumen-kepabeanan-ekspor-kopi-2026',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '94d83eb7b68d7cdf71325623dbd631ce410f1522f0622afe27ed6681e9406f89',
    ],
    'review_notes' => 'Live misinformation remediation on 2026-08-18. Removed invented fees, processing times, success statistics, client stories, document validity, and clearance promises. Rebuilt around PMK 155/2022, DJBC export procedure, and e-SKA sources. Requires human editorial re-review.',
    'changes' => [
        'title' => 'Dokumen Ekspor Kopi: PEB, NPE, SKA, dan Shipment File',
        'focus_keyword' => 'dokumen ekspor kopi',
        'meta_description' => 'Checklist dokumen ekspor kopi: invoice, packing list, PEB, NPE, SKA, dokumen buyer, lartas, dan rekonsiliasi data sebelum pemuatan.',
        'excerpt' => 'Kunci spesifikasi, buyer requirement, invoice, packing list, PEB, NPE, SKA, dan dokumen teknis dalam satu shipment file sebelum kopi dimuat.',
        'og_title' => 'Dokumen Ekspor Kopi: PEB, NPE, SKA, dan Shipment File',
        'og_description' => 'Workflow menyusun data master, PEB, NPE, SKA, dokumen buyer, lartas, handoff logistik, dan arsip ekspor kopi.',
        'pillar' => 'prosedur-ekspor',
        'tags' => ['dokumen ekspor kopi', 'PEB', 'NPE', 'SKA', 'shipment file'],
        'hashtags' => ['EksporKopi', 'PEB', 'NPE', 'SKA', 'CustomsCompliance'],
        'image_alt_texts' => [
            'Tim ekspor merekonsiliasi PEB invoice packing list dan dokumen kopi',
            'Checklist shipment file ekspor kopi sebelum pemuatan',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah semua ekspor kopi membutuhkan dokumen yang sama?',
                'answer' => 'Tidak. Dokumen mengikuti bentuk produk, negara tujuan, buyer, moda, fasilitas, ketentuan ekspor, karantina, mutu, dan skema tarif preferensi. Gunakan matriks dokumen per shipment.',
            ],
            [
                'question' => 'Apa perbedaan PEB dan NPE?',
                'answer' => 'PEB adalah pemberitahuan pabean ekspor yang disampaikan eksportir atau kuasanya. NPE adalah respons pelayanan yang diterbitkan setelah persyaratan proses terpenuhi sesuai hasil penelitian dan/atau pemeriksaan. NPE bukan pengganti invoice, dokumen angkut, izin, atau kewajiban buyer.',
            ],
            [
                'question' => 'Apakah SKA atau COO selalu wajib?',
                'answer' => 'Tidak selalu. SKA digunakan untuk membuktikan asal sesuai skema dan kebutuhan transaksi tertentu. Jenis, format, serta penerbitannya mengikuti perjanjian dan prosedur yang digunakan. Konfirmasi dengan buyer dan sistem e-SKA.',
            ],
            [
                'question' => 'Berapa lama PEB atau NPE terbit?',
                'answer' => 'Artikel ini tidak menjanjikan durasi. Waktu bergantung pada kelengkapan dan konsistensi data, lartas, sistem, profil risiko, pemeriksaan, dan respons pihak terkait. Susun cut-off internal dengan buffer dan status gate.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Dokumen ekspor kopi bukan kumpulan formulir yang diurus terpisah. Invoice, packing list, kontrak buyer, spesifikasi mutu, Pemberitahuan Ekspor Barang, dokumen angkut, asal barang, dan persyaratan negara tujuan harus memakai satu data master. Perbedaan grade, berat, kemasan, HS Code, atau eksportir dapat memicu koreksi dan keterlambatan.</p>

<p>Dasar kepabeanan yang diperiksa pada 18 Agustus 2026 adalah <a href="https://www.jdih.kemenkeu.go.id/dok/155-pmk-04-2022/summary" target="_blank" rel="noopener noreferrer">PMK 155/PMK.04/2022</a>. Direktorat Jenderal Bea dan Cukai menyediakan penjelasan pada laman <a href="https://www.beacukai.go.id/tata-laksana-ekspor" target="_blank" rel="noopener noreferrer">Tata Laksana Ekspor</a>. Untuk Surat Keterangan Asal, gunakan layanan dan ketentuan pada <a href="https://e-ska.kemendag.go.id/home.php/home/form" target="_blank" rel="noopener noreferrer">e-SKA Kementerian Perdagangan</a>. Artikel lama memuat biaya, waktu proses, masa berlaku, statistik keberhasilan, dan kisah klien tanpa bukti; seluruhnya telah dihapus.</p>

<h2>Mulai dari shipment data sheet</h2>

<p>Buat satu lembar data yang disetujui sebelum dokumen diterbitkan. Lembar ini menjadi sumber bagi sales, produksi, quality control, eksportir, PPJK, freight forwarder, penerbit dokumen, dan buyer.</p>

<table>
<thead><tr><th>Kelompok data</th><th>Kolom minimum</th><th>Pemilik konfirmasi</th></tr></thead>
<tbody>
<tr><td>Para pihak</td><td>Eksportir, seller, buyer, consignee, notify party, produsen, dan gudang.</td><td>Sales dan legal.</td></tr>
<tr><td>Produk</td><td>Jenis kopi, proses, grade, crop, lot, mutu, kemasan, dan kondisi.</td><td>Produksi dan quality control.</td></tr>
<tr><td>Kuantitas</td><td>Jumlah bag, berat bersih, berat kotor, toleransi, dan satuan.</td><td>Warehouse dan buyer.</td></tr>
<tr><td>Komersial</td><td>Harga, mata uang, incoterm, pembayaran, dan nomor kontrak.</td><td>Sales dan finance.</td></tr>
<tr><td>Kepabeanan</td><td>HS Code, kantor muat, fasilitas, bea keluar bila relevan, dan lartas.</td><td>Eksportir dan customs compliance.</td></tr>
<tr><td>Logistik</td><td>Moda, carrier, vessel/flight, container, seal, cut-off, ETD, dan tujuan.</td><td>Freight forwarder.</td></tr>
</tbody>
</table>

<p>Setiap perubahan setelah approval harus tercatat. Supplier atau warehouse tidak boleh mengganti lot, jumlah, kemasan, atau deskripsi hanya melalui pesan informal karena data tersebut dapat mengalir ke PEB, sertifikat, dan bill of lading.</p>

<h2>Matriks dokumen ekspor kopi</h2>

<table>
<thead><tr><th>Dokumen</th><th>Fungsi</th><th>Gate pemeriksaan</th></tr></thead>
<tbody>
<tr><td>Sales contract atau purchase order</td><td>Mengunci spesifikasi, harga, incoterm, pembayaran, toleransi, dan requirement buyer.</td><td>Ditandatangani sebelum produksi final.</td></tr>
<tr><td>Commercial invoice</td><td>Mencatat para pihak, barang, nilai, mata uang, dan syarat penyerahan.</td><td>Sama dengan kontrak dan data PEB.</td></tr>
<tr><td>Packing list</td><td>Merinci kemasan, lot, jumlah, netto, bruto, dan dimensi.</td><td>Sama dengan stuffing report dan timbangan.</td></tr>
<tr><td>PEB</td><td>Pemberitahuan pabean ekspor yang disampaikan ke Kantor Pabean.</td><td>Data eksportir, barang, nilai, kuantitas, dan pemuatan benar.</td></tr>
<tr><td>NPE</td><td>Respons pelayanan ekspor sesuai hasil penelitian atau pemeriksaan.</td><td>Status serta syaratnya dikonfirmasi sebelum pemasukan/pemuatan.</td></tr>
<tr><td>Bill of lading atau air waybill</td><td>Dokumen pengangkutan dan bukti penerimaan oleh pengangkut sesuai ketentuan.</td><td>Draft direkonsiliasi dengan invoice, packing list, PEB, dan L/C bila ada.</td></tr>
<tr><td>SKA/COO bila digunakan</td><td>Membuktikan asal barang untuk skema atau kebutuhan transaksi tertentu.</td><td>Origin criterion, eksportir, invoice, HS, quantity, dan tujuan cocok.</td></tr>
<tr><td>Dokumen teknis</td><td>Fitosanitari, fumigasi, hasil uji, quality certificate, organic certificate, atau dokumen lain bila dipersyaratkan.</td><td>Kebutuhan dikunci dari negara tujuan dan buyer, bukan asumsi umum.</td></tr>
</tbody>
</table>

<h2>PEB, respons sistem, dan NPE</h2>

<p>PMK 155/PMK.04/2022 mengatur bahwa barang yang akan diekspor diberitahukan ke Kantor Pabean menggunakan pemberitahuan pabean ekspor. Penyampaian dapat dilakukan oleh eksportir atau kuasanya melalui Sistem Komputer Pelayanan. Gunakan nama layanan aktual yang ditampilkan pada portal pengguna jasa; jangan mengandalkan nomor versi sistem dari artikel lama.</p>

<p>Alur operasional perlu mengantisipasi beberapa respons. Data yang tidak lengkap atau tidak sesuai dapat menghasilkan penolakan. Persyaratan lartas yang belum terpenuhi dapat memicu permintaan pemenuhan dokumen. Barang tertentu dapat terkena pemeriksaan fisik. NPE diterbitkan sesuai hasil penelitian atau pemeriksaan dan pemenuhan persyaratan, bukan karena ada janji waktu dari penyedia jasa.</p>

<h3>Data PEB yang harus direkonsiliasi</h3>

<ul>
<li>Identitas eksportir dan kuasa.</li>
<li>Buyer, consignee, dan negara tujuan.</li>
<li>HS Code serta uraian barang.</li>
<li>Jumlah, jenis kemasan, netto, dan bruto.</li>
<li>Nilai ekspor, mata uang, dan incoterm.</li>
<li>Pelabuhan atau tempat muat.</li>
<li>Moda, sarana pengangkut, container, dan seal jika tersedia.</li>
<li>Dokumen pelengkap, lartas, fasilitas, dan pungutan bila relevan.</li>
</ul>

<h2>Jangan menggandakan SKA dan COO</h2>

<p>SKA adalah Certificate of Origin. Dalam percakapan bisnis, istilah COO sering digunakan untuk dokumen yang sama. Jangan menulis “SKA dan COO” sebagai dua dokumen wajib tanpa menjelaskan jenisnya. Tentukan apakah buyer membutuhkan preferential certificate, non-preferential certificate, origin declaration, atau bukti lain.</p>

<p>Bila tarif preferensi diminta di negara tujuan, periksa rules of origin, origin criterion, bukti bahan, proses produksi, direct consignment, format invoice, dan prosedur penerbitan. Data pada SKA harus konsisten dengan invoice, packing list, PEB, dan dokumen angkut. Kesalahan tidak boleh ditutupi dengan mengubah satu dokumen setelah shipment tanpa memeriksa dampak pada dokumen lain.</p>

<h2>Dokumen teknis mengikuti produk dan tujuan</h2>

<p>Kopi green bean, roasted coffee, soluble coffee, sample, dan produk campuran tidak selalu memiliki persyaratan yang sama. Negara tujuan, port of entry, buyer, sertifikasi, kondisi produk, dan penggunaan menentukan dokumen teknis. Jangan membuat pernyataan universal bahwa semua kopi membutuhkan sertifikat tertentu atau bahwa satu sertifikat berlaku untuk semua tujuan.</p>

<p>Susun destination requirement matrix berisi nama dokumen, dasar permintaan, penerbit, applicant, data input, inspeksi atau sampling, lead time internal, masa berlaku aktual, shipment yang dicakup, serta status. Pisahkan kewajiban otoritas dari persyaratan kontraktual buyer.</p>

<h2>Timeline berbasis gate, bukan janji hari</h2>

<ol>
<li><strong>Contract gate:</strong> buyer requirement, spesifikasi, incoterm, dan pembayaran terkunci.</li>
<li><strong>Product gate:</strong> lot, mutu, quantity, kemasan, serta hasil quality control disetujui.</li>
<li><strong>Compliance gate:</strong> HS Code, lartas, dokumen teknis, dan origin plan diverifikasi.</li>
<li><strong>Booking gate:</strong> jadwal, cut-off, equipment, stuffing, dan draft shipping instruction disetujui.</li>
<li><strong>Customs gate:</strong> data PEB lengkap, respons dipantau, dan persyaratan ditindaklanjuti.</li>
<li><strong>Loading gate:</strong> NPE atau respons yang diperlukan, container, seal, dan data pemuatan cocok.</li>
<li><strong>Post-shipment gate:</strong> draft B/L, SKA, invoice, packing list, serta dokumen bank direkonsiliasi.</li>
</ol>

<p>Setiap gate memiliki owner, due date, bukti, dan status go/hold. Tambahkan buffer berdasarkan pengalaman shipment aktual, tetapi jangan mempublikasikan waktu penerbitan sebagai kepastian.</p>

<h2>Rekonsiliasi sebelum pemuatan</h2>

<table>
<thead><tr><th>Kolom</th><th>Invoice</th><th>Packing list</th><th>PEB</th><th>Draft B/L</th><th>SKA</th></tr></thead>
<tbody>
<tr><td>Eksportir</td><td>Cek</td><td>Cek</td><td>Cek</td><td>Cek shipper</td><td>Cek exporter</td></tr>
<tr><td>Buyer/consignee</td><td>Cek</td><td>Bila dicantumkan</td><td>Cek</td><td>Cek</td><td>Cek</td></tr>
<tr><td>Uraian kopi</td><td>Cek</td><td>Cek</td><td>Cek HS dan uraian</td><td>Cek shipping description</td><td>Cek origin description</td></tr>
<tr><td>Quantity/netto</td><td>Cek</td><td>Cek detail</td><td>Cek</td><td>Cek</td><td>Cek</td></tr>
<tr><td>Nomor invoice</td><td>Sumber</td><td>Referensi</td><td>Cek</td><td>Bila dicantumkan</td><td>Cek</td></tr>
</tbody>
</table>

<h2>Kontrol perubahan dan pembetulan</h2>

<p>Perubahan vessel, container, quantity, nilai, buyer, atau deskripsi harus dianalisis sebelum dokumen diubah. Tentukan dokumen mana yang terdampak, apakah pembetulan PEB diperlukan, siapa yang menyetujui, dan apakah buyer atau bank perlu diberi tahu. FAQ Tata Laksana Ekspor Bea Cukai menyediakan rujukan untuk pembetulan atau pembatalan sesuai kondisi; jangan menunda sampai arsip saling bertentangan.</p>

<h2>Shipment file dan retensi</h2>

<p>Simpan kontrak, purchase order, invoice, packing list, PEB, NPE, dokumen angkut, SKA, dokumen teknis, korespondensi, bukti pembayaran, stuffing report, foto seal, hasil timbang, serta catatan perubahan. PMK 155/PMK.04/2022 memuat kewajiban penyimpanan lembar asli dokumen pelengkap pabean selama sepuluh tahun pada tempat usaha di Indonesia. Terapkan akses, versi, backup, dan retensi yang sesuai.</p>

<h2>Pembagian tanggung jawab</h2>

<p>Eksportir bertanggung jawab atas kebenaran pemberitahuan dan dokumen sumber. Producer atau warehouse menjaga mutu, lot, quantity, dan kemasan. PPJK menyampaikan pemberitahuan berdasarkan kuasa serta data yang diterima. Freight forwarder mengoordinasikan booking dan pengangkutan. Buyer menetapkan requirement kontraktual. Instansi berwenang melakukan pelayanan, pemeriksaan, penerbitan, atau pengawasan sesuai tugasnya.</p>

<p>Dira dapat membantu membangun shipment data sheet, document matrix, timeline gate, dan rekonsiliasi draft. Bantuan tersebut tidak menjamin penerbitan NPE, hasil pemeriksaan, penerimaan buyer, tarif preferensi, atau keberangkatan tepat waktu.</p>

<h2>Checklist release shipment</h2>

<ul>
<li>Data master telah disetujui seluruh owner.</li>
<li>Invoice dan packing list sesuai barang aktual.</li>
<li>HS Code, lartas, dan dokumen teknis diverifikasi.</li>
<li>PEB memakai data dan dokumen versi final.</li>
<li>Respons kepabeanan telah ditindaklanjuti.</li>
<li>Container, seal, quantity, dan stuffing report cocok.</li>
<li>Draft B/L dan SKA direkonsiliasi sebelum batas koreksi.</li>
<li>Shipment file memiliki version log dan backup.</li>
</ul>

<h2>Exception log untuk keputusan hold</h2>

<p>Buat exception log ketika satu data belum konsisten atau satu dokumen belum tersedia. Setiap baris memuat isu, shipment, dampak, owner, pihak yang harus memberi konfirmasi, bukti yang dibutuhkan, due date, dan keputusan sementara. Contohnya adalah selisih berat invoice dan packing list, HS Code buyer berbeda dari klasifikasi eksportir, sertifikat belum mencakup lot final, atau draft B/L memakai consignee yang tidak sesuai L/C.</p>

<p>Status <em>hold</em> harus menghentikan langkah yang bergantung pada isu tersebut. Jangan tetap melakukan stuffing atau membiarkan kapal berangkat hanya karena koreksi dianggap dapat dilakukan kemudian. Jika perubahan terjadi setelah PEB atau dokumen lain diterbitkan, petakan prosedur pembetulan dan tenggatnya melalui sumber resmi, lalu rekonsiliasi seluruh dokumen terkait.</p>

<p>Tutup exception hanya setelah bukti disimpan dan approver menandai keputusan. Dalam post-shipment review, hitung berapa exception yang muncul, kapan ditemukan, dan apakah kontrol sebelumnya gagal. Gunakan data itu untuk memperbaiki template kontrak, product master, cut-off internal, atau pembagian tanggung jawab. Ukuran keberhasilan bukan sekadar kapal berangkat, melainkan dokumen konsisten, perubahan terlacak, dan shipment file dapat dijelaskan saat audit atau klaim buyer.</p>

<p><strong>Catatan editorial:</strong> artikel ini ditinjau pada 18 Agustus 2026 berdasarkan PMK 155/PMK.04/2022, laman Tata Laksana Ekspor DJBC, dan portal e-SKA Kemendag. Persyaratan kopi bersifat destination-specific. Verifikasi regulasi, buyer requirement, dan data shipment aktual sebelum ekspor.</p>
HTML,
    ],
];
