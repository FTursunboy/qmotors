<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use App\View\Components\Dashboard\ChatMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, ModelCommonMethods;

    const TEST_ACCOUNT_PHONE_NUMBER = '+7 (999) 999-99-99';
    const TEST_ACCOUNT_PHONE_NUMBERS = ['+7 (999) 999-99-99', '+7 (999) 999-99-07'];
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
        'is_complete' => 'bool',
        'agree_notification' => 'bool',
        'agree_sms' => 'bool',
        'agree_calls' => 'bool',
        'agree_data' => 'bool',
        'new_app' => 'bool'
    ];

    public function user_cars(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserCar::class);
    }

    public function bonuses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Bonus::class)->latest();
    }

    public function chat(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Chat::class);
    }

    public function chat_messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function free_diagnostics(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FreeDiagnostic::class);
    }

    public function notifications(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function reminders(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Reminder::class, UserCar::class);
    }

    public function getFullNameAttribute(): string
    {
        $fullname = $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
        if (strlen($fullname) < 3) {
            $fullname = 'Новый Клиент';
        }
        return $fullname . ' [' . buildPhone($this->phone_number) . ']';
    }

    public function getGenderTextAttribute(): string
    {
        return $this->gender ? 'Мужской' : 'Женский';
    }

    public function getGenderKeyAttribute(): string
    {
        return $this->gender ? 'male' : 'female';
    }

    public function getIsCompleteTextAttribute(): string
    {
        return $this->is_complete ? 'Да' : 'Нет';
    }

    public function getBalanceAttribute()
    {
        $sum = 0;
        foreach ($this->bonuses as $item) {
            if ($item->bonus_type == 'utilization') {
                $sum -= $item->points;
//            } elseif ($item->bonus_type == 'burn') {
//                if ($item->burn_date > date('Y-m-d')) {
//                    $sum += $item->points;
//                } else {
//                    $sum += $item->points;
//                }
            } else {
                $sum += $item->points;
            }
        }
        return $sum;
    }
}
