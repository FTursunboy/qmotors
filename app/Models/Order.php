<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, ModelCommonMethods;
    protected $guarded = [];

    public function user_car()
    {
        return $this->belongsTo(UserCar::class);
    }

    public function order_type_relation()
    {
        return $this->belongsTo(OrderType::class, 'order_type_id');
    }

    public function tech_center()
    {
        return $this->belongsTo(TechCenter::class);
    }

    public function order_photos()
    {
        return $this->hasMany(OrderPhoto::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function getGuaranteeTextAttribute()
    {
        return $this->guarantee ? 'Да' : 'Нет';
    }
}
