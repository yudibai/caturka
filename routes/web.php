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

Route::get('/', function () {
    return view('client.home');
});

Route::get('login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('login-process', 'App\Http\Controllers\LoginController@loginProcess')->name('login-process');
Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['checklogin']], function () {
        Route::resource('/admin/dashboard', 'App\Http\Controllers\AdminController');
    });
    
});
