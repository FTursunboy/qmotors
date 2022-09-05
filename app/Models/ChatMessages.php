<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    use HasFactory;
    public $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin_user()
    {
        return $this->belongsTo(AdminUser::class);
    }
}
