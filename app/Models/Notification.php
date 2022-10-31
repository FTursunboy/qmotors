<?php

namespace App\Models;

use App\Traits\Excludable;
use App\Traits\ModelCommonMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory, ModelCommonMethods, Excludable;

    public $guarded = [];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getNotificationTypeTextAttribute()
    {
        return $this->notification_type;
    }

    public function getAdditionalTextAttribute()
    {
        return $this->additional_id;
    }
}
