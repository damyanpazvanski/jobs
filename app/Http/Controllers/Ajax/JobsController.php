<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Requests\JobRequest;
use App\Job;
use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * @param Job $job
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Job $job)
    {
        $job->delete();

        request()->session()->flash('success', trans('messages.deleted_successfully'));

        return response()->json([]);
    }

    public function activate(JobRequest $request)
    {
        Job::onlyTrashed()
            ->where('id', $request->get('job_id'))
            ->restore();

        request()->session()->flash('success', trans('messages.restored_successfully'));

        return response()->json([]);
    }
}
