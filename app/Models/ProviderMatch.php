<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderMatch extends Model
{
    protected $table = 'matches';

    protected $fillable = ['comment', 'case_id', 'provider_id'];

    public function diagnosticCase()
    {
        return $this->belongsTo(DiagnosticCase::class, 'case_id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
