<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    //
    public function index()
    {
        return view('mobile.member.helpCenter.helpCenter');
    }
}
