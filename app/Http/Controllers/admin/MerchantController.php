<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use DB;
use Auth;
use Hash;
use Storage;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchant = Merchant::all();
        $p = DB::Table('provinces')->get();

        $data = array('merchant' => $merchant,'p'=>$p );
        return view('backend.account.merchant', $data);
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
            'lname'                     => 'required|max:250',
            'email'                     => 'required|max:250|unique:App\Models\Merchant,merchant_email',
            'password'                  => 'required|max:250',
        ];
    
        $customMessages = [
            'name.required'             => 'กรุณากรอกชื่อจริง',
            'lname.required'            => 'กรุณากรอกนามสกุล',
            'required'                  => 'กรุณาใส่ข้อมูล',
            'email.unique'              => 'อีเมลนี้เคยถูกใช้งานมาก่อนแล้ว',
            'confirmed'                 => 'รหัสผ่านไม่ตรงกัน โปรดตรวจสอบอีกครั้ง'
        ];

        $this->validate($request, $rules, $customMessages);

        DB::beginTransaction();
        try {
            $number = str_replace("-", "", $request->phone);

            $merchant = new Merchant();
            $merchant->merchant_shopname        = $request->shopname;
            $merchant->merchant_name            = $request->name;
            $merchant->merchant_lname           = $request->lname;
            $merchant->merchant_email           = $request->email;
            $merchant->password                 = Hash::make($request->password);
            $merchant->merchant_address           = $request->address;
            $merchant->merchant_tumbon           = $request->tumbon;
            $merchant->merchant_district           = $request->district;
            $merchant->merchant_province           = $request->province;
            $merchant->merchant_postcode           = $request->zip_code;
            $merchant->merchant_phone           = $number ;
            $merchant->merchant_type            = $request->type;
            $merchant->merchant_status            = 3;

            if ($request->img != null) {
                foreach ($request->img as $key => $value) {
                    $name = $value->getClientOriginalName();
                    $value->storeAs('merchant',  $name);
                    $merchant->merchant_img    = $name;
                }
            } else {
                $merchant->merchant_img        = 'noimg.jpg';
            }
            $merchant->save();

            DB::commit();
            return redirect('admin/merchant')->with('success', 'Successful');
        } catch (\Throwable $th) {
            // dd( $th);
            DB::rollback();
            return redirect('admin/merchant')->withError('Something Wrong! New Merchant can not saved.');
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
        $merchant = Merchant::findOrFail($id);
        $data = array('merchant' => $merchant, );
        return view('backend.account.modal.editmerchant', $data);
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
            $merchant = Merchant::findOrFail($id);
            $merchant->merchant_name        = $request->name;
            $merchant->merchant_lname       = $request->lname;
            $merchant->merchant_email       = $request->email;
            if ($request->password != null) {
                $merchant->password         = Hash::make($request->password);
            }
            if ($request->img != null) {
                if ($merchant->merchant_img != 'noimg.jpg') {
                    Storage::delete('merchant/'.$merchant->merchant_img);
                } 
                foreach ($request->img as $key => $value) {
                    $name = $value->getClientOriginalName();
                    $value->storeAs('merchant',  $name);
                    $merchant->merchant_img            = $name;
                }
            }
            $merchant->save();
            
            DB::commit();
            return redirect('admin/merchant')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/merchant')->withError('Something Wrong! Merchant can not Updated.');
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

    public function merchantindex()
    {
        return view('merchant.merchantindex');
    }


    public function getAmphure(Request $request){

        $amphures = DB::table('amphures')
            ->where('province_id',$request->v)
            ->get();
        $html = '<option value="">เลือกเขต/อำเภอ</option>';
            foreach($amphures as $_amphures => $item){
                $html .=  '<option value="'.$item->id.'">'.$item->name_th.'</option>';
            }
        echo $html;
    }

    public function getSubDistrict(Request $request){

        $districts = DB::table('districts')
            ->where('amphure_id',$request->v)
            ->get();
        
        $html = '<option value="">เลือกแขวง/ตำบล</option>';
        foreach($districts as $_districts => $item){
            $html .=  '<option value="'.$item->id.'">'.$item->name_th.'</option>';
        }
        echo $html;
    
    }

    public function getZipcode(Request $request){

        $districts = DB::table('districts')
            ->where('id',$request->v)
            ->first();
        // dd($districts );
           
        return $districts->zip_code;
    }
}
