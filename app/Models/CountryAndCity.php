<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryAndCity extends Model
{
    use HasFactory;

    const ENGLAND = 1;

    const SCOTLAND = 2;

    const WALES = 3;

    protected $fillable = [
        'state_code',
        'city_name',
    ];

    /* Scopes */
    public function scopeEnglandCities($query)
    {
        return $query->where('state_code', self::ENGLAND);
    }

    public function scopeScotlandCities($query)
    {
        return $query->where('state_code', self::SCOTLAND);
    }

    public function scopeWalesCities($query)
    {
        return $query->where('state_code', self::WALES);
    }
}
