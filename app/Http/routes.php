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

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/*
 * Routes for dashboard activities
 */
Route::get('/dashboard','DashboardController@index');

Route::get('/dashboard/closed-tickets','DashboardController@closedTickets');

Route::get('/enquiry/create-ticket/{id}','EnquiryController@create');
Route::get('/enquiry/view-ticket/{id}','EnquiryController@view');
Route::get('/enquiry/ticket-info/{status}/{id}','EnquiryController@info');
Route::post('/enquiry/update','EnquiryController@update');

/*
 * Issue generator protected by admin middleware
 */
Route::group(['middleware'=>'App\Http\Middleware\AdminMiddleware'],function(){

    Route::get('/issue','IssueGeneratorController@index');
});
