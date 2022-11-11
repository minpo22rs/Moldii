<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use URL;
use App\Models\Auction;
use App\Models\Auction_detail;
use App\Models\product;
use Auth;
use App\Models\category;
use App\Models\product_img;

class MerchantAuctionController extends Controller
{
  
    public function index()
    {
        $auction = Auction::where('created_by','=',Auth::guard('merchant')->user()->merchant_id)->get();
        $product = product::where('product_published',1)->get();
        $cat = category::where('deleted_at',null)->get();
        $data = array('auction' => $auction,'product'=>$product,'cat'=>$cat);
        return view('merchant.auction.auctionlist', $data);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {

            $auction = new Auction();
            $auction->code                  = substr(md5(mt_rand()), 0, 8).'%A';
            $auction->price                 = $request->price;
            $auction->bit                   = $request->bit;
            $auction->date_start            = $request->date_start;
            $auction->time_start            = $request->time_start;
            $auction->time_finish           = $request->time_finish;
            $auction->created_by            = Auth::guard('merchant')->user()->merchant_id;
            $auction->save();


            $product = new product();
            $product->product_name          = $request->name;
            $product->product_cat_id        = $request->category_id;
            $product->product_description   = $request->description;
            $product->weight                = $request->weight;
            $product->width                 = $request->width;
            $product->length                = $request->length;
            $product->height                = $request->height;
            $product->product_published     = 3;
            $product->product_merchant_id   = Auth::guard('merchant')->user()->merchant_id;


            $name = rand().time().'.'.$request->file('files')[0]->getClientOriginalExtension();
            $request->file('files')[0]->storeAs('product_cover',$name);
            $product->product_img = $name;


            $product->save();

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


            DB::commit();
            return redirect('merchant/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollback();
            return redirect('merchant/auction')->withError('Something Wrong! New Content can not Saved.');
        }
    }

   
    public function detailauction($id)
    {
        $auction = Auction::where('id_auction','=',$id)->first();
        $ad = Auction_detail::where('id_auction',$id)->leftJoin('tb_products', 'tb_auction_details.product_id', '=', 'tb_products.product_id')->first();
        $img  = DB::Table('tb_product_imgs')->where('product_id',$ad->product_id)->get();

        $cat = category::where('deleted_at',null)->get();
        $data = array('auction' => $auction,'ad'=>$ad,'cat'=>$cat,'img'=>$img);
        return view('merchant.auction.detailauction', $data);
    }

  
    public function edit($id)
    {
        $Auction = Auction::findOrFail($id);
        $ad = Auction_detail::where('id_auction',$id)->leftJoin('tb_products', 'tb_auction_details.product_id', '=', 'tb_products.product_id')->first();
        $cat = category::where('deleted_at',null)->get();
        $data = array('Auction' => $Auction,'ad'=>$ad,'id'=>$id ,'ad'=>$ad,'cat'=>$cat);
        return view('merchant.auction.editauction', $data);
    }

    public function update(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $auction = Auction::findOrFail( $request->id);
            $auction->price             = $request->price;
            $auction->bit               = $request->bit;
            $auction->date_start        = $request->date_start;
            $auction->time_start        = $request->time_start;
            $auction->time_finish       = $request->time_finish;
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
            return redirect('merchant/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
         
            return redirect('merchant/auction')->withError('Something Wrong! New can not Updated.');
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
            return redirect('merchant/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('merchant/auction')->withError('Something Wrong! Your Content can not Deleted.');
        }
    }

    
}
