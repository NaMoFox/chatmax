<?php

namespace App\Filament\Resources\ApikeyResource\Pages;

use App\Filament\Resources\ApikeyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApikey extends CreateRecord
{
    protected static string $resource = ApikeyResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
