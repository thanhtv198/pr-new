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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // auth admin
    Route::get('/login', 'AdminController@getLogin')->name('login_admin');
    Route::post('/login', 'AdminController@logIn')->name('post_login_admin');
    Route::get('/logout', 'AdminController@logOut')->name('logout_admin');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'locale'], 'namespace' => 'Admin'], function () {
    Route::get('/home', 'HomeController@index')->name('home_admin');

    //manage menber
    Route::group(['prefix' => 'member', 'middleware' => 'role_admin'], function () {
        Route::get('/index', 'AccountController@getMember')->name('get_member');
        Route::get('/add', 'AccountController@addMember')->name('add_member');
        Route::post('/add', 'AccountController@postAddMember')->name('postAdd_member');
        Route::get('/edit/{id}', 'AccountController@editMember')->name('edit_member');
        Route::post('edit/{id}', 'AccountController@postEditMember')->name('postEdit_member');
        Route::get('/delete/{id}', 'AccountController@deleteMember')->name('delete_member');
        Route::get('/search', 'AccountController@searchMember')->name('search_member');
        Route::post('/delete', 'AccountController@deleteMulMember')->name('mul_del_member');
    });

    //manage manager
    Route::group(['prefix' => 'manager', 'middleware' => 'role_admin'], function () {
        Route::get('/index', 'AccountController@getManager')->name('get_manager');
        Route::get('/add', 'AccountController@addManager')->name('add_manager')->middleware('role_admin');
        Route::post('/add', 'AccountController@postAddManager')->name('postAdd_manager')->middleware('role_admin');
        Route::get('/edit/{id}', 'AccountController@editManager')->name('edit_manager');
        Route::post('edit/{id}', 'AccountController@postEditManager')->name('postEdit_manager');
        Route::get('/delete/{id}', 'AccountController@deleteManager')->name('delete_manager')->middleware('role_admin');
        Route::get('/search', 'AccountController@searchManager')->name('search_manager');
        Route::post('/delete', 'AccountController@deleteMulManager')->name('mul_del_manager')->middleware('role_admin');
    });

    //manage category admin
    Route::group(['namespace' => 'Product', 'middleware' => 'role_manager'], function () {
        Route::resource('category', 'CategoryController', ['except' => ['destroy', 'edit']]);
        Route::get('/search/category', 'CategoryController@search')->name('search_category');
        Route::get('/category/delete/{id}', 'CategoryController@delete')->name('category.delete');
    });

    //manage manufacture admin
    Route::group(['namespace' => 'Product', 'middleware' => 'role_manager'], function () {
        Route::resource('manufacture', 'ManufactureController', ['except' => ['destroy', 'edit']]);
        Route::get('/search/manufacture', 'ManufactureController@searchManufacture')->name('search_manufacture');
        Route::get('/manufacture/delete/{id}', 'ManufactureController@delete')->name('manufacture.delete');
    });
Route::group(['middleware' => ['role_manager', 'locale']], function () {
    //manage product admin
    Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
        Route::get('/index', 'ProductController@getProduct')->name('get_product');
        Route::get('/delete/{id}', 'ProductController@deleteProduct')->name('delete_product');
        Route::get('/search', 'ProductController@searchProduct')->name('search_product');
        Route::get('/accept/{id}', 'ProductController@accept')->name('accept_product');
        Route::post('/reject', 'ProductController@reject')->name('reject_product');
        Route::post('/delete', 'ProductController@deleteManyProduct')->name('mul_del_product');
    });
    //route admin manage news
    Route::resource('news', 'ContentController', ['except' => ['destroy', 'edit']]);
    Route::get('/news/delete/{id}', 'ContentController@deleteNews')->name('delete_news');
    Route::get('search/news', 'ContentController@searchNews')->name('search_news');
    Route::post('/deletenews', 'ContentController@deleteManyNews')->name('mul_del_news');

    //route admin manage slide
    Route::resource('slide', 'SlideController', ['except' => ['destroy', 'edit']]);
    Route::get('/slide/delete/{id}', 'SlideController@deleteSlide')->name('delete_slide');
    Route::get('search/slide', 'SlideController@searchSlide')->name('search_slide');
    Route::post('/delete', 'SlideController@deleteManySlide')->name('mul_del_slide');

    //respond user
    Route::group(['prefix' => 'respond'], function () {
        Route::get('/index', 'InteractionController@getRespond')->name('get_respond');
        Route::post('/delete/{id}', 'InteractionController@deleteRespond')->name('delete_respond');
        Route::get('/search', 'InteractionController@searchRespond')->name('search_respond');
        Route::get('/check/{id}', 'InteractionController@check')->name('check_respond');
    });

    //route resource post
    Route::group(['as' => 'admin.'], function () {
        Route::resource('posts', 'PostController');
        Route::resource('topics', 'TopicController');
    });

    //route status post
    Route::post('posts/active/{id}', 'PostController@activePost')->name('admin.posts.active');
    Route::post('posts/inactive/{id}', 'PostController@inActivePost')->name('admin.posts.inactive');

    Route::group(['as' => 'admin.'], function () {
        Route::resource('topics', 'TopicController');
    });

});
});


Route::namespace('Auth')->group(function () {
    //login social
    Route::get('/login/{social}', 'SocialController@redirectToProvider');
    Route::get('/login/{social}/callback', 'SocialController@handleProviderCallback');
});

Route::group(['namespace' => 'Site', 'middleware' => 'locale'], function () {
    Route::get('/', 'HomeController@index')->name('home_page');
    Route::get('/home', 'HomeController@index');
    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('change-language');
    //auth user
    Route::get('/signup', 'HomeController@getSignUp')->name('get_signup');
    Route::post('/signup', 'HomeController@postSignUp')->name('post_signup');
    Route::get('/login', 'HomeController@getSignIn')->name('get_signin');
    Route::post('/login', 'HomeController@postSignIn')->name('post_signin');
    Route::get('/logout', 'HomeController@logOut')->name('logout');

    //route search
    Route::get('/search/{key?}', 'HomeController@search')->name('search_site');
    Route::get('searchx', 'HomeController@getKey')->name('get_key');
    Route::get('/price/to{to}', 'HomeController@searchPrice')->name('site_seach_price1');
    Route::get('/price/{from?}/{to?}', 'HomeController@searchPrice')->name('site_seach_price');
    Route::get('/address/{id?}', 'HomeController@searchAddress')->name('site_seach_address');
    Route::post('/search/multiple', 'HomeController@searchMultiple')->name('site_search_multiple');

    //view category, manufactu news
    Route::get('/news/{id}', 'HomeController@newDetail')->name('news_detail');
    Route::get('/category/{id}', 'HomeController@getCategory')->name('site_category');
    Route::get('/manufacture/{id}', 'HomeController@getManufacture')->name('site_manufacture');

    // selling resource
    Route::resource('sell', 'SellingController', ['except' => ['destroy', 'edit']])->middleware('require_login');
    Route::get('/sell/delete/{id}', 'SellingController@delete')->name('delete_sell_product')->middleware('require_login');;

    //post user
    //route resource post
    Route::resource('posts', 'PostController');
//    Route::post('posts', 'PostController@deletePost')->name('posts.delete_post');
    Route::get('posts/user/{id}', 'PostController@getPostByUser')->name('posts.user');
    //comment posts
    Route::post('posts/{id}/comments', 'PostController@comment')->name('posts.comment');
    Route::post('posts/{id}/replies', 'PostController@reply')->name('posts.reply');

    //route resource topic
    Route::resource('topics', 'TopicController');
    Route::get('topics/{slug}/posts', [
        'as' => 'posts',
        'uses' => 'TopicController@getPostByTopicId',
    ]);


    //route cart
    Route::group(['prefix' => 'cart'], function () {
        Route::get('/cart', 'CartController@viewCart')->name('cart');
        Route::get('/addcart/{id}', 'CartController@getAddCart')->name('add_cart');
        Route::post('/update', 'CartController@updateCart')->name('update_cart');
        Route::get('/delete/{id}', 'CartController@deleteCart')->name('delete_cart');
        Route::get('/checkout', 'CartController@checkOut')->name('checkout');
        Route::post('/checkout', 'CartController@postCheckOut')->name('post_checkout');
    });

    //product comment rating
    Route::group(['prefix' => 'product'], function () {
        Route::get('/{id}', 'ProductController@getDetailProduct')->name('detail_product');
        //comment products
        Route::post('/{id}/comments', 'ProductController@comment')->name('products.comment')->middleware('require_login');;
        Route::post('/{id}/replies', 'ProductController@reply')->name('products.reply')->middleware('require_login');;
        Route::post('/rating/{id}', 'ProductController@rating')->name('rating')->middleware('require_login');;
    });

    // profile user
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/{id}', 'ProfileController@getProfile')->name('get_profile');
        Route::post('/{id}', 'ProfileController@postProfile')->name('post_profile');
        Route::get('/sell', 'ProfileController@getSell')->name('get_sell');
        Route::get('/time-line/{id}', 'ProfileController@timeLine')->name('time_line');
    });

    // user interaction
    Route::group(['prefix' => 'interact', ], function () {
        //bought orders of user
        Route::get('/interact/{id}', 'InteractionController@getInteract')->name('get_interact');
        Route::get('/bought', 'InteractionController@getOrderBought')->name('get_order_bought');
        Route::get('/bought/detail/{id}', 'InteractionController@getOrderBoughtDetail')->name('get_order_bought_detail');
        Route::get('/bought/delete/{id}', 'InteractionController@deleteOrderBought')->name('delete_order_bought');
        Route::get('/bought/cancel/{id}', 'InteractionController@cancelOrder')->name('cancel');

        //sold orders of user
        Route::get('/sold', 'InteractionController@getOrderSold')->name('get_order_sold');
        Route::get('/sold/{key?}', 'InteractionController@getOrderSold')->name('get_order_sold1');
        Route::get('/sold/handle/{id}', 'InteractionController@handleOrderSold')->name('handle_sold');
        Route::get('/sold/delete/{id}', 'InteractionController@deleteOrderSold')->name('delete_order_sold');

        //export file excel
        Route::get('/export', 'InteractionController@exportFile')->name('export');
        Route::post('/import', 'InteractionController@importFile')->name('import');

        // user send respond
        Route::get('/respond', 'InteractionController@respond')->name('respond');
        Route::post('/respond', 'InteractionController@postRespond')->name('post_respond');
    });

    
    //compare product
    Route::group(['prefix' => 'compare'], function () {
        Route::get('/compare', 'CompareController@index')->name('get_compare');
        Route::get('/add/{id}', 'CompareController@addToCompare')->name('add_compare');
        Route::get('/delete/{id}', 'CompareController@delete')->name('delete_compare');
    });
//wishlist product
    Route::group(['prefix' => 'wishlist'], function () {
        Route::get('/wishlist', 'WishlistController@index')->name('get_wishlist');
        Route::get('/add/{id}', 'WishlistController@addToWishlist')->name('add_wishlist');
        Route::post('/delete/{id}', 'WishlistController@delete')->name('delete_wishlist');
    });

    //notify route
    Route::get('notification', 'CartController@notification');
    Route::get('send/{id}','SocketController@index')->name('send_message');
    Route::get('send/{id}/{key?}','SocketController@index')->name('send_message1')->middleware('require_login');
    Route::post('send','SocketController@postSendMessage')->name('post_message');
});

Route::view('/{any?}', 'site.404');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



