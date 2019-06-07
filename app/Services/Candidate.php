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
}
