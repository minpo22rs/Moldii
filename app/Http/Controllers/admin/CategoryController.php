<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::all();
        $data = array('category' => $category, );
        return view('backend.product.category', $data);
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
            $category = new category;
            if ($request->file('cover') !== null)
            {
                $img = $request->file('cover');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('category_cover',  $name);
                    $category->cat_img  = $name;
                }
            }
            $category->cat_name      = $request->name;
            $category->cat_code      = $request->code;
            $category->save();

            DB::commit();
            return redirect('admin/category')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/category')->withError('Something Wrong! New Product can not saved.');
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
        $category = category::findOrFail($id);
        $data = array('category' => $category, );
        return view('backend.product.modal.edit_category', $data);
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
            $category = category::findOrFail($id);
            $category->cat_name     = $request->name;
            $category->cat_code     = $request->code;
            if ($request->file('cover') !== null)
            {
                $imgcover = $request->file('cover');
                foreach($imgcover as $key => $item) {
                    unlink('storage/app/category_cover/'.$category->cat_img);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('category_cover',  $name);
                    $category->cat_img = $name;
                }
            }
            $category->save();
            DB::commit();
            return redirect('admin/category')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/category')->withError('Something Wrong! New Product can not Updated.');
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
            $category = category::destroy($id);
            DB::commit();
            return redirect('admin/category')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/category')->withError('Something Wrong! New Product can not Deleted.');
        }
    }
}
