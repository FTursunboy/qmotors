<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechCenter extends Model
{
    use HasFactory, ModelCommonMethods;
    protected $guarded = [];

    public function reviews()
    {
        return $this->hasManyThrough(Review::class, Order::class);
    }
}
