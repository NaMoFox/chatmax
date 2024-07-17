<?php

namespace App\Filament\Resources\ChatiaResource\Pages;

use App\Filament\Resources\ChatiaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateChatia extends CreateRecord
{
    protected static string $resource = ChatiaResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
