<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'type',
        'data',
        'email_content',
        'user_id',
        'read_at',
        'notifiable_id',
        'notifiable_type',
    ];
}
