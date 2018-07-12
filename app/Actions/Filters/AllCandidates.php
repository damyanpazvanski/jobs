<?php

namespace App\Actions\Filters;


use App\Candidate;

class AllCandidates
{

    private $status = null;
    private $city = null;
    private $position = null;
    private $level = null;
    private $workTimeId = null;
    private $orderByResult = null;
    private $orderByFirstName = null;
    private $orderByLastName = null;
    private $onPage = null;

    public function __construct($status, $city, $position, $level, $workTimeId, $orderByResult, $orderByFirstName, $orderByLastName, $onPage = 10)
    {
        $this->status = $status;
        $this->city = $city;
        $this->position = $position;
        $this->level = $level;
        $this->workTimeId = $workTimeId;
        $this->orderByResult = $orderByResult;
        $this->orderByFirstName = $orderByFirstName;
        $this->orderByLastName = $orderByLastName;
        $this->onPage = $onPage;
    }

    public function handle()
    {
        $candidatesQuery = Candidate::distinct('candidates.id')->select('candidates.*', 'candidates.id as id')
            ->candidatesRelatedTo(auth()->user()->company->jobs()->pluck('id'));

        if ($this->status || $this->level || $this->orderByResult) {
            $candidatesQuery->AddIqResults();
        }

        if ($this->city || $this->position || $this->workTimeId) {
            $candidatesQuery->AddJobs();
        }

        if ($this->status) {
            $candidatesQuery->where('status', $this->status);
        }

        if ($this->city) {
            $candidatesQuery->where('city', 'like', '%' . $this->city . '%');
        }

        if ($this->position) {
            $candidatesQuery->where('position', 'like', '%' . $this->position . '%');
        }

        if ($this->level) {
            $candidatesQuery->where('level', $this->level);
        }

        if ($this->workTimeId) {
            $candidatesQuery->where('work_time_id', $this->workTimeId);
        }

        if ($this->orderByResult) {
            $candidatesQuery->orderBy('result', $this->orderByResult);
        }

        if ($this->orderByFirstName) {
            $candidatesQuery->orderBy('result', $this->orderByFirstName);
        }

        if ($this->orderByLastName) {
            $candidatesQuery->orderBy('result', $this->orderByLastName);
        }

        $candidates = $candidatesQuery->paginate($this->onPage);

        $candidates->appends([
            'status' => $this->status,
            'city' => $this->city,
            'position' => $this->position,
            'level' => $this->level,
            'work_time_id' => $this->workTimeId,
            'order_by_result' => $this->orderByResult,
            'order_by_first_name' => $this->orderByFirstName,
            'order_by_last_name' => $this->orderByLastName
        ]);

        return $candidates;
    }
}
