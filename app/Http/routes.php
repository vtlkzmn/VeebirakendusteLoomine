<?php

/** Page routing */

Route::get('/', 'PagesController@home');
Route::get('estates', 'PagesController@estates');
Route::get('addEstate', 'PagesController@addEstate');
Route::get('contact', 'PagesController@contact');
Route::get('estates/{post}', 'PostsController@reviews');


/** DB alteration */

//Adding to DB
Route::post('estates/{post}/reviews', 'PostsController@addReview');
Route::post('estates/addEstate', 'PostsController@addEstate');

//Deleting from DB
Route::post('estates/{post}/deleteReviews', 'PostsController@deleteReviews');
Route::post('estates/{post}/deleteEstate', 'PostsController@deleteEstate');

Route::get('addEstate/getRequest', function(){
   if (Request::ajax()){
       return 'Comleted with AJAX';
   }
});

//Route::get('estates/getRequest', function(){
//   if (Request::ajax()){
//       return 'Comleted with AJAX';
//   }
//});

Route::post('addEstate/addEstate', function(){
   if (Request::ajax()){
       return Response::json(Request::all());
   }
});