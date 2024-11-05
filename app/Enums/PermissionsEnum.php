<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case USER_MENU = 'user-menu';
    case USER_CREATE = 'user-create';
    case USER_EDIT = 'user-edit';
    case USER_DELETE = 'user-delete';
    case USER_UPDATE = 'user-update';

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
