<!DOCTYPE html>
<html lang="{{ $site->languages && in_array('en', $site->languages) ? 'en' : 'id' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Asset prefix for subdirectory blog mode (e.g. morabangun.com/blog/) --}}
    @php
        $blogAssetPrefix = (defined('BLOG_SUBDIRECTORY_MODE') && BLOG_SUBDIRECTORY_MODE) ? '/blog' : '';
        $hasManifest = file_exists(public_path('build/manifest.json'));
        $hasHot = file_exists(public_path('hot'));
        $useVite = !$blogAssetPrefix && ($hasManifest || $hasHot);
        $useInline = !$blogAssetPrefix && !$hasManifest && !$hasHot;
    @endphp

    {{-- Primary Meta Tags --}}
    <title>@yield('title', $seo['title'] ?? ($site->name . ' - Blog'))</title>
    <meta name="description" content="@yield('description', $seo['description'] ?? '')">
    <meta name="keywords" content="{{ $seo['focus_keyword'] ?? '' }}, {{ $site->name }}, blog, artikel">
    @if($seo['canonical'] ?? false)
    <link rel="canonical" href="{{ $seo['canonical'] }}">
    @endif

    {{-- Author --}}
    @if($seo['author'] ?? false)
    <meta name="author" content="{{ $seo['author'] }}">
    @endif

    {{-- Google AdSense Auto Ads --}}
    @if($adsensePublisherId = config('services.google.adsense_publisher_id'))
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $adsensePublisherId }}"
            crossorigin="anonymous"></script>
    @endif

    {{-- Google site verification --}}
    @if($googleVerification = config('services.google.site_verification'))
    <meta name="google-site-verification" content="{{ $googleVerification }}">
    @endif

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="{{ $site->name }}">
    <meta property="og:title" content="@yield('og_title', $seo['title'] ?? $site->name . ' - Blog')">
    <meta property="og:description" content="@yield('og_description', $seo['description'] ?? '')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="id_ID">
    @if($seo['image'] ?? false)
    <meta property="og:image" content="{{ $seo['image'] }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    @endif
    @if($seo['published_time'] ?? false)
    <meta property="article:published_time" content="{{ $seo['published_time'] }}">
    @endif
    @if($seo['modified_time'] ?? false)
    <meta property="article:modified_time" content="{{ $seo['modified_time'] }}">
    @endif
    @if(!empty($seo['tags']))
        @foreach($seo['tags'] as $tag)
    <meta property="article:tag" content="{{ $tag }}">
        @endforeach
    @endif

    {{-- Twitter Cards --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', $seo['title'] ?? $site->name . ' - Blog')">
    <meta name="twitter:description" content="@yield('og_description', $seo['description'] ?? '')">
    @if($seo['image'] ?? false)
    <meta name="twitter:image" content="{{ $seo['image'] }}">
    @endif
    <meta name="twitter:site" content="{{ '@' . str_replace(['.', ' '], '_', $site->slug) }}">

    {{-- RSS Feed --}}
    <link rel="alternate" type="application/rss+xml" title="{{ $site->name }} Blog RSS Feed" href="{{ url($blogAssetPrefix . '/feed.xml') }}">

    {{-- Sitemap --}}
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ url($blogAssetPrefix . '/sitemap.xml') }}">

    {{-- Preconnect to external origins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @if(config('services.google.adsense_publisher_id'))
    <link rel="preconnect" href="https://pagead2.googlesyndication.com">
    @endif

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Styles --}}
    @if ($blogAssetPrefix)
        @php
            $manifestPath = public_path('build/manifest.json');
            if (file_exists($manifestPath)) {
                $manifest = json_decode(file_get_contents($manifestPath), true);
                $entry = $manifest['resources/js/app.js'] ?? [];
                $cssFiles = $entry['css'] ?? [];
                $jsFile = $entry['file'] ?? '';
            }
        @endphp
        @foreach($cssFiles ?? [] as $css)
        <link rel="stylesheet" href="{{ $blogAssetPrefix }}/build/{{ $css }}">
        @endforeach
    @endif
    @if ($useVite)
        @vite(['resources/css/app.css'])
    @endif
    @if ($useInline)
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Inter',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-blue-50:oklch(.97 .014 254.604);--color-blue-100:oklch(.932 .032 255.585);--color-blue-200:oklch(.882 .059 254.128);--color-blue-300:oklch(.809 .105 251.813);--color-blue-400:oklch(.707 .165 254.624);--color-blue-500:oklch(.623 .214 259.815);--color-blue-600:oklch(.546 .245 262.881);--color-blue-700:oklch(.488 .243 264.376);--color-blue-800:oklch(.424 .199 265.638);--color-blue-900:oklch(.379 .146 265.522);--color-blue-950:oklch(.282 .091 267.935);--color-gray-50:oklch(.985 .002 247.839);--color-gray-100:oklch(.967 .003 264.542);--color-gray-200:oklch(.928 .006 264.531);--color-gray-300:oklch(.872 .01 258.338);--color-gray-400:oklch(.707 .022 261.325);--color-gray-500:oklch(.551 .027 264.364);--color-gray-600:oklch(.446 .03 256.802);--color-gray-700:oklch(.373 .034 259.733);--color-gray-800:oklch(.278 .033 256.848);--color-gray-900:oklch(.21 .034 264.665);--color-gray-950:oklch(.13 .028 261.692);--color-white:#fff;--color-black:#000;--spacing:.25rem;--text-xs:.75rem;--text-sm:.875rem;--text-base:1rem;--text-lg:1.125rem;--text-xl:1.25rem;--text-2xl:1.5rem;--text-3xl:1.875rem;--text-4xl:2.25rem;--text-5xl:3rem;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--leading-tight:1.25;--leading-relaxed:1.625;--tracking-wider:.05em;--default-font-family:var(--font-sans)}*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}body{line-height:inherit;font-family:Inter,sans-serif}a{color:inherit;text-decoration:inherit}img,video{max-width:100%;height:auto}.mx-auto{margin-inline:auto}.max-w-4xl{max-width:56rem}.max-w-6xl{max-width:72rem}.max-w-3xl{max-width:48rem}.max-w-lg{max-width:32rem}.max-w-md{max-width:28rem}.w-full{width:100%}.w-5{width:1.25rem}.w-4{width:1rem}.w-10{width:2.5rem}.w-20{width:5rem}.h-16{height:4rem}.h-8{height:2rem}.h-5{height:1.25rem}.h-4{height:1rem}.h-10{height:2.5rem}.h-auto{height:auto}.px-4{padding-inline:1rem}.px-3{padding-inline:.75rem}.px-5{padding-inline:1.25rem}.px-2\.5{padding-inline:.625rem}.py-4{padding-block:1rem}.py-12{padding-block:3rem}.py-8{padding-block:2rem}.py-6{padding-block:1.5rem}.py-1\.5{padding-block:.375rem}.py-0\.5{padding-block:.125rem}.pt-8{padding-top:2rem}.pt-6{padding-top:1.5rem}.pt-24{padding-top:6rem}.pb-6{padding-bottom:1.5rem}.pb-2{padding-bottom:.5rem}.text-center{text-align:center}.text-right{text-align:right}.font-\[Inter\,sans-serif\]{font-family:Inter,sans-serif}.text-sm{font-size:.875rem}.text-xs{font-size:.75rem}.text-lg{font-size:1.125rem}.text-xl{font-size:1.25rem}.text-2xl{font-size:1.5rem}.text-3xl{font-size:1.875rem}.text-4xl{font-size:2.25rem}.leading-tight{line-height:1.25}.leading-relaxed{line-height:1.625}.font-medium{font-weight:500}.font-semibold{font-weight:600}.font-bold{font-weight:700}.font-extrabold{font-weight:800}.tracking-wider{letter-spacing:.05em}.uppercase{text-transform:uppercase}.text-gray-900{color:oklch(.21 .034 264.665)}.text-gray-500{color:oklch(.551 .027 264.364)}.text-gray-400{color:oklch(.707 .022 261.325)}.text-gray-600{color:oklch(.446 .03 256.802)}.text-gray-700{color:oklch(.373 .034 259.733)}.text-gray-300{color:oklch(.872 .01 258.338)}.text-blue-600{color:oklch(.546 .245 262.881)}.text-blue-700{color:oklch(.488 .243 264.376)}.text-blue-100{color:oklch(.932 .032 255.585)}.text-white{color:#fff}.line-clamp-2{overflow:hidden;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2}.border{border-style:solid;border-width:1px}.border-b{border-bottom-style:solid;border-bottom-width:1px}.border-t{border-top-style:solid;border-top-width:1px}.border-gray-100{color:oklch(.967 .003 264.542)}.border-gray-200{color:oklch(.928 .006 264.531)}.border-gray-800{color:oklch(.278 .033 256.848)}.border-blue-200{color:oklch(.882 .059 254.128)}.bg-white{background-color:#fff}.bg-gray-50{background-color:oklch(.985 .002 247.839)}.bg-gray-100{background-color:oklch(.967 .003 264.542)}.bg-gray-900{background-color:oklch(.21 .034 264.665)}.bg-blue-50{background-color:oklch(.97 .014 254.604)}.bg-blue-600{background-color:oklch(.546 .245 262.881)}.bg-black\/40{background-color:#00000066}.hover\:bg-gray-100:hover{background-color:oklch(.967 .003 264.542)}.hover\:bg-blue-50\/50:hover{background-color:oklch(.97 .014 254.604)}.hover\:text-blue-600:hover,.hover\:text-blue-600:hover *{color:oklch(.546 .245 262.881)}.hover\:shadow-lg:hover{box-shadow:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a}.transition-colors{transition-property:color,background-color,border-color;transition-duration:.15s}.transition-all{transition-property:all;transition-duration:.15s}.transition-transform{transition-property:transform;transition-duration:.15s}.duration-300{transition-duration:.3s}.duration-500{transition-duration:.5s}.rounded-2xl{border-radius:1rem}.rounded-xl{border-radius:.75rem}.rounded-lg{border-radius:.5rem}.rounded-full{border-radius:3.40282e38px}.overflow-hidden{overflow:hidden}.object-cover{object-fit:cover}.aspect-\[16\/9\]{aspect-ratio:16/9}.shrink-0{flex-shrink:0}.flex{display:flex}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.items-center{align-items:center}.items-start{align-items:flex-start}.justify-between{justify-content:space-between}.justify-center{justify-content:center}.gap-6{gap:1.5rem}.gap-4{gap:1rem}.gap-3{gap:.75rem}.gap-2{gap:.5rem}.gap-1\.5{gap:.375rem}.gap-8{gap:2rem}.space-y-4>:not(:last-child){margin-bottom:1rem}.space-y-2>:not(:last-child){margin-bottom:.5rem}.space-y-1>:not(:last-child){margin-bottom:.25rem}:where(.space-x-1>:not(:last-child)){margin-inline-end:.25rem}.sticky{position:sticky}.top-0{top:0}.top-24{top:6rem}.z-50{z-index:50}.fixed{position:fixed}.inset-0{top:0;right:0;bottom:0;left:0}.inset-x-0{left:0;right:0}.hidden{display:none}.self-start{align-self:flex-start}.flex-1{flex:1}.grid{display:grid}.grid-cols-1{grid-template-columns:repeat(1,1fr)}@media (width>=48rem){.md\:grid-cols-2{grid-template-columns:repeat(2,1fr)}.md\:grid-cols-3{grid-template-columns:repeat(3,1fr)}.md\:py-24{padding-block:6rem}.md\:py-16{padding-block:4rem}.md\:py-12{padding-block:3rem}.md\:text-4xl{font-size:2.25rem}.md\:text-5xl{font-size:3rem}.md\:text-xl{font-size:1.25rem}.md\:gap-8{gap:2rem}}@media (width>=64rem){.lg\:flex-row{flex-direction:row}.lg\:w-64{width:16rem}.lg\:gap-12{gap:3rem}.lg\:sticky{position:sticky}.lg\:grid-cols-3{grid-template-columns:repeat(3,1fr)}.lg\:text-5xl{font-size:3rem}}@media (width>=80rem){}.sm\:inline{display:inline}.sm\:flex-row{flex-direction:row}.sm\:px-6{padding-inline:1.5rem}.sm\:items-center{align-items:center}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.bg-white\/95{background-color:#fffffffc}.backdrop-blur-sm{backdrop-filter:blur(8px)}.bg-gradient-to-br{background-image:linear-gradient(to bottom right,var(--tw-gradient-stops))}.from-blue-600{--tw-gradient-from:#2563eb;--tw-gradient-stops:var(--tw-gradient-from),var(--tw-gradient-to,#2563eb00)}.via-blue-700{--tw-gradient-stops:var(--tw-gradient-from),#1d4ed8,var(--tw-gradient-to,#1d4ed800)}.to-indigo-800{--tw-gradient-to:#3730a3}.min-w-0{min-width:0}.prose{max-width:65ch}.prose-lg{font-size:1.125rem;line-height:1.77778}.prose-lg p{margin-top:1.33333em;margin-bottom:1.33333em}.prose-lg h2{font-size:1.66667em;margin-top:2em;margin-bottom:1em;line-height:1.33333}.prose-lg h3{font-size:1.33333em;margin-top:1.6em;margin-bottom:.6em;line-height:1.5}.prose-lg ul{margin-top:1.33333em;margin-bottom:1.33333em;padding-left:1.11111em;list-style-type:disc}.prose-lg li{margin-top:.66667em;margin-bottom:.66667em}.prose-lg blockquote{font-weight:500;font-style:italic;border-left-width:.25rem;margin-top:1.66667em;margin-bottom:1.66667em;padding-left:1em}.prose-lg a{font-weight:500;text-decoration:underline}.prose-blue a{color:#2563eb}.prose-blue a:hover{color:#1d4ed8}.prose-headings\:font-bold h1,.prose-headings\:font-bold h2,.prose-headings\:font-bold h3,.prose-headings\:font-bold h4{font-weight:700}.prose-headings\:text-gray-900 h1,.prose-headings\:text-gray-900 h2,.prose-headings\:text-gray-900 h3,.prose-headings\:text-gray-900 h4{color:oklch(.21 .034 264.665)}.prose-p\:text-gray-700 p{color:oklch(.373 .034 259.733)}.prose-p\:leading-relaxed p{line-height:1.625}.prose-img\:rounded-xl img{border-radius:.75rem}.prose-img\:shadow-md img{box-shadow:0 4px 6px -1px #0000001a,0 2px 4px -2px #0000001a}.hover\:border-gray-200:hover{border-color:oklch(.928 .006 264.531)}.hover\:border-blue-200:hover{border-color:oklch(.882 .059 254.128)}.hover\:bg-gray-200:hover{background-color:oklch(.928 .006 264.531)}.hover\:bg-blue-100:hover{background-color:oklch(.932 .032 255.585)}.group:hover .group-hover\:scale-105{scale:1.05}.group:hover .group-hover\:text-blue-600,.group:hover .group-hover\:text-blue-600 *{color:oklch(.546 .245 262.881)}.cursor-default{cursor:default}.scroll-mt-24{scroll-margin-top:6rem}.max-w-none{max-width:none}.col-start-2{grid-column-start:2}.border-l-2{border-left-width:2px}.border-l{border-left-width:1px}.border-blue-500{border-color:#3b82f6}.border-transparent{border-color:transparent}.hover\:border-blue-500:hover{border-color:#3b82f6}.rotate-180{rotate:180deg}}
        </style>
    @endif

    {{-- Additional head --}}
    @stack('head')

    {{-- Schema.org Site Navigation --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Blog",
        "name": "{{ $site->name }} Blog",
        "description": "Blog dan artikel terbaru dari {{ $site->name }}",
        "url": "{{ url('/blog') }}",
        "publisher": {
            "@type": "Organization",
            "name": "{{ $site->name }}"
        }
    }
    </script>
</head>
<body class="bg-white text-gray-900 font-['Inter',sans-serif] antialiased">
    {{-- Schema.org WebSite + Search --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "{{ $site->name }}",
        "url": "{{ url('/') }}",
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "{{ url('/blog') }}?q={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    {{-- Navbar --}}
    <header class="border-b border-gray-100 sticky top-0 bg-white/95 backdrop-blur-sm z-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo / Brand --}}
                <a href="{{ url('/') }}" class="flex items-center gap-2 font-bold text-xl text-gray-900 hover:text-blue-600 transition-colors">
                    @if($site->logo_url)
                    <img src="{{ $site->logo_url }}" alt="{{ $site->name }}" class="h-8 w-auto">
                    @else
                    <span class="bg-blue-600 text-white px-2 py-0.5 rounded text-sm">{{ substr($site->name, 0, 2) }}</span>
                    @endif
                    <span class="hidden sm:inline">{{ $site->name }}</span>
                </a>

                {{-- Nav links --}}
                <nav class="flex items-center gap-6 text-sm font-medium text-gray-600">
                    <a href="{{ url('/blog') }}" class="hover:text-blue-600 transition-colors {{ request()->is('blog') ? 'text-blue-600' : '' }}">Blog</a>
                    @if($site->domain)
                    <a href="{{ 'https://' . $site->domain }}" class="hover:text-blue-600 transition-colors" target="_blank" rel="noopener">Website</a>
                    @endif
                    {{-- Search --}}
                    <button onclick="document.getElementById('search-modal').classList.toggle('hidden')"
                            class="p-2 hover:bg-gray-100 rounded-lg transition-colors" aria-label="Search">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </nav>
            </div>
        </div>
    </header>

    {{-- Search Modal --}}
    <div id="search-modal" class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 flex items-start justify-center pt-24 px-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden" onclick="event.stopPropagation()">
            <form action="{{ url('/blog') }}" method="GET" class="p-4">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="q" placeholder="Cari artikel..." autofocus
                           class="flex-1 outline-none text-lg placeholder-gray-400">
                    <button type="button" onclick="document.getElementById('search-modal').classList.add('hidden')"
                            class="text-sm text-gray-500 hover:text-gray-700 font-medium">Tutup</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Close search modal on escape or backdrop click
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('search-modal');
            if (e.target === modal) modal.classList.add('hidden');
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('search-modal')?.classList.add('hidden');
            }
        });
    </script>

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-400 mt-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-white font-semibold mb-3">{{ $site->name }}</h3>
                    <p class="text-sm leading-relaxed">{{ $site->ai_prompt_context ? \Illuminate\Support\Str::limit($site->ai_prompt_context, 120) : 'Blog resmi ' . $site->name }}</p>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-3">Blog</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ url('/blog') }}" class="hover:text-white transition-colors">Semua Artikel</a></li>
                        <li><a href="{{ url('/sitemap.xml') }}" class="hover:text-white transition-colors">Sitemap</a></li>
                        <li><a href="{{ url('/feed.xml') }}" class="hover:text-white transition-colors">RSS Feed</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-3">Ikuti Kami</h3>
                    <p class="text-sm leading-relaxed">Dapatkan update artikel terbaru langsung dari blog kami.</p>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-sm text-center">
                &copy; {{ date('Y') }} {{ $site->name }}. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- Schema.org BreadcrumbList (fallback) --}}
    @stack('schema')

    {{-- Vite JS --}}
    @if ($blogAssetPrefix && isset($jsFile))
        <script type="module" src="{{ $blogAssetPrefix }}/build/{{ $jsFile }}"></script>
    @endif
    @if ($useVite)
        @vite(['resources/js/app.js'])
    @endif
</body>
</html>
