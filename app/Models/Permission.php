<?php

namespace App\Models;


class Permission extends \Spatie\Permission\Models\Permission
{
    //

    public function permissionsRole()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions', 'permission_id', 'role_id');
    }
}