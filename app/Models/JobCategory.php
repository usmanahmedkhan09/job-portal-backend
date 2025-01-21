<?php

namespace App\Models;

use App\Enums\FilterTypes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterCriteria;

class JobCategory extends Model
{
    use FilterCriteria;

    protected $fillable = ['name'];
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

    function skills() 
    {
        return $this->hasMany(Skill::class, 'category_id');
    }
}
