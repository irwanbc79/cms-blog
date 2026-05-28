<?php $__env->startSection('title', $seo['title']); ?>
<?php $__env->startSection('description', $seo['description']); ?>
<?php $__env->startSection('og_type', 'article'); ?>
<?php $__env->startSection('og_title', $seo['title']); ?>

<?php $__env->startPush('head'); ?>
<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->schema_faq && count($article->schema_faq) > 0): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php $__currentLoopData = $article->schema_faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
            "@type": "Question",
            "name": <?php echo e(json_encode($faq['question'] ?? $faq['q'] ?? '')); ?>,
            "acceptedAnswer": {
                "@type": "Answer",
                "text": <?php echo e(json_encode($faq['answer'] ?? $faq['a'] ?? '')); ?>

            }
        }<?php echo e(!$loop->last ? ',' : ''); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ]
}
</script>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('schema'); ?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Blog",
            "item": "<?php echo e(url('/blog')); ?>"
        }
        <?php if($breadcrumbs[1]['url']): ?>
        ,{
            "@type": "ListItem",
            "position": 2,
            "name": "<?php echo e($breadcrumbs[1]['label']); ?>",
            "item": "<?php echo e($breadcrumbs[1]['url']); ?>"
        }
        <?php endif; ?>
        ,{
            "@type": "ListItem",
            "position": <?php echo e($breadcrumbs[1]['url'] ? 3 : 2); ?>,
            "name": "<?php echo e($article->title); ?>",
            "item": "<?php echo e(url('/blog/' . $article->slug)); ?>"
        }
    ]
}
</script>


<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": <?php echo e(json_encode($article->title)); ?>,
    "description": <?php echo e(json_encode($seo['description'])); ?>,
    <?php if($article->featured_image_url): ?>
    "image": "<?php echo e($article->featured_image_url); ?>",
    <?php endif; ?>
    "author": {
        "@type": "Organization",
        "name": <?php echo e(json_encode($seo['author'] ?? $site->name)); ?>

    },
    "publisher": {
        "@type": "Organization",
        "name": <?php echo e(json_encode($site->name)); ?>

        <?php if($site->logo_url): ?>
        ,"logo": {
            "@type": "ImageObject",
            "url": "<?php echo e($site->logo_url); ?>"
        }
        <?php endif; ?>
    },
    "datePublished": "<?php echo e($seo['published_time']); ?>",
    "dateModified": "<?php echo e($seo['modified_time']); ?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo e(url('/blog/' . $article->slug)); ?>"
    }
    <?php if(!empty($article->tags)): ?>
    ,"keywords": <?php echo e(json_encode(is_array($article->tags) ? implode(', ', $article->tags) : $article->tags)); ?>

    <?php endif; ?>
    <?php if($article->word_count): ?>
    ,"wordCount": "<?php echo e($article->word_count); ?>"
    <?php endif; ?>
}
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<nav class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-2" aria-label="Breadcrumb">
    <ol class="flex items-center gap-2 text-sm text-gray-500" itemscope itemtype="https://schema.org/BreadcrumbList">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $crumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="flex items-center gap-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index > 0): ?>
            <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($crumb['url']): ?>
            <a href="<?php echo e($crumb['url']); ?>" itemprop="item" class="hover:text-blue-600 transition-colors">
                <span itemprop="name"><?php echo e($crumb['label']); ?></span>
            </a>
            <?php else: ?>
            <span itemprop="name" class="text-gray-900 font-medium"><?php echo e($crumb['label']); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <meta itemprop="position" content="<?php echo e($index + 1); ?>">
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </ol>
</nav>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->getAdsensePublisher() && $site->getAdSlot('display_top')): ?>
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="<?php echo e($site->getAdsensePublisher()); ?>"
         data-ad-slot="<?php echo e($site->getAdSlot('display_top')); ?>"
         data-ad-format="auto"
         data-full-width-responsive="true"></ins>
    <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    
    <div class="flex flex-wrap items-center gap-3 mb-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->pillar): ?>
        <a href="<?php echo e(url('/blog?pillar=' . $article->pillar)); ?>"
           class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 hover:bg-blue-100 transition-colors">
            <?php echo e(ucfirst($article->pillar)); ?>

        </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($article->tags)): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = array_slice($article->tags, 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="px-2.5 py-0.5 rounded-full text-xs bg-gray-100 text-gray-600"><?php echo e($tag); ?></span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
        <?php echo e($article->title); ?>

    </h1>

    
    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500 mb-6 pb-6 border-b border-gray-100">
        <span class="flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <?php echo e($article->published_at?->isoFormat('dddd, D MMMM YYYY')); ?>

        </span>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->estimated_read_time): ?>
        <span class="flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <?php echo e($article->estimated_read_time); ?> min read
        </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->word_count): ?>
        <span class="flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <?php echo e(number_format($article->word_count)); ?> kata
        </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->featured_image_url): ?>
    <div class="mb-8 rounded-2xl overflow-hidden bg-gray-50">
        <img src="<?php echo e($article->featured_image_url); ?>"
             alt="<?php echo e($article->image_alt_texts[0] ?? $article->title); ?>"
             class="w-full h-auto object-cover"
             loading="eager"
             width="1200"
             height="675">
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($toc) > 0): ?>
        <aside class="lg:w-64 shrink-0">
            <div class="lg:sticky lg:top-24">
                <h4 class="text-xs font-semibold uppercase tracking-wider text-gray-400 mb-3">Daftar Isi</h4>
                <nav class="space-y-1">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $toc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#<?php echo e($item['id']); ?>"
                       class="block text-sm py-1.5 <?php echo e($item['level'] == 3 ? 'pl-4' : 'pl-0'); ?> border-l-2 border-transparent hover:border-blue-500 hover:text-blue-600 transition-colors
                              <?php echo e($loop->first ? 'font-medium text-gray-900 border-blue-500' : 'text-gray-600'); ?>">
                        <?php echo e($item['title']); ?>

                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </nav>
            </div>
        </aside>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        
        <div class="flex-1 min-w-0">
            
            <div class="prose prose-lg prose-blue max-w-none
                        prose-headings:font-bold prose-headings:text-gray-900
                        prose-h2:text-2xl prose-h2:mt-10 prose-h2:mb-4 prose-h2:scroll-mt-24
                        prose-h3:text-xl prose-h3:mt-8 prose-h3:mb-3 prose-h3:scroll-mt-24
                        prose-p:leading-relaxed prose-p:text-gray-700
                        prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                        prose-img:rounded-xl prose-img:shadow-md
                        prose-blockquote:border-blue-500 prose-blockquote:bg-blue-50 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:rounded-r-lg
                        prose-ul:space-y-2 prose-li:text-gray-700
                        prose-strong:text-gray-900
                        prose-code:text-sm prose-code:bg-gray-100 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded
                        prose-pre:bg-gray-900 prose-pre:text-gray-100 prose-pre:rounded-xl">
                <?php echo $article->content_html; ?>

            </div>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->getAdsensePublisher() && $site->getAdSlot('in_article')): ?>
            <div class="my-10 p-6 bg-gray-50 rounded-2xl text-center text-sm text-gray-400 border border-gray-100">
                <ins class="adsbygoogle"
                     style="display:block; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-client="<?php echo e($site->getAdsensePublisher()); ?>"
                     data-ad-slot="<?php echo e($site->getAdSlot('in_article')); ?>"></ins>
                <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($article->tags)): ?>
            <div class="mt-8 pt-6 border-t border-gray-100">
                <h4 class="text-sm font-semibold text-gray-500 mb-3">Tags:</h4>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="px-3 py-1.5 bg-gray-100 text-gray-700 text-sm rounded-lg hover:bg-gray-200 transition-colors cursor-default"><?php echo e($tag); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->getAdsensePublisher() && $site->getAdSlot('multiplex')): ?>
    <div class="mt-12 pt-8">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-format="autorelaxed"
             data-ad-client="<?php echo e($site->getAdsensePublisher()); ?>"
             data-ad-slot="<?php echo e($site->getAdSlot('multiplex')); ?>"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($article->schema_faq && count($article->schema_faq) > 0): ?>
    <section class="mt-12 pt-8 border-t border-gray-100">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Pertanyaan Umum (FAQ)</h2>
        <div class="space-y-4" x-data="{ openFaq: null }">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $article->schema_faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="border border-gray-200 rounded-xl overflow-hidden">
                <button @click="openFaq = openFaq === <?php echo e($index); ?> ? null : <?php echo e($index); ?>"
                        class="w-full flex items-center justify-between px-5 py-4 text-left font-medium text-gray-900 hover:bg-gray-50 transition-colors">
                    <span><?php echo e($faq['question'] ?? $faq['q'] ?? ''); ?></span>
                    <svg class="w-5 h-5 text-gray-400 shrink-0 ml-4 transition-transform duration-200"
                         :class="openFaq === <?php echo e($index); ?> ? 'rotate-180' : ''"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openFaq === <?php echo e($index); ?>"
                     x-transition:enter="transition-all duration-300 ease-out"
                     x-transition:enter-start="opacity-0 max-h-0"
                     x-transition:enter-end="opacity-100 max-h-96"
                     x-transition:leave="transition-all duration-200 ease-in"
                     x-transition:leave-start="opacity-100 max-h-96"
                     x-transition:leave-end="opacity-0 max-h-0"
                     class="px-5 pb-4 text-gray-600 leading-relaxed overflow-hidden">
                    <?php echo e($faq['answer'] ?? $faq['a'] ?? ''); ?>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.9/dist/cdn.min.js"></script>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <nav class="mt-12 pt-8 border-t border-gray-100 grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($prevArticle): ?>
        <a href="<?php echo e(url('/blog/' . $prevArticle->slug)); ?>"
           class="group p-4 rounded-xl border border-gray-200 hover:border-blue-200 hover:bg-blue-50/50 transition-all">
            <span class="text-xs text-gray-400 font-medium uppercase tracking-wider">← Artikel Sebelumnya</span>
            <p class="mt-1 font-semibold text-gray-900 group-hover:text-blue-600 transition-colors"><?php echo e($prevArticle->title); ?></p>
        </a>
        <?php else: ?>
        <div></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($nextArticle): ?>
        <a href="<?php echo e(url('/blog/' . $nextArticle->slug)); ?>"
           class="group p-4 rounded-xl border border-gray-200 hover:border-blue-200 hover:bg-blue-50/50 transition-all text-right md:col-start-2">
            <span class="text-xs text-gray-400 font-medium uppercase tracking-wider">Artikel Selanjutnya →</span>
            <p class="mt-1 font-semibold text-gray-900 group-hover:text-blue-600 transition-colors"><?php echo e($nextArticle->title); ?></p>
        </a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </nav>
</article>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($relatedArticles->count() > 0): ?>
<section class="bg-gray-50 mt-12 py-12 md:py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-8">Artikel Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $relatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.article-card','data' => ['article' => $related]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('article-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['article' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($related)]); ?>
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

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($index === 1 && $site->getAdsensePublisher() && $site->getAdSlot('in_feed')): ?>
                <div class="flex items-center justify-center bg-white rounded-2xl border border-gray-100 p-4">
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
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('blog.layouts.blog', ['site' => $site, 'seo' => $seo], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/irwanbece/cms-blog/resources/views/blog/show.blade.php ENDPATH**/ ?>