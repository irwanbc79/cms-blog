@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])

@push('head')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "WebApplication",
    "name": "Kalkulator Kesiapan Ekspor UMKM",
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
            <span>🚀</span> SME Export Readiness Tool
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight font-serif mb-4">
            Kalkulator Kesiapan Ekspor UMKM
        </h1>
        <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Evaluasi mandiri kesiapan produk dan legalitas bisnis Anda untuk menembus pasar internasional berdasarkan standar Kementerian Perdagangan dan Bea Cukai.
        </p>
    </div>

    {{-- Interactive Alpine.js Assessment --}}
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sm:p-10 mb-12"
         x-data="{
             // Pillar 1: Legalitas (Weight: 25)
             hasNib: true,
             hasNpwp: true,
             hasLegalEntity: false,

             // Pillar 2: Sertifikasi & Mutu (Weight: 25)
             hasHaccpOrBpoms: false,
             hasHalalOrOrganic: false,
             hasLabTest: false,

             // Pillar 3: Kemasan & Label (Weight: 20)
             hasEnglishLabel: false,
             hasBarcodeNutrition: false,
             hasExportPackaging: false,

             // Pillar 4: Kapasitas & Finansial (Weight: 15)
             hasStableCapacity: false,
             hasMoqAgreement: false,

             // Pillar 5: Dokumen Ekspor (Weight: 15)
             understandsPebSka: false,
             understandsIncoterms: false,

             get score() {
                 let total = 0;
                 if (this.hasNib) total += 10;
                 if (this.hasNpwp) total += 10;
                 if (this.hasLegalEntity) total += 5;

                 if (this.hasHaccpOrBpoms) total += 10;
                 if (this.hasHalalOrOrganic) total += 8;
                 if (this.hasLabTest) total += 7;

                 if (this.hasEnglishLabel) total += 7;
                 if (this.hasBarcodeNutrition) total += 7;
                 if (this.hasExportPackaging) total += 6;

                 if (this.hasStableCapacity) total += 8;
                 if (this.hasMoqAgreement) total += 7;

                 if (this.understandsPebSka) total += 8;
                 if (this.understandsIncoterms) total += 7;

                 return Math.min(100, total);
             },

             get status() {
                 if (this.score >= 80) return { title: 'Sangat Siap Ekspor Mandiri', badge: 'bg-emerald-100 text-emerald-800 border-emerald-300', desc: 'Produk dan legalitas Anda telah memenuhi mayoritas parameter kepatuhan internasional. Anda siap melakukan kontak buyer dan mendaftarkan PEB BC 3.0.' };
                 if (this.score >= 50) return { title: 'Siap Ekspor dengan Pendampingan', badge: 'bg-amber-100 text-amber-800 border-amber-300', desc: 'Fondasi usaha Anda cukup kuat, namun masih membutuhkan penguatan pada sertifikasi mutu atau mitigasi dokumen pabean via PPJK / Freight Forwarder.' };
                 return { title: 'Fokus Pembenahan Legalitas & Standar Mutu', badge: 'bg-rose-100 text-rose-800 border-rose-300', desc: 'Lengkapi perizinan dasar (NIB OSS RBA), uji lab, dan standardisasi kemasan terlebih dahulu sebelum mengajukan penawaran ke buyer luar negeri.' };
             }
         }">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Checklist Questions --}}
            <div class="space-y-6">
                <h2 class="text-xl font-bold text-gray-900 border-b pb-3 flex items-center gap-2">
                    <span>📋</span> Checklist Parameter Kesiapan
                </h2>

                {{-- Group 1: Legalitas --}}
                <div class="space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-dark">1. Legalitas Usaha</span>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasNib" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Memiliki NIB (Nomor Induk Berusaha) aktif dari OSS RBA sebagai Hak Akses Kepabeanan.</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasNpwp" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Memiliki NPWP Usaha / Badan &amp; tertib pelaporan SPT Tahunan.</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasLegalEntity" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Bentuk usaha berupa PT Perorangan, PT, CV, atau Koperasi.</span>
                    </label>
                </div>

                {{-- Group 2: Sertifikasi --}}
                <div class="space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-dark">2. Standar Mutu &amp; Keamanan Pangan</span>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasHaccpOrBpoms" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Sertifikasi HACCP / ISO 22000 / Izin Edar BPOM MD (untuk komoditas pangan/olahan).</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasHalalOrOrganic" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Sertifikasi Halal Internasional / Organik / Phytosanitary Certificate.</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasLabTest" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Memiliki Hasil Uji Lab (Certificate of Analysis / CoA) dari laboratorium terakreditasi KAN.</span>
                    </label>
                </div>

                {{-- Group 3: Kemasan & Dokumen --}}
                <div class="space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-dark">3. Kemasan, Kapasitas &amp; Dokumen</span>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasEnglishLabel" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Label kemasan memuat Bahasa Inggris, Komposisi, Berat Bersih, &amp; Nutrition Facts.</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasStableCapacity" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Kapasitas produksi stabil dan mampu memenuhi Minimum Order Quantity (MOQ).</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="understandsPebSka" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Memahami alur pendaftaran PEB (Pemberitahuan Ekspor Barang) &amp; SKA Form FTA di INSW.</span>
                    </label>
                </div>
            </div>

            {{-- Score & Evaluation Card --}}
            <div class="bg-slate-900 rounded-2xl p-6 sm:p-8 text-white flex flex-col justify-between shadow-lg">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-700 pb-4 mb-6">
                        <span class="text-sm font-bold text-teal-300 uppercase tracking-wider">Hasil Evaluasi Ekspor</span>
                        <span class="text-xs bg-teal/20 text-teal-300 px-2.5 py-1 rounded-full font-medium">Standard Kemendag &amp; DJBC</span>
                    </div>

                    {{-- Score Meter --}}
                    <div class="text-center my-6">
                        <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-2">Skor Kesiapan Ekspor</div>
                        <div class="text-5xl sm:text-6xl font-extrabold text-teal-400 font-mono" x-text="score + '%'"></div>
                        <div class="w-full bg-slate-800 rounded-full h-3 mt-4 overflow-hidden">
                            <div class="bg-teal h-full transition-all duration-500 rounded-full" :style="'width: ' + score + '%'"></div>
                        </div>
                    </div>

                    {{-- Status Badge & Description --}}
                    <div class="mt-6 p-4 rounded-xl border" :class="status.badge">
                        <div class="font-bold text-sm mb-1" x-text="status.title"></div>
                        <div class="text-xs opacity-90 leading-relaxed" x-text="status.desc"></div>
                    </div>
                </div>

                {{-- Action Button --}}
                <div class="mt-8 pt-6 border-t border-slate-700">
                    <a :href="'https://wa.me/628116568869?text=' + encodeURIComponent('Halo, saya telah mengecek kesiapan ekspor usaha saya di ' + '{{ $site->company_name }}' + ' dengan Skor ' + score + '%. Saya ingin konsultasi pendampingan ekspor dan pengurusan dokumen pabean.')"
                       target="_blank" rel="noopener noreferrer"
                       class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-teal text-slate-900 font-bold text-sm hover:bg-teal-light transition-all shadow-md">
                        <span>💬</span> Konsultasi Pendampingan Ekspor
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Regulatory Guidance --}}
    <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 border border-gray-200 text-gray-700 space-y-4 mb-10">
        <h3 class="text-xl font-bold text-gray-900">Landasan Regulasi &amp; Standardisasi Ekspor Indonesia</h3>
        <p class="text-sm leading-relaxed">
            Parameter evaluasi di atas disusun berdasarkan <strong>Permendag No. 19 Tahun 2021 tentang Kebijakan dan Pengaturan Ekspor</strong> serta <strong>Peraturan Direktur Jenderal Bea dan Cukai No. PER-07/BC/2023</strong> tentang Tata Laksana Kepabeanan di Bidang Ekspor:
        </p>
        <ul class="list-disc pl-5 text-sm space-y-1.5 font-mono text-gray-800">
            <li><strong>Hak Akses Kepabeanan</strong>: NIB terintegrasi OSS RBA otomatis berlaku sebagai identitas eksportir resmi.</li>
            <li><strong>Dokumen Ekspor Utama</strong>: Invoice, Packing List, PEB (BC 3.0), NPE (Nota Pelayanan Ekspor), dan Bill of Lading / Airway Bill.</li>
            <li><strong>Preferensi Tarif FTA</strong>: Surat Keterangan Asal (SKA / COO Form A/D/E/AK/IJ/IP) via e-SKA Kemendag untuk membebaskan bea masuk di negara tujuan buyer.</li>
        </ul>
    </div>
</main>
@endsection
