<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeDiagnosticType extends Model
{
    use HasFactory;

    public function free_diagnostics()
    {
        return $this->hasMany(FreeDiagnostic::class);
    }
}
