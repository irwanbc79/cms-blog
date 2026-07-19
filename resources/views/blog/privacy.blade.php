@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])
@section('og_type', 'website')

@section('content')
@php
    $isGma = ($site->domain === 'gma-world.id');
    $companyName = $site->company_name;
    $domain = $site->domain;
@endphp

@if($isGma)
{{-- Hero GMA --}}
<section class="relative bg-white border-b border-gray-200 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-[0.5]"
         style="background-image:linear-gradient(#e8edf3 1px,transparent 1px),linear-gradient(90deg,#e8edf3 1px,transparent 1px);background-size:48px 48px;mask-image:linear-gradient(to bottom,black,transparent)"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-sans font-extrabold tracking-tight text-teal-deep mb-4">
                Kebijakan Privasi
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed font-medium">
                Komitmen kami dalam melindungi data pribadi dan privasi pengunjung {{ $domain }}.
            </p>
        </div>
    </div>
</section>
@else
{{-- Hero Default (Teal/Gold) --}}
<section class="bg-gradient-to-br from-teal-deep via-teal-dark to-ink text-white relative overflow-hidden border-b border-gold/10">
    <div class="absolute inset-0 opacity-15 pointer-events-none">
        <div class="absolute -top-32 -right-32 w-[500px] h-[500px] bg-gold rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-32 -left-32 w-[400px] h-[400px] bg-teal rounded-full blur-[100px]"></div>
    </div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-serif font-bold leading-tight mb-4">
                Kebijakan Privasi
            </h1>
            <p class="text-lg text-white/80 leading-relaxed font-medium">
                Komitmen kami dalam melindungi data pribadi dan privasi pengunjung {{ $domain }}.
            </p>
        </div>
    </div>
</section>
@endif

<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
    <div class="bg-white rounded-2xl border border-gray-100 p-6 md:p-10 shadow-sm leading-relaxed text-gray-700 space-y-6">
        <p class="text-sm text-gray-400 italic">Terakhir Diperbarui: 19 Juli 2026</p>

        <p>Di <strong>{{ $companyName }}</strong> (dapat diakses dari <a href="https://{{ $domain }}" class="text-teal font-semibold hover:underline">https://{{ $domain }}</a>), salah satu prioritas utama kami adalah privasi pengunjung kami. Dokumen Kebijakan Privasi ini berisi jenis informasi yang dikumpulkan dan dicatat oleh {{ $domain }} serta bagaimana kami menggunakannya.</p>

        <p>Jika Anda memiliki pertanyaan tambahan atau memerlukan informasi lebih lanjut tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami melalui email di <a href="mailto:{{ $site->contact_email ?: 'dirabarakamulia@gmail.com' }}" class="text-teal font-semibold hover:underline">{{ $site->contact_email ?: 'dirabarakamulia@gmail.com' }}</a> atau nomor WhatsApp resmi kami.</p>

        <hr class="border-gray-100 my-6">

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">Persetujuan</h2>
        <p>Dengan menggunakan situs web kami, Anda dengan ini menyetujui Kebijakan Privasi kami dan menyetujui ketentuan-ketentuannya.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">Informasi yang Kami Kumpulkan</h2>
        <p>Informasi pribadi yang diminta untuk Anda berikan, dan alasan mengapa Anda diminta untuk memberikannya, akan dijelaskan kepada Anda pada saat kami meminta Anda memberikan informasi pribadi tersebut.</p>
        <p>Jika Anda menghubungi kami secara langsung, kami mungkin menerima informasi tambahan tentang Anda seperti nama Anda, alamat email, nomor telepon, isi pesan dan/atau lampiran yang Anda kirimkan kepada kami, dan informasi lain yang mungkin Anda pilih untuk berikan (seperti ketika mengisi formulir komentar atau konsultasi).</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">Bagaimana Kami Menggunakan Informasi Anda</h2>
        <p>Kami menggunakan informasi yang kami kumpulkan dengan berbagai cara, termasuk untuk:</p>
        <ul class="list-disc pl-6 space-y-2">
            <li>Menyediakan, mengoperasikan, dan memelihara situs web kami.</li>
            <li>Meningkatkan, mempersonalisasi, dan memperluas situs web kami.</li>
            <li>Memahami dan menganalisis bagaimana Anda menggunakan situs web kami.</li>
            <li>Mengembangkan produk, layanan, fitur, dan fungsionalitas baru.</li>
            <li>Berkomunikasi dengan Anda, baik secara langsung atau melalui salah satu mitra kami, termasuk untuk layanan pelanggan, untuk memberi Anda pembaruan dan informasi lain yang berkaitan dengan situs web, serta untuk tujuan pemasaran dan promosi.</li>
            <li>Mengirimkan email kepada Anda (jika berlangganan).</li>
            <li>Menemukan dan mencegah penipuan.</li>
        </ul>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">Log Files (File Log)</h2>
        <p>{{ $domain }} mengikuti prosedur standar penggunaan file log. File-file ini mencatat pengunjung ketika mereka mengunjungi situs web. Semua perusahaan hosting melakukan ini dan merupakan bagian dari analisis layanan hosting. Informasi yang dikumpulkan oleh file log termasuk alamat protokol internet (IP), jenis browser, Penyedia Layanan Internet (ISP), stempel tanggal dan waktu, halaman rujukan/keluar, dan mungkin jumlah klik. Ini tidak terkait dengan informasi apa pun yang dapat diidentifikasi secara pribadi. Tujuan dari informasi tersebut adalah untuk menganalisis tren, mengelola situs, melacak pergerakan pengguna di situs web, dan mengumpulkan informasi demografis.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">Google DoubleClick DART Cookie</h2>
        <p>Google adalah salah satu vendor pihak ketiga di situs kami. Google juga menggunakan cookie, yang dikenal sebagai cookie DART, untuk menyajikan iklan kepada pengunjung situs kami berdasarkan kunjungan mereka ke {{ $domain }} dan situs lain di internet. Namun, pengunjung dapat memilih untuk menolak penggunaan cookie DART dengan mengunjungi Kebijakan Privasi jaringan iklan dan konten Google di URL berikut – <a href="https://policies.google.com/technologies/ads" target="_blank" rel="noopener" class="text-teal font-semibold hover:underline">https://policies.google.com/technologies/ads</a>.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">Kebijakan Privasi Mitra Periklanan Kami</h2>
        <p>Beberapa pengiklan di situs kami mungkin menggunakan cookie dan web beacon. Kebijakan Privasi masing-masing mitra periklanan kami ditautkan langsung ke situs mereka. Untuk akses yang lebih mudah, kami mencantumkan kebijakan privasi Google AdSense di atas.</p>
        <p>Server iklan pihak ketiga atau jaringan iklan menggunakan teknologi seperti cookie, JavaScript, atau Web Beacon yang digunakan dalam iklan masing-masing dan tautan yang muncul di {{ $domain }}, yang dikirim langsung ke browser pengguna. Mereka secara otomatis menerima alamat IP Anda saat ini terjadi. Teknologi ini digunakan untuk mengukur efektivitas kampanye periklanan mereka dan/atau untuk mempersonalisasi konten periklanan yang Anda lihat di situs web yang Anda kunjungi.</p>
        <p>Harap dicatat bahwa {{ $companyName }} tidak memiliki akses ke atau kontrol atas cookie ini yang digunakan oleh pengiklan pihak ketiga.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">Kebijakan Privasi Pihak Ketiga</h2>
        <p>Kebijakan Privasi {{ $companyName }} tidak berlaku untuk pengiklan atau situs web lain. Karena itu, kami menyarankan Anda untuk berkonsultasi dengan masing-masing Kebijakan Privasi dari server iklan pihak ketiga ini untuk informasi yang lebih rinci. Ini mungkin mencakup praktik dan instruksi mereka tentang cara memilih keluar dari opsi tertentu.</p>
        <p>Anda dapat memilih untuk menonaktifkan cookie melalui opsi browser individu Anda. Informasi lebih rinci tentang manajemen cookie dengan browser web tertentu dapat ditemukan di situs web masing-masing browser.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">Perlindungan Informasi Anak</h2>
        <p>Bagian lain dari prioritas kami adalah menambahkan perlindungan untuk anak-anak saat menggunakan internet. Kami mendorong orang tahu dan wali untuk mengamati, berpartisipasi, dan/atau memantau serta membimbing aktivitas online mereka.</p>
        <p>{{ $domain }} tidak dengan sengaja mengumpulkan Informasi Identifikasi Pribadi apa pun dari anak-anak di bawah usia 13 tahun. Jika Anda berpikir bahwa anak Anda memberikan informasi semacam ini di situs web kami, kami sangat menganjurkan Anda untuk menghubungi kami segera dan kami akan melakukan upaya terbaik kami untuk segera menghapus informasi tersebut dari catatan kami.</p>
    </div>
</section>
@endsection
