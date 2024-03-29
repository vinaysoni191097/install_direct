<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatteryInverterCompatibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'battery_id',
        'inverter_id',
    ];
}
