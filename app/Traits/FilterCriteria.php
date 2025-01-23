<?php

namespace App\Traits;

use App\Enums\FilterTypes;
use Illuminate\Support\Facades\Log;

use function Illuminate\Log\log;

trait FilterCriteria
{
    public function scopeFilter($query): \Illuminate\Database\Eloquent\Builder
    {
        $filters = request()->all();

        if(count($filters) && isset($this->filterables) && count($this->filterables))
        foreach ($this->filterables as $key => $operator) {
            $value = request()->{$key};
            if (!empty($value)) {
                switch($operator){
                    case FilterTypes::LIKE:
                        $query->where($key, 'like', "%{$value}%");
                        break;
                    case FilterTypes::EQ:
                        $query->where($key, $value);
                        break;
                    case FilterTypes::NEQ:
                        $query->where($key, '!=', $value);
                        break;
                    case FilterTypes::GT:
                        $query->where($key, '>', $value);
                        break;
                    case FilterTypes::GTE:
                        $query->where($key, '>=', $value);
                        break;
                    case FilterTypes::LT:
                        $query->where($key, '<', $value);
                        break;
                    case FilterTypes::LTE:
                        $query->where($key, '<=', $value);
                        break;
                    case FilterTypes::IN:
                        $query->whereIn($key, explode(',', $value));
                        break;
                    case FilterTypes::NIN:
                        $query->whereNotIn($key, explode(',', $value));
                        break;
                    case FilterTypes::BETWEEN:
                        $query->whereBetween($key, explode(',', $value));
                        break;
                    case FilterTypes::N_BETWEEN:
                        $query->whereNotBetween($key, explode(',', $value));
                        break;
                    case FilterTypes::NULL:
                        $query->whereNull($key);
                        break;
                    case FilterTypes::NOT_NULL:
                        $query->whereNotNull($key);
                        break;
                    case FilterTypes::DATE:
                        $query->whereDate($key, $value);
                        break;
                    default:
                        break;
                }
            }
        }
        return $query;
    }
}