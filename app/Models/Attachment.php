<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable =[
        'sequence',
        'name',
        'desc',
        'type',
        'is_active',
    ];

    // relationships
    public function modelable()
    {
        return $this->morphTo();
    }
}
