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

    Route::get('/candidates/{candidate}', 'CandidatesController@show')->name('show-candidate');
    Route::get('/candidates/{candidate}/cv/download', 'CandidatesController@cvDownload')->name('cv.download.account');

    Route::get('/my-account', 'AccountsController@edit')->name('edit.account');

    Route::put('/company-admins/{companyAdmin}', 'CompanyAdminsController@update')->name('update.companyAdmins');

    Route::put('/companies/update-image', 'CompaniesController@updateImage')->name('update.company.image');
    Route::put('/companies/{company}', 'CompaniesController@update')->name('update.company');

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
    Route::post('/test/candidate-information', 'TestsController@candidateInformation');
    Route::post('/test/attempt', 'TestsController@attempt');
    Route::post('/test', 'TestsController@store');

});

Route::get('/test', 'TestsController@index');
