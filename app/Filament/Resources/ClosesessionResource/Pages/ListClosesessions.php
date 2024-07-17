<?php

namespace App\Filament\Resources\ClosesessionResource\Pages;

use App\Filament\Resources\ClosesessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClosesessions extends ListRecords
{
    protected static string $resource = ClosesessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Nueva Session'),
        ];
    }
}
