<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'status',
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

    /* Relations */

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
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
}
