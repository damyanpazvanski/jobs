@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="col-md-12 text-right">
                    <a href="{{ url()->previous() }}"><button class="btn pt-1 pb-1 pl-5 pr-5 alert">Back</button></a>
                </div>
                <div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="blue">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <strong>Candidate Preview</strong>
                            </div>
                        </div>
                    </div>
                    <div class="card-content mb-5">
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">First Name:</label>
                            <div class="col-md-5">
                                <input type="text" readonly disabled value="{{ $candidate->first_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">Last Name:</label>
                            <div class="col-md-5">
                                <input type="text" readonly disabled value="{{ $candidate->last_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">Email:</label>
                            <div class="col-md-5">
                                <input type="text" readonly disabled value="{{ $candidate->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">Phone:</label>
                            <div class="col-md-5">
                                <input type="text" readonly disabled value="{{ $candidate->phone }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">Result:</label>
                            <div class="col-md-5">
                                <input type="text" readonly disabled value="{{ $candidate->iqResult->result ?: '-' }} %" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="blue">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <strong>CV Preview</strong>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        @if(is_null($candidate->cv))
                            <div class="form-group">
                                <h5 class="text-center">This candidate has no uploaded CV</h5>
                            </div>
                        @elseif(substr($candidate->cv->name, -3) === 'pdf')
                            <iframe class="col-md-12" src="/storage/candidates/{{ $candidate->id }}/cvs/{{ $candidate->cv->name }}" frameborder="0" height="600"></iframe>
                        @else
                            <div class="form-group">
                                <h5 class="text-center">The file format is not pdf</h5>
                                <div class="text-center">
                                    <a href="{{ route('download.cv.candidates', ['candidate' => $candidate->id]) }}">
                                        <button class="btn btn-info"><strong>Download the CV</strong></button>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
