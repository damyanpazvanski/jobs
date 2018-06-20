@extends('layouts.noMenuApp')

@section('content')
    <div class="justify-content-center" style="margin-top: 50px">
        <div class="card">
            <div class="card-header" data-background-color="blue">{{ __('Login') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
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

                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-lg btn-block" data-background-color="blue">
                                {{ __('Login') }}
                            </button>
                            <hr>
                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('You have\'t account?') }}
                            </a>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
