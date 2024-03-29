<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasePrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'status'
    ];


    /* Scopes */

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /* Attributes */
    public function getisActivatedAttribute()
    {
        if ($this->status == 1) {
            return true;
        }

        return false;
    }

    public function getPrice(): Attribute
    {
        return Attribute::make(
            get: function () {
              return  number_format($this->price, 2);
            }
        );
    }
}
