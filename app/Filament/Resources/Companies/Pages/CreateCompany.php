<?php

namespace App\Filament\Resources\Companies\Pages;

use App\Filament\Resources\Companies\CompanyResource;
use App\Models\Address;
use App\Models\Contact;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateCompany extends CreateRecord
{
    protected static string $resource = CompanyResource::class;

    protected static ?string $recordTitleAttribute = "Ajouter une société";
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return DB::transaction(function () use ($data) {

            $address = Address::create($data['address'] ?? []);
            $contact = Contact::create($data['contact'] ?? []);

            // Nettoyage des champs imbriqués
            unset($data['address'], $data['contact']);

            // Ajouter les foreign keys
            $data['address_id'] = $address->id;
            $data['contact_id'] = $contact->id;

            return $data;
        });
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
