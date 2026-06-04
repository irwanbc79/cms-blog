@props(['article', 'blogAssetPrefix' => '', 'showExcerpt' => true])

@php
    $pillarColors = [
        'komoditas-ekspor'     => ['bg' => 'rgba(21,128,61,0.85)',  'text' => '#fff'],
        'ekspor-perdagangan'   => ['bg' => 'rgba(234,88,12,0.85)',  'text' => '#fff'],
        'perdagangan-intl'     => ['bg' => 'rgba(2,132,199,0.85)',  'text' => '#fff'],
        'regulasi-impor'       => ['bg' => 'rgba(109,40,217,0.85)', 'text' => '#fff'],
        'undername-ppjk'       => ['bg' => 'rgba(161,98,7,0.85)',   'text' => '#fff'],
        'tips-bisnis'          => ['bg' => 'rgba(6,182,212,0.85)',  'text' => '#fff'],
        'agribisnis'           => ['bg' => 'rgba(101,163,13,0.85)', 'text' => '#fff'],
        'industri-maritim'     => ['bg' => 'rgba(14,116,144,0.85)','text' => '#fff'],
        'logistik-pergudangan' => ['bg' => 'rgba(30,64,175,0.85)',  'text' => '#fff'],
        'konstruksi-properti'  => ['bg' => 'rgba(120,53,15,0.85)', 'text' => '#fff'],
        'kepabeanan-regulasi'  => ['bg' => 'rgba(126,34,206,0.85)','text' => '#fff'],
        'teknologi-inovasi'    => ['bg' => 'rgba(6,95,70,0.85)',   'text' => '#fff'],
        'perdagangan-tekstil'  => ['bg' => 'rgba(159,18,57,0.85)', 'text' => '#fff'],
        'ai-teknologi'         => ['bg' => 'rgba(67,56,202,0.85)', 'text' => '#fff'],
        'crm-sales'            => ['bg' => 'rgba(20,83,45,0.85)',  'text' => '#fff'],
        'erp-enterprise'       => ['bg' => 'rgba(146,64,14,0.85)', 'text' => '#fff'],
        'transformasi-digital' => ['bg' => 'rgba(3,105,161,0.85)', 'text' => '#fff'],
    ];
    $pillarLabel = $article->pillar
        ? (app(\App\Services\SiteResolver::class)->resolve()?->content_pillars[$article->pillar]
           ?? ucwords(str_replace('-', ' ', $article->pillar)))
        : null;
    $badgeBg   = $pillarColors[$article->pillar]['bg']   ?? 'rgba(0,0,0,0.65)';
    $badgeText = $pillarColors[$article->pillar]['text']  ?? '#fff';
@endphp

<article class="group flex flex-col bg-white rounded-2xl overflow-hidden
                border border-gray-100 hover:border-teal/20
                hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-teal/10
                transition-all duration-300">

    {{-- Thumbnail --}}
    <a href="{{ url($blogAssetPrefix . '/blog/' . $article->slug) }}"
       class="block relative overflow-hidden shrink-0"
       style="aspect-ratio:16/9">

        @if($article->featured_image_url)
            <img src="{{ $article->featured_image_url }}"
                 alt="{{ $article->image_alt_texts[0] ?? $article->title }}"
                 loading="lazy" width="640" height="360"
                 class="w-full h-full object-cover group-hover:scale-[1.06] transition-transform duration-500">
            {{-- Gradient overlay bottom → reads better on dark images --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
        @else
            {{-- Stylish no-image fallback with pillar color + name --}}
            <div class="w-full h-full flex flex-col items-center justify-center gap-2"
                 style="background:linear-gradient(135deg,var(--color-teal-pale,#e6f4f1),var(--color-teal-pale,#e6f4f1) 60%,rgba(255,255,255,0.6))">
                <svg class="w-10 h-10 opacity-20" style="color:var(--color-teal,#1a7a6a)" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                @if($pillarLabel)
                <span class="text-xs font-semibold opacity-40" style="color:var(--color-teal-deep,#083d33)">{{ $pillarLabel }}</span>
                @endif
            </div>
        @endif

        {{-- Category badge top-left --}}
        @if($pillarLabel)
        <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[11px] font-bold shadow-sm"
              style="background:{{ $badgeBg }};color:{{ $badgeText }};backdrop-filter:blur(4px)">
            {{ $pillarLabel }}
        </span>
        @endif

        {{-- Read time top-right --}}
        @if($article->estimated_read_time)
        <span class="absolute top-3 right-3 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-black/50 text-white backdrop-blur-sm flex items-center gap-1">
            <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $article->estimated_read_time }} mnt
        </span>
        @endif
    </a>

    {{-- Body --}}
    <div class="flex flex-col flex-1 p-5">
        <h3 class="text-base font-bold leading-snug mb-2">
            <a href="{{ url($blogAssetPrefix . '/blog/' . $article->slug) }}"
               class="line-clamp-2 transition-colors"
               style="color:var(--color-teal-deep,#083d33)"
               onmouseover="this.style.color='var(--color-teal,#1a7a6a)'"
               onmouseout="this.style.color='var(--color-teal-deep,#083d33)'">
                {{ $article->title }}
            </a>
        </h3>

        @if($showExcerpt && ($article->excerpt || $article->content_html))
        <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2 flex-1">
            {{ $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content_html), 100) }}
        </p>
        @endif

        {{-- Meta footer --}}
        <div class="flex items-center justify-between text-xs text-gray-400 pt-3 border-t border-gray-50 mt-auto">
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $article->published_at?->isoFormat('D MMM YYYY') }}
            </span>
            <a href="{{ url($blogAssetPrefix . '/blog/' . $article->slug) }}"
               class="font-semibold text-[11px] flex items-center gap-0.5 transition-colors"
               style="color:var(--color-teal,#1a7a6a)">
                Baca
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</article>
