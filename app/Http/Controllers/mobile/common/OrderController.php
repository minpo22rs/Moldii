<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Tb_order_detail;
use App\Models\Tb_order;

class OrderController extends Controller
{
    //
    public function ordertoship(Request $request)
    {
        $sql = Tb_order_detail::where('customer_id',Session::get('cid'))
            ->leftJoin('tb_products','tb_order_details.product_id','=','tb_products.product_id')
            ->leftJoin('tb_merchants','tb_order_details.customer_id','=','tb_merchants.merchant_id')
            ->get();
        Session::put('totalcart',0);
        Session::put('countcart',0);
        Session::put('cartid',null);

        return view('mobile.member.userAccount.my_list.myList')->with(['sql'=>$sql]);
    }

    public function addorder(Request $request)
    {
        // dd(Session::all());
        $address = DB::Table('tb_customer_addresss')->where('customer_id',Session::get('cid'))->where('address_status','=','on')
                        ->leftJoin('districts', 'tb_orders.order_tumbon', '=', 'districts.id')
                        ->leftJoin('amphures', 'tb_orders.order_district', '=', 'amphures.id')
                        ->leftJoin('provinces', 'tb_orders.order_province', '=', 'provinces.id')
                        ->select('tb_customer_addresss.customer_address','tb_customer_addresss.customer_phone','tb_customer_addresss.customer_postcode'
                                    ,',districts.name_th as tth','amphures.name_th as ath','provinces.name_th as pth')
                        ->first();
        $order = new Tb_order();
        $order->customer_id = Session::get('cid');
        $order->order_total = Session::get('totalcart');
        $order->shipping_cost = 14;
        $order->order_code = substr(md5(mt_rand()), 0, 8);
        $order->order_address = $address->customer_address;
        $order->order_phone = $address->customer_phone;
        $order->order_tumbon = $address->tth;
        $order->order_district = $address->ath;
        $order->order_province = $address->pth;
        $order->order_postcode = $address->customer_postcode;
        $order->save();
        
        $sql = DB::Table('tb_carts')->whereIn('cart_id',Session::get('cartid'))->get();

        foreach($sql as $sqls){
            $p = DB::Table('tb_products')->where('product_id',$sqls->product_id)->first();
            $order_de = new Tb_order_detail();
            $order_de->order_id = $order->id;
            $order_de->product_id =  $sqls->product_id;
            if( $p->product_discount == null){
                $order_de->price = $p->product_price;
            }else{

                $order_de->price =  $p->product_discount;
            }

            
            $order_de->store_id =  $sqls->store_id;
            $order_de->customer_id =   Session::get('cid');
            $order_de->amount =  $sqls->count;
            $order_de->save();
        }

        DB::Table('tb_carts')->whereIn('cart_id',Session::get('cartid'))->delete();

        return redirect('ordertoship')->with('msg','สั่งซื้อสินค้าเรียบร้อยแล้ว');

    }


    
}
