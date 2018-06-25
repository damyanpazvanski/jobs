@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="blue">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper" >
                                Candidate: {{ trim($candidate->getFullName()) ?: '- -' }}
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="form-group">
                            <label for="" class="col-md-3 text-right">First Name:</label>
                            <div class="col-md-6">
                                <input type="text" readonly value="{{ $candidate->first_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 text-right">Last Name:</label>
                            <div class="col-md-6">
                                <input type="text" readonly value="{{ $candidate->last_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 text-right">Email:</label>
                            <div class="col-md-6">
                                <input type="text" readonly value="{{ $candidate->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 text-right">Phone:</label>
                            <div class="col-md-6">
                                <input type="text" readonly value="{{ $candidate->phone }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 text-right">Result:</label>
                            <div class="col-md-6">
                                <input type="text" readonly value="{{ $candidate->iqResult->result }} %" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 text-right">CV:</label>
                            <div class="col-md-6">
                                <a href="/jobs/{{ $job->id }}/candidates/{{ $candidate->id }}/cv">
                                    <button class="btn btn-block">CV</button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
