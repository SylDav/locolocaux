<?php

namespace App\Filament\Resources\Companies\Pages;

use App\Filament\Resources\Companies\CompanyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;

class EditCompany extends EditRecord
{
    protected static string $resource = CompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $company = $this->record;

        $data['address'] = $company->address?->toArray() ?? [];
        $data['contact'] = $company->contact?->toArray() ?? [];

        return $data;
    }

    protected function afterSave(): void
    {
        $data = $this->form->getState();
        
        // Transactionnel pour sécurité
        DB::transaction(function () use ($data) {
            $this->record->address()->updateOrCreate([], $data['address'] ?? []);
            $this->record->contact()->updateOrCreate([], $data['contact'] ?? []);
        });
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
