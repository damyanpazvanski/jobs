@extends('layouts.app')
<style>
    .card.card-profile {
        border: 4px solid white;
    }

    .card.open:hover {
        border: 4px solid #00ff00;
        animation: 2;
        transition: 1s;
        cursor: pointer;
    }

    .card.closed:hover {
        border: 4px solid #ff4500;
        animation: 2;
        transition: 1s;
        cursor: pointer;
    }
</style>
@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header font-weight-bold" data-background-color="blue"
                     style="font-size: 12px">

                </div>
                <div class="card-body">

                    @foreach($jobs as $job)
                        <a href="/jobs/{{ $job->id }}" class="col-md-3">
                            <div class="card card-profile {{ $job->status == 'open' ? 'open' : 'closed' }}">
                                {{--<div class="card-avatar" style="height: 100px; width: 100px; background: lime"></div>--}}
                                <div class="text-left">
                                    <img src="/images/pin.png"
                                         style="width: 80px; position: relative; top: -35px; left: -15px;">
                                </div>

                                <div class="content">
                                    <h6 class="category text-gray">CEO / CO-FOUNDER</h6>
                                    <h4 class="card-title">{{ $job->position }}</h4>
                                    <p class="card-content">
                                        Don't be scared of the truth because we need to restart the human foundation in
                                        truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the
                                        back is...
                                    </p>
                                    @if($job->status == 'open')
                                        <button class="btn btn-round" data-background-color="green">Open</button>
                                    @else
                                        <button class="btn btn-round" data-background-color="red">Closed</button>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <a href="/job" class="btn btn-lg btn-info add-job">+</a>
    </div>
@endsection

<style>
    .add-job {
        position: fixed!important;
        z-index: 100;
        top: 100px;
        right: 0;
        padding: 10px 30px!important;
        font-size: 50px!important;
    }
</style>