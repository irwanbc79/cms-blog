<?php

return [
    'article_id' => 212,
    'site_domain' => 'gma-world.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Checklist Dokumen Kepabeanan Ekspor Proyek Konstruksi: Panduan Lengkap',
        'slug' => 'checklist-dokumen-kepabeanan-ekspor-proyek-konstruksi',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '8727f79a98b13310d22a19a290477f3ea0f9edd45c840897c88e99cd55dc3607',
    ],
    'review_notes' => 'GMA project-export documentation pillar rebuilt on 2026-08-29 using PMK 155/PMK.04/2022, the current DJBC BTKI page and amendment history, INSW, OSS, and Kemendag e-SKA. Removes unsupported universal-document claims, guaranteed-clearance language, unrelated 2026 news, repetitive CTA blocks, and treatment of contract, insurance, COO, drawings, and permits as universally mandatory customs documents. Adds mandatory/conditional/internal classification, PEB-to-NPE boundaries, HS and lartas gates, partial-shipment controls, temporary-export branch, data reconciliation, RACI, worked project-cargo example, exception handling, and official references.',
    'changes' => [
        'title' => 'Dokumen Ekspor Proyek Konstruksi: PEB, NPE, Lartas, dan Checklist',
        'focus_keyword' => 'dokumen kepabeanan ekspor',
        'meta_description' => 'Checklist dokumen ekspor proyek konstruksi: bedakan PEB, NPE, invoice, packing list, lartas, SKA, serta kontrol data tiap partial shipment.',
        'excerpt' => 'Decision checklist untuk mengendalikan PEB, NPE, HS, lartas, dokumen komersial, dan partial shipment pada ekspor barang proyek konstruksi.',
        'og_title' => 'Dokumen Ekspor Proyek Konstruksi: PEB, NPE, Lartas, dan Checklist',
        'og_description' => 'Pisahkan dokumen wajib, kondisional, dan internal serta rekonsiliasi setiap line item sebelum ekspor barang proyek.',
        'pillar' => 'logistik',
        'tags' => ['dokumen kepabeanan ekspor', 'PEB', 'NPE', 'lartas ekspor', 'project cargo'],
        'hashtags' => ['DokumenEkspor', 'PEB', 'ProjectCargo', 'LartasEkspor'],
        'image_alt_texts' => [
            'Tim proyek merekonsiliasi invoice packing list dan data PEB sebelum ekspor',
            'Paket konstruksi diberi identitas lot untuk kontrol partial shipment ekspor',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah kontrak proyek selalu menjadi dokumen pelengkap pabean ekspor?',
                'answer' => 'Tidak otomatis. PMK 155/PMK.04/2022 menyebut invoice, packing list, bill of lading atau airway bill, dan dokumen lain yang diwajibkan. Kontrak, purchase order, drawing, katalog, serta material take-off berfungsi sebagai bukti pendukung bila relevan dengan transaksi, klasifikasi, perizinan, atau permintaan pemeriksaan.',
            ],
            [
                'question' => 'Apakah NPE sama dengan bukti barang diterima negara tujuan?',
                'answer' => 'Tidak. Nota Pelayanan Ekspor adalah respons pelayanan dalam proses ekspor Indonesia setelah persyaratan yang relevan dipenuhi. NPE bukan jaminan import clearance, penerimaan buyer, atau pembebasan kewajiban di negara tujuan.',
            ],
            [
                'question' => 'Apakah semua ekspor proyek memerlukan Surat Keterangan Asal?',
                'answer' => 'Tidak. SKA atau dokumen asal digunakan sesuai skema perdagangan, permintaan negara tujuan atau buyer, dan pemenuhan ketentuan asal. Jenis formulir serta bukti pendukung harus ditentukan per negara, skema, dan barang.',
            ],
            [
                'question' => 'Bagaimana mengendalikan ekspor proyek yang dikirim bertahap?',
                'answer' => 'Gunakan shipment allocation register yang menghubungkan nomor kontrak, item proyek, part number, HS, quantity kontrak, quantity shipment, nilai, packing ID, serta sisa yang belum dikirim. Setiap PEB harus direkonsiliasi terhadap invoice dan packing list untuk shipment aktual.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Dokumen ekspor proyek konstruksi tidak boleh disusun dari satu checklist generik. Satu kontrak dapat mencakup struktur baja, mesin, kabel, fastener, alat kerja, dan spare part; setiap barang bisa memiliki klasifikasi, persyaratan, pola kemasan, serta tujuan penggunaan yang berbeda.</p>

<p>Kontrol yang benar dimulai dari <strong>line item dan shipment aktual</strong>. Setelah itu barulah tim menentukan data Pemberitahuan Ekspor Barang (PEB), dokumen pelengkap pabean, larangan atau pembatasan (lartas), serta dokumen komersial dan negara tujuan. Pendekatan ini mencegah satu izin atau satu HS digunakan untuk seluruh paket hanya karena barang berada dalam proyek yang sama.</p>

<p>Panduan ini diperbarui pada 29 Agustus 2026. Karena klasifikasi, lartas, bea keluar, dan persyaratan tujuan dapat berubah, hasil pemeriksaan harus disimpan bersama tanggal, sumber, serta identitas barang yang diperiksa.</p>

<h2>Dasar resmi dan batas panduan</h2>

<p><a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">PMK 155/PMK.04/2022 tentang Ketentuan Kepabeanan di Bidang Ekspor</a> menjadi rujukan utama. Peraturan ini mengatur pemberitahuan pabean ekspor, penelitian dokumen, pemeriksaan fisik berdasarkan kriteria, pelayanan ekspor, pembetulan, pembatalan, serta kondisi khusus lainnya.</p>

<p>Dalam penelitian dokumen, dokumen pelengkap pabean mencakup invoice, packing list, bill of lading atau airway bill, serta dokumen lain yang diwajibkan untuk memenuhi ketentuan ekspor. Data B/L atau AWB dapat dilengkapi pada PEB paling lama tiga hari sejak keberangkatan sarana pengangkut. Karena itu, jangan membuat aturan internal yang salah seolah-olah final B/L selalu harus sudah terbit sebelum pengajuan PEB.</p>

<p>PMK tersebut juga menilai pemenuhan ketentuan umum ekspor, lartas, dan kebenaran penghitungan bea keluar bila barang memang dikenakan bea keluar. Tidak semua barang ekspor dikenakan bea keluar, tidak semua diperiksa fisik, dan tidak semua dokumen pendukung berlaku untuk setiap shipment.</p>

<h2>Tiga kelas dokumen yang harus dipisahkan</h2>

<table>
<thead><tr><th>Kelas</th><th>Contoh</th><th>Keputusan</th></tr></thead>
<tbody>
<tr><td>Dokumen pabean dan pelengkap</td><td>PEB, invoice, packing list, B/L atau AWB, bukti bayar bea keluar bila berlaku</td><td>Ikuti PMK dan hasil validasi shipment aktual</td></tr>
<tr><td>Dokumen kondisional</td><td>Persetujuan ekspor, sertifikat teknis, phytosanitary certificate, SKA, treatment certificate</td><td>Ditentukan oleh HS, uraian barang, instansi teknis, negara tujuan, atau skema asal</td></tr>
<tr><td>Dokumen pendukung internal/komersial</td><td>Kontrak, PO, drawing, katalog, material take-off, inspection report, polis asuransi</td><td>Digunakan untuk pembuktian dan kontrol; bukan otomatis dokumen wajib pabean</td></tr>
</tbody>
</table>

<p>Pemisahan ini penting. Polis asuransi bergantung pada kontrak dan pembagian risiko. SKA bergantung pada skema serta ketentuan asal. Drawing membantu identifikasi atau klasifikasi, tetapi bukan selalu lampiran wajib. Mengubah semua dokumen menjadi “wajib” membuat tim mengejar berkas yang tidak relevan sekaligus mengabaikan izin yang benar-benar kritis.</p>

<h2>Gate 1: bentuk commodity master per line item</h2>

<p>Sebelum membuat invoice, bentuk satu commodity master dengan kolom minimum berikut:</p>

<ul>
<li>nomor kontrak, project code, dan item proyek;</li>
<li>nama teknis, fungsi, material, merek, model, dan part number;</li>
<li>kondisi barang: baru, bekas, rakitan, atau komponen;</li>
<li>quantity dan unit of measure;</li>
<li>negara asal, eksportir, buyer, consignee, dan negara tujuan;</li>
<li>candidate HS beserta dasar klasifikasinya;</li>
<li>status lartas, bea keluar, fasilitas, dan dokumen negara tujuan;</li>
<li>packing ID, berat bersih, berat kotor, serta dimensi.</li>
</ul>

<p>Kode HS tidak boleh dipilih hanya dari nama dagang. Gunakan fungsi, material, tingkat pengerjaan, dan dokumen teknis, lalu periksa struktur klasifikasi Indonesia melalui <a href="https://www.beacukai.go.id/btki-dan-tarif" target="_blank" rel="noopener noreferrer">BTKI DJBC</a>. Halaman resmi DJBC juga menunjukkan riwayat perubahan dasar BTKI; pemeriksaan harus memakai ketentuan yang berlaku pada tanggal pendaftaran dokumen.</p>

<h2>Gate 2: lakukan HS dan lartas check per barang</h2>

<p>Setelah candidate HS tersedia, periksa <a href="https://www.insw.go.id/intr" target="_blank" rel="noopener noreferrer">Indonesia National Trade Repository pada INSW</a>. Simpan minimal kode HS, uraian, regulasi, instansi penerbit, jenis perizinan, masa berlaku hasil pemeriksaan, dan tautan sumber.</p>

<p>Jangan berhenti pada kode HS. Cocokkan pula uraian dan parameter komoditas pada regulasi teknis. Jika satu pos tarif memuat barang yang dibatasi dan tidak dibatasi, tim harus membuktikan cabang mana yang berlaku. Izin dari shipment lama tidak otomatis dapat dipakai untuk barang, eksportir, tujuan, jumlah, atau periode yang berbeda.</p>

<p>Jika barang proyek merupakan alat yang hanya dipinjamkan, akan dikembalikan, atau sebelumnya diimpor dengan kewajiban ekspor kembali, jangan memaksanya ke alur ekspor definitif biasa. Tandai sebagai exception dan tentukan prosedur kepabeanan yang sesuai sebelum booking.</p>

<h2>Gate 3: rekonsiliasi invoice, packing list, dan data PEB</h2>

<table>
<thead><tr><th>Data</th><th>Kontrol</th><th>Bukti</th></tr></thead>
<tbody>
<tr><td>Para pihak</td><td>Eksportir, buyer, consignee, notify party, dan alamat tidak tertukar</td><td>Kontrak, PO, instruction sheet</td></tr>
<tr><td>Barang</td><td>Uraian, HS, merek/model, part number, kondisi, quantity, dan satuan konsisten</td><td>Commodity master, katalog, foto</td></tr>
<tr><td>Nilai</td><td>Harga, mata uang, Incoterms, freight/insurance allocation, dan total dapat direkonsiliasi</td><td>Invoice, kontrak, costing</td></tr>
<tr><td>Kemasan</td><td>Jumlah koli, packing ID, net/gross weight, volume, mark dan number cocok</td><td>Packing list, tally, weighbridge</td></tr>
<tr><td>Pengangkutan</td><td>Mode, pelabuhan muat, tujuan, booking, container, seal, B/L atau AWB termutakhir</td><td>Shipping instruction, carrier response</td></tr>
</tbody>
</table>

<p>Jangan menggunakan istilah “nilai pabean” secara longgar untuk nilai ekspor. Simpan basis nilai transaksi dan elemen biaya secara jelas agar data PEB, invoice, pembukuan, serta dokumen asal dapat ditelusuri. Bila barang dikenakan bea keluar, lakukan penghitungan dan pembayaran menurut ketentuan komoditas yang berlaku.</p>

<h2>Gate 4: kendalikan partial shipment terhadap kontrak</h2>

<p>Ekspor proyek sering dikirim bertahap. Buat <em>shipment allocation register</em> yang memuat contract quantity, shipped-to-date, quantity shipment berjalan, sisa, nilai, packing ID, dan nomor dokumen. Register ini mencegah item terkirim ganda, saldo kontrak negatif, atau nilai invoice yang tidak dapat dijelaskan.</p>

<p>Contoh: paket “steel processing line” berisi frame fabrikasi, motor, control panel, cable set, dan spare part. Nama paket boleh digunakan untuk kepentingan proyek, tetapi tiap line tetap harus diidentifikasi. Tim tidak boleh menetapkan satu HS untuk seluruh paket sebelum menilai karakter barang dan kaidah klasifikasinya. Invoice, packing list, serta PEB shipment pertama hanya memuat item dan quantity yang benar-benar dikirim pada tahap tersebut.</p>

<h2>Gate 5: bedakan PEB, NPE, B/L, dan SKA</h2>

<ul>
<li><strong>PEB</strong> adalah pemberitahuan pabean ekspor; ia bukan invoice atau booking kapal.</li>
<li><strong>NPE</strong> adalah respons pelayanan ekspor Indonesia setelah persyaratan yang relevan terpenuhi; bukan jaminan import clearance atau penerimaan buyer.</li>
<li><strong>B/L atau AWB</strong> adalah dokumen pengangkutan. Draft dan final harus dikontrol versinya dan direkonsiliasi kembali ke PEB.</li>
<li><strong>SKA/COO</strong> membuktikan asal barang untuk tujuan tertentu. <a href="https://e-ska.kemendag.go.id/home.php/home/form" target="_blank" rel="noopener noreferrer">e-SKA Kementerian Perdagangan</a> membedakan SKA preferensi dan nonpreferensi; kebutuhan dan form ditentukan oleh skema serta negara tujuan.</li>
</ul>

<p>NIB adalah identitas resmi pelaku usaha pada <a href="https://oss.go.id/id" target="_blank" rel="noopener noreferrer">OSS</a>, tetapi kepemilikan NIB tidak otomatis memenuhi izin komoditas, ketentuan asal, atau persyaratan negara tujuan. Setiap gate tetap harus diperiksa.</p>

<h2>RACI dan batas persetujuan</h2>

<table>
<thead><tr><th>Aktivitas</th><th>Responsible</th><th>Approver</th><th>Gate</th></tr></thead>
<tbody>
<tr><td>Identifikasi dan candidate HS</td><td>Produk/engineering + customs</td><td>Compliance lead</td><td>Technical dossier lengkap</td></tr>
<tr><td>Lartas dan tujuan</td><td>Compliance</td><td>Export manager</td><td>Sumber resmi dan tanggal tersimpan</td></tr>
<tr><td>Invoice dan packing</td><td>Commercial + warehouse</td><td>Finance/operations</td><td>Quantity, nilai, dan packing reconciled</td></tr>
<tr><td>PEB</td><td>Eksportir atau PPJK yang diberi kuasa</td><td>Eksportir</td><td>Draft four-eyes review</td></tr>
<tr><td>Shipping document</td><td>Forwarder/carrier desk</td><td>Export manager</td><td>PEB, SI, dan final transport data cocok</td></tr>
</tbody>
</table>

<p>PPJK atau freight forwarder dapat membantu penyampaian dan koordinasi, tetapi pemilik data barang tetap harus memberikan informasi yang benar. Jangan meminta penyedia jasa menebak fungsi, material, nilai, atau HS dari foto yang tidak lengkap.</p>

<h2>Exception yang harus menghentikan release</h2>

<ul>
<li>HS belum memiliki classification basis atau berubah tanpa approval.</li>
<li>Hasil lartas hanya berupa tangkapan layar tanpa tanggal dan regulasi.</li>
<li>Quantity, unit, weight, value, country, atau identity berbeda antar dokumen.</li>
<li>Barang bekas, returnable, temporary, atau re-export diperlakukan sebagai penjualan biasa.</li>
<li>Izin belum terbit, tidak mencakup barang, atau tidak cocok dengan periode dan pelaku usaha.</li>
<li>Nomor container/seal berubah setelah final reconciliation tanpa exception record.</li>
<li>Tim menjanjikan NPE, keberangkatan, atau clearance tujuan pada waktu tertentu.</li>
</ul>

<h2>Checklist final sebelum barang masuk kawasan pabean</h2>

<ol>
<li>Legal entity, NIB, kuasa, dan data eksportir telah diverifikasi.</li>
<li>Commodity master serta dokumen teknis setiap line item lengkap.</li>
<li>HS dan dasar klasifikasi disetujui oleh pihak berwenang internal.</li>
<li>Lartas, bea keluar, fasilitas, dan persyaratan negara tujuan diperiksa dari sumber resmi.</li>
<li>Invoice, packing list, kontrak, dan shipment allocation register direkonsiliasi.</li>
<li>Draft PEB melewati pemeriksaan dua orang dan exception berstatus tertutup.</li>
<li>Booking, cut-off, lokasi stuffing, container, seal, dan shipping instruction konsisten.</li>
<li>NPE dan respons sistem dipantau tanpa menganggapnya jaminan clearance tujuan.</li>
<li>B/L/AWB final, SKA bila diperlukan, dan dokumen pascakeberangkatan direkonsiliasi.</li>
<li>Version lock, audit trail, bukti sumber, dan arsip shipment disimpan.</li>
</ol>

<h2>Kesimpulan</h2>

<p>Dokumen kepabeanan ekspor proyek konstruksi yang baik bukan tumpukan berkas, melainkan sistem kontrol per line item dan per shipment. Pisahkan dokumen pabean, dokumen kondisional, serta bukti internal; kunci klasifikasi dan lartas; kendalikan partial shipment; kemudian rekonsiliasi data komersial, kemasan, PEB, dan pengangkutan.</p>

<p>GMA World dapat membantu membangun commodity master, document matrix, shipment allocation register, timeline, dan exception tracker. Penetapan klasifikasi, penerbitan izin atau respons pabean, serta penerimaan di negara tujuan tetap mengikuti kewenangan instansi dan fakta shipment aktual.</p>

<h2>Referensi resmi</h2>

<ul>
<li><a href="https://jdih.kemenkeu.go.id/dok/155-pmk-04-2022/files" target="_blank" rel="noopener noreferrer">JDIH Kementerian Keuangan — PMK 155/PMK.04/2022</a></li>
<li><a href="https://www.beacukai.go.id/btki-dan-tarif" target="_blank" rel="noopener noreferrer">Direktorat Jenderal Bea dan Cukai — BTKI dan Tarif</a></li>
<li><a href="https://www.insw.go.id/intr" target="_blank" rel="noopener noreferrer">Indonesia National Single Window — Indonesia NTR</a></li>
<li><a href="https://e-ska.kemendag.go.id/home.php/home/form" target="_blank" rel="noopener noreferrer">Kementerian Perdagangan — e-SKA</a></li>
<li><a href="https://oss.go.id/id" target="_blank" rel="noopener noreferrer">OSS Indonesia — Perizinan Berusaha Berbasis Risiko</a></li>
</ul>
HTML,
    ],
];
