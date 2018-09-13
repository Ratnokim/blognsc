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

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
	Route::resource('users', 'UsersControler');
});


//Route APi Datatable
Route::group(['middleware' => 'auth'], function () {
	Route::get('/api/datatable/users', 'UsersControler@dataTable')-> name('api.datatable.users');


	Route::get('/admin/profile/', 'ProfileController@index') -> name('admin.profile.index');
	Route::post('/admin/profile', 'ProfileController@updateProfile') -> name('admin.profile.update');

	Route::get('/admin/password', 'ProfileController@editPassword') ->name('admin.profile.edit.password');
	Route::post('/admin/password', 'ProfileController@updatePassword') ->name('admin.profile.update.password');
});
