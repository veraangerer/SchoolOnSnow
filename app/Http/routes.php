<?php

use App\CityCountry;

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

Route::get('/', [
    'as' => '/',
    'uses' => 'PagesController@getIndex'
]);

Route::get('/404', function(){
    return view('pages.404');
});

/*  matching all routes
Route::get('{any?}', function ($any = null) {
    return view('pages.404');
})->where('any', '.*');
*/

//not working correctly
Route::get('(*)', function ($any = null) {
    return view('pages.404');
});

//-------------Authentication-------------------
Route::auth();
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('profil', function () {
    return view('pages.userProfile');
});


//------------------------------------------------

Route::get('/home', 'HomeController@index');

//-------------Pages-------------------

Route::get('/registerChild', function () {
    return view('pages.registerChild');
});

Route::get('/wasistdas', function () {
    return view('pages.schoolonsnow');
});

Route::get('/ihr_vorteil', function () { //TODO links in Deutsch only maybe >.<
    return view('pages.benefits');
});

Route::get('/offer', function () {
    return view('pages.offer');
});

Route::get('/angebot/volksschulen', function () {
    return view('pages.elementarySchool');
});

Route::get('/angebot/volksschulen/sbg', function () {
    return view('pages.elementarySchoolSbg');
});

Route::get('/angebot/volksschulen/oö', function () {
    return view('pages.elementarySchoolOÖ');
});

Route::get('/angebot/volksschulen/ktn', function () {
    return view('pages.elementarySchoolKtn');
});

Route::get('/angebot/volksschulen/stmk', function () {
    return view('pages.elementarySchoolStmk');
});

Route::get('/angebot/oberstufe', function () {
    return view('pages.secondarySchool');
});
/*
Route::get('/angebot/oberstufe/sbg', function () {
    return view('pages.secondarySchoolSbg');
});

Route::get('/angebot/oberstufe/oö', function () {
    return view('pages.secondarySchoolOÖ');
});

Route::get('/angebot/oberstufe/ktn', function () {
    return view('pages.secondarySchoolKtn');
});

Route::get('/angebot/oberstufe/stmk', function () {
    return view('pages.secondarySchoolStmk');
});

*/

Route::get('/news', function () {
    return view('pages.news');
});

Route::get('/partner', function () {
    return view('pages.partner');
});

Route::get('/about', [
    'as' => 'about',
    'uses' => 'PagesController@getAbout'
]);

Route::get('/contact', [
    'as' => 'contact',
    'uses' => 'PagesController@getContact'
]);

//---------------Register School ----------------------
Route::get('/registerClass', function () {
    return view('pages.registerClass');
});

Route::get('/registerClassForm', [
    'as' => 'registerClassForm',
    'uses' => 'SchoolController@create'
]);

Route::post('registerClass', 'SchoolController@store');

//Dropdown

Route::get('countries/{id}', function($id)
{
    return CityCountry::where('countries_id', $id)->lists('cities_id');
});

//---------------Register Child----------------------
Route::get('/registerChild', function () {
    return view('pages.registerChild');
});

Route::get('/registerChildForm', function () {
    return view('pages.registerChildForm');
});

Route::post('/registerChild', [
    'as' => 'registerChild',
    'uses' => 'StudentController@create'
]);

Route::post('/registerChildForm', [
    'as' => 'registerChildForm',
    'uses' => 'StudentController@createStudent'
]);

Route::get('/registerChildAccomplished', function () {
    return view('pages.registerChildAccomplished');
});

//----------------ADMIN--------------------------
/*
Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{
    Route::get('/admin', 'AdminController@index');

    Route::get('admin/schools', 'AdminController@getSchools');

#teachers
    Route::get('admin/school/{id}/teachers/', 'AdminController@getTeachersPerSchool');
#classes
    Route::get('admin/school/{id}/classes/', 'AdminController@getClassesPerSchool');
#students
    Route::get('admin/class/{id}/students/', 'AdminController@getStudentsPerClass');

#Locations
    Route::get('admin/locations', 'AdminController@getLocations');
    Route::get('admin/location/{id}', ['uses' => 'AdminController@getOffersPerLocation']);

#Route::put('offer/{id}', 'OfferController@update');
    Route::resource('offer', 'OfferController');
    Route::resource('teacher', 'TeacherController');
});
*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('admin', 'AdminController@index');

    Route::get('admin/schools', 'AdminController@getSchools');

    #teachers
    Route::get('admin/school/{id}/teachers/', 'AdminController@getTeachersPerSchool');
    #classes
    Route::get('admin/school/{id}/classes/', 'AdminController@getClassesPerSchool');
    #students
    Route::get('admin/class/{id}/students/', 'AdminController@getStudentsPerClass');
    #offers
    Route::get('admin/location/{id}/offers', ['uses' => 'AdminController@getOffersPerLocation']);

    #Locations
    Route::get('admin/locations', 'AdminController@getLocations');

    #Route::put('offer/{id}', 'OfferController@update');
    Route::resource('offer', 'OfferController');
    Route::resource('teacher', 'TeacherController');
    Route::resource('class', 'ClassController');
    Route::resource('student', 'StudentControllerBE');
    Route::resource('location', 'LocationController');

});






