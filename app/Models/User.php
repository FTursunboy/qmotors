<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use App\View\Components\Dashboard\ChatMessage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ModelCommonMethods;
    const TEST_ACCOUNT_PHONE_NUMBER = '+7 (999) 999-99-99';
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

    public function bonuses()
    {
        return $this->hasMany(Bonus::class)->latest();
    }

    public function chat()
    {
        return $this->hasOne(Chat::class);
    }

    public function chat_messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function free_diagnostics()
    {
        return $this->hasMany(FreeDiagnostic::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reminders()
    {
        return $this->hasManyThrough(Reminder::class, UserCar::class);
    }

    public function getFullNameAttribute()
    {
        $fullname = $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
        if (strlen($fullname) < 3) {
            $fullname = 'фио нет';
        }
        return $fullname . ' [' . $this->phone_number . ']';
    }

    public function getGenderTextAttribute()
    {
        return $this->gender ? 'Мужской' : 'Женский';
    }

    public function getIsCompleteTextAttribute()
    {
        return $this->is_complete ? 'Да' : 'Нет';
    }

    public function getBalanceAttribute()
    {
        $sum = 0;
        foreach ($this->bonuses as $item) {
            if ($item->bonus_type === 0) {
                $sum += $item->points;
            }
            if ($item->bonus_type === 1) {
                $sum -= $item->points;
            }
        }
        return $sum;
    }
}
