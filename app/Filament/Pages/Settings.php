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
            'anthropic_api_key' => Setting::get('anthropic_api_key', ''),
            'anthropic_model'   => Setting::get('anthropic_model', 'claude-sonnet-4-6'),
            'openai_model'      => Setting::get('openai_model', 'gpt-4o-mini'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Anthropic AI')
                    ->schema([
                        Forms\Components\TextInput::make('anthropic_api_key')
                            ->label('Hybrid API Keys')
                            ->password()
                            ->revealable()
                            ->required()
                            ->helperText('Pisahkan banyak key dengan koma. Beri prefix provider: openai:KEY, gemini:KEY, deepseek:KEY, kimi:KEY, qwen:KEY, glm:KEY. Key OpenAI WAJIB pakai prefix openai: (atau sk-proj-...) agar tidak salah dideteksi sebagai DeepSeek. Loop mencoba key berurutan & fallback ke berikutnya bila gagal.')
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
                            ->required(),
                        Forms\Components\TextInput::make('openai_model')
                            ->label('OpenAI Model ID')
                            ->placeholder('gpt-4o-mini')
                            ->helperText('ID model OpenAI PERSIS dari dashboard akunmu (mis. gpt-4o-mini). Dipakai saat key berprefix openai: aktif. Jangan tebak nama model—salah ID = error 404.')
                            ->required(),
                    ]),

            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::set('anthropic_api_key', $data['anthropic_api_key'], 'ai', true);
        Setting::set('anthropic_model', $data['anthropic_model'], 'ai', false);
        Setting::set('openai_model', $data['openai_model'], 'ai', false);

        cache()->forget('settings_all');

        Notification::make()
            ->title('Settings saved successfully.')
            ->success()
            ->send();
    }
}
