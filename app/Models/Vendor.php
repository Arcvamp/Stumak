<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_name',
        'slug',
        'email',
        'phone_number',
        'company_name',
        'description',
        'address',
        'logo',
        'status',
        'is_verified',
        'email_verified',
        'email_verify_token',
        'email_verified_at',
        'password',
        'profile_image',
        'country_id',
        'state_id',
        'city_id',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'email_verified' => 'boolean',
        'email_verified_at' => 'datetime',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'vendor_id');
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
