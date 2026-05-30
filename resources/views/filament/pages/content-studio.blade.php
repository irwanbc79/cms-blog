<x-filament-panels::page>
    {{-- Stats Cards --}}
    @php $stats = $this->getStats(); @endphp

    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:2rem;">

        {{-- Total Articles --}}
        <div style="background:#fff;border-radius:.75rem;border:1px solid #e5e7eb;padding:1.25rem;">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;">
                <div>
                    <p style="font-size:.8rem;font-weight:500;color:#6b7280;margin:0;">Total Articles</p>
                    <p style="font-size:2rem;font-weight:700;color:#111827;margin:.25rem 0 0;">{{ $stats['total'] }}</p>
                </div>
                <div style="width:2.5rem;height:2.5rem;background:#eff6ff;border-radius:.5rem;display:flex;align-items:center;justify-content:center;">
                    <x-heroicon-o-document-text style="width:1.25rem;height:1.25rem;color:#2563eb;" />
                </div>
            </div>
            <div style="margin-top:.75rem;display:flex;gap:.75rem;font-size:.75rem;color:#6b7280;flex-wrap:wrap;">
                <span style="display:flex;align-items:center;gap:.25rem;">
                    <span style="width:.5rem;height:.5rem;border-radius:50%;background:#22c55e;display:inline-block;"></span>
                    {{ $stats['published'] }} Published
                </span>
                <span style="display:flex;align-items:center;gap:.25rem;">
                    <span style="width:.5rem;height:.5rem;border-radius:50%;background:#f59e0b;display:inline-block;"></span>
                    {{ $stats['scheduled'] }} Scheduled
                </span>
                <span style="display:flex;align-items:center;gap:.25rem;">
                    <span style="width:.5rem;height:.5rem;border-radius:50%;background:#d1d5db;display:inline-block;"></span>
                    {{ $stats['draft'] }} Draft
                </span>
            </div>
        </div>

        {{-- Queue --}}
        <div style="background:#fff;border-radius:.75rem;border:1px solid #e5e7eb;padding:1.25rem;">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;">
                <div>
                    <p style="font-size:.8rem;font-weight:500;color:#6b7280;margin:0;">Queue</p>
                    <p style="font-size:2rem;font-weight:700;color:#111827;margin:.25rem 0 0;">{{ $stats['queue'] }}</p>
                </div>
                <div style="width:2.5rem;height:2.5rem;background:#fffbeb;border-radius:.5rem;display:flex;align-items:center;justify-content:center;">
                    <x-heroicon-o-queue-list style="width:1.25rem;height:1.25rem;color:#d97706;" />
                </div>
            </div>
            <p style="margin-top:.75rem;font-size:.75rem;color:#6b7280;">Articles waiting to be published</p>
        </div>

        {{-- Active Sites --}}
        <div style="background:#fff;border-radius:.75rem;border:1px solid #e5e7eb;padding:1.25rem;">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;">
                <div>
                    <p style="font-size:.8rem;font-weight:500;color:#6b7280;margin:0;">Active Sites</p>
                    <p style="font-size:2rem;font-weight:700;color:#111827;margin:.25rem 0 0;">{{ $stats['activeSites'] }}</p>
                </div>
                <div style="width:2.5rem;height:2.5rem;background:#f0fdf4;border-radius:.5rem;display:flex;align-items:center;justify-content:center;">
                    <x-heroicon-o-globe-alt style="width:1.25rem;height:1.25rem;color:#16a34a;" />
                </div>
            </div>
            <p style="margin-top:.75rem;font-size:.75rem;color:#6b7280;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                @forelse($stats['sites'] as $name => $count)
                    {{ $name }}: {{ $count }}@if(!$loop->last), @endif
                @empty
                    No articles yet
                @endforelse
            </p>
        </div>

        {{-- Ideas Available --}}
        <div style="background:#fff;border-radius:.75rem;border:1px solid #e5e7eb;padding:1.25rem;">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;">
                <div>
                    <p style="font-size:.8rem;font-weight:500;color:#6b7280;margin:0;">Ideas Available</p>
                    <p style="font-size:2rem;font-weight:700;color:#111827;margin:.25rem 0 0;">
                        {{ \App\Models\TopicIdea::where('is_used', false)->count() }}
                    </p>
                </div>
                <div style="width:2.5rem;height:2.5rem;background:#faf5ff;border-radius:.5rem;display:flex;align-items:center;justify-content:center;">
                    <x-heroicon-o-light-bulb style="width:1.25rem;height:1.25rem;color:#9333ea;" />
                </div>
            </div>
            <p style="margin-top:.75rem;font-size:.75rem;color:#6b7280;">Unused topic ideas ready to generate</p>
        </div>
    </div>

    {{-- Quick Create Form --}}
    <div style="background:#fff;border-radius:.75rem;border:1px solid #e5e7eb;padding:1.5rem;margin-bottom:2rem;">
        <h2 style="font-size:1rem;font-weight:600;color:#111827;margin:0 0 1rem;display:flex;align-items:center;gap:.5rem;">
            <x-heroicon-o-sparkles style="width:1.25rem;height:1.25rem;color:#2563eb;" />
            Quick Create & Schedule
        </h2>

        <form wire:submit="quickCreate">
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-bottom:1rem;">

                {{-- Site --}}
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:500;color:#374151;margin-bottom:.25rem;">Site</label>
                    <select wire:model.live="siteId"
                            style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;">
                        <option value="">Pilih Site...</option>
                        @foreach(\App\Models\Site::where('is_active', true)->orderBy('name')->get() as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                    @error('siteId') <p style="font-size:.75rem;color:#ef4444;margin-top:.25rem;">{{ $message }}</p> @enderror
                </div>

                {{-- Pillar --}}
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:500;color:#374151;margin-bottom:.25rem;">Pillar</label>
                    <select wire:model="pillar"
                            style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;">
                        @foreach($this->pillarOptions as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('pillar') <p style="font-size:.75rem;color:#ef4444;margin-top:.25rem;">{{ $message }}</p> @enderror
                </div>

                {{-- Language --}}
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:500;color:#374151;margin-bottom:.25rem;">Language</label>
                    <select wire:model="language"
                            style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;">
                        @foreach($this->languageOptions as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('language') <p style="font-size:.75rem;color:#ef4444;margin-top:.25rem;">{{ $message }}</p> @enderror
                </div>

                {{-- Article Count --}}
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:500;color:#374151;margin-bottom:.25rem;">Article Count</label>
                    <input type="number" wire:model="articleCount" min="1" max="30"
                           style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                    @error('articleCount') <p style="font-size:.75rem;color:#ef4444;margin-top:.25rem;">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Topic --}}
            <div style="margin-bottom:1rem;">
                <label style="display:block;font-size:.875rem;font-weight:500;color:#374151;margin-bottom:.25rem;">Topic / Keyword</label>
                <input type="text" wire:model="topic"
                       placeholder="e.g., Tips ekspor untuk UMKM, Regulasi bea cukai terbaru..."
                       style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                @error('topic') <p style="font-size:.75rem;color:#ef4444;margin-top:.25rem;">{{ $message }}</p> @enderror
            </div>

            {{-- Schedule Options --}}
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem;">
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:500;color:#374151;margin-bottom:.25rem;">Schedule Start (optional)</label>
                    <input type="datetime-local" wire:model="scheduleStart"
                           style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                    <p style="font-size:.75rem;color:#9ca3af;margin-top:.25rem;">Leave empty to start tomorrow at 08:00</p>
                </div>
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:500;color:#374151;margin-bottom:.25rem;">Days Between Articles</label>
                    <input type="number" wire:model="scheduleGap" min="1" max="30"
                           style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                    <p style="font-size:.75rem;color:#9ca3af;margin-top:.25rem;">1 = every day, 7 = once a week</p>
                </div>
            </div>

            <div style="display:flex;align-items:center;gap:.75rem;padding-top:.5rem;">
                <button type="submit"
                        style="display:inline-flex;align-items:center;gap:.5rem;padding:.625rem 1.25rem;background:#2563eb;color:#fff;border:none;border-radius:.5rem;font-size:.875rem;font-weight:500;cursor:pointer;"
                        wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="quickCreate">
                        <x-heroicon-o-sparkles style="width:1rem;height:1rem;" />
                    </span>
                    <span wire:loading wire:target="quickCreate" style="display:flex;align-items:center;gap:.5rem;">
                        <svg style="animation:spin 1s linear infinite;width:1rem;height:1rem;" fill="none" viewBox="0 0 24 24">
                            <circle style="opacity:.25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path style="opacity:.75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>
                        Generating...
                    </span>
                    Generate & Schedule
                </button>
                <p style="font-size:.75rem;color:#9ca3af;">~60s per article. Max 30 articles.</p>
            </div>
        </form>
    </div>

    {{-- Queue Table --}}
    <div style="background:#fff;border-radius:.75rem;border:1px solid #e5e7eb;padding:1.5rem;">
        <h2 style="font-size:1rem;font-weight:600;color:#111827;margin:0 0 1rem;display:flex;align-items:center;gap:.5rem;">
            <x-heroicon-o-queue-list style="width:1.25rem;height:1.25rem;color:#d97706;" />
            Publishing Queue
        </h2>
        {{ $this->table }}
    </div>

    <style>
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    </style>
</x-filament-panels::page>
