<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeDiagnostic extends Model
{
    use HasFactory, ModelCommonMethods;
    public $fillable = ['tech_center_id', 'user_car_id', 'date'];

    public function tech_center()
    {
        return $this->belongsTo(TechCenter::class);
    }

    public function user_car()
    {
        return $this->belongsTo(UserCar::class);
    }
}
