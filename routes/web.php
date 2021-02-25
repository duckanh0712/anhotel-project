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
Route::get('/logout', 'UserController@logout')->name('logout');
Route::post('admin/room-book/approve', 'RoomBookcontroller@approveRoomBook')->name('admin.room-book.approve')->middleware('CheckLogin');
Route::post('/room-book/register', 'ClientController@roomBookStore')->name('user.room.book')->middleware('CheckLogin');
Route::group(['prefix' => 'admin', 'as'=> 'admin.', 'middleware' => 'CheckLogin' ], function (){
    Route::resource('/employee','EmployeeController');
    Route::resource('/user','UserController');
    Route::resource('/room','RoomController');
    Route::resource('/room-book','RoomBookController');
    Route::get('/room-book/pay/{id}', 'AdminController@payment' )->name('room_book.pay.form');
});

Route::get('/lienket', function () {
    $data = App\RoomBook::find(1)->khachhang->toArray();
    dd($data);
} );

