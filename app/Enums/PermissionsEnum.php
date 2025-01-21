<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    case USER_MENU = 'user-list';
    case USER_CREATE = 'user-create';
    case USER_EDIT = 'user-edit';
    case USER_DELETE = 'user-delete';
    case USER_UPDATE = 'user-update';
    case PERMISSION_MENU = 'permission-list';
    case PERMISSION_CREATE = 'permission-create';
    case PERMISSION_UPDATE = 'permission-update';
    case PERMISSION_DELETE = 'permission-delete';
    case PERMISSION_EDIT = 'permission-edit';
    case ROLE_MENU = 'role-list';
    case ROLE_CREATE = 'role-create';
    case ROLE_EDIT = 'role-edit';
    case ROLE_UPDATE = 'role-update';
    case ROLE_DELETE = 'role-delete';

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
