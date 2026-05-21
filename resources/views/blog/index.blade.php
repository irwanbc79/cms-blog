@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])
@section('og_type', 'website')

@section('content')
{{-- Hero Section --}}
<section class="bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
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
                          {{ !$pillar ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
                    Semua
                </a>
                @foreach($pillarCounts as $key => $count)
                <a href="{{ url('/blog?pillar=' . $key) }}"
                   class="px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                          {{ $pillar === $key ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200' }}">
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
            @foreach($articles as $article)
            <article class="group flex flex-col bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg hover:border-gray-200 transition-all duration-300">
                {{-- Featured Image --}}
                @if($article->featured_image_url)
                <a href="{{ url('/blog/' . $article->slug) }}" class="block aspect-[16/9] overflow-hidden bg-gray-100">
                    <img src="{{ $article->featured_image_url }}"
                         alt="{{ $article->title }}"
                         loading="lazy"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </a>
                @endif

                <div class="flex flex-col flex-1 p-5">
                    {{-- Pillar Badge --}}
                    @if($article->pillar)
                    <a href="{{ url('/blog?pillar=' . $article->pillar) }}"
                       class="inline-block self-start px-2.5 py-0.5 rounded-full text-xs font-semibold
                              bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors mb-3">
                        {{ ucfirst($article->pillar) }}
                    </a>
                    @endif

                    {{-- Title --}}
                    <h2 class="text-lg font-bold leading-snug mb-2 flex-1">
                        <a href="{{ url('/blog/' . $article->slug) }}"
                           class="text-gray-900 hover:text-blue-600 transition-colors">
                            {{ $article->title }}
                        </a>
                    </h2>

                    {{-- Excerpt --}}
                    @if($article->excerpt)
                    <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2">
                        {{ $article->excerpt }}
                    </p>
                    @endif

                    {{-- Meta --}}
                    <div class="flex items-center justify-between text-xs text-gray-400 mt-auto pt-3 border-t border-gray-50">
                        <span>{{ $article->published_at?->isoFormat('D MMM YYYY') }}</span>
                        @if($article->estimated_read_time)
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $article->estimated_read_time }} min read
                        </span>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $articles->links() }}
        </div>
    @else
        {{-- Empty State --}}
        <div class="text-center py-20">
            <div class="w-20 h-20 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Artikel</h3>
            <p class="text-gray-500 max-w-md mx-auto">
                @if($search)
                    Tidak ditemukan artikel untuk "{{ $search }}". Coba kata kunci lain.
                @else
                    Belum ada artikel yang dipublikasikan. Pantau terus untuk konten terbaru!
                @endif
            </p>
        </div>
    @endif
</section>
@endsection
