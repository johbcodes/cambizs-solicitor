<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'view_dashboard',
            'manage_users',
            'approve_solicitors',
            'manage_services',
            'view_reports',
            'view_contracts',
            'send_messages',
            'submit_requests',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Define roles and assign permissions
        $roles = [
            'Admin' => ['view_dashboard', 'manage_users', 'approve_solicitors', 'manage_services', 'view_reports'],
            'Solicitor' => ['view_dashboard', 'view_contracts', 'send_messages', 'manage_services'],
            'Client' => ['view_dashboard', 'submit_requests', 'view_contracts', 'send_messages'],
        ];

        foreach ($roles as $role => $rolePermissions) {
            $role = Role::create(['name' => $role]);
            $role->givePermissionTo($rolePermissions);
        }

        // Create sample users and assign roles
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('Admin');

        $solicitor = User::create([
            'name' => 'Solicitor User',
            'email' => 'solicitor@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $solicitor->assignRole('Solicitor');

        $client = User::create([
            'name' => 'Client User',
            'email' => 'client@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $client->assignRole('Client');

        $this->call(PracticeAreasSeeder::class);
    }
}
