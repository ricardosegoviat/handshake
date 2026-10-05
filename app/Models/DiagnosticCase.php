<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class DiagnosticCase extends Model
{
    use HasFactory;
    protected $table = 'cases';

    protected $fillable = [
        'title',
        'description',
        'maturity_level',
        'needs',
        'recommendations',
        'is_public',
        'organization_id',
        'user_id',
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

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'case_topic', 'case_id', 'topic_id');
    }
}
