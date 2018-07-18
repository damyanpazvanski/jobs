<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'discount_id',
        'name',
        'amount',
        'kind',
        'neverExpires',
        'numberOfBillingCycles',
        'description'
    ];
}
