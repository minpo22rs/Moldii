<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Tb_address;
use App\Models\Tb_order_detail;
use App\Models\Tb_order;
use App\Models\Tb_credit;
use App\Models\Tb_review;
use App\Models\Tb_tranfer;
use App\Models\Tb_review_img;
use App\Models\User;

class UserAccController extends Controller
{
    //
    public function index()
    {
        return view('');
    }

    public function login()
    {
        // dd(Session::all());
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
        $sql = User::where('customer_id',Session::get('cid'))->first();
        return view('mobile.member.userAccount.myAccount')->with(['sql'=>$sql]);
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
        $addon = DB::Table('tb_customer_addresss')->where('address_status','=','on')->first();
        $addoff = DB::Table('tb_customer_addresss')->where('address_status','=','off')->get();
        $onp = DB::Table('provinces')->where('id',$addon->customer_province)->first();
        $ona = DB::Table('amphures')->where('id',$addon->customer_district)->first();
        $ont = DB::Table('districts')->where('id',$addon->customer_tumbon)->first();

        return view('mobile.member.userAccount.address.myAddress')->with(['addon'=>$addon,'addoff'=>$addoff,'onp'=>$onp,'ona'=>$ona,'ont'=>$ont]);

    }
    public function newAddress(){// เพิ่มที่อยู่ใหม่
        $p = DB::Table('provinces')->get();
        
        return view('mobile.member.userAccount.address.newAddress')->with(['p'=>$p]);

    }

    public function changevalueaddress($id){// เพิ่มที่อยู่ใหม่
        $p = DB::Table('tb_customer_addresss')->where('customer_id',Session::get('cid'))->update(['address_status'=>'off']);
        $p = DB::Table('tb_customer_addresss')->where('id_customer_address',$id)->update(['address_status'=>'on']);
        
        return redirect('user/myAddress');

    }

    public function getAmphure(Request $request){

        $amphures = DB::table('amphures')
            ->where('province_id',$request->v)
            ->get();
        $html = '<option value="">เลือกเขต/อำเภอ</option>';
            foreach($amphures as $_amphures => $item){
                $html .=  '<option value="'.$item->id.'">'.$item->name_th.'</option>';
            }
        echo $html;
    }

    public function getSubDistrict(Request $request){

        $districts = DB::table('districts')
            ->where('amphure_id',$request->v)
            ->get();
        
        $html = '<option value="">เลือกแขวง/ตำบล</option>';
        foreach($districts as $_districts => $item){
            $html .=  '<option value="'.$item->id.'">'.$item->name_th.'</option>';
        }
        echo $html;
    
    }

    public function getZipcode(Request $request){

        $districts = DB::table('districts')
            ->where('id',$request->v)
            ->first();
        // dd($districts );
           
        return $districts->zip_code;
    }


    public function addnewaddress(Request $request){
        // dd($request->all());
        $a = new Tb_address();
        $a->customer_id  =  Session::get('cid');
        $a->customer_name  =  $request->name;
        $a->customer_phone  =  $request->phone;
        $a->customer_address  =  $request->address_details;
        $a->customer_tumbon  =  $request->tumbon;
        $a->customer_district  =  $request->district;
        $a->customer_province  =  $request->province;
        $a->customer_postcode  =  $request->zip_code;
        if(isset($request->chk)){
            $a->address_status  =  $request->chk;

        }
        $a->save();
        return redirect('user/myAddress');
    }
    


    public function creditCard(){// รายการบัญชีธนาคาร/บัตรที่บันทึก
        $on = Tb_credit::where('customer_id',Session::get('cid'))->get();
        return view('mobile.member.userAccount.credit_card.creditCard')->with(['on'=>$on]);

    }
    public function addCreditCard(){// การเพิ่มบัตร
        return view('mobile.member.userAccount.credit_card.addCreditCard');

    }

    public function deleteCredit($id){// การลบบัตร
        // dd($id);
        Tb_credit::where('id_customer_credits', $id)->delete();

        return redirect('user/creditCard')->with('msg','ลบบัตรเรียบร้อยแล้ว');
    }


    public function saveCreditCardonProfile(Request $request){// การบันทึกบัตร
        // dd($request->all());
        $secret_key = "7kHnSDgAH1LBTG1lfKy5tceYsYxhJwW1";
        $public = "yuyCcvpmILceiYhLsDUPDhvCyJOuyWem:";
        $base64 = base64_encode($public);
        $b = "Basic ";
        $headerskey = $b.$base64;

        $data = array(
            'rememberCard' => true,
            'card' => array(
                "number"=> str_replace(' ', '', $request->no),
                "expirationMonth"=> $request->expirem,
                "expirationYear"=> $request->expirey,
                "securityCode"=> $request->ccv,
                "name"=> $request->name
        ));

        $headers = array(
            "Authorization:" . $headerskey,
            'Content-Type: application/json',
        );
       

        $payload = json_encode($data);
        $ch = curl_init('https://api.globalprimepay.com/v2/tokens');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        $result = curl_exec($ch);

        curl_close($ch);

        $chargeResp = json_decode($result, true);

        // dd($chargeResp['card']['cardType']);
        if($chargeResp['resultCode'] == "00"){
            $a = new Tb_credit();
            $a->customer_id  =  Session::get('cid');
            $a->typecard  =  $chargeResp['card']['cardType'];
            $a->token  = $chargeResp['card']['token'];
            $a->num  = substr($chargeResp['card']['number'],-4,4);
            if(isset($request->nickname)){
                $a->nickname  =  $request->nickname;
    
            }
            if(isset($request->status)){
                Tb_credit::where('customer_id', Session::get('cid'))->update(['status_credit'=>'off']);

                $a->status_credit  =  $request->status;
                
            }
            $a->save();
        }else{
            return redirect('user/creditCard')->with('msg','ไม่สามารถบันทึกได้ กรุณากรอกข้อมูลใหม่อีกครั้ง');
            
        }

        return redirect('user/creditCard')->with('msg','บันทึกบัตรเรียบร้อยแล้ว');

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
    
    public function confirmreceive($id){
        // dd($id);
        Tb_order_detail::where('id_order_detail',$id)->update(['status_detail'=>1]);
        return redirect('user/myList')->with('msg','ยืนยันสินค้าเรียบร้อยแล้ว');
    }
    
    
    public function myList(){// รายการของฉัน
        $sql = Tb_order_detail::where('tb_order_details.customer_id',Session::get('cid'))->where('status_order','!=',4)
            ->leftJoin('tb_orders','tb_order_details.order_id','=','tb_orders.id_order')
            ->leftJoin('tb_products','tb_order_details.product_id','=','tb_products.product_id')
            ->leftJoin('tb_merchants','tb_order_details.store_id','=','tb_merchants.merchant_id')
            ->latest('tb_order_details.created_at')
            ->select('tb_order_details.*','tb_products.product_img','tb_merchants.merchant_name','tb_orders.status_order','tb_orders.order_code')
            ->get();
            // dd($sql );
        return view('mobile.member.userAccount.my_list.myList')->with(['sql'=>$sql]);

    }
    public function orderDetails(){// รายละเอียดคำสั่งซื้อ
        return view('mobile.member.userAccount.my_list.orderDetails');

    }
    public function score($id){// ให้คะแนน
        // dd($id);
        $sql = Tb_order_detail::where('id_order_detail',$id)
            ->leftJoin('tb_products','tb_order_details.product_id','=','tb_products.product_id')
            ->leftJoin('tb_merchants','tb_order_details.store_id','=','tb_merchants.merchant_id')
            ->latest('tb_order_details.created_at')
            ->select('tb_order_details.*','tb_products.product_img','tb_merchants.merchant_name')
            ->first();

        return view('mobile.member.userAccount.my_list.score')->with(['sql'=>$sql]);

    }

    public function sendscore(Request $request){
        // dd($request->all());
        $re = new Tb_review();
        $re->product_id = $request->pid;
        $re->order_detail_id = $request->id;
        if(isset($request->text)){
            $re->text = $request->text;

        }
        $re->score = $request->star;
        $re->customer_id = Session::get('cid');
        $re->save();

        Tb_order_detail::where('id_order_detail',$request->id)->update(['status_detail'=>7]);

           
        foreach($request->file('imgs') as $key => $item) {
            if($item != 'null' || $item != null){
                $name = rand().time().'.'.$item->getClientOriginalExtension();
                $item->storeAs('public/review_img',  $name);
                $img = new Tb_review_img();
                $img->id_tb_review  = $re->id;
                $img->name  = $name;
                
                $img->save();
            }
            
        }
        
        return redirect('user/myList')->with('msg','รีวิวสินค้าเรียบร้อยแล้ว');

    }

    public function shoppingCart(){// ตะกร้าสินค้า
        return view('mobile.member.userAccount.my_list.shoppingCart');

    }
    public function buyGoods(){// ทำการสั่งซื้อ
        return view('mobile.member.userAccount.my_list.buyGoods');

    }
    public function chooseAddress(){// เลือกที่อยู่
        $addon = DB::Table('tb_customer_addresss')->where('address_status','=','on')->first();
        $addoff = DB::Table('tb_customer_addresss')->where('address_status','=','off')->get();
        $onp = DB::Table('provinces')->where('id',$addon->customer_province)->first();
        $ona = DB::Table('amphures')->where('id',$addon->customer_district)->first();
        $ont = DB::Table('districts')->where('id',$addon->customer_tumbon)->first();
        return view('mobile.member.userAccount.my_list.chooseAddress')->with(['addon'=>$addon,'addoff'=>$addoff,'onp'=>$onp,'ona'=>$ona,'ont'=>$ont]);

    }

    public function changevalueaddressoncart($id){// เพิ่มที่อยู่ใหม่
        $p = DB::Table('tb_customer_addresss')->where('customer_id',Session::get('cid'))->update(['address_status'=>'off']);
        $p = DB::Table('tb_customer_addresss')->where('id_customer_address',$id)->update(['address_status'=>'on']);
        
        return redirect('checkoutaddress');

    }
    public function paymentMethod(){// ช่องทางการชำระเงิน
        $on = DB::Table('tb_customer_credits')->where('customer_id',Session::get('cid'))->where('status_credit','=','on')->first();
        $off = DB::Table('tb_customer_credits')->where('customer_id',Session::get('cid'))->where('status_credit','=','off')->get();
        $user = User::where('customer_id',Session::get('cid'))->first();
        // $publicKey ='llhk';
        // $head =  base64_encode($s);
        return view('mobile.member.userAccount.my_list.paymentMethod')->with(['on'=>$on,'off'=>$off,'user'=>$user]);

    }

    public function saveCreditCardonCart(Request $request){// การบันทึกบัตรจากหน้าตระกร้า
        // dd( $request->all());
        $secret_key = "7kHnSDgAH1LBTG1lfKy5tceYsYxhJwW1";
        $public = "yuyCcvpmILceiYhLsDUPDhvCyJOuyWem:";
        $base64 = base64_encode($public);
        $b = "Basic ";
        $headerskey = $b.$base64;

        $data = array(
            'rememberCard' => true,
            'card' => array(
                "number"=> str_replace(' ', '', $request->no),
                "expirationMonth"=> $request->expirem,
                "expirationYear"=> $request->expirey,
                "securityCode"=> $request->ccv,
                "name"=> $request->name
        ));

        $headers = array(
            "Authorization:" . $headerskey,
            'Content-Type: application/json',
        );
       

        $payload = json_encode($data);
        $ch = curl_init('https://api.globalprimepay.com/v2/tokens');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        $result = curl_exec($ch);

        curl_close($ch);

        $chargeResp = json_decode($result, true);

        // dd($chargeResp['card']['cardType']);
        if($chargeResp['resultCode'] == "00"){
            $a = new Tb_credit();
            $a->customer_id  =  Session::get('cid');
            $a->typecard  =  $chargeResp['card']['cardType'];
            $a->token  = $chargeResp['card']['token'];
            $a->num  = substr($chargeResp['card']['number'],-4,4);
            if(isset($request->nickname)){
                $a->nickname  =  $request->nickname;
    
            }
            if(isset($request->status)){
                Tb_credit::where('customer_id', Session::get('cid'))->update(['status_credit'=>'off']);
                $a->status_credit  =  $request->status;
                
            }
            $a->save();
        }else{
            return redirect('user/paymentMethod')->with('msg','ไม่สามารถบันทึกได้ กรุณากรอกข้อมูลใหม่อีกครั้ง');
            
        }

        return redirect('user/paymentMethod')->with('msg','บันทึกบัตรเรียบร้อยแล้ว');

    }


    public function addCreditCard_2(){// ช่องทางการชำระเงิน
        return view('mobile.member.userAccount.my_list.addCreditCard');

    }
    
    public function deliveryStatus(){// สถานะการจัดส่ง
        return view('mobile.member.userAccount.my_list.deliveryStatus');

    }


    public function sendslip(Request $request){
        // dd($request->all());
        return view('mobile.member.common.notice_of_payment');
        
    }

    public function submitslip(Request $request){
        // dd($request->all());
        $tran  = new Tb_tranfer();
        $tran->id_order = $request->oid;
        $tran->customer_id	= Session::get('cid');
        $tran->name = $request->name;

        $name = rand().time().'.'.$request->file('img')->getClientOriginalExtension();
        $request->file('img')->storeAs('public/payment',$name);
        $tran->file = $name;
                

        $tran->save();

        return redirect('user/sendslip')->with('msg','แจ้งชำระเงินเรียบร้อยแล้ว กรุณารอการตรวจสอบหลักฐาน');
        
    }
    
    
}
