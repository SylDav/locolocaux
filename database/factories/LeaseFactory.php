<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaseFactory extends Factory
{
    protected $model = \App\Models\Lease::class;

    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', '+1 year');
        $endDate = Carbon::parse($startDate)->addYears($this->faker->numberBetween(1, 3));
        
        return [
            'property_id' => Property::factory(),
            'tenant_id' => User::factory(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'rent_amount' => $this->faker->randomFloat(2, 500, 5000),
            'charges_amount' => $this->faker->randomFloat(2, 0, 500),
            'deposit_amount' => $this->faker->randomFloat(2, 0, 5000),
            'status' => $this->faker->randomElement(['draft', 'active', 'terminated', 'cancelled']),
            'payment_due_day' => $this->faker->numberBetween(1, 28),
            'payment_method' => $this->faker->randomElement(['bank_transfer', 'check', 'cash', 'direct_debit']),
            'notes' => $this->faker->boolean(30) ? $this->faker->paragraph() : null,
        ];
    }
}
