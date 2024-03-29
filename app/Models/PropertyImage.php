<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'image_type',
        'image_path',
        'image_name',
        'driver',
        'image_extension',
    ];
}
