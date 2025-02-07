<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\FilterTypes;
use App\Traits\FilterCriteria;

class JobsApplication extends Model
{
    use FilterCriteria;

    protected $table = 'job_applications';
    protected $fillable = [
        'job_id',
        'user_id',
        'resume',
        'cover_letter',
        'status',
    ];

    public $filterables = [
        'title' => FilterTypes::LIKE,
        'category_id' => FilterTypes::EQ,
        'location' => FilterTypes::LIKE,
        'status' => FilterTypes::EQ,
        // 'skills' => FilterTypes::IN,
        'salary_range' => FilterTypes::LIKE,
        'created_at' => FilterTypes::DATE,
        'updated_at' => FilterTypes::DATE,
        'job_type' => FilterTypes::EQ,
    ];

    public function job()
    {
        return $this->belongsTo(JobPosting::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
