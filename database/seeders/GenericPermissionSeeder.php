<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Enums\PermissionEnum;
use App\Enums\RolesEnum;
use Spatie\Permission\Models\Role;

class GenericPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        $userPermissions = [
            PermissionEnum::USER_CREATE,
            PermissionEnum::USER_DELETE,
            PermissionEnum::USER_EDIT,
            PermissionEnum::USER_UPDATE
        ];

        foreach ($userPermissions as $userPermission){
             // Check if permission exists, create if not
             $permission = Permission::firstOrCreate(['name' => $userPermission->value]);

             // Retrieve or create the admin role
             $role = Role::firstOrCreate(['name' => RolesEnum::ADMIN->value]);
 
             // Assign permission to role if not already assigned
             if (! $role->hasPermissionTo($permission)) {
                 $role->givePermissionTo($permission);
             }
        }
    }
}
