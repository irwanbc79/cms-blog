@if(!empty($publisherId) && !empty($slot))
<div class="ad-container ad-display {{ $class ?? '' }}" style="min-height: {{ $minHeight ?? '280px' }};">
    <div class="text-[10px] text-gray-400/80 uppercase tracking-widest text-center mb-1 font-mono">Iklan</div>
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="{{ $publisherId }}"
         data-ad-slot="{{ $slot }}"
         data-ad-format="auto"
         data-full-width-responsive="true"
         @if(!empty($lazy)) data-ad-lazy="true" @endif></ins>
    @if(empty($lazy))
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    @endif
</div>
@endif
