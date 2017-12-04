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

//view homePage
Route::get('/', 'HomeController@index');
Route::post('/add_to_cart', 'HomeController@add_to_cart');
//view  registerPage
Route::get('/register', 'Auth\RegisterController@index');
//view  productPage
Route::get('/product', 'front\ProductController@index');
//view  promoPage
Route::get('/promo', 'front\PromoController@index');
//view  howroorderPage
Route::get('/how_to_order', 'front\HowToOrderController@index');
//view  aboutusPage
Route::get('/about_us', 'front\AboutUsController@index');

//DetailOrder form
//get html form data
Route::get('/detail_order', 'front\DetailOrderController@index');
//delete
Route::get('/detail_order/delete', 'front\DetailOrderController@delete');

//PaymentMethod form
//get html form data
Route::get('/payment_method', 'front\PaymentMethodController@index');
//get data for datatable
Route::post('/payment_method', 'front\PaymentMethodController@post');

//PaymentConfirmation form
//get html form data
Route::get('/payment_confirmation', 'front\PaymentConfirmationController@index');
//get data for datatable
Route::post('/payment_confirmation', 'front\PaymentConfirmationController@post');

//PaymentConfirmationSuccess form
//get html form data
Route::get('/thank_you', 'front\PaymentConfirmationSuccessController@index');
//get data for datatable
Route::post('/thank_you', 'front\PaymentConfirmationSuccessController@post');


//D A S H B O A R D
//dashboardPage
Route::get('/dashboard', 'dashboard\DashboardController@index');


//P R O D U C T
//dashboard/make sushiPage
Route::get('/dashboard/make_sushi', 'dashboard\product\DashboardMakeSushiController@index');
Route::post('/dashboard/make_sushi', 'dashboard\product\DashboardMakeSushiController@post');
Route::get('/dashboard/make_sushi/create', 'dashboard\product\DashboardMakeSushiController@create');
Route::post('/dashboard/make_sushi/create', 'dashboard\product\DashboardMakeSushiController@post_create');
Route::get('/dashboard/make_sushi/delete', 'dashboard\product\DashboardMakeSushiController@delete');

//dashboard/make sushiPage
Route::get('/dashboard/ready_to_eat', 'dashboard\product\DashboardReadyToEatController@index');
Route::post('/dashboard/ready_to_eat', 'dashboard\product\DashboardReadyToEatController@post');
Route::get('/dashboard/ready_to_eat/create', 'dashboard\product\DashboardReadyToEatController@create');
Route::post('/dashboard/ready_to_eat/create', 'dashboard\product\DashboardReadyToEatController@post_create');
Route::get('/dashboard/ready_to_eat/delete', 'dashboard\product\DashboardReadyToEatController@delete');

//F R O N T
//dashboard/bannerPage
Route::get('/dashboard/banner', 'dashboard\front\DashboardBannerController@index');
Route::post('/dashboard/banner', 'dashboard\front\DashboardBannerController@post');
Route::get('/dashboard/banner/create', 'dashboard\front\DashboardBannerController@create');
Route::post('/dashboard/banner/create', 'dashboard\front\DashboardBannerController@post_create');
Route::get('/dashboard/banner/delete', 'dashboard\front\DashboardBannerController@delete');

//dashboard/promoPage
Route::get('/dashboard/promo', 'dashboard\front\DashboardPromoController@index');
Route::post('/dashboard/promo', 'dashboard\front\DashboardPromoController@post');
Route::get('/dashboard/promo/create', 'dashboard\front\DashboardPromoController@create');
Route::post('/dashboard/promo/create', 'dashboard\front\DashboardPromoController@post_create');
Route::get('/dashboard/promo/delete', 'dashboard\front\DashboardPromoController@delete');

//dashboard/faqPage
Route::get('/dashboard/faq', 'dashboard\front\DashboardFaqController@index');
Route::post('/dashboard/faq', 'dashboard\front\DashboardFaqController@post');
Route::get('/dashboard/faq/create', 'dashboard\front\DashboardFaqController@create');
Route::post('/dashboard/faq/create', 'dashboard\front\DashboardFaqController@post_create');
Route::get('/dashboard/faq/delete', 'dashboard\front\DashboardFaqController@delete');


//S E L L I N G
//dashboard/orderPage
Route::get('/dashboard/order', 'dashboard\selling\DashboardOrderController@index');
Route::post('/dashboard/order', 'dashboard\selling\DashboardOrderController@post');
Route::get('/dashboard/order/create', 'dashboard\selling\DashboardOrderController@create');
Route::post('/dashboard/order/create', 'dashboard\selling\DashboardOrderController@post_create');
Route::get('/dashboard/order/delete', 'dashboard\selling\DashboardOrderController@delete');

//dashboard/transactionPage
Route::get('/dashboard/transaction', 'dashboard\selling\DashboardTransactionController@index');
Route::post('/dashboard/transaction', 'dashboard\selling\DashboardTransactionController@post');
Route::get('/dashboard/transaction/create', 'dashboard\selling\DashboardTransactionController@create');
Route::post('/dashboard/transaction/create', 'dashboard\selling\DashboardTransactionController@post_create');
Route::get('/dashboard/transaction/delete', 'dashboard\selling\DashboardTransactionController@delete');

Auth::routes();
