<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Models\Site;
use App\Services\WordPressService;
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
        return $form->schema([                    Forms\Components\Section::make('Publishing')
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
                    Forms\Components\TextInput::make('seo_title')->maxLength(255),
                    Forms\Components\TextInput::make('focus_keyword')->maxLength(255),
                    Forms\Components\Textarea::make('meta_description')->maxLength(160)->columnSpanFull(),
                    Forms\Components\TextInput::make('featured_image_url')->url()->maxLength(255)->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Content')
                ->schema([
                    Forms\Components\RichEditor::make('content_html')->required()->columnSpanFull(),
                    Forms\Components\Textarea::make('excerpt')->columnSpanFull(),
                    Forms\Components\TextInput::make('word_count')->numeric()->default(0),
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
                Tables\Columns\BadgeColumn::make('pillar')
                    ->colors(['warning' => 'regulasi', 'success' => 'umkm', 'info' => 'news', 'primary' => 'logistik']),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['gray' => 'draft', 'warning' => 'scheduled', 'success' => 'published']),
                Tables\Columns\TextColumn::make('language')->badge()->color('gray'),
                Tables\Columns\TextColumn::make('word_count')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('estimated_read_time')
                    ->label('Read Time')
                    ->suffix(' min')
                    ->sortable(),
                Tables\Columns\TextColumn::make('seo_score')
                    ->label('SEO')
                    ->badge()
                    ->color(fn (Article $record) => match (true) {
                        static::calculateSeoScore($record) >= 80 => 'success',
                        static::calculateSeoScore($record) >= 50 => 'warning',
                        default => 'danger',
                    })
                    ->state(fn (Article $record) => static::calculateSeoScore($record) . '%'),
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
                    ->options(['regulasi' => 'Regulasi', 'umkm' => 'UMKM Ekspor', 'news' => 'News', 'logistik' => 'Logistik']),
                Tables\Filters\SelectFilter::make('language')
                    ->options(['id' => 'Indonesia', 'en' => 'English']),
            ])
            ->actions([
                Tables\Actions\Action::make('publish_wp')
                    ->label('Push to WP')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->color('success')
                    ->requiresConfirmation()
                    ->action(function (Article $record) {
                        try {
                            $wp = new WordPressService($record->site);
                            $result = $wp->publishArticle($record);
                            $record->update([
                                'wp_post_id'   => $result['id'],
                                'wp_post_url'  => $result['link'],
                                'status'       => $result['status'] === 'publish' ? 'published' : 'draft',
                                'published_at' => now(),
                            ]);
                            Notification::make()->title('✅ Published: ' . $result['link'])->success()->send();
                        } catch (\Exception $e) {
                            Notification::make()->title('❌ ' . $e->getMessage())->danger()->send();
                        }
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    BulkAction::make('publish_wp_bulk')
                        ->label('Push to WP')
                        ->icon('heroicon-o-arrow-up-tray')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function (Collection $records) {
                            $success = 0;
                            $errors = [];
                            foreach ($records as $record) {
                                try {
                                    $record->load('site');
                                    $wp = new WordPressService($record->site);
                                    $result = $wp->publishArticle($record);
                                    $record->update([
                                        'wp_post_id'   => $result['id'],
                                        'wp_post_url'  => $result['link'],
                                        'status'       => $result['status'] === 'publish' ? 'published' : 'draft',
                                        'published_at' => $result['status'] === 'publish' ? now() : null,
                                    ]);
                                    $success++;
                                } catch (\Exception $e) {
                                    $errors[] = "{$record->title}: {$e->getMessage()}";
                                }
                            }
                            if ($success > 0) {
                                Notification::make()
                                    ->title("✅ {$success} article(s) published to WordPress")
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
        $score = 0;

        // Title presence & length
        if (! empty($article->title)) {
            $score += 10;
            if (strlen($article->title) >= 30 && strlen($article->title) <= 60) {
                $score += 5;
            }
        }

        // Meta description
        if (! empty($article->meta_description)) {
            $score += 15;
            if (strlen($article->meta_description) <= 160) {
                $score += 5;
            }
        }

        // Focus keyword
        if (! empty($article->focus_keyword)) {
            $score += 15;
        }

        // SEO title
        if (! empty($article->og_title)) {
            $score += 10;
        }

        // Content quality
        if (! empty($article->content_html)) {
            $score += 10;
            if (($article->word_count ?? 0) >= 1000) {
                $score += 10;
            }
            if (($article->word_count ?? 0) >= 1500) {
                $score += 5;
            }
        }

        // Tags
        $tags = $article->tags ?? [];
        if (count($tags) >= 3) {
            $score += 5;
        }
        if (count($tags) >= 5) {
            $score += 5;
        }

        // FAQ schema
        $faq = $article->schema_faq ?? [];
        if (count($faq) >= 3) {
            $score += 5;
        }

        return min(100, $score);
    }
}
