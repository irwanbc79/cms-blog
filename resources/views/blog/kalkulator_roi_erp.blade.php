@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])

@push('head')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "WebApplication",
    "name": "Kalkulator ROI & Biaya Implementasi ERP",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "All",
    "url": "{{ $seo['canonical'] }}",
    "description": "{{ $seo['description'] }}",
    "publisher": {
        "@@type": "Organization",
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
            <span>📊</span> Enterprise Solution Tool
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight font-serif mb-4">
            Kalkulator ROI &amp; Simulasi Biaya ERP
        </h1>
        <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Hitung potensi penghematan biaya operasional, efisiensi jam kerja, dan proyeksi titik impas (*Payback Period*) digitalisasi bisnis dengan sistem ERP modern.
        </p>
    </div>

    {{-- Interactive Alpine.js ERP Calculator --}}
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sm:p-10 mb-12"
         x-data="{
             users: 15,
             monthlyAdminCost: 25000000,
             hasInventory: true,
             hasAccounting: true,
             hasHr: true,
             hasCustoms: false,
             hasOmnichannel: false,

             get moduleCount() {
                 let count = 0;
                 if (this.hasInventory) count++;
                 if (this.hasAccounting) count++;
                 if (this.hasHr) count++;
                 if (this.hasCustoms) count++;
                 if (this.hasOmnichannel) count++;
                 return Math.max(1, count);
             },

             get estimatedErpInvestment() {
                 // Formula estimasi implementasi: base setup + per user tier
                 let base = 25000000 + (this.moduleCount * 8000000);
                 let userCost = (parseInt(this.users) || 1) * 750000;
                 return base + userCost;
             },

             get monthlySavings() {
                 // Rata-rata efisiensi ERP menghemat 25% - 40% biaya admin/operasional manual
                 let savingsRate = 0.25 + (this.moduleCount * 0.03);
                 return (parseFloat(this.monthlyAdminCost) || 0) * Math.min(0.45, savingsRate);
             },

             get annualSavings() {
                 return this.monthlySavings * 12;
             },

             get paybackMonths() {
                 if (this.monthlySavings <= 0) return 0;
                 let months = this.estimatedErpInvestment / this.monthlySavings;
                 return Math.max(1, Math.round(months * 10) / 10);
             },

             get threeYearRoi() {
                 let totalSaved3Y = this.annualSavings * 3;
                 let netGain = totalSaved3Y - this.estimatedErpInvestment;
                 if (this.estimatedErpInvestment <= 0) return 0;
                 return Math.round((netGain / this.estimatedErpInvestment) * 100);
             },

             get hoursSavedMonthly() {
                 return (parseInt(this.users) || 1) * 22 * 1.5; // ~1.5 jam dihemat per user per hari kerja
             },

             formatRupiah(val) {
                 return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 }).format(val);
             },
             formatNumber(val) {
                 return new Intl.NumberFormat('id-ID').format(val);
             }
         }">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Inputs --}}
            <div class="space-y-6">
                <h2 class="text-xl font-bold text-gray-900 border-b pb-3 flex items-center gap-2">
                    <span>⚙️</span> Parameter Operasional Bisnis
                </h2>

                {{-- User Count --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jumlah Pengguna / Karyawan (Users)</label>
                    <div class="relative rounded-xl shadow-sm">
                        <input type="number" min="1" max="500" x-model="users"
                               class="block w-full rounded-xl border-gray-200 px-4 py-3 text-gray-900 focus:border-teal focus:ring-teal font-mono font-medium">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Jumlah staf/manajemen yang akan mengakses sistem harian.</p>
                </div>

                {{-- Monthly Cost --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Biaya Admin &amp; Operasional Manual Saat Ini (Rp/Bulan)</label>
                    <div class="relative rounded-xl shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-gray-500 font-bold">Rp</div>
                        <input type="number" step="1000000" min="1000000" x-model="monthlyAdminCost"
                               class="block w-full rounded-xl border-gray-200 pl-11 pr-4 py-3 text-gray-900 focus:border-teal focus:ring-teal font-mono font-medium">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Termasuk lembur, input data berulang, koreksi human-error, dan kertas.</p>
                </div>

                {{-- Modules Checklist --}}
                <div class="space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-dark">Modul Kebutuhan Bisnis</span>
                    <label class="flex items-center gap-3 p-2.5 rounded-xl border border-gray-100 bg-gray-50 hover:bg-gray-100 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasInventory" class="rounded text-teal focus:ring-teal">
                        <span class="font-medium">Manajemen Stok, Gudang &amp; Purchasing</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 rounded-xl border border-gray-100 bg-gray-50 hover:bg-gray-100 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasAccounting" class="rounded text-teal focus:ring-teal">
                        <span class="font-medium">Akuntansi, Billing &amp; Laporan Keuangan Real-Time</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 rounded-xl border border-gray-100 bg-gray-50 hover:bg-gray-100 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasHr" class="rounded text-teal focus:ring-teal">
                        <span class="font-medium">SDM, Absensi &amp; Payroll Terintegrasi</span>
                    </label>
                    <label class="flex items-center gap-3 p-2.5 rounded-xl border border-gray-100 bg-gray-50 hover:bg-gray-100 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasCustoms" class="rounded text-teal focus:ring-teal">
                        <span class="font-medium">Modul Logistik, Freight &amp; Kepabeanan</span>
                    </label>
                </div>
            </div>

            {{-- Results Card --}}
            <div class="bg-slate-900 rounded-2xl p-6 sm:p-8 text-white flex flex-col justify-between shadow-lg">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-700 pb-4 mb-6">
                        <span class="text-sm font-bold text-teal-300 uppercase tracking-wider">Proyeksi Efisiensi &amp; ROI</span>
                        <span class="text-xs bg-teal/20 text-teal-300 px-2.5 py-1 rounded-full font-medium">Enterprise Model</span>
                    </div>

                    <div class="space-y-3.5 text-sm">
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Estimasi Investasi Implementasi:</span>
                            <span class="font-mono font-bold text-white text-base" x-text="formatRupiah(estimatedErpInvestment)"></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Estimasi Penghematan / Bulan:</span>
                            <span class="font-mono font-semibold text-teal-300" x-text="formatRupiah(monthlySavings)"></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Estimasi Penghematan / Tahun:</span>
                            <span class="font-mono font-semibold text-teal-300" x-text="formatRupiah(annualSavings)"></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-300 border-t border-slate-800 pt-2">
                            <span>Waktu Balik Modal (*Payback*):</span>
                            <span class="font-mono font-bold text-amber-300" x-text="paybackMonths + ' Bulan'"></span>
                        </div>
                        <div class="flex justify-between items-center text-slate-300">
                            <span>Proyeksi Jam Kerja Dihemat / Bulan:</span>
                            <span class="font-mono font-semibold text-teal-200" x-text="formatNumber(hoursSavedMonthly) + ' Jam'"></span>
                        </div>
                    </div>
                </div>

                {{-- ROI Highlight --}}
                <div class="mt-8 pt-6 border-t border-slate-700">
                    <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-1">Proyeksi ROI 3 Tahun</div>
                    <div class="text-3xl sm:text-4xl font-extrabold text-teal-400 font-mono" x-text="'+' + formatNumber(threeYearRoi) + '%'"></div>
                    <div class="text-xs text-slate-400 mt-2">
                        Efisiensi tinggi dengan eliminasi redundansi data lintas divisi.
                    </div>

                    {{-- WhatsApp Action --}}
                    <div class="mt-6">
                        <a :href="'https://wa.me/628116568869?text=' + encodeURIComponent('Halo Tim ' + '{{ $site->company_name }}' + ', saya telah menghitung simulasi ERP untuk ' + users + ' users dengan proyeksi penghematan ' + formatRupiah(annualSavings) + '/tahun. Saya ingin konsultasi demo dan arsitektur sistem ERP.')"
                           target="_blank" rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-teal text-slate-900 font-bold text-sm hover:bg-teal-light transition-all shadow-md">
                            <span>💬</span> Konsultasi Demo &amp; Solusi ERP
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Explanatory Context --}}
    <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 border border-gray-200 text-gray-700 space-y-4 mb-10">
        <h3 class="text-xl font-bold text-gray-900">Metodologi Perhitungan ROI ERP</h3>
        <p class="text-sm leading-relaxed">
            Kalkulator ini menggunakan metodologi valuasi ROI berbasis standar industri sistem informasi manajemen:
        </p>
        <ul class="list-disc pl-5 text-sm space-y-1.5 font-mono text-gray-800">
            <li><strong>Cost Elimination</strong>: Otomasi alur data mengurangi kesalahan manual hingga 85%.</li>
            <li><strong>Labor Productivity</strong>: Menghemat rata-rata 1.5 jam kerja per karyawan per hari dari pelaporan manual berulang.</li>
            <li><strong>Inventory Holding Cost</strong>: Peningkatan akurasi stok mencegah *stockout* dan *overstocking*.</li>
        </ul>
    </div>
</main>
@endsection
