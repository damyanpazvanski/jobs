<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css">

    <style>
        <?php include resource_path('assets/sass/emails/default.scss') ?>
    </style>
</head>
<body class="body">
<div class="logo-wrapper">
    <a href="{{ env('APP_URL') }}" target="_blank" class="logo"><strong>{{ config('app.name') }}</strong></a>
</div>

<br>

<div class="content">
    @yield('content')

    <div class="wishes">
        <p>Regards,</p>
        <p>{{ config('app.name') }}</p>
    </div>
    <br>
    <hr>
    <div class="email-info">
        <p>{{ trans('system.emails.footer') }}</p>
    </div>
</div>

<br>

<footer class="footer">
    &copy {{ date('Y') }} <a href="{{ env('APP_URL') }}" target="_blank">{{ config('app.name') }}</a>. All rights reserved.
</footer>
</body>
</html>
