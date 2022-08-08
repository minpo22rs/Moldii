<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Tb_order_detail;
use App\Models\Tb_order;
use App\Models\User;

use Illuminate\Http\Request;

class TestUiController extends Controller
{
    public function index(){
        return view('mobile.common.main.index');
    }

    public function p(){
        $sql = Tb_order_detail::where('tb_order_details.order_id',1)
           
            ->leftJoin('tb_products','tb_order_details.product_id','=','tb_products.product_id')
            ->leftJoin('tb_merchants','tb_order_details.store_id','=','tb_merchants.merchant_id')
            ->get();
        $order = Tb_order::where('id_order',1)->first();
        $cus = User::where('customer_id',$order->customer_id)->first();
        // return view('mobile.member.register.tag');
        return view('mobile.member.common.content.shopping.detail_order')->with(['sql'=> $sql,'order'=>$order,'cus'=>$cus]);

        
    }

    public function cm_podcast(){
        return view('mobile.member.common.content.podcast_comment');
    }


    public function shoppingTest(){
        return view('mobile.member.common.content.shopping.shopping_1');

    }
    public function shoppingTest_2(){
        return view('mobile.member.common.content.shopping.shopping_2');

    }
    public function Profile(){
        return view('mobile.member.userAccount.myAccount');
        
    }

    public function pass ()
    {
        return view('mobile.member.forgotPassword.forgotChange');
    }
  

    public function goToView(Request $request)
    {
        $request_all = $request->all();
        if (isset($request_all["view_target"]) && !empty($request_all["view_target"]))
        {
            return view($request_all["view_target"]);
        }
        else
            return "triggered";
    }

}
