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

Route::get('/checks', 'ChecksController@index');

Route::get('/excel', 'ChecksController@excel')->name('excel');
Route::get('/delete/{id}/', 'ChecksController@delete');
Route::get('/edit/{id}/', 'ChecksController@edit');
Route::patch('/update/{id}/', 'ChecksController@update');
?>