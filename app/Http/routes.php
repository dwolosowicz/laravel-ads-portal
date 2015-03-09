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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@search');
Route::get('/{active_offers}/details', 'HomeController@details');

Route::group([ 'middleware' => 'auth' ], function() {
    Route::resource('offers', 'OffersController');
    Route::post('/offers/{offers}/close', 'OffersController@close');

    Route::get('admin', 'AdminController@index');
    Route::get('admin/users', 'AdminUsersController@index');
    Route::post('admin/users/{users}/block', 'AdminUsersController@toggle');

    Route::resource('admin/tags', 'AdminTagsController');
    Route::resource('admin/offers', 'AdminOffersController');
});

Route::filter("admin", function() {
	if(!Entrust::hasRole("admin")) {
		abort(403);
	}
});

Route::when("admin/*", "admin");