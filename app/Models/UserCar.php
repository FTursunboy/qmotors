<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCar extends Model
{
    use HasFactory;

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
}
