<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Models\Site;
use App\Services\AutoTagService;
use App\Services\SeoService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Publishing')
                ->schema([
                    Forms\Components\Select::make('site_id')
                        ->label('Site')
                        ->relationship('site', 'name')
                        ->required()
                        ->default(fn () => Site::where('is_active', true)->first()?->id)
                        ->live()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $site = Site::find($state);
                            if ($site) {
                                $pillars = $site->getPillarOptions();
                                $set('pillar', array_key_first($pillars) ?: 'regulasi');
                            }
                        }),
                    Forms\Components\Select::make('status')
                        ->options(['draft' => 'Draft', 'scheduled' => 'Scheduled', 'published' => 'Published'])
                        ->required()
                        ->default('draft'),
                    Forms\Components\Select::make('pillar')
                        ->options(fn (callable $get) => Site::find($get('site_id'))?->getPillarOptions() ?? [])
                        ->required()
                        ->default('regulasi'),
                    Forms\Components\Select::make('language')
                        ->options(fn (callable $get) => Site::find($get('site_id'))?->getLanguageOptions() ?? ['id' => 'Indonesia', 'en' => 'English'])
                        ->required()
                        ->default('id'),
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'name')
                        ->required(),
                    Forms\Components\DateTimePicker::make('published_at')->label('Published At'),
                    Forms\Components\DateTimePicker::make('scheduled_at')->label('Scheduled At'),
                ])
                ->columns(2),

            Forms\Components\Section::make('SEO Meta')
                ->schema([
                    Forms\Components\TextInput::make('title')->required()->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                    Forms\Components\TextInput::make('slug')->required()->maxLength(255)
                        ->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('og_title')->label('SEO Title')->maxLength(255),
                    Forms\Components\TextInput::make('focus_keyword')->maxLength(255),
                    Forms\Components\Textarea::make('meta_description')->maxLength(160)->columnSpanFull(),
                    Forms\Components\TextInput::make('featured_image_url')->url()->maxLength(255)->columnSpanFull(),
                    Forms\Components\TextInput::make('canonical_url')
                        ->label('Canonical URL')
                        ->url()
                        ->maxLength(255)
                        ->helperText('Kosongkan jika artikel ini adalah pemilik canonical. Isi jika artikel ini salinan dari domain lain.')
                        ->columnSpanFull(),
                    Forms\Components\Select::make('schema_type')
                        ->label('Schema Type')
                        ->options([
                            'Article'     => 'Article',
                            'BlogPosting' => 'BlogPosting',
                            'FAQPage'     => 'FAQPage',
                            'HowTo'       => 'HowTo',
                        ])
                        ->default('Article')
                        ->required(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Content')
                ->schema([
                    Forms\Components\RichEditor::make('content_html')->required()->columnSpanFull(),
                    Forms\Components\Textarea::make('excerpt')->columnSpanFull(),
                    Forms\Components\TextInput::make('word_count')->numeric()->default(0),
                ])
                ->columns(2),

            Forms\Components\Section::make('Auto Features')
                ->schema([
                    Forms\Components\Placeholder::make('auto_tags_info')
                        ->label('Auto Tags')
                        ->content('Tags will be auto-generated from title & content when saved.'),
                    Forms\Components\Placeholder::make('cross_post_info')
                        ->label('Cross-post Detection')
                        ->content('Duplicate detection runs automatically on save.'),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site.name')
                    ->label('Site')
                    ->badge()
                    ->color('gray')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable()->limit(50),
                Tables\Columns\TextColumn::make('pillar')
                    ->badge()
                    ->color(fn (string $state): string => match (true) {
                        str_contains($state, 'ai') || str_contains($state, 'teknologi') || str_contains($state, 'digital') => 'info',
                        str_contains($state, 'ekspor') || str_contains($state, 'impor') || str_contains($state, 'trading') || str_contains($state, 'dagang') => 'success',
                        str_contains($state, 'logistik') || str_contains($state, 'ppjk') || str_contains($state, 'pergudangan') || str_contains($state, 'maritim') => 'primary',
                        str_contains($state, 'regulasi') || str_contains($state, 'kepabeanan') || str_contains($state, 'bea-cukai') => 'warning',
                        str_contains($state, 'bisnis') || str_contains($state, 'umkm') || str_contains($state, 'sales') || str_contains($state, 'enterprise') || str_contains($state, 'crm') => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state, Article $record): string => $record->site?->getPillarOptions()[$state] ?? ucfirst(str_replace('-', ' ', $state))),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft'     => 'gray',
                        'scheduled' => 'warning',
                        'published' => 'success',
                        default     => 'gray',
                    }),
                Tables\Columns\TextColumn::make('language')->badge()->color('gray'),
                Tables\Columns\TextColumn::make('word_count')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('estimated_read_time')
                    ->label('Read Time')
                    ->suffix(' min')
                    ->sortable(),
                Tables\Columns\TextColumn::make('seo_score')
                    ->label('SEO')
                    ->badge()
                    ->color(fn (Article $record) => app(SeoService::class)->color(app(SeoService::class)->calculate($record)))
                    ->state(fn (Article $record) => app(SeoService::class)->calculate($record) . '%'),
                Tables\Columns\TextColumn::make('published_at')->dateTime('d M Y')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('site_id')
                    ->label('Site')
                    ->relationship('site', 'name'),
                Tables\Filters\SelectFilter::make('status')
                    ->options(['draft' => 'Draft', 'scheduled' => 'Scheduled', 'published' => 'Published']),
                Tables\Filters\SelectFilter::make('pillar')
                    ->options(fn () => \App\Models\Site::all()->flatMap(fn ($s) => $s->getPillarOptions())->toArray()),
                Tables\Filters\SelectFilter::make('language')
                    ->options(['id' => 'Indonesia', 'en' => 'English']),
            ])
            ->actions([
                Tables\Actions\Action::make('publish')
                    ->label('Publish')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Article $record) => $record->status !== 'published')
                    ->action(function (Article $record) {
                        $record->update(['status' => 'published', 'published_at' => now()]);
                        Notification::make()->title('✅ Article published')->success()->send();
                    }),
                Tables\Actions\Action::make('auto_tag')
                    ->label('Auto Tag')
                    ->icon('heroicon-o-tag')
                    ->color('gray')
                    ->action(function (Article $record) {
                        $autoTag = new AutoTagService();
                        $tags = $autoTag->generateTags($record);
                        $record->update(['tags' => $tags]);
                        Notification::make()
                            ->title('✅ Tags generated: ' . implode(', ', $tags))
                            ->success()
                            ->send();
                    }),
                Tables\Actions\Action::make('check_duplicates')
                    ->label('Check Duplicates')
                    ->icon('heroicon-o-exclamation-triangle')
                    ->color('warning')
                    ->action(function (Article $record) {
                        $autoTag = new AutoTagService();
                        $duplicates = $autoTag->detectDuplicates($record);
                        if (empty($duplicates)) {
                            Notification::make()
                                ->title('✅ No duplicates found')
                                ->success()
                                ->send();
                        } else {
                            $msg = collect($duplicates)
                                ->take(3)
                                ->map(fn ($d) => "{$d['title']} ({$d['similarity']})")
                                ->implode(' | ');
                            Notification::make()
                                ->title('⚠️ Duplicates: ' . $msg)
                                ->warning()
                                ->send();
                        }
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    BulkAction::make('publish_bulk')
                        ->label('Publish Selected')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {
                            $count = 0;
                            foreach ($records as $record) {
                                if ($record->status !== 'published') {
                                    $record->update(['status' => 'published', 'published_at' => now()]);
                                    $count++;
                                }
                            }
                            Notification::make()
                                ->title("✅ {$count} article(s) published")
                                ->success()
                                ->send();
                        }),
                    BulkAction::make('auto_tag_bulk')
                        ->label('Auto Tag Selected')
                        ->icon('heroicon-o-tag')
                        ->color('gray')
                        ->action(function (Collection $records) {
                            $autoTag = new AutoTagService();
                            $count = 0;
                            foreach ($records as $record) {
                                $tags = $autoTag->generateTags($record);
                                $record->update(['tags' => $tags]);
                                $count++;
                            }
                            Notification::make()
                                ->title("✅ {$count} articles tagged")
                                ->success()
                                ->send();
                        }),
                ]),
            ]);
    }

    public static function getRelations(): array { return []; }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit'   => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function calculateSeoScore(Article $article): int
    {
        return app(SeoService::class)->calculate($article);
    }
}
