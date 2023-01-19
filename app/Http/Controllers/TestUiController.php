<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Models\Tb_order_detail;
use App\Models\Tb_order;
use App\Models\tb_chats;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TestUiController extends Controller
{
    public function index(){
        return view('mobile.common.main.index');
    }

    public function p(){

        // $c = DB::Table('tb_news')->where('new_type','C')->orWhere('new_type','U')->where('new_published',1)
        //         ->leftJoin('tb_customers','tb_news.customer_id','=','tb_customers.customer_id')
        //         ->select('tb_news.*','tb_customers.customer_username')
        //         ->latest('tb_news.created_at','DESC')->get();
        // $v = DB::Table('tb_news')->where('new_type','V')->get();
        // $p = DB::Table('tb_news')->where('new_type','P')->get();
        // $s = DB::Table('tb_merchants')->get();
        // $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
        // $pro = DB::Table('tb_products')->get();
        // $group = DB::Table('tb_familys')->get();
        // $ban = DB::Table('tb_banners')->where('banner_type',1)->first();
        // $cat = DB::Table('tb_category')->where('deleted_at','!=',null)->limit('6')->get();
        // $cp = DB::Table('tb_user_contents')->orderBy('created_at','DESC')->get();
        // $u = DB::Table('tb_customers')->where('customer_id',Session::get('cid'))->first();
        // $result = $cp->merge($c);
        // dd(Session::get('cid'));
        // return view('policy');
        // return view('mobile.member.register.tag');
        // return redirect('ordertoship/7');
        // return view('mobile.member.index')->with(['c'=>$c,'v'=>$v,'p'=>$p,'s'=>$s,'cat'=>$cat,'pro'=>$pro,'group'=>$group,'ban'=>$ban,'cat'=>$cat,'cp'=> $cp,'u'=>$u]);
        return view('mobile.member.common.content.shopping.chat');


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




    //********Chat
    // public function chat_user($id){

    //     $user = User::where('customer_id',$id)->first();

    //     return view('mobile.member.common.content.shopping.chat', compact('user'));
    // }


    // public function sendMessage(Request $request){


    //     $row = array();
    //     $row["text"] = $request->text;
    //     $row["customer_id"] = $request->customer_id;
    //     $row["store_id"] = $request->store_id;
    //     $row["from"] = 'F';
    //     DB::table('tb_chats')->insert($row);


    //     $html = '';

    //     $cid = tb_chats::where('customer_id', $request->customer_id)->where('store_id',$request->store_id )->get();

    //     foreach($cid as $msg){
    //         if($msg->from == 'F'){
    //             $html .= '<li class="container darker"> <p class="m-0">'.$msg->text.'</p> </li> ';

    //        }else{
    //            $html .= '<li class="container "> <p class="m-0">'.$msg->text.'</p> </li> ';

    //        }


    //     }


    //     $data = [
    //      'cid'=>$cid,
    //      'html'=>$html
    //     ];


    //     return json_encode($data);

    // }

    // public function to_chat($id){

    //     $merchant = DB::Table('tb_merchants')->where('merchant_id',$id)->first();
    //     $user_id = Session::get('cid');

    //     $cid = tb_chats::where('customer_id', $user_id)->where('store_id', $id)->get();


    //     return view('mobile.member.common.content.shopping.chat', compact('cid','merchant'));
    // }

    // public function fetchMessage(Request $request){
    //     $cid= tb_chats::where('tb_chats.customer_id', $request->customer_id)->where('store_id', $request->store_id)->get();
    //     $html = '';

    //     foreach($cid as $msg){
    //         if($msg->from == 'F'){
    //              $html .= '<li class="container darker "> <p class="m-0">'.$msg->text.'</p> </li> ';

    //         }elseif($msg->from == 'B'){
    //             $html .= '<li class="container "> <p class="m-0">'.$msg->text.'</p> </li> ';

    //         }

    //     }
    //     // dd($user);
    //     $data = [
    //         'cid'=>$cid,
    //         'html'=>$html
    //        ];

    //     return json_encode($data);
    // }
    //********Chat











}
