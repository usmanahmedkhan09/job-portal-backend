<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Spatie\Permission\Models\Role;

class GenericPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        // Get all permissions from the PermissionEnum
        $userPermissions = PermissionsEnum::getAllPermissions();

        foreach ($userPermissions as $userPermission){
             // Check if permission exists, create if not
             $permission = Permission::firstOrCreate(['name' => $userPermission]);

             // Retrieve or create the admin role
             $role = Role::firstOrCreate(['name' => RolesEnum::ADMIN->value]);
 
             // Assign permission to role if not already assigned
             if (! $role->hasPermissionTo($permission)) {
                 $role->givePermissionTo($permission);
             }
        }
    }
}
