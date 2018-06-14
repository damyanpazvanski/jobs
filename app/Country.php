<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Country extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany(CompanyAdmin::class);
    }
}
