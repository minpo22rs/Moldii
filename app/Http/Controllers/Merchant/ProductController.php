<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\category;
use App\Models\product;
use App\Models\tag;
use App\Models\Option;
use App\Models\product_img;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();
        $product = product::where('product_merchant_id', Auth::guard('merchant')->user()->merchant_id)->get();
        $data = array(
            'category' => $category, 
            'product' => $product, 
        );
        return view('merchant.product.product', $data);
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
            $product->product_material      = $request->material;
            $product->product_description   = $request->description;
            $product->product_merchant_id   = Auth::guard('merchant')->user()->merchant_id;
            $product->product_amount        = $request->amount;
            $product->product_price         = $request->price;
            $product->product_gpoint        = $request->gpoint;
            if ($request->discount != null) {
                if ( ((float)$request->discount) >= ((float)$request->price)) {
                    return back()->withError('Discount can not be more or equal to the price!.');
                }else{
                    
                    $product->product_discount = $request->discount;
                }
            }
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

            if ($request->file('files') !== null)
            {
                $img = $request->file('files');
                foreach($img as $key => $item) {
                    $image = new product_img();
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('product_img',  $name);
                    $image->product_id  = $product->product_id;
                    $image->img_name  = $name;
                    $image->save();
                }
            }
            
            if ($request->option != null) {
                foreach ($request->option as $key => $item) {
                    $option = new Option();
                    $option->option_name      = $item;
                    $option->option_fkey      = $product->product_id;
                    $option->save();
                }
            }

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
            return redirect('merchant/product')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('merchant/product')->withError('Something Wrong! New Product can not Saved.');
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
        //
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
        return view('merchant.product.modal.edit_product', $data);
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
            
            if ($request->edit_option != null) {
                foreach ($request->edit_option as $key => $item) {
                    $option = new Option();
                    $option->option_name      = $item;
                    $option->option_fkey      = $id;
                    $option->save();
                }
            }

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
            return redirect('merchant/product')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('merchant/product')->withError('Something Wrong! New Product can not Updated.');
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
            $product = product::findOrFail($id);
            $image_path = Storage::delete('product_cover/'.$product->product_img);
            $product = product::destroy($id);
            $tag = tag::where('tag_fkey', $id)->delete();

            DB::commit();
            return redirect('merchant/product')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('merchant/product')->withError('Something Wrong! New Product can not Updated.');
        }
    }
}
