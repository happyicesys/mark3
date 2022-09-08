<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendTransaction extends Model
{
    use HasFactory;

    protected $casts = [
        'transaction_datetime' => 'datetime'
    ];

    protected $fillable = [
        'order_id',
        'transaction_datetime',
        'amount',
        'pay_method_id',
        'vend_channel_id',
        'vend_channel_error_id',
        'vend_id',
    ];
}
