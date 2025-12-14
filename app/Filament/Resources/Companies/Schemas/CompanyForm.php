<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informations générales')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom de la société')
                            ->required(),
                        TextInput::make('siret')
                            ->label('SIRET')
                            ->required(),
                        TextInput::make('vat_number')
                            ->label('Numéro de TVA')
                            ->default(null),
                        TextInput::make('logo')
                            ->default(null),
                    ]),
                    // ->columns(2),
                Section::make('')
                    ->schema([
                        Fieldset::make('Adresse')
                            ->schema([
                                TextInput::make('address.street')
                                    ->label('Rue')
                                    ->required(),
                                TextInput::make('address.city')
                                    ->label('Ville')
                                    ->required(),
                                TextInput::make('address.postal_code')
                                    ->label('Code postal')
                                    ->required(),
                                TextInput::make('address.country')
                                    ->label('Pays')
                                    ->required(),
                            ]),
                        Fieldset::make('Contact')
                            ->schema([
                                TextInput::make('contact.phone')
                                    ->label('Téléphone')
                                    ->required(),
                                TextInput::make('contact.email')
                                    ->label('Email')
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}
