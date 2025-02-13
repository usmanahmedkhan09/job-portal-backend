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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_skills', 'job_id', 'skill_id');
    }

    public function category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function applications()
    {
        return $this->hasMany(JobsApplication::class, 'job_id');
    }

}
