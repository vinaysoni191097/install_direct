<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'phone_number',
        'new_address_full_name',
        'city',
        'state',
        'zip',
        'country',
    ];

    public function getfullAddressAttribute()
    {
        $addressComponents = array_filter([$this->address, $this->city, $this->state, $this->zip, $this->country]);

        return implode(' ', $addressComponents);
    }

    public function setStateAttribute($value)
    {
        $stateCode = (int) $value['state'] ?? null;
        $this->attributes['state'] = match ($stateCode) {
            1 => 'England' ,
            2 => 'Scotland',
            3 => 'Wales',
        };
    }
}
