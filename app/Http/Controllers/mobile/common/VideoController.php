<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class VideoController extends Controller
{
    //
    public function index()
    {

        // dd('asdasdasdasd');
        $v = DB::Table('tb_news')->where('new_type','V')->get();
       

        return view('mobile.member.common.content.video')->with(['v'=>$v]);
    }
    
}
