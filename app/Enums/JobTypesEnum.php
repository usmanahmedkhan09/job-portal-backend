<?php

namespace App\Enums;

enum JobTypesEnum: string
{
    case FULL_TIME = 'full-time';
    case PART_TIME = 'part-time';
    case REMOTE = 'remote';
    case CONTRACT = 'contract';

    public function label(): string
    {
        return match($this) {
            self::FULL_TIME => 'full-time',
            self::PART_TIME => 'part-time',
            self::REMOTE => 'remote',
            self::CONTRACT => 'contract',
        };
    }
}
