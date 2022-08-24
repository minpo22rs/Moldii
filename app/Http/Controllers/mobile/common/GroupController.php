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
        $cat = DB::Table('tb_category')->where('deleted_at','=',null)->limit(6)->get();

        $group = DB::Table('tb_familys')->get();
        // dd( $cat);
        return view('mobile.member.group.indexgroup')->with(['c'=>$c,'cat'=>$cat,'group'=>$group]);
    }

    public function groupid($id)
    {
        $c = DB::Table('tb_news')->where('family_id',$id)->get();
        $cat = DB::Table('tb_category')->where('deleted_at','=',null)->get();

        $group = DB::Table('tb_familys')->where('id',$id)->first();
        if($group->group_show ==2){
            $chk = DB::Table('tb_customer_groups')->where('group_id',$id)->where('customer_id',Session::get('cid'))->first();
            if($chk != null && $chk->status_group =2 ){
                return view('mobile.member.group.group_public')->with(['c'=>$c,'cat'=>$cat,'group'=>$group]);

            }else{
                return view('mobile.member.group.group_private')->with(['c'=>$c,'cat'=>$cat,'group'=>$group]);

            }

        }else{
            return view('mobile.member.group.group_public')->with(['c'=>$c,'cat'=>$cat,'group'=>$group]);

        }

        return view('mobile.member.group.indexgroup')->with(['c'=>$c,'cat'=>$cat,'group'=>$group]);
    }
    
}
