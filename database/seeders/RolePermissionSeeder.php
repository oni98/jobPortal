<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Roles
        $roleAdmin= Role::create(['name' => 'admin']);
        $roleemployer= Role::create(['name' => 'employer']);
        $roleemployee= Role::create(['name' => 'employee']);

        // Permission List as array
        $permissions = [
            
            // employer permission
            'employer.create',
            'employer.view',
            'employer.edit',
            'employer.delete',
            
            // employee permission
            'employee.create',
            'employee.view',
            'employee.edit',
            'employee.delete',

            // profile permission
            'profile.create',
            'profile.view',
        ];

        // Create and Assign Permission
        for ($i=0; $i < count($permissions) ; $i++) { 
            // create permission
            $permission = Permission::create(['name' => $permissions[$i]]);
            $roleAdmin->givePermissionTo($permission);
            $permission->assignRole($roleAdmin);
        }
    }
}
