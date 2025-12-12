<?php

namespace Database\Factories;

use App\Models\Identity;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdentityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Identity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        
        return [
            'lastname' => $this->faker->lastName(),
            'firstname' => $this->faker->firstName($gender),
            'gender' => $gender,
            'birthdate' => $this->faker->dateTimeBetween('-80 years', '-18 years'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
