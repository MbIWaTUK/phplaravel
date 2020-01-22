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
Route::get('/', function(){
    return view('Welcome');
});
Route::get('/albums', 'AlbumsController@albums');
Route::post('/album', 'AlbumsController@create');
Route::match(['get', 'post'],'/albums/update/{album}', 'AlbumsController@update')->name('update.show');
Route::get('/albums/delete/{album}', 'AlbumsController@delete')->name('delete.show');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');