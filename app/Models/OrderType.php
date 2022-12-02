<?php

namespace App\Models;

use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    use HasFactory, ModelCommonMethods;

    protected $guarded = [];
}
