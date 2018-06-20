<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'website',
        'address',
        'phone',
        'city',
        'description',
    ];

    public function businessSector()
    {
        return $this->belongsTo(BusinessSector::class, 'business_sector_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
