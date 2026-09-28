<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosticCase extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'title',
        'description',
        'maturity_level',
        'needs',
        'recommendations',
        'is_public',
    ];
}
