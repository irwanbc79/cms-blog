@props(['site'])

@php
    use App\Models\Article;

    $sidebarRecent = Article::forSite($site->id)->published()
        ->latest('published_at')
        ->take(5)
        ->get(['id','title','slug','published_at','featured_image_url','image_alt_texts']);

    $sidebarPillars = Article::forSite($site->id)->published()
        ->selectRaw('pillar, count(*) as count')
        ->whereNotNull('pillar')
        ->groupBy('pillar')
        ->orderByDesc('count')
        ->pluck('count','pillar');

    // Tag cloud — aggregate JSON tags
    $tagCounts = [];
    foreach (Article::forSite($site->id)->published()->pluck('tags') as $t) {
        $arr = is_array($t) ? $t : (json_decode($t ?? '[]', true) ?: []);
        foreach ($arr as $tag) {
            $tag = trim($tag);
            if ($tag === '') continue;
            $tagCounts[$tag] = ($tagCounts[$tag] ?? 0) + 1;
        }
    }
    arsort($tagCounts);
    $tagCounts = array_slice($tagCounts, 0, 18, true);

    // Monthly archive
    $sidebarArchive = Article::forSite($site->id)->published()
        ->whereNotNull('published_at')
        ->get(['published_at'])
        ->groupBy(fn($a) => $a->published_at->format('Y-m'))
        ->map->count();

    $pillarLabels = $site->content_pillars ?? [];
@endphp

<aside class="space-y-8">

    {{-- Artikel Terbaru --}}
    @if($sidebarRecent->count() > 0)
    <div class="bg-white rounded-2xl border border-teal/10 p-5 shadow-sm">
        <h3 class="text-sm font-bold font-serif text-teal-deep uppercase tracking-wider mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            Artikel Terbaru
        </h3>
        <div class="space-y-4">
            @foreach($sidebarRecent as $r)
            <a href="{{ url('/blog/' . $r->slug) }}" class="group flex gap-3 items-start">
                <div class="rounded-lg overflow-hidden bg-teal-pale/40 shrink-0" style="width:56px;height:56px">
                    @if($r->featured_image_url)
                    <img src="{{ $r->featured_image_url }}" alt="{{ $r->image_alt_texts[0] ?? $r->title }}" loading="lazy" class="object-cover group-hover:scale-105 transition-transform duration-300" style="width:56px;height:56px">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-teal-light">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m4 0v10a2 2 0 01-2 2h-2m-4-3l3-3m0 0l3 3m-3-3v6"/></svg>
                    </div>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800 group-hover:text-teal transition-colors line-clamp-2 leading-snug">{{ $r->title }}</p>
                    <span class="text-xs text-gray-400">{{ $r->published_at?->isoFormat('D MMM YYYY') }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Kategori --}}
    @if($sidebarPillars->count() > 0)
    <div class="bg-white rounded-2xl border border-teal/10 p-5 shadow-sm">
        <h3 class="text-sm font-bold font-serif text-teal-deep uppercase tracking-wider mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            Kategori
        </h3>
        <ul class="space-y-1">
            @foreach($sidebarPillars as $key => $count)
            <li>
                <a href="{{ url('/blog/category/' . $key) }}" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-teal-pale/40 hover:text-teal transition-colors">
                    <span class="font-medium">{{ $pillarLabels[$key] ?? ucwords(str_replace('-',' ',$key)) }}</span>
                    <span class="text-xs bg-teal-pale text-teal-dark rounded-full px-2 py-0.5 font-bold">{{ $count }}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Tag Cloud --}}
    @if(count($tagCounts) > 0)
    <div class="bg-white rounded-2xl border border-teal/10 p-5 shadow-sm">
        <h3 class="text-sm font-bold font-serif text-teal-deep uppercase tracking-wider mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5a1.99 1.99 0 011.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"/></svg>
            Tag Populer
        </h3>
        <div class="flex flex-wrap gap-2">
            @foreach($tagCounts as $tag => $count)
            <a href="{{ url('/blog/tag/' . rawurlencode($tag)) }}" class="px-2.5 py-1 text-xs bg-teal-pale/50 text-teal-dark rounded-lg border border-teal/10 hover:bg-teal hover:text-white transition-colors">{{ $tag }}</a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Arsip --}}
    @if($sidebarArchive->count() > 0)
    <div class="bg-white rounded-2xl border border-teal/10 p-5 shadow-sm">
        <h3 class="text-sm font-bold font-serif text-teal-deep uppercase tracking-wider mb-4 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Arsip
        </h3>
        <ul class="space-y-1">
            @foreach($sidebarArchive as $ym => $count)
            @php
                [$y,$m] = explode('-', $ym);
                $label = \Carbon\Carbon::create($y,$m,1)->locale('id')->isoFormat('MMMM YYYY');
            @endphp
            <li>
                <a href="{{ url('/blog/arsip/' . $y . '/' . intval($m)) }}" class="flex items-center justify-between px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-teal-pale/40 hover:text-teal transition-colors">
                    <span class="font-medium">{{ $label }}</span>
                    <span class="text-xs text-gray-400">{{ $count }}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

</aside>
