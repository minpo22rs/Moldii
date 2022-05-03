<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Merchant;
use DB;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchant = Merchant::leftJoin('districts', 'tb_merchants.merchant_tumbon', '=', 'districts.id')
                            ->leftJoin('amphures', 'tb_merchants.merchant_district', '=', 'amphures.id')
                            ->leftJoin('provinces', 'tb_merchants.merchant_province', '=', 'provinces.id')
                            ->select('tb_merchants.*','districts.name_th as tth','amphures.name_th as ath','provinces.name_th as pth')
                            ->where('merchant_id',Auth::guard('merchant')->user()->merchant_id)
                            
                            ->first();
        $province = DB::Table('provinces')->get();
        $tumbon = DB::Table('districts')->get();
        $amphure = DB::Table('amphures')->get();                                    
        $data = array('merchant' => $merchant,'province'=>$province,'tumbon'=>$tumbon,'amphure'=>$amphure );
        return view('merchant.account.profile', $data);
    }



    public function getAmphure(Request $request){
        $merchant = Merchant::findOrFail(Auth::guard('merchant')->user()->merchant_id);

        $amphures = DB::table('amphures')
            ->where('province_id',$request->v)
            ->get();
        $html = '<option value="">กรุณาเลือกเขต/อำเภอ</option>';
            foreach($amphures as $_amphures => $item){
                $html .=  '<option value="'.$item->id.'" >'.$item->name_th.'</option>';
            }
        echo $html;
    }

    public function getSubDistrict(Request $request){
        $merchant = Merchant::findOrFail(Auth::guard('merchant')->user()->merchant_id);

        $districts = DB::table('districts')
            ->where('amphure_id',$request->v)
            ->get();
        
        $html = '<option value="">กรุณาเลือกแขวง/ตำบล</option>';
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateprofile(Request $request)
    {
        $merchant = Merchant::findOrFail(Auth::guard('merchant')->user()->merchant_id);
        // $province = DB::Table('provinces')->where('id',$request->province)->first();
        // $tumbon = DB::Table('districts')->where('id',$request->tumbon)->first();
        // $amphure = DB::Table('amphures')->where('id',$request->amphure)->first();
        // dd($request->all());
        // if($request->tumbon){

        // }


        $merchant->merchant_shopname =  $request->sname;
        $merchant->merchant_name =  $request->fname;
        $merchant->merchant_lname =  $request->lname;
        $merchant->merchant_email =  $request->email;
        $merchant->merchant_phone =  $request->phone;
        $merchant->merchant_address =  $request->address;
        $merchant->merchant_tumbon =  $request->tumbon;
        $merchant->merchant_district =  $request->amphure;
        $merchant->merchant_province =  $request->province;
        $merchant->merchant_postcode =  $request->postcode;
        if ($request->file('cover') !== null)
            {
                $img = $request->file('cover');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('merchant',  $name);
                    $merchant->merchant_img  = $name;
                }
            }
        $merchant->save();

        return back()->with('success','อัพเดตข้อมูลเรียบร้อยแล้ว');

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
