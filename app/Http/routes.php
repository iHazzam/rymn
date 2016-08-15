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
Route::get('/learn', 'pageController@learn');
Route::get('/teach', 'pageController@teach');
Route::get('/play', 'pageController@play');
Route::get('/discover', 'pageController@discover');
Route::get('/user_login', 'loginController@userLogin');

Route::get('/privacy', 'pageController@privacy');
Route::get('/cookies', 'pageController@cookies');
Route::get('/sitemap', 'pageController@sitemap');

//Auth Routes
    $this->get('login', 'Auth\AuthController@showLoginForm');
    $this->post('login', 'Auth\AuthController@login');
    $this->get('logout', 'Auth\AuthController@logout');

    // Registration Routes...
    //$this->get('register', 'Auth\AuthController@showRegistrationForm'); Disabled admin registration
    //$this->post('register', 'Auth\AuthController@register');

    // Password Reset Routes...
    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    $this->post('password/reset', 'Auth\PasswordController@reset');
/*Second-tier pages*/
/*learn*/
Route::get('/learn/instruments', 'learnController@instruments');
Route::get('/learn/instruments/parents', 'learnController@parents');
Route::get('/learn/teacherdb', 'learnController@teacherdb');
Route::get('/learn/teachers', 'learnController@teachers');
Route::get('/learn/accompanists', 'learnController@accompanists');
Route::get('/learn/maintainance','learnController@repaired');
Route::get('/learn/repairers','learnController@registerRepairer');
Route::get('/learn/exams','learnController@exams');
Route::get('/learn/practice','learnController@practice');
Route::get('/learn/purchase','learnController@purchase');

/*teach*/
Route::get('/teach/register', 'teachController@register');
Route::get('/teach/resources', 'teachController@resources');
/*play*/
Route::get('/play/groups', 'playController@groups');
Route::get('/play/join', 'playController@join');
Route::get('/play/why', 'playController@why');
Route::get('/play/advertise', 'playController@add_group');
/*discover*/
Route::get('/discover/calendar', 'discoverController@calendar');
Route::get('/discover/map', 'discoverController@map');
Route::get('/discover/newsletter', 'discoverController@newsletter');
Route::get('/discover/social', 'discoverController@social');
Route::get('/discover/add', 'discoverController@addEvent' );
Route::get('/discover/about', 'discoverController@about' );

/*admin*/
Route::get('/admin/dashboard', 'adminController@dashboard')->middleware(['auth','admin']);
Route::get('/admin/logout', 'adminController@logout')->middleware(['auth','admin']);
Route::get('/admin/dashboard/events', 'adminController@events')->middleware(['auth','admin']);
Route::get('/admin/dashboard/teachers', 'adminController@teachers')->middleware(['auth','admin']);
Route::get('/admin/dashboard/groups', 'adminController@groups')->middleware(['auth','admin']);
Route::get('/admin/dashboard/social', 'adminController@social')->middleware(['auth','admin']);
Route::get('/admin/dashboard/submit', 'adminController@submit')->middleware(['auth','admin']);

Route::post('/admin/dashboard/submit/post', 'adminController@process')->middleware(['auth','admin']);

Route::get('/admin/dashboard/getAll', 'adminController@getAllMailingList')->middleware(['auth','admin']);
Route::get('/admin/dashboard/getTeach', 'adminController@getTeachersMailingList')->middleware(['auth','admin']);
Route::get('/admin/dashboard/getGroup','adminController@getGroupsMailingList')->middleware(['auth','admin']);

/*teacher*/
Route::get('/edit/teacher', 'loginController@getTeacherDashboard')->middleware(['auth','teacher']);
Route::get('/edit/user', 'loginController@getTeacherDashboard')->middleware(['auth','teacher']);
/*repairer*/
Route::get('/edit/repairer', 'loginController@getRepairerDashboard')->middleware(['auth','repairer']);

/*group*/
Route::get('/edit/group', 'loginController@getGroupDashboard')->middleware(['auth','group']);
Route::get('/edit/group/event/{eventid}', 'loginController@editEvent')->middleware(['auth','group']);


/*forms*/
Route::post('/discover/add/post', 'discoverController@newEvent' );
Route::post('/learn/repairers/post', 'learnController@newRepairer');
Route::post('/postensemble', 'playController@newAd');
Route::post('/editensemble', 'playController@editAd');
Route::post('/teach/register/post', 'teachController@newTeach');
Route::post('/play/join/post', 'playController@search');
Route::post('/newsletter/subscribe_chimp', 'newsletterController@addtolist');
Route::post('/learn/teachers', 'learnController@search');

/*delete*/
Route::delete('/admin/dashboard/groups/{group}','adminController@deleteGroup');
Route::delete('/admin/dashboard/teachers/{teacher}','adminController@deleteTeacher');
Route::delete('/admin/dashboard/events/{event}','adminController@deleteEvent');
/*ajax get*/
Route::get('/teach/teacher_details/{id}', 'teachController@getTeacherContactDetails');
Route::post('/newsletter/subscribe_chimp', 'newsletterController@addtolist');
Route::get('/play/join/get/{id}', 'playController@getGroupContactDetails');