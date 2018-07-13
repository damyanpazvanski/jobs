@extends('layouts.app')

@section('content')
    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="row justify-content-center">
            <form method="POST" action="{{ route('store.jobs') }}">
                @csrf
                <div class="card">
                    <div class="card-header font-weight-bold" data-background-color="blue">
                        <h4 class="title">New Job</h4>
                    </div>

                    <div class="card-body col-md-12">
                        <div class="form-group row form-info">
                            <label for="position" class="col-md-4 col-form-label text-right">Position name</label>

                            <div class="col-md-6">
                                <input id="position" name="position" type="text" value="{{ old('position') }}"
                                       class="form-control {{ $errors->has('position') ? 'invalid-input' : '' }}" required autofocus>

                                @if ($errors->has('position'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('position') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-info">
                            <label for="country_id" class="col-md-4 col-form-label text-right">Country</label>

                            <div class="col-md-6">
                                <select name="country_id" id="country_id"
                                        class="custom-select select {{ $errors->has('country_id') ? 'invalid-input' : '' }}">
                                    <option value="">Choose country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                                @if(old('country_id') == $country->id) selected @endif
                                        >{{ ucfirst($country->name) }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('country_id'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('country_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-info">
                            <label for="city" class="col-md-4 col-form-label text-right">City</label>

                            <div class="col-md-6">
                                <input id="city" name="city" type="text" value="{{ old('city') }}"
                                       class="form-control {{ $errors->has('city') ? 'invalid-input' : '' }}" required>

                                @if ($errors->has('city'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('city') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row form-info">
                            <label for="work_time_id" class="col-md-4 col-form-label text-right">Work Time</label>

                            <div class="col-md-6">
                                <select name="work_time_id" id="work_time_id"
                                        class="custom-select select {{ $errors->has('work_time_id') ? 'invalid-input' : '' }}">
                                    <option value="">Choose work time</option>
                                    @foreach($workTimes as $workTime)
                                        <option value="{{ $workTime->id }}"
                                                @if(old('work_time_id') == $workTime->id) selected @endif
                                        >{{ ucfirst($workTime->name) }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('work_time_id'))
                                    <div class="mt-2">
                                        <strong class="invalid">{{ $errors->first('work_time_id') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <button class="btn btn-lg btn-block" data-background-color="blue">
                                    Create
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
