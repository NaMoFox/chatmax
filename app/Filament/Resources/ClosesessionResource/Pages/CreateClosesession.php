<?php

namespace App\Filament\Resources\ClosesessionResource\Pages;

use App\Filament\Resources\ClosesessionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClosesession extends CreateRecord
{
    protected static string $resource = ClosesessionResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
