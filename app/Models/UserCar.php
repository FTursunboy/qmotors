<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserCar extends Model
{
    use HasFactory;

    const  STATUSES = [
        ['id' => 0, 'name' => 'Активный'],
        ['id' => 1, 'name' => 'Проданный'],
        ['id' => 2, 'name' => 'Удаленный'],
    ];
    protected $guarded = [];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function model()
    {
        return $this->belongsTo(CarModel::class, 'car_model_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function freeDiagnostics()
    {
        return $this->hasMany(FreeDiagnostic::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getStatusTextAttribute()
    {
        if (isset(self::STATUSES[$this->status]['name']))
            return self::STATUSES[$this->status]['name'];
        return 'Недействительный статус';
    }
    public function getLastVisitDateAttribute()
    {
        if (!empty($this->last_visit))
            return date('Y-m-d', strtotime($this->last_visit));
        return $this->last_visit;
    }
}
