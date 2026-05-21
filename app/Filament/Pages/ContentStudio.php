<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ContentStudio extends Page
{
    protected static ?string $navigationIcon  = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Content Studio';
    protected static ?int    $navigationSort  = 0;
    protected static ?string $slug            = 'content-studio';
    protected static string  $view            = 'filament.pages.content-studio';

    public function getTitle(): string
    {
        return 'Content Studio';
    }
}
