@if(!empty($publisherId) && !empty($slot))
<div class="ad-container ad-in-article {{ $class ?? 'my-8' }}" style="min-height: 250px;">
    <div class="text-[10px] text-gray-400/80 uppercase tracking-widest text-center mb-1 font-mono">Iklan</div>
    <ins class="adsbygoogle"
         style="display:block; text-align:center;"
         data-ad-layout="in-article"
         data-ad-format="fluid"
         data-ad-client="{{ $publisherId }}"
         data-ad-slot="{{ $slot }}"
         @if(!empty($lazy)) data-ad-lazy="true" @endif></ins>
    @if(empty($lazy))
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    @endif
</div>
@endif
