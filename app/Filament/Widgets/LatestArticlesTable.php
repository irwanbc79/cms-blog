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
                Tables\Columns\BadgeColumn::make('pillar')
                    ->colors(['warning' => 'regulasi', 'success' => 'umkm', 'info' => 'news', 'primary' => 'logistik']),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors(['gray' => 'draft', 'warning' => 'scheduled', 'success' => 'published']),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ]);
    }
}
