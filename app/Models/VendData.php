<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendData extends Model
{
    use HasFactory;

    protected $fillable = [
        'log',
    ];

    protected $casts = [
        'log' => 'json',
    ];
}
