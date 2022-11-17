<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class NotificationController extends Controller
{
    //
    public function readnotification($id,$c)
    {
        // dd( $id);
       
        DB::Table('tb_comments')->where('comment_id',$id)->update(['reader'=>'1']);
        return redirect('content/'.$c.'');
    }


    public function notification(){// การแจ้งเตือน
        $n = DB::Table('tb_news')->where('customer_id',Session::get('cid'))->get();
        $id = $n->pluck('new_id');
        // dd($id);
        $sql = DB::Table('tb_notifications')->where('customer_id',null)->orderBy('created_at','DESC')->get();
        $comment = DB::Table('tb_comments')->whereIn('comment_object_id',$id)->orderBy('created_at','DESC')->get();
        $sqlid = DB::Table('tb_notifications')->where('customer_id',Session::get('cid'))->orderBy('created_at','DESC')->get();

        // dd( $comment);

        return view('mobile.member.userAccount.notification.notification')->with(['sql' => $sql ,'comment'=>$comment,'sqlid'=>$sqlid]);

    }
    
}
