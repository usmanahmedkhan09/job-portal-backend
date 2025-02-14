<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\FilterTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\FilterCriteria;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens, HasRoles, FilterCriteria;

    /**
     * The guard name used for the model.
     *
     * @var string
     */
    protected $guard_name = 'sanctum';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that can be filtered.
     *
     * @var array<int, string>
     */
    public $filterables = [
        'name' => FilterTypes::LIKE,
        'email' => FilterTypes::LIKE,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function usersroles()
    {
        return $this->belongsToMany(Role::class, 'model_has_roles', 'model_id');
    }

    public function userspermissions()
    {
        return $this->belongsToMany(Permission::class, 'model_has_permissions', 'model_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skills')
                    ->withPivot('proficiency_level')
                    ->withTimestamps();
    }

    public function jobApplications()
    {
        return $this->hasMany(JobsApplication::class, 'user_id');
    }

    public function jobSearchHistory()
    {
        return $this->hasMany(JobSearchHistory::class, 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
