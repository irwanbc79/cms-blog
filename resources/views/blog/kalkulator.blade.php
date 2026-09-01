@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])

@push('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebApplication",
    "name": "Kalkulator Bea Masuk dan Simulasi Pajak Impor",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "All",
    "url": "{{ $seo['canonical'] }}",
    "description": "{{ $seo['description'] }}",
    "publisher": {
        "@type": "Organization",
        "name": "{{ $site->company_name }}"
    }
}
</script>
@endpush

@section('content')
<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    {{-- Header --}}
    <div class="text-center mb-10">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-teal-pale text-teal-dark border border-teal/10 mb-3">
            <span>⚙️</span> Interactive Customs Tool
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight font-serif mb-4">
            Kalkulator Bea Masuk &amp; Pajak Impor
        </h1>
        <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto">
            Simulasi estimasi perhitungan Bea Masuk, PPN 11%, PPh Pasal 22 Impor, dan total billing pabean sesuai formula baku Direktorat Jenderal Bea dan Cukai (DJBC).
        </p>
    </div>

    {{-- Interactive Alpine.js Calculator --}}
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sm:p-10 mb-12"
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Form Inputs --}}
            <div class="space-y-6">
                <h2 class="text-xl font-bold text-gray-900 border-b pb-3 flex items-center gap-2">
                    <span>1️⃣</span> Parameter Impor
                </h2>

                {{-- CIF USD --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nilai Pabean CIF (USD)</label>
                    <div class="relative rounded-xl shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500 font-bold">$</div>
                        <input type="number" step="any" min="0" x-model="cifUsd"
                               class="block w-full rounded-xl border-gray-200 pl-9 pr-4 py-3 text-gray-900 focus:border-teal focus:ring-teal font-mono font-medium">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Nilai Cost, Insurance, &amp; Freight dalam valuta USD.</p>
                </div>

                {{-- Kurs Pajak Menkeu (NDBM) --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kurs Pajak Kemenkeu (NDBM)</label>
                    <div class="relative rounded-xl shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500 font-bold">Rp</div>
                        <input type="number" step="any" min="1" x-model="kursPajak"
                               class="block w-full rounded-xl border-gray-200 pl-11 pr-4 py-3 text-gray-900 focus:border-teal focus:ring-teal font-mono font-medium">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Kurs mingguan resmi Menteri Keuangan yang berlaku saat PIB diajukan.</p>
                </div>

                {{-- Tarif Bea Masuk MFN / FTA --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tarif Bea Masuk (%)</label>
                    <div class="relative rounded-xl shadow-sm">
                        <input type="number" step="0.1" min="0" max="100" x-model="bmPercent"
                               class="block w-full rounded-xl border-gray-200 px-4 py-3 text-gray-900 focus:border-teal focus:ring-teal font-mono font-medium">
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-gray-500 font-bold">%</div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Gunakan 0% jika komoditas memakai Form SKA FTA (ACFTA, ATIGA, dll).</p>
                </div>

                {{-- Status Importir PPh 22 --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Status Legalitas Importir (PPh 22)</label>
                    <select x-model="pphType"
                            class="block w-full rounded-xl border-gray-200 px-4 py-3 text-gray-900 focus:border-teal focus:ring-teal font-medium bg-white">
                        <option value="2.5">Memiliki NIB / API Aktif (Tarif 2.5%)</option>
                        <option value="7.5">Non-API / Perseorangan (Tarif 7.5%)</option>
                        <option value="0.5">Komoditas Khusus Tertentu (Tarif 0.5%)</option>
                        <option value="0">Pembebasan PPh Pasal 22 / Fasilitas (0%)</option>
                    </select>
                </div>
            </div>

            {{-- Results Card --}}
            <div class="bg-slate-900 rounded-2xl p-6 sm:p-8 text-white flex flex-col justify-between shadow-lg">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-700 pb-4 mb-6">
                        <span class="text-sm font-bold text-teal-300 uppercase tracking-wider">Hasil Simulasi Pabean</span>
                        <span class="text-xs bg-teal/20 text-teal-300 px-2.5 py-1 rounded-full font-medium">CEISA 4.0 Standard</span>
                    </div>

                    <div class="space-y-3.5 text-sm">
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Nilai Pabean (CIF IDR):</span>
                            <span class="font-mono font-bold text-white text-base" x-text="formatRupiah(cifIdr)"></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Bea Masuk (<span x-text="bmPercent"></span>%):</span>
                            <span class="font-mono font-semibold text-teal-300" x-text="formatRupiah(bmIdr)"></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-300 border-t border-slate-800 pt-2">
                            <span>Nilai Impor Dasar Pajak:</span>
                            <span class="font-mono font-medium text-slate-200" x-text="formatRupiah(nilaiImpor)"></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>PPN Impor (11%):</span>
                            <span class="font-mono font-semibold text-teal-300" x-text="formatRupiah(ppnIdr)"></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>PPh Pasal 22 (<span x-text="pphPercent"></span>%):</span>
                            <span class="font-mono font-semibold text-teal-300" x-text="formatRupiah(pphIdr)"></span>
                        </div>
                    </div>
                </div>

                {{-- Total Highlight --}}
                <div class="mt-8 pt-6 border-t border-slate-700">
                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Total Billing Pabean (Pajak + Bea)</div>
                    <div class="text-2xl sm:text-3xl font-extrabold text-teal-400 font-mono" x-text="formatRupiah(totalBilling)"></div>
                    <div class="text-xs text-slate-400 mt-2">
                        Total Estimasi Landed Cost: <strong class="text-white font-mono" x-text="formatRupiah(totalLandedCost)"></strong>
                    </div>

                    {{-- WhatsApp Inquiry Action --}}
                    <div class="mt-6">
                        <a :href="'https://wa.me/628116568869?text=' + encodeURIComponent('Halo Tim M2B, saya telah menghitung estimasi impor dengan CIF $' + formatNumber(cifUsd) + ' dan total billing ' + formatRupiah(totalBilling) + '. Saya ingin konsultasi jasa kepabeanan PPJK dan pengurusan PIB.')"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-teal text-slate-900 font-bold text-sm hover:bg-teal-light transition-all shadow-md">
                            <span>💬</span> Konsultasikan via WhatsApp PPJK
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Explanatory Regulatory Context --}}
    <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 border border-gray-200 text-gray-700 space-y-4 mb-10">
        <h3 class="text-xl font-bold text-gray-900">Dasar Rumus &amp; Ketentuan Perhitungan Kepabeanan</h3>
        <p class="text-sm leading-relaxed">
            Perhitungan di atas mengacu pada <strong>UU No. 17 Tahun 2006 tentang Kepabeanan</strong> dan <strong>PMK No. 190/PMK.04/2022</strong> tentang Pengeluaran Barang Impor untuk Dipakai:
        </p>
        <ul class="list-disc pl-5 text-sm space-y-1.5 font-mono">
            <li><strong>Nilai Pabean (IDR)</strong> = Nilai CIF (USD) × Kurs Pajak Mingguan Menkeu</li>
            <li><strong>Bea Masuk</strong> = Nilai Pabean (IDR) × % Tarif Bea Masuk MFN / FTA</li>
            <li><strong>Nilai Impor</strong> = Nilai Pabean (IDR) + Bea Masuk</li>
            <li><strong>PPN Impor</strong> = Nilai Impor × 11% (UU Harmonisasi Peraturan Perpajakan)</li>
            <li><strong>PPh Pasal 22</strong> = Nilai Impor × (2.5% bagi pemilik API aktif / 7.5% non-API)</li>
            <li><strong>Total Tagihan Billing</strong> = Bea Masuk + PPN Impor + PPh Pasal 22</li>
        </ul>
        <p class="text-xs text-gray-500 pt-2 border-t border-gray-200">
            <em>Disclaimer:</em> Hasil kalkulator ini merupakan simulasi estimasi administratif. Penetapan akhir tarif dan nilai pabean resmi ditetapkan oleh Pejabat Bea dan Cukai melalui modul CEISA 4.0 saat PIB BC 2.0 didaftarkan.
        </p>
    </div>

    {{-- Internal Links to Pillar Articles --}}
    <div class="border-t border-gray-200 pt-8">
        <h4 class="text-base font-bold text-gray-900 mb-4">Panduan Terkait Kepabeanan &amp; Logistik:</h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
            <a href="{{ url('/blog/cara-hitung-bea-masuk-impor-2025-panduan-ppjk') }}" class="p-4 rounded-xl border border-gray-200 hover:border-teal hover:bg-teal-pale/10 transition-colors">
                <span class="font-bold text-gray-900 block mb-1">Formula Lengkap Bea Masuk &amp; FTA</span>
                <span class="text-gray-500 text-xs">Pelajari mekanisme preferensi tarif ACFTA, ATIGA, dan IJEPA.</span>
            </a>
            <a href="{{ url('/blog/panduan-lengkap-tarif-bmad-barang-elektronik-impor-2026') }}" class="p-4 rounded-xl border border-gray-200 hover:border-teal hover:bg-teal-pale/10 transition-colors">
                <span class="font-bold text-gray-900 block mb-1">Regulasi BMAD &amp; Trade Remedies</span>
                <span class="text-gray-500 text-xs">Pahami pengenaan Bea Masuk Anti-Dumping oleh KADI.</span>
            </a>
        </div>
    </div>
</main>
@endsection
