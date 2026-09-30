<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'country',
        'bio',
        'website',
        'org_type',
        'org_size',
    ];
}
