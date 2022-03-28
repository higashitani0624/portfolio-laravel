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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/review/{id}','App\Http\Controllers\ReviewController@showInputForm')->name('review.input');
Route::post('/review/{id}','App\Http\Controllers\ReviewController@inputSession');
Route::get('/confirm/{id}','App\Http\Controllers\ReviewController@showConfirmForm')->name('review.confirm');
Route::post('/confirm/{id}','App\Http\Controllers\ReviewController@inputConfirm');
Route::get('/confirm','App\Http\Controllers\ReviewController@endConfirm')->name('review.end');
Auth::routes();
