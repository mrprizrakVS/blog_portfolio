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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'category', 'middleware' => 'auth'], function () {
    Route::get('/', 'CategorieController@index')->name('categories');
    Route::get('/view/{id}', 'CategorieController@show')->name('categories.show');
    Route::get('/create', 'CategorieController@create')->name('categories.create');
    Route::post('/store', 'CategorieController@store')->name('categories.store');
    Route::get('/edit/{id}', 'CategorieController@edit')->name('categories.edit');
    Route::patch('/edit/{id}', 'CategorieController@update')->name('categories.update');
});
Route::group(['prefix' => 'article', 'middleware' => 'auth'], function () {
    Route::get('/', 'ArticleController@index')->name('article');
    Route::get('/view/{id}', 'ArticleController@show')->name('article.show');
    Route::get('/create', 'ArticleController@create')->name('article.create');
    Route::get('/edit/{id}', 'ArticleController@edit')->name('article.edit');
    Route::post('/store', 'ArticleController@store')->name('article.store');
    Route::post('/comment/store', 'CommentarieController@store')->name('commentary.store');
    Route::patch('/edit/{id}', 'ArticleController@update')->name('article.update');
    Route::post('/store', 'ArticleController@store')->name('article.store');
});