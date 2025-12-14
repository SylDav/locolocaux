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
                Section::make('')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nom de l\'société')
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
                                    TextInput::make('street')
                                        ->label('Rue')
                                        ->required(),
                                    TextInput::make('city')
                                        ->label('Ville')
                                        ->required(),
                                    TextInput::make('postal_code')
                                        ->label('Code postal')
                                        ->required(),
                                    TextInput::make('country')
                                        ->label('Pays')
                                        ->required(),
                                ]),
                            Fieldset::make('Contact')
                                ->schema([
                                    TextInput::make('phone')
                                        ->label('Téléphone')
                                        ->required(),
                                    TextInput::make('email')
                                        ->label('Email')
                                        ->required(),
                                ]),
                            ])
                ->collapsible(),
            ]);
    }
}
