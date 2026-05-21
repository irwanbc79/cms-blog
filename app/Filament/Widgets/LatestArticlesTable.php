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
                    ->orWhere(function ($q) {
                        $q->whereNotNull('wp_post_id');
                    })
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
                Tables\Columns\BadgeColumn::make('pillar')
                    ->colors(['warning' => 'regulasi', 'success' => 'umkm', 'info' => 'news', 'primary' => 'logistik']),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['gray' => 'draft', 'warning' => 'scheduled', 'success' => 'published']),
                Tables\Columns\TextColumn::make('wp_post_url')
                    ->label('WP URL')
                    ->limit(30)
                    ->url(fn ($record) => $record->wp_post_url, true)
                    ->color('primary'),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ]);
    }
}
