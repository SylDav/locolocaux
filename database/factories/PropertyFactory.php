<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Agency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = \App\Models\Property::class;

    public function definition(): array
    {
        return [
            'agency_id' => Agency::factory(),
            'address_id' => Address::factory(),
            'owner_id' => User::factory(),
            'reference' => $this->faker->unique()->bothify('PROP-####-??'),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraphs(3, true),
            'property_type' => $this->faker->randomElement(['apartment', 'house', 'office', 'land', 'commercial']),
            'surface_area' => $this->faker->numberBetween(30, 500),
            'rooms' => $this->faker->numberBetween(1, 10),
            'rent_amount' => $this->faker->randomFloat(2, 50, 1000),
            'bedrooms' => function (array $attributes) {
                return $this->faker->numberBetween(0, $attributes['rooms'] - 1);
            },
            'floor' => $this->faker->numberBetween(0, 50),
            'floor_count' => $this->faker->numberBetween(1, 50),
            'construction_year' => $this->faker->year('now'),
            'heating_type' => $this->faker->randomElement(['electric', 'gas', 'fuel', 'solar', 'heat_pump']),
            'energy_class' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G']),
            'ges' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E', 'F', 'G']),
            'furnished' => $this->faker->boolean(),
            'status' => $this->faker->randomElement(['available', 'rented', 'sold', 'under_contract', 'draft']),
            'price' => $this->faker->randomFloat(2, 500, 1000000),
            'charges' => $this->faker->randomFloat(2, 0, 1000),
            'property_tax' => $this->faker->randomFloat(2, 0, 5000),
        ];
    }
}
