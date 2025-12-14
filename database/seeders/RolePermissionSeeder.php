<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Création des permissions
        $permissions = [
            'access admin',
            'manage agencies',
            'view agencies',
            'manage users',
            'view property',
            'create property',
            'edit property',
            'delete property',
            'publish property',
            'create mandate',
            'edit mandate',
            'delete mandate',
            'view clients',
            'create client',
            'edit client',
            'delete client'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Création des rôles
        $roles = [
            'superadmin' => $permissions, // Toutes les permissions
            'admin-societe' => [
                'access admin',
                'manage agencies',
                'view agencies',
                'manage users',
                'create property',
                'edit property',
                'delete property',
                'publish property',
                'create mandate',
                'edit mandate',
                'delete mandate',
                'view clients',
                'create client',
                'edit client',
                'delete client'
            ],
            'admin-agence' => [
                'access admin',
                'manage users',
                'create property',
                'edit property',
                'delete property',
                'publish property',
                'create mandate',
                'edit mandate',
                'delete mandate',
                'view clients',
                'create client',
                'edit client',
                'delete client'
            ],
            'agent' => [
                'access admin',
                'view property',
                'create property',
                'edit property',
                'create mandate',
                'edit mandate',
                'view clients',
                'create client',
                'edit client'
            ],
            'assistant' => [
                'access admin',
                'view property',
                'view clients',
                'create client',
                'edit client'
            ],
            'proprietaire' => [
                'view property'
            ],
            'locataire' => [
                'view property'
            ]
        ];

        // Création des rôles et attribution des permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::create(['name' => $roleName, 'guard_name' => 'web']);
            $role->syncPermissions($rolePermissions);
        }
    }
}
