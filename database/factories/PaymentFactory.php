<?php

namespace Database\Factories;

use App\Models\Lease;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = \App\Models\Payment::class;

    public function definition(): array
    {
        return [
            'lease_id' => Lease::factory(),
            'payer_id' => User::factory(),
            'amount' => $this->faker->randomFloat(2, 500, 5000),
            'payment_date' => $this->faker->dateTimeThisYear(),
            'payment_method' => $this->faker->randomElement(['bank_transfer', 'check', 'cash', 'direct_debit']),
            'reference' => $this->faker->bothify('PAY-####-??'),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed', 'refunded']),
            'notes' => $this->faker->boolean(30) ? $this->faker->sentence() : null,
        ];
    }
}
