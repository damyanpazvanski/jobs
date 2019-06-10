<?php

namespace App\Services;

class Candidate extends \App\Candidate
{

    /**
     * @param $records
     * @param $jobsIds
     *
     * @return mixed
     */
    public function getTopCandidatesByJobsIds($records, $jobsIds)
    {
        return $this
            ->join('jobs_candidates', 'jobs_candidates.candidate_id', '=', 'candidates.id')
            ->leftJoin('iq_results', 'iq_results.candidate_id', '=', 'candidates.id')
            ->whereIn('jobs_candidates.job_id', $jobsIds)
            ->orderBy('result', 'DESC')
            ->take($records);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeWhereStatusIsComplete($query)
    {
        return $query->where('iq_results.status', 'complete');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeWhereTopResult($query)
    {
        return $query->where('result', '>', 69);
    }
}
