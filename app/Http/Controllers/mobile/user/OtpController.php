<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tb_otp;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function index()
    {
        return view('mobile.all.otp_request');
    }



    public function create(Request $request)
    {



        $request->validate([
            'tel' => ['required',  'min:10'],
        ]);

        $post_tel = $request->tel;
        $phone = $post_tel; //'0900000001';
        $otp = rand(1000, 9999); //4 Digits

        // ส่วนการบันทึก OTP เข้า database
        Tb_otp::create([
            'otp_code' => $otp,
            'tel' => $phone,
            'otp_ref' => hexdec(uniqid())


        ]);

        //ส่วนการส่ง OTP ไปที่มือถือ
        $username = 'apinya';
        $password = 'apinya';
        $password = md5($password);
        $sender = 'Maemod';
        $msisdn = $phone;
        $msg = 'รหัสยืนยันระบบสมาชิก ' . $otp;


        $url = "http://v2.arcinnovative.com/APIConnect.php";

        $msg = str_replace("%", "%25", $msg);
        $msg = str_replace("&", "%26", $msg);
        $msg = str_replace("+", "[2B]", $msg);

        $sender = str_replace("%", "%25", $sender);
        $sender = str_replace("&", "%26", $sender);
        $sender = str_replace("+", "[2B]", $sender);

        $Parameter = "";
        $Parameter .= "sender=$sender&";
        $Parameter .= "msisdn=$msisdn&";
        $Parameter .= "msg=$msg&";
        $Parameter .= "smstype=sms&";
        $Parameter .= "username=$username&";
        $Parameter .= "password=$password&";
        $Parameter .= "ntype=in&";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $Parameter);
        $status = curl_exec($ch);
        $err = curl_error($ch);
        if ($err) {
            $results = array('status' => 'fail', 'message' => "cURL Error #:" . $err);
        } else {
            $results = array('status' => 'success', 'message' => '');
        }
        curl_close($ch);

        return redirect()->route('Confirm_OTP')->with(['phone'=>$phone]);
    }







    public function confirm()
    {
        return view('mobile.all.otp_confirm');
    }

    public function check(Request $request)
    {
        $tel = $request->tel;
        $otp = $request->otp;

        $request->validate([
            'tel' => ['required',  'min:10'],
            'otp' => ['required',  'min:4']



            
        ]);
        
        $tel_otp = Tb_otp::where(['otp_code' => $otp,'tel'=>$tel])->first();
       
        if ($tel_otp != null) {
            $id =$tel_otp->otp_id;
            Tb_otp::where('otp_id', $id)
            ->update(['otp_verified' => Carbon::now()]);
            
            return redirect('user/register');
        } else {
            return redirect('confirm/otp')->with(['phone'=>$tel]);
        }
    }
}
            
          
        


