<div class="space-y-6">

    {{-- Step Indicator --}}
    <div class="flex items-center px-2">
        @foreach([1 => 'Topic', 2 => 'Title', 3 => 'Preview', 4 => 'Publish'] as $num => $label)
            <div class="flex items-center {{ $num < 4 ? 'flex-1' : '' }}">
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold
                        {{ $step >= $num ? 'bg-primary-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-500' }}">
                        {{ $num }}
                    </div>
                    <span class="text-xs mt-1 {{ $step >= $num ? 'text-primary-600' : 'text-gray-400' }}">{{ $label }}</span>
                </div>
                @if($num < 4)
                    <div class="flex-1 h-0.5 mx-2 mb-4 {{ $step > $num ? 'bg-primary-600' : 'bg-gray-200 dark:bg-gray-700' }}"></div>
                @endif
            </div>
        @endforeach
    </div>

    {{-- Error --}}
    @if($errorMessage)
        <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg text-red-700 dark:text-red-400 text-sm">
            {{ $errorMessage }}
        </div>
    @endif

    {{-- ══════════════════════════════════════════════
         STEP 1: Topic
    ══════════════════════════════════════════════ --}}
    @if($step === 1)
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 space-y-5">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Step 1 — Choose Topic</h2>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Language</label>
                <select wire:model.live="language"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm">
                    <option value="id">🇮🇩 Bahasa Indonesia</option>
                    <option value="en">🇬🇧 English</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Content Pillar</label>
                <select wire:model.live="pillar"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm">
                    <option value="regulasi">📋 Regulasi</option>
                    <option value="umkm">🏪 UMKM Ekspor</option>
                    <option value="news">📰 News</option>
                    <option value="logistik">🚢 Logistik</option>
                </select>
            </div>
        </div>

        @if($topicIdeas->count())
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Quick-pick from Topic Ideas
            </label>
            <div class="flex flex-wrap gap-2">
                @foreach($topicIdeas as $idea)
                    <button wire:click="pickTopicIdea({{ $idea->id }})"
                        class="px-3 py-1.5 text-xs rounded-full border transition
                            {{ $topicIdeaId === $idea->id
                                ? 'bg-primary-600 text-white border-primary-600'
                                : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-600 hover:border-primary-400' }}">
                        {{ \Illuminate\Support\Str::limit($idea->topic, 50) }}
                    </button>
                @endforeach
            </div>
        </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Topic / Keyword</label>
            <input wire:model="topic" type="text"
                placeholder="e.g. Prosedur ekspor UMKM ke Eropa"
                class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm" />
            @error('topic') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <button wire:click="generateTitles" wire:loading.attr="disabled"
            class="w-full py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition">
            <span wire:loading.remove wire:target="generateTitles">✨ Generate 10 Title Options</span>
            <span wire:loading wire:target="generateTitles">Generating titles…</span>
        </button>
    </div>
    @endif

    {{-- ══════════════════════════════════════════════
         STEP 2: Title Selection
    ══════════════════════════════════════════════ --}}
    @if($step === 2)
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 space-y-4">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Step 2 — Pick a Title</h2>
        <p class="text-sm text-gray-500">Topic: <strong class="text-gray-800 dark:text-gray-200">{{ $topic }}</strong></p>

        <div class="space-y-2">
            @foreach($titleOptions as $i => $option)
            <button wire:click="selectTitle({{ $i }})"
                class="w-full text-left p-3 rounded-lg border transition
                    {{ $selectedTitleIndex === $i
                        ? 'border-primary-500 bg-primary-50 dark:bg-primary-900/20'
                        : 'border-gray-200 dark:border-gray-700 hover:border-primary-300' }}">
                <div class="flex items-start justify-between gap-3">
                    <span class="text-sm text-gray-900 dark:text-white">{{ $option['title'] }}</span>
                    <div class="flex gap-1.5 shrink-0">
                        <span class="text-xs px-2 py-0.5 rounded-full font-medium
                            {{ $option['ctr_score'] === 'high' ? 'bg-green-100 text-green-700' :
                               ($option['ctr_score'] === 'med'  ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-100 text-gray-600') }}">
                            {{ strtoupper($option['ctr_score'] ?? '') }}
                        </span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-blue-100 text-blue-700 font-medium">
                            {{ $option['hook_type'] ?? '' }}
                        </span>
                    </div>
                </div>
            </button>
            @endforeach
        </div>

        <div class="flex gap-3 pt-2">
            <button wire:click="$set('step', 1)"
                class="px-4 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                ← Back
            </button>
            <button wire:click="generateArticle" wire:loading.attr="disabled"
                @if($selectedTitleIndex === null) disabled @endif
                class="flex-1 py-2 bg-primary-600 hover:bg-primary-700 disabled:opacity-40 text-white font-medium rounded-lg text-sm transition">
                <span wire:loading.remove wire:target="generateArticle">🚀 Generate Full Article</span>
                <span wire:loading wire:target="generateArticle">Generating article (~60s)…</span>
            </button>
        </div>
    </div>
    @endif

    {{-- ══════════════════════════════════════════════
         STEP 3: Preview
    ══════════════════════════════════════════════ --}}
    @if($step === 3)
    <div class="space-y-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Step 3 — Preview Article</h2>

            <div class="grid grid-cols-2 gap-3 mb-5 text-sm">
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">SEO Title</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $articleData['seo_title'] ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Focus Keyword</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ $articleData['focus_keyword'] ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg col-span-2">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Meta Description</p>
                    <p class="text-gray-800 dark:text-gray-200">{{ $articleData['meta_description'] ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Word Count</p>
                    <p class="font-medium text-gray-900 dark:text-white">{{ number_format($articleData['word_count'] ?? 0) }} words</p>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700/50 p-3 rounded-lg">
                    <p class="text-xs text-gray-500 uppercase tracking-wide mb-1">Tags</p>
                    <p class="text-gray-800 dark:text-gray-200 text-xs">{{ implode(', ', $articleData['tags'] ?? []) }}</p>
                </div>
            </div>

            <div class="prose dark:prose-invert max-w-none border-t border-gray-200 dark:border-gray-700 pt-4 max-h-96 overflow-y-auto text-sm">
                {!! $articleData['content_html'] ?? '' !!}
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
    @endif

    {{-- ══════════════════════════════════════════════
         STEP 4: Publish
    ══════════════════════════════════════════════ --}}
    @if($step === 4)
    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 space-y-5">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Step 4 — Publish to WordPress</h2>

        @if(! $publishResult)
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
                Article saved locally as Draft (ID #{{ $savedArticleId }}). This will push to WordPress.
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
        @else
            @if(str_starts_with($publishResult, 'success:'))
                <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg">
                    <p class="text-green-700 dark:text-green-400 font-medium mb-1">✅ Published successfully!</p>
                    <a href="{{ substr($publishResult, 8) }}" target="_blank"
                        class="text-sm text-green-600 dark:text-green-400 underline break-all">
                        {{ substr($publishResult, 8) }}
                    </a>
                </div>
            @elseif(str_starts_with($publishResult, 'error:'))
                <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-lg text-red-700 dark:text-red-400 text-sm">
                    ❌ {{ substr($publishResult, 6) }}
                </div>
            @endif

            <button wire:click="restart"
                class="w-full py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg text-sm transition">
                ✨ Generate Another Article
            </button>
        @endif
    </div>
    @endif

</div>
