<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class GroupController extends Controller
{
    //
    public function index()
    {
        $c = DB::Table('tb_news')->where('family_id','!=',null)->get();
        $cat = DB::Table('tb_category')->where('deleted_at','=',null)->get();

        $group = DB::Table('tb_familys')->where('published',1)->get();
        // dd( $cat);
        return view('mobile.member.group.indexgroup')->with(['c'=>$c,'cat'=>$cat,'group'=>$group]);
    }

    public function groupid($id)
    {
        $c = DB::Table('tb_news')->where('family_id',$id)->get();
        $cat = DB::Table('tb_category')->where('deleted_at','=',null)->get();
        $cg = DB::Table('tb_customer_groups')->where('group_id',$id)
                ->leftJoin('tb_customers','tb_customer_groups.customer_id','=','tb_customers.customer_id')
                ->get();

        $group = DB::Table('tb_familys')->where('id',$id)->first();
        $chk = DB::Table('tb_customer_groups')->where('group_id',$id)->where('customer_id',Session::get('cid'))->first();
        $u = DB::Table('tb_customers')->where('customer_id',Session::get('cid'))->first();

        if($group->group_show ==2){
            return view('mobile.member.group.group_private')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg,'chk'=>$chk,'u'=>$u,'id'=>$id]);
            // $chk = DB::Table('tb_customer_groups')->where('group_id',$id)->where('customer_id',Session::get('cid'))->first();
            // if($chk != null && $chk->status_group =2 ){
            //     return view('mobile.member.group.group_public')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg]);

            // }else{
            //     return view('mobile.member.group.group_private')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg]);

            // }

        }else{
            return view('mobile.member.group.group_public')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg,'chk'=>$chk,'u'=>$u,'id'=>$id]);

        }

        // return view('mobile.member.group.indexgroup')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg]);
    }

    public function requestjoingroup($type,$id){
        if($type ==2){
            DB::Table('tb_customer_groups')->insert(['group_id'=>$id,'customer_id'=> Session::get('cid'),'status_group'=>1]);

        }else if($type ==1){
            DB::Table('tb_customer_groups')->insert(['group_id'=>$id,'customer_id'=> Session::get('cid'),'status_group'=>2]);

        }else{
            DB::Table('tb_customer_groups')->where('group_id',$id)->where('customer_id',Session::get('cid'))->delete();

        }


        return redirect('groupid/'.$id.'');
    }
    
}
