<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\Company;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        // Create companies
        $companies = Company::factory()
            ->count(3)
            ->create();

        // For each company, create some agencies
        foreach ($companies as $company) {
            // Create 2-5 agencies per company
            $agencies = Agency::factory()
                ->count(rand(2, 5))
                ->for($company)
                ->create();

            // For each agency, create some properties and users
            foreach ($agencies as $agency) {
                // Create 5-15 properties per agency
                $properties = Property::factory()
                    ->count(rand(5, 15))
                    ->for($agency)
                    ->create();

                // Create 2-5 users per agency (agents)
                $users = User::factory()
                    ->count(rand(2, 5))
                    ->for($agency)
                    ->create();

                // // Create 1-3 property owners per agency
                // $owners = User::factory()
                //     ->count(rand(1, 3))
                //     ->create([
                //         'role' => 'owner',
                //     ]);

                // // Create 1-3 tenants per agency
                // $tenants = User::factory()
                //     ->count(rand(1, 3))
                //     ->create([
                //         'role' => 'tenant',
                //     ]);
            }
        }
    }
}
