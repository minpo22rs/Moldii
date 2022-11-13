<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DataTables;
use App\Models\product;

class BestSellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = product::all();
        // return Datatables::of($data)
        // ->addIndexColumn()
        // ->addColumn('img', function($row){
        //     $imgtag = asset('storage/app/product_cover/'.$row->product_img.'');
        //     $img = '<img src="'.$imgtag.'"  width="150px" height="150px"> ';
        //     return $img;
        // })
        // ->addColumn('action', function($row){
        //     $btn = '<input type="checkbox" id="item_'.$row->product_id.'" class="status" value="'.$row->product_id.'">';
        //     return $btn;
        // })
        // ->rawColumns(['action','img'])
        // ->make(true);

        return view('backend.home.bestseller');
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
        //
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
        //
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

    public function updatebestseller($id)
    {
        DB::beginTransaction();
        try {
            $product = product::findOrFail($id);
            if ($product->product_bestseller == 1) {
                $product->product_bestseller = 0;
            }
            if ($product->product_bestseller == 0) {
                $product->product_bestseller = 1;
            }
            $product->save();
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
