<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Voucher;
use Carbon\Carbon;
use App\Models\VoucherUsed;
use Helper;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = voucher::all();
        $current = Carbon::now();
        $data = array(
            'voucher' => $voucher, 
            'current' => $current, 
        );
        return view('backend.voucher.voucher', $data);
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
            $voucher = new Voucher();
            $voucher->voucher_name 	            = $request->name;
            $voucher->voucher_start 	        = Helper::convert_date_format($request->datestart);
            $voucher->voucher_expire   	        = Helper::convert_date_format($request->dateend).'T23:59:59';
            $voucher->voucher_use_for   	    = json_encode($request->canuse);
            $voucher->voucher_value   	        = $request->value;
            $voucher->voucher_note   	        = $request->note;
            $voucher->voucher_amount   	        = $request->amount;
            $voucher->voucher_unit   	        = $request->unit;
            $voucher->voucher_code   	        = substr(md5(mt_rand()), 0, 8);
            $voucher->save();
            
            DB::commit();
            return redirect('admin/voucher')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/voucher')->withError('Something Wrong! New Merchant can not saved.');
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
        $voucher = Voucher::findOrFail($id);
        $vused = VoucherUsed::where('vused_code', $voucher->voucher_code)->get();
        $data = array('vused' => $vused, );
        return view('backend.voucher.modal.voucher_history', $data);
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
