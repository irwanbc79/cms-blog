<x-filament-panels::page>
    {{-- Stats Cards --}}
    @php $stats = $this->getStats(); @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Articles</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['total'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                    <x-heroicon-o-document-text class="w-6 h-6 text-blue-600" />
                </div>
            </div>
            <div class="mt-3 flex gap-3 text-xs text-gray-500">
                <span class="flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    {{ $stats['published'] }} Published
                </span>
                <span class="flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-yellow-500"></span>
                    {{ $stats['scheduled'] }} Scheduled
                </span>
                <span class="flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-gray-300"></span>
                    {{ $stats['draft'] }} Draft
                </span>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Queue</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['queue'] }}</p>
                </div>
                <div class="w-12 h-12 bg-amber-50 rounded-lg flex items-center justify-center">
                    <x-heroicon-o-queue-list class="w-6 h-6 text-amber-600" />
                </div>
            </div>
            <p class="mt-3 text-xs text-gray-500">Articles waiting to be published</p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Active Sites</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $stats['activeSites'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                    <x-heroicon-o-globe-alt class="w-6 h-6 text-green-600" />
                </div>
            </div>
            <p class="mt-3 text-xs text-gray-500 truncate">
                @foreach($stats['sites'] as $name => $count)
                    <span class="inline-block mr-2">{{ $name }}: {{ $count }}</span>
                @endforeach
            </p>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Ideas Available</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">
                        {{ \App\Models\TopicIdea::where('is_used', false)->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                    <x-heroicon-o-light-bulb class="w-6 h-6 text-purple-600" />
                </div>
            </div>
            <p class="mt-3 text-xs text-gray-500">Unused topic ideas ready to generate</p>
        </div>
    </div>

    {{-- Quick Create Form --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6 mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <x-heroicon-o-sparkles class="w-5 h-5 text-blue-600" />
            Quick Create & Schedule
        </h2>

        <form wire:submit="quickCreate" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                {{-- Site --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Site</label>
                    <select wire:model.live="siteId"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Pilih Site...</option>
                        @foreach(\App\Models\Site::where('is_active', true)->orderBy('name')->get() as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                    @error('siteId') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Pillar --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pillar</label>
                    <select wire:model="pillar"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @foreach($this->pillarOptions as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('pillar') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Language --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                    <select wire:model="language"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        @foreach($this->languageOptions as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('language') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Article Count --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Article Count</label>
                    <input type="number" wire:model="articleCount" min="1" max="30"
                           class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('articleCount') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Topic --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Topic / Keyword</label>
                <input type="text" wire:model="topic" placeholder="e.g., Tips ekspor untuk UMKM, Regulasi bea cukai terbaru..."
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                @error('topic') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Schedule Options --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Schedule Start (optional)</label>
                    <input type="datetime-local" wire:model="scheduleStart"
                           class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-400 mt-1">Leave empty to start tomorrow at 08:00</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Days Between Articles</label>
                    <input type="number" wire:model="scheduleGap" min="1" max="30"
                           class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-xs text-gray-400 mt-1">1 = every day, 7 = once a week</p>
                </div>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-colors shadow-sm"
                        wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="quickCreate">
                        <x-heroicon-o-sparkles class="w-4 h-4" />
                    </span>
                    <span wire:loading wire:target="quickCreate" class="flex items-center gap-2">
                        <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>
                        Generating...
                    </span>
                    Generate & Schedule
                </button>
                <p class="text-xs text-gray-400">~60s per article. Max 30 articles.</p>
            </div>
        </form>
    </div>

    {{-- Queue Table --}}
    <div class="bg-white rounded-xl border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
            <x-heroicon-o-queue-list class="w-5 h-5 text-amber-600" />
            Publishing Queue
        </h2>
        {{ $this->table }}
    </div>
</x-filament-panels::page>
