<?php

namespace App\Models;

use App\Enums\FilterTypes;
use App\Traits\FilterCriteria;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use FilterCriteria;

        /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    // public $fillable = ['title', 'description', 'requirements', 'salary_range', 'location', 'status'];
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_posting';
      /**
     * The attributes that can be filtered.
     *
     * @var array<int, string>
     */
    public $filterables = [
        'name' => FilterTypes::LIKE,
    ];
}
