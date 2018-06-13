<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Job extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position',
        'city',
        'description',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function workTime()
    {
        return $this->belongsTo(WorkTime::class, 'work_time_id');
    }
}
