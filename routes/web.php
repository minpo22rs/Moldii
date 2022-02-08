<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\mobile\user\UserAccController;
use App\Http\Controllers\mobile\user\WalletController;
use App\Http\Controllers\mobile\user\HelpCenterController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\mobile\common\MainController;
use App\Http\Controllers\mobile\user\OtpController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\TestUiController;

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

Route::get('user/login', [UserAccController::class, 'login']);
Route::get('user/register', [UserAccController::class, 'register']);
Route::get('user/forgotPassword', [UserAccController::class, 'forgotPassword']);
Route::get('user/profile', [UserAccController::class, 'profile']);
Route::get('user/profile/setting', [UserAccController::class, 'profileSetting']);

Route::get('user/profilePage', [UserAccController::class, 'profilePage']);
Route::get('user/profileHelpCenter', [UserAccController::class, 'profileHelpCenter']);

Route::get('user/index', [MainController::class, 'index']); 

Route::get('user/wallet', [WalletController::class, 'index']); 

Route::get('user/helpCenter', [HelpCenterController::class, 'index']); 

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
Route::post('checkregister',[RegisterController::class,'create']);
Route::post('checklogin',[LoginController::class,'checklogin']);



Route::get('otp',[OtpController::class,'index']);
Route::post('create/otp',[OtpController::class,'create'])->name('Create_OTP');
Route::get('confirm/otp',[OtpController::class,'confirm'])->name('Confirm_OTP');
Route::post('check/otp',[OtpController::class,'check'])->name('Check_OTP');

//Home
Route::get('home', [HomeController::class, 'index']);

// Test UI 
Route::get('test/ui',[TestUiController::class,'index']);

Route::get('test/ui/cm_podcast',[TestUiController::class,'cm_podcast']);
Route::get('test/ui/shopping',[TestUiController::class,'shoppingTest']);
Route::get('test/ui/shopping/2',[TestUiController::class,'shoppingTest_2'])->name('shopping_2');

Route::get('test/ui/profile',[TestUiController::class,'Profile']);


Route::get('test/all',[TestUiController::class,'testAll']);
Route::get('test/goToView',[TestUiController::class,'goToView']);

