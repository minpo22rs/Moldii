<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Tb_group;

class GroupController extends Controller
{
    //
    public function index()
    {
        $c = DB::Table('tb_news')->where('family_id','!=',null)->get();
        $cat = DB::Table('tb_category')->where('deleted_at','=',null)->get();

        $group = Tb_group::where('published',1)->where('type_group',2)->get();
        $u = DB::Table('tb_customers')->where('customer_id',Session::get('cid'))->first();

        $n = DB::Table('tb_news')->where('customer_id',Session::get('cid'))->get();
        $id = $n->pluck('new_id');
        // dd($n);
        $noti = DB::Table('tb_notifications')->orderBy('created_at','DESC')->get();
        $ccomment = DB::Table('tb_comments')->whereIn('comment_object_id',$id)->where('reader','=','0')->orderBy('created_at','DESC')->get();
        $notiid = DB::Table('tb_notifications')->where('customer_id',Session::get('cid'))->orderBy('created_at','DESC')->get();


        // dd( $cat);
        return view('mobile.member.group.indexgroup')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'noti'=>$noti,'ccomment'=>$ccomment,'notiid'=>$notiid,'u'=>$u]);
    }

    public function groupid($id)
    {
        $c = DB::Table('tb_news')->where('family_id',$id)->get();
        $cat = DB::Table('tb_category')->where('deleted_at','=',null)->get();
        $cg = DB::Table('tb_customer_groups')->where('group_id',$id)->where('status_group',2)
                ->leftJoin('tb_customers','tb_customer_groups.customer_id','=','tb_customers.customer_id')
                ->get();

        $group = Tb_group::where('id',$id)->first();
        $chk = DB::Table('tb_customer_groups')->where('group_id',$id)->where('customer_id',Session::get('cid'))->first();
        $u = DB::Table('tb_customers')->where('customer_id',Session::get('cid'))->first();
        $admin = DB::Table('tb_customers')->where('customer_id',$group->created_by)->first();
        // dd($chk );
        if($group->group_show ==2){
            return view('mobile.member.group.group_private')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg,'chk'=>$chk,'u'=>$u,'id'=>$id,'admin'=>$admin]);
            // $chk = DB::Table('tb_customer_groups')->where('group_id',$id)->where('customer_id',Session::get('cid'))->first();
            // if($chk != null && $chk->status_group =2 ){
            //     return view('mobile.member.group.group_public')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg]);

            // }else{
            //     return view('mobile.member.group.group_private')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg]);

            // }

        }else{
            // dd($chk);
            return view('mobile.member.group.group_public')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'cg'=>$cg,'chk'=>$chk,'u'=>$u,'id'=>$id,'admin'=>$admin]);

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


    public function groupall()
    {
        $c = DB::Table('tb_news')->where('family_id','!=',null)->get();
        $cat = DB::Table('tb_category')->where('deleted_at','=',null)->get();

        
        $n = DB::Table('tb_news')->where('customer_id',Session::get('cid'))->get();
        $id = $n->pluck('new_id');
        
        $noti = DB::Table('tb_notifications')->orderBy('created_at','DESC')->get();
        $ccomment = DB::Table('tb_comments')->whereIn('comment_object_id',$id)->where('reader','=','0')->orderBy('created_at','DESC')->get();
        $group = Tb_group::where('published',1)->where('type_group',2)->get();
        // dd( $cat);
        return view('mobile.member.group.groupall')->with(['c'=>$c,'cat'=>$cat,'group'=>$group,'noti'=>$noti,'ccomment'=>$ccomment]);
    }


    public function opengroup(Request $request){
        // dd($request->all());
        $g = new Tb_group();
        $g->name = $request->name;
        $g->description = $request->reason;
        $g->type_group = 1;
        $g->created_by = Session::get('cid');
        $g->group_show =$request->type;

        $name = rand().time().'.'.$request->imgc->getClientOriginalExtension();
        $request->imgc->storeAs('public/group',  $name);
        $g->group_cover          = $name;
        
        $name = rand().time().'.'.$request->img->getClientOriginalExtension();
        $request->img->storeAs('public/group',  $name);
        $g->group_img          = $name;


        $g->save();

        DB::Table('tb_customer_groups')->insert(['group_id'=>$g->id,'customer_id'=> Session::get('cid'),'status_group'=>2,'admin_group'=>1]);
        return redirect('groupall')->with('success','ส่งคำขอเปิดกลุ่มเรียบร้อยแล้ว รออนุมัติ');
    }   


    public function mygroup(){
        // dd('addadfdf.');
        $sql = DB::Table('tb_customer_groups')->where('customer_id',Session::get('cid'))->where('status_group',2)
                ->leftJoin('tb_familys','tb_customer_groups.group_id','=','tb_familys.id')->get();
        return view('mobile.member.userAccount.mygroup')->with(['group'=>$sql]);

    }

    
}
