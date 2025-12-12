<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgencyFactory extends Factory
{
    protected $model = \App\Models\Agency::class;

    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'contact_id' => Contact::factory(),
            'address_id' => Address::factory(),
            'name' => $this->faker->company(),
            'logo' => $this->faker->imageUrl(200, 200, 'business', true),
        ];
    }
}
