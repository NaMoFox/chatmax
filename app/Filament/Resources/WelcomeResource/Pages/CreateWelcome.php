<?php

namespace App\Filament\Resources\WelcomeResource\Pages;

use App\Filament\Resources\WelcomeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWelcome extends CreateRecord
{
    protected static string $resource = WelcomeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
