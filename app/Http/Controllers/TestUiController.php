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
}
