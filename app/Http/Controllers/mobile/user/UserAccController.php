<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserAccController extends Controller
{
    //
    public function index()
    {
        return view('');
    }

    public function login()
    {
        // dd(DB::Table('tb_admins')->get());
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
        return view('mobile.member.forgotPassword.forgotPassword');
    }

    public function profile()// หน้าบัญชีของฉัน
    {
        return view('mobile.member.userAccount.profile');
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
    public function addCreditCard(){// รายการบัญชีธนาคาร/บัตรที่บันทึก
        return view('mobile.member.userAccount.credit_card.addCreditCard');

    }

    public function notification(){// ตั้งค่าการแจ้งเตือน
        return view('mobile.member.userAccount.notification');

    }
    public function privacySettings(){// ตั้งค่าความเป็นส่วนตัว
        return view('mobile.member.userAccount.privacySettings');

    }
    public function appAccess(){// การเข้าถึงของแอป
        return view('mobile.member.userAccount.appAccess');

    }
    
}
