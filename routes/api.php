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




Route::post('/user/signup',[

    'uses' => 'UserController@signUp'
  ]);
  
  Route::post('/user/signin',[
  
   'uses' =>'UserController@signIn'
  ]);

  Route::post('/store/faq',[
  
    'uses' =>'FaqController@createFaq'
   ]);


   Route::put('/store/faq',[
  
    'uses' =>'FaqController@updateFaq'
   ]);

   Route::delete('/store/faq',[
  
    'uses' =>'FaqController@deleteFaq'
   ]);

   Route::get('/store/faq',[
  
    'uses' =>'FaqController@getAllFaqs'
   ]);


  Route::get('/user/profile',[

    'uses' =>'UserController@getProfile',
    'middleware' => 'auth.jwt'
  ]);

  Route::post('/device/token',[
     'uses'=>'DeviceController@setUserTokens',
     'middleware'=>'auth.jwt'

  ]);

  Route::post('/create-store',[
    'uses'=>'StoreController@create',
    'middleware'=>'auth.jwt'

 ]);

 Route::post('/create-promotion',[
  'uses'=>'PromotionController@create',
  'middleware'=>'auth.jwt'

]);

Route::post('/upload-promotion-image',[

  'uses'=>'MediaImageController@uploadImage',
  'middleware'=>'auth.jwt'
]);

Route::get('/get-all-store',[
  'uses'=>'StoreController@all',
  'middleware'=>'auth.jwt'
  
]);

Route::get('/get-all-promotions',[

  'uses'=>'PromotionController@all',
  'middleware'=>'auth.jwt'

]);
  
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

Route::post('/add-comment',[
  'uses'=>'CommentController@addCommentToPromotion',
  'middleware'=>'auth.jwt'
]);
  
Route::get('/get-comments',[
  'uses'=>'CommentController@getCommentsByPromotionId',
  'middleware'=>'auth.jwt'
]);