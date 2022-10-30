<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('product', ProductController::class);
Route::get('product', 'App\Http\Controllers\ProductController@index')->name('product.index');

Route::get('/product', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/product/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/product/store', 'App\Http\Controllers\ProductController@store')->name('product.store');
//Route::get('product', 'App\Http\Controllers\PostController@index')->name('posts');
Route::get('product/show/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('search', 'App\Http\Controllers\ProductController@search')->name('search');

/*
Route::get('search', 'App\Http\Controllers\SearchController@index')->name('search.index');
Route::get('filter', 'App\Http\Controllers\SearchController@index')->name('search.search');
*/