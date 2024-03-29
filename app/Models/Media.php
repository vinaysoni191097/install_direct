<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    const PRODUCT = 1;

    const PARTNER_LOGO = 2;

    const PRODUCT_VARIANT = 3;

    const TEAM_MEMBER = 4;

    const ABOUT_US_PAGE_SIDE_PICTURE = 5;

    const HOME_BANNER = 6;

    const HOME_CENTER_BANNER = 7;

    protected $fillable = [
        'type',
        'product_id',
        'product_variant_id',
        'path',
        'size',
    ];
}
