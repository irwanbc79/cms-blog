@if(!empty($publisherId) && !empty($slot))
<div class="ad-container ad-sidebar {{ $class ?? '' }}" style="min-height: 600px; width: 300px; max-width: 100%;">
    <div class="text-[10px] text-gray-400/80 uppercase tracking-widest text-center mb-1 font-mono">Iklan</div>
    <ins class="adsbygoogle"
         style="display:block; width: 300px; height: 600px;"
         data-ad-client="{{ $publisherId }}"
         data-ad-slot="{{ $slot }}"
         data-ad-format="auto"
         data-full-width-responsive="false"
         @if(!empty($lazy)) data-ad-lazy="true" @endif></ins>
    @if(empty($lazy))
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    @endif
</div>
@endif
