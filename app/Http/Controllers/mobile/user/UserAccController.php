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

    public function profile()
    {
        return view('mobile.member.userAccount.profile');
    }

    public function profileSetting()
    {
        return view('mobile.member.userAccount.profileSetting');
    }
}
