<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create other seeders
        $this->call([
            CompanySeeder::class,  // Creates companies, agencies, properties, and basic users
            LeaseSeeder::class,    // Creates leases for some properties
            TicketSeeder::class,   // Creates support tickets
        ]);

        // // Create additional users with specific roles
        // User::factory()->create([
        //     'name' => 'Agency Admin',
        //     'email' => 'agency@example.com',
        //     'password' => bcrypt('password'),
        //     'role' => 'agency_admin',
        // ]);

        // User::factory()->create([
        //     'name' => 'Property Owner',
        //     'email' => 'owner@example.com',
        //     'password' => bcrypt('password'),
        //     'role' => 'owner',
        // ]);

        User::factory()->create([
            'name' => 'Tenant',
            'email' => 'tenant@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
