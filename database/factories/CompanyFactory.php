<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = \App\Models\Company::class;

    public function definition(): array
    {
        return [
            'contact_id' => Contact::factory(),
            'address_id' => Address::factory(),
            'name' => $this->faker->company(),
            'siret' => $this->faker->siret(),
            'vat_number' => $this->faker->vat(),
            'logo' => $this->faker->imageUrl(200, 200, 'business', true),
        ];
    }
}
