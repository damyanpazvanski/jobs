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
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id');
    }

    public function bestCandidates()
    {
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id')
            ->join('iq_results', 'iq_results.candidate_id', '=', 'candidates.id')
            ->where('status', 'complete')
            ->orderBy('result', 'DESC')
            ->limit(10);
    }

    public function holdCandidatesCount()
    {
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id')
            ->join('iq_results', 'iq_results.candidate_id', '=', 'candidates.id')
            ->where('status', 'hold')
            ->count();
    }

    public function completedCandidatesCount()
    {
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id')
            ->join('iq_results', 'iq_results.candidate_id', '=', 'candidates.id')
            ->where('status', 'complete')
            ->count();
    }
}
