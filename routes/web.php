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
    Route::get('getAmphure','MerchantController@getAmphure');//
    Route::get('getSubDistrict','MerchantController@getSubDistrict');//
    Route::get('getZipcode','MerchantController@getZipcode');//

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
    Route::get('tranfer', 'OrderController@tranfer');
    Route::get('confirmslip/{id}', 'OrderController@confirmslip');
    Route::post('rejectslip', 'OrderController@rejectslip');
    Route::get('orderdetail/{id}', 'OrderController@orderdetail');

    Route::resource('familys', 'FamilyController');
    Route::post('addgroup', 'FamilyController@store');
    Route::post('publishedgroup/{id}', 'FamilyController@publishedgroup');


    // auction
    Route::get('auction', 'AuctionController@index');
    Route::post('addauction', 'AuctionController@store');
    Route::get('editauction/{id}', 'AuctionController@edit');
    Route::post('updateauction', 'AuctionController@update');
    Route::get('detailauction/{id}/{t}', 'AuctionController@detailauction');


    //requeststore
    Route::get('requeststore', 'StoreController@requeststore');
    Route::get('store_detail/{id}', 'StoreController@store_detail');
    Route::post('statusstore', 'StoreController@statusstore');


    //requeststore
    Route::get('shutdownaccount', 'CustomerController@shutdownaccount');
    Route::post('rejectshutdown', 'CustomerController@rejectshutdown');
    Route::get('confirmshutdown/{id}', 'CustomerController@confirmshutdown');



});

Route::group(['namespace' => 'merchant', 'prefix' => 'merchant', 'as' => 'merchant.', 'middleware' => 'merchant'], function () {
    //merchant
    Route::get('index', 'DashboardController@index')->name('merchantindex');
    Route::get('profile', 'MerchantController@index');
    Route::post('updateprofile', 'MerchantController@updateprofile');
    Route::get('getAmphure','MerchantController@getAmphure');//
    Route::get('getSubDistrict','MerchantController@getSubDistrict');//
    Route::get('getZipcode','MerchantController@getZipcode');//

    // event
    Route::resource('event', 'EventController');
    Route::post('eventdecline/{id}', 'EventController@eventdecline');
    Route::post('event_selectproduct/{id}', 'EventController@event_selectproduct');
    Route::get('selectphase/{id}', 'EventController@selectphase');

    // calendar
    Route::resource('calendar', 'CalendarController');

    // product
    Route::resource('product', 'ProductController');
    // Route::get('view_comment/{id}/{type}', 'CommentController@view_comment');

    // order
    Route::resource('ordermerchant', 'OrderMerchantController');
    Route::get('orderdetail/{id}', 'OrderMerchantController@orderdetail');
    Route::get('cancelorder/{id}', 'OrderMerchantController@cancelorder');
    Route::post('createbooking', 'OrderMerchantController@createbooking');

    // auction
    Route::get('auction', 'MerchantAuctionController@index');
    Route::post('addauction', 'MerchantAuctionController@store');
    Route::get('editauction/{id}', 'MerchantAuctionController@edit');
    Route::get('detailauction/{id}', 'MerchantAuctionController@detailauction');
    Route::post('updateauction', 'MerchantAuctionController@update');
    
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