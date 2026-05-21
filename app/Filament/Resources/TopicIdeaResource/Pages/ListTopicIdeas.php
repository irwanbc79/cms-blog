<?php

namespace App\Filament\Resources\TopicIdeaResource\Pages;

use App\Filament\Resources\TopicIdeaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTopicIdeas extends ListRecords
{
    protected static string $resource = TopicIdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
