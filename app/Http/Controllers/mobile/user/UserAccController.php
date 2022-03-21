<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;


class UserAccController extends Controller
{
    //
    public function index()
    {
        return view('');
    }

    public function login()
    {
        // Session::flush();

        return view('mobile.member.login.login');
    }

    public function afterLogin()
    {
        return view('');
    }

    public function register()
    {
        // dd('saasdasd');
        return view('mobile.member.register.register');
    }

    public function afterRegister ()
    {
        return view('');
    }

    public function forgotPassword ()
    {   
        // Session::forget('phone');
        return view('mobile.member.forgotPassword.forgotPassword');
    }

    public function myAccount()// หน้าบัญชีของฉัน
    {
        return view('mobile.member.userAccount.myAccount');
    }

    public function profileSetting()
    {
        return view('mobile.member.userAccount.profileSetting');
    }
    public function profileHelpCenter(){
        return view('mobile.member.helpCenter.helpCenter');

    }



    public function profilePage(){// หน้าโปรไฟล์
        return view('mobile.member.userAccount.profilePage');

    }
    public function nameChange(){// เปลี่ยนชื่อ
        return view('mobile.member.userAccount.nameChange');

    }


    public function phoneNumber(){// หน้าโชว์เบอร์
        return view('mobile.member.userAccount.phone.showPhoneNumber');

    }
    public function newPhoneNumber(){// กรอกเบอร์ใหม่
        return view('mobile.member.userAccount.phone.newPhoneNumber');

    }
    public function OTP_PhoneNumber(){// กรอกOTP
        return view('mobile.member.userAccount.phone.OTP_PhoneNumber');

    }


    public function changePassword(){// กรอกรหัสผ่านปัจจุบัน เพื่อเปลี่ยนรหัสผ่าน 
        return view('mobile.member.userAccount.password.changePassword');

    }
    public function newPassword(){// กรอกรหัสผ่านใหม่
        return view('mobile.member.userAccount.password.newPassword');

    }
    public function Profile_ForgotPassword(){// ลืมรหัสผ่าน(Profile)
        return view('mobile.member.userAccount.password.forgotPassword');

    }


    public function changeEmail(){// E-mail
        return view('mobile.member.userAccount.email.changeEmail');

    }
    public function newEmail(){// กรอก E-mail ใหม่
        return view('mobile.member.userAccount.email.newEmail');

    }


    public function myAddress(){// โชว์ที่อยู่ของฉัน
        return view('mobile.member.userAccount.address.myAddress');

    }
    public function newAddress(){// เพิ่มที่อยู่ใหม่
        return view('mobile.member.userAccount.address.newAddress');

    }
    


    public function creditCard(){// รายการบัญชีธนาคาร/บัตรที่บันทึก
        return view('mobile.member.userAccount.credit_card.creditCard');

    }
    public function addCreditCard(){// การเพิ่มบัตร
        return view('mobile.member.userAccount.credit_card.addCreditCard');

    }

    public function notification(){// การแจ้งเตือน
        return view('mobile.member.userAccount.notification.notification');

    }
    public function settingNotification(){// ตั้งค่าการแจ้งเตือน
        return view('mobile.member.userAccount.notification.notificationSetting');

    }
    public function privacySettings(){// ตั้งค่าความเป็นส่วนตัว
        return view('mobile.member.userAccount.privacySettings');

    }
    public function appAccess(){// การเข้าถึงของแอป
        return view('mobile.member.userAccount.appAccess');

    }
    
    
    
    
    public function myList(){// รายการของฉัน
        return view('mobile.member.userAccount.my_list.myList');

    }
    public function orderDetails(){// รายละเอียดคำสั่งซื้อ
        return view('mobile.member.userAccount.my_list.orderDetails');

    }
    public function score(){// ให้คะแนน
        return view('mobile.member.userAccount.my_list.score');

    }
    public function shoppingCart(){// ตะกร้าสินค้า
        return view('mobile.member.userAccount.my_list.shoppingCart');

    }
    public function buyGoods(){// ทำการสั่งซื้อ
        return view('mobile.member.userAccount.my_list.buyGoods');

    }
    public function chooseAddress(){// เลือกที่อยู่
        return view('mobile.member.userAccount.my_list.chooseAddress');

    }
    public function paymentMethod(){// ช่องทางการชำระเงิน
        return view('mobile.member.userAccount.my_list.paymentMethod');

    }
    public function addCreditCard_2(){// ช่องทางการชำระเงิน
        return view('mobile.member.userAccount.my_list.addCreditCard');

    }
    
    public function deliveryStatus(){// สถานะการจัดส่ง
        return view('mobile.member.userAccount.my_list.deliveryStatus');

    }
    
    
}
