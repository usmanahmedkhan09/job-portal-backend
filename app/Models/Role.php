<?php

namespace App\Models;

use App\Enums\FilterTypes;
use Spatie\Permission\Traits\HasPermissions;
use App\Traits\FilterCriteria;
use \Spatie\Permission\Models\Role as BaseRole; 
class Role extends BaseRole
{
    use FilterCriteria, HasPermissions;

    public $filterables = [
        'name' => FilterTypes::LIKE,
    ];

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            \Spatie\Permission\Models\Permission::class,
            'role_has_permissions',
            'role_id',
            'permission_id'
        );
    }
    
}