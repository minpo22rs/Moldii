<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::post('loginUser', 'Auth\LoginController@login')->name('loginUser');

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'as' => 'Admin.', 'middleware' => 'admin'], function () {

    Route::get('index', 'DashboardController@index')->name('adminindex');

    //home setting
    Route::get('banner', 'HomeSettingController@banner');
    Route::post('addbanner', 'HomeSettingController@addbanner');
    Route::delete('delete_banner/{id}', 'HomeSettingController@deletebanner');
    Route::get('editbanner/{id}', 'HomeSettingController@editbanner');
    Route::put('updatebanner/{id}', 'HomeSettingController@updatebanner');
    Route::post('updatestatus/{id}', 'HomeSettingController@updatestatus');
    Route::resource('flashsale', 'FlashsaleController');
    Route::get('searchproduct/{id}', 'FlashsaleController@searchproduct');
    Route::resource('promotion', 'PromotionController');
    Route::resource('news', 'NewsController');
    Route::post('published/{id}', 'NewsController@published');
    Route::put('updatenews', 'NewsController@updatenews');
    Route::resource('bestseller', 'BestSellerController');
    Route::post('updatebestseller/{id}', 'BestSellerController@updatebestseller');
    Route::get('view_comment/{id}/{type}', 'CommentController@view_comment');
    Route::resource('videos', 'VideoController');
    Route::resource('podcasts', 'PodcastController');

    Route::post('ignore_mercahant/{id}', 'FlashsaleController@ignore_mercahant');

    //product
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::post('deleteoldtags/{id}', 'ProductController@deleteoldtags');
    Route::post('deleteoldoptions/{id}', 'ProductController@deleteoldoptions');

    //admin
    Route::resource('admin', 'AdminController');
    //customer
    Route::resource('customer', 'CustomerController');
    //merchant
    Route::resource('merchant', 'MerchantController');

    //notification
    Route::resource('notification', 'NotificationController');

    //notification
    Route::resource('voucher', 'VoucherController');

    // role setting
    Route::resource('rolesetting', 'RoleSettingController');

    // calendar
    Route::resource('calendar', 'CalendarController');

    // ticket
    Route::resource('ticket', 'TicketController');

    // order
    Route::resource('order', 'OrderController');

    Route::resource('familys', 'FamilyController');
    Route::post('addgroup', 'FamilyController@store');
    Route::post('publishedgroup/{id}', 'FamilyController@publishedgroup');


});

Route::group(['namespace' => 'merchant', 'prefix' => 'merchant', 'as' => 'merchant.', 'middleware' => 'merchant'], function () {
    //merchant
    Route::get('index', 'DashboardController@index')->name('merchantindex');
    Route::get('profile', 'MerchantController@index');

    // event
    Route::resource('event', 'EventController');
    Route::post('eventdecline/{id}', 'EventController@eventdecline');
    Route::post('event_selectproduct/{id}', 'EventController@event_selectproduct');
    Route::get('selectphase/{id}', 'EventController@selectphase');

    // calendar
    Route::resource('calendar', 'CalendarController');

    // product
    Route::resource('product', 'ProductController');
    Route::get('view_comment/{id}/{type}', 'CommentController@view_comment');

    // order
    Route::resource('ordermerchant', 'OrderMerchantController');
    Route::get('createbooking/{id}', 'OrderMerchantController@createbooking');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clc', function() {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');
    // Artisan::call('optimize');
    // Artisan::call('clear-compiled');
    // session()->forget('key');
	return "Cleared!";
});