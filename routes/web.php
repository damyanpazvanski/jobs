<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('braintree/webhook', 'WebhookController@handleWebhook');

Route::namespace('Auth\Candidates')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('candidates.logout');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('candidates.register');
    Route::post('register', 'RegisterController@register');

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('candidates.password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('candidates.password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('candidates.password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

Route::namespace('Auth\CompanyAdmins')->prefix('companies')->group(function () {
    Route::get('login', 'LoginController@showLoginForm')->name('company.admins.login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('company.admins.logout');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('company.admins.register');
    Route::post('register', 'RegisterController@register');

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('company.admins.password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('company.admins.password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('company.admins.password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

Route::middleware(['auth:web,companyAdmin'])->group(function () {
    Route::get('/pricing', 'PricesController@index')->name('pricing');

    Route::middleware(['subscribed'])->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::post('/subscribe', 'SubscriptionsController@store');
        Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions.index');
        Route::delete('/subscriptions', 'SubscriptionsController@destroy')->name('subscriptions.destroy');

        Route::get('/jobs/create', 'JobsController@create')->name('create.jobs');
        Route::post('/jobs', 'JobsController@store')->name('store.jobs');
        Route::get('/jobs', 'JobsController@index')->name('jobs');
        Route::get('/jobs/disabled', 'JobsController@disabled')->name('disabled.jobs');
        Route::get('/jobs/{job}', 'JobsController@show')->name('show-job');
        Route::get('/jobs/{job}/candidates/download', 'JobsController@downloadPdf')->name('jobs.candidates.pdf');

        Route::get('/candidates', 'CandidatesController@index')->name('index.candidates');
        Route::get('/candidates/{candidate}', 'CandidatesController@show')->name('show-candidate');
        Route::put('/candidates/{candidate}', 'CandidatesController@update')->name('update.candidates');
        Route::get('/candidates/{candidate}/download/cv', 'CandidatesController@downloadCv')->name('download.cv.candidates');
        Route::get('/candidates/download/pdf', 'CandidatesController@downloadPdf')->name('download.pdf.candidates');
        Route::get('/candidates/download/csv', 'CandidatesController@downloadCsv')->name('download.csv.candidates');

        Route::get('/my-account', 'AccountsController@edit')->name('my-account');

        Route::put('/company-admins/{companyAdmin}', 'CompanyAdminsController@update')->name('update.companyAdmins');

        Route::put('/companies/update-image', 'CompaniesController@updateImage')->name('update.company.image');
        Route::put('/companies/{company}', 'CompaniesController@update')->name('update.company');

        Route::prefix('ajax')->namespace('Ajax')->group(function () {
            Route::delete('/jobs/{job}', 'JobsController@destroy');
            Route::patch('/jobs/{job}/activate', 'JobsController@activate');
            Route::post('/jobs/{job}/candidates', 'CandidatesController@store');
            Route::post('/jobs/{job}/send-tests', 'EmailsController@mark');

            Route::put('/subscriptions', 'SubscriptionsController@update')->name('subscriptions.update');
        });
    });
});

Route::prefix('ajax')->namespace('Ajax')->group(function () {

    Route::post('/register/user-information', 'RegisterController@userInformation');
    Route::post('/register/company-information', 'RegisterController@companyInformation');
    Route::post('/register/send-message', 'RegisterController@sendMessage');
    Route::post('/register/store', 'RegisterController@store');

    Route::post('/test/email', 'TestsController@validateEmail');
    Route::post('/test/candidate-information', 'TestsController@candidateInformation');
    Route::post('/test/attempt', 'TestsController@attempt');
    Route::post('/test', 'TestsController@store');

});

Route::get('/test', 'TestsController@index');

//Route::get('/', 'HomeController@index');
