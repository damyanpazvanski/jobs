<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidates</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/pdf/candidates.css">

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

    @if(request()->input('filters'))
        <div class="card" style="width: 45%!important; float: left">
            <div class="card-header">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <strong>Filters</strong>
                    </div>
                </div>
            </div>
            <div class="form-group form-info mb-0 pb-0 mt-1">
                <label class="col-md-4 text-right">Work time:</label>
                <div class="col-md-5">
                    @if(request()->input('work_time_id'))
                        <input type="text" class="form-control select" value="{{ \App\WorkTime::find(request()->input('work_time_id'))->name }}">
                    @else
                        <input type="text" class="form-control select" value="-">
                    @endif
                </div>
            </div>

            <div class="form-group form-info mb-0 pb-0">
                <label class="col-md-4 text-right">Status:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control select" value="{{ request()->input('status') ?: '-' }}">
                </div>
            </div>

            <div class="form-group form-info mb-0 pb-0">
                <label class="col-md-4 text-right">IQ Result:</label>
                <div class="col-md-5">
                    @if(request()->input('order_by_result'))
                        <input type="text" class="form-control select" value="{{ request()->input('order_by_result') === 'asc' ? '0-100' : '100-0' }}">
                    @else
                        <input type="text" class="form-control select" value="-">
                    @endif
                </div>
            </div>

            <div class="form-group form-info mb-0 pb-0">
                <label class="col-md-4 text-right">First name:</label>
                <div class="col-md-5">
                    @if(request()->input('order_by_first_name'))
                        <input type="text" class="form-control select" value="{{ request()->input('order_by_first_name') === 'asc' ? 'A-Z' : 'Z-A' }}">
                    @else
                        <input type="text" class="form-control select" value="-">
                    @endif
                </div>
            </div>

            <div class="form-group form-info mb-0 pb-0">
                <label class="col-md-4 text-right">Last name:</label>
                <div class="col-md-5">
                    @if(request()->input('order_by_last_name'))
                        <input type="text" class="form-control select" value="{{ request()->input('order_by_last_name') === 'asc' ? 'A-Z' : 'Z-A' }}">
                    @else
                        <input type="text" class="form-control select" value="-">
                    @endif
                </div>
            </div>

            <div class="form-group form-info mb-0 pb-0">
                <label class="col-md-4 text-right">City of the job:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control select" value="{{ request()->input('city') ?: '-' }}" />
                </div>
            </div>

            <div class="form-group form-info mb-0 pb-0">
                <label class="col-md-4 text-right">Job position:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control select" value="{{ request()->input('position') ?: '-' }}"/>
                </div>
            </div>

            <div class="form-group form-info mb-0 pb-0">
                <label class="col-md-4 text-right">Level:</label>
                <div class="col-md-5">
                    <input type="text" class="form-control select" value="{{ strtoupper(request()->input('level')) ?: '-'  }}"/>
                </div>
            </div>
        </div>
        <div style="width: 5%; float: left"></div>
        <div class="card text-center" style="width: 45%!important; float: left; margin-top: -80px">
            <div class="mt-5">
                <div class="mt-5">
                    <div class="mt-3">
                        @if(auth()->user()->company->image->name)
                            <img src="storage/company_admins/{{ auth()->user()->id }}/images/{{ auth()->user()->company->image->name }}">
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-1 text-center">
                <h1>Company name: {{ auth()->user()->company->name }}</h1>

                @if(auth()->user()->company->website)
                    <h1>Website: {{ auth()->user()->company->website }}</h1>
                @endif

                <h1>Company admin: {{ auth()->user()->getFullName() }}</h1>
                <h1>Company admin email: {{ auth()->user()->email }}</h1>

            </div>
        </div>

        <div class="page-break"></div>
    @endif

    @for($i = 0, $n = ceil($candidates->count() / 12); $i < $n; $i++)
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
                                        <th>Sent Emails</th>
                                        <th>Status</th>
                                        <th>IQ Result</th>
                                        <th>Level</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @include('pdf.candidates.onePageCandidates', ['candidates' => $candidates->forPage($i + 1, 12)])
                                    </tbody>
                                </table>
                            @else
                                <h5 class="text-center">The are no candidates, please add some.</h5>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="text-right pb-1">
                Page: {{ $i + 1 }}
            </div>

            @if($i < ($n - 1))
                <div class="page-break"></div>
            @endif
        </div>
    @endfor
</body>
</html>
