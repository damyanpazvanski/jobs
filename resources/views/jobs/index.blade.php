@extends('layouts.app')
<style>
    .card.card-profile {
        border: 4px solid white;
    }
    .hovera:hover {
        border: 4px solid lime;
        animation: 2;
        transition: 1s;
        cursor: pointer;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header font-weight-bold" data-background-color="blue"
                    style="font-size: 12px">Jobs list</div>
                <div class="card-body">
                    <a href="#" class="col-md-4">
                        <div class="card card-profile hovera">
                            <div class="card-avatar" style="height: 100px; width: 100px; background: lime"></div>
                            <div class="content">
                                <h6 class="category text-gray">CEO / Co-Founder</h6>
                                <h4 class="card-title">Alec Thompson</h4>
                                <p class="card-content">
                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                </p>
                                <button class="btn btn-round" data-background-color="red">Closed</button>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="col-md-4">
                        <div class="card card-profile hovera">
                            <div class="card-avatar" style="height: 100px; width: 100px; background: #52e3ff"></div>
                            <div class="content">
                                <h6 class="category text-gray">CEO / Co-Founder</h6>
                                <h4 class="card-title">Alec Thompson</h4>
                                <p class="card-content">
                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                </p>
                                <button class="btn btn-round" data-background-color="green">Open</button>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="col-md-4">
                        <div class="card card-profile hovera">
                            <div class="card-avatar" style="height: 100px; width: 100px; background: #ffd54f"></div>
                            <div class="content">
                                <h6 class="category text-gray">CEO / Co-Founder</h6>
                                <h4 class="card-title">Alec Thompson</h4>
                                <p class="card-content">
                                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                                </p>
                                <button class="btn btn-round" data-background-color="blue">Open</button>
                            </div>
                        </div>
                    </a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
