<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enquiry extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'user_id',
        'ownership',
        'members',
        'power_consumption',
        'consumption_kwh_value',
        'consumption_amount_value',
        'elec_rate_type',
        'day_rate',
        'night_rate',
        'installation_timeframe',
        'location_address',
        'total_area',
        'latitude',
        'longitude',
        'enquiry_number',
        'is_read',
        'slug',
        'cart_id',
        'order_status',
        'rooftop_cordinates'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'enquiry_number',
                // 'onUpdate' => true,
            ],
        ];
    }

    public function userData()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
