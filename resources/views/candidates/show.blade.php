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
                    <div class="card-content mb-5">
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">First Name:</label>
                            <div class="col-md-5">
                                <input type="text" readonly value="{{ $candidate->first_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">Last Name:</label>
                            <div class="col-md-5">
                                <input type="text" readonly value="{{ $candidate->last_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">Email:</label>
                            <div class="col-md-5">
                                <input type="text" readonly value="{{ $candidate->email }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">Phone:</label>
                            <div class="col-md-5">
                                <input type="text" readonly value="{{ $candidate->phone }}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-4 text-right">Result:</label>
                            <div class="col-md-5">
                                <input type="text" readonly value="{{ $candidate->iqResult->result }} %" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="card card-nav-tabs">
                    <div class="card-header" data-background-color="blue">
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper" >
                                CV Preview
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <cv-preview></cv-preview>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
