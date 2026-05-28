@props(['article', 'blogAssetPrefix' => '', 'showExcerpt' => true])

<article class="group flex flex-col bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg hover:border-gray-200 transition-all duration-300">
    {{-- Featured Image --}}
    <a href="{{ url($blogAssetPrefix . '/blog/' . $article->slug) }}" class="block aspect-[16/9] overflow-hidden bg-gray-100">
        @if($article->featured_image_url)
        <img src="{{ $article->featured_image_url }}"
             alt="{{ $article->image_alt_texts[0] ?? $article->title }}"
             loading="lazy"
             width="400"
             height="225"
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
             onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-10 h-10 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
        @else
        <div class="w-full h-full flex items-center justify-center">
            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        @endif
    </a>

    <div class="flex flex-col flex-1 p-5">
        {{-- Pillar Badge --}}
        @if($article->pillar)
        <a href="{{ url($blogAssetPrefix . '/blog?pillar=' . $article->pillar) }}"
           class="inline-block self-start px-2.5 py-0.5 rounded-full text-xs font-semibold
                  bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors mb-3">
            {{ ucfirst($article->pillar) }}
        </a>
        @endif

        {{-- Title --}}
        <h3 class="text-lg font-bold leading-snug mb-2 flex-1">
            <a href="{{ url($blogAssetPrefix . '/blog/' . $article->slug) }}"
               class="text-gray-900 hover:text-blue-600 transition-colors">
                {{ $article->title }}
            </a>
        </h3>

        {{-- Excerpt --}}
        @if($showExcerpt && ($article->excerpt || $article->content_html))
        <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2">
            {{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content_html), 120) }}
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
