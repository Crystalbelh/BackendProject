<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ✅ Clear cache before creating roles/permissions
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions if they don't exist
        foreach ($this->getPermissionsArray() as $permission) {
            Permission::firstOrCreate(['name' => $permission], ['name' => $permission]);
        }

        // ✅ Create roles with correct names
        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin'], ['name' => 'SuperAdmin', 'guard_name' => 'web']);
        $adminRole      = Role::firstOrCreate(['name' => 'Admin'], ['name' => 'Admin', 'guard_name' => 'web']);
        $customerRole   = Role::firstOrCreate(['name' => 'Customer'], ['name' => 'Customer', 'guard_name' => 'web']); // ✅ replaced User with Customer

        $this->assignPermissions($superAdminRole, $adminRole, $customerRole);
    }


    

    public function assignPermissions($superAdminRole, $adminRole, $customerRole)
    {

        // ✅ SuperAdmin gets all permissions
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign permissions
        $customerRole->givePermissionTo([
            'place orders',
            'add to cart',
            'checkout',
            'write review',
        ]);

        $adminRole->givePermissionTo([
            'create products',
            'cancel orders',
            'add categories',
        ]);
    }


    public function getPermissionsArray(): array
    {

        // Define permissions
        return   $permissions = [
            // Customer permissions
            'place orders',
            'add to cart',
            'checkout',
            'write review',

            // Admin permissions
            'create products',
            'cancel orders',
            'add categories',

            // SuperAdmin exclusive
            'delete products',
            'refund orders',
            'manage roles',
        ];
    }
}
