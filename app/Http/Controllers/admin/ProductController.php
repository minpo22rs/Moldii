<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\category;
use App\Models\product;
use App\Models\product_img;
use App\Models\tag;
use App\Models\Option;

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

        // dd($request->all());
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
            $product->product_merchant_id   = 1;
            $product->weight                = $request->weight;
            $product->width                 = $request->width;
            $product->length                = $request->length;
            $product->height                = $request->height;


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
            return back()->with('success', 'Successful');
        } catch (\Throwable $th) {
            // dd($th);
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
        $cat = category::all();
        $product = product::where('product_cat_id', $id)->get();
        $data = array(
            'category' => $category, 
            'product' => $product, 
            'cat'=>$cat
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
        $category = category::all();
        $img = DB::Table('tb_product_imgs')->where('product_id',$id)->get();
        $data = array('product' => $product,'img'=>$img ,'category'=>$category);
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
            $product->weight                = $request->weight;
            $product->width                 = $request->width;
            $product->length                = $request->length;
            $product->height                = $request->height;

            if ($request->file('cover') !== null)
            {
                $imgcover = $request->file('cover');
                foreach($imgcover as $key => $item) {
                    // unlink('storage/app/product_cover/'.$product->product_img);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('product_cover',  $name);
                    $product->product_img = $name;
                }
            }
            $product->save();
            

            if($request->deletedkey != null){
                $imgcover = DB::Table('tb_product_imgs')->whereIn('product_img_id',$request->deletedkey)->get();

                foreach($imgcover as $key => $item) {
                    unlink('storage/app/product_img/'.$item->img_name);
                }
                
                DB::Table('tb_product_imgs')->whereIn('product_img_id',$request->deletedkey)->delete();

            }

            if ($request->file('sub_gallery') !== null)
            {
                $img = $request->file('sub_gallery');
                foreach($img as $key => $item) {
                    $image = new product_img();
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('product_img',  $name);
                    $image->product_id  = $product->product_id;
                    $image->img_name  = $name;
                    $image->save();
                }
            }


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
            return back()->with('success', 'Successful');
        } catch (\Throwable $th) {
            dd( $th);
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
            $product = product::findOrFail($id);
            $image_path = Storage::delete('product_cover/'.$product->product_img);
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

    public function deleteoldoptions($id)
    {
        DB::beginTransaction();
        try {
            Option::destroy($id);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
