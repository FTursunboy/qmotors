<?php

namespace App\Models;

use App\Traits\Excludable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelCommonMethods;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory, ModelCommonMethods, Excludable;
    public $guarded = [];

    public function getPreviewPathAttribute()
    {
        if (str_contains($this->preview, 'storage')) {
            return $this->preview;
        }
        return 'storage/uploads/' . Str::singular($this->getTable()) . "/preview/" . $this->id . '/' . $this->preview;
    }
}
