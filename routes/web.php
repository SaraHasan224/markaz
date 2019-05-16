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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'UserController@login');
    Route::post('/user/signupweb',['uses' => 'UserController@signUpWeb']);
    Route::post('/user/signinweb',['uses' =>'UserController@signInWeb']);
    Route::post('forgot-pwd',['uses' =>'UserController@forgotpwd']);
    Route::post('logout', 'UserController@logout');
});
    Route::group(['middleware' => ['customauth']], function () {
        Route::match(['get','post'],'dashboard', 'UserController@loggedIn');
        /* Promotion routes starts here*/
        Route::get('get-promotions', 'DatatablesController@getpromotions');
        Route::get('promotions', 'PromotionController@getpromotions');
        Route::get('view-promotions', 'PromotionController@viewpromotions');
        Route::get('create-promotions', 'PromotionController@createpromotion');
        Route::post('create-promotions', 'PromotionController@createpromotion');
        // Route::get('edit-promotions', 'PromotionController@editpromotions');
        /* Promotion routes ends here*/
        
        /* Store routes starts here*/
        Route::get('get-store', 'DatatablesController@getstore');
        Route::get('store/{id}', 'StoreController@getspecificstore');
        Route::get('store', 'StoreController@getstore');
        Route::post('poststore', 'StoreController@poststore');
        Route::get('create-store', 'StoreController@createstore');
        Route::get('edit-store/{id}', 'StoreController@editstore');
        Route::post('edit-store/{id}', 'StoreController@editstore');
        /* Store routes ends here*/
        
        /* User routes starts here*/
        Route::get('get-users', 'DatatablesController@getusers'); 
        Route::get('create-users', 'UserController@createUsers');
        Route::get('users', 'UserController@getusers');
        Route::post('view-user', 'UserController@viewUsers');
        Route::post('edit-users', 'UserController@editusers');
        Route::post('delete-users', 'UserController@deleteUsers');
        /* User routes ends here*/

        /* Follower routes starts here*/
        Route::get('get-followers', 'DatatablesController@getfollowers');
        Route::get('followers/{user_id}', 'UserController@getfollowers');
        Route::get('get-unfollowers', 'DatatablesController@getunfollowers');
        Route::get('unfollowers/{user_id}', 'UserController@getunfollowers');
        /* Follower routes ends here*/

        /* Support routes starts here*/    
        Route::match(['get','post'],'support', 'UserController@support');
        Route::get('get-support', 'DatatablesController@getsupport');
        /* Support routes ends here*/


        Route::get('create-faq', function () {
            return view('faq.faq');
        });
        Route::get('faq', function () {
            return view('home.faq');
        });
        Route::get('edit-faq', function () {
            return view('home.edit-faqs');
        });
        Route::get('invoice', function () {
            return view('home.invoice');
        });
        Route::get('events', function () {
            return view('home.events');
        });
        Route::get('profile', function () {
            return view('user.client_profile');
        });
        Route::get('edit-user-info', function () {
            return view('user.edit_userinfo');
        });
        Route::get('activity', function () {
            return view('user.activity');
        });
        Route::get('timeline', function () {
            return view('user.timeline');
        });
        Route::get('statistics', function () {
            return view('user.statistics');
        });
    });
