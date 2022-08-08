<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    public function mark()
    {
        return $this->belongsTo(CarMark::class, 'car_mark_id');
    }
}
