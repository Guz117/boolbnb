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

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.') //name
    ->prefix('admin') //uri
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('apartments', 'ApartmentController');
    });

Route::get('{any?}', function ($name = null) {
    return view('guest.welcome');
})->where('any', '.*');
