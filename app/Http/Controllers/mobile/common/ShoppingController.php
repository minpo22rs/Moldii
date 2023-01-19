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
        $cat = DB::Table('tb_category')->where('cat_id',$id)->first();

        return view('mobile.member.common.content.shopping.shopping_1')->with(['product'=>$product,'id'=>$id,'cat'=>$cat]);
    }

    public function latest($id)
    {
        $product = DB::Table('tb_products')->where('product_cat_id',$id)->where('product_published',1)->orderBy('created_at','DESC')->get();
        // dd($c);
        $cat = DB::Table('tb_category')->where('cat_id',$id)->first();

        return view('mobile.member.common.content.shopping.shopping_1')->with(['product'=>$product,'id'=>$id,'cat'=>$cat]);
    }

    public function bestseller($id)
    {

        $sql = DB::Table('tb_order_details')->select(DB::raw('COUNT(product_id) as count'),'product_id')
                    ->groupBy('product_id')->orderBy('count','DESC')->limit(3)->get();

        $product = DB::Table('tb_products')->whereIn('product_id',$sql->pluck('product_id'))
                    ->where('product_cat_id',$id)->where('product_published',1)->get();
        $cat = DB::Table('tb_category')->where('cat_id',$id)->first();
        // dd($c);

        return view('mobile.member.common.content.shopping.shopping_1')->with(['product'=>$product,'id'=>$id,'cat'=>$cat]);
    }

    public function product($id)
    {
        $product = DB::Table('tb_products')->where('product_id',$id)->first();
        $productcat = DB::Table('tb_products')->where('product_cat_id',$product->product_cat_id)->where('product_published',1)->get();
        $store = DB::Table('tb_merchants')->where('merchant_id', $product->product_merchant_id)->first();
        $productstore = DB::Table('tb_products')->where('product_merchant_id',$store->merchant_id)->get();
        $detail = DB::Table('tb_order_details')->where('product_id',$id)->get();
        $imggal = DB::Table('tb_product_imgs')->where('product_id',$id)->get();
        $review = DB::Table('tb_reviews')->where('product_id',$id)
                    ->leftJoin('tb_customers','tb_reviews.customer_id','=','tb_customers.customer_id')->get();
        $like = DB::Table('tb_content_likes')->where('content_id',$id)->where('customer_id',Session::get('cid'))->first();

        // dd($productcat->count());
        return view('mobile.member.common.content.shopping.shopping_2')->with(['product'=>$product,'productcat'=>$productcat,'store'=>$store,'productstore'=>$productstore,'detail'=>$detail,'imggal'=>$imggal,'review'=>$review,'like'=>$like]);
    }


    public function merchant($id)
    {

        // dd($id);
        $category = DB::Table('tb_category')->get();
        $merchant = DB::Table('tb_merchants')->where('merchant_id',$id)->first();
        $product = DB::Table('tb_products')->where('product_merchant_id',$id)->where('product_published',1)->limit(8)->get();
        $productnew = DB::Table('tb_products')->where('product_merchant_id',$id)->orderBy('created_at','DESC')->where('product_published',1)->limit(8)->get();
        $img = DB::Table('tb_banner_promote_store')->where('merchant_id',$id)->orderBy('index_of','DESC')->get();
        // dd($product);
        $productstore = DB::Table('tb_products')->where('product_merchant_id',$id)->get();

        return view('mobile.member.common.content.shopping.shopping_7')->with(['product'=>$product,'merchant'=>$merchant,'category'=>$category,'productnew'=>$productnew,'img'=>$img,'productstore'=>$productstore]);
    }



    public function likeproduct(Request $request){
        $sql = DB::Tbale('tb_content_likes')->where('customer_id',Session::get('cid'))
                    ->where('type_like','P')->where('content_id',$request->id)->first();
        if($sql ==null){
            DB::Table('tb_content_likes')->insert(['customer_id'=>Session::get('cid'),'content_id'=>$request->id,'type_like'=>'P']);

        }


        return 1 ;
    }

    public function unlikeproduct(Request $request){

        DB::Table('tb_content_likes')->where('customer_id',Session::get('cid'))->where('content_id',$request->id)->delete();


        return 1 ;
    }

}
