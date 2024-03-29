<?php

namespace App\Models\sections;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory, Sluggable;

    const BATTERY = 1;

    const SOLAR = 2;

    protected $table = 'faq';

    protected $fillable = [
        'title',
        'slug',
        'status',
        'question',
        'answer',
    ];

    /** Sluggable */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ],
        ];
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

    public function getTabNameAttribute()
    {
        if ($this->title == self::SOLAR) {
            return 'Solar';
        }

        return 'Battery';
    }
}
