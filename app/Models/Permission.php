<?php

namespace App\Models;

use App\Enums\FilterTypes;
use App\Traits\FilterCriteria;

class Permission extends \Spatie\Permission\Models\Permission
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