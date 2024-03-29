<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_name',
        'quantity',
        'Kwh',
        'price',
        'warranty',
        'product_image',
    ];

    protected function totalPrice(): Attribute
    {
        return Attribute::make(
            get: function () {

                $items = $this::where('order_id', 2)->get();
                $totalPrice = 0;

                foreach ($items as $item) {
                    $totalPrice += $item->quantity * $item->price;
                }

                if (strpos((string) $totalPrice, '.') === false) {
                    return number_format($totalPrice).'.00';
                }

                return number_format($totalPrice);
            },
        );
    }
}
