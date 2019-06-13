<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidates</title>
    <link rel="stylesheet" href="css/app.css">

    <style>
        .page-break {
            page-break-after: always;
        }
        .card-header {
            background: #26c6da!important;
            color: #ffffff!important;
        }
        input, select {
            height: 15px!important;
        }
        body {
            background: #ffffff!important;
        }
        .form-group {
            margin-bottom: 10px!important;
        }
        h1 {
            font-size: 18px!important;
        }
    </style>
</head>
<body>
    <div class="card" style="width: 45%!important; float: left">
        <div class="card card-profile open" style="margin-top: 120px">
            <p class="category text-gray">Job Description</p>

            <div class="content" style="padding-bottom: 10px; border: 1px solid #d3d3d3; width: 50%; margin: auto; border-radius: 5px">
                <h4 class="category text-gray">{{ strtoupper($job->workTime->name) }}</h4>
                <h4 class="alert card-title" style="border: 1px solid lightgrey">{{ $job->position }}</h4>
                <div>
                    <p>County: {{ $job->country->name }}</p></p>
                    <p>City: {{ $job->city }}</p></p>
                    <p>Created at: {{ $job->created_at->format('m/d/Y') }}</p></p>
                    <p class="category text-gray">Candidates: {{ $job->candidates()->count() }}</p>
                    <p class="category text-gray">Best Candidates: {{ $candidates->count() }}</p>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 5%; float: left"></div>
    <div class="card text-center" style="width: 45%!important; float: left; margin-top: -80px">
        <div class="mt-5">
            <div class="mt-5">
                <div class="mt-3">
                    @if(optional($company->image)->name)
                        <img style="max-height: 400px!important; max-width: 100%!important;"
                             src="storage/company_admins/{{ auth()->user()->id }}/images/{{ $company->image->name }}">
                    @endif
                </div>
            </div>
        </div>
        <div class="text-center @if(!$company->image) mt-5 @endif">
            <h1>Company name: {{ $company->name }}</h1>

            @if($company->website)
                <h1>Website: {{ $company->website }}</h1>
            @endif

            <h1>Company admin: {{ auth()->user()->getFullName() }}</h1>
            <h1>Company admin email: {{ auth()->user()->email }}</h1>

        </div>
    </div>

    <div class="page-break"></div>

    <div class="col-md-12" style="background: #d3d3d3">
        <div class="card card-nav-tabs" style="height: 87%">
            <div class="card-header">
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
                                    <th class="text-center">Status</th>
                                    <th>IQ Result</th>
                                    <th>Level</th>
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
                                                <div class="text-center {{ $candidate->iqResult->status == 'complete' ?
                                                    'status-success' : 'status-hold' }}">
                                                    <strong>{{ $candidate->iqResult->status }}</strong>
                                                </div>
                                            </td>
                                            <td class="text-info border">{{ $candidate->iqResult->result ?: '-' }} %</td>
                                            <td>{{ ucfirst($candidate->iqResult->level) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h5 class="text-center">The are no candidates, please add some. Or they have not completed the test.</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
