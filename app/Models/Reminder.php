<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory, ModelCommonMethods;
    protected $guarded = [];
    public function user_car()
    {
        return $this->belongsTo(UserCar::class);
    }
}
