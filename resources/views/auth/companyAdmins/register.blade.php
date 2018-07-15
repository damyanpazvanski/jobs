@extends('layouts.noMenuApp')

@section('content')
    <div class="justify-content-center" style="margin-top: 50px">
        <registration
                :plans="{{ $plans }}"
                :countries="{{ $countries }}"
                :business-sectors="{{ $businessSectors }}"
        ></registration>
    </div>
@endsection
