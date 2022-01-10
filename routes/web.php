<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\mobile\user\UserAccController;
use App\Http\Controllers\mobile\user\WalletController;
use App\Http\Controllers\mobile\user\HelpCenterController;
use App\Http\Controllers\mobile\common\MainController;
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

Route::get('user/index', [MainController::class, 'index']); 

Route::get('user/wallet', [WalletController::class, 'index']); 

Route::get('user/helpCenter', [HelpCenterController::class, 'index']); 

