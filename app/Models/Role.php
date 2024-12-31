<?php

namespace App\Models;

use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Traits\HasPermissions;

class Role extends \Spatie\Permission\Models\Role
{
    use HasPermissions;
    
    public function rolesPermission()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }
}