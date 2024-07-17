<?php

namespace App\Filament\Resources\ClosesessionResource\Pages;

use App\Filament\Resources\ClosesessionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClosesession extends EditRecord
{
    protected static string $resource = ClosesessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
