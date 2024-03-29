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
        Route::match(['get','post'],'dashboard/{user_id}', 'LoginController@dashboard');
        Route::match(['get','post'],'admin/dashboard', 'LoginController@dashboard');
        Route::match(['get','post'],'dashboard-data', 'DashboardController@dashView');
        Route::match(['get','post'],'dashboard-data/{store_id}', 'DashboardController@dashView');
        
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
            /* Categories routes ends here*/

            /* Tags routes starts here*/
            //For Admin
            Route::get('get-tags', 'DatatablesController@getTags');
            Route::get('tags', 'TagController@getTags');
            Route::post('tags', 'TagController@addTags');
            Route::post('tags-edit', 'TagController@editTags');
            Route::post('tags-delete', 'TagController@deleteTags');
            /* Tags routes ends here*/

        /* Promotion routes ends here*/
        
        /* Store routes starts here*/
        
        //Store Rouutes
        Route::post('select-store','StoreController@getstoreid');

        Route::get('get-store', 'DatatablesController@getstore');
        Route::get('get-store/{user_id}', 'DatatablesController@getstore');
        Route::get('store', 'StoreController@getstore');
        Route::get('create-store', 'StoreController@createstore');
        Route::post('poststore', 'StoreController@poststore');
        Route::match(['get','post'],'edit-store/{id}', 'StoreController@editstore');
        Route::post('delete-store', 'StoreController@deleteStore');
        Route::post('update-store-status', 'StoreController@updateStoreStatus');
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
        
        /* Roles routes starts here*/

        Route::get('roles', 'PermissionController@getroles');
        Route::get('permission', 'PermissionController@getpermission');
        Route::post('create-permit', 'PermissionController@addpermission');
        Route::post('view-role-permit/{role_id}', 'PermissionController@viewrolepermission');
        
        /* Roles routes starts here*/


        /* Follower routes starts here*/
        
        Route::get('get-followers', 'DatatablesController@getfollowers');
        Route::get('followers/{store_id}', 'UserController@getfollowers');
        Route::get('get-unfollowers', 'DatatablesController@getunfollowers');
        Route::get('unfollowers/{store_id}', 'UserController@getunfollowers');
        
        /* Follower routes ends here*/

        /* Support routes starts here*/    
        
        Route::match(['get','post'],'support', 'UserController@support');
        Route::match(['get','post'],'support/{store_id}', 'UserController@storeSupport');
        Route::get('get-support', 'DatatablesController@getsupport');
        Route::get('get-support/{store_id}', 'DatatablesController@getsupport');
        
        /* Support routes ends here*/

        /*  Profile routes starts here  */
 
        Route::get('profile','UserController@getUserProfile');
        Route::get('profile/{store_id}','UserController@getUserProfile');
        Route::get('media','UserController@getMedia');
        Route::get('media/{store_id}','UserController@getMedia');
        Route::get('logs','UserController@getLogs');
        Route::get('logs/{store_id}','UserController@getLogs');
        Route::post('user_profile','UserController@postUserProfile');        
        /*  Profile routes ends here  */

        /*  Frequently Asked Questions routes starts here  */
        
        Route::get('faq','FaqController@view');
        Route::get('manage-faq', 'FaqController@manage');


        Route::get('get-questions', 'DatatablesController@getQuestions');
        Route::get('add-faq', 'FaqController@add');
        Route::post('add-faq', 'FaqController@createFaq');
        Route::post('edit-faq', 'FaqController@updateFaq');
        Route::post('faq/delete', 'FaqController@deleteFaq');
        Route::post('faq/status', 'FaqController@FAQStatusUpdate');

        Route::get('get-questions/{id}', 'DatatablesController@getQuestions');
        Route::get('faq/{store_id}','FaqController@view');
        Route::get('add-faq/{store_id}', 'FaqController@add');
        Route::post('add-faq/{store_id}', 'FaqController@createFaq');
        Route::get('manage-faq/{store_id}', 'FaqController@manage');
        Route::post('view-faq/{id}', 'FaqController@getSpecificQuestion');
        Route::post('edit-faq/{store_id}', 'FaqController@updateFaq');
        Route::post('faq/delete/{store_id}', 'FaqController@deleteFaq');
        Route::post('faq/status/{store_id}', 'FaqController@FAQStatusUpdate');
        
        /*  Frequently Asked Questions routes ends here  */
        
        
        /*  User Timeline routes starts here  */
        
        Route::get('timeline', 'UserController@getTimeline');
        Route::get('timeline/{store_id}', 'UserController@getTimeline');
       
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
