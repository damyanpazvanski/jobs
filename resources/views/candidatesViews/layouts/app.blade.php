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
<div id="app" class="wrapper" style="overflow: hidden">
    <div class="sidebar" data-color="blue">
        <div class="logo text-center" style="font-weight: bold">Hello {{ auth()->user()->getFullName() }}</div>
        <div class="sidebar-wrapper ps-container ps-theme-default">
            <ul class="nav">
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="/">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{ request()->is('my-account') ? 'active' : '' }}">
                    <a href="/my-account">
                        <i class="material-icons">person</i>
                        <p>User Profile</p>
                    </a>
                </li>

            </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
        <div class="sidebar-background"></div>
    </div>

    <main class="py-4 main-panel ps-theme-default ps-active-y" style="overflow: scroll; bottom: -12px;">
        <nav class="navbar navbar-transparent navbar-absolute navbar-info">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-info-text">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('my-account') }}">My account</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('candidates.logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('candidates.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="">
                @if(Session::has('success'))
                    <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                @endif

                @yield('content')
            </div>
            <footer class="footer col-md-12 col-sm-12 col-xs-12">
                <div class="container-fluid">
                    <p class="copyright text-center">
                        &copy {{ date('Y') }}<span class="btn-link"> Pazvany Corporation</span>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </main>

    <div>
        <notifications group="errors" position="top center" width="80%" classes="alert text-center error-alert"/>
    </div>

    <div>
        <notifications group="success" position="top center" width="80%" classes="alert text-center success-alert"/>
    </div>

    <support></support>

</div>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/material.min.js') }}" defer></script>
<script src="{{ asset('js/chartist.min.js') }}" defer></script>
<script src="{{ asset('js/arrive.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap-notify.js') }}" defer></script>
{{--<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" defer></script>--}}
<script src="{{ asset('js/material-dashboard.js') }}" defer></script>
{{--<script src="{{ asset('js/demo.js') }}" defer></script>--}}

<script src="{{ asset('js/app.js') }}" defer></script>

{{--<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/decoupled-document/ckeditor.js"></script>--}}
{{--<script src="{{ asset('js/HTMLEditor.js') }}" defer></script>--}}

</body>
</html>
