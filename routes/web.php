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
Route::get('events/{id}','PagesController@show');
Route::get('event/sport','PagesController@sport_events');
Route::get('event/culture','PagesController@culture_events');
Route::get('event/music','PagesController@music_events');
Route::get('event/other','PagesController@other_events');
Route::get('event/search/','PagesController@search');
Route::get('event/newest','PagesController@newest_events');
Route::get('event/future','PagesController@oldest_events');
Route::get('event/most/liked','PagesController@most_liked_events');
Route::get('event/least/liked','PagesController@least_liked_events');
Route::get('event/sort/name/asc','PagesController@sort_by_name_asc');
Route::get('event/sort/name/desc','PagesController@sort_by_name_desc');
Route::post('events/{id}/like','PagesController@like_event');

Route::get('contact','PagesController@contact_organiser');
Route::get('contact/{id}','PagesController@contact_organiser');

Route::get('send','PagesController@send');


Route::get('closeAccount/{id}','DashboardController@destroy');


//use resource to make routing a lot easier
Route::resource('event','EventsController');
//auth routes
Auth::routes();