<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'status',
        'availability',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOrderAssignedAttribute()
    {
        dd('here');
    }
}
