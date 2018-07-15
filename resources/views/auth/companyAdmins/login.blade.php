@extends('layouts.noMenuApp')

@section('content')
    <div class="justify-content-center col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top: 50px">
        <div class="card">
            <div class="alert alert-default bold">{{ __('Company Admins Login') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('company.admins.login') }}">
                    @csrf

                    <div class="form-group row mt-5">
                        <label for="password"
                               class="col-md-4 col-form-label text-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input type="email" name="email"
                                   class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   value="{{ old('email') }}" required/>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" data-background-color="blue"
                                       data-color="blue" checked> {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-lg btn-block alert">
                                {{ __('Login') }}
                            </button>
                            <hr>
                            <a class="btn btn-link" href="{{ route('company.admins.register') }}">
                                {{ __('You have\'t an account?') }}
                            </a>
                            <a class="btn btn-link" href="{{ route('company.admins.password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
