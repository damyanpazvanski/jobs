@extends('presentationViews.layouts.app')

@section('content')
<header id="home" class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row" style="margin-top: 270px; margin-left: 50px">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    <strong>Let's find the best employees</strong>
                </h1>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">
                    We are going to help you to reduce the CVs for review
                </p>
                <a class="btn btn-primary btn-xl js-scroll-trigger mb-1" href="#services">Find Out More</a>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('company.admins.register') }}">Try us for free</a>
            </div>
        </div>
    </div>
</header>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading font-weight-bold">Our Services</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Tests</h3>
                    <p class="text-muted mb-0">We will privide you some IQ and visualizational tests for your employees</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Emails</h3>
                    <p class="text-muted mb-0">Just choose your candidates and we will send them emails</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Reports</h3>
                    <p class="text-muted mb-0">Database with all of the candidates will provide you data reports in different types of files</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <i class="fa fa-4x fa-users text-primary mb-3 sr-icons"></i>
                    <h3 class="mb-3">Candidates</h3>
                    <p class="text-muted mb-0">Different lists with candidates in different jobs</p>
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

<section id="we-are">
    <div class="container">
        <h2 class="text-center text-white font-weight-bold">What we are</h2>
        <br>
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="section-heading text-white">On paper, so many candidates look the same.</h2>
                <br>
                <p class="mb-4">We are your online, assessment tool that helps identify the candidates.</p>
                <hr class="light my-4">
                <p class="mb-4">We are able to identify this one candidate who can learn everything and do whatever you want from him</p>
                <hr class="light my-4">
            </div>
            <div class="col-lg-6 mx-auto text-center">
                <img src="/images/talent.png" alt="logo" class="main-page-images">
            </div>
        </div>
    </div>
</section>

<section class="" id="work">
    <div class="container">
        <h2 class="text-center text-white font-weight-bold">Let we manage everything</h2>
        <hr class="light my-4">
        <br>
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <br>
                <img src="/images/cvs.jpg" alt="logo" class="main-page-images">
            </div>
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="section-heading text-white">We've got what you need!</h2>
                <br>
                <p class="mb-4">You will not collect any CVs. You will not need to manage them. This is our work.</p>
                <hr class="light my-4">
                <p class="mb-4">We are going to manage all of the CVs and estimate all of the candidates.</p>
                <hr class="light my-4">
                <p class="mb-4">Just send some invitations to the candidates and everything else is our concern.</p>
                <hr class="light my-4">
            </div>
        </div>
    </div>
</section>

<section id="steps">
    <div class="container">
        <h2 class="text-center font-weight-bold">Easy to use</h2>
        <hr class="my-4">
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <br>
                <br>
                <img src="/images/we_are_hiring.png" alt="logo" class="main-page-images">
            </div>
            <div class="col-lg-6 mx-auto text-center">
                <h2 class="section-heading">We handle the logistics</h2>
                <br>
                <p class="mb-4">All you have to provide are email addresses of your candidates.
                    The assessment results are conveniently maintained in the employer portal.</p>
                <p class="mb-4"><strong>1.</strong> Add your candidates email addresses</p>
                <hr class="my-4">
                <p class="mb-4"><strong>2.</strong> Send invitations to the candidates</p>
                <hr class="my-4">
                <p class="mb-4"><strong>3.</strong> Wait till they finish with the tests</p>
                <hr class="my-4">
                <p class="mb-4"><strong>4.</strong> You already know who is the best candidate for you</p>
                <hr class="my-4">
                <p class="mb-4 text-uppercase font-weight-bold">WE ARE DONE!</p>
            </div>
        </div>
    </div>
</section>

@if(Session::has('success'))
    <div class="alert alert-success text-center mt-5" id="success-msg">{{ Session::get('success') }}</div>
@endif

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading font-weight-bold">Let's Get In Touch!</h2>
                <hr class="light my-4">
                <p class="mb-5">Ready to start your next project with us? That's great! Send us an email and we will get back to you as soon as possible!</p>
            </div>
        </div>
        <div class="row">
            <form class="form-horizontal col-md-8 offset-md-2" action="{{ route('main.contact') }}" method="POST">
                @csrf

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach

                <div class="form-group">
                    <label>Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           placeholder="Name" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           placeholder="Email" required value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>Phone Number <span class="text-danger">*</span></label>
                    <input type="number" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                           placeholder="Phone Number" required value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label>Company Name <span class="text-danger">*</span></label>
                    <input type="text" name="company_name" class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}"
                           placeholder="Company Name" required value="{{ old('company_name') }}">
                </div>
                <div class="form-group">
                    <label>Company Type <span class="text-danger">*</span></label>
                    <select name="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" required>
                        <option selected disabled>Choose Company Type</option>
                        <option value="Startup" @if(old('type') === 'Startup') selected @endif>Startup</option>
                        <option value="Small or Medium-sized Business"
                                @if(old('type') === 'Small or Medium-sized Business') selected @endif>Small or Medium-sized Business</option>
                        <option value="Enterprise" @if(old('type') === 'Enterprise') selected @endif>Enterprise</option>
                        <option value="Other" @if(old('type') === 'Other') selected @endif>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" rows="3">{{ old('message') }}</textarea>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="gdpr" required @if(old('gdpr')) checked @endif>
                            <span class="font-weight-bold">GDPR Agreement <span class="text-danger">*</span></span>
                            I consent to having this website store my submitted information so they can respond to my inquiry.
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-md btn-block">Send</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
