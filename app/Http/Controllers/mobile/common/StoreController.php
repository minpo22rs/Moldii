<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Merchant;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    //หน้าร้านค้าขายของ
    public function index()
    {
      
        $s = DB::Table('tb_merchants')->get();
        $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
        $pro = DB::Table('tb_products')->where('product_published',1)->get();
        $ban = DB::Table('tb_banners')->where('banner_type',2)->first();

        $n = DB::Table('tb_news')->where('customer_id',Session::get('cid'))->get();
        $id = $n->pluck('new_id');
        
        $noti = DB::Table('tb_notifications')->orderBy('created_at','DESC')->get();
        $ccomment = DB::Table('tb_comments')->whereIn('comment_object_id',$id)->where('reader','=','0')->orderBy('created_at','DESC')->get();
        return view('mobile.member.common.content.store')->with(['s'=>$s,'cat'=>$cat,'pro'=>$pro,'ban'=>$ban,'noti'=>$noti,'ccomment'=>$ccomment]);
    }

    //สมัครร้านค้า
    public function store(){
        $p = DB::Table('provinces')->get();

        return view('mobile.member.userAccount.store')->with('p',$p);

    }

    public function submitstore(Request $request){
        // dd($request->all());
        $number = str_replace("-", "", $request->phone);
        $merchant = new Merchant();
        $merchant->merchant_shopname        = $request->shopname;
        $merchant->merchant_name            = $request->fname;
        $merchant->merchant_lname           = $request->lname;
        $merchant->merchant_email           = $request->email;
        $merchant->merchant_phone           = $number ;
        $merchant->merchant_type            = $request->type;
        $merchant->password                 = Hash::make($request->password);
        $merchant->merchant_address           = $request->address;
        $merchant->merchant_tumbon           = $request->tumbon;
        $merchant->merchant_district           = $request->district;
        $merchant->merchant_province           = $request->province;
        $merchant->merchant_postcode           = $request->zip_code;
        $merchant->merchant_nameacc           = $request->nameholder;
        $merchant->merchant_numberacc           = $request->numberacc;
        $merchant->customer_id                  = Session::get('cid');

        $name = rand().time().'.'.$request->imgss->getClientOriginalExtension();
        $request->imgss->storeAs('public/store',  $name);
        $merchant->merchant_img          = $name;
        
        $name = rand().time().'.'.$request->img->getClientOriginalExtension();
        $request->img->storeAs('public/store',  $name);
        $merchant->merchant_document          = $name;

        $name = rand().time().'.'.$request->imgs->getClientOriginalExtension();
        $request->imgs->storeAs('public/store',  $name);
        $merchant->merchant_acc_img          = $name;


        $merchant->save();



        return redirect('user/myAccount')->with('msg','บันทึกข้อมูลเรียบร้อยแล้ว');
    }



    public function checkmnstore(Request $request)
    {
        $number = str_replace("-", "", $request->mn);
        $chk = DB::table('tb_customers')->where('customer_phone',$number)->first();
        $chks = DB::table('tb_merchants')->where('merchant_phone',$number)->first();

        if($chk != null || $chks != null){
            return 1;
        }
    }

    public function checkemailstore(Request $request)
    {
        $chk = DB::table('tb_customers')->where('customer_email',$request->email)->first();
        $chks = DB::table('tb_merchants')->where('merchant_email',$request->email)->first();

        if($chk != null || $chks != null){
            return 1;
        }else{
            return 0;
        }
    }
    
}
