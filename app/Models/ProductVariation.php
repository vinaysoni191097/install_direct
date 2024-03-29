<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $table = 'product_variations';

    protected $fillable = [
        'title',
        'product_id',
        'price',
        'featured_image_id',
        'stock',
        'status',
        'warranty',
        'Kwh',
    ];

    public function variationImage()
    {
        return $this->belongsTo(Media::class, 'featured_image_id');
    }

    public function variationSpecifications()
    {
        return $this->hasMany(ProductSpecification::class, 'product_variation_id');
    }

    public function parentProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                if (strpos($value, '.') === false) {
                    // If no decimals found, add .00 at the end
                    return $value.'.00';
                }

                // If there are decimals, return the original value
                return $value;
            },
        );
    }
}
