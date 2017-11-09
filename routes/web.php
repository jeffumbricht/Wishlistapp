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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::patch('wishlistItem/buy', 'WishlistItemController@buy');
Route::patch('wishlistItem/unbuy', 'WishlistItemController@unbuy');
Route::resource('wishlistItem', 'WishlistItemController');

Route::get('user/{id}', 'UserController@index')->name('user');
