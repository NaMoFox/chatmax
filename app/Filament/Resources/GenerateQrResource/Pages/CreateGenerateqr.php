<?php

namespace App\Filament\Resources\GenerateqrResource\Pages;

use App\Filament\Resources\GenerateqrResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGenerateqr extends CreateRecord
{
    protected static string $resource = GenerateqrResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
