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
        return view('mobile.member.userAccount.phoneNumber');

    }
    public function newPhoneNumber(){// กรอกเบอร์ใหม่
        return view('mobile.member.userAccount.newPhoneNumber');

    }
    public function OTP_PhoneNumber(){// กรอกOTP
        return view('mobile.member.userAccount.OTP_PhoneNumber');

    }
    public function changePassword(){
        return view('mobile.member.userAccount.changePassword');

    }
    public function newPassword(){
        return view('mobile.member.userAccount.newPassword');

    }
    public function Profile_ForgotPassword(){
        return view('mobile.member.userAccount.forgotPassword');

    }
    public function changeEmail(){
        return view('mobile.member.userAccount.changeEmail');

    }
    public function newEmail(){
        return view('mobile.member.userAccount.newEmail');

    }
    
}
