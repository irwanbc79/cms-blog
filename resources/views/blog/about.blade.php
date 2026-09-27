@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])
@section('og_type', 'website')

@push('head')
<style>
    .editorial-grid{display:grid;grid-template-columns:minmax(0,1fr) 280px;gap:2rem}
    .editorial-steps{list-style:decimal;padding-left:1.5rem}
    .editorial-steps li{margin:.5rem 0;padding-left:.25rem}
    @media(max-width:1023px){.editorial-grid{grid-template-columns:minmax(0,1fr)}}
</style>
@endpush

@section('content')
<section class="bg-gradient-to-br from-teal-deep via-teal-dark to-ink text-white relative overflow-hidden border-b border-gold/10">
    <div class="absolute inset-0 opacity-15 pointer-events-none">
        <div class="absolute -top-32 -right-32 w-[500px] h-[500px] bg-gold rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-32 -left-32 w-[400px] h-[400px] bg-teal rounded-full blur-[100px]"></div>
    </div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
        <p class="text-gold-light text-sm font-bold uppercase tracking-[0.16em] mb-3">Identitas Penerbit</p>
        <h1 class="text-4xl md:text-5xl font-serif font-bold leading-tight mb-4">Tentang Blog & Standar Editorial</h1>
        <p class="text-lg text-white/80 leading-relaxed max-w-3xl">
            Blog {{ $site->company_name }} menerbitkan materi edukasi yang membantu pembaca membuat keputusan lebih terstruktur, dengan sumber, tanggal pembaruan, dan batas tanggung jawab yang jelas.
        </p>
    </div>
</section>

<section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
    <div class="editorial-grid">
        <div class="bg-white rounded-2xl border border-gray-100 p-6 md:p-10 shadow-sm text-gray-700 leading-relaxed space-y-8">
            <section>
                <h2 class="text-2xl font-serif font-bold text-teal-deep mb-3">Siapa yang menerbitkan</h2>
                <p><strong>{{ $site->company_name }}</strong> adalah penerbit blog ini. Artikel menggunakan byline <strong>{{ $site->editorial_author_name }}</strong> karena akun login CMS bukan identitas penulis publik. Pertanyaan atau koreksi dapat dikirim ke <a href="mailto:{{ $site->contact_email ?: 'dirabarakamulia@gmail.com' }}" class="text-teal font-semibold hover:underline">{{ $site->contact_email ?: 'dirabarakamulia@gmail.com' }}</a>.</p>
            </section>

            <section>
                <h2 class="text-2xl font-serif font-bold text-teal-deep mb-3">Cara kami menyusun artikel</h2>
                <ol class="editorial-steps">
                    <li>Menetapkan pertanyaan keputusan dan kebutuhan pembaca, bukan mengejar jumlah artikel.</li>
                    <li>Mengutamakan peraturan, portal instansi, dokumentasi teknis, dan sumber primer untuk klaim yang dapat berubah.</li>
                    <li>Menambahkan nilai operasional berupa checklist, matriks, simulasi, contoh dokumen, atau alur keputusan.</li>
                    <li>Memeriksa judul, sumber, tanggal, klaim promosi, duplikasi, metadata, dan keterbacaan sebelum rilis.</li>
                    <li>Mencatat tanggal pembaruan dan memperbaiki atau mengonsolidasikan materi yang sudah tidak memadai.</li>
                </ol>
            </section>

            <section>
                <h2 class="text-2xl font-serif font-bold text-teal-deep mb-3">AI dan peninjauan manusia</h2>
                <p>Perangkat AI dapat membantu riset awal, struktur, pemeriksaan pola, dan penyuntingan. AI bukan sumber hukum atau penanggung jawab keputusan. Artikel baru dan revisi material harus melewati gate editorial manusia; konten lama sedang diaudit bertahap dan dapat diperbarui, digabung, atau dialihkan ke artikel yang lebih kuat.</p>
            </section>

            <section>
                <h2 class="text-2xl font-serif font-bold text-teal-deep mb-3">Koreksi dan pembaruan</h2>
                <p>Jika sumber berubah, tautan rusak, atau uraian tidak lagi tepat, kirim URL artikel dan bagian yang perlu diperiksa melalui email resmi. Koreksi substansial akan diikuti pembaruan tanggal artikel. Halaman yang bertumpang tindih dapat diarahkan permanen ke satu artikel canonical agar pembaca dan mesin pencari memperoleh rujukan yang konsisten.</p>
            </section>

            <section>
                <h2 class="text-2xl font-serif font-bold text-teal-deep mb-3">Batas penggunaan informasi</h2>
                <p>Artikel bersifat edukasi dan tidak menggantikan penelitian instansi, nasihat profesional, kontrak, klasifikasi produk, perizinan, atau keputusan transaksi. Untuk topik ekspor-impor, pajak, kepabeanan, mutu, dan izin, verifikasi kembali produk, pihak, dokumen, negara tujuan, serta peraturan pada tanggal transaksi.</p>
            </section>

            <section>
                <h2 class="text-2xl font-serif font-bold text-teal-deep mb-3">Iklan dan independensi editorial</h2>
                <p>Blog dapat menampilkan iklan Google AdSense. Penempatan iklan tidak menentukan kesimpulan artikel dan tidak boleh menyerupai tombol navigasi, dokumen, atau rekomendasi editorial. Klik iklan bukan syarat untuk mengakses artikel.</p>
            </section>
        </div>

        <aside class="space-y-5">
            <div class="bg-teal-pale border border-teal/10 rounded-2xl p-6">
                <p class="text-xs uppercase tracking-[0.14em] font-bold text-teal mb-2">Byline Resmi</p>
                <p class="font-serif font-bold text-lg text-teal-deep">{{ $site->editorial_author_name }}</p>
                <p class="text-sm text-gray-600 mt-2">Riset, penyuntingan, kontrol sumber, dan pemeliharaan artikel portfolio.</p>
            </div>
            <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
                <h2 class="font-bold text-teal-deep mb-3">Dokumen publik</h2>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('blog.privacy') }}" class="text-teal font-semibold hover:underline">Kebijakan Privasi</a></li>
                    <li><a href="{{ route('blog.terms') }}" class="text-teal font-semibold hover:underline">Syarat & Ketentuan</a></li>
                    <li><a href="{{ url('/blog/sitemap.xml') }}" class="text-teal font-semibold hover:underline">Sitemap</a></li>
                    <li><a href="{{ url('/blog/feed.xml') }}" class="text-teal font-semibold hover:underline">RSS Feed</a></li>
                </ul>
            </div>
        </aside>
    </div>
</section>
@endsection
