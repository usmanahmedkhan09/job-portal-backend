<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    case ADMIN_MENU = 'admin-menu';
    case USER_MENU = 'users-list';
    case USER_CREATE = 'user-create';
    case USER_EDIT = 'user-edit';
    case USER_DELETE = 'user-delete';
    case USER_UPDATE = 'user-update';
    case PERMISSION_MENU = 'permissions-list';
    case PERMISSION_CREATE = 'permission-create';
    case PERMISSION_UPDATE = 'permission-update';
    case PERMISSION_DELETE = 'permission-delete';
    case PERMISSION_EDIT = 'permission-edit';
    case ROLE_MENU = 'roles-list';
    case ROLE_CREATE = 'role-create';
    case ROLE_EDIT = 'role-edit';
    case ROLE_UPDATE = 'role-update';
    case ROLE_DELETE = 'role-delete';
    case JOB_MENU = 'jobs-list';
    case JOB_CREATE = 'job-create';
    case JOB_EDIT = 'job-edit';
    case JOB_UPDATE = 'job-update';
    case JOB_DELETE = 'job-delete';
    case JOBS_APPLICATION_LIST = 'jobs-application-list';
    case JOBS_CATEGORIES_LIST = 'jobs-categories-list';


    public static function getAllPermissions(): array
    {
        return array_reduce(
            self::cases(), 
            fn ($result, $case) => $result + [$case->name => $case->value], 
            []
        );
    }
    

    public function label(): string
    {
        return match($this) {
            self::USER_MENU => 'user-menu',
            self::USER_CREATE => 'user-create',
            self::USER_EDIT => 'user-edit',
            self::USER_DELETE => 'user-delete',
            self::USER_UPDATE => 'user-update',
        };
    }
}
