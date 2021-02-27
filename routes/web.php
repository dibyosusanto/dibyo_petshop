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
    Route::get('/produk/', 'AdminController@product')->name('admin.product');
    Route::post('/produk/', 'AdminController@input_product')->name('admin.input_product');
    Route::get('/produk/edit/{id}', 'AdminController@edit_product')->name('admin.edit_product');
    Route::put('/produk/{id}', 'AdminController@update_product')->name('admin.update_product');
    Route::delete('/produk/{id}', 'AdminController@delete_product')->name('admin.delete_product');
    Route::get('/pesanan/', 'AdminController@order')->name('admin.order');
    Route::get('/pesanan/{id}', 'AdminController@detail_order')->name('admin.detail_order');
    Route::get('/pesanan/{id}/edit', 'AdminController@edit_order')->name('admin.edit_order');
    Route::put('/pesanan/{id}', 'AdminController@update_order')->name('admin.update_order');
    Route::delete('/pesanan/{id}', 'AdminController@delete_order')->name('admin.delete_order');
    Route::get('/pelanggan/', 'AdminController@pelanggan')->name('admin.pelanggan');
    Route::get('/pelanggan/{id}', 'AdminController@detail_pelanggan')->name('admin.detail_pelanggan');
    Route::get('/pelanggan/{id}/edit', 'AdminController@edit_pelanggan')->name('admin.edit_pelanggan');
    Route::delete('/pelanggan/{id}', 'AdminController@delete_pelanggan')->name('admin.delete_pelanggan');
});

Route::group(['prefix' => 'pelanggan', 'middleware' => 'pelanggan'], function(){
    Route::get('/', 'PelangganController@index')->name('pelanggan.index');
    Route::get('/produk', 'PelangganController@produk')->name('pelanggan.produk');
    Route::get('/produk/{id}', 'PelangganController@detail_produk')->name('pelanggan.detail_produk');
    Route::get('/produk/{id}/beli', 'PelangganController@beli_produk')->name('pelanggan.beli_produk');
    Route::post('/input_pesanan/', 'PelangganController@save_order')->name('pelanggan.save_order');
    Route::get('/pesanan/', 'PelangganController@pesanan')->name('pelanggan.pesanan');
    Route::get('/profile/{id}', 'PelangganController@profile')->name('pelanggan.profile');
    Route::put('/profile/{id}', 'PelangganController@update_profile')->name('pelanggan.update_profile');
});

Route::get('/', 'GuestController@index')->name('guest.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
