<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory, ModelCommonMethods;
    const STATUSES = [];
    const BONUS_TYPES = [
        [
            'id' => 1,
            'name' => 'Списание'
        ],
        [
            'id' => 0,
            'name' => 'Начисление'
        ],
    ];
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        return $this->status;
    }
    public function getBonusTypeTextAttribute()
    {
        return optional(collect(self::BONUS_TYPES)->firstWhere('id', $this->bonus_type))['name'];
    }
}
