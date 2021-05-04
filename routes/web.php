<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::get('/addentry', 'App\Http\Controllers\AddItemController@index')->middleware('auth');
Route::post('/addentry', 'App\Http\Controllers\AddItemController@store');
Route::get('/allitems', 'App\Http\Controllers\AllItemsController@index')->middleware('auth');
Route::get('/allitems/{item}/edit', 'App\Http\Controllers\AllItemsController@edit')->name('itemEdit');
Route::put('/allitems/{item}/update', 'App\Http\Controllers\AllItemsController@update')->name('itemUpdate');
Route::get('/allitems/{item}/delete', 'App\Http\Controllers\AllItemsController@delete')->name('deleteItem');
Route::post('/share', 'App\Http\Controllers\SharedItemsController@store')->name('share');
Route::get('/shared_items', 'App\Http\Controllers\SharedItemsController@index')->middleware('auth');
Route::get('/shareditems', 'App\Http\Controllers\SharedItemsController@index')->middleware('auth');
Route::get('/shareditems/{shared_item}/delete', 'App\Http\Controllers\SharedItemsController@delete')->name('deleteShare');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
