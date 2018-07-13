@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="card card-nav-tabs">
                <div class="card-header" data-background-color="blue">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <strong>Filters</strong>
                        </div>
                    </div>
                </div>
                <div class="card-content col-md-12">
                    <form class="form-horizontal form-info" method="GET">

                        <div class="col-md-6">
                            <div class="form-group form-info">
                                <label class="col-md-4 text-right">Work time:</label>
                                <div class="col-md-5">
                                    <select name="work_time_id" class="form-control select">
                                        <option value="">Choose work time (or none)</option>
                                        @foreach($workTimes as $workTime)
                                            <option value="{{ $workTime->id }}"
                                                    @if(request()->input('work_time_id') == $workTime->id) selected @endif
                                            >{{ ucfirst($workTime->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-info">
                                <label class="col-md-4 text-right">Status:</label>
                                <div class="col-md-5">
                                    <select name="status" class="form-control select">
                                        <option value="">Choose status (or none)</option>
                                        <option value="complete" @if(request()->input('status') === 'complete') selected @endif>Complete</option>
                                        <option value="hold" @if(request()->input('status') === 'hold') selected @endif>Hold</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-info">
                                <label class="col-md-4 text-right">IQ Result:</label>
                                <div class="col-md-5">
                                    <select name="order_by_result" class="form-control select">
                                        <option value="">Sort by IQ result (or none)</option>
                                        <option value="asc" @if(request()->input('order_by_result') === 'asc') selected @endif>Result: 0-100</option>
                                        <option value="desc" @if(request()->input('order_by_result') === 'desc') selected @endif>Result: 100-0</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-info">
                                <label class="col-md-4 text-right">First name:</label>
                                <div class="col-md-5">
                                    <select name="order_by_first_name" class="form-control select">
                                        <option value="">Sort by first name (or none)</option>
                                        <option value="asc" @if(request()->input('order_by_first_name') === 'asc') selected @endif>First name: A-Z</option>
                                        <option value="desc" @if(request()->input('order_by_first_name') === 'desc') selected @endif>First name: Z-A</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-info">
                                <label class="col-md-4 text-right">Last name:</label>
                                <div class="col-md-5">
                                    <select name="order_by_last_name" class="form-control select">
                                        <option value="">Sort by last name (or none)</option>
                                        <option value="asc" @if(request()->input('order_by_last_name') === 'asc') selected @endif>Last name: A-Z</option>
                                        <option value="desc" @if(request()->input('order_by_last_name') === 'desc') selected @endif>Last name: Z-A</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group form-info">
                                <label class="col-md-4 text-right">City of the job:</label>
                                <div class="col-md-5">
                                    <input type="text" name="city" class="form-control" value="{{ request()->input('city') }}" placeholder="Search for a city" />
                                </div>
                            </div>

                            <div class="form-group form-info">
                                <label class="col-md-4 text-right">Job position:</label>
                                <div class="col-md-5">
                                    <input type="text" name="position" class="form-control" value="{{ request()->input('position') }}" placeholder="Search for a position" />
                                </div>
                            </div>

                            <div class="form-group form-info">
                                <label class="col-md-4 text-right">Level:</label>
                                <div class="col-md-5">
                                    <select name="level" class="form-control select">
                                        <option value="">Sort by level (or none)</option>
                                        <option value="low" @if(request()->input('level') === 'low') selected @endif>Low</option>
                                        <option value="below middle" @if(request()->input('level') === 'below middle') selected @endif>Below Middle</option>
                                        <option value="middle" @if(request()->input('level') === 'middle') selected @endif>Middle</option>
                                        <option value="above middle" @if(request()->input('level') === 'above middle') selected @endif>Above Middle</option>
                                        <option value="high" @if(request()->input('level') === 'high') selected @endif>High</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-md-offset-8 text-right">
                            <input type="submit" value="Filter" class="btn btn-block btn-info" />
                        </div>
                    </form>
                </div>
            </div>

            <download-candidates-report
                    csv-url="{{ route('download.csv.candidates', request()->input()) }}"
                    pdf-url="{{ route('download.pdf.candidates', request()->input()) }}"
            ></download-candidates-report>

            <div class="card card-nav-tabs">
                <div class="card-header" data-background-color="blue">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <strong>Candidates</strong>
                        </div>
                    </div>
                </div>
                <div class="card-content mb-2">
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
            </div>
        </div>
    </div>
@endsection
