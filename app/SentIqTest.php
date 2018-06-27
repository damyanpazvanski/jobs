<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentIqTest extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'count',
        'send_on'
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
