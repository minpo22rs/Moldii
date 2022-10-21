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
       
        $auction = DB::Table('tb_auctions')->where('date_start',date('Y-m-d'))->where('time_start','<=',date('H:i:s'))
                    ->where('time_finish','>=',date('H:i:s'))
                    ->leftJoin('tb_products','tb_auctions.product_id','=','tb_products.product_id')->get();
        $chk = 0;
        $adate = [];
        $atime = [];
        $log = [];
        $aid = $auction->pluck('id_auction');

        if($auction->count() == 0){
            $chk = 0;
            
        }else{
            $chk = 1;
            foreach($auction as $auctions){
                $adate[] = date('Y/m/d',strtotime($auctions->date_start));
                $atime[] = $auctions->time_finish;
                $sql = DB::Table('tb_auction_logs')->where('id_auction', $auctions->id_auction)->orderBy('price','DESC')->first();
                if( $sql == null ){
                    $log[] =  $auctions->price;
    
                }else{
                    $log[] =  $sql->price;
    
                }
    
            }
    
        }
        

        $n = DB::Table('tb_news')->where('customer_id',Session::get('cid'))->get();
        $id = $n->pluck('new_id');
        // dd($tfinish);
        $noti = DB::Table('tb_notifications')->orderBy('created_at','DESC')->get();
        $ccomment = DB::Table('tb_comments')->whereIn('comment_object_id',$id)->where('reader','=','0')->orderBy('created_at','DESC')->get();

        

        return view('mobile.member.auction.auctionindex')->with(['auction'=>$auction,'cat'=>$cat,'chk'=>$chk,'noti'=>$noti,'ccomment'=>$ccomment,'adate'=>$adate,'atime'=>$atime,'aid'=>$aid,'log'=>$log]);
    }


    public function detail($aid)
    {
        $minbit =0;
        // $detail = DB::Table('tb_auction_details')->where('id_auction_detail',$aid)->first();
        
        $auction = DB::Table('tb_auctions')->where('id_auction', $aid)
                    ->leftJoin('tb_products','tb_auctions.product_id','=','tb_products.product_id')->first();

        $log = DB::Table('tb_auction_logs')->where('id_auction', $aid)->orderBy('price','DESC')->limit(3)->get();

        $product = DB::Table('tb_products')->where('product_id',$auction->product_id)->first();
        $imggal = DB::Table('tb_product_imgs')->where('product_id',$auction->product_id)->get();
        $limit = $auction->date_start." ".$auction->time_finish;

        // dd( $limit );
        if($log->count()!=0){
            $minbit = $log[0]->price;
        }else{
            $minbit = $auction->price;
        }
        

        return view('mobile.member.auction.auctiondetail')->with(['auction'=>$auction,'product'=>$product,'imggal'=>$imggal,'limit'=>$limit,'log'=>$log,'minbit'=>$minbit]);
    }



    public function checkauction(Request $request){
        $log = DB::Table('tb_auction_logs')->where('id_auction', $request->aid)->orderBy('price','DESC')->first();

        if($log != null && $log->customer_id == Session::get('cid')){
            $sql = Tb_cart::where('customer_id',Session::get('cid'))->where('product_id',$request->pid)->first();
            $ship = DB::Table('tb_product_shippings')->where('id_product',$request->pid)->orderBy('cost','DESC')->first();
            $product = DB::Table('tb_products')->where('product_id',$request->pid)->first();
     
            if($sql !=null){
                Tb_cart::where('product_id',$request->pid)->increment('count', 1);
            }else{
                $cart = new Tb_cart();
    
                $cart->customer_id = Session::get('cid');
                $cart->product_id  = $request->pid;
                $cart->store_id  = $product->product_merchant_id;
                $cart->shipping_cost  = $ship->cost;
                $cart->shipping_id  = $ship->id_company;
          
                $cart->save();
            }
            return 1;
        }else{

            return 0;

        }
        
        DB::Table('tb_auctions')->update(['finish'=>1]);
        return view('mobile.member.auction.auctionindex')->with(['auction'=>$auction,'detail'=>$detail,'chk'=>$chk,'limit'=>$limit]);
    }



    public function addauction (Request $request){
        // dd($request->all());
        date_default_timezone_set('Asia/Bangkok');
        $chk =0 ;
        $log = DB::Table('tb_auction_logs')->where('id_auction', $request->aid)->orderBy('price','DESC')->first();
        if($log != null && $log->customer_id == Session::get('cid')){
            $chk =1 ;

        }else{
            $a = new Tb_auction_log();

            $a->id_auction  = $request->aid;
            $a->customer_id  = Session::get('cid');
            $a->price  = $request->count;
            $a->save();
            $chk =0 ;

        }


       

        $x = DB::Table('tb_auctions')->where('id_auction',$request->aid)->first();

        if(strtotime($x->time_finish) - strtotime(date("H:i:s")) <60 ){
            DB::Table('tb_auctions')->where('id_auction',$request->aid)->update(['time_finish'=>date('H:i:s',strtotime('+59 second',strtotime($x->time_finish)))]);
            // dd('rrrr');
        }
        
        $auction = DB::Table('tb_auctions')->where('id_auction', $request->aid)->first();
        $limit = $auction->date_start." ".$auction->time_finish;

        $lognew = DB::Table('tb_auction_logs')->where('id_auction', $request->aid)->orderBy('price','DESC')->first();


        $now = $lognew->price;
        
        $minbit = $lognew->price+$auction->bit;
        
        $data = array(
            'bit'=>$minbit,
            'limit'=>$limit,
            'now'=>$now,
            'chk'=>$chk
        );

        return json_encode($data);


        // return redirect('auction/detail/'.$request->adid.'')->with(['success'=>'ประมูลเรียบร้อยแล้ว']);
    }
    
}
