<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\category;
use App\Models\product;

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
            $product = new product();
            $product->product_name          = $request->name;
            $product->product_cat_id        = $request->category_id;
            $product->product_material      = $request->material;
            $product->product_description   = $request->description;
            $product->product_merchant_id   = Auth::guard('merchant')->user()->merchant_id;
            $product->product_amount        = $request->amount;
            $product->product_price         = $request->price;
            $product->product_gpoint        = $request->gpoint;
            $product->product_bpoint        = $request->bpoint;
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
            
            // if ($request->tag != null) {
            //     foreach ($request->tag as $key => $value) {
            //         $tag = new tag();
            //         $tag->tag_name      = $value;
            //         $tag->tag_fkey      = $product->product_id;
            //         $tag->save();
            //     }
            // }

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
