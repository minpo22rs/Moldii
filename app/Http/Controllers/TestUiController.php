<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestUiController extends Controller
{
    public function index(){
        return view('mobile.member.main.index');
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
