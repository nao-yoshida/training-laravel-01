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

Route::get('/', function () {
    return view('welcome');
});

Route::get('items/search','ItemController@search')->name('items.search');

Route::resource('items', 'ItemController');
Route::resource('categories', 'CategoryController');

//Route::get('pagenate', 'SearchController@index')->name('serch.index');