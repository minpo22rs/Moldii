<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class TestUiController extends Controller
{
    public function index(){
        return view('mobile.common.main.index');
    }

    public function p(){
        $sql = DB::Table('tb_news')->where('new_type','C')->get();
        return view('mobile.member.common.content.home');
        
    }

    public function cm_podcast(){
        return view('mobile.member.common.content.podcast_comment');
    }


    public function shoppingTest(){
        return view('mobile.member.common.content.shopping.shopping_1');

    }
    public function shoppingTest_2(){
        return view('mobile.member.common.content.shopping.shopping_2');

    }
    public function Profile(){
        return view('mobile.member.userAccount.profile');
        
    }
  

    public function goToView(Request $request)
    {
        $request_all = $request->all();
        if (isset($request_all["view_target"]) && !empty($request_all["view_target"]))
        {
            return view($request_all["view_target"]);
        }
        else
            return "triggered";
    }

}
