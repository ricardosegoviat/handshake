<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'bio',
        'website',
        'org_type',
        'org_size',
    ];

    public function cases()
    {
        return $this->hasMany(DiagnosticCase::class);
    }

}
