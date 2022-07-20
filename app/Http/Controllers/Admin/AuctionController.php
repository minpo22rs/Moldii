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

class AuctionController extends Controller
{
  
    public function index()
    {
        $auction = Auction::get();
        $product = product::where('product_published',1)->get();
        $data = array('auction' => $auction,'product'=>$product);
        return view('backend.auction.auctionlist', $data);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $auction = new Auction();
            $auction->code     = substr(md5(mt_rand()), 0, 8).'%A';
            $auction->price      = $request->price;
            $auction->bit      = $request->bit;
            $auction->date_start      = $request->date_start;
            $auction->time_start      = $request->time_start;
            $auction->time_finish      = $request->time_finish;
           
            $auction->save();
            foreach($request->pid as $key => $item) {
                $detail = new Auction_detail();
                $detail->id_auction      = $auction->id_auction;
                $detail->product_id      = $item;
                
                $detail->save();
            }

           


            DB::commit();
            return redirect('admin/auction')->with('success', 'Successful');
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollback();
            return redirect('admin/auction')->withError('Something Wrong! New Content can not Saved.');
        }
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $Family = Family::findOrFail($id);
        $data = array('Family' => $Family, );
        return view('backend.family.editfamily', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $Family = Family::findOrFail($id);
            $Family->name            = $request->name;
            $Family->description     = $request->description;
            $Family->type_group      = $request->type_group;
            if ($request->file('editnew') != null)
            {
                $img = $request->file('editnew');
                foreach($img as $key => $item) {
                    unlink('storage/app/group_cover/'.$Family->group_img);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('group_cover',  $name);
                    $Family->group_img = $name;
                }
            }
          
            $Family->save();

            DB::commit();
            return redirect('admin/familys')->with('success', 'Successful');
        } catch (\Throwable $th) {
          
            DB::rollback();
         
            return redirect('admin/familys')->withError('Something Wrong! New can not Updated.');
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
            return redirect('admin/familys')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/familys')->withError('Something Wrong! Your Content can not Deleted.');
        }
    }

    public function publishedgroup($id)
    {
        DB::beginTransaction();
        try {
            $news = Family::findOrFail($id);
            if ($news->published == 2) {
                $news->published          = 1;
            } else {
                $news->published          = 2;
            }
            $news->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
