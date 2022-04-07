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
    public function index(Request $request)
    {
        // dd(Session::all());
        // dd($request->all());
        // $order = new Tb_order();

        // $order->customer_id = $request->cid;
        // $order->order_total  = $request->total;
        // $order->save();


        // $order_de = new Tb_order_detail();
        // $order_de->order_id = $order->order_id;
        // $order_de->product_id  = $request->id;
        // $order_de->store_id  = $request->store_id;
        // $order_de->price  = $request->total;
        // $order_de->save();

        return view('mobile.member.userAccount.my_list.shoppingCart');
    }
    
}
