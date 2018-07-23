<?php

namespace App;

use Laravel\Cashier\Billable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CompanyAdmin extends Authenticatable
{
    use Billable;
    use Notifiable;

    /**
     * subscriptions:
     *  - small
     *  - pro
     *  - enterprise
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'trial',
        'card_brand',
        'card_last_four',
        'trial_ends_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'trial_ends_at',
        'updated_at',
        'created_at',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

//    public function subscription()
//    {
//        return $this->hasOne(Subscription::class, 'company_admin_id', 'id');
//    }
}
