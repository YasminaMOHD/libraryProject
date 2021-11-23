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

Route::get('Library','vendorsController@index');
Route::get('admin','vendorsController@GoToHome')->middleware('auth');
Route::get('findTypeSearch','vendorsController@findTypeSearch')->name('findTypeSearch');
Route::get('displayBook','vendorsController@displayBook')->name('displayBook');
Route::get('searchAndDisplay','vendorsController@searchAndDisplay')->name('searchAndDisplay');
Route::get('book/create','bookController@returnCatPubAut')->middleware('auth');
Route::get('category/create','categoryController@returnCat')->middleware('auth');
Route::get('author/create','authorController@returnAuthor')->middleware('auth');
Route::get('publisher/create','publisherController@returnpublisher')->middleware('auth');
Route::post('book/store','bookController@create')->middleware('auth');
Route::post('category/store','categoryController@create')->middleware('auth');
Route::post('publisher/store','publisherController@create')->middleware('auth');
Route::post('author/store','authorController@create')->middleware('auth');
Route::get('book/manage','bookController@manage')->middleware('auth');
Route::get('author/manage','authorController@manage')->middleware('auth');
Route::get('publisher/manage','publisherController@manage')->middleware('auth');
Route::get('category/manage','categoryController@manage')->middleware('auth');
Route::get('book/delete/{id}','bookController@destroy')->middleware('auth');
Route::get('author/delete/{id}','authorController@destroy')->middleware('auth');
Route::get('publisher/delete/{id}','publisherController@destroy')->middleware('auth');
Route::get('category/delete/{id}','categoryController@destroy')->middleware('auth');
Route::get('book/show/{id}','bookController@show')->middleware('auth');
Route::get('author/show/{id}','authorController@show')->middleware('auth');
Route::get('publisher/show/{id}','publisherController@show')->middleware('auth');
Route::get('category/show/{id}','categoryController@show')->middleware('auth');
Route::post('book/update/{id}','bookController@update')->middleware('auth');
Route::post('author/update/{id}','authorController@update')->middleware('auth');
Route::post('publisher/update/{id}','publisherController@update')->middleware('auth');
Route::post('category/update/{id}','categoryController@update')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
