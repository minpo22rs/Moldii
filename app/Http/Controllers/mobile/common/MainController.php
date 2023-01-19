<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class MainController extends Controller
{
    //

    public function index()
    {
        return redirect('/user/login');
    }
    public function indexpage()
    {
        // dd(Session::get('cid'));

        $c = DB::Table('tb_news')->where('new_type','C')->orWhere('new_type','U')->where('new_published',1)
                ->leftJoin('tb_customers','tb_news.customer_id','=','tb_customers.customer_id')
                ->select('tb_news.*','tb_customers.customer_username')
                ->latest('tb_news.created_at','DESC')->get();
        $v = DB::Table('tb_news')->where('new_type','V')->get();
        $p = DB::Table('tb_news')->where('new_type','P')->get();
        $s = DB::Table('tb_merchants')->get();
        $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
        $pro = DB::Table('tb_products')->get();
        $group = DB::Table('tb_familys')->get();
        $ban = DB::Table('tb_banners')->where('banner_type',1)->first();
        $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
        $u = DB::Table('tb_customers')->where('customer_id',Session::get('cid'))->first();

        $n = DB::Table('tb_news')->where('customer_id',Session::get('cid'))->get();
        $id = $n->pluck('new_id');
        // dd($n);
        $noti = DB::Table('tb_notifications')->where('customer_id',null)->orderBy('created_at','DESC')->get();
        $notiid = DB::Table('tb_notifications')->where('customer_id',Session::get('cid'))->orderBy('created_at','DESC')->get();
        $ccomment = DB::Table('tb_comments')->whereIn('comment_object_id',$id)->where('reader','=','0')->orderBy('created_at','DESC')->get();


        // $result = $cp->merge($c);

        return view('mobile.member.common.index')->with(['c'=>$c,'v'=>$v,'p'=>$p,'s'=>$s,'cat'=>$cat,'pro'=>$pro,'group'=>$group,'ban'=>$ban,'cat'=>$cat,'u'=>$u,'noti'=>$noti,'ccomment'=>$ccomment,'notiid'=>$notiid]);
    }

    public function followwriter(Request $request){

        DB::Table('tb_followers')->insert(['id_customer'=>Session::get('cid'),'id_c_follower'=>$request->id]);

        return 1 ;
    }

    public function unfollowwriter(Request $request){

        DB::Table('tb_followers')->where('id_customer',Session::get('cid'))->where('id_c_follower',$request->id)->delete();


        return 1 ;
    }


    public function likecontent(Request $request){
        $sql = DB::Table('tb_content_likes')->where('customer_id',Session::get('cid'))->where('content_id',$request->id)
                    ->where('type_like','C')->first();
        if($sql ==null){
            DB::Table('tb_content_likes')->insert(['customer_id'=>Session::get('cid'),'content_id'=>$request->id,'type_like'=>'C']);
            DB::Table('tb_news')->where('new_id',$request->id)->increment('like', 1);

        }

        $count = DB::Table('tb_news')->where('new_id',$request->id)->first();

        return $count->like ;
    }

    public function unlikecontent(Request $request){

        DB::Table('tb_content_likes')->where('customer_id',Session::get('cid'))->where('content_id',$request->id)->delete();
        DB::Table('tb_news')->where('new_id',$request->id)->decrement('like', 1);

        $count = DB::Table('tb_news')->where('new_id',$request->id)->first();

        return $count->like ;
    }

    public function bookmarkadd(Request $request){

        DB::Table('tb_bookmarks')->insert(['customer_id'=>Session::get('cid'),'id_ref'=>$request->id]);

        return 1 ;
    }

    public function unbookmark(Request $request){

        DB::Table('tb_bookmarks')->where('customer_id',Session::get('cid'))->where('id_ref',$request->id)->delete();


        return 1 ;
    }







}
