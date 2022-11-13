<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;
use Storage;
use App\Models\customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer::all();
        $data = array('customer' => $customer, );
        return view('backend.account.customer', $data);
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
            'phone'                     => 'required|max:250|unique:App\Models\customer,customer_phone',
            'password'                  => 'required|max:250',
        ];
    
        $customMessages = [
            'name.required'             => 'กรุณากรอกชื่อจริง',
            'lname.required'            => 'กรุณากรอกนามสกุล',
            'required'                  => 'กรุณาใส่ข้อมูล',
            'phone.unique'              => 'เบอร์โทรนี้เคยถูกใช้งานมาก่อนแล้ว',
            'confirmed'                 => 'รหัสผ่านไม่ตรงกัน โปรดตรวจสอบอีกครั้ง'
        ];

        $this->validate($request, $rules, $customMessages);

        DB::beginTransaction();
        try {
            $count = customer::count();
            $count = $count+1;
            $customer = new customer();
            $customer->customer_name         = $request->name;
            $customer->customer_lname        = $request->lname;
            $customer->customer_phone        = $request->phone;
            $customer->customer_email        = $request->email;
            // $customer->customer_invate_id    = substr(md5(mt_rand()), 0, 8).'c'.$count;
            $customer->password              = Hash::make($request->password);
            $customer->save();

            DB::commit();
            return redirect('admin/customer')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/customer')->withError('Something Wrong! New Customer can not saved.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shutdownaccount()
    {
        //
        $customer = DB::Table('tb_shutdowns')->where('status',1)
                        ->leftJoin('tb_customers', 'tb_shutdowns.customer_id', '=', 'tb_customers.customer_id')->get();
        $data = array('customer' => $customer, );
        return view('backend.account.shutdown', $data);
    }

    public function confirmshutdown($id){
        $sql = DB::Table('tb_shutdowns')->where('id_shutdown',$id)->first();
        $idc = $sql->customer_id;
        DB::Table('tb_shutdowns')->where('id_shutdown',$id)->update(['status'=>2]);
        DB::Table('tb_customers')->where('customer_id',$idc)->update(['customer_status'=>1]);
        return redirect('admin/shutdownaccount')->with('success', 'Successful');
    }

    public function rejectshutdown(Request $request){
        $sql = DB::Table('tb_shutdowns')->where('id_shutdown',$request->ids)->first();
        $id = $sql->customer_id;
        DB::Table('tb_shutdowns')->where('id_shutdown',$request->ids)->update(['status'=>3,'reply'=>$request->reply]);
        return redirect('admin/shutdownaccount')->with('success', 'Successful');
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer::findOrFail($id);
        $data = array('customer' => $customer, );
        return view('backend.account.modal.editcustomer', $data);
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
            $customer = customer::findOrFail($id);
            $customer->customer_name         = $request->name;
            $customer->customer_lname        = $request->lname;
            $customer->customer_phone        = $request->phone;
            $customer->customer_email        = $request->email;
            if ($request->password != null) {
                $customer->password     = Hash::make($request->password);
            }
            $customer->save();

            DB::commit();
            return redirect('admin/customer')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/customer')->withError('Something Wrong! New Customer can not Updated.');
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
            $customer = customer::destroy($id);
            DB::commit();
            return redirect('admin/customer')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/customer')->withError('Something Wrong! New User can not Deleted.');
        }
    }
}
