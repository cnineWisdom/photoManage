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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::post('home', 'HomeController@index');

Route::get('home/{id}', 'HomeController@index')->name('home');


Route::get('uploadPicture','uploadController@index')->name('upload');
Route::post('uploadPicture/doupload','uploadController@doupload');

Route::get('test/{id?}','HomeController@index')->name('work');





