<?php

namespace App\Models;

use App\Enum\OrderStatus;
use App\Enum\PropertyImageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'order_number',
        'installation_address',
        'billing_name',
        'billing_address',
        'installation_timeframe',
        'total_amount',
        'payable_amount',
        'status',
        'document_uploaded',
        'booking_amount',
        'rooftop_cordinates',
        'installation_address_latitude',
        'installation_address_longitude'
    ];

    public function customerDetails()
    {
        return $this->belongsTo(User::class, 'user_id')->whereNull('deleted_at');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function propertyImages()
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderAssigned()
    {
        return $this->hasOne(OrderAssign::class, 'order_id');
    }

    public function getassignedTechnicianAttribute()
    {
        return $this->orderAssigned->technician_id;
    }

    // Scopes
    public function scopeNewOrders($query)
    {
        return $query->where('status', 0);
    }

    public function getOrderItemsSummaryAttribute()
    {
        $itemsSummary = $this->orderItems->map(function ($item) {
            return $item->product_name;
        })->implode(' and ');

        return $itemsSummary;
    }

    public function getPayableAmountAttribute()
    {
        $totalPrice = 0;

        foreach ($this->orderItems as $item) {
            $totalPrice += $item->quantity * $item->price;
        }

        $finalPrice = $totalPrice - Cart::BOOKING_AMOUNT;

        return number_format($finalPrice, 2);
    }

    protected function getTotalAmountAttribute()
    {

        $totalPrice = 0;

        foreach ($this->orderItems as $item) {
            $totalPrice += $item->quantity * $item->price;
        }

        if (strpos((string) $totalPrice, '.') === false) {
            return number_format($totalPrice) . '.00';
        }

        return number_format($totalPrice);
    }

    protected function getItemTotalAmountAttribute()
    {
        $totalPrice = 0;
        foreach ($this->orderItems as $item) {
            $totalPrice = $item->quantity * $item->price;

            return number_format($totalPrice);
        }
    }

    public function getOrderStatusAttribute()
    {
        switch ($this->status) {
            case OrderStatus::NEW['value']:
                return '<span class="bg-black  text-white rounded-full px-4 py-1">New</span>';
                break;
            case OrderStatus::IN_PROGRESS['value']:
                return '<span class="bg-yellow-700  border-yellow-300 text-white rounded-full px-4 py-1">In-Progres</span>';
                break;
            case OrderStatus::COMPLETED['value']:
                return '<span class="bg-green-800 text-white rounded-full px-4 py-1">Completed</span>';
                break;
            case OrderStatus::ASSIGNED['value']:
                return '<span class="bg-green-500  text-white rounded-full px-4 py-1">Assigned</span>';
                break;
            default:
                return '<span class="bg-red-600  border-red-300 text-white rounded-full px-4 py-1">Cancelled</span>';
                break;
        }
    }

    public function getTechnicianOrderStatusAttribute()
    {
        if ($this->orderAssigned) {
            return '<span class="bg-green-500  text-white rounded-full px-4 py-1">Assigned</span>';
        }

        return '<span class="bg-yellow-50  border-yellow-300 text-yellow-500 rounded-full px-4 py-1">Not Assigned</span>';
    }

    public function getWorkInProgressAttribute()
    {
        return OrderStatus::IN_PROGRESS['value'];
    }

    public function getPropertyImagesByType(int $imageType)
    {
        return $this->propertyImages->where('image_type', $imageType)->all();
    }

    public function getFrontHouseImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::FRONT_OF_THE_HOUSE);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }

    public function getSideHouseImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::SIDE_OF_THE_HOUSE);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }

    public function getBackHouseImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::BACK_OF_THE_HOUSE);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }

    public function getBatteryAndIverterPositionImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::BATTERY_AND_INVERTER_POSITION);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }

    public function getElectricMeterImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::ELECTRIC_METER);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }

    public function getElectricityBillImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::ELECTRICITY_BILLS);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }

    public function getFuseBoardImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::FUSE_BOARD);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }

    public function getInsideAtticImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::INSIDE_OF_ATTIC);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }

    public function getAdditionalImagesAttribute()
    {
        $images = $this->getPropertyImagesByType(PropertyImageType::ADDITIONAL_IMAGES);
        $propertyImage = '';

        foreach ($images as $key => $image) {
            $propertyImage .= '<img class="custom-image-size object-cover" src="' . asset('storage/' . $image->image_path) . '">';
        }

        return $propertyImage;
    }
}
