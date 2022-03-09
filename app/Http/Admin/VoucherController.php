<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Voucher;
use Carbon\Carbon;
use App\Models\VoucherUsed;
use Helper;
use App\Models\Merchant;
use App\Models\notification;
use Auth;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = Voucher::all();
        $current = Carbon::now();
        $merchant = Merchant::all();
        $data = array(
            'voucher' => $voucher, 
            'current' => $current, 
            'merchant' => $merchant, 
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
        $rules = [
            'name'                      => 'required|max:250',
            'datestart'                 => 'required|max:250',
            'dateend'                   => 'required|max:250',
            'canuse'                    => 'required|max:250',
            'value'                     => 'required|max:250',
            'amount'                    => 'required|max:250',
        ];
    
        $customMessages = [
            'name.required'             => 'กรุณากรอกชื่อ',
            'datestart.required'        => 'กรุณากรอกวันเริ่มต้นใช้งาน',
            'dateend.required'          => 'กรุณากรอกวันสิ้นสุดใช้งาน',
            'canuse.required'           => 'กรุณาเลือกวัตถุประสงค์การใช้งาน',
            'value.required'            => 'กรุณากรอกมูลค่า',
            'amount.required'           => 'กรุณากรอกจำนวน',
            'required'                  => 'กรุณาใส่ข้อมูล',
        ];

        $this->validate($request, $rules, $customMessages);
        
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
            $voucher->voucher_partner   	    = json_encode($request->partner);
            $voucher->voucher_code   	        = substr(md5(mt_rand()), 0, 8);
            $voucher->save();

            if ($request->announcer == 1) {
                $noti = new notification();
                $noti->noti_title       = $request->name;
                $noti->noti_date        = Helper::convert_date_format($request->datestart);
                $noti->noti_detail      = $request->note;
                $noti->noti_create_by   = Auth::user()->admin_id;
                $noti->save();
            }
            
            DB::commit();
            return redirect('admin/voucher')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/voucher')->withError('Something Wrong! New Voucher can not saved.');
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
        $voucher = Voucher::findOrFail($id);
        $merchant = Merchant::all();
        $data = array(
            'voucher' => $voucher, 
            'merchant' => $merchant, 
        );
        return view('backend.voucher.modal.editvoucher', $data);
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
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
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
        //
    }

    public function Voucher_check(Request $request)
    {
        $voucher = Voucher::where('voucher_code', $request->code)->first();
        $current = Carbon::now();
        if ($voucher != null && Carbon::create($current)->between($voucher->voucher_start, $voucher->voucher_expire)) {
            return 'Voucher can useing';
        } else {
            return 'Voucher can not useing';
        }
        
    }

    public function Voucher_useing(Request $request)
    {
        DB::beginTransaction();
        try {
            $voucher = Voucher::where('voucher_code', $request->code)->first();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
