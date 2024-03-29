<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolarPanel extends Model
{
    use HasFactory, Sluggable;

    const STANDARD_PANEL_SIZE = 2;

    protected $fillable = [
        'title',
        'watts',
        'price',
        'description',
        'slug',
        'status',
        'featured_image_id',

    ];

    /** Sluggable */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'watts',
                'onUpdate' => true,
            ],
        ];
    }

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

    public function productImage()
    {
        return $this->belongsTo(Media::class, 'featured_image_id');
    }
}
