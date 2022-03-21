<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class ShoppingController extends Controller
{
    
    public function category($id)
    {
        $product = DB::Table('tb_products')->where('product_cat_id',$id)->where('product_published',1)->get();
        // dd($c);
       
        return view('mobile.member.common.content.shopping.shopping_1')->with(['product'=>$product]);
    }

    public function product($id)
    {
        $product = DB::Table('tb_products')->where('product_id',$id)->first();
        $productcat = DB::Table('tb_products')->where('product_cat_id',$product->product_cat_id)->where('product_published',1)->get();
        $store = DB::Table('tb_merchants')->where('merchant_id', $product->product_merchant_id)->first();
        $productstore = DB::Table('tb_products')->where('product_merchant_id',$store->merchant_id)->get();
        $detail = DB::Table('tb_order_details')->where('product_id',$id)->get();
        // dd($productcat->count());
        return view('mobile.member.common.content.shopping.shopping_2')->with(['product'=>$product,'productcat'=>$productcat,'store'=>$store,'productstore'=>$productstore,'detail'=>$detail]);
    }


    
    
}
