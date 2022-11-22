<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\notification;
use Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requeststore()
    {
        $merchant = Merchant::where('merchant_status',1)->orderBy('created_at','DESC')->get();

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
    
        $merchant = Merchant::where('merchant_id',$request->id)->update(['merchant_status'=>$request->status]);
        $noti = new notification();
        if($request->status == 3){
            $noti->noti_title       = 'อนุมัติการเปิดร้านค้าบนแอปพลิเคชัน Moldii';

        }else{
            $noti->noti_title       = 'ปฏิเสธการเปิดร้านค้าบนแอปพลิเคชัน Moldii';

        }
        $noti->noti_date        = date('Y-m-d');
        $noti->status_store      = $request->status;
        // $noti->noti_detail      = $request->detail;
        $noti->noti_create_by   = Auth::user()->admin_id;
        $noti->save();
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
