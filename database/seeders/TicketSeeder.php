<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Ticket;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    protected $faker;

    public function run(): void
    {
        // $this->faker = Factory::create();
        
        // // Get properties with active leases
        // $properties = Property::has('leases')
        //     ->with('leases')
        //     ->get();

        // foreach ($properties as $property) {
        //     // Create 0-3 tickets per property
        //     $ticketCount = rand(0, 3);
            
        //     for ($i = 0; $i < $ticketCount; $i++) {
        //         // Get a random tenant from the property's lease
        //         $tenant = $property->leases->first()->tenant;
                
        //         // Get a random agent
        //         $agent = User::where('role', 'agent')
        //             ->inRandomOrder()
        //             ->first();
                
        //         if ($tenant && $agent) {
        //             Ticket::create([
        //                 'property_id' => $property->id,
        //                 'reporter_id' => $tenant->id,
        //                 'assigned_to' => $agent->id,
        //                 'title' => $this->faker->sentence(),
        //                 'description' => $this->faker->paragraphs(2, true),
        //                 'status' => $this->faker->randomElement(['open', 'in_progress', 'on_hold', 'resolved', 'closed']),
        //                 'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
        //                 'type' => $this->faker->randomElement(['maintenance', 'repair', 'complaint', 'inspection', 'other']),
        //                 'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        //                 'completed_at' => $this->faker->boolean(30) ? $this->faker->dateTimeBetween('-1 month', 'now') : null,
        //             ]);
        //         }
        //     }
        // }
    }
}
