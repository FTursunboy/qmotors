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
            'id' => 'install',
            'name' => 'Установка Приложения'
        ],
        [
            'id' => 'birthday',
            'name' => 'Приезд в день рождение'
        ],
        [
            'id' => 'utilization',
            'name' => 'Списание'
        ],
        [
            'id' => 'review',
            'name' => 'Отзыв на площадке'
        ],
        [
            'id' => 'friend',
            'name' => 'Приезд по рекомендации'
        ],
        [
            'id' => 'handwritten_review',
            'name' => 'Рукописный отзыв'
        ],
        [
            'id' => 'video_review',
            'name' => 'Видеоотзыв'
        ],
        [
            'id' => 'accrual',
            'name' => 'Произвольное начисление'
        ],
        [
            'id' => 'order',
            'name' => 'Начисление за заказ'
        ],
    ];
    protected $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
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
