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

Route::get('admin/login', 'App\Http\Controllers\LoginController@index')->name('admin-login');
Route::post('admin/login-process', 'App\Http\Controllers\LoginController@loginProcess')->name('admin-login-process');
Route::get('admin/logout', 'App\Http\Controllers\LoginController@logout')->name('admin-logout');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['checklogin']], function () {
        Route::resource('/admin/dashboard', 'App\Http\Controllers\DashboardController');
        Route::resource('/admin/users', 'App\Http\Controllers\UserController');
        Route::resource('/admin/product', 'App\Http\Controllers\ProductController');
        Route::resource('/admin/level', 'App\Http\Controllers\LevelController');

        Route::resource('/admin/formUser', 'App\Http\Controllers\FormUserController');
        Route::resource('/admin/formProduct', 'App\Http\Controllers\FormProductController');

    });
    // Route::any('/admin/sliders', function () {
        
    // });
});
