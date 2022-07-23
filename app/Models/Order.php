<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, ModelCommonMethods;
    protected $guarded = [];
    const TYPES = [
        [
            'id' => 1,
            'name' => "Техническое обслуживание"
        ],
        [
            'id' => 2,
            'name' => "Слесарный ремонт"
        ],
        [
            'id' => 3,
            'name' => "Кузовной ремонт"
        ],
        [
            'id' => 4,
            'name' => "Детайлинг"
        ],
        [
            'id' => 0,
            'name' => "другое"
        ],
    ];
}
