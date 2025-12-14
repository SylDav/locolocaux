<?php

namespace App\Filament\Resources\Companies\Pages;

use App\Filament\Resources\Companies\CompanyResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;

    protected static ?string $recordTitleAttribute = "Ajouter une société";

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
