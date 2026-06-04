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

    {{-- ═══ Content Studio: Autopilot + Manual ═══ --}}
    <div x-data="{ mode: @entangle('mode').live }" style="background:#fff;border-radius:.75rem;border:1px solid #e5e7eb;padding:1.5rem;margin-bottom:1.5rem;">

        {{-- Mode Tabs --}}
        <div style="display:flex;gap:.5rem;margin-bottom:1.5rem;border-bottom:1px solid #e5e7eb;padding-bottom:0;">
            <button type="button" @click="mode='autopilot'"
                :style="mode==='autopilot' ? 'border-bottom:2px solid #2563eb;color:#2563eb;font-weight:700' : 'border-bottom:2px solid transparent;color:#6b7280;font-weight:500'"
                style="padding:.6rem 1rem;background:none;border-top:none;border-left:none;border-right:none;cursor:pointer;font-size:.95rem;display:flex;align-items:center;gap:.4rem;">
                🪄 Autopilot
            </button>
            <button type="button" @click="mode='manual'"
                :style="mode==='manual' ? 'border-bottom:2px solid #2563eb;color:#2563eb;font-weight:700' : 'border-bottom:2px solid transparent;color:#6b7280;font-weight:500'"
                style="padding:.6rem 1rem;background:none;border-top:none;border-left:none;border-right:none;cursor:pointer;font-size:.95rem;display:flex;align-items:center;gap:.4rem;">
                ✍️ Manual
            </button>
        </div>

        {{-- ─── AUTOPILOT PANEL ─── --}}
        <div x-show="mode==='autopilot'" x-cloak>
            <p style="font-size:.9rem;color:#6b7280;margin:0 0 1rem;">
                Pilih blog → sistem otomatis pilihkan topik + kategori relevan untuk tiap blog, lalu langsung publish. Cukup satu klik. ✨
            </p>

            {{-- Blog Selector --}}
            <div style="margin-bottom:1rem;">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:.5rem;">
                    <label style="font-size:.875rem;font-weight:600;color:#374151;">Pilih Blog</label>
                    <button type="button" wire:click="toggleAllSites"
                        style="font-size:.75rem;color:#2563eb;background:none;border:none;cursor:pointer;font-weight:600;">
                        Pilih Semua / Batal
                    </button>
                </div>
                <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:.5rem;">
                    @foreach($this->sites as $s)
                    <label style="display:flex;align-items:center;gap:.6rem;padding:.7rem .9rem;border:1px solid #d1d5db;border-radius:.5rem;cursor:pointer;background:#f9fafb;">
                        <input type="checkbox" wire:model.live="siteIds" value="{{ $s->id }}" style="width:1.1rem;height:1.1rem;accent-color:#2563eb;">
                        <div>
                            <span style="font-size:.875rem;font-weight:600;color:#111827;display:block;">{{ $s->name }}</span>
                            <span style="font-size:.7rem;color:#9ca3af;">{{ $s->domain }}</span>
                        </div>
                    </label>
                    @endforeach
                </div>
                @error('siteIds') <p style="font-size:.75rem;color:#ef4444;margin-top:.4rem;">{{ $message }}</p> @enderror
            </div>

            {{-- Options Row --}}
            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;margin-bottom:1.25rem;">
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">Artikel / Blog</label>
                    <input type="number" wire:model="perBlog" min="1" max="10"
                        style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                    <p style="font-size:.7rem;color:#9ca3af;margin-top:.25rem;">Disebar merata ke tiap kategori</p>
                </div>
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">Bahasa</label>
                    <select wire:model="language" style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                        <option value="id">🇮🇩 Indonesia</option>
                        <option value="en">🇬🇧 English</option>
                    </select>
                </div>
                <div>
                    <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">Publish</label>
                    <select wire:model="publishMode" style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                        <option value="published">⚡ Langsung Tayang</option>
                        <option value="draft">📝 Draft Dulu</option>
                    </select>
                </div>
            </div>

            {{-- Big Generate Button --}}
            <button type="button" wire:click="autopilot" wire:loading.attr="disabled"
                style="width:100%;background:linear-gradient(135deg,#2563eb,#1d4ed8);color:#fff;border:none;border-radius:.6rem;padding:.9rem;font-size:1rem;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:.5rem;box-shadow:0 4px 12px rgba(37,99,235,.25);">
                <span wire:loading.remove wire:target="autopilot">🪄 Generate &amp; Publish Otomatis</span>
                <span wire:loading wire:target="autopilot" style="display:flex;align-items:center;gap:.5rem;">
                    <svg style="width:1.1rem;height:1.1rem;animation:spin 1s linear infinite;" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,.3)" stroke-width="3"/>
                        <path d="M12 2a10 10 0 0110 10" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                    Mengantrekan...
                </span>
            </button>
        </div>

        {{-- ─── MANUAL PANEL ─── --}}
        <div x-show="mode==='manual'" x-cloak>
            <form wire:submit="quickCreate">
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem;">
                    <div>
                        <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">Blog</label>
                        <select wire:model.live="siteId" style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                            <option value="">Pilih Site...</option>
                            @foreach($this->sites as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                        @error('siteId') <p style="font-size:.75rem;color:#ef4444;margin-top:.25rem;">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">Kategori</label>
                        <div style="display:flex;gap:.4rem;align-items:center;">
                            <select wire:model.live="categoryMode" style="border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .5rem;font-size:.8rem;color:#111827;background:#fff;">
                                <option value="auto">🤖 Auto</option>
                                <option value="manual">Manual</option>
                            </select>
                            <select wire:model="pillar" x-show="$wire.categoryMode==='manual'" style="flex:1;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;">
                                <option value="">Pilih...</option>
                                @foreach($this->pillarOptions as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('pillar') <p style="font-size:.75rem;color:#ef4444;margin-top:.25rem;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div style="margin-bottom:1rem;">
                    <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">
                        Topik / Keyword <span style="font-weight:400;color:#9ca3af;font-size:.75rem;">— satu per baris atau pisahkan koma</span>
                    </label>
                    <textarea wire:model="topic" rows="3"
                        placeholder="Cara ekspor kopi ke Eropa&#10;Regulasi impor terbaru 2026&#10;..."
                        style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;resize:vertical;line-height:1.6;"></textarea>
                    @error('topic') <p style="font-size:.75rem;color:#ef4444;margin-top:.25rem;">{{ $message }}</p> @enderror
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;margin-bottom:1.25rem;">
                    <div>
                        <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">Bahasa</label>
                        <select wire:model="language" style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                            <option value="id">🇮🇩 Indonesia</option>
                            <option value="en">🇬🇧 English</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">Publish</label>
                        <select wire:model="publishMode" style="width:100%;border-radius:.5rem;border:1px solid #d1d5db;padding:.5rem .75rem;font-size:.875rem;color:#111827;background:#fff;box-sizing:border-box;">
                            <option value="published">⚡ Langsung Tayang</option>
                            <option value="draft">📝 Draft</option>
                        </select>
                    </div>
                    <div>
                        <label style="display:block;font-size:.875rem;font-weight:600;color:#374151;margin-bottom:.3rem;">Featured Image</label>
                        <label style="display:flex;align-items:center;gap:.5rem;cursor:pointer;padding:.55rem .75rem;border-radius:.5rem;border:1px solid #d1d5db;background:#f9fafb;">
                            <input type="checkbox" wire:model="autoFetchImage" style="width:1rem;height:1rem;accent-color:#2563eb;">
                            <span style="font-size:.8rem;color:#374151;font-weight:500;">Auto-Image</span>
                        </label>
                    </div>
                </div>

                <button type="submit" wire:loading.attr="disabled"
                    style="width:100%;background:#2563eb;color:#fff;border:none;border-radius:.6rem;padding:.85rem;font-size:.95rem;font-weight:700;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:.5rem;">
                    <span wire:loading.remove wire:target="quickCreate">✨ Generate &amp; Publish</span>
                    <span wire:loading wire:target="quickCreate">⏳ Memproses...</span>
                </button>
            </form>
        </div>
    </div>

    <style>@keyframes spin{to{transform:rotate(360deg)}}[x-cloak]{display:none!important}</style>

    {{-- Recent Articles Preview --}}
    @php
        $recentArticles = \App\Models\Article::with('site')
            ->latest('created_at')->take(3)->get(['id','title','site_id','status','scheduled_at','featured_image_url','created_at']);
    @endphp
    @if($recentArticles->count())
    <div style="margin-bottom:1.5rem;">
        <h3 style="font-size:.875rem;font-weight:600;color:#6b7280;margin:0 0 .75rem;text-transform:uppercase;letter-spacing:.05em;">Terakhir Dibuat</h3>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:.75rem;">
            @foreach($recentArticles as $ra)
            <a href="{{ route('filament.admin.resources.articles.edit', $ra) }}"
               style="display:flex;gap:.75rem;align-items:flex-start;padding:.75rem;border-radius:.5rem;border:1px solid #e5e7eb;background:#f9fafb;text-decoration:none;transition:border-color .15s"
               onmouseover="this.style.borderColor='#2563eb'" onmouseout="this.style.borderColor='#e5e7eb'">
                @if($ra->featured_image_url)
                <img src="{{ $ra->featured_image_url }}" alt="" style="width:48px;height:48px;object-fit:cover;border-radius:.375rem;flex-shrink:0">
                @else
                <div style="width:48px;height:48px;background:#e5e7eb;border-radius:.375rem;flex-shrink:0;display:flex;align-items:center;justify-content:center">
                    <span style="color:#9ca3af;font-size:1.25rem">📄</span>
                </div>
                @endif
                <div style="min-width:0">
                    <p style="font-size:.75rem;font-weight:600;color:#111827;line-height:1.3;margin:0 0 .25rem;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical">{{ $ra->title }}</p>
                    <div style="display:flex;align-items:center;gap:.375rem">
                        <span style="font-size:.65rem;padding:.125rem .375rem;border-radius:.25rem;font-weight:600;background:{{ $ra->status==='published'?'#dcfce7':($ra->status==='scheduled'?'#fef9c3':'#f3f4f6') }};color:{{ $ra->status==='published'?'#166534':($ra->status==='scheduled'?'#854d0e':'#6b7280') }}">{{ $ra->status }}</span>
                        <span style="font-size:.65rem;color:#9ca3af">{{ $ra->site->name ?? '—' }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Queue Table (live refresh every 15s) --}}
    <div wire:poll.15000ms style="background:#fff;border-radius:.75rem;border:1px solid #e5e7eb;padding:1.5rem;">
        <h2 style="font-size:1rem;font-weight:600;color:#111827;margin:0 0 1rem;display:flex;align-items:center;gap:.5rem;">
            <x-heroicon-o-queue-list style="width:1.25rem;height:1.25rem;color:#d97706;" />
            Publishing Queue
            <span wire:loading.delay style="font-size:.7rem;color:#9ca3af;font-weight:400;margin-left:auto">↻ syncing...</span>
        </h2>
        {{ $this->table }}
    </div>

    <style>
        @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    </style>
</x-filament-panels::page>
