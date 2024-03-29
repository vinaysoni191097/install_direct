<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    const STANDARD_PANEL_SIZE = 2;

    use HasFactory, sluggable, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'price',
        'featured_image_id',
        'category_id',
        'stock',
        'variation',
        'Kwh',
        'tags_id',
        'status',
        'warranty',
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

    /*  Relations */

    public function productCategories()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function tags()
    {
        return $this->belongsTo(ProductTag::class, 'tags_id');
    }

    public function categories()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function productImage()
    {
        return $this->belongsTo(Media::class, 'featured_image_id');
    }

    public function productSpecifications()
    {
        return $this->hasMany(ProductSpecification::class, 'product_id');
    }
    
    public function batteryInverterCompatibility()
    {
        return $this->hasMany(BatteryInverterCompatibility::class, 'battery_id');
    }


    /* Product Variations */
    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class, 'product_id')->with('variationSpecifications');
    }

    /* Scopes */

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInverters($query)
    {
        return $query->whereHas('categories', function ($query) {
            $query->where('title', 'like', '%inverter%');
        });
    }

    public function scopefilter($query, $filteredProducts)
    {
        return $query->whereHas('solarPanelCompatibility', function ($q) use ($filteredProducts) {
            $q->whereHas('panelType', function ($panelQuery) use ($filteredProducts) {
                $panelQuery->where('watts', $filteredProducts);
            });
        });
    }

    /* Attributes */
    public function getisActivatedAttribute()
    {
        if ($this->status == 1) {
            return true;
        }

        return false;
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (strpos($value, '.') === false) {
                    // If no decimals found, add .00 at the end
                    return $value . '.00';
                }

                // If there are decimals, return the original value
                return $value;
            },
        );
    }

    public function getRecommendedPanelAttribute()
    {
        return round(session('totalArea') / SolarPanel::STANDARD_PANEL_SIZE);
    }
}
