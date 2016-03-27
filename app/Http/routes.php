<?php

Route::group(['middleware' => ['web']], function () {

    /** Page routing */
    Route::get('/', 'PagesController@home');
    Route::get('/estates', 'PagesController@estates');
    Route::get('/addEstate', 'PagesController@addEstate');
    Route::get('/contact', 'PagesController@contact');
    Route::get('/register', 'PagesController@register');
    Route::get('/estates/{post}', 'PostsController@reviews');

    /** DB alteration */
    //Adding to DB
    Route::post('estates/{post}/reviews', 'PostsController@addReview');
    Route::post('estates/addEstate', 'PostsController@addEstate');
    //Deleting from DB
    Route::post('estates/{post}/deleteReviews', 'PostsController@deleteReviews');
    Route::post('estates/{post}/deleteEstate', 'PostsController@deleteEstate');

    /** Ajax */
    Route::get('/getRequest', function () {
        if (Request::ajax()) {
            return 'Completed with AJAX';
        }
    });

    /** Language switching */
    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

    /** Authentication */
    Route::auth();
    Route::get('/home', 'HomeController@index'); //Redirects user back to page he was on before

    /* Data push */
    Route::get("/getLatestEstate", "PostsController@getLatestEstate");

    /** Bank Link routing */
    Route::get('/dbqueryview', 'BankController@bankQuery');
    Route::post('callback/seb', 'BankController@callback');
    Route::post('cancel/seb', 'BankController@cancel');
});

