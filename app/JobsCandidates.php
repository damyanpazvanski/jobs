<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobsCandidates extends Model
{

    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_id',
        'candidate_id'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
