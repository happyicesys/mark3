<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable =[
        'classname',
        'desc',
        'is_active',
        'name',
        'sequence',
        'type',
    ];

    // relationships
}
