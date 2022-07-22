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
        // dd(date('H:i:s'));
        $auction = DB::Table('tb_auctions')->where('date_start',date('Y-m-d'))->first();
        if($auction != null){
            $detail = DB::Table('tb_auction_details')->where('id_auction',$auction->id_auction)
                        ->leftJoin('tb_products','tb_auction_details.product_id','=','tb_products.product_id')->get();
        }else{
            $auction =0;
            $detail =0;
        }
        
        // $auction = DB::Table('tb_auctions')->where('date_start',date('Y-m-d'))->where('time_start','>',date('H:i:s'))->where('time_finish','<',date('H:i:s'))->first();
        // dd($auction);
        

        return view('mobile.member.auction.auctionindex')->with(['auction'=>$auction,'detail'=>$detail]);
    }


    public function detail($pid,$aid)
    {
        date_default_timezone_set('Asia/Bangkok');
        // dd(date('H:i:s'));
        $auction = DB::Table('tb_auctions')->where('date_start',date('Y-m-d'))->first();
        $detail = DB::Table('tb_auction_details')->where('id_auction',$auction->id_auction)
                    ->leftJoin('tb_products','tb_auction_details.product_id','=','tb_products.product_id')->get();
        // $auction = DB::Table('tb_auctions')->where('date_start',date('Y-m-d'))->where('time_start','>',date('H:i:s'))->where('time_finish','<',date('H:i:s'))->first();
        // dd($auction);

        $product = DB::Table('tb_products')->where('product_id',$pid)->first();
        $productcat = DB::Table('tb_products')->where('product_cat_id',$product->product_cat_id)->where('product_published',1)->get();
        $store = DB::Table('tb_merchants')->where('merchant_id', $product->product_merchant_id)->first();
        $productstore = DB::Table('tb_products')->where('product_merchant_id',$store->merchant_id)->get();
        // $detail = DB::Table('tb_order_details')->where('product_id',$id)->get();
        $imggal = DB::Table('tb_product_imgs')->where('product_id',$pid)->get();

        

        return view('mobile.member.auction.auctiondetail')->with(['auction'=>$auction,'product'=>$product,'productcat'=>$productcat,'store'=>$store,'productstore'=>$productstore,'detail'=>$detail,'imggal'=>$imggal]);
    }
    
}
