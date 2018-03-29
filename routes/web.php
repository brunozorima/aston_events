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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','PagesController@index');
Route::get('index','PagesController@index');
Route::get('about','PagesController@about');
Route::get('events','PagesController@events');


//use resource to make routing a lot easier
Route::resource('event','EventsController');



Auth::routes();



Route::get('dashboard', 'DashboardController@index');
