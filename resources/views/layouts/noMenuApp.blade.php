<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="wrapper">
    <div class="">
        @yield('content')
        <footer class="footer">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="copyright text-center">
                    &copy 2018<span class="btn-link"> Pazvany Corporation</span>, made with love for a better web
                </p>
            </div>
        </footer>
    </div>
    <notifications group="errors" position="top center" width="80%" classes="alert text-center error-alert"/>
</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/material.min.js') }}" defer></script>
<script src="{{ asset('js/chartist.min.js') }}" defer></script>
<script src="{{ asset('js/arrive.min.js') }}" defer></script>
{{--<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" defer></script>--}}
<script src="{{ asset('js/material-dashboard.js') }}" defer></script>
{{--<script src="{{ asset('js/demo.js') }}" defer></script>--}}

<script src="{{ asset('js/app.js') }}" defer></script>

{{--<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/decoupled-document/ckeditor.js"></script>--}}
{{--<script src="{{ asset('js/HTMLEditor.js') }}" defer></script>--}}

</body>
</html>
