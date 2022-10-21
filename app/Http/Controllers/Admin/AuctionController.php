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
use App\Models\category;

class AuctionController extends Controller
{
  
    public function index()
    {
        $auction = Auction::leftJoin('tb_products','tb_auctions.product_id','=','tb_products.product_id')->orderBy('tb_auctions.created_at','DESC')->get();
        $product = product::where('product_published',1)->get();
        $data = array('auction' => $auction,'product'=>$product);
        return view('backend.auction.auctionlist', $data);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
           
            foreach($request->pid as $key => $item) {

                $auction = new Auction();
                $auction->code     = substr(md5(mt_rand()), 0, 8).'%A';
                $auction->price      = $request->price;
                $auction->bit      = $request->bit;
                $auction->date_start      = $request->date_start;
                $auction->time_start      = $request->time_start;
                $auction->time_finish      = $request->time_finish;
                $auction->product_id      = $item;
               
                $auction->save();

                
                // $detail = new Auction_detail();
                // $detail->id_auction      = $auction->id_auction;
                // $detail->product_id      = $item;
                
                // $detail->save();
            }

           


            DB::commit();
            return redirect('admin/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollback();
            return redirect('admin/auction')->withError('Something Wrong! New Content can not Saved.');
        }
    }

   
    public function detailauction($id,$t)
    {
        if($t==0){

            $Auction = Auction::findOrFail($id);
            $ad = Auction_detail::where('id_auction',$id)->leftJoin('tb_products', 'tb_auction_details.product_id', '=', 'tb_products.product_id')->get();
            $id = $ad->pluck('product_id');
            $product = product::where('product_published',1)->whereNotIn('product_id',$id)->get();
            $data = array('Auction' => $Auction,'ad'=>$ad,'product'=>$product );
            return view('backend.auction.detailauction', $data);
        }else{

            $auction = Auction::where('id_auction','=',$id)->first();
            $ad = Auction_detail::where('id_auction',$id)->leftJoin('tb_products', 'tb_auction_details.product_id', '=', 'tb_products.product_id')->first();
            $img  = DB::Table('tb_product_imgs')->where('product_id',$ad->product_id)->get();
    
            $cat = category::where('deleted_at',null)->get();
            $data = array('auction' => $auction,'ad'=>$ad,'cat'=>$cat,'img'=>$img);
            return view('backend.auction.detailauctionmerchant', $data);
        }
        
    }

  
    public function edit($id)
    {
        // dd($id);
        $aid= $id;
        $Auction = Auction::findOrFail($id);
        $ad = Auction_detail::where('id_auction',$id)->leftJoin('tb_products', 'tb_auction_details.product_id', '=', 'tb_products.product_id')->get();
        $id = $ad->pluck('product_id');
        $product = product::where('product_published',1)->whereNotIn('product_id',$id)->get();
        $data = array('Auction' => $Auction,'ad'=>$ad,'product'=>$product,'id'=>$aid );
        return view('backend.auction.editauction', $data);
    }

    public function update(Request $request)
    {
        // dd($request->id);
        DB::beginTransaction();
        try {
            $auction = Auction::findOrFail($request->id);
            $auction->price                 = $request->price;
            $auction->bit                   = $request->bit;
            $auction->date_start            = $request->date_start;
            $auction->time_start            = $request->time_start;
            $auction->time_finish           = $request->time_finish;
            $auction->save();

            Auction_detail::where('id_auction',$request->id)->delete();

            foreach($request->pid as $key => $item) {
                $detail = new Auction_detail();
                $detail->id_auction      = $auction->id_auction;
                $detail->product_id      = $item;
                
                $detail->save();
            }

            foreach($request->epid as $key => $item) {
                $detail = new Auction_detail();
                $detail->id_auction      = $auction->id_auction;
                $detail->product_id      = $item;
                
                $detail->save();
            }

            DB::commit();
            return redirect('admin/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
            dd($th);
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
