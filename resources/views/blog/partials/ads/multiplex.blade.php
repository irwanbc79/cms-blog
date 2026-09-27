@if(!empty($publisherId) && !empty($slot))
<div class="ad-container ad-multiplex {{ $class ?? 'mt-10' }}" style="min-height: 380px;">
    <div class="text-[10px] text-gray-400/80 uppercase tracking-widest text-center mb-1 font-mono">Rekomendasi Bersponsor</div>
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-format="autorelaxed"
         data-ad-client="{{ $publisherId }}"
         data-ad-slot="{{ $slot }}"
         @if(!empty($lazy)) data-ad-lazy="true" @endif></ins>
    @if(empty($lazy))
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    @endif
</div>
@endif
