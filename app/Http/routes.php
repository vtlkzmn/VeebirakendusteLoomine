<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@home');
Route::get('states', 'PagesController@states');
Route::get('contact', 'PagesController@contact');


Route::get('posts', 'PostsController@index');
Route::get('posts/{post}', 'PostsController@show');
Route::post('posts/{post}/reviews', 'PostsController@addReview');
Route::post('posts/{post}/deleteReviews', 'PostsController@deleteReviews');
Route::post('posts/{post}/deletePost', 'PostsController@deletePost');
