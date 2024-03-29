<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'first_name',
        'last_name',
        'slug',
        'email',
        'phone_number',
        'designation',
        'description',
        'profile_picture',
        'linkedIn_url',
        'twitter_url',
    ];

    /** Sluggable */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['first_name', 'last_name'],
                'onUpdate' => true,
            ],
        ];
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {
                return sprintf('%s %s', $this->first_name, $this->last_name);
            }
        );
    }

    public function nameInitials(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                $firstInitial = substr($this->first_name, 0, 1);
                $lastInitial = substr($this->last_name, 0, 1);

                return $firstInitial.$lastInitial;
            },
        );
    }
}
