<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;

class ArticlesByPillarChart extends ChartWidget
{
    protected static ?int $sort = 2;
    protected static ?string $heading = 'Articles by Pillar';

    protected function getData(): array
    {
        $data = Article::selectRaw('pillar, count(*) as total')
            ->groupBy('pillar')
            ->pluck('total', 'pillar')
            ->toArray();

        $labels = \App\Models\Site::all()->flatMap(fn ($s) => $s->getPillarOptions())->toArray();

        $colors = [
            'regulasi' => '#f59e0b',
            'umkm'     => '#10b981',
            'news'     => '#3b82f6',
            'logistik' => '#8b5cf6',
        ];

        $keys = array_keys($data);

        return [
            'datasets' => [
                [
                    'label' => 'All Sites',
                    'data' => array_values($data),
                    'backgroundColor' => array_map(function($k) use ($colors) {
                        if (isset($colors[$k])) return $colors[$k];
                        if (str_contains($k, 'ai') || str_contains($k, 'teknologi')) return '#06b6d4'; // Cyan
                        if (str_contains($k, 'ekspor') || str_contains($k, 'impor')) return '#10b981'; // Green
                        if (str_contains($k, 'logistik') || str_contains($k, 'ppjk')) return '#3b82f6'; // Blue
                        return '#6b7280'; // Gray
                    }, $keys),
                    'borderColor' => '#1f2937',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => array_map(fn($k) => $labels[$k] ?? ucfirst(str_replace('-', ' ', $k)), $keys),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
