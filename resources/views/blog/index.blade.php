@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])
@section('og_type', 'website')

@section('content')
@php $isGma = ($site->domain === 'gma-world.id'); @endphp

@if($isGma)
{{-- Hero GMA: editorial korporat putih + grid pattern + sans-serif (selaras frontpage) --}}
<section class="relative bg-white border-b border-gray-200 overflow-hidden">
    <div class="absolute inset-0 pointer-events-none opacity-[0.5]"
         style="background-image:linear-gradient(#e8edf3 1px,transparent 1px),linear-gradient(90deg,#e8edf3 1px,transparent 1px);background-size:48px 48px;mask-image:linear-gradient(to bottom,black,transparent)"></div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-teal/10 text-teal border border-teal/20 text-xs font-bold mb-5 uppercase tracking-wider">
                {{ $pageEyebrow ?? ($site->name . ' Insights & Analysis') }}
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-sans font-extrabold leading-[1.05] tracking-tight text-teal-deep mb-5">
                {{ $pageHeading ?? ('Blog ' . $site->name) }}
            </h1>
            <p class="text-lg md:text-xl text-gray-500 leading-relaxed font-medium">
                {{ $pageSubtitle ?? 'Wawasan, analisis, dan panduan praktis seputar perdagangan, maritim, dan konstruksi.' }}
            </p>
            @if(isset($pageEyebrow))
            <a href="{{ url('/blog') }}" class="inline-flex items-center gap-1.5 mt-5 text-sm text-teal hover:text-teal-dark transition-colors font-bold">
                ← Kembali ke semua artikel
            </a>
            @else
            {{-- Search Bar --}}
            <form method="GET" action="{{ url('/blog') }}" class="mt-8 flex max-w-lg gap-2">
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="q" value="{{ $search ?? '' }}"
                           placeholder="Cari artikel..."
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-200 hover:border-teal/40 focus:border-teal/60 focus:outline-none rounded-xl text-sm bg-white text-gray-800 placeholder-gray-400 transition-colors shadow-sm">
                </div>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-semibold text-white transition-colors shadow-sm" style="background:var(--color-teal,#1a7a6a)">
                    Cari
                </button>
            </form>
            @endif
        </div>
    </div>
</section>
@else
{{-- Hero default (teal/gold) --}}
<section class="bg-gradient-to-br from-teal-deep via-teal-dark to-ink text-white relative overflow-hidden border-b border-gold/10">
    <div class="absolute inset-0 opacity-15 pointer-events-none">
        <div class="absolute -top-32 -right-32 w-[500px] h-[500px] bg-gold rounded-full blur-[120px]"></div>
        <div class="absolute -bottom-32 -left-32 w-[400px] h-[400px] bg-teal rounded-full blur-[100px]"></div>
    </div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-teal-light/10 text-gold-light border border-teal-light/20 text-xs font-semibold mb-6 uppercase tracking-wider">
                🌟 {{ $pageEyebrow ?? ($site->name . ' Insights & Analysis') }}
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold leading-tight mb-5">
                {{ $pageHeading ?? ('Blog ' . $site->name) }}
            </h1>
            <p class="text-lg md:text-xl text-white/80 leading-relaxed font-medium">
                {{ $pageSubtitle ?? 'Temukan artikel, analisis mendalam, dan informasi terbaru seputar industri dan bisnis kami.' }}
            </p>
            @if(isset($pageEyebrow))
            <a href="{{ url('/blog') }}" class="inline-flex items-center gap-1.5 mt-5 text-sm text-gold-light hover:text-white transition-colors font-semibold">
                ← Kembali ke semua artikel
            </a>
            @else
            {{-- Search Bar --}}
            <form method="GET" action="{{ url('/blog') }}" class="mt-8 flex max-w-lg gap-2">
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="q" value="{{ $search ?? '' }}"
                           placeholder="Cari artikel..."
                           class="w-full pl-10 pr-4 py-2.5 rounded-xl text-sm placeholder-white/40 text-white focus:outline-none transition-colors"
                           style="background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2)">
                </div>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-colors" style="background:var(--color-gold,#c9a227);color:#111">
                    Cari
                </button>
            </form>
            @endif
        </div>
    </div>
</section>
@endif

{{-- Search & Filter Bar --}}
<section class="border-b border-teal/5 bg-teal-pale/30">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            {{-- Pillar Filter --}}
            <div class="flex flex-wrap gap-2.5">
                <a href="{{ url('/blog') }}"
                   class="px-4 py-2 rounded-full text-xs font-bold transition-all duration-200
                          {{ !$pillar ? 'bg-teal text-white shadow-md ring-1 ring-white/10' : 'bg-white text-teal-deep hover:bg-teal-pale hover:text-teal border border-teal/10' }}">
                    Semua
                </a>
                @foreach($pillarCounts as $key => $count)
                <a href="{{ url('/blog/category/' . $key) }}"
                   class="px-4 py-2 rounded-full text-xs font-bold transition-all duration-200
                          {{ $pillar === $key ? 'bg-teal text-white shadow-md ring-1 ring-white/10' : 'bg-white text-teal-deep hover:bg-teal-pale hover:text-teal border border-teal/10' }}">
                    {{ $site->content_pillars[$key] ?? ucfirst(str_replace('-',' ',$key)) }}
                    <span class="ml-1 opacity-60 font-semibold">({{ $count }})</span>
                </a>
                @endforeach
            </div>

            {{-- Result Count --}}
            <p class="text-sm text-gray-500 shrink-0">
                {{ $articles->total() }} artikel
                @if($search)
                    untuk "{{ $search }}"
                @endif
            </p>
        </div>
    </div>
</section>

{{-- Content + Sidebar Layout --}}
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
  <div class="flex flex-col lg:flex-row gap-8 lg:gap-10">
    {{-- Main column --}}
    <div class="flex-1 min-w-0">
    @if($articles->count() > 0)
        @php $skipFirst = false; @endphp
        {{-- GMA: Featured post besar di halaman utama (page 1, tanpa filter/search) --}}
        @if($isGma && !$pillar && !$search && ($articles->currentPage() == 1))
            @php $feat = $articles->first(); $skipFirst = true; @endphp
            <a href="{{ url('/blog/' . $feat->slug) }}" class="group block mb-8 rounded-2xl overflow-hidden border border-gray-200 hover:border-teal/30 hover:shadow-xl hover:shadow-teal/5 transition-all duration-300">
                <div class="overflow-hidden bg-teal-pale/40 relative" style="aspect-ratio:16/8">
                    @if($feat->featured_image_url)
                    <img src="{{ $feat->featured_image_url }}" alt="{{ $feat->image_alt_texts[0] ?? $feat->title }}" loading="eager" class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-500">
                    @endif
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-bold bg-teal text-white shadow">Featured</span>
                    @if($feat->pillar)
                    <span class="absolute top-4 left-[6.5rem] px-3 py-1 rounded-full text-xs font-bold bg-white/95 text-teal-deep shadow">{{ ucwords(str_replace('-',' ',$feat->pillar)) }}</span>
                    @endif
                </div>
                <div class="p-6">
                    <h2 class="text-2xl md:text-3xl font-extrabold font-sans tracking-tight text-teal-deep group-hover:text-teal transition-colors mb-2 leading-snug">{{ $feat->title }}</h2>
                    <p class="text-gray-500 leading-relaxed mb-3 line-clamp-2">{{ $feat->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($feat->content_html), 160) }}</p>
                    <div class="flex items-center gap-4 text-xs text-gray-400">
                        <span>{{ $feat->published_at?->isoFormat('D MMMM YYYY') }}</span>
                        @if($feat->estimated_read_time)<span>· {{ $feat->estimated_read_time }} menit baca</span>@endif
                    </div>
                </div>
            </a>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 md:gap-6">
            @foreach($articles as $index => $article)
                @if($skipFirst && $loop->first) @continue @endif
                <x-article-card :article="$article" />

                {{-- In-Feed Ad every 4 articles --}}
                @if(($index + 1) % 4 === 0 && $site->getAdsensePublisher() && $site->getAdSlot('in_feed') && !$loop->last)
                <div class="flex justify-center py-2" style="grid-column:1/-1">
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-format="fluid"
                         data-ad-layout-key="-6t+ed+2i-1n-4w"
                         data-ad-client="{{ $site->getAdsensePublisher() }}"
                         data-ad-slot="{{ $site->getAdSlot('in_feed') }}"></ins>
                    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                </div>
                @endif
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    @else
        {{-- Empty State --}}
        <div class="text-center py-20">
            @if($search)
                {{-- Search not found --}}
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-2xl flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak Ditemukan</h3>
                <p class="text-gray-500 max-w-md mx-auto mb-6">
                    Tidak ditemukan artikel untuk pencarian "{{ $search }}". Coba gunakan kata kunci yang berbeda.
                </p>
                <a href="{{ url('/blog') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition-colors shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Lihat Semua Artikel
                </a>
            @else
                {{-- No articles yet --}}
                <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl flex items-center justify-center">
                    <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Artikel</h3>
                <p class="text-gray-500 max-w-md mx-auto">
                    Konten artikel sedang dipersiapkan. Pantau terus blog ini untuk artikel menarik dan informatif seputar {{ $site->name }}.
                </p>
            @endif
        </div>
    @endif
    </div>{{-- /main column --}}

    {{-- Sidebar --}}
    <div class="shrink-0 w-full lg:w-80" x-data>
        <div class="lg:sticky lg:top-24">
            <x-blog-sidebar :site="$site" />
        </div>
    </div>
  </div>
</section>
@endsection
