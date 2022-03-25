<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NotificationController extends Controller
{
    //
    public function index(Request $request)
    {
        dd( $request->all());
       

        return view('mobile.member.userAccount.my_list.shoppingCart');
    }
    
}
