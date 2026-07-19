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
                Syarat & Ketentuan
            </h1>
            <p class="text-lg text-gray-500 leading-relaxed font-medium">
                Aturan dan ketentuan penggunaan situs web dan konten {{ $domain }}.
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
                Syarat & Ketentuan
            </h1>
            <p class="text-lg text-white/80 leading-relaxed font-medium">
                Aturan dan ketentuan penggunaan situs web dan konten {{ $domain }}.
            </p>
        </div>
    </div>
</section>
@endif

<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
    <div class="bg-white rounded-2xl border border-gray-100 p-6 md:p-10 shadow-sm leading-relaxed text-gray-700 space-y-6">
        <p class="text-sm text-gray-400 italic">Terakhir Diperbarui: 19 Juli 2026</p>

        <p>Selamat datang di <strong>{{ $domain }}</strong>!</p>
        
        <p>Syarat dan ketentuan ini menguraikan aturan dan ketentuan penggunaan situs web <strong>{{ $companyName }}</strong> yang beralamat di <a href="https://{{ $domain }}" class="text-teal font-semibold hover:underline">https://{{ $domain }}</a>.</p>

        <p>Dengan mengakses situs web ini kami menganggap Anda menerima syarat dan ketentuan ini. Jangan terus menggunakan {{ $domain }} jika Anda tidak setuju untuk mematuhi semua syarat dan ketentuan yang tercantum di halaman ini.</p>

        <hr class="border-gray-100 my-6">

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">1. Lisensi Konten & Hak Cipta</h2>
        <p>Kecuali dinyatakan lain, {{ $companyName }} dan/atau pemberi lisensinya memiliki hak kekayaan intelektual untuk semua materi di {{ $domain }}. Semua hak kekayaan intelektual dilindungi undang-undang. Anda dapat mengakses ini dari {{ $domain }} untuk penggunaan pribadi Anda sendiri dengan batasan yang diatur dalam syarat dan ketentuan ini.</p>
        <p>Anda dilarang keras untuk:</p>
        <ul class="list-disc pl-6 space-y-2">
            <li>Menerbitkan ulang materi atau artikel dari {{ $domain }} tanpa izin atau atribusi yang layak.</li>
            <li>Menjual, menyewakan, atau mensublisensikan materi dari {{ $domain }}.</li>
            <li>Mereproduksi, menggandakan, atau menyalin materi dari {{ $domain }} untuk tujuan komersial secara tidak sah.</li>
            <li>Mendistribusikan ulang konten dari {{ $domain }} (kecuali konten tersebut dibuat khusus untuk didistribusikan kembali).</li>
        </ul>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">2. Penyangkal Tanggung Jawab (Disclaimer)</h2>
        <p>Informasi yang disediakan di situs web ini disediakan "apa adanya", dengan segala kekurangan, dan {{ $companyName }} tidak membuat pernyataan atau jaminan tertulis atau tersirat dalam bentuk apa pun terkait dengan situs web ini atau materi yang terkandung di dalamnya. Seluruh artikel di blog ini dibuat untuk tujuan edukasi, wawasan industri, dan informasi umum, bukan merupakan nasihat profesional hukum, kepabeanan, perdagangan, atau keuangan langsung.</p>
        <p>Kami tidak menjamin bahwa informasi di situs web ini lengkap, benar, atau akurat; kami juga tidak berjanji untuk memastikan bahwa situs web tetap tersedia atau bahwa materi di situs web selalu diperbarui.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">3. Komentar Pengguna</h2>
        <p>Beberapa bagian dari situs web ini menawarkan kesempatan bagi pengguna untuk memposting opini dan informasi di area situs tertentu (kolom komentar). {{ $companyName }} tidak menyaring, mengedit, mempublikasikan, atau meninjau Komentar sebelum kehadirannya di situs web. Komentar tidak mencerminkan pandangan dan opini {{ $companyName }}, agen, dan/atau afiliasinya.</p>
        <p>Kami berhak memantau semua Komentar dan menghapus Komentar apa pun yang dianggap tidak pantas, menyinggung, melanggar hukum, atau melanggar Syarat dan Ketentuan ini.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">4. Kebijakan Cookies & Iklan Pihak Ketiga</h2>
        <p>Situs kami menggunakan cookie untuk meningkatkan pengalaman navigasi Anda. Dengan melanjutkan kunjungan, Anda menyetujui penggunaan cookies kami sesuai dengan Kebijakan Privasi kami. Kami juga bermitra dengan pihak ketiga seperti Google AdSense untuk menampilkan iklan. Anda dapat mengontrol setelan cookie Anda melalui konfigurasi browser web Anda.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">5. Perubahan Ketentuan</h2>
        <p>{{ $companyName }} diizinkan untuk merevisi Syarat dan Ketentuan ini kapan saja sesuai kebutuhan, dan dengan menggunakan situs web ini Anda diharapkan untuk meninjau Syarat & Ketentuan ini secara berkala untuk memastikan Anda memahami semua syarat dan ketentuan yang mengatur penggunaan situs web ini.</p>

        <h2 class="text-2xl font-serif font-bold text-teal-deep mt-6 mb-3">6. Hubungi Kami</h2>
        <p>Jika Anda memiliki pertanyaan tentang Syarat & Ketentuan kami, silakan hubungi kami melalui email di <a href="mailto:{{ $site->contact_email ?: 'dirabarakamulia@gmail.com' }}" class="text-teal font-semibold hover:underline">{{ $site->contact_email ?: 'dirabarakamulia@gmail.com' }}</a>.</p>
    </div>
</section>
@endsection
