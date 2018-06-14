@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row justify-content-center">
        <registration
            :business-sectors="{{ $businessSectors }}"
        ></registration>
    </div>
</div>
@endsection
