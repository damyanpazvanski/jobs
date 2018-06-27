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


Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/job', 'JobsController@create')->name('create-job');
    Route::post('/job', 'JobsController@store')->name('store-job');
    Route::get('/jobs', 'JobsController@index')->name('jobs');
    Route::get('/jobs/{job}', 'JobsController@show')->name('show-job');

    Route::get('/jobs/{job}/candidates/{candidate}', 'CandidatesController@show')->name('show-candidate');

    Route::get('/my-account', 'AccountsController@index')->name('my-account');


    Route::prefix('ajax')->namespace('Ajax')->group(function () {

        Route::post('/job/{job}/candidates', 'CandidatesController@store');

        Route::post('/job/{job}/send-tests', 'EmailsController@mark');

    });
});


Route::prefix('ajax')->namespace('Ajax')->group(function () {

    Route::post('/register/user-information', 'RegisterController@userInformation');
    Route::post('/register/company-information', 'RegisterController@companyInformation');
    Route::post('/register/store', 'RegisterController@store');

    Route::post('/test/email', 'TestsController@validateEmail');
    Route::post('/test', 'TestsController@store');

});

Route::get('/test', 'TestsController@index');
