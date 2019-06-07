<?php

namespace App\Http\Controllers;

use App\Actions\Download\CandidatesCsv;
use App\Actions\Filters\AllCandidates;
use App\Cv;
use App\Http\Requests\AllCandidatesFilterRequest;
use App\Http\Requests\CandidateRequest;
use App\Job;
use App\Candidate;
use App\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;


class CandidatesController extends Controller
{

    public function index(AllCandidatesFilterRequest $request)
    {
        $workTimes = WorkTime::all();
        $candidates = $this->getCandidates();

        return view('candidates.index', compact('workTimes', 'candidates'));
    }

    /**
     * @param Job $job
     * @param Candidate $candidate
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Job $job, Candidate $candidate)
    {
        $this->authorize('show', $candidate);

        return view('candidates.show', compact('job', 'candidate'));
    }

    public function edit()
    {
        $user = auth()->user();

        return view('candidatesViews.accounts.edit', compact('user'));
    }

    public function update(Candidate $candidate, CandidateRequest $request)
    {
        $cvFile = $request->file('cv');

        if ($cvFile) {
            $name = md5(date("Y-m-d H:i:s")) . '.' . $cvFile->getClientOriginalExtension();
            $destinationPath = public_path('/storage/candidates/' . $candidate->id . '/cvs/');
            $cvFile->move($destinationPath, $name);

            $cv = new Cv([
                'name' => $name
            ]);

            $cv->candidate()->associate($candidate);
            $cv->save();
        }

        $candidate->fill($request->all())->save();

        $request->session()->flash('success', trans('messages.updated_successfully'));

        return back();
    }

    public function downloadCv(Candidate $candidate, Request $request)
    {
        if (!file_exists(base_path('/public/storage/candidates/' . $candidate->id . '/cvs/' . $candidate->cv->name))) {
            $request->session()->flash('error', trans('validation.exists', ['attribute' => 'CV']));
            return back();
        }

        $extention = strstr($candidate->cv->name, '.');

        if ($extention === 'docx') {
            header("Content-Type: docx");
        } else {
            header("Content-Type: doc");
        }

        header("Content-Disposition: attachment; filename=" . $candidate->getFullName() . '-cv.' . $extention);
        header("Content-Transfer-Encoding: binary");
        header('Pragma: no-cache');
        header('Expires: 0');

        ob_clean();
        flush();

        return @readfile( base_path('/public/storage/candidates/' . $candidate->id . '/cvs/' . $candidate->cv->name));
    }

    public function downloadPdf(AllCandidatesFilterRequest $request)
    {
        $pdf = App::make('dompdf.wrapper');

        $candidates = $this->getCandidates();
        $pdf->loadHTML(View::make('pdf.candidates.index', compact('candidates', 'workTimes')))->setPaper('a4', 'landscape');

        return $pdf->download('candidates.pdf');
    }

    public function downloadCsv(AllCandidatesFilterRequest $request)
    {
        $candidates = $this->getCandidates();

        return (new CandidatesCsv($candidates, Input::get('filters'), [
            'Status' => Input::get('status'),
            'City' => Input::get('city'),
            'Position' => Input::get('position'),
            'Level' => Input::get('level'),
            'Work_Time' => Input::get('work_time_id'),
            'Order_By_IQ_Result' => Input::get('order_by_result'),
            'Order_By_First_Name' => Input::get('order_by_first_name'),
            'Order_By_Last_Name' => Input::get('order_by_last_name')
        ]))->handle();
    }

    private function getCandidates()
    {
        return (new AllCandidates(
            Input::get('status'),
            Input::get('city'),
            Input::get('position'),
            Input::get('level'),
            Input::get('work_time_id'),
            Input::get('order_by_result'),
            Input::get('order_by_first_name'),
            Input::get('order_by_last_name'),
            Input::get('rows') ?: 20
        ))->handle();
    }
}
