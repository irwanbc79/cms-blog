<?php

namespace App\Filament\Resources\TopicIdeaResource\Pages;

use App\Filament\Resources\TopicIdeaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopicIdea extends EditRecord
{
    protected static string $resource = TopicIdeaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
