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
//    return view('client.home');
//});
Route::get('/admin', 'AdminController@index')->name('dashboard')->middleware('CheckLogin');
Route::get('/login', 'AdminController@showAdminLoginForm')->name('admin.login');
Route::post('/login', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/register', 'ClientController@registerForm')->name('register');
Route::post('/register', 'UserController@store')->name('admin.register');
Route::get('/', 'ClientController@index')->name('client.home');
Route::get('/user/profile', 'ClientController@showProfile')->name('client.profile')->middleware('CheckRole');
Route::post('/user/update', 'ClientController@update')->name('user.update')->middleware('CheckRole');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('admin/room-book/approve', 'RoomBookcontroller@approveRoomBook')->name('admin.room-book.approve')->middleware('CheckLogin');
Route::post('/room-book/register', 'ClientController@roomBookStore')->name('user.room.book')->middleware('CheckLogin');
Route::get('/room-book/statistics', 'RoomBookController@statistics')->name('room_book.statistics')->middleware('CheckLogin');
Route::post('/room-book/statistics/filter', 'RoomBookController@filterDate')->name('room-book.statistics.filter')->middleware('CheckLogin');
Route::get('/search', 'RoomController@filter')->name('room.filter')->middleware('CheckLogin');
Route::post('/room-book/statistics/filterCat', 'RoomBookController@filterDate')->name('room-book.cat.filter')->middleware('CheckLogin');

Route::group(['prefix' => 'admin', 'as'=> 'admin.', 'middleware' => 'CheckLogin' ], function (){
    Route::resource('/employee','EmployeeController');
    Route::resource('/user','UserController');
    Route::resource('/room','RoomController');
    Route::resource('/room-book','RoomBookController');
    Route::get('/room-book/pay/{id}', 'RoomBookController@paymentForm')->name('room_book.pay.form');
    Route::post('/room-book/pay/{id}', 'RoomBookController@payment')->name('room_book.pay');


});
Route::get('/employee/profile', 'AdminController@showProfile')->name('admin.profile')->middleware('CheckLogin');


