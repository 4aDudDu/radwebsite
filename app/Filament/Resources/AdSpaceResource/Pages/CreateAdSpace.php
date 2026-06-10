<?php

namespace App\Filament\Resources\AdSpaceResource\Pages;

use App\Filament\Resources\AdSpaceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdSpace extends CreateRecord
{
    protected static string $resource = AdSpaceResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
