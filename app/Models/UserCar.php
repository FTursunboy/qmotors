<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserCar extends Model
{
    use HasFactory, ModelCommonMethods;
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

    public function free_diagnostics()
    {
        return $this->hasMany(FreeDiagnostic::class);
    }

    public function user_car_photos()
    {
        return $this->hasMany(UserCarPhoto::class);
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

    public function getTitleAttribute()
    {
        return $this->model->name . ' (' . $this->id . ')[' . $this->number . ']';
    }

    public static function getDeleteStatusId()
    {
        return collect(self::STATUSES)->firstWhere('name', 'Удаленный')['id'];
    }
}
