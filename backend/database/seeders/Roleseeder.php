<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create permissions
        $permissions = [
            'create Acount',
            'edit Acount',
            'view Acount',
            'delete Acount',
            'create Campgian',
            'edit Campgian',
            'view Campgian',
            'delete Campgian',
            'create Clinet',
            'edit Clinet',
            'view Clinet',
            'delete Clinet',
            'create Payment',
            'edit Payment',
            'view Payment',
            'delete Payment',
            'create Page',
            'edit Page',
            'view Page',
            'delete Page',
            'create Employee',
            'edit Employee',
            'view Employee',
            'delete Employee',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $superAdminRole = Role::firstOrCreate(['name' => 'super admin']);
        $hr = Role::firstOrCreate(['name' => 'hr']);

        // Assign permissions to roles
        $admin->givePermissionTo($permissions);
        $superAdminRole->givePermissionTo($permissions);

        $hrPermissions = [
            'create Employee',
            'edit Employee',
            'view Employee',
            'delete Employee',
        ];

        $hr->givePermissionTo($hrPermissions);
    }
}
