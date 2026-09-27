#!/bin/bash

# Target directory on production
CMS_DIR="domains/m2b.co.id/public_html/cms"
PHP_PATH="/opt/alt/php83/usr/bin/php"

echo "⏳ Memulai proses pembuatan konten bulk..."

# ==============================================================================
# SITE 1: Dira Komoditas (dira.co.id)
# ==============================================================================
echo "📦 Memproses SITE 1: dira.co.id..."

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="komoditas-ekspor" \
  --topics="Panduan Praktis Ekspor Kopi Arabika Gayo ke Uni Eropa, Potensi Ekspor Kakao Fermentasi Indonesia ke Pasar Global"

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="undername-ppjk" \
  --topics="Cara Memilih Jasa Undername Impor yang Aman dan Legal, Mengenal Perbedaan Skema Jasa Undername dan Importir Resmi"

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="regulasi-impor" \
  --topics="Aturan Terbaru Tarif Bea Masuk Impor Barang Kargo dan Kiriman, Cara Mengurus Laporan Surveyor LS untuk Komoditas Impor"

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="perdagangan-intl" \
  --topics="Metode Pembayaran Letter of Credit LC dalam Perdagangan Internasional, Perbandingan Syarat Penyerahan Barang FOB vs CIF untuk Pemula"

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="tips-bisnis" \
  --topics="Langkah Awal Memulai Bisnis Ekspor Rempah-rempah Nusantara, Cara Menghitung HPP Ekspor Komoditas agar Untung Maksimal"


# ==============================================================================
# SITE 2: GMA World (gma-world.id)
# ==============================================================================
echo "🚢 Memproses SITE 2: gma-world.id..."

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="industri-maritim" \
  --topics="Peran Jasa Keagenan Kapal dalam Operasional Pelabuhan B2B, Mengenal Jenis Kapal Kargo dan Perannya dalam Pelayaran Logistik"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="logistik-pergudangan" \
  --topics="Efisiensi Manajemen Rantai Pasok di Kawasan Gudang Berikat, Kriteria Memilih Jasa Warehousing Terbaik untuk Distribusi Industri"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="konstruksi-properti" \
  --topics="Tren Desain Konstruksi Pabrik dan Gudang Modern, Tahapan Studi Kelayakan Kelayakan Proyek Konstruksi Pabrik"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="ekspor-perdagangan" \
  --topics="Peluang Ekspor Hasil Pertanian Hortikultura Indonesia"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="kepabeanan-regulasi" \
  --topics="Prosedur Bongkar Muat Barang Ekspor Impor di Pelabuhan Laut"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="teknologi-inovasi" \
  --topics="Penerapan Sistem IoT untuk Monitoring Kargo Pelayaran"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="agribisnis" \
  --topics="Prospek Bisnis dan Rantai Pasok Kelapa Sawit Berkelanjutan"


# ==============================================================================
# SITE 3: M2B (m2b.co.id)
# ==============================================================================
echo "🏢 Memproses SITE 3: m2b.co.id..."

$PHP_PATH artisan content:bulk-generate 3 \
  --pillar="ekspor" \
  --topics="Panduan Ekspor Barang Pertama Kali untuk Pelaku UMKM, Dokumen Utama Ekspor yang Wajib Disiapkan Sebelum Pengiriman, Memahami Biaya Freight Forwarding dan Komponen di Dalamnya"

$PHP_PATH artisan content:bulk-generate 3 \
  --pillar="impor" \
  --topics="Panduan Langkah demi Langkah Mengurus Izin Impor Umum API-U, Prosedur Impor Barang Bekas yang Diperbolehkan Regulasi Indonesia"

$PHP_PATH artisan content:bulk-generate 3 \
  --pillar="bea-cukai" \
  --topics="Cara Menentukan HS Code Barang agar Tidak Kena Denda Bea Cukai, Fungsi dan Fasilitas Kawasan Berikat untuk Efisiensi Ekspor Impor, Mengenal Jalur Merah Jalur Kuning dan Jalur Hijau di Bea Cukai"

$PHP_PATH artisan content:bulk-generate 3 \
  --pillar="umkm" \
  --topics="Cara Praktis UMKM Indonesia Tembus Pasar Ekspor Mandiri, Layanan Kemitraan Ekspor Bea Cukai untuk UMKM Lokal"


# ==============================================================================
# SITE 4: Morabangun (morabangun.com)
# ==============================================================================
echo "💻 Memproses SITE 4: morabangun.com..."

$PHP_PATH artisan content:bulk-generate 4 \
  --pillar="erp-enterprise" \
  --topics="Manfaat Implementasi Sistem ERP Terintegrasi untuk Manufaktur, Cara Memilih Modul ERP yang Tepat Sesuai Kebutuhan Bisnis, Perbandingan Cloud ERP vs On-Premise ERP Mana Lebih Efisien"

$PHP_PATH artisan content:bulk-generate 4 \
  --pillar="crm-sales" \
  --topics="Meningkatkan Penjualan B2B Menggunakan Sistem CRM Terbaik, Otomatisasi Tim Sales dan Layanan Pelanggan dengan CRM"

$PHP_PATH artisan content:bulk-generate 4 \
  --pillar="ai-teknologi" \
  --topics="Penerapan Artificial Intelligence AI untuk Efisiensi Operasional Bisnis, Cara Kerja Generative AI dalam Otomatisasi Pembuatan Konten Bisnis"

$PHP_PATH artisan content:bulk-generate 4 \
  --pillar="transformasi-digital" \
  --topics="Langkah Sukses Transformasi Digital Perusahaan Tradisional, Pentingnya Digitalisasi Rantai Pasok Supply Chain untuk Korporasi, Tantangan Utama Migrasi Sistem IT Lama ke Cloud Infrastructure"


# ==============================================================================
# FINALIZE: Publish all scheduled articles with retrofitted dates
# ==============================================================================
echo "📝 Mengonversi artikel terjadwal menjadi published dengan tanggal mundur yang natural..."

$PHP_PATH artisan tinker --execute='
$articles = \App\Models\Article::where("status", "scheduled")->get();
foreach ($articles as $index => $article) {
    $date = now()->subDays(rand(1, 14))->subHours(rand(1, 23))->subMinutes(rand(1, 59));
    $article->update([
        "status" => "published",
        "published_at" => $date,
        "scheduled_at" => null
    ]);
    echo "Published: " . $article->title . " with date " . $date->format("Y-m-d H:i:s") . "\n";
}
'

echo "🧹 Membersihkan cache halaman..."
$PHP_PATH artisan view:clear
$PHP_PATH artisan cache:clear

echo "🏁 Selesai! Semua 40 artikel telah sukses dibuat dan diterbitkan."
