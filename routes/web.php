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
    return view('index');
});
Route::get('/login',[
    'uses' => 'UsersController@login',
    'as' => 'user.login'
]);
Route::get('/logout',[
    'uses' => 'UsersController@logout',
    'as' => 'user.logout'
]);
Route::post('/auth',[
    'uses' => 'UsersController@auth',
    'as' => 'user.auth'
]);
Route::get('/admin',[
    'uses' => 'UsersController@admin',
    'as' => 'user.admin'
]);
Route::post('/update/{id}/room',[
    'uses' => 'RoomsController@update',
    'as' => 'room.update'
]);
Route::get('/delete/{id}/room',[
    'uses' => 'RoomsController@destroy',
    'as' => 'room.delete'
]);
Route::post('/update/{id}/hotel',[
    'uses' => 'HotelsController@update',
    'as' => 'hotel.update'
]);
Route::get('/delete/{id}/hotel',[
    'uses' => 'HotelsController@destroy',
    'as' => 'hotel.delete'
]);
Route::post('/find/hotel',[
    'uses' => 'HotelsController@search',
    'as' => 'hotel.search'
]);
Route::post('/find/rooms',[
    'uses' => 'HotelsController@search',
    'as' => 'hotel.search'
]);
Route::get('/delete/{id}/booking',[
    'uses' => 'BookingController@destroy',
    'as' => 'booking.delete'
]);
Route::get('/delete/{id}/user',[
    'uses' => 'UsersController@destroy',
    'as' => 'users.delete'
]);
Route::get('/profile',[
    'uses' => 'UsersController@profile',
    'as' => 'user.profile'
]);
Route::post('/update/{id}/user',[
    'uses' => 'UsersController@update',
    'as' => 'user.update'
]);
Route::resource('/booking','BookingController');
Route::resource('/users','UsersController');
Route::resource('/rooms','RoomsController');
Route::resource('/hotels','HotelsController');
