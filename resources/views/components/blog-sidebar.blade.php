@props(['site'])

@php
    use App\Models\Article;

    $sidebarRecent = Article::forSite($site->id)->published()
        ->latest('published_at')
        ->take(5)
        ->get(['id','title','slug','published_at','estimated_read_time']);

    $sidebarPillars = Article::forSite($site->id)->published()
        ->selectRaw('pillar, count(*) as count')
        ->whereNotNull('pillar')
        ->groupBy('pillar')
        ->orderByDesc('count')
        ->pluck('count','pillar');

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
    $tagCounts = array_slice($tagCounts, 0, 10, true);

    $pillarLabels = $site->content_pillars ?? [];
    $waNumber = preg_replace('/[^0-9]/', '', $site->whatsapp_number ?? '+6281263027818');
    $waUrl = "https://wa.me/{$waNumber}?text=" . urlencode("Halo {$site->name}, saya ingin konsultasi...");
@endphp

<aside class="space-y-6">

    {{-- Artikel Terbaru — numbered style --}}
    @if($sidebarRecent->count() > 0)
    <div class="bg-white rounded-2xl border border-teal/10 p-5 shadow-sm">
        <h3 class="text-sm font-bold font-serif text-teal-deep uppercase tracking-wider mb-5 flex items-center gap-2">
            <svg class="w-4 h-4 text-gold flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            Artikel Terbaru
        </h3>
        <div class="space-y-4">
            @foreach($sidebarRecent as $i => $r)
            <a href="{{ url('/blog/' . $r->slug) }}" class="group flex gap-3 items-start">
                <span class="text-2xl font-black leading-none mt-0.5 flex-shrink-0 w-7 transition-colors"
                      style="color:var(--color-teal-pale,#e6f4f1);line-height:1"
                      onmouseover="this.style.color='var(--color-teal,#1a7a6a)'"
                      onmouseout="this.style.color='var(--color-teal-pale,#e6f4f1)'">{{ $i + 1 }}</span>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800 group-hover:text-teal transition-colors line-clamp-2 leading-snug" style="--tw-text-opacity:1">{{ $r->title }}</p>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-xs text-gray-400">{{ $r->published_at?->isoFormat('D MMM YYYY') }}</span>
                        @if($r->estimated_read_time)
                        <span class="text-xs text-gray-300">·</span>
                        <span class="text-xs text-gray-400">{{ $r->estimated_read_time }} mnt</span>
                        @endif
                    </div>
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
            <svg class="w-4 h-4 text-gold flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
            Kategori
        </h3>
        <ul class="space-y-0.5">
            @foreach($sidebarPillars as $key => $count)
            <li>
                <a href="{{ url('/blog/category/' . $key) }}"
                   class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm text-gray-700 hover:bg-teal-pale/40 hover:text-teal transition-colors group">
                    <span class="font-medium group-hover:translate-x-0.5 transition-transform">
                        {{ $pillarLabels[$key] ?? ucwords(str_replace('-',' ',$key)) }}
                    </span>
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
            <svg class="w-4 h-4 text-gold flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5a1.99 1.99 0 011.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Tag Populer
        </h3>
        <div class="flex flex-wrap gap-2">
            @foreach($tagCounts as $tag => $count)
            <a href="{{ url('/blog/tag/' . rawurlencode($tag)) }}"
               class="px-2.5 py-1 text-xs rounded-lg border transition-colors font-medium"
               style="background:var(--color-teal-pale,#e6f4f1);color:var(--color-teal-dark,#0d5546);border-color:rgba(0,0,0,0.06)"
               onmouseover="this.style.background='var(--color-teal,#1a7a6a)';this.style.color='#fff';this.style.borderColor='transparent'"
               onmouseout="this.style.background='var(--color-teal-pale,#e6f4f1)';this.style.color='var(--color-teal-dark,#0d5546)';this.style.borderColor='rgba(0,0,0,0.06)'">
                {{ $tag }}
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- CTA WhatsApp --}}
    <div class="rounded-2xl p-5 text-center" style="background:linear-gradient(135deg,var(--color-teal-pale,#e6f4f1),#fff);border:1px solid rgba(0,0,0,0.06)">
        <div class="w-11 h-11 rounded-xl flex items-center justify-center mx-auto mb-3" style="background:var(--color-teal,#1a7a6a)">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
        </div>
        <h4 class="font-bold text-sm mb-1.5" style="color:var(--color-teal-deep,#083d33)">Konsultasi Gratis</h4>
        <p class="text-xs text-gray-500 leading-relaxed mb-4">
            Ada pertanyaan seputar ekspor, impor, atau industri? Tim {{ $site->name }} siap membantu.
        </p>
        <a href="{{ $waUrl }}" target="_blank" rel="noopener"
           class="inline-flex items-center gap-2 w-full justify-center px-4 py-2.5 rounded-xl text-sm font-bold text-white transition-opacity hover:opacity-90"
           style="background:var(--color-teal,#1a7a6a)">
            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
            Chat WhatsApp
        </a>
    </div>

</aside>
