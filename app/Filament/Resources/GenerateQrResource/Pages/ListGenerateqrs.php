<?php

namespace App\Filament\Resources\GenerateqrResource\Pages;

use App\Filament\Resources\GenerateqrResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGenerateqrs extends ListRecords
{
    protected static string $resource = GenerateqrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Nuevo QR'), 
            
        ];
    }
 
}

