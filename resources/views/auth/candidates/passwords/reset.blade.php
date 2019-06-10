@extends('layouts.noMenuApp')

@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row justify-content-center">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header" data-background-color="blue">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('candidates.password.request') }}">
                            @csrf

                            <div class="form-group mt-5 mb-5">
                                <label for="email"
                                       class="col-md-4 col-form-label text-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6 col-xs-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mt-1">
                                <label for="password"
                                       class="col-md-4 col-form-label text-right">{{ __('Password') }}</label>

                                <div class="col-md-6 col-xs-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" value="{{ old('password') }}" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mt-1">
                                <label for="password"
                                       class="col-md-4 col-form-label text-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6 col-xs-12">
                                    <input id="password-confirm" type="password" class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}"
                                           name="password-confirm" value="{{ old('password-confirm') }}" required>
                                </div>
                            </div>



                            <div class="form-group mb-0">
                                <div class="col-md-8 col-md-offset-2 text-center">
                                    <button type="submit" class="btn btn-block btn-lg" data-background-color="blue">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
