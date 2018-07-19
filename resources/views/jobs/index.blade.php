@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header font-weight-bold" data-background-color="blue"
                     style="font-size: 12px">

                </div>
                <div class="card-body">

                    @if($jobs->count() === 0)
                        <div class="col-md-12 text-right">
                            <i class="material-icons animated-horizontal-arrow" style="font-size: 142px">arrow_right_alt</i>
                        </div>
                    @endif

                    @foreach($jobs as $job)
                        <a href="/jobs/{{ $job->id }}" class="col-md-3">
                            <div class="card card-profile open">
                                <div class="text-left job-pin-wrapper">
                                    <img src="/images/pin.png" class="job-pin">
                                </div>

                                <div class="content" style="padding-bottom: 10px">
                                    <h4 class="category text-gray">{{ strtoupper($job->workTime->name) }}</h4>
                                    <h4 class="alert card-title">{{ $job->position }}</h4>
                                    <div>
                                        <p>County: {{ $job->country->name }}</p></p>
                                        <p>City: {{ $job->city }}</p></p>
                                        <p>Created at: {{ $job->created_at->format('m/d/Y') }}</p></p>
                                        <p class="category text-gray">Candidates: {{ $job->candidates()->count() }}</p>
                                        <p class="category text-gray">Best Candidates: {{ $job->candidatesWithHighResult()->count() }}</p>
                                    </div>

                                    <span class="btn btn-round btn-show-text" data-background-color="green">Open</span>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <a href="{{ route('create.jobs') }}" class="btn btn-lg btn-info add-job">+</a>
    </div>
@endsection
