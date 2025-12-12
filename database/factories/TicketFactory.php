<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = \App\Models\Ticket::class;

    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'reporter_id' => User::factory(),
            'assigned_to' => User::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(2, true),
            'status' => $this->faker->randomElement(['open', 'in_progress', 'on_hold', 'resolved', 'closed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
            'type' => $this->faker->randomElement(['maintenance', 'repair', 'complaint', 'inspection', 'other']),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'completed_at' => $this->faker->boolean(30) ? $this->faker->dateTimeBetween('-1 month', 'now') : null,
        ];
    }
}
