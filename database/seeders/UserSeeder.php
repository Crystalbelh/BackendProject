<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            ['name' => 'Super Admin', 'password' => bcrypt('password')]
        );
        $superAdmin->assignRole('SuperAdmin');

        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );
        $admin->assignRole('Admin');

        $customer = User::firstOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'Regular User', 'password' => bcrypt('password')]
        );
        $customer->assignRole('Customer');

        // Ensure roles exist
        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $adminRole      = Role::firstOrCreate(['name' => 'Admin']);
        $userRole       = Role::firstOrCreate(['name' => 'Customer']);

        // Create SuperAdmin
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
            ]
        );
        $superAdmin->assignRole($superAdminRole);

        // Create Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password123'),
            ]
        );
        $admin->assignRole($adminRole);

        // Create fake customers
        User::factory(10)->create()->each(function ($User) use ($userRole) {
            $User->assignRole($userRole);
        });
    }
        
 }
