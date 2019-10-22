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

//Route::get('/user', 'UserController@index')->name('user');

//Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::get('/user', 'UserController@index')->name('user')->middleware('web','user');
Route::get('/user/show', 'UserController@showData')->name('usershow')->middleware('web', 'user');
Route::get('/user/edit', 'UserController@update')->name('edit');
Route::get('/user/update', 'UserController@update')->name('update');
Route::post('user/update/submit','UserController@submit')->name('submit');



// user protected routes
//Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
    //Route::get('/user', 'UserController@index')->name('user');
//});

// admin protected routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin');
});