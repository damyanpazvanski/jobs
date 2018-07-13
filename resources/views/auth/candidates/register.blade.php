@extends('layouts.noMenuApp')

@section('content')
    <div class="justify-content-center col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top: 50px">
        <div class="card">
            <div class="card-header font-weight-bold" data-background-color="blue">
                <h3 class="title bold">User Information</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('candidates.register') }}" method="POST">
                    @csrf

                    <div class="form-group row form-info mt-3">
                        <label for="first_name" class="col-md-4 col-form-label text-right">First name</label>

                        <div class="col-md-6">
                            <input id="first_name" name="first_name" type="text" class="form-control" required autofocus value="{{ old('first_name') }}">

                            @if ($errors->has('first_name'))
                                <div class="mt-1">
                                    <strong class="invalid">{{ $errors->first('first_name') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row form-info">
                        <label for="last_name" class="col-md-4 col-form-label text-right">Last name</label>

                        <div class="col-md-6">
                            <input id="last_name" name="last_name" type="text" class="form-control" required value="{{ old('last_name') }}">

                            @if ($errors->has('last_name'))
                                <div class="mt-1">
                                    <strong class="invalid">{{ $errors->first('last_name') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row form-info">
                        <label for="email" class="col-md-4 col-form-label text-right">E-Mail Address'</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" required value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <div class="mt-1">
                                    <strong class="invalid">{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row form-info">
                        <label for="password" class="col-md-4 col-form-label text-right">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>

                            @if ($errors->has('password'))
                                <div class="mt-1">
                                    <strong class="invalid">{{ $errors->first('password') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <ul class="mt-2">
                                <li>At least 8 characters</li>
                                <li>At least one uppercase letter</li>
                                <li>At least one lowercase letter</li>
                            </ul>
                        </div>
                    </div>

                    <div class="form-group row form-info">
                        <label for="password-confirm" class="col-md-4 col-form-label text-right">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" required>

                            @if ($errors->has('password-confirm'))
                                <div class="mt-1">
                                    <strong class="invalid">{{ $errors->first('password-confirm') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-1 mt-4">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <input type="submit" value="Register" class="btn btn-lg btn-block bold" data-background-color="blue" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
