<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class VideoController extends Controller
{
    //
    public function index()
    {

        // dd('asdasdasdasd');
        $v = DB::Table('tb_news')->where('new_type','V')->get();
        $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
       
        $n = DB::Table('tb_news')->where('customer_id',Session::get('cid'))->get();
        $id = $n->pluck('new_id');
        
        $noti = DB::Table('tb_notifications')->orderBy('created_at','DESC')->get();
        $ccomment = DB::Table('tb_comments')->whereIn('comment_object_id',$id)->where('reader','=','0')->orderBy('created_at','DESC')->get();
        // dd($cat);
        return view('mobile.member.common.content.video')->with(['v'=>$v,'cat'=>$cat,'noti'=>$noti,'ccomment'=>$ccomment]);
    }
    
}
