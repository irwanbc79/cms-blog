@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])
@section('og_type', 'website')

@section('content')
{{-- Hero Section --}}
<section class="bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white relative overflow-hidden">
    {{-- Decorative background pattern --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-blue-300 rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
                Blog {{ $site->name }}
            </h1>
            <p class="text-lg md:text-xl text-blue-100 leading-relaxed">
                Temukan artikel, wawasan, dan informasi terbaru seputar bisnis dan industri kami.
            </p>
        </div>
    </div>
</section>

{{-- Search & Filter Bar --}}
<section class="border-b border-gray-100 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            {{-- Pillar Filter --}}
            <div class="flex flex-wrap gap-2">
                <a href="{{ url('/blog') }}"
                   class="px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                          {{ !$pillar ? 'bg-blue-600 text-white shadow-sm' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
                    Semua
                </a>
                @foreach($pillarCounts as $key => $count)
                <a href="{{ url('/blog?pillar=' . $key) }}"
                   class="px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                          {{ $pillar === $key ? 'bg-blue-600 text-white shadow-sm' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
                    {{ ucfirst($key) }}
                    <span class="ml-1 text-xs opacity-60">({{ $count }})</span>
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

{{-- Article Grid --}}
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    @if($articles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($articles as $index => $article)
                <x-article-card :article="$article" />

                {{-- In-Feed Ad every 3 articles --}}
                @if(($index + 1) % 3 === 0 && $site->getAdsensePublisher() && $site->getAdSlot('in_feed') && !$loop->last)
                <div class="col-span-full flex justify-center py-2">
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
</section>
@endsection
