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
    return view('auth.register');
});
Route::get('/admin', 'AdminController@index')->name('dashboard')->middleware('CheckLogin');
Route::get('/login', 'AdminController@showAdminLoginForm')->name('admin.login');
Route::post('/login', 'AdminController@postLogin')->name('admin.postLogin');
Route::post('/register', 'UserController@store')->name('admin.register');
Route::get('/home', 'ClientController@index')->name('client.home');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'as'=> 'admin.', 'middleware' => 'CheckLogin'], function (){
    Route::resource('/employee','EmployeeController');
    Route::resource('/user','UserController');
    Route::resource('/room','RoomController');

});



