<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteResource\Pages;
use App\Models\Site;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

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
                        ->maxLength(255)
                        ->placeholder('e.g., m2b.co.id (tanpa https://)')
                        ->helperText('Hanya hostname, tanpa https:// — contoh: dira.co.id')
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
                    Forms\Components\TextInput::make('contact_email')
                        ->label('Contact Email')
                        ->email()
                        ->maxLength(100)
                        ->placeholder('e.g., sales@m2b.co.id')
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
                            'claude-sonnet-4-6'          => 'Claude Sonnet 4.6 (Recommended)',
                            'claude-opus-4-7'            => 'Claude Opus 4.7 (Most capable)',
                            'claude-haiku-4-5-20251001'  => 'Claude Haiku 4.5 (Fast)',
                            'claude-3-5-sonnet-20241022' => 'Claude 3.5 Sonnet (Stable)',
                            'claude-3-5-haiku-20241022'  => 'Claude 3.5 Haiku (Stable/Fast)',
                        ])
                        ->default('claude-sonnet-4-6'),
                    Forms\Components\Textarea::make('ai_prompt_context')
                        ->label('AI Prompt Context')
                        ->helperText('Additional context injected into AI prompts (company description, brand voice, etc.)')
                        ->placeholder('e.g., M2B is a freight forwarding & PPJK company based in Medan...')
                        ->columnSpanFull()
                        ->rows(4),
                ]),

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

            Forms\Components\Section::make('💰 AdSense & Analytics')
                ->description('Per-site monetization and tracking configuration.')
                ->schema([
                    Forms\Components\TextInput::make('adsense_publisher_id')
                        ->label('AdSense Publisher ID')
                        ->placeholder('pub-5616961797801657')
                        ->maxLength(50)
                        ->columnSpan(1),
                    Forms\Components\TextInput::make('google_analytics_id')
                        ->label('GA4 Measurement ID')
                        ->placeholder('G-XXXXXXXXXX')
                        ->maxLength(50)
                        ->columnSpan(1),
                    Forms\Components\TextInput::make('google_site_verification')
                        ->label('Google Site Verification')
                        ->maxLength(100)
                        ->columnSpanFull(),
                    Forms\Components\KeyValue::make('adsense_ad_slots')
                        ->label('Ad Unit Slot IDs')
                        ->keyLabel('Placement')
                        ->valueLabel('Slot ID')
                        ->helperText('Placements: in_article, in_feed, display_top, display_bottom, multiplex')
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('ads_txt_content')
                        ->label('ads.txt Content')
                        ->helperText('This content is auto-served at /ads.txt for this domain. Include your AdSense publisher entry.')
                        ->default('google.com, pub-5616961797801657, DIRECT, f08c47fec0942fa0')
                        ->rows(3)
                        ->columnSpanFull(),
                ])
                ->columns(2),

            Forms\Components\Section::make('🔌 API & Webhook')
                ->description('Untuk distribusi konten ke domain non-WordPress (dira, gma, dll).')
                ->schema([
                    Forms\Components\TextInput::make('api_token')
                        ->label('API Token')
                        ->maxLength(64)
                        ->readOnly()
                        ->helperText('Digunakan sebagai Bearer token di header Authorization.')
                        ->suffixAction(
                            Forms\Components\Actions\Action::make('generate_token')
                                ->label('Generate')
                                ->icon('heroicon-o-arrow-path')
                                ->action(function ($set) {
                                    $set('api_token', bin2hex(random_bytes(32)));
                                })
                        )
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('webhook_url')
                        ->label('Webhook URL')
                        ->url()
                        ->maxLength(255)
                        ->helperText('URL yang di-ping saat artikel dipublish (untuk cache revalidation).')
                        ->placeholder('https://dira.co.id/api/revalidate')
                        ->columnSpanFull(),
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
