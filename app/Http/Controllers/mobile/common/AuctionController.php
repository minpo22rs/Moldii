<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tb_auction_log;
use App\Models\Tb_cart;
use Session;

class AuctionController extends Controller
{
    //
    public function index()
    {
        date_default_timezone_set('Asia/Bangkok');
        $cat = DB::Table('tb_category')->where('deleted_at','=',null)->get();
       
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
        

        return view('mobile.member.auction.auctionindex')->with(['auction'=>$auction,'detail'=>$detail,'chk'=>$chk,'limit'=>$limit,'cat'=>$cat]);
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



    public function checkauction(Request $request){
        $log = DB::Table('tb_auction_logs')->where('id_auction_detail', $request->adid)->where('product_id',$request->pid)->orderBy('price','DESC')->first();
        if($log->customer_id == Session::get('cid')){
            $sql = Tb_cart::where('customer_id',Session::get('cid'))->where('product_id',$request->pid)->first();
            $ship = DB::Table('tb_product_shippings')->where('id_product',$request->pid)->orderBy('cost','DESC')->first();
     
            if($sql !=null){
                Tb_cart::where('product_id',$request->pid)->increment('count', 1);
            }else{
                $cart = new Tb_cart();
    
                $cart->customer_id = Session::get('cid');
                $cart->product_id  = $request->id;
                $cart->store_id  = $request->store_id;
                $cart->shipping_cost  = $ship->cost;
                $cart->shipping_id  = $ship->id_company;
          
                $cart->save();
            }
            return 1;
        }else{
            return 0;

        }
        
         
         return view('mobile.member.auction.auctionindex')->with(['auction'=>$auction,'detail'=>$detail,'chk'=>$chk,'limit'=>$limit]);
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

        $x = DB::Table('tb_auctions')->where('id_auction',$request->aid)->first();

        if(strtotime($x->time_finish) - strtotime(date("H:i:s")) <60 ){
            DB::Table('tb_auctions')->where('id_auction',$request->aid)->update(['time_finish'=>date('H:i:s',strtotime('+59 second',strtotime($x->time_finish)))]);
            // dd('rrrr');
        }

        $log = DB::Table('tb_auction_logs')->where('id_auction_detail', $request->adid)->where('product_id',$request->pid)->orderBy('price','DESC')->first();
      
        $auction = DB::Table('tb_auctions')->where('id_auction', $request->aid)->first();
        $limit = $auction->date_start." ".$auction->time_finish;

        $now = $log->price;
        
        $minbit = $log->price+$auction->bit;
        
        $data = array(
            'bit'=>$minbit,
            'limit'=>$limit,
            'now'=>$now
        );

        return json_encode($data);


        // return redirect('auction/detail/'.$request->adid.'')->with(['success'=>'ประมูลเรียบร้อยแล้ว']);
    }
    
}
