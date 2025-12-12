<?php

namespace Database\Seeders;

use App\Models\Lease;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class LeaseSeeder extends Seeder
{
    protected $faker;
    public function run(): void
    {
        $this->faker = Factory::create();
        // Get all properties that don't have a lease yet
        $properties = Property::doesntHave('leases')
            ->inRandomOrder()
            ->limit(10) // Limit to 10 properties to avoid too many leases
            ->get();

        foreach ($properties as $property) {
            // Get a random tenant
            // $tenant = User::where('role', 'tenant')
            //     ->inRandomOrder()
            //     ->first();

            // if ($tenant) {
            //     // Create a lease for the property
            //     $lease = Lease::factory()
            //         ->for($property)
            //         ->for($tenant, 'tenant')
            //         ->create([
            //             'status' => 'active',
            //         ]);

            //     // Create some payments for the lease
            //     $this->createPaymentsForLease($lease);
            // }
        }
    }

    private function createPaymentsForLease($lease): void
    {
        $startDate = $lease->start_date;
        $endDate = now();
        
        if ($endDate > $lease->end_date) {
            $endDate = $lease->end_date;
        }

        $currentDate = $startDate->copy();
        
        while ($currentDate <= $endDate) {
            // Skip some payments randomly to simulate missed payments
            if (rand(1, 10) <= 8) { // 80% chance of creating a payment
                $paymentDate = $currentDate->copy()->addDays(rand(0, 5)); // Payment within 5 days of due date
                
                $status = $paymentDate < now()->subDays(30) ? 'completed' : 'pending';
                
                $lease->payments()->create([
                    'amount' => $lease->rent_amount,
                    'payment_date' => $paymentDate,
                    'payment_method' => $this->faker->randomElement(['bank_transfer', 'check', 'cash', 'direct_debit']),
                    'status' => $status,
                    'notes' => $this->faker->boolean(20) ? $this->faker->sentence() : null,
                ]);
            }
            
            $currentDate->addMonth();
        }
    }
}
