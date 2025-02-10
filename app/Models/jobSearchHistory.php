<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobSearchHistory extends Model
{
    protected $table = 'job_search_history';
    protected $fillable = [
        'user_id',
        'keyword',
        'location'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
