<?php

namespace App\Models;

use App\Traits\Excludable;
use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory, ModelCommonMethods, Excludable;
    public $guarded = [];

    public function getBodyAttribute()
    {
        $this->text = str_replace('src="/uploads', 'src="' . asset('') . 'uploads', $this->text);
        $this->text = str_replace('src="/storage', 'src="' . asset('') . 'storage', $this->text);
        return $this->text;
    }
}
