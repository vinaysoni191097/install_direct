<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    const USER_REGISTRATION = 1;

    const ORDER_CONFIRMATION = 2;

    const NEW_PASSWORD = 3;

    const ADMIN_ORDER_CONFIRMATION = 4;

    const BOOKING_CONFIRMATION = 5;

    const ABANDONMENT_CART = 6;

    const ABANDONMENT_CART_48_HOURS = 7;

    use HasFactory, Sluggable;

    protected $fillable = [
        'template_used_for',
        'slug',
        'subject',
        'mail_body',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'template_used_for',
                'onUpdate' => true,
            ],
        ];
    }

    public function getTemplateUsedForAttribute($value)
    {

        switch ($value) {
            case self::USER_REGISTRATION:
                return 'User Registration';
                break;
            case self::ORDER_CONFIRMATION:
                return 'Order Confirmation';
                break;
            case self::NEW_PASSWORD:
                return 'New Password Email';
                break;
            case self::ADMIN_ORDER_CONFIRMATION:
                return 'Admin Order Confirmation';
                break;
            case self::BOOKING_CONFIRMATION:
                return 'Booking Confirmation';
                break;
            case self::ABANDONMENT_CART:
                return 'Abandonment Cart';
                break;
            case self::ABANDONMENT_CART_48_HOURS:
                return 'Abandonment Cart-48hours';
                break;
            default:
                // code...
                break;
        }
    }
}
