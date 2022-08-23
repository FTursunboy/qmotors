<?php

namespace App\Models;

use App\Traits\Excludable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelCommonMethods;

class Article extends Model
{
    use HasFactory, ModelCommonMethods, Excludable;
    public $guarded = [];
}
