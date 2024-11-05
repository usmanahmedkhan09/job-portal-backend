<?php

namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'Admin';
    case EMPLOYER = 'Employer';
    case JOB_SEEKER = 'Job Seeker';
    case MODERATOR = 'Moderator';
    case GUEST = 'Guest';
    case HR_ADMIN_SUPPORT = 'HR/Admin Support';

    public function label(): string
    {
        return match($this) {
            self::ADMIN => 'Admin',
            self::EMPLOYER => 'Employer',
            self::JOB_SEEKER => 'Job Seeker',
            self::MODERATOR => 'Moderator',
            self::GUEST => 'Guest',
            self::HR_ADMIN_SUPPORT => 'HR/Admin Support',
        };
    }
}
