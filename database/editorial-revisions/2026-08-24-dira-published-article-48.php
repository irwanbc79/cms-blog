<?php

return [
    'article_id' => 48,
    'site_domain' => 'dira.co.id',
    'allow_published' => true,
    'expected' => [
        'title' => 'Dokumen Impor Kakao: Panduan Lengkap untuk UMKM 2026',
        'slug' => 'dokumen-impor-kakao-panduan-lengkap-umkm-2026',
        'status' => 'published',
        'editorial_status' => 'legacy',
        'content_sha256' => '70820b5ff7e9742fe86c648b71926842dfa76c507bc3bba9a9173ff5206c8964',
    ],
    'review_notes' => 'Live low-value remediation prepared on 2026-08-24. Removes unsupported market forecasts, fixed tariff and tax claims, blanket quarantine/BPOM requirements, obsolete standalone API/NIK framing, cost promises, undername shortcuts, and service guarantees. Rebuilt around product classification, current import-policy gates, NIB-API role, quarantine/BPOM decision paths, PIB evidence, landed cost, and document reconciliation. Requires human editorial re-review.',
    'changes' => [
        'title' => 'Impor Kakao: HS, NIB-API, Karantina, BPOM, dan PIB',
        'focus_keyword' => 'impor kakao Indonesia',
        'meta_description' => 'Checklist impor kakao: kunci bentuk produk dan HS, NIB-API, lartas, karantina, BPOM, supplier dossier, nilai pabean, PIB, dan landed-cost gate.',
        'excerpt' => 'Impor biji kakao, cocoa butter, powder, dan cokelat memakai gate berbeda. Kunci produk, HS, NIB-API, lartas, karantina/BPOM, nilai pabean, PIB, dan biaya sebelum shipment.',
        'og_title' => 'Impor Kakao: HS, NIB-API, Karantina, BPOM, dan PIB',
        'og_description' => 'Workflow operasional dari product dossier dan izin sampai kontrak, pre-shipment document check, PIB, pemeriksaan, landed cost, dan release gate.',
        'pillar' => 'impor-komoditas',
        'tags' => ['impor kakao', 'NIB API', 'karantina', 'BPOM', 'PIB'],
        'hashtags' => ['ImporKakao', 'NIBAPI', 'Karantina', 'BPOM', 'PIB'],
        'image_alt_texts' => [
            'Tim importir memeriksa product dossier kakao dan ketentuan HS sebelum shipment',
            'Rekonsiliasi dokumen impor kakao dari invoice dan packing list sampai PIB',
        ],
        'schema_faq' => [
            [
                'question' => 'Apakah semua bentuk kakao memakai izin dan dokumen impor yang sama?',
                'answer' => 'Tidak. Biji kakao, nibs, cocoa mass, cocoa butter, cocoa powder, bahan baku curah, pangan kemasan eceran, dan produk non-pangan dapat berbeda HS, lartas, karantina, BPOM, label, dan dokumennya.',
            ],
            [
                'question' => 'Apakah importir masih harus mengurus API sebagai dokumen terpisah?',
                'answer' => 'Kebijakan impor saat ini menggunakan NIB yang berlaku sebagai API. Importir perlu memastikan pilihan API-U atau API-P, KBLI, hak akses kepabeanan, perizinan berusaha, dan penggunaan barang sesuai dengan transaksi aktual.',
            ],
            [
                'question' => 'Apakah semua cocoa powder impor wajib memiliki izin edar BPOM RI ML?',
                'answer' => 'Tidak dapat disamaratakan. Pangan olahan impor yang diperdagangkan dalam kemasan eceran pada prinsipnya memerlukan PB-UMKU, sedangkan BPOM menjelaskan adanya kategori yang tidak wajib didaftarkan, termasuk bahan baku tertentu yang tidak dijual langsung kepada konsumen. Tentukan bentuk, kemasan, intended use, dan channel penjualan.',
            ],
            [
                'question' => 'Apakah memakai PPJK atau undername menghilangkan tanggung jawab pemilik barang?',
                'answer' => 'Tidak. PPJK bekerja berdasarkan kuasa dan perusahaan trading memegang peran hukum tertentu. Legalitas produk, nilai transaksi, alur pembayaran, lartas, mutu, kontrak, dan kebenaran data tetap harus dibuktikan dan dibagi jelas antar pihak.',
            ],
        ],
        'content_html' => <<<'HTML'
<p>Impor kakao tidak mempunyai satu daftar dokumen yang berlaku untuk semua produk. Biji kakao mentah, biji sangrai, nibs, cocoa mass, cocoa butter, cocoa powder, cokelat curah, dan cokelat kemasan eceran berbeda dalam klasifikasi, intended use, persyaratan karantina, pengawasan pangan, label, serta dokumen. Kesalahan paling mahal biasanya terjadi sebelum barang dikapalkan: produk belum terkunci tetapi purchase order dan booking sudah dibuat.</p>

<p>Artikel ini diperbarui pada 24 Agustus 2026 berdasarkan <a href="https://jdih.kemendag.go.id/peraturan/peraturan-menteri-perdagangan-republik-indonesia-nomor-18-tahun-2026-tentang-perubahan-kedua-atas-peraturan-menteri-perdagangan-nomor-16-tahun-2025-tentang-kebijakan-dan-pengaturan-impor-1" target="_blank" rel="noopener noreferrer">Permendag 18 Tahun 2026 pada JDIH Kemendag</a>, <a href="https://jdih.kemendag.go.id/peraturan/peraturan-menteri-perdagangan-republik-indonesia-nomor-11-tahun-2026-tentang-perubahan-kedua-atas-peraturan-menteri-perdagangan-nomor-18-tahun-2025-tentang-kebijakan-dan-pengaturan-impor-barang-pertanian-dan-peternakan" target="_blank" rel="noopener noreferrer">Permendag 11 Tahun 2026 tentang impor barang pertanian dan peternakan</a>, <a href="https://www.beacukai.go.id/impor-untuk-dipakai" target="_blank" rel="noopener noreferrer">Impor untuk Dipakai DJBC</a>, serta <a href="https://registrasipangan.pom.go.id/layanan" target="_blank" rel="noopener noreferrer">layanan Registrasi Pangan Olahan BPOM</a>. Gunakan versi aturan, lampiran, dan sistem yang berlaku pada tanggal transaksi.</p>

<h2>Gate 1: kunci produk sebelum mencari izin</h2>

<p>Buat product dossier per SKU. Jangan memakai uraian “cocoa product” atau “cocoa powder” tanpa rincian. Informasi minimum mencakup nama teknis dan komersial, komposisi, proses, bentuk, fermentasi atau roasting, kadar lemak, penambahan gula atau bahan lain, intended use, kemasan, net weight, shelf life, negara asal, produsen, serta calon HS.</p>

<table>
<thead><tr><th>Bentuk transaksi</th><th>Pertanyaan utama</th><th>Gate yang diperiksa</th></tr></thead>
<tbody>
<tr><td>Biji kakao</td><td>Mentah/sangrai, fermentasi, origin, risiko organisme pengganggu, dan penggunaan.</td><td>HS, kebijakan pertanian, karantina, mutu, PIB.</td></tr>
<tr><td>Bahan baku olahan curah</td><td>Mass, butter, powder, komposisi, food grade, proses lanjutan, dan kemasan bulk.</td><td>HS, lartas, BPOM decision, spesifikasi, PIB.</td></tr>
<tr><td>Pangan kemasan eceran</td><td>Formula, label Indonesia, claim, nutrition, shelf life, dan channel penjualan.</td><td>PB-UMKU/BPOM RI ML, label, HS, lartas, PIB.</td></tr>
<tr><td>Bahan non-pangan</td><td>Kosmetik, farmasi, atau penggunaan industri lain.</td><td>Regulator sektoral dan izin sesuai intended use.</td></tr>
</tbody>
</table>

<p>HS Code ditentukan oleh kondisi barang pada saat impor. Merek, penggunaan internal, atau kode dari supplier bukan keputusan klasifikasi. Cocokkan deskripsi teknis dengan BTKI dan Ketentuan Umum untuk Menginterpretasi Harmonized System, kemudian periksa tarif dan larangan/pembatasan pada <a href="https://www.insw.go.id/" target="_blank" rel="noopener noreferrer">Portal INSW</a>. Bila dampaknya material dan klasifikasi masih tidak pasti, pertimbangkan mekanisme penetapan klasifikasi sesuai ketentuan DJBC.</p>

<h2>Gate 2: tetapkan siapa importir dan bagaimana barang digunakan</h2>

<p>Permendag 16 Tahun 2025 beserta perubahannya menggunakan NIB yang berlaku sebagai API. Pilihan API-U atau API-P harus konsisten dengan kegiatan usaha dan penggunaan barang. Pastikan NIB, KBLI, status API, hak akses kepabeanan, identitas pajak, alamat, dan izin sektor sesuai sebelum kontrak serta shipment.</p>

<p>Pisahkan peran pemilik barang, buyer pada purchase contract, payer, consignee, importir pada PIB, penerima barang, dan pengguna akhir. Bila perusahaan trading digunakan sebagai importir, kontrak harus menjelaskan kepemilikan, pembayaran, pajak, penguasaan dokumen, inspeksi, liability, claim, serta siapa membuat keputusan apabila lartas atau mutu tidak terpenuhi.</p>

<p>PPJK mengurus kewajiban pabean berdasarkan kuasa dan data yang diberikan. PPJK bukan penerbit izin, bukan penentu otomatis HS, dan tidak mengubah transaksi yang tidak memenuhi ketentuan menjadi sah. Istilah “undername” tidak boleh dipakai sebagai jalan pintas tanpa due diligence atas perusahaan importir dan struktur transaksi.</p>

<h2>Gate 3: bangun matriks izin dari HS dan intended use</h2>

<p>Periksa dua lapisan kebijakan perdagangan: ketentuan umum impor dan ketentuan sektor pertanian/peternakan apabila produk masuk cakupannya. Permendag 18 Tahun 2026 mengubah Permendag 16 Tahun 2025, sementara Permendag 11 Tahun 2026 mengubah kebijakan impor barang pertanian dan peternakan. Jangan menarik kesimpulan dari nomor peraturan saja; cocokkan HS dan uraian produk dengan lampiran serta hasil INSW.</p>

<p>Untuk bahan asal tumbuhan, periksa persyaratan pemasukan pada <a href="https://www.karantinaindonesia.go.id/" target="_blank" rel="noopener noreferrer">Badan Karantina Indonesia</a>: kategori media pembawa, negara asal, tempat pemasukan, phytosanitary requirement, prior notice atau permohonan layanan, treatment, inspection, sampling, dan dokumen negara asal. Tidak semua bentuk kakao otomatis mempunyai requirement yang sama karena tingkat pengolahan dan risiko dapat berbeda.</p>

<p>Untuk pangan olahan, BPOM menjelaskan bahwa pangan olahan impor yang diperdagangkan dalam kemasan eceran wajib memiliki PB-UMKU. BPOM juga mencantumkan pengecualian, termasuk bahan baku tertentu yang tidak dijual langsung kepada konsumen akhir dan kategori lain sesuai ketentuan. Karena itu, keputusan BPOM harus didasarkan pada produk, proses, kemasan, channel, dan penggunaan aktual; jangan menyamakan cocoa powder curah untuk pabrik dengan minuman cokelat eceran.</p>

<h2>Gate 4: uji supplier dan dokumen sebelum pembayaran</h2>

<p>Supplier dossier perlu berisi legal identity, alamat fasilitas, otoritas penandatangan, rekening, pengalaman produk, specification sheet, process flow, allergen statement, COA template, food-safety evidence bila relevan, traceability, recall contact, serta kemampuan menyiapkan certificate negara asal. Verifikasi langsung kepada sumber, bukan hanya menerima file PDF dari perantara.</p>

<p>Purchase contract setidaknya mengunci:</p>

<ul>
<li>produk, komposisi, specification annex, lot, quantity, dan toleransi;</li>
<li>harga, currency, Incoterm beserta named place/port, dan validity;</li>
<li>dokumen yang wajib tersedia sebelum loading dan sebelum pembayaran;</li>
<li>sampling, inspection, laboratory, sample approval, dan retain sample;</li>
<li>shipment window, shelf-life minimum saat tiba, dan temperature/storage condition;</li>
<li>claim period, rejection, replacement/refund, recall, serta pembagian biaya;</li>
<li>perubahan regulasi dan hak menahan shipment bila izin belum siap.</li>
</ul>

<p>Incoterms membagi biaya dan risiko tertentu, tetapi tidak menentukan HS, lartas, nilai pabean, kepemilikan, pembayaran, atau penerimaan mutu. Kontrak tetap harus mengatur hal-hal tersebut secara terpisah.</p>

<h2>Gate 5: jalankan pre-shipment document check</h2>

<table>
<thead><tr><th>Dokumen/data</th><th>Pemeriksaan utama</th><th>Status hold bila</th></tr></thead>
<tbody>
<tr><td>Invoice</td><td>Seller, buyer, description, quantity, unit price, currency, Incoterm, terms.</td><td>Uraian terlalu umum atau nilai tidak dapat dijelaskan.</td></tr>
<tr><td>Packing list</td><td>Package, lot, net/gross weight, dimension, mark, pallet.</td><td>Tidak cocok dengan invoice atau booking.</td></tr>
<tr><td>B/L atau AWB draft</td><td>Shipper, consignee, notify, ports, package, weight, freight term.</td><td>Identitas atau data kargo berbeda.</td></tr>
<tr><td>Certificate</td><td>Issuer, nomor, produk, origin, quantity, date, treatment, declaration.</td><td>Certificate tidak terhubung ke shipment.</td></tr>
<tr><td>COA/inspection</td><td>Lot, sampling, method, parameter, result, issuer, approval.</td><td>Sampel tidak mewakili lot atau hasil di luar spec.</td></tr>
<tr><td>Izin/registrasi</td><td>Pemegang, HS, uraian, volume, masa berlaku, tempat, dan syarat.</td><td>Belum terbit atau tidak sesuai transaksi.</td></tr>
</tbody>
</table>

<p>Periksa draft sebelum on-board date. Original document yang diterbitkan setelah keberangkatan dapat menciptakan risiko bila isinya ternyata tidak sesuai. Setiap koreksi harus dikendalikan dengan version log dan disebarkan ke supplier, carrier, bank, PPJK, karantina, dan tim internal yang relevan.</p>

<h2>Gate 6: siapkan PIB dan nilai pabean dengan evidence</h2>

<p>DJBC menjelaskan bahwa PIB adalah pemberitahuan pabean untuk impor dan dilengkapi dokumen seperti invoice, packing list, B/L atau AWB, dokumen identifikasi barang, serta bukti pemenuhan persyaratan impor. Data PIB harus ditarik dari master shipment, bukan diketik ulang dari chat.</p>

<p>Rekonsiliasi importir, pemasok, consignee, HS, uraian, quantity, satuan, net/gross weight, nilai, currency, freight, insurance, negara asal, fasilitas tarif bila digunakan, izin, dan pembayaran. Nilai pabean harus didukung oleh kontrak, invoice, bukti pembayaran, freight/insurance, adjustment, hubungan pihak, dan dokumen lain yang relevan. Harga rendah dari supplier tidak otomatis menjadi nilai yang dapat diterima tanpa evidence.</p>

<p>Penelitian dokumen dan pemeriksaan fisik dilakukan berdasarkan ketentuan dan manajemen risiko. Respons layanan bukan janji jalur atau waktu. Jangan merencanakan produksi seolah SPPB pasti terbit pada hari tertentu.</p>

<h2>Gate 7: hitung landed cost, bukan hanya bea masuk</h2>

<p>Tarif dan pajak tidak boleh disalin dari artikel lama. Gunakan HS, negara asal, skema preferensi, tarif yang berlaku, status importir, dan tanggal PIB. Landed-cost sheet mencakup harga barang, freight, insurance, adjustment nilai pabean, bea masuk, pajak dalam rangka impor, pungutan atau fasilitas yang relevan, bank charge, inspection, karantina, BPOM, PPJK, terminal, storage, demurrage/detention risk, trucking, warehouse, testing, dan financing.</p>

<p>Buat skenario base, redress atau dokumen tambahan, pemeriksaan fisik, treatment/re-test, serta penolakan atau re-export. Pisahkan angka estimasi dari aktual, catat sumber dan tanggal tarif, lalu rekonsiliasi setelah barang keluar. Harga jual tidak boleh ditetapkan dari CIF supplier ditambah persentase kasar.</p>

<h2>Keputusan go, hold, atau stop</h2>

<p>Status <strong>go</strong> diberikan hanya jika product dossier final, HS dan lartas diperiksa, importir berwenang, izin/registrasi sesuai, supplier dan pembayaran terverifikasi, kontrak efektif, sample/COA diterima, draft dokumen konsisten, serta landed cost disetujui. Status <strong>hold</strong> digunakan ketika koreksi atau izin masih mungkin diselesaikan sebelum loading. Status <strong>stop</strong> digunakan bila produk tidak dapat diklasifikasikan secara bertanggung jawab, pihak transaksi tidak dapat diverifikasi, izin tidak realistis, asal atau mutu tidak dapat dibuktikan, atau struktur pembayaran tidak masuk akal.</p>

<p>Dira dapat membantu menyusun product dossier, importer-role matrix, permit register, landed-cost sheet, dan document reconciliation. Dira tidak menjamin HS, jalur pemeriksaan, waktu SPPB, persetujuan karantina/BPOM, tarif preferensi, atau penerimaan barang karena keputusan tersebut bergantung pada data aktual dan instansi berwenang.</p>

<p><strong>Catatan editorial:</strong> artikel ini mencatat sumber resmi yang diperiksa pada 24 Agustus 2026. Permendag 16 Tahun 2025 telah diubah, termasuk oleh Permendag 18 Tahun 2026, dan kebijakan barang pertanian/peternakan juga mempunyai pengaturan sektoral. Verifikasi kembali lampiran HS, INSW, karantina, BPOM, tarif, serta status perizinan pada tanggal transaksi.</p>
HTML,
    ],
];
