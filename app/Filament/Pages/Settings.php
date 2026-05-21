<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'System';
    protected static ?string $navigationLabel = 'Settings';
    protected static string $view = 'filament.pages.settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'anthropic_api_key'   => Setting::get('anthropic_api_key', ''),
            'anthropic_model'     => Setting::get('anthropic_model', 'claude-sonnet-4-20250514'),
            'wp_url'              => Setting::get('wp_url', 'https://m2b.co.id'),
            'wp_username'         => Setting::get('wp_username', ''),
            'wp_app_password'     => Setting::get('wp_app_password', ''),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Anthropic AI')
                    ->schema([
                        Forms\Components\TextInput::make('anthropic_api_key')
                            ->label('Anthropic API Key')
                            ->password()
                            ->revealable()
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('anthropic_model')
                            ->label('AI Model')
                            ->options([
                                'claude-sonnet-4-20250514' => 'Claude Sonnet 4 (Recommended)',
                                'claude-3-5-sonnet-20241022' => 'Claude 3.5 Sonnet',
                                'claude-opus-4-20250514' => 'Claude Opus 4',
                                'claude-3-5-haiku-20241022' => 'Claude 3.5 Haiku',
                            ])
                            ->required(),
                    ]),

                Forms\Components\Section::make('WordPress')
                    ->schema([
                        Forms\Components\TextInput::make('wp_url')
                            ->label('WordPress URL')
                            ->url()
                            ->required()
                            ->default('https://m2b.co.id'),
                        Forms\Components\TextInput::make('wp_username')
                            ->label('Username')
                            ->required(),
                        Forms\Components\TextInput::make('wp_app_password')
                            ->label('Application Password')
                            ->password()
                            ->revealable()
                            ->required(),
                    ])
                    ->columns(2),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::set('anthropic_api_key', $data['anthropic_api_key'], 'ai', true);
        Setting::set('anthropic_model', $data['anthropic_model'], 'ai', false);
        Setting::set('wp_url', $data['wp_url'], 'wordpress', false);
        Setting::set('wp_username', $data['wp_username'], 'wordpress', false);
        Setting::set('wp_app_password', $data['wp_app_password'], 'wordpress', true);

        cache()->forget('settings_all');

        Notification::make()
            ->title('Settings saved successfully.')
            ->success()
            ->send();
    }
}
