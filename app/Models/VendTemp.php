<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendTemp extends Model
{
    use HasFactory;

    const TEMPERATURE_ERROR = 32767;

    protected $fillable = [
        'vend_id',
        'temp',
    ];

    // getter
    protected function temp(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value/ 10,
        );
    }

    // relationships
    public function vend()
    {
        return $this->belongsTo(Vend::class);
    }
}
