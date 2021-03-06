<?php

namespace App;

use App\Notifications\ResetPassword;
use Laravel\Cashier\Subscription;

class CompanyAdmin extends User
{

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
        'invoice_number',
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword(url(config('app.url').route('company.admins.password.reset', $token, false)), $token));
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getSubscription()
    {
        return $this->hasMany(Subscription::class, 'company_admin_id', 'id')
            ->orderBy('created_at', 'DESC')->limit(1)->first();
    }

    public function getPlan($subscriptionId)
    {
        return Plan::where('braintree_plan', Subscription::find($subscriptionId)->braintree_plan)->first();
    }
}
