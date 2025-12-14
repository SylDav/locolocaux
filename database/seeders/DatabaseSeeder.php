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
        // Désactiver les événements de modèle pendant le seed
        // User::withoutEvents(function () {
        //     $this->call([
        //         RolePermissionSeeder::class,
        //     ]);
        // });
        
        // Création des rôles et permissions
        $this->call([
            RolePermissionSeeder::class,
        ]);

        // Création des données de test
        $this->call([
            CompanySeeder::class,  // Crée les sociétés, agences, propriétés et utilisateurs de base
            LeaseSeeder::class,    // Crée des baux pour certaines propriétés
            TicketSeeder::class,   // Crée des tickets de support
        ]);

        // Création d'utilisateurs de test avec des rôles spécifiques
        $tenant = User::factory()->create([
            'name' => 'Locataire Test',
            'email' => 'locataire@example.com',
            'password' => bcrypt('password'),
        ]);
        $tenant->assignRole('locataire');

        $proprio = User::factory()->create([
            'name' => 'Propriétaire Test',
            'email' => 'proprietaire@example.com',
            'password' => bcrypt('password'),
        ]);
        $proprio->assignRole('proprietaire');
    }
}
