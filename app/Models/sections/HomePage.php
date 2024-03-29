<?php

namespace App\Models\sections;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner_headline',
        'banner_tagline',
        'banner_image_id',
        'center_banner_image_id',
        'center_banner_text',
        'center_banner_headline',
    ];

    public function bannerImage()
    {
        return $this->belongsTo(Media::class, 'banner_image_id');
    }

    public function centerBannerImage()
    {
        return $this->belongsTo(Media::class, 'center_banner_image_id');
    }

    public function keyFeatures()
    {
        return $this->hasMany(HomePageBannerSpecification::class, 'page_id');
    }
}
