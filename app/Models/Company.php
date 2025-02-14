<?php

namespace App\Models;

use App\Enums\FilterTypes;
use Illuminate\Database\Eloquent\Model;
use App\Traits\FilterCriteria;

class Company extends Model
{
    use FilterCriteria;

    protected $table = 'companies';

    protected $fillable = ['name', 'description', 'website', 'user_id'];
         /**
     * The attributes that can be filtered.
     *
     * @var array<int, string>
     */
    public $filterables = [
        'name' => FilterTypes::LIKE,
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
