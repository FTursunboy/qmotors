<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ModelCommonMethods;
    const STATUSES = [
        [
            'id' => 1,
            'name' => 'Да'
        ],
        [
            'id' => 0,
            'name' => 'Нет'
        ]
    ];
    const GENDERS = [
        [
            'id' => 1,
            'name' => 'Мужской'
        ],
        [
            'id' => 0,
            'name' => 'Женский'
        ]
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'phone_number',
    //     'sms_code'
    // ];
    protected $guarded = [];
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_cars()
    {
        return $this->hasMany(UserCar::class);
    }

    public function getFullNameAttribute()
    {
        return $this->surname . ' ' . $this->name;
    }

    public function getGenderTextAttribute()
    {
        return $this->gender ? 'Мужской' : 'Женский';
    }

    public function getIsCompleteTextAttribute()
    {
        return $this->is_complete ? 'Да' : 'Нет';
    }
}
