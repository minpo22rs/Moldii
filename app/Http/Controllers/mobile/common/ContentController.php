<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class ContentController extends Controller
{
    
    public function index($id)
    {
        $c = DB::Table('tb_news')->where('new_id',$id)->first();
        $comment = DB::Table('tb_comments')->where('comment_object_id',$id)->get();
        // dd($c);
       
        return view('mobile.member.common.content.comment')->with(['c'=>$c,'comment'=> $comment]);
    }

    public function sendcomment(Request $request)
    {
        DB::Table('tb_comments')->insert(['comment_text'=> $request->comment,'comment_object_id'=>$request->cid,'comment_type'=>'C','comment_author'=>Session::get('cid')]);
        return back();
    }
    
    
}
