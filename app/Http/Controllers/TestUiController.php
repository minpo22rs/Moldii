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

    public function testAll(){
        return view('mobile.all.invitation_income_withdraw');
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
