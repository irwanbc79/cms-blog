<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\TopicIdea;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalArticles    = Article::count();
        $publishedCount   = Article::where('status', 'published')->count();
        $draftCount       = Article::where('status', 'draft')->count();
        $scheduledCount   = Article::where('status', 'scheduled')->count();
        $wpPublishedCount = Article::whereNotNull('wp_post_id')->count();
        $totalIdeas       = TopicIdea::count();
        $usedIdeas        = TopicIdea::where('is_used', true)->count();

        return [
            Stat::make('Total Articles', $totalArticles)
                ->description($publishedCount . ' published, ' . $draftCount . ' drafts')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('info'),

            Stat::make('Published to WordPress', $wpPublishedCount)
                ->description($scheduledCount . ' scheduled for publishing')
                ->descriptionIcon('heroicon-o-globe-alt')
                ->color('success'),

            Stat::make('Topic Ideas', $totalIdeas)
                ->description($usedIdeas . ' used, ' . ($totalIdeas - $usedIdeas) . ' available')
                ->descriptionIcon('heroicon-o-light-bulb')
                ->color('warning'),
        ];
    }
}
