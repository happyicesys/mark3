<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vend extends Model
{
    use HasFactory;

    protected $casts = [
        'temp_updated_at' => 'datetime'
    ];

    protected $fillable = [
        'code',
        'serial_num',
        'name',
        'temp',
        'temp_updated_at',
        'coin_amount',
        'firmware_ver',
        'is_door_open',
        'is_sensor_normal',
        'is_temp_error',
    ];

    // relationships
    public function vendChannels()
    {
        return $this->hasMany(VendChannel::class);
    }

    public function vendTemps()
    {
        return $this->hasMany(VendTemp::class);
    }

    // getter
    protected function temp(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value/ 10,
        );
    }

    protected function coinAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value/ 100,
        );
    }

    protected function isDoorOpen(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? 'Yes' : 'No',
        );
    }

    protected function isSensorNormal(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? 'Yes' : 'No',
        );
    }

    // custom getter
    public function getTempUpdatedAtReadableAttribute()
    {
        return Carbon::parse($this->temp_updated_at)->diffForHumans();
    }

    // public function getTempUpdatedAtAttribute()
    // {
    //     return Carbon::parse($this->temp_updated_at)->format('yymmdd h:ia');
    // }

}
