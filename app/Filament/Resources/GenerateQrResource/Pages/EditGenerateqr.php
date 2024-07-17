<?php

namespace App\Filament\Resources\GenerateqrResource\Pages;

use App\Filament\Resources\GenerateqrResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGenerateqr extends EditRecord
{
    protected static string $resource = GenerateqrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
