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
use App\Http\Controllers\mobile\common\AuctionController;
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

//////login with facebook and google
Route::get('login/{provider}', [LoginController::class, 'redirectToProvider'])->name('redirectToProvider');
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('handleProviderCallback');


Route::get('user/myAccount', [UserAccController::class, 'myAccount']);// หน้าบัญชีของฉัน
Route::get('user/profile/setting', [UserAccController::class, 'profileSetting']);
Route::get('user/imgProfileChange', [UserAccController::class, 'imgProfileChange']);
Route::post('user/imgProfileSave', [UserAccController::class, 'imgProfileSave']);
Route::get('user/birthdayChange', [UserAccController::class, 'birthdayChange']);
Route::post('user/birthdaySave', [UserAccController::class, 'birthdaySave']);
Route::get('user/sexChange', [UserAccController::class, 'sexChange']);
Route::post('user/sexSave', [UserAccController::class, 'sexSave']);
Route::get('user/rule', [UserAccController::class, 'rule']);
Route::get('user/policy', [UserAccController::class, 'policy']);
Route::get('user/profilePage', [UserAccController::class, 'profilePage']);// หน้าโปรไฟล์
Route::get('user/nameChange', [UserAccController::class, 'nameChange']);// เปลี่ยนชื่อ
Route::post('user/nameSave', [UserAccController::class, 'nameSave']);
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
Route::post('user/addnewaddress', [UserAccController::class, 'addnewaddress']);// โชว์ที่อยู่ของฉัน
Route::get('user/changevalueaddress/{id}', [UserAccController::class, 'changevalueaddress']);// โชว์ที่อยู่ของฉัน
Route::get('user/changevalueaddressoncart/{id}', [UserAccController::class, 'changevalueaddressoncart']);// โชว์ที่อยู่ของฉัน
Route::get('user/deleteAddress/{id}', [UserAccController::class, 'deleteAddress']);// โชว์ที่อยู่ของฉัน

Route::get('getAmphure',[UserAccController::class, 'getAmphure']);//
Route::get('getSubDistrict',[UserAccController::class, 'getSubDistrict']);//
Route::get('getZipcode',[UserAccController::class, 'getZipcode']);//


Route::get('user/creditCard', [UserAccController::class, 'creditCard']);// รายการบัญชีธนาคาร/บัตรที่บันทึก
Route::get('user/addCreditCard', [UserAccController::class, 'addCreditCard']);// การเพิ่มบัตร
Route::post('user/saveCreditCardonProfile', [UserAccController::class, 'saveCreditCardonProfile']);// การเพิ่มบัตร

Route::get('user/deleteCredit/{id}', [UserAccController::class, 'deleteCredit']);// รายการของฉัน

Route::get('user/notification', [UserAccController::class, 'notification']);// การแจ้งเตือน
Route::get('user/settingNotification', [UserAccController::class, 'settingNotification']);// ตั้งค่าการแจ้งเตือน

Route::get('user/privacySettings', [UserAccController::class, 'privacySettings']);// ตั้งค่าความเป็นส่วนตัว
Route::get('user/appAccess', [UserAccController::class, 'appAccess']);// การเข้าถึงของแอป

Route::get('user/sendslip', [UserAccController::class, 'sendslip']);// แจ้งชำระเงิน
Route::post('user/submitslip', [UserAccController::class, 'submitslip']);// แจ้งชำระเงิน

Route::get('user/mylike', [UserAccController::class, 'mylike']);// รายการบัญชีธนาคาร/บัตรที่บันทึก


Route::get('user/confirmreceive/{id}', [UserAccController::class, 'confirmreceive']);// รายการของฉัน
Route::get('user/myList', [UserAccController::class, 'myList']);// รายการของฉัน
Route::get('user/buyGoods', [UserAccController::class, 'buyGoods']);// ทำการสั่งซื้อ
Route::get('user/chooseAddress', [UserAccController::class, 'chooseAddress']);// เลือกที่อยู่
Route::get('user/paymentMethod', [UserAccController::class, 'paymentMethod']);// ช่องทางการชำระเงิน
Route::get('user/addCreditCard_2', [UserAccController::class, 'addCreditCard_2']);// การเพิ่มบัตร(คลิก จากหน้า ช่องทางการชำระเงิน)
Route::post('user/saveCreditCardonCart', [UserAccController::class, 'saveCreditCardonCart']);// การเพิ่มบัตร(คลิก จากหน้า ช่องทางการชำระเงิน)
Route::get('user/deliveryStatus', [UserAccController::class, 'deliveryStatus']);// สถานะการจัดส่ง
Route::get('user/orderDetails', [UserAccController::class, 'orderDetails']);// รายละเอียดคำสั่งซื้อ
Route::get('user/shoppingCart', [UserAccController::class, 'shoppingCart']);// ตะกร้าสินค้า
Route::get('user/score/{id}', [UserAccController::class, 'score']);// ให้คะแนน
Route::post('user/sendscore', [UserAccController::class, 'sendscore']);// ให้คะแนน

Route::get('user/wallet', [WalletController::class, 'index']); 
Route::get('user/selectpaymentWallet/{type}/{num}', [WalletController::class, 'selectpaymentWallet']); 
Route::get('user/addMoney', [WalletController::class, 'addMoney']); //เติมเงิน
Route::get('user/bankAccount', [WalletController::class, 'bankAccount']); // บัญชีธนาคาร
Route::get('user/specifyNumber', [WalletController::class, 'specifyNumber']); // ระบุจำนวน
Route::get('user/Top_upWallet', [WalletController::class, 'Top_upWallet']); // Top-up wallet
Route::post('user/paymentWallet', [WalletController::class, 'paymentWallet']); // Top-up wallet
Route::post('walletgateway/response/{id}', [WalletController::class, 'Top_upWallet']); // Top-up wallet
Route::get('user/convert', [WalletController::class, 'convert']); 
Route::post('user/submitconvert', [WalletController::class, 'submitconvert']); 
Route::get('submitdonate', [WalletController::class, 'submitdonate']); 
Route::get('user/donate', [WalletController::class, 'donate']); 
Route::post('user/submitdonateexchange', [WalletController::class, 'submitdonateexchange']); 



Route::get('user/profileHelpCenter', [UserAccController::class, 'profileHelpCenter']);// ศูนย์ความช่วยเหลือ
Route::get('user/agreement', [UserAccController::class, 'agreement']);// ศูนย์ความช่วยเหลือ



Route::get('/', [MainController::class, 'index']); 
Route::get('/index', [MainController::class, 'indexpage']); 
Route::get('/followwriter', [MainController::class, 'followwriter']); 
Route::get('/unfollowwriter', [MainController::class, 'unfollowwriter']); 
Route::get('/likecontent', [MainController::class, 'likecontent']); 
Route::get('/unlikecontent', [MainController::class, 'unlikecontent']); 
Route::get('/bookmarkadd', [MainController::class, 'bookmarkadd']); 
Route::get('/unbookmark', [MainController::class, 'unbookmark']); 
Route::get('logout', [LoginController::class, 'logout']); 
Route::get('/hidecontent', [ContentController::class, 'hidecontent']); 
Route::get('/deletecontent', [ContentController::class, 'deletecontent']); 
Route::get('/hidecontent', [ContentController::class, 'hidecontent']); 
Route::get('/contentreport/{id}', [ContentController::class, 'contentreport']); 


Route::post('user/search', [ContentController::class, 'search']); 
Route::get('user/searcha/{id}/{text}', [ContentController::class, 'searcha']); 




// content
Route::post('userpostcontent', [ContentController::class, 'userpostcontent']); 


Route::get('content/{id}', [ContentController::class, 'index']); 
Route::post('sendcomment', [ContentController::class, 'sendcomment']); 
Route::post('sendcommentreply', [ContentController::class, 'sendcommentreply']); 

Route::get('user/helpCenter', [HelpCenterController::class, 'index']); 




//store
Route::get('store', [StoreController::class, 'index']); 


//group
Route::get('group', [GroupController::class, 'index']); 
Route::get('groupid/{id}', [GroupController::class, 'groupid']); 
Route::get('requestjoingroup/{type}/{id}', [GroupController::class, 'requestjoingroup']); 


//cart
Route::post('cart', [CartController::class, 'addcart']); 
Route::get('cartindex', [CartController::class, 'index']); 
Route::get('calcartstore', [CartController::class, 'calcartstore']); 
Route::get('calcartid', [CartController::class, 'calcartid']); 
Route::get('calcartall', [CartController::class, 'calcartall']); 
Route::match(['GET', 'POST'],'checkoutaddress', [CartController::class, 'checkoutaddress']); 
Route::get('delcartid', [CartController::class, 'delcartid']); 
Route::get('countdown', [CartController::class, 'countdown']); 
Route::get('countup', [CartController::class, 'countup']); 
Route::get('coinswitch', [CartController::class, 'coinswitch']); 
Route::get('coinswitch2', [CartController::class, 'coinswitch2']); 



//video
Route::get('video', [videoController::class, 'index']); 


Route::get('/boss', function() {
	Artisan::call('storage:link');

	return "boss!";
});


Route::get('/policy', function() {
	

	return view('policy');
});


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


//auction
Route::get('auction',[AuctionController::class,'index']);
Route::get('auction/detail/{aid}',[AuctionController::class,'detail']);
Route::post('addauction',[AuctionController::class,'addauction']);
Route::get('checkauction', [AuctionController::class,'checkauction']);




//shopping
Route::get('shopping/category/{id}',[ShoppingController::class,'category']);
Route::get('shopping/category/latest/{id}',[ShoppingController::class,'latest']);
Route::get('shopping/category/bestseller/{id}',[ShoppingController::class,'bestseller']);
Route::get('shopping/product/{id}',[ShoppingController::class,'product']);
Route::get('shopping/merchant/{id}',[ShoppingController::class,'merchant']);
Route::get('/likeproduct', [ShoppingController::class, 'likeproduct']); 
Route::get('/unlikeproduct', [ShoppingController::class, 'unlikeproduct']); 


//process register
Route::post('checkregister',[RegisterController::class,'create']);
Route::get('checkusername',[RegisterController::class,'checkusername']);
Route::get('checkmn',[RegisterController::class,'checkmn']);
Route::post('checklogin',[LoginController::class,'checklogin']);
Route::get('otp',[OtpController::class,'index']);
Route::post('create/otp',[OtpController::class,'create'])->name('Create_OTP');
Route::get('confirm/otp',[OtpController::class,'confirm'])->name('Confirm_OTP');
Route::post('check/otp',[OtpController::class,'check'])->name('Check_OTP');
Route::get('tag',[RegisterController::class,'tag']);
Route::post('selecttag',[RegisterController::class,'selecttag']);


//resetpass
Route::get('user/forgotChange',[ResetPasswordController::class,'forgotChange']);
Route::post('createreset',[ResetPasswordController::class,'createreset']);
Route::post('checkreset',[ResetPasswordController::class,'checkreset']);
Route::post('formresetpassword',[ResetPasswordController::class,'formresetpassword']);

//Home
Route::get('home', [HomeController::class, 'index']);


//order
Route::get('ordertoship/{id}', [OrderController::class, 'ordertoship']);
Route::match(['GET', 'POST'],'addorder', [OrderController::class, 'addorder']);
Route::get('bankcode', [OrderController::class, 'bankcode']);
Route::get('choosecode/{ship}', [OrderController::class, 'choosecode']);
Route::get('selectcode/{id}/{ship}', [OrderController::class, 'selectcode']);
Route::get('selectpaymentmethod/{type}/{name}', [OrderController::class, 'selectpaymentmethod']);

Route::post('gateway/response/{id}/{rid}', [OrderController::class, 'addorder']);
Route::post('paymentgateway', [OrderController::class, 'paymentgateway']);


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

Route::get('/testbox', [TestUiController::class, 'testbox']); 
