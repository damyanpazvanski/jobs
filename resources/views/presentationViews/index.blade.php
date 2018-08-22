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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a>
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

<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row" style="margin-top: 270px; margin-left: 50px">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    {{--<strong>Your Favorite Source of Free Bootstrap Themes</strong>--}}
                </h1>
                <hr>
            </div>
            <div class="col-lg-8 mx-auto">
                {{--<p class="text-faded mb-5">Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>--}}
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
                <button class="btn btn-primary btn-xl">Try us for free</button>
            </div>
        </div>
    </div>
</header>

<section class="" id="about">
    <div class="container">
        <h2 class="text-center">What we do</h2>
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <img src="/images/image.png" alt="logo" class="col-md-12">
            </div>
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="section-heading text-white">We've got what you need!</h2>
                <hr class="light my-4">
                <p class="mb-4">
                    Making great hires is about identifying great matches.
                    The deltPRO™ work style assessment and matching platform help organizations put the right people in the right jobs.

                    Our easy to use online assessment tool and matching algorithm help managers discover the best work style for an open position and prioritizes a pool of candidates before interviews even begin.
                </p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <h2 class="text-center">What we are</h2>
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="section-heading text-white">On paper, so many candidates look the same.</h2>
                <hr class="light my-4">
                <p class="mb-4">
                    deltPRO™ is an online, pre-interview assessment tool that helps identify the candidates that will thrive in your organization.
                </p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
            </div>
            <div class="col-lg-6 mx-auto text-center">
                <img src="/images/image.png" alt="logo" class="col-md-12">
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <h2 class="text-center">Easy to use</h2>
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <img src="/images/image.png" alt="logo" class="col-md-12">
            </div>
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="section-heading text-white">We handle the logistics</h2>
                <hr class="light my-4">
                <p class="mb-4">
                    All you have to provide are email addresses.
                    First for the hiring manager(s) and then for the candidates.
                    We take it from there. The assessment results are conveniently maintained on an employer
                    portal and summarized in a Work Style Match Report™.
                </p>
                <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
            </div>
        </div>
    </div>
</section>


<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">At Your Service</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons" data-sr-id="2" style="; visibility: visible;  -webkit-transform: scale(1); opacity: 1;transform: scale(1); opacity: 1;-webkit-transition: -webkit-transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; transition: transform 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.6s cubic-bezier(0.6, 0.2, 0.1, 1) 0s; "></i>
                    <h3 class="mb-3">Tests</h3>
                    <p class="text-muted mb-0">Our templates are updated regularly so they don't break.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Emails</h3>
                    <p class="text-muted mb-0">You can use this theme as is, or you can make changes!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Reports</h3>
                    <p class="text-muted mb-0">We update dependencies to keep things fresh.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Hierarchy</h3>
                    <p class="text-muted mb-0">You have to make your websites with love these days!</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-dark text-white">
    <div class="container text-center">
        <h2 class="mb-4">
            Hire people who will thrive in your organization.
            When the right person is in the right job they’re more productive,
            they stay longer and everyone is happier.
            Who doesn’t want that?
        </h2>
        <a class="btn btn-light btn-xl sr-button" href="http://startbootstrap.com/template-overviews/creative/" data-sr-id="6" style="; visibility: visible;  -webkit-transform: translateY(20px) scale(0.9); opacity: 0;transform: translateY(20px) scale(0.9); opacity: 0;">Download Now!</a>
    </div>
</section>

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
