<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'position',
        'city',
        'description'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
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
        return $this->belongsToMany(Candidate::class, 'jobs_candidates');
    }

    public function bestCandidates()
    {
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id')
            ->join('iq_results', 'iq_results.candidate_id', '=', 'candidates.id')
            ->where('status', 'complete')
            ->orderBy('result', 'DESC')
            ->limit(10);
    }

    public function candidatesWithHighResult()
    {
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id')
            ->join('iq_results', 'iq_results.candidate_id', '=', 'candidates.id')
            ->where('status', 'complete')
            ->where('result', '>=', '70');
    }

    public function holdCandidatesCount()
    {
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id')
            ->join('iq_results', 'iq_results.candidate_id', '=', 'candidates.id')
            ->where('status', 'hold')
            ->count();
    }

    public function noMailedCandidatesCount()
    {
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id')
            ->leftJoin('sent_iq_tests', 'sent_iq_tests.candidate_id', '=', 'candidates.id')
            ->where('sent_iq_tests.candidate_id', null)
            ->count();
    }

    public function completedCandidatesCount()
    {
        return $this->belongsToMany(Candidate::class, 'jobs_candidates', 'job_id')
            ->join('iq_results', 'iq_results.candidate_id', '=', 'candidates.id')
            ->where('status', 'complete')
            ->count();
    }

    public function scopeHasDisabledJobs($query)
    {
        return $query->onlyTrashed()->count() > 0;
    }
}
