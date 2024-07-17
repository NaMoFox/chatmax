<?php

namespace App\Filament\Resources\ApikeyResource\Pages;

use App\Filament\Resources\ApikeyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApikey extends EditRecord
{
    protected static string $resource = ApikeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
