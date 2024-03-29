<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_phone_number',
        'facebook_url',
        'instagram_url',
        'site_url',
        'x_url',
        'linkedIn_url',
        'logo',
    ];
}
