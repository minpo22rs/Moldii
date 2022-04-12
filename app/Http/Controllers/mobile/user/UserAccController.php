<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Tb_address;
use App\Models\Tb_order_detail;
use App\Models\Tb_order;

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
        $sql = Tb_order_detail::where('customer_id',Session::get('cid'))
            ->leftJoin('tb_products','tb_order_details.product_id','=','tb_products.product_id')
            ->leftJoin('tb_merchants','tb_order_details.store_id','=','tb_merchants.merchant_id')
            ->get();
        return view('mobile.member.userAccount.my_list.myList')->with(['sql'=>$sql]);

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
        return view('mobile.member.userAccount.my_list.paymentMethod');

    }
    public function addCreditCard_2(){// ช่องทางการชำระเงิน
        return view('mobile.member.userAccount.my_list.addCreditCard');

    }
    
    public function deliveryStatus(){// สถานะการจัดส่ง
        return view('mobile.member.userAccount.my_list.deliveryStatus');

    }
    
    
}
