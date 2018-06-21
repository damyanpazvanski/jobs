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

    Route::get('/my-account', 'AccountsController@index')->name('my-account');


    Route::prefix('ajax')->namespace('Ajax')->group(function () {

        Route::post('/job/{job}/candidates', 'CandidatesController@store');

    });
});

Route::post('/ajax/register/user-information', 'Ajax\RegisterController@userInformation');
Route::post('/ajax/register/company-information', 'Ajax\RegisterController@companyInformation');
Route::post('/ajax/register/store', 'Ajax\RegisterController@store');

Route::get('/test', 'TestsController@index');
