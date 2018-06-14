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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/jobs', 'JobsController@index')->name('jobs');
Route::get('/jobs/1', 'JobsController@show')->name('show-job');

Route::post('/ajax/register/user-information', 'Ajax\RegisterController@userInformation');
Route::post('/ajax/register/company-information', 'Ajax\RegisterController@companyInformation');
