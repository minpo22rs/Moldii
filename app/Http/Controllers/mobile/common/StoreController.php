<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class StoreController extends Controller
{
    //
    public function index()
    {
      
        $s = DB::Table('tb_merchants')->get();
        $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
        $pro = DB::Table('tb_products')->get();
        $ban = DB::Table('tb_banners')->where('banner_type',2)->first();

        $n = DB::Table('tb_news')->where('customer_id',Session::get('cid'))->get();
        $id = $n->pluck('new_id');
        
        $noti = DB::Table('tb_notifications')->orderBy('created_at','DESC')->get();
        $ccomment = DB::Table('tb_comments')->whereIn('comment_object_id',$id)->where('reader','=','0')->orderBy('created_at','DESC')->get();
        return view('mobile.member.common.content.store')->with(['s'=>$s,'cat'=>$cat,'pro'=>$pro,'ban'=>$ban,'noti'=>$noti,'ccomment'=>$ccomment]);
    }
    
}
