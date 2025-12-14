<?php

namespace App\Filament\Resources\Companies\Pages;

use App\Filament\Resources\Companies\CompanyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCompanies extends ListRecords
{
    protected static string $resource = CompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Ajouter une société')
                ->icon('heroicon-o-plus')
                // ->authorize(fn () => auth()->user()->can('create', \App\Models\Company::class))
                ->modalHeading('Ajouter une nouvelle société')
        ];
    }
}
