<?php $__env->startSection('title', $seo['title']); ?>
<?php $__env->startSection('description', $seo['description']); ?>
<?php $__env->startSection('og_type', 'website'); ?>

<?php $__env->startSection('content'); ?>

<section class="bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
                Blog <?php echo e($site->name); ?>

            </h1>
            <p class="text-lg md:text-xl text-blue-100 leading-relaxed">
                Temukan artikel, wawasan, dan informasi terbaru seputar bisnis dan industri kami.
            </p>
        </div>
    </div>
</section>


<section class="border-b border-gray-100 bg-gray-50">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            
            <div class="flex flex-wrap gap-2">
                <a href="<?php echo e(url('/blog')); ?>"
                   class="px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                          <?php echo e(!$pillar ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200'); ?>">
                    Semua
                </a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $pillarCounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(url('/blog?pillar=' . $key)); ?>"
                   class="px-3 py-1.5 rounded-full text-sm font-medium transition-colors
                          <?php echo e($pillar === $key ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-100 border border-gray-200'); ?>">
                    <?php echo e(ucfirst($key)); ?>

                    <span class="ml-1 text-xs opacity-60">(<?php echo e($count); ?>)</span>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <p class="text-sm text-gray-500 shrink-0">
                <?php echo e($articles->total()); ?> artikel
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
                    untuk "<?php echo e($search); ?>"
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>
        </div>
    </div>
</section>


<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($articles->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.article-card','data' => ['article' => $article]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('article-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['article' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($article)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15)): ?>
<?php $attributes = $__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15; ?>
<?php unset($__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15)): ?>
<?php $component = $__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15; ?>
<?php unset($__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15); ?>
<?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($index + 1) % 3 === 0 && $site->getAdsensePublisher() && $site->getAdSlot('in_feed') && !$loop->last): ?>
                <div class="col-span-full flex justify-center py-2">
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-format="fluid"
                         data-ad-layout-key="-6t+ed+2i-1n-4w"
                         data-ad-client="<?php echo e($site->getAdsensePublisher()); ?>"
                         data-ad-slot="<?php echo e($site->getAdSlot('in_feed')); ?>"></ins>
                    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="mt-12">
            <?php echo e($articles->links()); ?>

        </div>
    <?php else: ?>
        
        <div class="text-center py-20">
            <div class="w-20 h-20 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Artikel</h3>
            <p class="text-gray-500 max-w-md mx-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($search): ?>
                    Tidak ditemukan artikel untuk "<?php echo e($search); ?>". Coba kata kunci lain.
                <?php else: ?>
                    Belum ada artikel yang dipublikasikan. Pantau terus untuk konten terbaru!
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </p>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('blog.layouts.blog', ['site' => $site, 'seo' => $seo], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/irwanbece/cms-blog/resources/views/blog/index.blade.php ENDPATH**/ ?>