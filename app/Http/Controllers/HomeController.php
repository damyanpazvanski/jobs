<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Notifications\MainContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * @param \App\Services\Candidate $candidateService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(\App\Services\Candidate $candidateService)
    {
        if (!Auth::check()) {
            return App::make(self::class)->presentationIndex();
        } else if (auth()->user() instanceof Candidate) {
            return App::make(self::class)->candidatesIndex();
        }

        $jobsIds = auth()->user()->company->jobs()->pluck('id');

        $candidates = $candidateService
            ->getTopCandidatesByJobsIds(10, $jobsIds)
            ->paginate(10);

        $candidatesCount = $candidateService->candidatesRelatedTo($jobsIds)->count();

        $percentTestedCandidates = $candidateService->candidatesRelatedTo($jobsIds)
            ->AddIqResults()
            ->whereStatusIsComplete()
            ->count() * (100 / $candidatesCount);

        $percentBestCandidates = $candidateService->candidatesRelatedTo($jobsIds)
            ->AddIqResults()
            ->where('result', '>', 69)
            ->count() * (100 / $candidatesCount);

        return view('dashboard.admin', compact('candidates', 'percentTestedCandidates', 'percentBestCandidates'));
    }

    public function candidatesIndex()
    {
        return view('candidatesViews.home');
    }

    public function presentationIndex()
    {
        return view('presentationViews.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'company_name' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'message' => 'nullable|string|max:2000',
            'gdpr' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/#contact')
                ->withErrors($validator)
                ->withInput();
        }

        Notification::route('mail', config('services.support.email'))
            ->notify(new MainContact(
                $request->name,
                $request->email,
                $request->phone,
                $request->company_name,
                $request->type,
                $request->message
            ));

        $request->session()->flash('success', 'Successfully sent.');

        return response()->redirectTo(route('home') . '#success-msg');
    }
}
