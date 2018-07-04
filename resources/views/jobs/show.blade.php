@extends('layouts.app')
<style>
    .status-hold {
        background: #ff8e00;
        padding: 3px 10px;
        color: #FFFFFF;
        border-radius: 20px;
    }
    .status-success {
        background: #00ff00;
        padding: 3px 10px;
        color: #FFFFFF;
        border-radius: 20px;
    }
</style>
@section('content')
    <div class="col-md-12">
        <div class="row justify-content-center">
            @if($job->candidates()->count())
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Candidates On Hold</p>
                                    <h3 class="title">
                                        {{ $job->holdCandidatesCount() }}
                                        <small>({{ ($job->holdCandidatesCount() / $job->candidates()->count()) * 100 }} %)</small>
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
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Completed Candidates</p>
                                    <h3 class="title">
                                        {{ $job->completedCandidatesCount() }}
                                        <small>({{ ($job->completedCandidatesCount() / $job->candidates()->count()) * 100 }} %)</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Last 24 Hours
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">people</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Result is more than 70%</p>
                                    <h3 class="title">
                                        {{ $job->candidatesWithHighResult()->count() }}
                                        <small>({{ ($job->candidatesWithHighResult()->count() / $job->candidates()->count()) * 100 }} %)</small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Tracked from Github
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
                <div class="col-md-3 col-md-offset-6">
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
                                            <i class="material-icons"></i> Candidates
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#bestCandidates" data-toggle="tab">
                                            <i class="material-icons">how_to_reg</i> Best Candidates
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#settings" data-toggle="tab">
                                            <i class="material-icons">cloud</i> Server
                                        </a>
                                    </li>
                                </ul>

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
                                                    <th>Status</th>
                                                    <th>IQ Result</th>
                                                    <th>Level</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($candidates as $candidate)
                                                    <tr>
                                                        <td>{{ $candidate->first_name ?: '-' }}</td>
                                                        <td>{{ $candidate->last_name ?: '-' }}</td>
                                                        <td>{{ $candidate->email }}</td>
                                                        <td>{{ $candidate->phone ?: '-' }}</td>
                                                        <td>
                                                    <span class="{{ $candidate->iqResult->status == 'complete' ?
                                                        'status-success' : 'status-hold' }}">
                                                        {{ $candidate->iqResult->status }}
                                                    </span>
                                                        </td>
                                                        <td class="text-info border">{{ $candidate->iqResult->result ?: '-' }} %</td>
                                                        <td>{{ ucfirst($candidate->iqResult->level) }}</td>
                                                        <td>
                                                            <a href="/jobs/{{ $job->id }}/candidates/{{ $candidate->id }}">
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
                                        <table class="table table-hover">
                                            <thead class="text-info font-weight-bold">
                                            <tr>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>IQ Result</th>
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
                                                            {{ $candidate->iqResult->status }}
                                                        </span>
                                                    </td>
                                                    <td class="text-info border">{{ $candidate->iqResult->result }} %</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
