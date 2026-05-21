<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteResource\Pages;
use App\Models\Site;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiteResource extends Resource
{
    protected static ?string $model = Site::class;
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationGroup = 'System';
    protected static ?int $navigationSort = 0;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Site Information')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Site Name')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(1),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true)
                        ->helperText('URL-friendly identifier (e.g., "m2b", "gma-world")')
                        ->columnSpan(1),
                    Forms\Components\TextInput::make('domain')
                        ->label('Domain')
                        ->url()
                        ->maxLength(255)
                        ->placeholder('e.g., m2b.co.id')
                        ->columnSpan(1),
                    Forms\Components\Toggle::make('is_active')
                        ->label('Active')
                        ->default(true)
                        ->columnSpan(1),
                ])
                ->columns(2),

            Forms\Components\Section::make('Branding')
                ->schema([
                    Forms\Components\TextInput::make('logo_url')
                        ->label('Logo URL')
                        ->url()
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('whatsapp_number')
                        ->label('WhatsApp Number')
                        ->maxLength(50)
                        ->placeholder('e.g., +6281263027818')
                        ->columnSpan(1),
                ]),

            Forms\Components\Section::make('Anthropic AI')
                ->description('Per-site AI configuration. Falls back to global settings if empty.')
                ->schema([
                    Forms\Components\TextInput::make('anthropic_api_key')
                        ->label('Anthropic API Key')
                        ->password()
                        ->revealable()
                        ->columnSpanFull(),
                    Forms\Components\Select::make('anthropic_model')
                        ->label('AI Model')
                        ->options([
                            'claude-sonnet-4-20250514' => 'Claude Sonnet 4 (Recommended)',
                            'claude-3-5-sonnet-20241022' => 'Claude 3.5 Sonnet',
                            'claude-opus-4-20250514' => 'Claude Opus 4',
                            'claude-3-5-haiku-20241022' => 'Claude 3.5 Haiku',
                        ])
                        ->default('claude-sonnet-4-20250514'),
                    Forms\Components\Textarea::make('ai_prompt_context')
                        ->label('AI Prompt Context')
                        ->helperText('Additional context injected into AI prompts (company description, brand voice, etc.)')
                        ->placeholder('e.g., M2B is a freight forwarding & PPJK company based in Medan...')
                        ->columnSpanFull()
                        ->rows(4),
                ]),

            Forms\Components\Section::make('WordPress')
                ->description('Leave empty if this site does not use WordPress.')
                ->schema([
                    Forms\Components\TextInput::make('wp_url')
                        ->label('WordPress URL')
                        ->url()
                        ->placeholder('https://m2b.co.id'),
                    Forms\Components\TextInput::make('wp_username')
                        ->label('Username'),
                    Forms\Components\TextInput::make('wp_app_password')
                        ->label('Application Password')
                        ->password()
                        ->revealable(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Content Configuration')
                ->schema([
                    Forms\Components\KeyValue::make('content_pillars')
                        ->label('Content Pillars')
                        ->helperText('Key-value pairs: key => label (e.g., regulasi => Regulasi)')
                        ->columnSpanFull(),
                    Forms\Components\Select::make('languages')
                        ->label('Supported Languages')
                        ->multiple()
                        ->options([
                            'id' => '🇮🇩 Indonesia',
                            'en' => '🇬🇧 English',
                        ])
                        ->default(['id', 'en']),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('domain')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('articles_count')
                    ->label('Articles')
                    ->counts('articles')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('name')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSites::route('/'),
            'create' => Pages\CreateSite::route('/create'),
            'edit'   => Pages\EditSite::route('/{record}/edit'),
        ];
    }
}
