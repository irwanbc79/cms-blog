<div class="space-y-6">

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step > 0): ?>
    <div class="flex items-center px-2">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [0 => 'Site', 1 => 'Topic', 2 => 'Title', 3 => 'Preview', 4 => 'Publish']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex items-center <?php echo e($num < 4 ? 'flex-1' : ''); ?>">
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold
                        <?php echo e($step >= $num ? 'bg-primary-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-500'); ?>">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($num === 0): ?>
                            🌐
                        <?php else: ?>
                            <?php echo e($num); ?>

                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <span class="text-xs mt-1 <?php echo e($step >= $num ? 'text-primary-600' : 'text-gray-400'); ?>"><?php echo e($label); ?></span>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($num < 4): ?>
                    <div class="flex-1 h-0.5 mx-2 mb-4 <?php echo e($step > $num ? 'bg-primary-600' : 'bg-gray-200 dark:bg-gray-700'); ?>"></div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errorMessage): ?>
        <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg text-red-700 dark:text-red-400 text-sm">
            <?php echo e($errorMessage); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 0): ?>
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 space-y-5">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">🌐 Select Site</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400">Choose which website you want to create content for.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button wire:click="selectSite(<?php echo e($site->id); ?>)"
                    class="relative flex flex-col p-5 rounded-xl border-2 transition-all text-left
                        <?php echo e($siteId === $site->id
                            ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20 shadow-md'
                            : 'border-gray-200 dark:border-gray-700 hover:border-primary-300 hover:shadow-sm bg-white dark:bg-gray-800'); ?>">
                    <div class="flex items-center gap-3 mb-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->logo_url): ?>
                            <img src="<?php echo e($site->logo_url); ?>" alt="<?php echo e($site->name); ?>" class="w-10 h-10 rounded-lg object-cover">
                        <?php else: ?>
                            <div class="w-10 h-10 rounded-lg bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center text-lg">
                                🌐
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white"><?php echo e($site->name); ?></h3>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($site->domain): ?>
                                <p class="text-xs text-gray-500"><?php echo e($site->domain); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-1.5 mt-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $site->getPillarOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="text-xs px-2 py-0.5 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 rounded-full">
                                <?php echo e($label); ?>

                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 1): ?>
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 space-y-5">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Step 1 — Choose Topic</h2>
            <button wire:click="goBackToSites"
                class="text-xs text-gray-500 hover:text-primary-600 underline">
                Change Site →
            </button>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedSite): ?>
        <div class="flex items-center gap-2 px-3 py-2 bg-gray-50 dark:bg-gray-700/50 rounded-lg text-sm text-gray-600 dark:text-gray-300">
            <span>🌐</span>
            <span class="font-medium"><?php echo e($selectedSite->name); ?></span>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($selectedSite->domain): ?>
                <span class="text-gray-400">— <?php echo e($selectedSite->domain); ?></span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Language</label>
                <select wire:model.live="language"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $this->languageOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content Pillar</label>
                <select wire:model.live="pillar"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $this->pillarOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </select>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($topicIdeas->count()): ?>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Quick-pick from Topic Ideas
            </label>
            <div class="flex flex-wrap gap-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $topicIdeas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button wire:click="pickTopicIdea(<?php echo e($idea->id); ?>)"
                        class="px-3 py-1.5 text-xs rounded-full border transition
                            <?php echo e($topicIdeaId === $idea->id
                                ? 'bg-primary-600 text-white border-primary-600'
                                : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-600 hover:border-primary-400'); ?>">
                        <?php echo e(\Illuminate\Support\Str::limit($idea->topic, 50)); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Topic / Keyword</label>
            <input wire:model="topic" type="text"
                placeholder="e.g. Prosedur ekspor UMKM ke Eropa"
                class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm" />
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['topic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <button wire:click="generateTitles" wire:loading.attr="disabled"
            class="w-full py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition">
            <span wire:loading.remove wire:target="generateTitles">✨ Generate 10 Title Options</span>
            <span wire:loading wire:target="generateTitles">Generating titles…</span>
        </button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 2): ?>
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 space-y-4">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Step 2 — Pick a Title</h2>
        <p class="text-sm text-gray-500">Topic: <strong class="text-gray-800 dark:text-gray-200"><?php echo e($topic); ?></strong></p>

        <div class="space-y-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $titleOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button wire:click="selectTitle(<?php echo e($i); ?>)"
                class="w-full text-left p-3 rounded-lg border transition
                    <?php echo e($selectedTitleIndex === $i
                        ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20'
                        : 'border-gray-200 dark:border-gray-700 hover:border-primary-300'); ?>">
                <div class="flex items-start justify-between gap-3">
                    <span class="text-sm text-gray-900 dark:text-white"><?php echo e($option['title']); ?></span>
                    <div class="flex gap-1.5 shrink-0">
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium
                            <?php echo e($option['ctr_score'] === 'high' ? 'bg-green-100 text-green-700' :
                               ($option['ctr_score'] === 'med'  ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-600')); ?>">
                            <?php echo e(strtoupper($option['ctr_score'] ?? '')); ?>

                        </span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 font-medium">
                            <?php echo e($option['hook_type'] ?? ''); ?>

                        </span>
                    </div>
                </div>
            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="flex gap-3 pt-2">
            <button wire:click="$set('step', 1)"
                class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                ← Back
            </button>
            <button wire:click="generateArticle" wire:loading.attr="disabled"
                <?php if($selectedTitleIndex === null): ?> disabled <?php endif; ?>
                class="flex-1 py-2 bg-primary-600 hover:bg-primary-700 disabled:opacity-40 text-white font-medium rounded-lg text-sm transition">
                <span wire:loading.remove wire:target="generateArticle">🚀 Generate Full Article</span>
                <span wire:loading wire:target="generateArticle">Generating article (~60s)…</span>
            </button>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 3): ?>
    <div class="space-y-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Step 3 — Preview Article</h2>

            <div class="grid grid-cols-2 gap-3 mb-5 text-sm">
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">SEO Title</p>
                    <p class="font-medium text-gray-900 dark:text-white"><?php echo e($articleData['seo_title'] ?? '-'); ?></p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Focus Keyword</p>
                    <p class="font-medium text-gray-900 dark:text-white"><?php echo e($articleData['focus_keyword'] ?? '-'); ?></p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg col-span-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Meta Description</p>
                    <p class="text-gray-800 dark:text-gray-200"><?php echo e($articleData['meta_description'] ?? '-'); ?></p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Word Count</p>
                    <p class="font-medium text-gray-900 dark:text-white"><?php echo e(number_format($articleData['word_count'] ?? 0)); ?> words</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Tags</p>
                    <p class="text-gray-800 dark:text-gray-200 text-xs"><?php echo e(implode(', ', $articleData['tags'] ?? [])); ?></p>
                </div>
            </div>

            <div class="prose dark:prose-invert max-w-none border-t border-gray-200 dark:border-gray-700 pt-4 max-h-96 overflow-y-auto text-sm">
                <?php echo $articleData['content_html'] ?? ''; ?>

            </div>
        </div>

        <div class="flex gap-3">
            <button wire:click="$set('step', 2)"
                class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                ← Back
            </button>
            <button wire:click="proceedToPublish"
                class="flex-1 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition">
                Continue to Publish →
            </button>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($step === 4): ?>
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 space-y-5">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Step 4 — Publish to WordPress</h2>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! $publishResult): ?>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Publish Status</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" wire:model="publishStatus" value="draft" class="text-primary-600">
                        <span class="text-sm">Save as Draft</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" wire:model="publishStatus" value="publish" class="text-primary-600">
                        <span class="text-sm">Publish Now</span>
                    </label>
                </div>
            </div>

            <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-700 rounded-lg p-3 text-sm text-amber-800 dark:text-amber-300">
                Article saved locally as Draft (ID #<?php echo e($savedArticleId); ?>). This will push to WordPress.
            </div>

            <div class="flex gap-3">
                <button wire:click="$set('step', 3)"
                    class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                    ← Back
                </button>
                <button wire:click="publish" wire:loading.attr="disabled"
                    class="flex-1 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg text-sm transition">
                    <span wire:loading.remove wire:target="publish">🚀 Push to WordPress</span>
                    <span wire:loading wire:target="publish">Publishing…</span>
                </button>
            </div>
        <?php else: ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(str_starts_with($publishResult, 'success:')): ?>
                <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg">
                    <p class="text-green-700 dark:text-green-400 font-medium mb-1">✅ Published successfully!</p>
                    <a href="<?php echo e(substr($publishResult, 8)); ?>" target="_blank"
                        class="text-sm text-green-600 dark:text-green-400 underline break-all">
                        <?php echo e(substr($publishResult, 8)); ?>

                    </a>
                </div>
            <?php elseif(str_starts_with($publishResult, 'error:')): ?>
                <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-lg text-red-700 dark:text-red-400 text-sm">
                    ❌ <?php echo e(substr($publishResult, 6)); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <button wire:click="restart"
                class="w-full py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition">
                ✨ Generate Another Article
            </button>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

</div>
<?php /**PATH /Users/irwanbece/cms-blog/resources/views/livewire/content-generator.blade.php ENDPATH**/ ?>