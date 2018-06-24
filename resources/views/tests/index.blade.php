@extends('layouts.noMenuApp')

@section('content')
    <div class="" style="padding-top: 50px">
        <test :questions="{{ $questions }}"></test>
    </div>
@endsection
