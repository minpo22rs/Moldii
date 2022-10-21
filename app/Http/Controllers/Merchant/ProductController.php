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
        $s = DB::Table('tb_shipping_companys')->get();
        $data = array(
            'category' => $category, 
            'product' => $product, 
            's' => $s, 
        );
        // dd($s);
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
        // dd($request->all());
       
        DB::beginTransaction();

        
        try {
            $count = product::count();
            $count = $count+1;
            $product = new product();
            $product->product_name          = $request->name;
            $product->product_cat_id        = $request->category_id;
            // $product->product_material      = $request->material;
            $product->product_description   = $request->description;
            $product->product_merchant_id   = Auth::guard('merchant')->user()->merchant_id;
            $product->product_amount        = $request->amount;
            $product->product_price         = $request->price;
            // $product->product_gpoint        = $request->gpoint;
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
           

            $name = rand().time().'.'.$request->file('files')[0]->getClientOriginalExtension();
            $request->file('files')[0]->storeAs('product_cover',$name);
            $product->product_img = $name;



            $product->save();
           

            foreach ($request->ship as $key => $value) {
              
                DB::Table('tb_product_shippings')->insert(['id_company'=>$key,'id_product'=>$product->product_id,'cost'=>$value[0]]);
                
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
            dd($th);
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
        $s = DB::Table('tb_product_shippings')->leftJoin('tb_shipping_companys','tb_product_shippings.id_company','=','tb_shipping_companys.id_shipping_company')->where('id_product','=',$id)->get();
        $img = DB::Table('tb_product_imgs')->where('product_id',$id)->get();
        $category = category::all();
        
        $data = array('product' => $product,'s'=>$s,'img'=>$img, 'category' => $category, );
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

        // dd($request->all());
        DB::beginTransaction();
        try {
            $product = product::findOrFail($id);
            $product->product_name          = $request->name;
            $product->product_description   = $request->description;
            $product->product_amount        = $request->amount;
            $product->product_price         = $request->price;
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

            if(isset($request->ship)){
                foreach ($request->ship as $key => $value) {
                    DB::Table('tb_product_shippings')->where('id_company',$key)->where('id_product',$product->product_id)->update(['cost'=>$value[0]]);
                }
            }

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
