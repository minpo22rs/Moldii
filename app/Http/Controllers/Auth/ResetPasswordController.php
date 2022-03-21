<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\Tb_otp_reset;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Carbon\Carbon;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function forgotChange ()
    {
        return view('mobile.member.forgotPassword.forgotChange');
    }



    public function createreset(Request $request)
    {

        $request->validate([
            'tel' => ['required',  'min:10'],
        ]);

        $chk = User::where('customer_phone',$request->tel)->first();
        if($chk == null){
            return back()->with(['success'=>'ไม่พบเบอร์โทรศัพท์นี้ กรุณากรอกใหม่']);
        }
        $post_tel = $request->tel;
        $phone = $post_tel; //'0900000001';
        $otp = rand(1000, 9999); //4 Digits

        // ส่วนการบันทึก OTP เข้า database
        Tb_otp_reset::create([
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

        return back()->with(['phone'=>$phone]);
    }


    public function checkreset(Request $request)
    {

        $tel = $request->tel;
        $otp = $request->otp;

        $request->validate([
            'tel' => ['required',  'min:10'],
            'otp' => ['required',  'min:4']

        ]);
        

        $tel_otp = Tb_otp_reset::where(['otp_code' => $otp,'tel'=>$tel])->first();
       
        if ($tel_otp != null) {


            $id =$tel_otp->otp_reset_id;
            Tb_otp_reset::where('otp_reset_id', $id)
                    ->update(['otp_verified' => Carbon::now()]);

            Session::put('verify',1);
            // return back()->with(['success'=>'กรุณากรอกรหัสผ่านที่ต้องการ','phone'=>$tel]);
            return redirect('user/forgotChange')->with(['success'=>'กรุณากรอกรหัสผ่านที่ต้องการ','phone'=>$tel]);
        } else {
            // User::where('customer_id',Session::get('u_id'))->increment('customer_count', 1);
            // if(){

            // }

            return back()->with(['success'=>'หมายเลข OTP ไม่ตรงกัน กรุณากรอกใหม่','phone'=>$tel]);
        }
    }

    public function formresetpassword(Request $request)
    {
        // dd($request->all());
        $pass  = Hash::make($request->password);
        User::where('customer_phone',$request->phone)->update(['customer_password'=> $pass]);
        return redirect('user/login')->with('error','เปลี่ยนรหัสผ่านสำเร็จแล้ว');

    }
}
