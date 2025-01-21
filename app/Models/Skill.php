<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = ['name', 'category_id'];
    
    public function category() 
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function users() 
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }
}
