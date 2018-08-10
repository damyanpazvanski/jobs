@extends('layouts.noMenuApp')

@section('content')
    <div class="justify-content-center" style="margin-top: 50px">
        <div class="col-md-10 col-md-offset-1 text-right">
            <a href="{{ url()->previous() }}"><button class="btn pt-1 pb-1 pl-5 pr-5 alert">Back</button></a>
        </div>
        <subscriptions
                token="{{ $token }}"
                couponError=""
        ></subscriptions>
    </div>
@endsection
