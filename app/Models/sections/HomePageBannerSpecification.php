<?php

namespace App\Models\sections;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageBannerSpecification extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'key_feature',
    ];
}
