@extends('layouts.app')

@section('content')
    <disabled-jobs :jobs="{{ $jobs }}"></disabled-jobs>
@endsection
