@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="col-md-3 col-md-offset-9 text-right">
            <disable-job job-id="{{ $job->id }}"></disable-job>
        </div>
        <div class="row justify-content-center">
            @if($job->candidates()->count())
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Candidates On Hold</p>
                                    <h3 class="title">
                                        {{ $job->holdCandidatesCount() }}
                                        <small>({{ round(($job->holdCandidatesCount() / $job->candidates()->count()) * 100) }} %)</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-danger">warning</i>
                                        <span>You should send the emails</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Completed Candidates</p>
                                    <h3 class="title">
                                        {{ $job->completedCandidatesCount() }}
                                        <small>({{ round(($job->completedCandidatesCount() / $job->candidates()->count()) * 100) }} %)</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-success">people</i> Number of all candidates: {{ $candidates->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Result is more than 70%</p>
                                    <h3 class="title">
                                        {{ $job->candidatesWithHighResult()->count() }}
                                        <small>({{ round(($job->candidatesWithHighResult()->count() / $job->candidates()->count()) * 100) }} %)</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">nature_people</i> These are the candidates, who you want
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-12 right float-right">
                <div class="col-md-3">
                    <add-candidates :job-id="{{ $job->id }}"></add-candidates>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 col-md-offset-0 col-lg-offset-1 text-right">
                    @if ($job->noMailedCandidatesCount())
                        <div class="col-md-12 col-sm-12 col-xs-12 alert alert-danger" style="margin: 0; padding: 0">
                            <div class="col-md-7 col-sm-6 col-xs-6 pt-1 text-center">
                                <h5>You have {{ $job->noMailedCandidatesCount() }} new candidate/s</h5>
                            </div>
                            <div class="col-md-5 hidden-xs hidden-sm">
                                <i class="material-icons animated-horizontal-arrow">arrow_right_alt</i>
                            </div>
                            <div class="col-sm-6 col-xs-6 hidden-md hidden-lg">
                                <i class="material-icons animated-vertical-arrow">arrow_downward</i>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <send-emails :job-id="{{ $job->id }}"></send-emails>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="blue">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#candidates" data-toggle="tab">
                                            <i class="material-icons">people</i> Candidates
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#bestCandidates" data-toggle="tab">
                                            <i class="material-icons">how_to_reg</i> Best Completed Candidates
                                        </a>
                                    </li>
                                </ul>
                                {{--<div class="col-md-6 col-sm-6">--}}
                                    {{--<ul class="nav nav-tabs search-candidates" data-tabs="tabs">--}}
                                        {{--<li>--}}
                                            {{--<a data-toggle="tab">--}}
                                                {{--<i class="material-icons">people</i>--}}
                                                {{--<input type="text" class="search-candidates-bar" placeholder="Search">--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidates">
                                <div class="col-md-12">
                                    <div class="table-responsive">

                                        @if($candidates->count())
                                            <table class="table table-hover">
                                                <thead class="text-info font-weight-bold">
                                                <tr>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Sent Emails</th>
                                                    <th>Status</th>
                                                    <th>IQ Result</th>
                                                    <th>Level</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($candidates as $candidate)
                                                    <tr>
                                                        <td>{{ $candidate->first_name ?: '-' }}</td>
                                                        <td>{{ $candidate->last_name ?: '-' }}</td>
                                                        <td>{{ $candidate->email }}</td>
                                                        <td>{{ $candidate->phone ?: '-' }}</td>
                                                        <td>{{ $candidate->sentIqTest ? $candidate->sentIqTest->count : '-' }}</td>
                                                        <td>
                                                            <span class="{{ $candidate->iqResult->status == 'complete' ?
                                                                'status-success' : 'status-hold' }}">
                                                                <strong>{{ $candidate->iqResult->status }}</strong>
                                                            </span>
                                                        </td>
                                                        <td class="text-info border">{{ $candidate->iqResult->result ?: '-' }} %</td>
                                                        <td>{{ ucfirst($candidate->iqResult->level) }}</td>
                                                        <td>
                                                            <a href="{{ route('show-candidate', ['candidate' => $candidate->id]) }}">
                                                                <i class="material-icons text-info">remove_red_eye</i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @else
                                            <h5 class="text-center">The are no candidates, please add some.</h5>
                                        @endif
                                    </div>


                                    <div class="d-flex justify-content-between text-right">
                                        {{ $candidates->links('pagination.default') }}
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="bestCandidates">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        @if($job->bestCandidates->count())
                                            <table class="table table-hover">
                                                <thead class="text-info font-weight-bold">
                                                <tr>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>IQ Result</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($job->bestCandidates as $candidate)
                                                    <tr>
                                                        <td>{{ $candidate->first_name ?: '-' }}</td>
                                                        <td>{{ $candidate->last_name ?: '-' }}</td>
                                                        <td>{{ $candidate->email }}</td>
                                                        <td>{{ $candidate->phone ?: '-' }}</td>
                                                        <td>
                                                            <span class="{{ $candidate->iqResult->status == 'complete' ?
                                                                'status-success' : 'status-hold' }}">
                                                                <strong>{{ $candidate->iqResult->status }}</strong>
                                                            </span>
                                                        </td>
                                                        <td class="text-info border">{{ $candidate->iqResult->result }} %</td>
                                                        <td>
                                                            <a href="{{ route('show-candidate', ['candidate' => $candidate->id]) }}">
                                                                <i class="material-icons text-info">remove_red_eye</i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        @else
                                            <h5 class="text-center">The are no candidates, please add some.</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
