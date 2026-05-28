<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Site;
use App\Models\TopicIdea;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        // Single aggregate query instead of 6 separate COUNT queries
        $counts = Article::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN status = 'published' THEN 1 ELSE 0 END) as published,
            SUM(CASE WHEN status = 'draft' THEN 1 ELSE 0 END) as draft,
            SUM(CASE WHEN status = 'scheduled' THEN 1 ELSE 0 END) as scheduled,
            SUM(CASE WHEN wp_post_id IS NOT NULL THEN 1 ELSE 0 END) as wp_published
        ")->first();

        $ideaCounts = TopicIdea::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN is_used = 1 THEN 1 ELSE 0 END) as used
        ")->first();

        // Per-site statistics (single query)
        $siteStats = Article::join('sites', 'articles.site_id', '=', 'sites.id')
            ->where('sites.is_active', true)
            ->selectRaw('sites.name, COUNT(*) as count')
            ->groupBy('sites.name')
            ->pluck('count', 'name')
            ->map(fn ($count, $name) => "{$name}: {$count}")
            ->implode(', ');

        $activeSites = Site::where('is_active', true)->count();

        return [
            Stat::make('Total Articles', $counts->total ?? 0)
                ->description(($counts->published ?? 0) . ' published, ' . ($counts->draft ?? 0) . ' drafts')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('info'),

            Stat::make('Published to WordPress', $counts->wp_published ?? 0)
                ->description(($counts->scheduled ?? 0) . ' scheduled')
                ->descriptionIcon('heroicon-o-globe-alt')
                ->color('success'),

            Stat::make('Active Sites', $activeSites)
                ->description($siteStats ?: 'No articles yet')
                ->descriptionIcon('heroicon-o-globe-alt')
                ->color('warning'),

            Stat::make('Topic Ideas', $ideaCounts->total ?? 0)
                ->description(($ideaCounts->used ?? 0) . ' used, ' . (($ideaCounts->total ?? 0) - ($ideaCounts->used ?? 0)) . ' available')
                ->descriptionIcon('heroicon-o-light-bulb')
                ->color('warning'),
        ];
    }
}
