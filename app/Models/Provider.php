<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'country', 'bio', 'website', 'specialty',
    ];
    public function matches()
    {
        return $this->hasMany(ProviderMatch::class);
    }
}
