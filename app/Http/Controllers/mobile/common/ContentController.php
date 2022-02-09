<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ContentController extends Controller
{
    //
    public function index($id)
    {
        $c = DB::Table('tb_news')->where('new_id',$id)->first();
        // dd($c);
       
        return view('mobile.member.common.content.comment')->with(['c'=>$c]);
    }
    
}
