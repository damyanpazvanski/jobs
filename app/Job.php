<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
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
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function workTime()
    {
        return $this->belongsTo(WorkTime::class, 'work_time_id');
    }

    public function candidates()
    {
        return $this->hasMany(JobsCandidates::class, 'job_id', 'id');
    }

    public function scopeCandidates($query, $jobId)
    {
        return Candidate::join('jobs_candidates', 'jobs_candidates.candidate_id', '=', 'candidates.id')
            ->where('job_id', $jobId);
    }
}
