<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use URL;
use App\Models\Flashsale;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hd = Flashsale::where('fs_type', 'HD')->orderBy('fs_id', 'DESC')->get();
        $data = array('hd' => $hd, );
        return view('backend.home.promotion', $data);
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
            $promotion = new promotion();
            $promotion->promotion_status 	 = 1;
            if ($request->file('img') !== null)
            {
                $img = $request->file('img');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('promotion',  $name);
                    $promotion->promotion_img  = $name;
                }
            }
            $promotion->save();
            DB::commit();
            return redirect('admin/promotion')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/promotion')->withError('Something Wrong! New Promotion can not Saved.');
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
        $promotion = promotion::findOrFail($id);
        $data = array('promotion' => $promotion, );
        return view('backend.home.modal.editpromotion', $data);
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
            $promotion = promotion::findOrFail($id);
            if ($request->file('editpromotion') !== null)
            {
                $img = $request->file('editpromotion');
                foreach($img as $key => $item) {
                    unlink('storage/app/promotion/'.$promotion->promotion_img);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('promotion',  $name);
                    $promotion->promotion_img = $name;
                }
            }
            $promotion->save();

            DB::commit();
            return redirect('admin/promotion')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/promotion')->withError('Something Wrong! New Promotion can not Updated.');
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
            $promotion = promotion::findOrFail($id);
            $image_path = Storage::delete('promotion/'.$promotion->promotion_img);
            $promotion = promotion::destroy($id);

            DB::commit();
            return redirect('admin/promotion')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/promotion')->withError('Something Wrong! New Banner can not Deleted.');
        }
    }
}
