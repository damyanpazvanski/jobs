@extends('emails.layouts.default')

@section('content')

    <h2>Hello {{ $candidate->first_name }} {{ $candidate->last_name }},</h2>
    <br>
    <p>You receive this message because you are invited to complete a test for your new job. Click on the button to start it.</p>
    <br>
    <div class="text-center">
        <a href="{{ route('test') }}" class="btn-assessment">ASSESSMENT</a>
    </div>

@endsection
