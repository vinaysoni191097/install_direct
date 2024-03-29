<?php

namespace App\Models\sections;

use App\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerLogo extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'partner_name',
        'slug',
        'featured_image_id',
        'status',
    ];

    /** Sluggable */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'partner_name',
                'onUpdate' => true,
            ],
        ];
    }

    public function partnerLogo()
    {
        return $this->belongsTo(Media::class, 'featured_image_id');
    }

    public function scopeisActive($query)
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
}
