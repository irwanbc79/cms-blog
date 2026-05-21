<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Services\WordPressService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

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
                    Forms\Components\Select::make('status')
                        ->options(['draft' => 'Draft', 'scheduled' => 'Scheduled', 'published' => 'Published'])
                        ->required()
                        ->default('draft'),
                    Forms\Components\Select::make('pillar')
                        ->options(['regulasi' => 'Regulasi', 'umkm' => 'UMKM Ekspor', 'news' => 'News', 'logistik' => 'Logistik'])
                        ->required()
                        ->default('regulasi'),
                    Forms\Components\Select::make('language')
                        ->options(['id' => 'Indonesia', 'en' => 'English'])
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
                    Forms\Components\TextInput::make('slug')->required()->maxLength(255),
                    Forms\Components\TextInput::make('seo_title')->maxLength(255),
                    Forms\Components\TextInput::make('focus_keyword')->maxLength(255),
                    Forms\Components\Textarea::make('meta_description')->maxLength(160)->columnSpanFull(),
                    Forms\Components\TextInput::make('featured_image_url')->url()->maxLength(255)->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Content')
                ->schema([
                    Forms\Components\RichEditor::make('content')->required()->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('title')->searchable()->limit(50),
                Tables\Columns\BadgeColumn::make('pillar')
                    ->colors(['warning' => 'regulasi', 'success' => 'umkm', 'info' => 'news', 'primary' => 'logistik']),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['gray' => 'draft', 'warning' => 'scheduled', 'success' => 'published']),
                Tables\Columns\TextColumn::make('language')->badge()->color('gray'),
                Tables\Columns\TextColumn::make('word_count')->numeric()->sortable(),
                Tables\Columns\TextColumn::make('published_at')->dateTime('d M Y')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
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
                            $wp = new WordPressService();
                            $result = $wp->publishArticle($record);
                            $record->update([
                                'wp_post_id'   => $result['id'],
                                'wp_url'       => $result['link'],
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
}
