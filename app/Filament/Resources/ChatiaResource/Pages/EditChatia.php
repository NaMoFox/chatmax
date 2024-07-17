<?php

namespace App\Filament\Resources\ChatiaResource\Pages;

use App\Filament\Resources\ChatiaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChatia extends EditRecord
{
    protected static string $resource = ChatiaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
