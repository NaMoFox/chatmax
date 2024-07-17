<?php

namespace App\Filament\Resources\WelcomeResource\Pages;

use App\Filament\Resources\WelcomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWelcomes extends ListRecords
{
    protected static string $resource = WelcomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Nuevo Mensaje'),
        ];
    }
}
