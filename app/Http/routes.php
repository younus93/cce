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

Route::get('/', function () {
    return view('welcome');
});


/*
 * Route to get data from Onering API
 */

Route::get('/onering',"APIController@get");

/*
 * Login for CCE Employee
 */

Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

/*
 * Routes for dashboard activities
 */
Route::get('/dashboard','DashboardController@index');
Route::get('/dashboard/newcall','DashboardController@newcallindex');
Route::get('/dashboard/rescall','dashboardController@rescallindex');

Route::get('/dashboard/closed-tickets','DashboardController@closedTickets');
Route::get('/dashboard/users','DashboardController@users');

Route::get('/enquiry/view-user/{id}','EnquiryController@viewuser');
Route::get('/enquiry/create-ticket/{id}','EnquiryController@create');
Route::get('/enquiry/view-ticket/{id}','EnquiryController@view');
Route::post('/enquiry/viewuser/{id}/{uid}','EnquiryController@user');

Route::get('/enquiry/closedview-ticket/{id}','EnquiryController@closedview');
Route::get('/enquiry/ticket-info/{status}/{id}','EnquiryController@info');
Route::post('/enquiry/update','EnquiryController@update');
Route::post('/enquiry/closedupdate','EnquiryController@closedupdate');
Route::get('/dashboard/view/{id}','DashboardController@view');
Route::get('/register/create','RegisterController@form');
Route::post('/register/form','RegisterController@create');
Route::get('/register/delete/{id}','RegisterController@delete');

Route::get('/dashboard/closedview/{id}','DashboardController@closedview');


Route::get('/register/view','RegisterController@view');
Route::get('loadsubcat/{id}','RegisterController@viewsubissue');

Route::get('register/getrecords','RegisterController@getrecords');
Route::get('register/index','RegisterController@index');

/*
 * Issue generator protected by admin middleware
 */
Route::group(['middleware'=>'App\Http\Middleware\AdminMiddleware'],function(){

    Route::get('/issue','IssueGeneratorController@index');
});
