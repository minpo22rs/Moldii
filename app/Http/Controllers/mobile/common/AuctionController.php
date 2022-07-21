<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AuctionController extends Controller
{
    //
    public function index()
    {
        date_default_timezone_set('Asia/Bangkok');
        dd(date('H:i:s'));
        $auction = DB::Table('tb_auctions')->where('date_start',date('Y-m-d'))->where('time_start','>',date('H:i:s'))->where('time_finish','<',date('H:i:s'))->get();
        dd($auction);
        $cat = DB::Table('tb_category')->where('deleted_at',null)->get();
        $pro = DB::Table('tb_products')->get();
        $ban = DB::Table('tb_banners')->where('banner_type',2)->first();

        return view('mobile.member.auction.auctionindex')->with(['s'=>$s,'cat'=>$cat,'pro'=>$pro,'ban'=>$ban]);
    }
    
}
