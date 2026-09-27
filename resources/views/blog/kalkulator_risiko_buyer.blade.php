@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])

@push('head')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "WebApplication",
    "name": "Kalkulator Risiko Buyer Ekspor & Skema Pembayaran",
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
            <span>🛡️</span> International Trade Risk Tool
        </span>
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight font-serif mb-4">
            Kalkulator Risiko Buyer &amp; Skema Pembayaran Ekspor
        </h1>
        <p class="text-base sm:text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Evaluasi profil kredibilitas buyer internasional, analisa tingkat risiko wanprestasi (*Default Risk*), dan tentukan metode pembayaran ekspor yang paling aman.
        </p>
    </div>

    {{-- Interactive Alpine.js Risk Assessment --}}
    <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-6 sm:p-10 mb-12"
         x-data="{
             // Parameter 1: Profil Buyer
             hasOfficialReg: true,
             hasCorporateEmail: true,
             hasVerifiedBank: true,

             // Parameter 2: Skema Pembayaran
             paymentScheme: 'tt_deposit', // 'lc_sight', 'tt_deposit', 'cad_open_account', 'consignment'

             // Parameter 3: Karakteristik Order & Negara
             isNewBuyer: true,
             countryRisk: 'low', // 'low', 'medium', 'high'
             hasExportInsurance: false,

             get safetyScore() {
                 let score = 0;

                 // Buyer Legitimacy (Max: 30)
                 if (this.hasOfficialReg) score += 12;
                 if (this.hasCorporateEmail) score += 8;
                 if (this.hasVerifiedBank) score += 10;

                 // Payment Method (Max: 40)
                 if (this.paymentScheme === 'lc_sight') score += 40;
                 else if (this.paymentScheme === 'tt_deposit') score += 28;
                 else if (this.paymentScheme === 'cad_open_account') score += 10;
                 else if (this.paymentScheme === 'consignment') score += 0;

                 // Country Risk (Max: 15)
                 if (this.countryRisk === 'low') score += 15;
                 else if (this.countryRisk === 'medium') score += 8;
                 else if (this.countryRisk === 'high') score += 0;

                 // Buyer Track Record (Max: 10)
                 if (!this.isNewBuyer) score += 10;
                 else score += 3;

                 // Insurance Mitigation (Max: 5)
                 if (this.hasExportInsurance) score += 5;

                 return Math.min(100, Math.max(0, score));
             },

             get riskStatus() {
                 if (this.safetyScore >= 80) {
                     return {
                         level: 'RISIKO RENDAH (AMAN)',
                         badge: 'bg-emerald-100 text-emerald-800 border-emerald-300',
                         recommendation: 'Transaksi memiliki mitigasi risiko yang sangat solid. Anda dapat melanjutkan proses pemesanan dengan skema Letter of Credit (L/C) atau T/T Deposit terstruktur.',
                         alertColor: 'text-emerald-400'
                     };
                 }
                 if (this.safetyScore >= 50) {
                     return {
                         level: 'RISIKO SEDANG (WASPADA)',
                         badge: 'bg-amber-100 text-amber-800 border-amber-300',
                         recommendation: 'Transaksi memerlukan kehati-hatian. Wajib gunakan minimal DP 30-50% di awal dan pelunasan wajib sebelum Original Bill of Lading (B/L) diserahkan ke buyer. Lengkapi dengan Asuransi Pembayaran Ekspor.',
                         alertColor: 'text-amber-400'
                     };
                 }
                 return {
                     level: 'RISIKO TINGGI (BERBAHAYA)',
                     badge: 'bg-rose-100 text-rose-800 border-rose-300',
                     recommendation: 'JANGAN kirim barang dengan skema Open Account atau Konsinyasi tanpa jaminan bank! Sangat rawan wanprestasi / penipuan. Tuntut pembayaran via Irrevocable Confirmed L/C at Sight.',
                     alertColor: 'text-rose-400'
                 };
             }
         }">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Checklist Inputs --}}
            <div class="space-y-6">
                <h2 class="text-xl font-bold text-gray-900 border-b pb-3 flex items-center gap-2">
                    <span>📋</span> Parameter Verifikasi Transaksi
                </h2>

                {{-- Buyer Identity --}}
                <div class="space-y-2.5">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-dark">1. Legalitas &amp; Reputasi Buyer</span>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasOfficialReg" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Memiliki Nomor Registrasi Perusahaan / Tax ID resmi yang terverifikasi di Kedutaan / ITPC negara asal.</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasCorporateEmail" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Menggunakan domain email korporat resmi (bukan @gmail, @yahoo, @hotmail gratisan).</span>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-100 bg-gray-50/50 hover:bg-gray-50 cursor-pointer text-sm">
                        <input type="checkbox" x-model="hasVerifiedBank" class="mt-0.5 rounded text-teal focus:ring-teal">
                        <span>Rekening bank atas nama entitas perusahaan berbadan hukum (bukan rekening perorangan).</span>
                    </label>
                </div>

                {{-- Payment Method Selection --}}
                <div class="space-y-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-dark">2. Skema Pembayaran yang Diajukan</span>
                    <select x-model="paymentScheme" class="block w-full rounded-xl border-gray-200 px-4 py-3 text-gray-900 focus:border-teal focus:ring-teal font-medium bg-white text-sm">
                        <option value="lc_sight">Irrevocable Confirmed L/C at Sight (Paling Aman / Standar Perbankan)</option>
                        <option value="tt_deposit">T/T DP 30-50% + Pelunasan Sebelum B/L Asli Dikirim (Standar Ekspor)</option>
                        <option value="cad_open_account">Documents Against Payment / Open Account 30-90 Hari (Risiko Tinggi)</option>
                        <option value="consignment">Konsinyasi / Barang Terjual Baru Bayar (Sangat Berisiko)</option>
                    </select>
                </div>

                {{-- Country & Track Record --}}
                <div class="space-y-3">
                    <span class="text-xs font-bold uppercase tracking-wider text-teal-dark">3. Karakteristik Negara &amp; Riwayat</span>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 mb-1">Zona Risiko Negara Tujuan Buyer:</label>
                        <select x-model="countryRisk" class="block w-full rounded-xl border-gray-200 px-3.5 py-2.5 text-gray-900 focus:border-teal focus:ring-teal font-medium bg-white text-sm">
                            <option value="low">Negara Maju / OECD / Anggota Mitra Dagang FTA Utama (Risiko Rendah)</option>
                            <option value="medium">Pasar Berkembang / Non-FTA / Regulasi Devisa Ketat (Risiko Sedang)</option>
                            <option value="high">Negara Zona Konflik / Daftar Pengawasan Khusus FATF (Risiko Tinggi)</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-2 pt-1">
                        <label class="flex items-center gap-2.5 text-sm cursor-pointer">
                            <input type="checkbox" x-model="isNewBuyer" class="rounded text-teal focus:ring-teal">
                            <span>Ini adalah transaksi pertama kali dengan buyer (First-Time Buyer).</span>
                        </label>
                        <label class="flex items-center gap-2.5 text-sm cursor-pointer">
                            <input type="checkbox" x-model="hasExportInsurance" class="rounded text-teal focus:ring-teal">
                            <span>Menggunakan Asuransi Pembayaran Ekspor (Askrindo / Indonesia Eximbank).</span>
                        </label>
                    </div>
                </div>
            </div>

            {{-- Result Card --}}
            <div class="bg-slate-900 rounded-2xl p-6 sm:p-8 text-white flex flex-col justify-between shadow-lg">
                <div>
                    <div class="flex items-center justify-between border-b border-slate-700 pb-4 mb-6">
                        <span class="text-sm font-bold text-teal-300 uppercase tracking-wider">Hasil Analisa Risiko Ekspor</span>
                        <span class="text-xs bg-teal/20 text-teal-300 px-2.5 py-1 rounded-full font-medium">ICC &amp; UCP 600 Standard</span>
                    </div>

                    {{-- Score Meter --}}
                    <div class="text-center my-6">
                        <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-2">Indeks Keamanan Transaksi</div>
                        <div class="text-5xl sm:text-6xl font-extrabold font-mono" :class="riskStatus.alertColor" x-text="safetyScore + '/100'"></div>
                        <div class="w-full bg-slate-800 rounded-full h-3 mt-4 overflow-hidden">
                            <div class="h-full transition-all duration-500 rounded-full"
                                 :class="safetyScore >= 80 ? 'bg-emerald-400' : (safetyScore >= 50 ? 'bg-amber-400' : 'bg-rose-500')"
                                 :style="'width: ' + safetyScore + '%'"></div>
                        </div>
                    </div>

                    {{-- Status Badge & Recommendation --}}
                    <div class="mt-6 p-4 rounded-xl border" :class="riskStatus.badge">
                        <div class="font-bold text-sm mb-1" x-text="riskStatus.level"></div>
                        <div class="text-xs opacity-90 leading-relaxed" x-text="riskStatus.recommendation"></div>
                    </div>
                </div>

                {{-- Action Button --}}
                <div class="mt-8 pt-6 border-t border-slate-700">
                    <a :href="'https://wa.me/628116568869?text=' + encodeURIComponent('Halo Tim GMA World, saya telah menganalisa profil buyer ekspor dengan Indeks Keamanan ' + safetyScore + '/100 (' + riskStatus.level + '). Saya ingin konsultasi verifikasi legalitas buyer dan kontrak dagang internasional.')"
                       target="_blank" rel="noopener noreferrer"
                       class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-teal text-slate-900 font-bold text-sm hover:bg-teal-light transition-all shadow-md">
                        <span>💬</span> Verifikasi Profil Buyer &amp; Kontrak
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Explanatory Rules --}}
    <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 border border-gray-200 text-gray-700 space-y-4 mb-10">
        <h3 class="text-xl font-bold text-gray-900">Ketentuan Standar Pembayaran Ekspor Internasional</h3>
        <p class="text-sm leading-relaxed">
            Perhitungan ini merujuk pada standar perbankan internasional <strong>ICC Uniform Customs and Practice for Documentary Credits (UCP 600)</strong> dan pedoman mitigasi risiko ekspor Kemendag RI:
        </p>
        <ul class="list-disc pl-5 text-sm space-y-1.5 font-mono text-gray-800">
            <li><strong>Letter of Credit (L/C)</strong>: Jaminan pembayaran dari Issuing Bank di negara buyer selama dokumen ekspor sesuai kondisi kredit.</li>
            <li><strong>Telegraphic Transfer (T/T)</strong>: Transfer kawat antarbank. Untuk buyer baru, minimal DP 30%–50% di awal sebelum produksi dimulai.</li>
            <li><strong>Mitigasi B/L</strong>: Jangan pernah merilis *Surrendered B/L* atau *Telex Release* sebelum pelunasan 100% masuk ke rekening eksportir.</li>
        </ul>
    </div>
</main>
@endsection
