<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Tb_order_detail;
use App\Models\Tb_order;
use App\Models\Tb_cart;
use App\Models\User;
use App\Models\Tb_address;
use Session;


class CartController extends Controller
{
    //

    public function index(Request $request)
    {
        $mycart = Tb_cart::where('customer_id',Session::get('cid'))->groupBy('store_id')->get();
        // dd( $mycart);
        $my = User::where('customer_id',Session::get('cid'))->first();
        Session::put('totalcart',0);
        Session::put('countcart',0);
        Session::put('cartid',null);
        Session::put('coin',null);
        Session::put('typepayment',null);
        Session::put('bankcode',null);
        Session::put('idcode',null);
        Session::put('codename','เลือกโค้ดส่วนลด');
        Session::put('sumship',0);
        // dd(Session::all());
        return view('mobile.member.userAccount.my_list.shoppingCart')->with(['mycart'=>$mycart,'my'=>$my]);
    }
    public function addcart(Request $request)
    {

        // dd($request->all());
      

        $sql = DB::Table('tb_carts')->where('customer_id',Session::get('cid'))->where('product_id',$request->id)->first();
        $ship = DB::Table('tb_product_shippings')->where('id_product',$request->id)->orderBy('cost','DESC')->first();
 
        if($sql !=null){
            DB::Table('tb_carts')->where('product_id',$request->id)->increment('count', 1);
        }else{
            $cart = new Tb_cart();

            $cart->customer_id = Session::get('cid');
            $cart->product_id  = $request->id;
            $cart->store_id  = $request->store_id;
            $cart->shipping_cost  = $ship->cost;
            $cart->shipping_id  = $ship->id_company;
      
            $cart->save();
        }
        if($request->back == 2){
            return back()->with('success','เพิ่มในตระกร้าเรียบร้อยแล้ว');
        }else{
            // $mycart = Tb_order::where('customer_id',Session::get('cid'))->get();
            $mycart = Tb_cart::where('customer_id',Session::get('cid'))->groupBy('store_id')->get();
            $my = User::where('customer_id',Session::get('cid'))->first();
            // dd($mycart);
            return view('mobile.member.userAccount.my_list.shoppingCart')->with(['mycart'=>$mycart,'my'=>$my]);

        }
    }


    public function calcartstore(Request $request)
    {

        // dd($request->all());
        $sum = 0;
        $chkcount = 0;
        $idpluck =  array();
        $mycart = Tb_cart::where('store_id',$request->s)->where('customer_id',Session::get('cid'))->get();
        $idpluck = $mycart->pluck('cart_id');
        $sessionsum = 0;
        $sessioncount = 0;
        


        if($request->chkdel ==1){
            if(Session::get('cartid') == null){
                Session::put('totalcart',0);
                Session::put('countcart',0);
                Session::put('cartid',null);
            }else{
                $colors =  Session::get('cartid');
                // dd($colors);

                foreach( $mycart as  $mycarts){
                    $sum = 0;
                    $chkcount = 0;
                    $sessionsum = 0;
                    $sessioncount = 0;
                    $product = DB::Table('tb_products')->where('product_id',$mycarts->product_id)->first();
                    if( $product->product_discount == null){
                        $sum = $product->product_price*$mycarts->count;
                    }else{
        
                        $sum = $product->product_discount*$mycarts->count;
                    }
                    // Session::push('cartid',$mycarts->cart_id);
                    

                    // dd($mycarts->cart_id);

                    if (($key = array_search($mycarts->cart_id, $colors)) !== false) {
                        unset($colors[$key]);
                        // dd('sssssss');
                        // $chkcount += $mycarts->count;
                        $sessioncount =  Session::get('countcart')-$mycarts->count;
                        Session::put('countcart',$sessioncount);
                
                        $sessionsum =  Session::get('totalcart')-$sum;
                        Session::put('totalcart',$sessionsum);


                        
                    }
                }

                Session::put('cartid',$colors);
                
                if(Session::get('cartid') == null){
                    Session::put('totalcart',0);
                    Session::put('countcart',0);
                    Session::put('cartid',null);
                }

            //    dd('rrrr');
                
            }

        }else{
            foreach( $mycart as  $mycarts){
                $product = DB::Table('tb_products')->where('product_id',$mycarts->product_id)->first();
                
                $sum = 0;
                $chkcount = 0;
                $sessionsum = 0;
                $sessioncount = 0;
                if( $product->product_discount == null){
                    $sum += $product->product_price*$mycarts->count;
                }else{
    
                    $sum += $product->product_discount*$mycarts->count;
                }

                if( Session::get('cartid') != null){
                    $colors =Session::get('cartid');
                    
                    if (($key = array_search($mycarts->cart_id,$colors) === false)) {
                        
                        Session::push('cartid',$mycarts->cart_id);

                
                        $chkcount += $mycarts->count;
                        $sessioncount =  Session::get('countcart')+$chkcount;
                        Session::put('countcart',$sessioncount);
                
                        $sessionsum =  Session::get('totalcart')+$sum;
                        Session::put('totalcart',$sessionsum);
                    }
                    
                }else{
                    Session::push('cartid',$mycarts->cart_id);

                
                    $chkcount += $mycarts->count;
                    $sessioncount =  Session::get('countcart')+$chkcount;
                    Session::put('countcart',$sessioncount);
            
                    $sessionsum =  Session::get('totalcart')+$sum;
                    Session::put('totalcart',$sessionsum);

                }
              
            }
    
        }

        $data = array(
            'sum' => number_format( Session::get('totalcart'),2,'.',''),
            'chkcount' => Session::get('countcart'),
            'colors' =>  Session::get('cartid')
        );
        return  json_encode($data);
    }


    public function calcartid(Request $request)
    {

        // dd($request->all());
        $sum = 0;
        $chkcount = 0;
        $mycart = Tb_cart::where('cart_id',$request->id)->first();
        $product = DB::Table('tb_products')->where('product_id',$mycart->product_id)->first();
        if( $product->product_discount == null){
            $sum += $product->product_price*$mycart->count;
        }else{

            $sum += $product->product_discount*$mycart->count;
        }

        if($request->chkdel ==1){
            if(Session::get('cartid') == null){
                Session::put('totalcart',0);
                Session::put('countcart',0);
                Session::put('cartid',null);
            }else{
                // Session::decrement('countcart', $decrementBy = 1);
                $sessioncount =  Session::get('countcart')-$mycart->count;
                $colors =  Session::get('cartid');
    
                //delete element in array by value "green"
                if (($key = array_search($request->id, $colors)) !== false) {
                    unset($colors[$key]);
                }
                Session::put('cartid',$colors);
                Session::put('countcart',$sessioncount);
                $sessionsum =  Session::get('totalcart')-$sum;
                Session::put('totalcart',$sessionsum);
            }
           

        }else{
               
            $sessioncount =  Session::get('countcart')+$mycart->count;
            Session::put('countcart',$sessioncount);
            Session::push('cartid',$mycart->cart_id);
            $sessionsum =  Session::get('totalcart')+$sum;
            Session::put('totalcart',$sessionsum);

        }


        $data = array(
            'sum' => number_format(  Session::get('totalcart'),2,'.',''),
            'chkcount' => Session::get('countcart'),
        );

        // dd(Session::all());

        return  json_encode($data);
        // return view('mobile.member.userAccount.my_list.shoppingCart')->with(['mycart'=>$mycart,'my'=>$my]);
    }

    public function calcartall(Request $request)
    {

        // dd($request->all());
        $sum = 0;
        $chkcount = 0;

        if($request->chkdel == 1){
            Session::put('totalcart',0);
            Session::put('countcart',0);
            Session::put('cartid',null);
        }else{
        
        
                $mycart = Tb_cart::where('customer_id',Session::get('cid'))->get();
                Session::put('totalcart',0);
                Session::put('countcart',0);
                Session::put('cartid',null);

        
                foreach( $mycart as  $mycarts){
                    $product = DB::Table('tb_products')->where('product_id',$mycarts->product_id)->first();
                    if( $product->product_discount == null){
                        $sum += $product->product_price*$mycarts->count;
                    }else{

                        $sum += $product->product_discount*$mycarts->count;
                    }

                    $chkcount += $mycarts->count;

                    Session::push('cartid',$mycarts->cart_id);

                }
                Session::put('countcart',$chkcount);
                Session::put('totalcart',$sum);
                // $my = User::where('customer_id',Session::get('cid'))->first();
        }


        $data = array(
            'sum' => number_format(Session::get('totalcart'),2,'.',''),
            'chkcount' =>Session::get('countcart'),
        );

        // dd(Session::all());

        return  json_encode($data);
        // return view('mobile.member.userAccount.my_list.shoppingCart')->with(['mycart'=>$mycart,'my'=>$my]);
    }

    public function delcartid(Request $request)
    {
        Tb_cart::where('cart_id',$request->id)->delete();
       
        return 1;
    }


    public function checkoutaddress(Request $request)
    {
        
        $mycart = Tb_cart::whereIn('cart_id',Session::get('cartid'))->groupBy('store_id')->get();
       
        $my = User::where('customer_id',Session::get('cid'))->first();
        $add = Tb_address::where('customer_id',Session::get('cid'))->where('address_status','=','on')->first();
        // dd(Session::get('cid'));
        $p = DB::Table('provinces')->where('id',$add->customer_province)->first();
        $a = DB::Table('amphures')->where('id',$add->customer_district)->first();
        $t = DB::Table('districts')->where('id',$add->customer_tumbon)->first();
        // dd($mycart);
        return view('mobile.member.userAccount.my_list.buyGoods')->with(['mycart'=>$mycart,'my'=>$my,'add'=>$add,'p'=>$p,'a'=>$a,'t'=>$t]);
    }

    public function countdown(Request $request){
        // dd(Session::all());
        Tb_cart::where('cart_id',$request->k)->decrement('count', 1);
        if(Session::get('cartid')!= null){
            $count =  Session::get('countcart')-1;
            Session::put('countcart',$count);
    
            $sum =  Session::get('totalcart')-$request->p;
            Session::put('totalcart',$sum);
            $data = array(
                'sum' => number_format( Session::get('totalcart'),2,'.',''),
                'chkcount' => Session::get('countcart'),
            );
    
    
            return  json_encode($data);
        }else{
            return 1;
        }
       
      

    }

    public function countup(Request $request){
        // dd(Session::all());
        Tb_cart::where('cart_id',$request->k)->increment('count', 1);
        if(Session::get('cartid')!= null){
            $count =  Session::get('countcart')+1;
            Session::put('countcart',$count);

            $sum =  Session::get('totalcart')+$request->p;
            Session::put('totalcart',$sum);
            $data = array(
                'sum' => number_format( Session::get('totalcart'),2,'.',''),
                'chkcount' => Session::get('countcart'),
            );


            return  json_encode($data);
        }else{
            return 1;
        }

        
    }

    public function coinswitch(Request $request){
        $my = User::where('customer_id',Session::get('cid'))->first();
        Session::put('coin',0);
        if($request->chk == 0){
            Session::put('coin',-(int)$my->customer_point);
            Session::put('totalcart',Session::get('totalcart')+ Session::get('coin'));

        }else{
            
            Session::put('coin',null);
            Session::put('totalcart',Session::get('totalcart')+ (int)$my->customer_point);

        }

        $data = array(
            'sum' => number_format( Session::get('totalcart'),2,'.',''),
        );


        return  json_encode($data);

    }


    public function coinswitch2(Request $request){
        $my = User::where('customer_id',Session::get('cid'))->first();
        $s1 =0;
        $s2 =0;
        $s3 =0;
        Session::put('coin',0);
        if($request->chk == 0){
            Session::put('coin',-(int)$my->customer_point);
            Session::put('totalcart',Session::get('totalcart')+ Session::get('coin'));
            $s1 = number_format(Session::get('totalcart'),2,'.','');
            $s2 = number_format((Session::get('totalcart')+$request->v),2,'.','');
            $s3 = number_format((Session::get('totalcart')+$request->v),2,'.','');

        }else{
            
            Session::put('coin',null);
            Session::put('totalcart',Session::get('totalcart')+ (int)$my->customer_point);
            $s1 = number_format(Session::get('totalcart'),2,'.','');
            $s2 = number_format((Session::get('totalcart')+$request->v),2,'.','');
            $s3 = number_format((Session::get('totalcart')+$request->v),2,'.','');
        }

        $data = array(
            'subsum' => '฿'.$s1,
            'subsumship' => '฿'.$s2,
            'totalsum' => '฿'.$s3,
        );


        return  json_encode($data);

    }
    
}
