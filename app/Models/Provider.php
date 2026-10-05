<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'country', 'bio', 'website', 'specialty',
    ];
    public function matches()
    {
        return $this->hasMany(ProviderMatch::class);
    }
}
