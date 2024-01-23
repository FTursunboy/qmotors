<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use ModelCommonMethods;

    protected $guarded = [];

    public function user_car(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserCar::class);
    }

    public function order_type_relation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OrderType::class, 'order_type_id');
    }

    public function tech_center(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TechCenter::class);
    }

    public function order_photos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderPhoto::class);
    }

    public function order_works(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderWork::class);
    }

    public function order_spares(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderSpare::class);
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function stock(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }

    public function getGuaranteeTextAttribute(): string
    {
        return $this->guarantee ? 'Да' : 'Нет';
    }

    public function getFreeDiagnosticsTextAttribute(): string
    {
        return $this->free_diagnostics ? 'Да' : 'Нет';
    }

    public function getStockTextAttribute(): string
    {
        return $this->stock_id ? 'Да' : 'Нет';
    }
}
