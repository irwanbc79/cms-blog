<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['article', 'blogAssetPrefix' => '', 'showExcerpt' => true]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['article', 'blogAssetPrefix' => '', 'showExcerpt' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<article class="group flex flex-col bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-lg hover:border-gray-200 transition-all duration-300">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->featured_image_url): ?>
    <a href="<?php echo e(url($blogAssetPrefix . '/blog/' . $article->slug)); ?>" class="block aspect-[16/9] overflow-hidden bg-gray-100">
        <img src="<?php echo e($article->featured_image_url); ?>"
             alt="<?php echo e($article->image_alt_texts[0] ?? $article->title); ?>"
             loading="lazy"
             width="400"
             height="225"
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
    </a>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="flex flex-col flex-1 p-5">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->pillar): ?>
        <a href="<?php echo e(url($blogAssetPrefix . '/blog?pillar=' . $article->pillar)); ?>"
           class="inline-block self-start px-2.5 py-0.5 rounded-full text-xs font-semibold
                  bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors mb-3">
            <?php echo e(ucfirst($article->pillar)); ?>

        </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <h3 class="text-lg font-bold leading-snug mb-2 flex-1">
            <a href="<?php echo e(url($blogAssetPrefix . '/blog/' . $article->slug)); ?>"
               class="text-gray-900 hover:text-blue-600 transition-colors">
                <?php echo e($article->title); ?>

            </a>
        </h3>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($showExcerpt && ($article->excerpt || $article->content_html)): ?>
        <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2">
            <?php echo e($article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content_html), 120)); ?>

        </p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="flex items-center justify-between text-xs text-gray-400 mt-auto pt-3 border-t border-gray-50">
            <span><?php echo e($article->published_at?->isoFormat('D MMM YYYY')); ?></span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->estimated_read_time): ?>
            <span class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <?php echo e($article->estimated_read_time); ?> min read
            </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</article>
<?php /**PATH /Users/irwanbece/cms-blog/resources/views/components/article-card.blade.php ENDPATH**/ ?>