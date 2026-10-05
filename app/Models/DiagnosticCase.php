<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
    public function canChange(User $user): bool
    {
        if ($user->id === $this->user_id) {
            return true;
        }

        if ($user->is_admin) {
            return true;
        }

        return false;
    }
}
