<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    const ADMIN = 1;

    const USER = 2;

    const TECHNICIAN = 3;

    use HasApiTokens, HasFactory, Notifiable, Sluggable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'stripe_customer_id',
        'role_id',
        'email',
        'phone_number',
        'password',
        'slug',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /** Sluggable */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ],
        ];
    }

    /* Scopes */
    public function scopeIsNotAdmin($query)
    {
        return $query->where('role_id', '!=', $this::ADMIN);
    }

    public function scopeIsAdmin($query)
    {
        return $query->where('role_id', $this::ADMIN);
    }

    public function scopeIsUser($query)
    {
        return $query->where('role_id', $this::USER);
    }

    public function scopeIsTechnician($query)
    {
        return $query->where('role_id', $this::TECHNICIAN);
    }

    public function scopeUserProfile($query, $user)
    {
        return $query->where('slug', $user->slug);
    }

    public function scopeAvailableTechnicians($query)
    {
        return $query->whereHas('technicianData', function ($query) {
            $query->where('availability', true);
        });
    }

    // Relations
    public function userData()
    {
        return $this->hasOne(UserProfile::class, 'user_id')->with('defaultAddress');
    }

    public function technicianData()
    {
        return $this->hasOne(TechnicianProfile::class, 'user_id');
    }

    public function userEnquiry()
    {
        return $this->hasMany(Enquiry::class, 'user_id');
    }

    public function userBillingAddresses()
    {
        return $this->hasMany(BillingAddress::class, 'user_id');
    }

    public function userInstallationAddress()
    {
        return $this->hasOne(InstallationAddress::class, 'user_id');
    }

    public function userOrderAvailable()
    {
        return $this->hasMany(Order::class, 'user_id')->count();
    }

    public function userEmailNotifications()
    {
        return $this->hasMany(Notification::class, 'notifiable_id');
    }
    // Attributes

    public function accountType(): string
    {
        return match ($this->attributes['role_id']) {
            1 => 'Admin',
            2 => 'Customer',
            3 => 'Technician',
            default => 'Unknown'
        };
    }

    public function getIsAdminAttribute()
    {
        return $this->role_id == self::ADMIN;
    }

    public function getIsUserAttribute()
    {
        return $this->role_id == self::USER;
    }

    public function nameInitials(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $this->load('userData');

                if ($this->userData) {
                    $firstInitial = substr($this->userData->first_name, 0, 1);
                    $lastInitial = substr($this->userData->last_name, 0, 1);

                    return $firstInitial . $lastInitial;
                }

                return 'No initials';
            },
        );
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = sprintf('%s %s', $value['first_name'], $value['last_name']);
    }

    public function getpendingOrderAttribute()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        if ($cart) {
            return true;
        }

        return false;
    }

    public function getFullAddressAttribute()
    {
        return sprintf('%s %s %s %s %s', $this->technicianData->address, $this->technicianData->city, $this->technicianData->state, $this->technicianData->country, $this->technicianData->zip);
    }

    public function getUserFullAddress($value)
    {
        if ($value) {
            return sprintf('%s %s %s %s %s', $value->address, $value->city, $value->state, $value->country, $value->zip);
        }
        if ($this->userBillingAddresses->isNotEmpty()) {
            $billingAddress = $this->userBillingAddresses->last();

            // return $billingAddress;
            return sprintf('%s %s %s %s %s', $billingAddress->address, $billingAddress->city, $billingAddress->state, $billingAddress->country, $billingAddress->zip);
        }

        return 'No address updated yet!';
    }

    public function getAccountStatusAttribute()
    {
        switch ($this->role_id) {
            case self::USER:
                if ($this->userData->status) {
                    return 'Active';
                }

                return 'De-Activated';
                break;
            case self::TECHNICIAN:
                if ($this->technicianData->status) {
                    return 'Active';
                }

                return 'De-Activated';
                break;
            default:
                break;
        }
    }

    public function getAvailabilityStatusAttribute()
    {
        if ($this->technicianData->availability) {
            return '<span class="text-green-500 font-semibold">Available</span>';
        }

        return '<span class="text-red-600 font-semibold">Not Available</span>';
    }

    public function getOrderAssignedStatusAttribute()
    {
        if ($this->technicianData->availability) {
            return true;
        }

        return false;
    }

    public function getIsUserOrderAvailableAttribute()
    {
        $order = $this->userOrderAvailable();

        if ($order > 0) {
            return true;
        }

        return false;
    }
}
