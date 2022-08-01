<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tb_auction_log;
use Session;

class AuctionController extends Controller
{
    //
    public function index()
    {
        date_default_timezone_set('Asia/Bangkok');
        // dd(date('H:i:s'));
        $auction = DB::Table('tb_auctions')->where('date_start',date('Y-m-d'))->where('time_start','<=',date('H:i:s'))->where('time_finish','>=',date('H:i:s'))->first();
        $chk = 0;
        if($auction != null){
            $detail = DB::Table('tb_auction_details')->where('id_auction',$auction->id_auction)
                        ->leftJoin('tb_products','tb_auction_details.product_id','=','tb_products.product_id')
                        ->get();
            $chk = 1;
            $limit = $auction->date_start." ".$auction->time_finish;
        }else{
            $chk =0;
            $limit  =0;
            $detail =0;
        }
        
        // dd($auction->date_start." ".$auction->time_finish);
        // $auction = DB::Table('tb_auctions')->where('date_start',date('Y-m-d'))->where('time_start','<=',date('H:i:s'))->where('time_finish','>=',date('H:i:s'))->first();
        // dd($auction);
        

        return view('mobile.member.auction.auctionindex')->with(['auction'=>$auction,'detail'=>$detail,'chk'=>$chk,'limit'=>$limit]);
    }


    public function detail($aid)
    {
        $minbit =0;
        $detail = DB::Table('tb_auction_details')->where('id_auction_detail',$aid)->first();
        
        $auction = DB::Table('tb_auctions')->where('id_auction', $detail->id_auction)->first();

        $log = DB::Table('tb_auction_logs')->where('id_auction_detail', $detail->id_auction_detail)
                    ->where('product_id',$detail->product_id)->orderBy('price','DESC')->limit(3)->get();

        $product = DB::Table('tb_products')->where('product_id',$detail->product_id)->first();
        $imggal = DB::Table('tb_product_imgs')->where('product_id',$detail->product_id)->get();
        $limit = $auction->date_start." ".$auction->time_finish;
        if($log->count()!=0){
            $minbit = $log[0]->price;
        }else{
            $minbit = $auction->price;
        }
        

        return view('mobile.member.auction.auctiondetail')->with(['auction'=>$auction,'product'=>$product,'detail'=>$detail,'imggal'=>$imggal,'limit'=>$limit,'log'=>$log,'minbit'=>$minbit]);
    }

    public function addauction (Request $request){
        // dd($request->all());
        date_default_timezone_set('Asia/Bangkok');

        $a = new Tb_auction_log();
        $a->product_id  = $request->pid;
        $a->id_auction_detail  = $request->adid;
        $a->customer_id  = Session::get('cid');
        $a->price  = $request->count;
        $a->save();
        return redirect('auction/detail/'.$request->adid.'')->with(['success'=>'ประมูลเรียบร้อยแล้ว']);
    }
    
}
