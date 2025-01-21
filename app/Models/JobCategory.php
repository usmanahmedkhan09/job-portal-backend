<?php

namespace App\Models;

use App\Enums\FilterTypes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterCriteria;

class JobCategory extends Model
{
    use FilterCriteria;
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_categories';
      /**
     * The attributes that can be filtered.
     *
     * @var array<int, string>
     */
    public $filterables = [
        'name' => FilterTypes::LIKE,
    ];
}
