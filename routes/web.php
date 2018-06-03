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
//view registerPage
Route::get('/register', 'Auth\RegisterController@index');
//view productPage
Route::get('/product', 'front\ProductController@index');
//view promoPage
Route::get('/promo', 'front\PromoController@index');
//view howroorderPage
Route::get('/how_to_order', 'front\HowToOrderController@index');
//view aboutusPage
Route::get('/about_us', 'front\AboutUsController@index');
//view faqPage
Route::get('/faq', 'front\FaqController@index');
//view termsPage
Route::get('/terms', 'front\TermsController@index');
//view refundPage
Route::get('/refund_policy', 'front\RefundPolicyController@index');
//view contactPage
Route::get('/contact', 'front\ContactController@index');
//view orderHistory
Route::get('/order_history', 'front\OrderHistoryController@index');
//datatable orderHistory
Route::post('/order_history', 'front\OrderHistoryController@post');

//DetailOrder form
//get html form data
Route::get('/detail_order', 'front\DetailOrderController@index');
//insert order
Route::post('/detail_order/create', 'front\DetailOrderController@post_create');
//selectbox
Route::get('/detail_order/select', 'front\DetailOrderController@select');
//delete
Route::get('/detail_order/delete', 'front\DetailOrderController@delete');

//PaymentMethod form
//get html form data
Route::get('/payment_method', 'front\PaymentMethodController@index');
//get data for datatable
Route::post('/payment_method/create', 'front\PaymentMethodController@post_create');

//PaymentConfirmation form
//get html form data
Route::get('/payment_confirmation', 'front\PaymentConfirmationController@index');
//get data for datatable
Route::post('/payment_confirmation/create', 'front\PaymentConfirmationController@post');
Route::get('/payment_confirmation/check', 'front\PaymentConfirmationController@bca_check');

//PaymentConfirmationSuccess form
//get html form data
Route::get('/thank_you', 'front\PaymentConfirmationSuccessController@index');
//get data for datatable
Route::post('/thank_you', 'front\PaymentConfirmationSuccessController@post');


//D A S H B O A R D
//dashboardPage
Route::get('/dashboard', 'dashboard\DashboardController@index');


// A D D _ P R O D U C T
//dashboard/make sushiPage
Route::get('/dashboard/make_sushi', 'dashboard\add_product\DashboardMakeSushiController@index');
Route::post('/dashboard/make_sushi', 'dashboard\add_product\DashboardMakeSushiController@post');
Route::get('/dashboard/make_sushi/create', 'dashboard\add_product\DashboardMakeSushiController@create');
Route::post('/dashboard/make_sushi/create', 'dashboard\add_product\DashboardMakeSushiController@post_create');
Route::get('/dashboard/make_sushi/delete', 'dashboard\add_product\DashboardMakeSushiController@delete');

//dashboard/make sushiPage
Route::get('/dashboard/ready_to_eat', 'dashboard\add_product\DashboardReadyToEatController@index');
Route::post('/dashboard/ready_to_eat', 'dashboard\add_product\DashboardReadyToEatController@post');
Route::get('/dashboard/ready_to_eat/create', 'dashboard\add_product\DashboardReadyToEatController@create');
Route::post('/dashboard/ready_to_eat/create', 'dashboard\add_product\DashboardReadyToEatController@post_create');
Route::get('/dashboard/ready_to_eat/delete', 'dashboard\add_product\DashboardReadyToEatController@delete');

//C O N T E N T M A N A G E M E N T
//dashboard/bannerPage
Route::get('/dashboard/banner', 'dashboard\content_management\DashboardBannerController@index');
Route::post('/dashboard/banner', 'dashboard\content_management\DashboardBannerController@post');
Route::get('/dashboard/banner/create', 'dashboard\content_management\DashboardBannerController@create');
Route::post('/dashboard/banner/create', 'dashboard\content_management\DashboardBannerController@post_create');
Route::get('/dashboard/banner/delete', 'dashboard\content_management\DashboardBannerController@delete');

//dashboard/promoPage
Route::get('/dashboard/promo', 'dashboard\content_management\DashboardPromoController@index');
Route::post('/dashboard/promo', 'dashboard\content_management\DashboardPromoController@post');
Route::get('/dashboard/promo/create', 'dashboard\content_management\DashboardPromoController@create');
Route::post('/dashboard/promo/create', 'dashboard\content_management\DashboardPromoController@post_create');
Route::get('/dashboard/promo/delete', 'dashboard\content_management\DashboardPromoController@delete');

//dashboard/faqPage
Route::get('/dashboard/faq', 'dashboard\content_management\DashboardFaqController@index');
Route::post('/dashboard/faq', 'dashboard\content_management\DashboardFaqController@post');
Route::get('/dashboard/faq/create', 'dashboard\content_management\DashboardFaqController@create');
Route::post('/dashboard/faq/create', 'dashboard\content_management\DashboardFaqController@post_create');
Route::get('/dashboard/faq/delete', 'dashboard\content_management\DashboardFaqController@delete');


//T R A N S A C T I O N
//dashboard/order_pendingPage
Route::get('/dashboard/order_pending', 'dashboard\transaction\DashboardOrderPendingController@index');
Route::post('/dashboard/order_pending', 'dashboard\transaction\DashboardOrderPendingController@post');
Route::get('/dashboard/order_pending/create', 'dashboard\transaction\DashboardOrderPendingController@create');
Route::post('/dashboard/order_pending/create', 'dashboard\transaction\DashboardOrderPendingController@post_create');
Route::get('/dashboard/order_pending/delete', 'dashboard\transaction\DashboardOrderPendingController@delete');

//dashboard/order_inPage
Route::get('/dashboard/order_in', 'dashboard\transaction\DashboardOrderInController@index');
Route::post('/dashboard/order_in', 'dashboard\transaction\DashboardOrderInController@post');
Route::get('/dashboard/order_in/create', 'dashboard\transaction\DashboardOrderInController@create');
Route::post('/dashboard/order_in/create', 'dashboard\transaction\DashboardOrderInController@post_create');
Route::get('/dashboard/order_in/delete', 'dashboard\transaction\DashboardOrderInController@delete');

//dashboard/order_progressPage
Route::get('/dashboard/order_progress', 'dashboard\transaction\DashboardOrderProgressController@index');
Route::post('/dashboard/order_progress', 'dashboard\transaction\DashboardOrderProgressController@post');
Route::get('/dashboard/order_progress/create', 'dashboard\transaction\DashboardOrderProgressController@create');
Route::post('/dashboard/order_progress/create', 'dashboard\transaction\DashboardOrderProgressController@post_create');
Route::get('/dashboard/order_progress/delete', 'dashboard\transaction\DashboardOrderProgressController@delete');

//dashboard/order_progressPage
Route::get('/dashboard/order_success', 'dashboard\transaction\DashboardOrderSuccessController@index');
Route::post('/dashboard/order_success', 'dashboard\transaction\DashboardOrderSuccessController@post');
Route::get('/dashboard/order_success/create', 'dashboard\transaction\DashboardOrderSuccessController@create');
Route::post('/dashboard/order_success/create', 'dashboard\transaction\DashboardOrderSuccessController@post_create');
Route::get('/dashboard/order_success/delete', 'dashboard\transaction\DashboardOrderSuccessController@delete');

Route::group(['prefix' => 'social-media', 'namespace' => 'Auth'], function(){
    Route::get('register/{provider}', 'SocialiteController@register');
    Route::get('registered/{provider}', 'SocialiteController@registered');
});

Auth::routes();
