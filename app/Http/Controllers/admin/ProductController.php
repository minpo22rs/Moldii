<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\category;
use App\Models\product;
use App\Models\tag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $count = product::count();
            $count = $count+1;
            $product = new product();
            $product->product_name          = $request->name;
            $product->product_cat_id        = $request->category_id;
            $product->product_description   = $request->description;
            $product->product_amount        = $request->amount;
            $product->product_price         = $request->price;
            $product->product_gpoint        = $request->gpoint;
            $product->product_bpoint        = $request->bpoint;
            $product->product_code          = substr(md5(mt_rand()), 0, 8).'%P'.$count;
            if ($request->file('cover') !== null)
            {
                $img = $request->file('cover');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('product_cover',  $name);
                    $product->product_img  = $name;
                }
            }
            $product->save();
            
            if ($request->tag != null) {
                foreach ($request->tag as $key => $value) {
                    $tag = new tag();
                    $tag->tag_name      = $value;
                    $tag->tag_fkey      = $product->product_id;
                    $tag->tag_type      = 'P';
                    $tag->save();
                }
            }

            DB::commit();
            return back()->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withError('Something Wrong! New Product can not Saved.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = category::findOrFail($id);
        $product = product::where('product_cat_id', $id)->get();
        $data = array(
            'category' => $category, 
            'product' => $product, 
        );
        return view('backend.product.product_index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::findOrFail($id);
        $data = array('product' => $product, );
        return view('backend.product.modal.edit_product', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $product = product::findOrFail($id);
            $product->product_name          = $request->name;
            $product->product_description   = $request->description;
            $product->product_amount        = $request->amount;
            $product->product_price         = $request->price;
            $product->product_gpoint        = $request->gpoint;
            $product->product_bpoint        = $request->bpoint;
            if ($request->file('cover') !== null)
            {
                $imgcover = $request->file('cover');
                foreach($imgcover as $key => $item) {
                    unlink('storage/app/product_cover/'.$product->product_img);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('product_cover',  $name);
                    $product->product_img = $name;
                }
            }
            $product->save();

            if ($request->edit_tag != null) {
                foreach ($request->edit_tag as $key => $value) {
                    $tag = new tag();
                    $tag->tag_name      = $value;
                    $tag->tag_fkey      = $id;
                    $tag->tag_type      = 'P';
                    $tag->save();
                }
            }

            DB::commit();
            return back()->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withError('Something Wrong! New Product can not Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $product = product::destroy($id);
            $tag = tag::where('tag_fkey', $id)->delete();

            DB::commit();
            return back()->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withError('Something Wrong! New Product can not Updated.');
        }
    }

    public function deleteoldtags($id)
    {
        DB::beginTransaction();
        try {
            $tag = tag::destroy($id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
