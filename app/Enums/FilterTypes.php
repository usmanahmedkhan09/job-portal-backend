<?php

namespace App\Enums;

enum FilterTypes: string
{
    case LIKE = 'like';
    case EQ = 'eq';
    case NEQ = 'neq';
    case GT = 'gt';
    case GTE = 'gte';
    case LT = 'lt';
    case LTE = 'lte';
    case IN = 'in';
    case NIN = 'nin';
    case BETWEEN = 'between';
    case N_BETWEEN = 'nbetween';
    case NULL = 'null';
    case NOT_NULL = 'not_null';
    case DATE = 'date';
    case MONTH = 'month';
    case DAY = 'day';

    // public function label(): string
    // {
    //     return match($this) {
    //         self::LIKE => 'Like',
    //         self::EQ => 'Equal',
    //         self::NEQ => 'Not Equal',
    //         self::GT => 'Greater Than',
    //         self::GTE => 'Greater Than or Equal',
    //         self::LT => 'Less Than',
    //         self::LTE => 'Less Than or Equal',
    //         self::IN => 'In',
    //         self::NIN => 'Not In',
    //         self::BETWEEN => 'Between',
    //         self::N_BETWEEN => 'Not Between',
    //         self::NULL => 'Null',
    //         self::NOT_NULL => 'Not Null',
    //         self::DATE => 'Date',
    //         self::MONTH => 'Month',
    //         self::DAY => 'Day',
    //     };
    // }
}