@extends('layouts.app')
<style>
    .card.card-profile {
        border: 4px solid white;
    }
    .open:hover {
        border: 4px solid #00ff00;
        animation: 2;
        transition: 1s;
        cursor: pointer;
    }
    .closed:hover {
        border: 4px solid #ff4500;
        animation: 2;
        transition: 1s;
        cursor: pointer;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                {{--<div class="card-header font-weight-bold" data-background-color="blue"--}}
                    {{--style="font-size: 12px">Jobs list</div>--}}
                <div class="card-body">
                    <a href="#" class="col-md-3">
                        <div class="card card-profile closed">
                            {{--<div class="card-avatar" style="height: 100px; width: 100px; background: lime"></div>--}}
                            <div class="text-left">
                                <img src="/images/pin.png" style="width: 80px; position: relative; top: -35px; left: -15px;">
                            </div>

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
                    <a href="#" class="col-md-3">
                        <div class="card card-profile closed">
                            {{--<div class="card-avatar" style="height: 100px; width: 100px; background: lime"></div>--}}
                            <div class="text-left">
                                <img src="/images/pin.png" style="width: 80px; position: relative; top: -35px; left: -15px;">
                            </div>

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

                    <a href="#" class="col-md-3">

                        <div class="card card-profile open">
                            {{--<div class="card-avatar" style="height: 100px; width: 100px; background: #ffd54f"></div>--}}
                            <div class="text-left">
                                <img src="/images/pin.png" style="width: 80px; position: relative; top: -35px; left: -15px;">
                            </div>
                            {{--<i class="material-icons">thumbtack</i>--}}

                            {{--<div class="card-avatar" style="height: 100px; width: 100px; background: #52e3ff"></div>--}}
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

                    <a href="#" class="col-md-3">
                        <div class="card card-profile open">
                            {{--<div class="card-avatar" style="height: 100px; width: 100px; background: #ffd54f"></div>--}}
                            <div class="text-left">
                                <img src="/images/pin.png" style="width: 80px; position: relative; top: -35px; left: -15px;">
                            </div>
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
                </div>
            {{--</div>--}}
        </div>
    </div>
</div>
@endsection
