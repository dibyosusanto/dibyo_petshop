<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('guest.index');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('/', 'AdminController@index')->name('admin.index');
});

Route::group(['prefix' => 'pelanggan', 'middleware' => 'pelanggan'], function(){
    Route::get('/', 'PelangganController@index')->name('pelanggan.index');
});

Route::get('/', 'GuestController@index')->name('guest.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
