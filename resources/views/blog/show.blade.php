@extends('blog.layouts.blog', ['site' => $site, 'seo' => $seo])

@section('title', $seo['title'])
@section('description', $seo['description'])
@section('og_type', 'article')
@section('og_title', $seo['title'])

@push('head')
@if($article->schema_faq && count($article->schema_faq) > 0)
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "FAQPage",
    "mainEntity": [
        @foreach($article->schema_faq as $index => $faq)
        {
            "@@type": "Question",
            "name": {{ json_encode($faq['question'] ?? $faq['q'] ?? '') }},
            "acceptedAnswer": {
                "@@type": "Answer",
                "text": {{ json_encode($faq['answer'] ?? $faq['a'] ?? '') }}
            }
        }{{ !$loop->last ? ',' : '' }}
        @endforeach
    ]
}
</script>
@endif
@endpush

@push('schema')
{{-- BreadcrumbList Schema --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@@type": "ListItem",
            "position": 1,
            "name": "Blog",
            "item": "{{ url('/blog') }}"
        }
        @if($breadcrumbs[1]['url'])
        ,{
            "@@type": "ListItem",
            "position": 2,
            "name": "{{ $breadcrumbs[1]['label'] }}",
            "item": "{{ $breadcrumbs[1]['url'] }}"
        }
        @endif
        ,{
            "@@type": "ListItem",
            "position": {{ $breadcrumbs[1]['url'] ? 3 : 2 }},
            "name": "{{ $article->title }}",
            "item": "{{ url('/blog/' . $article->slug) }}"
        }
    ]
}
</script>

{{-- Article Schema --}}
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Article",
    "headline": {{ json_encode($article->title) }},
    "description": {{ json_encode($seo['description']) }},
    @if($article->featured_image_url)
    "image": "{{ $article->featured_image_url }}",
    @endif
    "author": {
        "@@type": "Organization",
        "name": {{ json_encode($seo['author'] ?? $site->name) }}
    },
    "publisher": {
        "@@type": "Organization",
        "name": {{ json_encode($site->name) }}
        @if($site->logo_url)
        ,"logo": {
            "@@type": "ImageObject",
            "url": "{{ $site->logo_url }}"
        }
        @endif
    },
    "datePublished": "{{ $seo['published_time'] }}",
    "dateModified": "{{ $seo['modified_time'] }}",
    "mainEntityOfPage": {
        "@@type": "WebPage",
        "@@id": "{{ url('/blog/' . $article->slug) }}"
    }
    @if(!empty($article->tags))
    ,"keywords": {{ json_encode(is_array($article->tags) ? implode(', ', $article->tags) : $article->tags) }}
    @endif
    @if($article->word_count)
    ,"wordCount": "{{ $article->word_count }}"
    @endif
}
</script>
@endpush

@section('content')
{{-- Breadcrumbs --}}
<nav class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-2" aria-label="Breadcrumb">
    <ol class="flex items-center gap-2 text-sm text-gray-500" itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach($breadcrumbs as $index => $crumb)
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="flex items-center gap-2">
            @if($index > 0)
            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            @endif
            @if($crumb['url'])
            <a href="{{ $crumb['url'] }}" itemprop="item" class="hover:text-blue-600 transition-colors">
                <span itemprop="name">{{ $crumb['label'] }}</span>
            </a>
            @else
            <span itemprop="name" class="text-gray-900 font-medium">{{ $crumb['label'] }}</span>
            @endif
            <meta itemprop="position" content="{{ $index + 1 }}">
        </li>
        @endforeach
    </ol>
</nav>

{{-- Display Ad — Above Article --}}
@if($site->getAdsensePublisher() && $site->getAdSlot('display_top'))
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="{{ $site->getAdsensePublisher() }}"
         data-ad-slot="{{ $site->getAdSlot('display_top') }}"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>
@endif

{{-- Article Header --}}
<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    {{-- Pillar & Tags --}}
    <div class="flex flex-wrap items-center gap-3 mb-4">
        @if($article->pillar)
        <a href="{{ url('/blog?pillar=' . $article->pillar) }}"
           class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors">
            {{ ucfirst($article->pillar) }}
        </a>
        @endif
        @if(!empty($article->tags))
            @foreach(array_slice($article->tags, 0, 3) as $tag)
            <span class="px-2.5 py-0.5 rounded-full text-xs bg-gray-100 text-gray-600">{{ $tag }}</span>
            @endforeach
        @endif
    </div>

    {{-- Title --}}
    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
        {{ $article->title }}
    </h1>

    {{-- Meta Info --}}
    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-6 pb-6 border-b border-gray-100">
        <span class="flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            {{ $article->published_at?->isoFormat('dddd, D MMMM YYYY') }}
        </span>
        @if($article->estimated_read_time)
        <span class="flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $article->estimated_read_time }} min read
        </span>
        @endif
        @if($article->word_count)
        <span class="flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            {{ number_format($article->word_count) }} kata
        </span>
        @endif
    </div>

    {{-- Featured Image --}}
    @if($article->featured_image_url)
    <div class="mb-8 rounded-2xl overflow-hidden bg-gray-50">
        <img src="{{ $article->featured_image_url }}"
             alt="{{ $article->image_alt_texts[0] ?? $article->title }}"
             class="w-full h-auto object-cover"
             loading="eager"
             width="1200"
             height="675"
             onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'flex items-center justify-center h-64 bg-gray-100\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
    </div>
    @endif

    {{-- Two Column Layout: TOC + Content --}}
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
        {{-- Sidebar: Table of Contents (sticky) --}}
        @if(count($toc) > 0)
        <aside class="lg:w-64 shrink-0">
            <div class="lg:sticky lg:top-24">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-3">Daftar Isi</h4>
                <nav class="space-y-1">
                    @foreach($toc as $item)
                    <a href="#{{ $item['id'] }}"
                       class="block text-sm py-1.5 {{ $item['level'] == 3 ? 'pl-4' : 'pl-0' }} border-l-2 border-transparent hover:border-blue-500 hover:text-blue-600 transition-colors
                              {{ $loop->first ? 'font-medium text-gray-900 border-blue-500' : 'text-gray-600' }}">
                        {{ $item['title'] }}
                    </a>
                    @endforeach
                </nav>
            </div>
        </aside>
        @endif

        {{-- Article Content --}}
        <div class="flex-1 min-w-0">
            {{-- Content CSS --}}
            <div class="prose prose-lg prose-blue max-w-none
                        prose-headings:font-bold prose-headings:text-gray-900
                        prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4 prose-h2:scroll-mt-24
                        prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3 prose-h3:scroll-mt-24
                        prose-p:leading-relaxed prose-p:text-gray-700
                        prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                        prose-img:rounded-xl prose-img:shadow-md
                        prose-blockquote:border-l-blue-500 prose-blockquote:bg-blue-50 prose-blockquote:py-3 prose-blockquote:px-5 prose-blockquote:rounded-r-lg prose-blockquote:border-l-4 prose-blockquote:my-6
                        prose-ul:space-y-2 prose-li:text-gray-700
                        prose-strong:text-gray-900
                        prose-code:text-sm prose-code:bg-gray-100 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded
                        prose-pre:bg-gray-900 prose-pre:text-gray-100 prose-pre:rounded-xl">
                {!! $article->content_html !!}
            </div>

            {{-- In-Article Ad (after content) --}}
            @if($site->getAdsensePublisher() && $site->getAdSlot('in_article'))
            <div class="my-10 p-6 bg-gray-50 rounded-2xl text-center text-sm text-gray-400 border border-gray-100">
                <ins class="adsbygoogle"
                     style="display:block; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-client="{{ $site->getAdsensePublisher() }}"
                     data-ad-slot="{{ $site->getAdSlot('in_article') }}"></ins>
                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
            </div>
            @endif

            {{-- Tags Section --}}
            @if(!empty($article->tags))
            <div class="mt-8 pt-6 border-t border-gray-100">
                <h4 class="text-sm font-semibold text-gray-500 mb-3">Tags:</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($article->tags as $tag)
                    <span class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-lg hover:bg-gray-200 transition-colors cursor-default">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- Multiplex Ad — Before FAQ --}}
    @if($site->getAdsensePublisher() && $site->getAdSlot('multiplex'))
    <div class="mt-12 pt-8">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-format="autorelaxed"
             data-ad-client="{{ $site->getAdsensePublisher() }}"
             data-ad-slot="{{ $site->getAdSlot('multiplex') }}"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
    @endif

    {{-- FAQ Section --}}
    @if($article->schema_faq && count($article->schema_faq) > 0)
    <section class="mt-12 pt-8 border-t border-gray-100">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Pertanyaan Umum (FAQ)</h2>
        <div class="space-y-4" x-data="{ openFaq: null }">
            @foreach($article->schema_faq as $index => $faq)
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button @click="openFaq = openFaq === {{ $index }} ? null : {{ $index }}"
                        class="w-full flex items-center justify-between px-5 py-4 text-left font-medium text-gray-900 hover:bg-gray-50 transition-colors">
                    <span>{{ $faq['question'] ?? $faq['q'] ?? '' }}</span>
                    <svg class="w-5 h-5 text-gray-400 shrink-0 ml-4 transition-transform duration-200"
                         :class="openFaq === {{ $index }} ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === {{ $index }}"
                     x-transition:enter="transition-all duration-300 ease-out"
                     x-transition:enter-start="opacity-0 max-h-0"
                     x-transition:enter-end="opacity-100 max-h-96"
                     x-transition:leave="transition-all duration-200 ease-in"
                     x-transition:leave-start="opacity-100 max-h-96"
                     x-transition:leave-end="opacity-0 max-h-0"
                     class="px-5 pb-4 text-gray-600 leading-relaxed overflow-hidden">
                    {{ $faq['answer'] ?? $faq['a'] ?? '' }}
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.9/dist/cdn.min.js"></script>
    @endif

    {{-- Previous / Next Navigation --}}
    <nav class="mt-12 pt-8 border-t border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-6">
        @if($prevArticle)
        <a href="{{ url('/blog/' . $prevArticle->slug) }}"
           class="group p-4 rounded-xl border border-gray-200 hover:border-blue-200 hover:bg-blue-50/50 transition-all">
            <span class="text-xs text-gray-400 font-medium uppercase tracking-wider">← Artikel Sebelumnya</span>
            <p class="mt-1 font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $prevArticle->title }}</p>
        </a>
        @else
        <div></div>
        @endif
        @if($nextArticle)
        <a href="{{ url('/blog/' . $nextArticle->slug) }}"
           class="group p-4 rounded-xl border border-gray-200 hover:border-blue-200 hover:bg-blue-50/50 transition-all text-right md:col-start-2">
            <span class="text-xs text-gray-400 font-medium uppercase tracking-wider">Artikel Selanjutnya →</span>
            <p class="mt-1 font-semibold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $nextArticle->title }}</p>
        </a>
        @endif
    </nav>
</article>

{{-- Related Articles --}}
@if($relatedArticles->count() > 0)
<section class="bg-gray-50 mt-12 py-12 md:py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">Artikel Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedArticles as $index => $related)
                <x-article-card :article="$related" />

                {{-- In-Feed Ad after 2nd related article --}}
                @if($index === 1 && $site->getAdsensePublisher() && $site->getAdSlot('in_feed'))
                <div class="flex items-center justify-center bg-white rounded-2xl border border-gray-100 p-4">
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
    </div>
</section>
@endif
@endsection
