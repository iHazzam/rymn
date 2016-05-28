<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
 *
 *
 *
 * Frontpages
 */
Route::get('/', 'pageController@home');
Route::get('/admin', 'pageController@login');
Route::get('/admin/dashboard', 'pageController@dashboard');
Route::get('/learn', 'pageController@learn');
Route::get('/teach', 'pageController@teach');
Route::get('/play', 'pageController@play');
Route::get('/discover', 'pageController@discover');
/*Second-tier pages*/
/*learn*/
Route::get('/learn/instruments', 'learnController@instruments');
Route::get('/learn/teachers', 'learnController@teacherdb');
Route::get('/learn/parents', 'learnController@parents');
Route::get('/learn/kids', 'learnController@kids');
/*teach*/
Route::get('/teach/register', 'teachController@register');
Route::get('/teach/resources', 'teachController@resources');
/*play*/
Route::get('/play/groups', 'playController@groups');
Route::get('/play/why', 'playController@why');
Route::get('/play/advertise', 'playController@add_group');
/*discover*/
Route::get('/discover/calendar', 'discoverController@calendar');
Route::get('/discover/map', 'discoverController@map');
Route::get('/discover/newsletter', 'discoverController@newsletter');
Route::get('/discover/social', 'discoverController@social');
Route::get('/discover/add_event', 'discoverController@addEvent' );
Route::get('/discover/about', 'discoverController@about' );
/*forms*/
Route::post('/discover/add_event/post', 'discoverController@newEvent' );
Route::post('/play/advertise/post', 'playController@newAd');
Route::post('/teach/register/post', 'teachController@newTeach');
Route::post('/mailing/reg/{list}', 'newsletterController@addtolist');