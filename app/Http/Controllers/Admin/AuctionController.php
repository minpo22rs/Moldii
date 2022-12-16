<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use URL;
use App\Models\Auction;
use App\Models\Auction_detail;
use App\Models\product;
use App\Models\product_img;
use App\Models\category;
use App\Models\Merchant;

class AuctionController extends Controller
{
  
    public function index()
    {
        $auction = Auction::leftJoin('tb_products','tb_auctions.product_id','=','tb_products.product_id')->orderBy('tb_auctions.created_at','DESC')->get();
        $product = product::where('product_published',1)->get();
        $mer = Merchant::where('merchant_status',3)->get();
        $cat = category::where('deleted_at',null)->get();
        $s = DB::Table('tb_shipping_companys')->get();
        $data = array('auction' => $auction,'product'=>$product,'cat'=>$cat,'s'=>$s,'mer'=>$mer);
        return view('backend.auction.auctionlist', $data);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            if($request->type == 0){
                foreach($request->pid as $key => $item) {

                    $auction = new Auction();
                    $auction->code          = substr(md5(mt_rand()), 0, 8).'%A';
                    $auction->price         = $request->price;
                    
                    $auction->date_start      = $request->date_start;
                    $auction->time_start      = $request->time_start;
                    $auction->time_finish     = $request->time_finish;
                    $auction->product_id      = $item;
                   
                    $auction->save();
                }
    
            }else{
                        
                   

                    $product = new product();
                    $product->product_name          = $request->name;
                    $product->product_cat_id        = $request->category_id;
                    $product->product_description   = $request->description;
                    $product->weight                = $request->weight;
                    $product->width                 = $request->width;
                    $product->length                = $request->length;
                    $product->height                = $request->height;
                    $product->product_published     = 3;

                    $product->product_merchant_id   = $request->merchant_id;

                    $name = rand().time().'.'.$request->file('files')[0]->getClientOriginalExtension();
                    $request->file('files')[0]->storeAs('product_cover',$name);
                    $product->product_img = $name;


                    $product->save();


                    $auction = new Auction();
                    $auction->code                  = substr(md5(mt_rand()), 0, 8).'%A';
                    $auction->price                 = $request->price;

                    $auction->date_start            = $request->date_start;
                    $auction->time_start            = $request->time_start;
                    $auction->time_finish           = $request->time_finish;
                    $auction->created_by            = 0;
                    $auction->product_id            = $product->product_id;
                    $auction->save();
                    

                    foreach ($request->ship as $key => $value) {
              
                        DB::Table('tb_product_shippings')->insert(['id_company'=>$value,'id_product'=>$product->product_id]);
                        // DB::Table('tb_product_shippings')->insert(['id_company'=>$key,'id_product'=>$product->product_id,'cost'=>$value[0]]);
                        
                    }


                    $arr = $request->file('files');
                    array_shift($arr);

                    
                    if (count($request->file('files')) > 1)
                    {
                        
                        $img = $arr;
                        foreach($img as $key => $item) {
                            $image = new product_img();
                            $name = rand().time().'.'.$item->getClientOriginalExtension();
                            $item->storeAs('product_img',  $name);
                            $image->product_id  = $product->product_id;
                            $image->img_name  = $name;
                            $image->save();
                        }
                    }
            }
            
           


            DB::commit();
            return redirect('admin/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
     
            DB::rollback();
            return redirect('admin/auction')->withError('Something Wrong! New Content can not Saved.');
        }
    }

   
    public function detailauction($id,$t)
    {
        // if($t==0){

        //     $Auction = Auction::findOrFail($id);
        //     $ad = Auction_detail::where('id_auction',$id)->leftJoin('tb_products', 'tb_auction_details.product_id', '=', 'tb_products.product_id')->get();
        //     $id = $ad->pluck('product_id');
        //     $product = product::where('product_published',1)->whereNotIn('product_id',$id)->get();
        //     $data = array('Auction' => $Auction,'ad'=>$ad,'product'=>$product );
        //     return view('backend.auction.detailauction', $data);
        // }else{

        $auction = Auction::where('id_auction','=',$id)->leftJoin('tb_products', 'tb_auctions.product_id', '=', 'tb_products.product_id')->first();
        // $ad = Auction_detail::where('id_auction',$id)->leftJoin('tb_products', 'tb_auction_details.product_id', '=', 'tb_products.product_id')->first();
        $img  = DB::Table('tb_product_imgs')->where('product_id',$auction->product_id)->get();
        // dd($auction );
        $cat = category::where('deleted_at',null)->get();
        $data = array('auction' => $auction,'cat'=>$cat,'img'=>$img);
        return view('backend.auction.detailauctionmerchant', $data);
        // }
        
    }

  
    public function edit($id)
    {
        // dd($id);
        $aid= $id;
        // $Auction = Auction::findOrFail($id);
        $Auction = Auction::where('id_auction',$id)->leftJoin('tb_products', 'tb_auctions.product_id', '=', 'tb_products.product_id')->first();
        $s = DB::Table('tb_shipping_companys')->get();
        $cat = category::where('deleted_at',null)->get();
        $data = array('Auction' => $Auction,'id'=>$id ,'cat'=>$cat);

        return view('backend.auction.editauction', $data);
    }

    public function update(Request $request)
    {
        // dd($request->id);
        DB::beginTransaction();
        try {
            $auction = Auction::findOrFail($request->id);
            $auction->price                 = $request->price;

            $auction->date_start            = $request->date_start;
            $auction->time_start            = $request->time_start;
            $auction->time_finish           = $request->time_finish;
            $auction->save();

            $product = product::findOrFail( $request->pid);
            $product->product_name          = $request->name;
            $product->product_description   = $request->description;
            $product->weight                = $request->weight;
            $product->width                 = $request->width;
            $product->length                = $request->length;
            $product->height                = $request->height;
            $product->save();

            DB::commit();
            return redirect('admin/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
        
            DB::rollback();
         
            return redirect('admin/auction')->withError('Something Wrong! New can not Updated.');
        }
    }

  
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $new = Family::findOrFail($id);
            $image_path = Storage::delete('group_cover/'.$new->new_img);
            $new = Family::destroy($id);
            DB::commit();
            return redirect('admin/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/auction')->withError('Something Wrong! Your Content can not Deleted.');
        }
    }

    
}
