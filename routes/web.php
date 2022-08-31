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

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('poker/create', 'Admin\PokerController@add');
    Route::post('poker/create', 'Admin\PokerController@create');
    Route::get('poker/index', 'Admin\PokerController@index');
    Route::get('poker/edit', 'Admin\PokerController@edit');
    Route::post('poker/edit', 'Admin\PokerController@update');
    Route::get('poker/detail','Admin\PokerController@detail');
});

Route::group(['prefix' => 'poker', 'middleware' => 'auth'],function(){
    Route::resource('/comment', 'CommentController');
    // コメント機能
    Route::post('{comment_id}/comments', 'CommentsController@store');
    Route::get('{comment_id}', 'CommentsController@destroy');
    // いいね機能
    Route::get('like/{id}', 'CommentsController@like')->name('like');
    Route::get('unlike/{id}', 'CommentsController@unlike')->name('unlike');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PokerController@index');

