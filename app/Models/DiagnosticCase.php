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

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function matches()
    {
        return $this->hasMany(ProviderMatch::class, 'case_id')->oldest();
    }
}
