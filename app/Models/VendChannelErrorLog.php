<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendChannelErrorLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_cleared',
        'vend_channel_id',
        'vend_channel_error_id',
        'vend_transaction_id'
    ];

    public function vendChannel()
    {
        return $this->belongsTo(VendChannel::class);
    }

    public function vendChannelError()
    {
        return $this->belongsTo(VendChannelError::class);
    }

    public function vendTransaction()
    {
        return $this->belongsTo(VendTransaction::class);
    }
}
