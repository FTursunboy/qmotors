<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, ModelCommonMethods;
    public $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getModeratedTextAttribute()
    {
        return $this->moderated ? 'Да' : 'Нет';
    }
}
