@props(['article', 'blogAssetPrefix' => '', 'showExcerpt' => true])

<article class="group flex flex-col bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-xl hover:shadow-teal/5 hover:border-teal/20 hover:-translate-y-1 transition-all duration-300">
    {{-- Thumbnail 16:9 --}}
    <a href="{{ url($blogAssetPrefix . '/blog/' . $article->slug) }}" class="block overflow-hidden bg-teal-pale/40 relative" style="aspect-ratio:16/9">
        @if($article->featured_image_url)
        <img src="{{ $article->featured_image_url }}"
             alt="{{ $article->image_alt_texts[0] ?? $article->title }}"
             loading="lazy" width="400" height="225"
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
             onerror="this.onerror=null;this.style.display='none';this.parentElement.classList.add('flex','items-center','justify-center');this.parentElement.insertAdjacentHTML('beforeend','<svg class=\'w-10 h-10 text-teal/30\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg>')">
        @else
        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-teal-pale to-white">
            <svg class="w-10 h-10 text-teal-light/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        @endif
        {{-- Pillar badge --}}
        @if($article->pillar)
        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[11px] font-bold bg-white/95 text-teal-deep backdrop-blur-sm shadow-sm">
            {{ ucwords(str_replace('-',' ',$article->pillar)) }}
        </span>
        @endif
    </a>

    <div class="flex flex-col flex-1 p-5">
        {{-- Title --}}
        <h3 class="text-base md:text-lg font-bold font-serif leading-snug mb-2">
            <a href="{{ url($blogAssetPrefix . '/blog/' . $article->slug) }}"
               class="text-teal-deep group-hover:text-teal transition-colors line-clamp-2">
                {{ $article->title }}
            </a>
        </h3>

        {{-- Excerpt --}}
        @if($showExcerpt && ($article->excerpt || $article->content_html))
        <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2">
            {{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content_html), 110) }}
        </p>
        @endif

        {{-- Meta --}}
        <div class="flex items-center justify-between text-xs text-gray-400 mt-auto pt-3 border-t border-gray-50">
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $article->published_at?->isoFormat('D MMM YYYY') }}
            </span>
            @if($article->estimated_read_time)
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ $article->estimated_read_time }} mnt
            </span>
            @endif
        </div>
    </div>
</article>
