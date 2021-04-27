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


Route::get('/addentry', 'App\Http\Controllers\entryController@index')->middleware('auth');
Route::post('/addentry', 'App\Http\Controllers\entryController@store');
Route::get('/allitems', 'App\Http\Controllers\AllitemsController@index')->middleware('auth');
Route::get('/allitems/{item}/edit', 'App\Http\Controllers\AllitemsController@edit')->name('itemedit');
Route::put('/allitems/{item}/update', 'App\Http\Controllers\AllitemsController@update')->name('item_update');
Route::delete('/allitems/{item}/delete', 'App\Http\Controllers\AllitemsController@delete')->name('deleteitem');
Route::post('/share', 'App\Http\Controllers\shareditemsController@store')->name('share');
Route::get('/shared_items', 'App\Http\Controllers\shareditemsController@index')->name('shared_items');
Route::get('/shareditems', 'App\Http\Controllers\shareditemsController@index');
Route::delete('/shareditems/{shared_item}/delete', 'App\Http\Controllers\shareditemsController@delete')->name('deleteshare');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
