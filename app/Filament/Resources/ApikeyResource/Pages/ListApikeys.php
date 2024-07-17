<?php

namespace App\Filament\Resources\ApikeyResource\Pages;

use App\Filament\Resources\ApikeyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApikeys extends ListRecords
{
    protected static string $resource = ApikeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Nueva ApiKey'),
        ];
    }
}
