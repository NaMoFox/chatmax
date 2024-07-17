<?php

namespace App\Filament\Resources\ChatbotResource\Pages;

use App\Filament\Resources\ChatbotResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateChatbot extends CreateRecord
{
    protected static string $resource = ChatbotResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
