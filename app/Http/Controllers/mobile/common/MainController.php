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
        $c = DB::Table('tb_news')->where('new_type','C')->get();
        $v = DB::Table('tb_news')->where('new_type','V')->get();
        $p = DB::Table('tb_news')->where('new_type','P')->get();
        $s = DB::Table('tb_merchants')->get();
        $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
        $pro = DB::Table('tb_products')->get();
        $group = DB::Table('tb_familys')->get();
        $ban = DB::Table('tb_banners')->where('banner_type',1)->first();
        $cat = DB::Table('tb_category')->where('deleted_at','!=',null)->limit('6')->get();
        Session::put('recent',[]);
        Session::push('recent','model');
        Session::push('recent','robot');
        Session::push('recent','one pice');
        // dd(Session::get('recent'));
        return view('mobile.member.common.index')->with(['c'=>$c,'v'=>$v,'p'=>$p,'s'=>$s,'cat'=>$cat,'pro'=>$pro,'group'=>$group,'ban'=>$ban,'cat'=>$cat]);
    }



    
}
