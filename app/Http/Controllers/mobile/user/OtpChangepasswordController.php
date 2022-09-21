<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tb_otp_changepassword;
use App\Models\User;
use Carbon\Carbon;
use Session;

class OtpChangepasswordController extends Controller
{
    
    public function create()
    {
        $sql = User::where('customer_id',Session::get('cid'))->first();

        $post_tel = $sql->customer_phone;
        $phone = $post_tel; //'0900000001';
        $otp = rand(1000, 9999); //4 Digits

        // ส่วนการบันทึก OTP เข้า database
        Tb_otp_changepassword::create([
            'otp_code' => $otp,
            'tel' => $phone,
            'otp_ref' => hexdec(uniqid()),
            'otp_customer_id' => Session::get('cid'),

        ]);


        //ส่วนการส่ง OTP ไปที่มือถือ
        $username = 'apinya';
        $password = 'apinya';
        $password = md5($password);
        $sender = 'Maemod';
        $msisdn = $phone;
        $msg = 'รหัสยืนยันการเปลี่ยนรหัสผ่าน ' . $otp;


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

        return $results;
    }


    public function check($otp)
    {
        $sql = User::where('customer_id',Session::get('cid'))->first();

        $tel = $sql->customer_phone;
        $otp = $otp;

        date_default_timezone_set('Asia/Bangkok');
        
        $tel_otp = Tb_otp_changepassword::where(['otp_code' => $otp,'tel'=>$tel])->first();
       
        if ($tel_otp != null) {
            $id =$tel_otp->otp_id;
            Tb_otp_changepassword::where('otp_changepassword_id', $id)
                    ->update(['otp_verified' => Carbon::now()]);

            User::where('customer_id',Session::get('cid'))->update(['customer_phone'=>$tel,'customer_verified'=>1]);
            
            return 1;
        } else {
            
            return 0;
        }
    }
}
            
          
        


