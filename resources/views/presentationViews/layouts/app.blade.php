<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ config('app.name', '') }} - hire smart">
    <meta property="og:description" content="CleverHires is your place if you want to hire only smart candidates who will not have any problems in the future">
    <meta property="og:url" content="https://cleverhires.com/">
    <meta property="og:site_name" content="CleverHires">

    <meta property="og:image" content="https://cleverhires.com/images/logo_large.png">
    <meta property="og:image:secure_url" content="https://cleverhires.com/images/logo_large.png" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1640">
    <meta property="og:image:height" content="377">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="CleverHires is your place if you want to hire only smart candidates who will not have any problems in the future">
    <meta name="twitter:title" content="{{ config('app.name', '') }} - hire smart">
    <meta name="twitter:image" content="https://cleverhires.com/images/logo_large.png">

    <meta name="keywords" content="clever candidates, smart candidates, hire smart, hr cosultation, hiring, iq test, take iq test">
    <meta name="description" content="CleverHires is your place if you want to hire only smart candidates who will not have any problems in the future">
    <meta name="copyright" content="CleverHires Inc.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }} - hire smart</title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="canonical" href="https://cleverhires.com/">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Styles -->
    <link href="{{ asset('css/presentation.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger site-name" href="/">
            Clever<span class="brand-name-second">Hires</span>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#we-are">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#work">What we do</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#steps">How to use</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger btn-primary btn text-white pl-4 pr-4" href="#contact">Contact Us</a>
                </li>
                <div class="dropdown ml-2">
                    <button class="btn btn-warning dropdown-toggle" type="button" id="loginDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Login <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu text-center" aria-labelledby="loginDropdown">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger text-warning" href="{{ route('login') }}">Candidates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger text-warning" href="{{ route('company.admins.login') }}">Companies</a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <br>
                <h2 class="section-heading font-weight-bold">Our Support Team Is Hear For You!</h2>
                <a href="mailto:support@cleverhires.com"><i class="fa fa-envelope"></i> support@cleverhires.com</a>
                <hr class="light my-4">
                <br>
                <small>Copyright © {{ date('Y') }} | <span class="btn-link">CleverHires</span>. All rights reserved.</small>
                <br>
                <br>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="/js/presentation/bootstrap.bundle.min.js"></script>
<script src="/js/presentation/jquery.easing.min.js"></script>
{{--<script src="/js/presentation/scrollreveal.min.js"></script>--}}
<script src="/js/presentation/jquery.magnific-popup.min.js"></script>
<script src="/js/presentation/creative.js"></script>

</body>
</html>
