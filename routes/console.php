<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('db:seed', function () {
    $this->callSilent('business-sectors:populate', []);
    $this->callSilent('countries:populate', []);
    $this->callSilent('roles:populate', []);
    $this->callSilent('work-times:populate', []);
    $this->callSilent('questions:populate', []);
    $this->callSilent('braintree:sync-plans', []);
    $this->callSilent('braintree:add-discounts', []);
});