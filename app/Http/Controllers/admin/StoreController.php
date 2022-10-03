<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requeststore()
    {
        $merchant = Merchant::where('merchant_status',1)->get();

        return view('backend.store.store')->with(['merchant'=>$merchant]);
        //
    }


    public function store_detail($id)
    {
        $merchant = Merchant::where('merchant_id',$id)
                            ->leftJoin('districts', 'tb_merchants.merchant_tumbon', '=', 'districts.id')
                            ->leftJoin('amphures', 'tb_merchants.merchant_district', '=', 'amphures.id')
                            ->leftJoin('provinces', 'tb_merchants.merchant_province', '=', 'provinces.id')
                            ->select('tb_merchants.*','districts.name_th as tth','amphures.name_th as ath','provinces.name_th as pth')
                            ->first();
        $data = array('merchant' => $merchant, );
        return view('backend.store.store_detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusstore(Request $request)
    {
        dd( $request->all());
        $merchant = Merchant::where('merchant_id',$request->id)->update(['merchant_status'=>$request->status]);
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
}
