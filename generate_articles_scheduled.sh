#!/bin/bash

# Target directory on production
CMS_DIR="/home/u301249154/domains/m2b.co.id/public_html/cms"
PHP_PATH="/opt/alt/php83/usr/bin/php"

echo "⏳ Memulai proses pembuatan dan penjadwalan konten bulk (40 artikel)..."
cd $CMS_DIR

# ==============================================================================
# SITE 1: Dira Komoditas (dira.co.id)
# ==============================================================================
echo "📦 Memproses SITE 1: dira.co.id (Pagi Hari, setiap 2 hari)..."

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="komoditas-ekspor" \
  --schedule-days=2 \
  --start-hour=8 \
  --topics="Panduan Praktis Ekspor Kopi Arabika Gayo ke Uni Eropa, Potensi Ekspor Kakao Fermentasi Indonesia ke Pasar Global"

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="undername-ppjk" \
  --schedule-days=2 \
  --start-hour=8 \
  --topics="Cara Memilih Jasa Undername Impor yang Aman dan Legal, Mengenal Perbedaan Skema Jasa Undername dan Importir Resmi"

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="regulasi-impor" \
  --schedule-days=2 \
  --start-hour=8 \
  --topics="Aturan Terbaru Tarif Bea Masuk Impor Barang Kargo dan Kiriman, Cara Mengurus Laporan Surveyor LS untuk Komoditas Impor"

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="perdagangan-intl" \
  --schedule-days=2 \
  --start-hour=8 \
  --topics="Metode Pembayaran Letter of Credit LC dalam Perdagangan Internasional, Perbandingan Syarat Penyerahan Barang FOB vs CIF untuk Pemula"

$PHP_PATH artisan content:bulk-generate 1 \
  --pillar="tips-bisnis" \
  --schedule-days=2 \
  --start-hour=8 \
  --topics="Langkah Awal Memulai Bisnis Ekspor Rempah-rempah Nusantara, Cara Menghitung HPP Ekspor Komoditas agar Untung Maksimal"


# ==============================================================================
# SITE 2: GMA World (gma-world.id)
# ==============================================================================
echo "🚢 Memproses SITE 2: gma-world.id (Siang Hari, setiap 2 hari)..."

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="industri-maritim" \
  --schedule-days=2 \
  --start-hour=12 \
  --topics="Peran Jasa Keagenan Kapal dalam Operasional Pelabuhan B2B, Mengenal Jenis Kapal Kargo dan Perannya dalam Pelayaran Logistik"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="logistik-pergudangan" \
  --schedule-days=2 \
  --start-hour=12 \
  --topics="Efisiensi Manajemen Rantai Pasok di Kawasan Gudang Berikat, Kriteria Memilih Jasa Warehousing Terbaik untuk Distribusi Industri"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="konstruksi-properti" \
  --schedule-days=2 \
  --start-hour=12 \
  --topics="Tren Desain Konstruksi Pabrik dan Gudang Modern, Tahapan Studi Kelayakan Kelayakan Proyek Konstruksi Pabrik"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="ekspor-perdagangan" \
  --schedule-days=2 \
  --start-hour=12 \
  --topics="Peluang Ekspor Hasil Pertanian Hortikultura Indonesia"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="kepabeanan-regulasi" \
  --schedule-days=2 \
  --start-hour=12 \
  --topics="Prosedur Bongkar Muat Barang Ekspor Impor di Pelabuhan Laut"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="teknologi-inovasi" \
  --schedule-days=2 \
  --start-hour=12 \
  --topics="Penerapan Sistem IoT untuk Monitoring Kargo Pelayaran"

$PHP_PATH artisan content:bulk-generate 2 \
  --pillar="agribisnis" \
  --schedule-days=2 \
  --start-hour=12 \
  --topics="Prospek Bisnis dan Rantai Pasok Kelapa Sawit Berkelanjutan"


# ==============================================================================
# SITE 3: M2B (m2b.co.id)
# ==============================================================================
echo "🏢 Memproses SITE 3: m2b.co.id (Sore Hari, setiap 2 hari)..."

$PHP_PATH artisan content:bulk-generate 3 \
  --pillar="ekspor" \
  --schedule-days=2 \
  --start-hour=16 \
  --topics="Panduan Ekspor Barang Pertama Kali untuk Pelaku UMKM, Dokumen Utama Ekspor yang Wajib Disiapkan Sebelum Pengiriman, Memahami Biaya Freight Forwarding dan Komponen di Dalamnya"

$PHP_PATH artisan content:bulk-generate 3 \
  --pillar="impor" \
  --schedule-days=2 \
  --start-hour=16 \
  --topics="Panduan Langkah demi Langkah Mengurus Izin Impor Umum API-U, Prosedur Impor Barang Bekas yang Diperbolehkan Regulasi Indonesia"

$PHP_PATH artisan content:bulk-generate 3 \
  --pillar="bea-cukai" \
  --schedule-days=2 \
  --start-hour=16 \
  --topics="Cara Menentukan HS Code Barang agar Tidak Kena Denda Bea Cukai, Fungsi dan Fasilitas Kawasan Berikat untuk Efisiensi Ekspor Impor, Mengenal Jalur Merah Jalur Kuning dan Jalur Hijau di Bea Cukai"

$PHP_PATH artisan content:bulk-generate 3 \
  --pillar="umkm" \
  --schedule-days=2 \
  --start-hour=16 \
  --topics="Cara Praktis UMKM Indonesia Tembus Pasar Ekspor Mandiri, Layanan Kemitraan Ekspor Bea Cukai untuk UMKM Lokal"


# ==============================================================================
# SITE 4: Morabangun (morabangun.com)
# ==============================================================================
echo "💻 Memproses SITE 4: morabangun.com (Malam Hari, setiap 2 hari)..."

$PHP_PATH artisan content:bulk-generate 4 \
  --pillar="erp-enterprise" \
  --schedule-days=2 \
  --start-hour=20 \
  --topics="Manfaat Implementasi Sistem ERP Terintegrasi untuk Manufaktur, Cara Memilih Modul ERP yang Tepat Sesuai Kebutuhan Bisnis, Perbandingan Cloud ERP vs On-Premise ERP Mana Lebih Efisien, Implementasi Cloud ERP Indonesia, Software ERP untuk Perusahaan Manufaktur, Sistem CRM berbasis AI"

$PHP_PATH artisan content:bulk-generate 4 \
  --pillar="crm-sales" \
  --schedule-days=2 \
  --start-hour=20 \
  --topics="Meningkatkan Penjualan B2B Menggunakan Sistem CRM Terbaik, Otomatisasi Tim Sales dan Layanan Pelanggan dengan CRM"

$PHP_PATH artisan content:bulk-generate 4 \
  --pillar="ai-teknologi" \
  --schedule-days=2 \
  --start-hour=20 \
  --topics="Penerapan Artificial Intelligence AI untuk Efisiensi Operasional Bisnis, Cara Kerja Generative AI dalam Otomatisasi Pembuatan Konten Bisnis, Otomasi Workflow Perusahaan dengan AI, Jasa Chatbot AI Enterprise, Machine Learning untuk Prediksi Penjualan"

$PHP_PATH artisan content:bulk-generate 4 \
  --pillar="transformasi-digital" \
  --schedule-days=2 \
  --start-hour=20 \
  --topics="Langkah Sukses Transformasi Digital Perusahaan Tradisional, Pentingnya Digitalisasi Rantai Pasok Supply Chain untuk Korporasi, Tantangan Utama Migrasi Sistem IT Lama ke Cloud Infrastructure, Keamanan Data Perusahaan (Cybersecurity), Arsitektur Microservices untuk Skalabilitas, Cloud Hosting untuk Perusahaan BUMN, Jasa Pembuatan Software Custom Medan/Jakarta, Modernisasi Sistem Legacy Perusahaan, Outsourcing Developer Python Indonesia"


# ==============================================================================
# FINALIZE
# ==============================================================================
echo "🧹 Membersihkan cache halaman..."
$PHP_PATH artisan view:clear
$PHP_PATH artisan cache:clear

echo "🏁 Selesai! Semua 40 artikel telah sukses dibuat dan dijadwalkan."
