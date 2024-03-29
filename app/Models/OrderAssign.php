<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAssign extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'technician_id',
    ];

    public function technicianDetails()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function orderDetails()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
