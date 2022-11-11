<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\banner_store;
use Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = banner_store::where('merchant_id',Auth::guard('merchant')->user()->merchant_id)->get();
        $data = array('banner' => $banner, );
        return view('merchant.banner.banner', $data);
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
    public function addbanner(Request $request)
    {
        //
        DB::beginTransaction();
        try {
            banner_store::where('index_of',$request->bannertype)->where('merchant_id',Auth::guard('merchant')->user()->merchant_id)->delete();
            $banner = new banner_store();
            $banner->index_of 	 = $request->bannertype;
            $banner->merchant_id   = Auth::guard('merchant')->user()->merchant_id;


            $name = rand().time().'.'.$request->file('img')->getClientOriginalExtension();
            $request->file('img')->storeAs('banner_store',$name);
            $banner->banner_promote_img = $name;

            $banner->save();
            DB::commit();
            return redirect('merchant/banner')->with('success', 'Successful');
        } catch (\Throwable $th) {
            
            DB::rollback();
            return redirect('merchant/banner')->withError('Something Wrong! New Banner can not Saved.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editbanner($id)
    {
        //
       
        $banner = banner_store::findOrFail($id);
        $data = array('banner' => $banner, );
        return view('merchant.banner.modal.banner_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        DB::beginTransaction();
        try {

            // dd($request->all());
            $banner = banner_store::findOrFail($request->id);

            unlink('storage/app/banner_store/'.$banner->banner_promote_img);
            $name = rand().time().'.'.$request->file('img')->getClientOriginalExtension();
            $request->file('img')->storeAs('banner_store',$name);
            $banner->banner_promote_img = $name;

            $banner->save();


            DB::commit();
            return redirect('merchant/banner')->with('success', 'Successful');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('merchant/banner')->withError('Something Wrong! New Banner can not Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bannerdelete($id)
    {
        //
        // dd($id);
        DB::beginTransaction();
        try {
            banner_store::where('id_banner_promote',$id)->delete();


            DB::commit();
            return back()->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->withError('Something Wrong! New Banner can not Updated.');
        }


    }
}
