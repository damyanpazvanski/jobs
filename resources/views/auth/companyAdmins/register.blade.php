@extends('layouts.noMenuApp')

@section('content')
    <div class="justify-content-center" style="margin-top: 50px">
        <registration
                :business-sectors="{{ $businessSectors }}"
                :countries="{{ $countries }}"
        ></registration>
    </div>
@endsection
