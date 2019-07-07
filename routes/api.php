<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


    //  User Login  //

    Route::post('/user/signup',[
      'uses' => 'RegisterController@signUp'
    ]);
    Route::post('/user/signin',[
    'uses' =>'LoginController@signIn'
    ]);

    //  User Profile  //

    Route::get('/user/profile',[
      'uses' =>'UserController@getProfile',
      'middleware' => 'auth.jwt'
    ]);

    //  Device Token  //

    Route::post('/device/token',[
      'uses'=>'DeviceController@setUserTokens',
      'middleware'=>'auth.jwt'
    ]);

    //  Manage Store  //

    Route::post('/create-store',[
      'uses'=>'StoreController@create',
      'middleware'=>'auth.jwt'
    ]);
    Route::get('/get-all-store',[
      'uses'=>'StoreController@all',
      'middleware'=>'auth.jwt'
    ]);

    //  Manage Store Followers  //

    Route::post('/become/follower',[
      'uses'=>'FollowerController@becomeFollower',
      'middleware'=>'auth.jwt'
    ]);
    Route::get('/followers-store',[
      'uses'=>'FollowerController@findFollowerOfStore',
      'middleware'=>'auth.jwt'
    ]);
    Route::get('/followers-user',[
      'uses'=>'FollowerController@findFollowerOfUser',
      'middleware'=>'auth.jwt'
    ]);

    //  Store Support  //

    Route::post('/add-support',[
      'uses'=>'StoreController@addSupport',
      'middleware'=>'auth.jwt'
    ]);

    //  Manage Promotion  //

    Route::post('/create-promotion',[
      'uses'=>'PromotionController@create',
      'middleware'=>'auth.jwt'
    ]);
    Route::post('/upload-promotion-image',[
      'uses'=>'MediaImageController@uploadImage',
      'middleware'=>'auth.jwt' 
    ]);
    Route::get('/get-all-promotions',[
      'uses'=>'PromotionController@all',
      'middleware'=>'auth.jwt'
    ]);

    //  Manage Promotion Comments  //

    Route::post('/add-comment',[
      'uses'=>'CommentController@addCommentToPromotion',
      'middleware'=>'auth.jwt'
    ]);
    Route::get('/get-comments',[
      'uses'=>'CommentController@getCommentsByPromotionId',
      'middleware'=>'auth.jwt'
    ]);

    // Get all Categories //

    Route::get('/get-all-categories',[
     'uses'=>'CategoryController@all',
     'middleware'=>'auth.jwt'

    ]);

    Route::get('/get-new-store',[
      'uses'=>'StoreController@getNewStores',
      'middleware'=>'auth.jwt'
    ]);

    Route::get('/get-new-promotions',[
      'uses'=>'PromotionController@getNewPromotions',
      'middleware'=>'auth.jwt'
    ]);