<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function iqResult()
    {
        return $this->hasOne(IqResult::class);
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function cv()
    {
        return $this->hasOne(Cv::class, 'candidate_id', 'id');
    }

    public function sentIqTest()
    {
        return $this->hasOne(SentIqTest::class, 'candidate_id', 'id');
    }

    public function scopeCandidatesRelatedTo($query, $jobIds = [])
    {
        return $query->join('jobs_candidates', 'jobs_candidates.candidate_id', '=', 'candidates.id')
            ->whereIn('job_id', $jobIds);
    }

    public function scopeAddIqResults($query)
    {
        return $query->join('iq_results', 'iq_results.candidate_id', '=', 'candidates.id');
    }

    public function scopeAddJobs($query)
    {
        return $query->join('jobs', 'jobs.id', '=', 'jobs_candidates.job_id');
    }
}
