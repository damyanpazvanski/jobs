<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessSector extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
