<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestArticlesTable extends BaseWidget
{
    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Article::with('site')
                    ->where('status', 'published')
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('site.name')
                    ->label('Site')
                    ->badge()
                    ->color('gray'),
                Tables\Columns\TextColumn::make('title')
                    ->limit(40)
                    ->searchable(),
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
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ]);
    }
}
