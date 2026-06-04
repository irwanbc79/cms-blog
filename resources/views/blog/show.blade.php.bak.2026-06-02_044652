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
            <a href="{{ $crumb['url'] }}" itemprop="item" class="hover:text-teal transition-colors font-medium">
                <span itemprop="name">{{ $crumb['label'] }}</span>
            </a>
            @else
            <span itemprop="name" class="text-teal-deep font-semibold">{{ $crumb['label'] }}</span>
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
           class="px-3 py-1 rounded-full text-xs font-bold bg-teal-pale text-teal-dark hover:bg-teal-pale/80 border border-teal/10 transition-colors">
            {{ ucfirst($article->pillar) }}
        </a>
        @endif
        @if(!empty($article->tags))
            @foreach(array_slice($article->tags, 0, 3) as $tag)
            <span class="px-2.5 py-0.5 rounded-full text-xs bg-gray-50 text-gray-500 border border-gray-100 font-medium">{{ $tag }}</span>
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
    <div class="mb-8 rounded-2xl overflow-hidden bg-gray-50 shadow-sm">
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
                <nav class="space-y-1 mb-6">
                    @foreach($toc as $item)
                    <a href="#{{ $item['id'] }}"
                       class="block text-sm py-1.5 {{ $item['level'] == 3 ? 'pl-4' : 'pl-0' }} border-l-2 border-transparent hover:border-teal hover:text-teal transition-colors
                              {{ $loop->first ? 'font-bold text-teal border-teal' : 'text-gray-600' }}">
                        {{ $item['title'] }}
                    </a>
                    @endforeach
                </nav>

                {{-- Sticky Sidebar Ad --}}
                @if($site->getAdsensePublisher() && $site->getAdSlot('sidebar_sticky'))
                <div class="mt-8 pt-6 border-t border-gray-100 hidden lg:block">
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="{{ $site->getAdsensePublisher() }}"
                         data-ad-slot="{{ $site->getAdSlot('sidebar_sticky') }}"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                </div>
                @endif
            </div>
        </aside>
        @endif

        {{-- Article Content --}}
        <div class="flex-1 min-w-0">
            {{-- Content CSS with fixed blockquote --}}
            <div class="prose prose-lg prose-teal max-w-none
                        prose-headings:font-bold prose-headings:font-serif prose-headings:text-teal-deep
                        prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4 prose-h2:scroll-mt-24
                        prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3 prose-h3:scroll-mt-24
                        prose-p:leading-relaxed prose-p:text-gray-700
                        prose-a:text-teal prose-a:font-semibold prose-a:no-underline hover:prose-a:text-teal-dark hover:prose-a:underline
                        prose-img:rounded-xl prose-img:shadow-md
                        prose-blockquote:border-l-4 prose-blockquote:border-l-gold prose-blockquote:bg-teal-pale/40 prose-blockquote:py-3 prose-blockquote:px-5 prose-blockquote:rounded-r-lg prose-blockquote:not-italic prose-blockquote:text-teal-dark prose-blockquote:my-6
                        prose-ul:space-y-2 prose-li:text-gray-700
                        prose-strong:text-gray-900
                        prose-code:text-sm prose-code:bg-teal-pale prose-code:text-teal-dark prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded
                        prose-pre:bg-teal-deep prose-pre:text-white/95 prose-pre:rounded-xl">
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
                    <span class="px-3 py-1.5 bg-teal-pale text-teal-dark text-xs font-bold rounded-lg hover:bg-teal/10 transition-colors cursor-default border border-teal/5">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Below Article Display Ad --}}
            @if($site->getAdsensePublisher() && $site->getAdSlot('display_bottom'))
            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-center">
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="{{ $site->getAdsensePublisher() }}"
                     data-ad-slot="{{ $site->getAdSlot('display_bottom') }}"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
            </div>
            @endif

            {{-- Comments Section --}}
            <section class="mt-12 pt-8 border-t border-gray-100">
                <h3 class="text-2xl font-serif font-bold text-teal-deep mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6 text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                    Komentar ({{ $article->approvedComments->count() }})
                </h3>

                {{-- Alert Flash Success --}}
                @if(session('comment_success'))
                <div class="mb-6 p-4 bg-teal-pale text-teal-dark border border-teal/20 rounded-xl text-sm font-medium flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ session('comment_success') }}
                </div>
                @endif

                {{-- Comments List --}}
                @if($article->approvedComments->count() > 0)
                <div class="space-y-6 mb-10">
                    @foreach($article->approvedComments as $comment)
                    <div class="flex gap-4 p-5 bg-teal-pale/10 rounded-2xl border border-teal/5">
                        <div class="w-10 h-10 rounded-full bg-teal text-white font-bold flex items-center justify-center shrink-0">
                            {{ strtoupper(substr($comment->name, 0, 1)) }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <span class="font-bold text-teal-deep text-sm">{{ $comment->name }}</span>
                                <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-700 text-sm leading-relaxed whitespace-pre-line">{{ $comment->content }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 text-sm mb-8 italic">Belum ada komentar. Jadilah yang pertama memberikan tanggapan!</p>
                @endif

                {{-- Comment Form --}}
                <div class="bg-teal-pale/5 rounded-2xl p-6 border border-teal/5">
                    <h4 class="text-lg font-serif font-bold text-teal-deep mb-4">Tulis Komentar</h4>
                    <form action="{{ url('/blog/' . $article->slug . '/comments') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="comment-name" class="block text-xs font-bold text-teal-deep uppercase mb-1.5">Nama Anda</label>
                                <input type="text" id="comment-name" name="name" required placeholder="Nama Lengkap"
                                       class="w-full px-4 py-2.5 bg-white border border-teal/10 rounded-xl text-sm focus:outline-none focus:border-teal transition-colors">
                            </div>
                            <div>
                                <label for="comment-email" class="block text-xs font-bold text-teal-deep uppercase mb-1.5">Email (Tidak dipublikasikan)</label>
                                <input type="email" id="comment-email" name="email" required placeholder="Alamat Email"
                                       class="w-full px-4 py-2.5 bg-white border border-teal/10 rounded-xl text-sm focus:outline-none focus:border-teal transition-colors">
                            </div>
                        </div>
                        <div>
                            <label for="comment-content" class="block text-xs font-bold text-teal-deep uppercase mb-1.5">Isi Komentar</label>
                            <textarea id="comment-content" name="content" rows="4" required placeholder="Tulis tanggapan atau pertanyaan Anda di sini..."
                                      class="w-full px-4 py-2.5 bg-white border border-teal/10 rounded-xl text-sm focus:outline-none focus:border-teal transition-colors"></textarea>
                        </div>
                        <button type="submit" class="px-5 py-2.5 bg-teal hover:bg-teal-light text-white text-xs font-bold rounded-full transition-all shadow-md flex items-center gap-1.5 uppercase tracking-wider cursor-pointer">
                            Kirim Komentar
                        </button>
                    </form>
                </div>
            </section>
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
    <section class="mt-12 pt-8 border-t border-teal/10">
        <h2 class="text-2xl font-serif font-bold text-teal-deep mb-6">Pertanyaan Umum (FAQ)</h2>
        <div class="space-y-4" x-data="{ openFaq: null }">
            @foreach($article->schema_faq as $index => $faq)
            <div class="border border-teal/10 rounded-xl overflow-hidden bg-white">
                <button @click="openFaq = openFaq === {{ $index }} ? null : {{ $index }}"
                        class="w-full flex items-center justify-between px-5 py-4 text-left font-bold text-teal-deep hover:bg-teal-pale/30 transition-colors">
                    <span>{{ $faq['question'] ?? $faq['q'] ?? '' }}</span>
                    <svg class="w-5 h-5 text-teal shrink-0 ml-4 transition-transform duration-200"
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
    <nav class="mt-12 pt-8 border-t border-teal/10 grid grid-cols-1 md:grid-cols-2 gap-6">
        @if($prevArticle)
        <a href="{{ url('/blog/' . $prevArticle->slug) }}"
           class="group p-5 rounded-2xl border border-teal/10 hover:border-teal/20 hover:bg-teal-pale/20 transition-all">
            <span class="text-xs text-teal/65 font-bold uppercase tracking-wider">← Artikel Sebelumnya</span>
            <p class="mt-1 font-bold text-teal-deep group-hover:text-teal transition-colors font-serif">{{ $prevArticle->title }}</p>
        </a>
        @else
        <div></div>
        @endif
        @if($nextArticle)
        <a href="{{ url('/blog/' . $nextArticle->slug) }}"
           class="group p-5 rounded-2xl border border-teal/10 hover:border-teal/20 hover:bg-teal-pale/20 transition-all text-right md:col-start-2">
            <span class="text-xs text-teal/65 font-bold uppercase tracking-wider">Artikel Selanjutnya →</span>
            <p class="mt-1 font-bold text-teal-deep group-hover:text-teal transition-colors font-serif">{{ $nextArticle->title }}</p>
        </a>
        @endif
    </nav>
</article>

{{-- Related Articles --}}
{{-- Comments Section --}}
<section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 mt-4">

    {{-- Success flash message --}}
    @if(session('comment_success'))
    <div class="mb-8 p-4 bg-teal-pale border border-teal/20 rounded-2xl flex items-start gap-3">
        <svg class="w-5 h-5 text-teal shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <p class="text-sm text-teal-dark font-medium">{{ session('comment_success') }}</p>
    </div>
    @endif

    {{-- Comments Count + List --}}
    @php $approvedComments = $article->approvedComments; @endphp
    @if($approvedComments->count() > 0)
    <div class="mb-10">
        <h2 class="text-2xl font-bold font-serif text-teal-deep mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
            </svg>
            {{ $approvedComments->count() }} Komentar
        </h2>
        <div class="space-y-5">
            @foreach($approvedComments as $comment)
            <div class="bg-white border border-teal/10 rounded-2xl p-5 shadow-sm hover:border-teal/20 transition-colors">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-teal to-teal-dark flex items-center justify-center text-white font-bold text-sm shrink-0">
                        {{ strtoupper(substr($comment->name, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-bold text-teal-deep text-sm">{{ e($comment->name) }}</p>
                        <p class="text-xs text-gray-400">{{ $comment->created_at->isoFormat('D MMM YYYY, HH:mm') }}</p>
                    </div>
                </div>
                <p class="text-gray-700 text-sm leading-relaxed">{{ e($comment->content) }}</p>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Comment Form --}}
    <div class="bg-white border border-teal/10 rounded-3xl p-6 md:p-8 shadow-sm">
        <h2 class="text-xl font-bold font-serif text-teal-deep mb-1 flex items-center gap-2">
            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Tinggalkan Komentar
        </h2>
        <p class="text-xs text-gray-400 mb-6">Komentar Anda akan ditampilkan setelah disetujui admin.</p>

        <form action="{{ route('blog.comments.store', $article->slug) }}" method="POST" class="space-y-4" id="comment-form">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="comment-name" class="block text-xs font-bold text-teal-deep mb-1.5 uppercase tracking-wider">Nama *</label>
                    <input type="text" id="comment-name" name="name" required
                           value="{{ old('name') }}"
                           class="w-full px-4 py-3 rounded-xl border border-teal/15 bg-teal-pale/20 text-gray-800 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal/30 focus:border-teal/40 transition-all"
                           placeholder="Nama lengkap Anda">
                    @error('name')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="comment-email" class="block text-xs font-bold text-teal-deep mb-1.5 uppercase tracking-wider">Email *</label>
                    <input type="email" id="comment-email" name="email" required
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 rounded-xl border border-teal/15 bg-teal-pale/20 text-gray-800 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal/30 focus:border-teal/40 transition-all"
                           placeholder="email@contoh.com">
                    @error('email')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label for="comment-content" class="block text-xs font-bold text-teal-deep mb-1.5 uppercase tracking-wider">Komentar *</label>
                <textarea id="comment-content" name="content" rows="4" required
                          class="w-full px-4 py-3 rounded-xl border border-teal/15 bg-teal-pale/20 text-gray-800 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-teal/30 focus:border-teal/40 transition-all resize-none"
                          placeholder="Tuliskan komentar atau pertanyaan Anda...">{{ old('content') }}</textarea>
                @error('content')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>
            <div class="flex items-center justify-between pt-2">
                <p class="text-xs text-gray-400">* Kolom wajib diisi</p>
                <button type="submit"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-teal to-teal-dark text-white font-bold text-sm rounded-full shadow-md hover:shadow-lg hover:from-teal-dark hover:to-teal-deep transition-all duration-300 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    Kirim Komentar
                </button>
            </div>
        </form>
    </div>
</section>

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
