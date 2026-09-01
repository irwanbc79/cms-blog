@extends('layouts.app')

@section('title', 'Kalkulator Bea Masuk & Pajak Impor 2026 — M2B')
@section('description', 'Simulasi perhitungan bea masuk, PPN 11%, PPh Pasal 22 impor, dan nilai pabean CIF secara online dan instan sesuai regulasi Kementerian Keuangan & CEISA 4.0.')

@section('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebApplication",
  "name": "Kalkulator Bea Masuk dan Simulasi Pajak Impor M2B",
  "applicationCategory": "BusinessApplication",
  "operatingSystem": "All",
  "url": "https://m2b.co.id/blog/kalkulator-bea-masuk",
  "description": "Simulasi perhitungan bea masuk, PPN 11%, PPh Pasal 22 impor, dan nilai pabean CIF secara online dan instan.",
  "publisher": {
    "@@type": "Organization",
    "name": "PT. Mora Multi Berkah (M2B)"
  }
}
</script>
<style>
.calc-container {
    max-width: 1040px;
    margin: 0 auto;
    padding: 120px 20px 60px 20px;
    font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    color: #1a1a1a;
}
.calc-breadcrumb {
    font-size: 13px;
    color: #666;
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.calc-breadcrumb a {
    color: #1e3a5f;
    text-decoration: none;
    font-weight: 500;
}
.calc-breadcrumb a:hover { text-decoration: underline; }
.calc-header {
    text-align: center;
    margin-bottom: 36px;
}
.calc-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #e8f0fe;
    color: #1e3a5f;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 14px;
    border: 1px solid rgba(30, 58, 95, 0.15);
}
.calc-title {
    font-family: 'Syne', sans-serif;
    font-size: clamp(26px, 4vw, 38px);
    font-weight: 800;
    color: #0f0f14;
    margin: 0 0 12px 0;
    line-height: 1.25;
}
.calc-subtitle {
    font-size: 15px;
    color: #555;
    max-width: 680px;
    margin: 0 auto;
    line-height: 1.6;
}
.calc-card-main {
    background: #ffffff;
    border-radius: 20px;
    padding: 36px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    border: 1px solid #e5e2dc;
    margin-bottom: 32px;
}
.calc-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 36px;
}
@media (max-width: 768px) {
    .calc-container { padding-top: 100px; }
    .calc-card-main { padding: 24px; }
    .calc-grid { grid-template-columns: 1fr; gap: 28px; }
}
.calc-form-title {
    font-family: 'Syne', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #0f0f14;
    margin: 0 0 20px 0;
    padding-bottom: 12px;
    border-bottom: 2px solid #f0ede8;
}
.calc-group {
    margin-bottom: 20px;
}
.calc-label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    margin-bottom: 6px;
}
.calc-input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}
.calc-input-prefix {
    position: absolute;
    left: 14px;
    font-weight: 700;
    color: #888;
    font-size: 14px;
    pointer-events: none;
}
.calc-input-suffix {
    position: absolute;
    right: 14px;
    font-weight: 700;
    color: #888;
    font-size: 14px;
    pointer-events: none;
}
.calc-input {
    width: 100%;
    box-sizing: border-box;
    padding: 12px 14px;
    border: 1.5px solid #d5d0c8;
    border-radius: 10px;
    font-size: 15px;
    font-family: 'DM Sans', sans-serif;
    font-weight: 600;
    color: #111;
    background: #fafaf8;
    transition: all .2s ease;
}
.calc-input:focus {
    outline: none;
    border-color: #1e3a5f;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
}
.calc-input.has-prefix { padding-left: 38px; }
.calc-input.has-suffix { padding-right: 38px; }
.calc-select {
    width: 100%;
    box-sizing: border-box;
    padding: 12px 14px;
    border: 1.5px solid #d5d0c8;
    border-radius: 10px;
    font-size: 14px;
    font-family: 'DM Sans', sans-serif;
    font-weight: 600;
    color: #111;
    background: #fafaf8;
    cursor: pointer;
    transition: all .2s ease;
}
.calc-select:focus {
    outline: none;
    border-color: #1e3a5f;
    background: #fff;
}
.calc-hint {
    font-size: 11px;
    color: #777;
    margin-top: 5px;
    line-height: 1.4;
}

/* Results Box */
.calc-results-box {
    background: #0f172a;
    border-radius: 16px;
    padding: 28px;
    color: #ffffff;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    box-shadow: 0 8px 24px rgba(15, 23, 42, 0.15);
}
.calc-results-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(255,255,255,0.12);
    padding-bottom: 14px;
    margin-bottom: 18px;
}
.calc-results-title {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #f5b91c;
}
.calc-results-badge {
    background: rgba(245, 185, 28, 0.15);
    color: #f5b91c;
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: 700;
}
.calc-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    font-size: 13px;
    color: #cbd5e1;
}
.calc-row.divider {
    border-top: 1px solid rgba(255,255,255,0.08);
    margin-top: 6px;
    padding-top: 10px;
}
.calc-val {
    font-family: 'DM Mono', monospace, sans-serif;
    font-weight: 700;
    color: #ffffff;
    font-size: 14px;
}
.calc-val.gold { color: #f5b91c; }
.calc-total-box {
    margin-top: 24px;
    padding-top: 18px;
    border-top: 1px solid rgba(255,255,255,0.15);
}
.calc-total-label {
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 4px;
}
.calc-total-val {
    font-family: 'Syne', 'DM Mono', monospace;
    font-size: 26px;
    font-weight: 800;
    color: #f5b91c;
    margin-bottom: 6px;
}
.calc-landed-hint {
    font-size: 12px;
    color: #94a3b8;
    margin-bottom: 20px;
}
.calc-btn-wa {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    box-sizing: border-box;
    padding: 13px 20px;
    background: #f5b91c;
    color: #0f0f14;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 700;
    font-size: 13.5px;
    transition: all .2s ease;
    box-shadow: 0 4px 12px rgba(245, 185, 28, 0.25);
}
.calc-btn-wa:hover {
    background: #ffd44d;
    transform: translateY(-1px);
}
.calc-expl-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 28px 32px;
    border: 1px solid #e5e2dc;
    margin-bottom: 30px;
}
.calc-expl-title {
    font-family: 'Syne', sans-serif;
    font-size: 17px;
    font-weight: 700;
    color: #0f0f14;
    margin: 0 0 12px 0;
}
.calc-expl-list {
    margin: 12px 0 16px 0;
    padding-left: 20px;
    font-size: 13.5px;
    line-height: 1.8;
    color: #444;
}
.calc-disclaimer {
    font-size: 12px;
    color: #888;
    border-top: 1px solid #f0ede8;
    padding-top: 12px;
    margin: 0;
    font-style: italic;
}
</style>
@endsection

@section('content')
<div class="calc-container">
    {{-- Breadcrumb --}}
    <div class="calc-breadcrumb">
        <a href="/">Beranda</a>
        <span>›</span>
        <a href="/blog">Blog</a>
        <span>›</span>
        <span>Kalkulator Bea Masuk</span>
    </div>

    {{-- Header --}}
    <div class="calc-header">
        <div class="calc-badge">
            <span>⚙️</span> Interactive Customs Tool
        </div>
        <h1 class="calc-title">
            Kalkulator Bea Masuk &amp; Pajak Impor
        </h1>
        <p class="calc-subtitle">
            Simulasi estimasi perhitungan Bea Masuk, PPN 11%, PPh Pasal 22 Impor, dan total billing pabean sesuai formula baku Direktorat Jenderal Bea dan Cukai (DJBC).
        </p>
    </div>

    {{-- Interactive Alpine.js Calculator --}}
    <div class="calc-card-main"
         x-data="{
             cifUsd: 10000,
             kursPajak: 16200,
             bmPercent: 7.5,
             pphType: '2.5',
             ppnPercent: 11,

             get cifIdr() {
                 return (parseFloat(this.cifUsd) || 0) * (parseFloat(this.kursPajak) || 0);
             },
             get bmIdr() {
                 return this.cifIdr * ((parseFloat(this.bmPercent) || 0) / 100);
             },
             get nilaiImpor() {
                 return this.cifIdr + this.bmIdr;
             },
             get ppnIdr() {
                 return this.nilaiImpor * ((parseFloat(this.ppnPercent) || 0) / 100);
             },
             get pphPercent() {
                 return parseFloat(this.pphType) || 0;
             },
             get pphIdr() {
                 return this.nilaiImpor * (this.pphPercent / 100);
             },
             get totalBilling() {
                 return this.bmIdr + this.ppnIdr + this.pphIdr;
             },
             get totalLandedCost() {
                 return this.cifIdr + this.totalBilling;
             },
             formatRupiah(val) {
                 return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(val);
             },
             formatNumber(val) {
                 return new Intl.NumberFormat('id-ID').format(val);
             }
         }">

        <div class="calc-grid">
            {{-- Inputs --}}
            <div>
                <h2 class="calc-form-title">1. Parameter Transaksi Impor</h2>

                <div class="calc-group">
                    <label class="calc-label">Nilai Pabean CIF (USD)</label>
                    <div class="calc-input-wrapper">
                        <span class="calc-input-prefix">$</span>
                        <input type="number" step="any" min="0" x-model="cifUsd" class="calc-input has-prefix">
                    </div>
                    <div class="calc-hint">Nilai Cost, Insurance, &amp; Freight dalam valuta USD.</div>
                </div>

                <div class="calc-group">
                    <label class="calc-label">Kurs Pajak Kemenkeu (NDBM)</label>
                    <div class="calc-input-wrapper">
                        <span class="calc-input-prefix">Rp</span>
                        <input type="number" step="any" min="1" x-model="kursPajak" class="calc-input has-prefix">
                    </div>
                    <div class="calc-hint">Kurs mingguan resmi Menteri Keuangan saat dokumen diajukan.</div>
                </div>

                <div class="calc-group">
                    <label class="calc-label">Tarif Bea Masuk (%)</label>
                    <div class="calc-input-wrapper">
                        <input type="number" step="0.1" min="0" max="100" x-model="bmPercent" class="calc-input has-suffix">
                        <span class="calc-input-suffix">%</span>
                    </div>
                    <div class="calc-hint">Gunakan 0% jika menggunakan Form SKA FTA (ACFTA, ATIGA, dll).</div>
                </div>

                <div class="calc-group">
                    <label class="calc-label">Status Legalitas Importir (PPh 22)</label>
                    <select x-model="pphType" class="calc-select">
                        <option value="2.5">Memiliki NIB / API Aktif (Tarif 2.5%)</option>
                        <option value="7.5">Non-API / Perseorangan (Tarif 7.5%)</option>
                        <option value="0.5">Komoditas Tertentu Kedelai/Gandum (Tarif 0.5%)</option>
                        <option value="0">Pembebasan PPh Pasal 22 / Fasilitas (0%)</option>
                    </select>
                </div>
            </div>

            {{-- Summary Card --}}
            <div class="calc-results-box">
                <div>
                    <div class="calc-results-header">
                        <span class="calc-results-title">Hasil Simulasi Pabean</span>
                        <span class="calc-results-badge">CEISA 4.0 Standard</span>
                    </div>

                    <div>
                        <div class="calc-row">
                            <span>Nilai Pabean (CIF IDR):</span>
                            <span class="calc-val" x-text="formatRupiah(cifIdr)"></span>
                        </div>
                        <div class="calc-row">
                            <span>Bea Masuk (<span x-text="bmPercent"></span>%):</span>
                            <span class="calc-val gold" x-text="formatRupiah(bmIdr)"></span>
                        </div>
                        <div class="calc-row divider">
                            <span>Nilai Impor Dasar Pajak:</span>
                            <span class="calc-val" x-text="formatRupiah(nilaiImpor)"></span>
                        </div>
                        <div class="calc-row">
                            <span>PPN Impor (11%):</span>
                            <span class="calc-val gold" x-text="formatRupiah(ppnIdr)"></span>
                        </div>
                        <div class="calc-row">
                            <span>PPh Pasal 22 (<span x-text="pphPercent"></span>%):</span>
                            <span class="calc-val gold" x-text="formatRupiah(pphIdr)"></span>
                        </div>
                    </div>
                </div>

                {{-- Total Highlight --}}
                <div class="calc-total-box">
                    <div class="calc-total-label">Total Billing Pabean (Pajak + Bea)</div>
                    <div class="calc-total-val" x-text="formatRupiah(totalBilling)"></div>
                    <div class="calc-landed-hint">
                        Total Estimasi Landed Cost: <strong style="color:#fff;" x-text="formatRupiah(totalLandedCost)"></strong>
                    </div>

                    {{-- WhatsApp Action --}}
                    <div>
                        <a :href="'https://wa.me/6281263027818?text=' + encodeURIComponent('Halo Tim M2B, saya telah menghitung estimasi impor dengan CIF $' + formatNumber(cifUsd) + ' dan total billing ' + formatRupiah(totalBilling) + '. Saya ingin konsultasi jasa kepabeanan PPJK dan pengurusan PIB.')"
                           target="_blank" rel="noopener noreferrer"
                           class="calc-btn-wa">
                            <span>💬</span> Konsultasikan via WhatsApp PPJK
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Explanatory Context --}}
    <div class="calc-expl-card">
        <h3 class="calc-expl-title">Dasar Rumus &amp; Ketentuan Perhitungan Kepabeanan</h3>
        <p style="font-size: 13.5px; color: #555; margin-bottom: 8px;">
            Perhitungan di atas mengacu pada <strong>UU No. 17 Tahun 2006 tentang Kepabeanan</strong> dan <strong>PMK No. 190/PMK.04/2022</strong> tentang Pengeluaran Barang Impor untuk Dipakai:
        </p>
        <ul class="calc-expl-list">
            <li><strong>Nilai Pabean (IDR)</strong> = Nilai CIF (USD) × Kurs Pajak Mingguan Menkeu</li>
            <li><strong>Bea Masuk</strong> = Nilai Pabean (IDR) × % Tarif Bea Masuk MFN / FTA</li>
            <li><strong>Nilai Impor</strong> = Nilai Pabean (IDR) + Bea Masuk</li>
            <li><strong>PPN Impor</strong> = Nilai Impor × 11% (UU HPP No. 7 Tahun 2021)</li>
            <li><strong>PPh Pasal 22</strong> = Nilai Impor × (2.5% bagi pemilik API aktif / 7.5% non-API)</li>
            <li><strong>Total Tagihan Billing</strong> = Bea Masuk + PPN Impor + PPh Pasal 22</li>
        </ul>
        <p class="calc-disclaimer">
            Disclaimer: Hasil kalkulator ini merupakan simulasi estimasi administratif. Penetapan akhir tarif dan nilai pabean resmi ditetapkan oleh Pejabat Bea dan Cukai melalui modul CEISA 4.0 saat PIB BC 2.0 didaftarkan.
        </p>
    </div>
</div>
@endsection
