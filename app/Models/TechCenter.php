<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechCenter extends Model
{
    use  ModelCommonMethods;

    protected $guarded = [];

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Review::class, Order::class);
    }

    public function nicknames(): HasMany
    {
        return $this->hasMany(TechCenterNickName::class, 'tech_center_id', 'id');
    }
}
