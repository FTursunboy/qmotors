<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    public $fillable = ['name', 'user_id'];

    public function messages()
    {
        return $this->hasMany(ChatMessages::class);
    }
}
