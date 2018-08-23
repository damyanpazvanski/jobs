<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/presentation.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
</head>
<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Pazvany HR</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger active" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@if(Session::has('success'))
    <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
@endif

@yield('content')


<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading">Let's Get In Touch!</h2>
                <hr class="my-4">
                <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center">
                <i class="fa fa-phone fa-3x mb-3 sr-contact" data-sr-id="8" style="; visibility: visible;  -webkit-transform: scale(0.3); opacity: 0;transform: scale(0.3); opacity: 0;"></i>
                <p>123-456-6789</p>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fa fa-envelope-o fa-3x mb-3 sr-contact" data-sr-id="9" style="; visibility: visible;  -webkit-transform: scale(0.3); opacity: 0;transform: scale(0.3); opacity: 0;"></i>
                <p>
                    <a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a>
                </p>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="/js/presentation/bootstrap.bundle.min.js"></script>
<script src="/js/presentation/jquery.easing.min.js"></script>
{{--<script src="/js/presentation/scrollreveal.min.js"></script>--}}
<script src="/js/presentation/jquery.magnific-popup.min.js"></script>
<script src="/js/presentation/creative.js"></script>

</body>
</html>
