<?php

namespace App\Filament\Pages;

use App\Jobs\GenerateArticleJob;
use App\Models\Article;
use App\Models\Site;
use App\Models\TopicIdea;
use App\Services\WordPressService;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class ContentStudio extends Page implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    protected static ?string $navigationIcon  = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Content Studio';
    protected static ?int    $navigationSort  = 0;
    protected static ?string $slug            = 'content-studio';
    protected static string  $view            = 'filament.pages.content-studio';

    // ─── Quick Create Form ──────────────────────────────────────────────────────

    public ?int    $siteId        = null;
    public string  $pillar        = '';
    public string  $topic         = '';
    public string  $language      = 'id';
    public int     $articleCount  = 1;
    public ?string $scheduleStart = null;
    public int     $scheduleGap   = 1; // days between articles

    public function getTitle(): string
    {
        return 'Content Studio';
    }

    public function getPillarOptionsProperty(): array
    {
        $site = $this->siteId ? Site::find($this->siteId) : null;
        return $site?->getPillarOptions() ?? [
            'regulasi' => 'Regulasi',
            'umkm'     => 'UMKM Ekspor',
            'news'     => 'News',
            'logistik' => 'Logistik',
        ];
    }

    public function getLanguageOptionsProperty(): array
    {
        $site = $this->siteId ? Site::find($this->siteId) : null;
        return $site?->getLanguageOptions() ?? [
            'id' => '🇮🇩 Indonesia',
            'en' => '🇬🇧 English',
        ];
    }

    public function quickCreate(): void
    {
        $this->validate([
            'siteId'       => 'required|exists:sites,id',
            'pillar'       => 'required|string',
            'topic'        => 'required|min:5|max:255',
            'language'     => 'required|string',
            'articleCount' => 'required|integer|min:1|max:30',
        ]);

        $scheduleDate = $this->scheduleStart
            ? \Carbon\Carbon::parse($this->scheduleStart)
            : now()->addDay()->setHour(8)->setMinute(0);

        $userId = auth()->id();

        for ($i = 0; $i < $this->articleCount; $i++) {
            GenerateArticleJob::dispatch(
                $this->siteId,
                $this->topic,
                $this->pillar,
                $this->language,
                $scheduleDate->copy()->toDateTimeString(),
                $userId,
            );
            $scheduleDate->addDays($this->scheduleGap);
        }

        Notification::make()
            ->title("🚀 {$this->articleCount} article(s) queued — generating in background")
            ->body('Refresh halaman ini dalam 2-3 menit untuk melihat hasilnya.')
            ->success()
            ->send();

        $this->topic = '';
    }

    // ─── Table: Queue Overview ──────────────────────────────────────────────────

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Article::query()
                    ->with('site')
                    ->whereIn('status', ['draft', 'scheduled'])
                    ->latest('created_at')
            )
            ->columns([
                TextColumn::make('site.name')
                    ->label('Site')
                    ->badge()
                    ->color('gray')
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable()
                    ->limit(40),
                TextColumn::make('pillar')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'regulasi' => 'warning',
                        'umkm'     => 'success',
                        'news'     => 'info',
                        'logistik' => 'primary',
                        default    => 'gray',
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft'     => 'gray',
                        'scheduled' => 'warning',
                        default     => 'gray',
                    }),
                TextColumn::make('language')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('scheduled_at')
                    ->label('Scheduled')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Action::make('publish_now')
                    ->label('Publish Now')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Article $record) {
                        try {
                            $wp = new WordPressService($record->site);
                            $result = $wp->publishArticle($record, 'publish');
                            $record->update([
                                'wp_post_id'   => $result['id'],
                                'wp_post_url'  => $result['link'],
                                'status'       => 'published',
                                'published_at' => now(),
                            ]);
                            Notification::make()
                                ->title("✅ Published: {$result['link']}")
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title("❌ {$e->getMessage()}")
                                ->danger()
                                ->send();
                        }
                    }),
                Action::make('edit')
                    ->url(fn (Article $record): string => route('filament.admin.resources.articles.edit', $record)),
            ])
            ->bulkActions([
                BulkAction::make('publish_bulk')
                    ->label('Publish Selected')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Collection $records) {
                        $success = 0;
                        $errors  = [];
                        foreach ($records as $record) {
                            try {
                                $record->load('site');
                                $wp = new WordPressService($record->site);
                                $result = $wp->publishArticle($record, 'publish');
                                $record->update([
                                    'wp_post_id'   => $result['id'],
                                    'wp_post_url'  => $result['link'],
                                    'status'       => 'published',
                                    'published_at' => now(),
                                ]);
                                $success++;
                            } catch (\Exception $e) {
                                $errors[] = "{$record->title}: {$e->getMessage()}";
                            }
                        }
                        if ($success > 0) {
                            Notification::make()
                                ->title("✅ {$success} article(s) published")
                                ->success()
                                ->send();
                        }
                        if (! empty($errors)) {
                            Notification::make()
                                ->title('❌ ' . implode(' | ', array_slice($errors, 0, 3)))
                                ->danger()
                                ->send();
                        }
                    }),
            ]);
    }

    // ─── Dashboard Stats ────────────────────────────────────────────────────────

    public function getStats(): array
    {
        $counts = Article::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN status = 'published' THEN 1 ELSE 0 END) as published,
            SUM(CASE WHEN status = 'draft' THEN 1 ELSE 0 END) as draft,
            SUM(CASE WHEN status = 'scheduled' THEN 1 ELSE 0 END) as scheduled
        ")->first();

        $siteStats = Article::join('sites', 'articles.site_id', '=', 'sites.id')
            ->where('sites.is_active', true)
            ->selectRaw('sites.name, COUNT(*) as count')
            ->groupBy('sites.name')
            ->pluck('count', 'name');

        $queueCount = Article::whereIn('status', ['draft', 'scheduled'])->count();

        return [
            'total'     => $counts->total ?? 0,
            'published' => $counts->published ?? 0,
            'draft'     => $counts->draft ?? 0,
            'scheduled' => $counts->scheduled ?? 0,
            'queue'     => $queueCount,
            'sites'     => $siteStats,
            'activeSites' => Site::where('is_active', true)->count(),
        ];
    }
}
