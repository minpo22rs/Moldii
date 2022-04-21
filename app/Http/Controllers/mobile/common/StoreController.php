<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StoreController extends Controller
{
    //
    public function index()
    {
      
        $s = DB::Table('tb_merchants')->get();
        $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
        $pro = DB::Table('tb_products')->get();
        $ban = DB::Table('tb_banners')->where('banner_type',2)->first();

        return view('mobile.member.common.content.store')->with(['s'=>$s,'cat'=>$cat,'pro'=>$pro,'ban'=>$ban]);
    }
    
}
