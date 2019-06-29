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
    Route::get('/', 'LoginController@login');
    Route::post('/user/signupweb',['uses' => 'RegisterController@signUpWeb']);
    Route::post('/user/signinweb',['uses' =>'LoginController@signInWeb']);
    Route::post('forgot-pwd',['uses' =>'ForgotPasswordController@forgotpwd']);
    Route::post('logout', 'LoginController@logout');
});
    Route::group(['middleware' => ['customauth']], function () {
        Route::match(['get','post'],'dashboard', 'LoginController@loggedIn');
        Route::match(['get','post'],'dashboard/{store_id}', 'LoginController@dashboard');
        
        /* Promotion routes starts here*/

        Route::get('get-promotions', 'DatatablesController@getpromotions');
        Route::get('promotions', 'PromotionController@getpromotions');
        Route::get('create-promotions', 'PromotionController@createPromotion');
        Route::post('post-promotion', 'PromotionController@createPromotion');
        Route::get('promotions/edit/{id}', 'PromotionController@editpromotions');
        Route::post('promotions/edit/view/{id}', 'PromotionController@viewpromotions');
        Route::post('promotion/edit/{id}', 'PromotionController@editpromotion');
        Route::post('promotion-delete', 'PromotionController@deletePromotion');
        //For Store Admin
        Route::get('get-promotions/{store_id}', 'DatatablesController@getpromotions');
        Route::get('promotions/{store_id}', 'PromotionController@getpromotions');

        /* Promotion routes ends here*/ 

        /* Categories routes starts here*/
        
            //For Admin
            Route::get('get-categories', 'DatatablesController@getCategories');
            Route::get('categories', 'CategoryController@getCategories');
            Route::post('categories', 'CategoryController@addCategories');
            Route::post('categories-edit', 'CategoryController@editCategories');
            Route::post('categories-delete', 'CategoryController@deleteCategories');
            //For Store Admin            
            Route::get('get-categories/{store_id}', 'DatatablesController@getCategories');
            Route::get('categories/{store_id}', 'CategoryController@getCategories');
            Route::post('categories/{store_id}', 'CategoryController@addCategories'); 
            Route::post('categories-edit/{store_id}', 'CategoryController@editCategories');
            Route::post('categories-delete/{store_id}', 'CategoryController@deleteCategories');
            /* Categories routes ends here*/

            /* Tags routes starts here*/
            //For Admin
            Route::get('get-tags', 'DatatablesController@getTags');
            Route::get('tags', 'TagController@getTags');
            Route::post('tags', 'TagController@addTags');
            Route::post('tags-edit', 'TagController@editTags');
            Route::post('tags-delete', 'TagController@deleteTags');

            // For Store Admin 
            Route::get('get-tags/{store_id}', 'DatatablesController@getTags');
            Route::get('tags/{store_id}', 'TagController@getTags');
            Route::post('tags/{store_id}', 'TagController@addTags');
            Route::post('tags-edit/{store_id}', 'TagController@editTags');
            Route::post('tags-delete/{store_id}', 'TagController@deleteTags');
            /* Tags routes ends here*/

        /* Promotion routes ends here*/
        
        /* Store routes starts here*/
        
        //Store Rouutes
        Route::get('get-store', 'DatatablesController@getstore');
        Route::get('store', 'StoreController@getstore');
        Route::post('poststore', 'StoreController@poststore');
        Route::get('create-store', 'StoreController@createstore');
        Route::match(['get','post'],'edit-store/{id}', 'StoreController@editstore');
        //Get Specific Store
        Route::get('view-store/{id}', 'StoreController@getspecificstore');
        
        /* Store routes ends here*/
        
        /* User routes starts here*/

        Route::get('get-users', 'DatatablesController@getusers'); 
        Route::get('create-users', 'UserController@createUsers');
        Route::get('users', 'UserController@getusers');
        Route::post('add-user', 'UserController@addUsers');
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
        Route::match(['get','post'],'support/{store_id}', 'UserController@storeSupport');
        Route::get('get-support', 'DatatablesController@getsupport');
        
        /* Support routes ends here*/

        /*  Profile routes starts here  */
 
        Route::get('profile','UserController@getUserProfile');
        Route::post('user_profile','UserController@postUserProfile');        
        /*  Profile routes ends here  */

        /*  Frequently Asked Questions routes starts here  */
        
        Route::get('get-questions/{id}', 'DatatablesController@getQuestions');
        Route::get('faq/{store_id}','FaqController@view');
        Route::get('add-faq/{store_id}', 'FaqController@add');
        Route::post('add-faq/{store_id}', 'FaqController@createFaq');
        Route::get('manage-faq/{store_id}', 'FaqController@manage');
        Route::post('view-faq/{id}', 'FaqController@getSpecificQuestion');
        Route::post('edit-faq/{store_id}', 'FaqController@updateFaq');
        Route::post('faq/delete/{store_id}', 'FaqController@deleteFAQ');
        Route::post('faq/status/{store_id}', 'FaqController@FAQStatusUpdate');
        
        /*  Frequently Asked Questions routes ends here  */
        
        
        /*  User Timeline routes starts here  */
        
        Route::get('timeline/{store_id}/{timeline}', 'UserController@getTimeline');
       
        /*  User Timeline routes ends here  */
       
        Route::get('activity/{store_id}', 'UserController@getActivity');
       
        Route::get('invoice', function () {
            return view('home.invoice');
        });
        Route::get('events', function () {
            return view('home.events');
        });
        Route::get('statistics', function () {
            return view('user.statistics');
        });
    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
