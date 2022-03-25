<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class GroupController extends Controller
{
    //
    public function index()
    {
        $c = DB::Table('tb_news')->where('new_type','C')->get();

        $group = DB::Table('tb_familys')->get();

        return view('mobile.member.group.indexgroup')->with(['c'=>$c,'group'=>$group]);
    }
    
}
