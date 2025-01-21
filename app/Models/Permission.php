<?php

namespace App\Models;

use App\Enums\FilterTypes;
use App\Traits\FilterCriteria;
use \Spatie\Permission\Models\Permission as BasePermission;
class Permission extends BasePermission
{
    use FilterCriteria;

    public $filterables = [
        'name' => FilterTypes::LIKE,
    ];
    public function permissionsRole()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions', 'permission_id', 'role_id');
    }
}