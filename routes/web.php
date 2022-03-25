<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\mobile\user\UserAccController;
use App\Http\Controllers\mobile\user\WalletController;
use App\Http\Controllers\mobile\user\HelpCenterController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\mobile\common\OrderController;
use App\Http\Controllers\mobile\common\MainController;
use App\Http\Controllers\mobile\common\ShoppingController;
use App\Http\Controllers\mobile\common\ContentController;
use App\Http\Controllers\mobile\common\StoreController;
use App\Http\Controllers\mobile\common\VideoController;
use App\Http\Controllers\mobile\common\GroupController;
use App\Http\Controllers\mobile\common\CartController;
use App\Http\Controllers\mobile\user\OtpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('user/login', [UserAccController::class, 'login'])->name('login');
Route::get('user/register', [UserAccController::class, 'register'])->name('register');
Route::get('user/forgotPassword', [UserAccController::class, 'forgotPassword']);// ลืมรหัสผ่าน(Log in)

Route::get('user/myAccount', [UserAccController::class, 'myAccount']);// หน้าบัญชีของฉัน
Route::get('user/profile/setting', [UserAccController::class, 'profileSetting']);
Route::get('user/profilePage', [UserAccController::class, 'profilePage']);// หน้าโปรไฟล์
Route::get('user/nameChange', [UserAccController::class, 'nameChange']);// เปลี่ยนชื่อ
Route::get('user/phoneNumber', [UserAccController::class, 'phoneNumber']);// หน้าโชว์เบอร์
Route::get('user/newPhoneNumber', [UserAccController::class, 'newPhoneNumber']);// กรอกเบอร์ใหม่ รับ OTP
Route::get('user/OTP_PhoneNumber', [UserAccController::class, 'OTP_PhoneNumber']);// กรอกOTP
Route::get('user/changePassword', [UserAccController::class, 'changePassword']);// กรอกรหัสผ่านปัจจุบัน เพื่อเปลี่ยนรหัสผ่าน 
Route::get('user/newPassword', [UserAccController::class, 'newPassword']);// กรอกรหัสผ่านใหม่
Route::get('user/profile/forgotPassword', [UserAccController::class, 'Profile_ForgotPassword']);// ลืมรหัสผ่าน(Profile)
Route::get('user/changeEmail', [UserAccController::class, 'changeEmail']);// E-mail
Route::get('user/newEmail', [UserAccController::class, 'newEmail']);// กรอก E-mail ใหม่
Route::get('user/myAddress', [UserAccController::class, 'myAddress']);// โชว์ที่อยู่ของฉัน
Route::get('user/newAddress', [UserAccController::class, 'newAddress']);// โชว์ที่อยู่ของฉัน
Route::get('user/creditCard', [UserAccController::class, 'creditCard']);// รายการบัญชีธนาคาร/บัตรที่บันทึก
Route::get('user/addCreditCard', [UserAccController::class, 'addCreditCard']);// การเพิ่มบัตร

Route::get('user/notification', [UserAccController::class, 'notification']);// การแจ้งเตือน
Route::get('user/settingNotification', [UserAccController::class, 'settingNotification']);// ตั้งค่าการแจ้งเตือน

Route::get('user/privacySettings', [UserAccController::class, 'privacySettings']);// ตั้งค่าความเป็นส่วนตัว
Route::get('user/appAccess', [UserAccController::class, 'appAccess']);// การเข้าถึงของแอป


Route::get('user/myList', [UserAccController::class, 'myList']);// รายการของฉัน
Route::get('user/buyGoods', [UserAccController::class, 'buyGoods']);// ทำการสั่งซื้อ
Route::get('user/chooseAddress', [UserAccController::class, 'chooseAddress']);// เลือกที่อยู่
Route::get('user/paymentMethod', [UserAccController::class, 'paymentMethod']);// ช่องทางการชำระเงิน
Route::get('user/addCreditCard_2', [UserAccController::class, 'addCreditCard_2']);// การเพิ่มบัตร(คลิก จากหน้า ช่องทางการชำระเงิน)
Route::get('user/deliveryStatus', [UserAccController::class, 'deliveryStatus']);// สถานะการจัดส่ง
Route::get('user/orderDetails', [UserAccController::class, 'orderDetails']);// รายละเอียดคำสั่งซื้อ
Route::get('user/shoppingCart', [UserAccController::class, 'shoppingCart']);// ตะกร้าสินค้า
Route::get('user/score', [UserAccController::class, 'score']);// ให้คะแนน

Route::get('user/wallet', [WalletController::class, 'index']); 
Route::get('user/addMoney', [WalletController::class, 'addMoney']); //เติมเงิน
Route::get('user/bankAccount', [WalletController::class, 'bankAccount']); // บัญชีธนาคาร
Route::get('user/specifyNumber', [WalletController::class, 'specifyNumber']); // ระบุจำนวน
Route::get('user/Top_upWallet', [WalletController::class, 'Top_upWallet']); // Top-up wallet


Route::get('user/profileHelpCenter', [UserAccController::class, 'profileHelpCenter']);// ศูนย์ความช่วยเหลือ



Route::get('/', [MainController::class, 'index']); 
Route::get('logout', [LoginController::class, 'logout']); 



// content
Route::get('content/{id}', [ContentController::class, 'index']); 
Route::post('sendcomment', [ContentController::class, 'sendcomment']); 
Route::post('sendcommentreply', [ContentController::class, 'sendcommentreply']); 

Route::get('content/{id}', [ContentController::class, 'index']); 
Route::get('user/helpCenter', [HelpCenterController::class, 'index']); 




//store
Route::get('store', [StoreController::class, 'index']); 


//family
Route::get('group', [GroupController::class, 'index']); 


//cart
Route::get('cart', [CartController::class, 'index']); 



//video
Route::get('video', [videoController::class, 'index']); 



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




//shopping
Route::get('shopping/category/{id}',[ShoppingController::class,'category']);
Route::get('shopping/product/{id}',[ShoppingController::class,'product']);


//process register
Route::post('checkregister',[RegisterController::class,'create']);
Route::get('checkusername',[RegisterController::class,'checkusername']);
Route::get('checkmn',[RegisterController::class,'checkmn']);
Route::post('checklogin',[LoginController::class,'checklogin']);
Route::get('otp',[OtpController::class,'index']);
Route::post('create/otp',[OtpController::class,'create'])->name('Create_OTP');
Route::get('confirm/otp',[OtpController::class,'confirm'])->name('Confirm_OTP');
Route::post('check/otp',[OtpController::class,'check'])->name('Check_OTP');


//resetpass
Route::get('user/forgotChange',[ResetPasswordController::class,'forgotChange']);
Route::post('createreset',[ResetPasswordController::class,'createreset']);
Route::post('checkreset',[ResetPasswordController::class,'checkreset']);
Route::post('formresetpassword',[ResetPasswordController::class,'formresetpassword']);

//Home
Route::get('home', [HomeController::class, 'index']);


//order
Route::post('order', [OrderController::class, 'index']);


// Test UI 
Route::get('p',[TestUiController::class,'p']);
Route::get('test/ui',[TestUiController::class,'index']);

Route::get('test/ui/cm_podcast',[TestUiController::class,'cm_podcast']);
Route::get('test/ui/shopping',[TestUiController::class,'shoppingTest']);
Route::get('test/ui/shopping/2',[TestUiController::class,'shoppingTest_2'])->name('shopping_2');

Route::get('test/ui/profile',[TestUiController::class,'Profile']);


Route::get('test/pass',[TestUiController::class,'pass']);


Route::get('test/all',[TestUiController::class,'testAll']);
Route::get('test/goToView',[TestUiController::class,'goToView']);

