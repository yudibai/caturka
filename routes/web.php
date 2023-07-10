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
    return view('client.layout.body');
});

Route::get('/home', 'App\Http\Controllers\FrontController@home');
Route::get('/about', 'App\Http\Controllers\FrontController@about');
Route::get('/product', 'App\Http\Controllers\FrontController@product');
Route::get('/product/{slug}', 'App\Http\Controllers\FrontController@detailProduct');
Route::get('/equipment', 'App\Http\Controllers\FrontController@equipment');
Route::get('/contact', 'App\Http\Controllers\FrontController@contact');


Route::get('admin/login', 'App\Http\Controllers\LoginController@index')->name('admin-login');
Route::post('admin/login-process', 'App\Http\Controllers\LoginController@loginProcess')->name('admin-login-process');
Route::get('admin/logout', 'App\Http\Controllers\LoginController@logout')->name('admin-logout');


Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['checklogin']], function () {
        Route::resource('/admin/dashboard', 'App\Http\Controllers\DashboardController');

        // product
        // Route::resource('/admin/products', 'App\Http\Controllers\ProductController');
        Route::get('/admin/products', 'App\Http\Controllers\ProductController@index')->name('admin.products');
        Route::match(['get', 'post'], '/admin/product/create', 'App\Http\Controllers\ProductController@create')->name('admin.product.create');
        Route::match(['get', 'post'], '/admin/product/update/{id}', 'App\Http\Controllers\ProductController@update')->name('admin.product.update');
        Route::get('/admin/product/{id}', 'App\Http\Controllers\ProductController@delete')->name('admin.product.delete');
        
        // slider
        Route::get('/admin/sliders', 'App\Http\Controllers\SliderController@index')->name('admin.sliders');
        Route::match(['get', 'post'], '/admin/slider/create', 'App\Http\Controllers\SliderController@create')->name('admin.slider.create');
        Route::match(['get', 'post'], '/admin/slider/update/{id}', 'App\Http\Controllers\SliderController@update')->name('admin.slider.update');
        Route::get('/admin/slider/{id}', 'App\Http\Controllers\SliderController@delete')->name('admin.slider.delete');
        
        // client
        Route::get('/admin/clients', 'App\Http\Controllers\ClientController@index')->name('admin.clients');
        Route::match(['get', 'post'], '/admin/client/create', 'App\Http\Controllers\ClientController@create')->name('admin.client.create');
        Route::match(['get', 'post'], '/admin/client/update/{id}', 'App\Http\Controllers\ClientController@update')->name('admin.client.update');
        Route::get('/admin/client/{id}', 'App\Http\Controllers\ClientController@delete')->name('admin.client.delete');

        // levels
        Route::get('/admin/levels', 'App\Http\Controllers\LevelController@index')->name('admin.levels');
        Route::match(['get', 'post'], '/admin/level/create', 'App\Http\Controllers\LevelController@create')->name('admin.level.create');
        Route::match(['get', 'post'], '/admin/level/update/{id}', 'App\Http\Controllers\LevelController@update')->name('admin.level.update');
        Route::get('/admin/level/{id}', 'App\Http\Controllers\LevelController@delete')->name('admin.level.delete');
        
        // users
        Route::get('/admin/users', 'App\Http\Controllers\UserController@index')->name('admin.users');
        Route::match(['get', 'post'], '/admin/user/create', 'App\Http\Controllers\UserController@create')->name('admin.user.create');
        Route::match(['get', 'post'], '/admin/user/update/{id}', 'App\Http\Controllers\UserController@update')->name('admin.user.update');
        Route::get('/admin/user/{id}', 'App\Http\Controllers\UserController@delete')->name('admin.user.delete');

        Route::resource('/admin/formUser', 'App\Http\Controllers\FormUserController');
        Route::resource('/admin/formProduct', 'App\Http\Controllers\FormProductController');

    });
});
