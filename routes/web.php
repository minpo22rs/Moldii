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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::post('loginUser', 'Auth\LoginController@login')->name('loginUser');

Route::middleware(['auth'])->group(function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

        Route::get('index', 'DashboardController@index')->name('adminindex');

        //home setting
        Route::get('banner', 'HomeSettingController@banner');
        Route::post('addbanner', 'HomeSettingController@addbanner');
        Route::delete('delete_banner/{id}', 'HomeSettingController@deletebanner');
        Route::get('editbanner/{id}', 'HomeSettingController@editbanner');
        Route::put('updatebanner/{id}', 'HomeSettingController@updatebanner');
        Route::post('updatestatus/{id}', 'HomeSettingController@updatestatus');
        Route::resource('flashsale', 'FlashsaleController');
        Route::get('searchproduct', 'FlashsaleController@searchproduct');
        Route::resource('promotion', 'PromotionController');
        Route::resource('news', 'NewsController');
        Route::post('published/{id}', 'NewsController@published');
        Route::put('updatenews', 'NewsController@updatenews');
        Route::resource('bestseller', 'BestSellerController');
        Route::post('updatebestseller/{id}', 'BestSellerController@updatebestseller');
        Route::get('view_comment/{id}/{type}', 'CommentController@view_comment');
        Route::resource('videos', 'VideoController');
        Route::resource('podcasts', 'PodcastController');

        //product
        Route::resource('category', 'CategoryController');
        Route::resource('product', 'ProductController');
        Route::post('deleteoldtags/{id}', 'ProductController@deleteoldtags');

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
    });
});

Route::group(['namespace' => 'Merchant', 'prefix' => 'merchant', 'as' => 'merchant.'], function () {
    //merchant
    Route::get('index', 'DashboardController@index')->name('merchantindex');
    Route::get('profile', 'MerchantController@index');

    // event
    Route::resource('event', 'EventController');
    Route::post('eventdecline/{id}', 'EventController@eventdecline');

    // product
    Route::resource('product', 'ProductController');
    Route::get('view_comment/{id}/{type}', 'CommentController@view_comment');
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