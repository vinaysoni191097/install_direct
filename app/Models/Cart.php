<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    const BOOKING_AMOUNT = 99.00;

    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'panel_quantity',
        'product_variation_id',
        'category_id',
        'panel_id',
    ];

    public function Products()
    {
        if ($this->product_variation_id) {
            return $this->belongsTo(ProductVariation::class, 'product_variation_id');
        }

        return $this->belongsTo(Product::class, 'product_id')->with('productImage');
    }

    public function solarPanels()
    {
        return $this->belongsTo(SolarPanel::class, 'panel_id');
    }

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productVariations()
    {
        return $this->belongsTo(ProductVariation::class, 'product_variation_id');
    }

    public function getBookingAmountPriceAttribute()
    {
        return number_format(self::BOOKING_AMOUNT, 2);
    }

    public function getCartItemsSummaryAttribute()
    {
        $itemsSummary = $this->products->map(function ($item) {
            return $item->quantity.' X '.$item->title;
        })->implode(' and ');

        return $itemsSummary;
    }

    protected function totalPrice(): Attribute
    {
        return Attribute::make(
            get: function () {
                $panelsPrice = $this->getSolarPanelsPriceAttribute();
                $carts = $this::where('user_id', Auth::id())->get();
                $totalPrice = 0;

                foreach ($carts as $cart) {
                    $product = $cart->products;
                    $totalPrice += $cart->quantity * $product->price;
                }

                if (strpos((string) $totalPrice, '.') === false) {
                    return number_format($totalPrice + $panelsPrice).'.00';
                }

                return number_format($totalPrice + $panelsPrice);
            },
        );
    }

    protected function payableAmount(): Attribute
    {
        return Attribute::make(
            get: function () {
                $panelsPrice = $this->getSolarPanelsPriceAttribute();
                $carts = $this::where('user_id', Auth::id())->get();
                $totalPrice = 0;

                foreach ($carts as $cart) {
                    $product = $cart->products;
                    $totalPrice += $cart->quantity * $product->price;
                }

                if (strpos((string) $totalPrice, '.') === false) {
                    $finalPrice = ($totalPrice + $panelsPrice - self::BOOKING_AMOUNT).'.00';
                    if ($finalPrice < 0) {
                        return number_format(0, 2);
                    }

                    return number_format($finalPrice);
                }

                $finalPrice = ($totalPrice + $panelsPrice - self::BOOKING_AMOUNT);
                if ($finalPrice < 0) {
                    return number_format(0, 2);
                }

                // return number_format($finalPrice);
            },
        );
    }

    protected function getSolarPanelsPriceAttribute()
    {
        $panelsPrice = $this->solarPanels->price * $this->panel_quantity ;

        return $panelsPrice;
    }
}
