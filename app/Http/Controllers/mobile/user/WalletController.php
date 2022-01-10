<?php

namespace App\Http\Controllers\mobile\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    //
    public function index ()
    {
        return view('mobile.member.wallet.wallet');
    }
}
