<?php

namespace App\Models\sections;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_headline',
        'side_content',
        'featured_image_id',
        'main_content_title',
        'main_content_tagline',
        'main_content_section_one',
        'main_content_section_two',
        'main_content_section_three',
    ];

    public function sidePicture()
    {
        return $this->belongsTo(Media::class, 'featured_image_id');
    }
}
