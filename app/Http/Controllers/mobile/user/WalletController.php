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
    public function addMoney ()//เติมเงิน
    {
        return view('mobile.member.wallet.add_money');
    }
    public function bankAccount ()// บัญชีธนาคาร
    {
        return view('mobile.member.wallet.bankAccount');
    }
    public function specifyNumber ()// ระบุจำนวน
    {
        return view('mobile.member.wallet.specifyNumber');
    }
    public function Top_upWallet ()// Top-up wallet
    {
        return view('mobile.member.wallet.Top_upWallet');
    }
}
