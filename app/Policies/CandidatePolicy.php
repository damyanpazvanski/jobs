<?php

namespace App\Policies;

use App\User;
use App\Candidate;
use Illuminate\Auth\Access\HandlesAuthorization;

class CandidatePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Candidate $candidate
     * @return bool
     */
    public function show(User $user, Candidate $candidate)
    {
        $job = $user->company->jobs()
            ->with(['candidates' => function ($query) use ($candidate) {
                $query->where('id', $candidate->id);
            }])
            ->first()
            ->toArray();

        if ($job['candidates']) {
            return true;
        }

        return false;
    }
}
