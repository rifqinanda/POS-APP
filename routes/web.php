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
//     return view('welcome');
// });

// Register
Route::get('register', 'App\Http\Controllers\RegisterController@register')->name('register');
Route::post('/saveregister', 'App\Http\Controllers\RegisterController@saveRegister')->name('saveregister');

// Login
Route::middleware(['checkAuth'])->group(function(){
    Route::get('login', 'App\Http\Controllers\LoginController@login')->name('login');
    Route::post('/postlogin', 'App\Http\Controllers\LoginController@postlogin')->name('postlogin');
});

Route::middleware(['checkSession', 'role:admin'])->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@index');
    Route::resource('/users', 'App\Http\Controllers\UserController');
    Route::resource('/membership', 'App\Http\Controllers\MembershipController');
    Route::resource('/report', 'App\Http\Controllers\ReportController');
    Route::resource('/stocks', 'App\Http\Controllers\StockController');
    Route::resource('/category', 'App\Http\Controllers\CategoryController');
    Route::resource('/product', 'App\Http\Controllers\ProductController');
    Route::resource('/sales', 'App\Http\Controllers\SalesController');
    Route::get('/sales/{id}/download', 'App\Http\Controllers\SalesController@getPDF');
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
});

Route::middleware(['checkSession', 'checkRole: user'])->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@index');
    Route::resource('/stocks', 'App\Http\Controllers\StockController');
    Route::resource('/category', 'App\Http\Controllers\CategoryController');
    Route::resource('/product', 'App\Http\Controllers\ProductController');
    Route::resource('/sales', 'App\Http\Controllers\SalesController');
    Route::get('/sales/{id}/download', 'App\Http\Controllers\SalesController@getPDF');
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
});
