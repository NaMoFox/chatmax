<?php

namespace App\Filament\Resources\ChatiaResource\Pages;

use App\Filament\Resources\ChatiaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChatias extends ListRecords
{
    protected static string $resource = ChatiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Nuevo Chatbot_IA'),
        ];
    }
}
