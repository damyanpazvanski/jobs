@extends('layouts.app')

@section('content')

    <div class="card card-nav-tabs">
        <div class="col-md-12 charts">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <charts-circle :values="{{ json_encode(
                    [
                        ['percent' => $percentTestedCandidates, 'title' => 'Candidates who took the test.'],
                        ['percent' => 100 - $percentTestedCandidates, 'title' => 'Candidates who are on pending.']
                    ]
                ) }}"></charts-circle>
            </div>

            <div class="col-md-6  col-sm-12  col-xs-12">
                <charts-circle :values="{{ json_encode(
                    [
                        ['percent' => $percentBestCandidates, 'title' => 'Candidates with more than 70% success.'],
                        ['percent' => 100 - $percentBestCandidates, 'title' => 'Candidates with less than 70% success.']
                    ]
                ) }}"></charts-circle>
            </div>
        </div>
    </div>

    <div class="card card-nav-tabs">
        <div class="card-header" data-background-color="blue">
            <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    Best Candidates
                </div>
            </div>
        </div>
        <div class="card-content mb-2">
            <div class="col-md-12">
                <div class="table-responsive">

                    @if(isset($candidates) && $candidates->count())
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
                                    <td>{{ $candidate->count }}</td>
                                    <td>
                                                    <span class="{{ $candidate->status == 'complete' ?
                                                        'status-success' : 'status-hold' }}">
                                                        <strong>{{ $candidate->status }}</strong>
                                                    </span>
                                    </td>
                                    <td class="text-info border">{{ $candidate->result ?: '-' }} %</td>
                                    <td>{{ ucfirst($candidate->level) }}</td>
                                    <td>
                                        <a href="{{ route('show-candidate', ['candidate' => $candidate->candidate_id]) }}">
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
@endsection
