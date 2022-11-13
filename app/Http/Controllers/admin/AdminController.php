<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Storage;
use Helper;
use App\Models\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Admin::all();
        $data = array('employee' => $employee, );
        return view('backend.account.employee', $data);
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
            'email'                     => 'required|max:250|unique:App\Models\Admin,admin_email',
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
            $employee = new Admin();
            $employee->admin_name           = $request->name;
            $employee->admin_lname          = $request->lname;
            $employee->admin_gender         = $request->gender;
            $employee->admin_birthday       = Helper::convert_date_format($request->birthday);
            $employee->admin_phone          = $request->phone;
            $employee->admin_email          = $request->email;
            $employee->password             = Hash::make($request->password);
            if ($request->img != null) {
                foreach ($request->img as $key => $value) {
                    $name = $value->getClientOriginalName();
                    $value->storeAs('profile',  $name);
                    $employee->admin_img    = $name;
                }
            } else {
                $employee->admin_img        = 'noimg.jpg';
            }
            $employee->save();

            DB::commit();
            return redirect('admin/employee')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/employee')->withError('Something Wrong! New User can not saved.');
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
        $employee = Admin::findOrFail($id);
        $data = array('employee' => $employee, );
        return view('backend.account.modal.editemployee', $data);
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
            $employee = Admin::findOrFail($id);
            $employee->admin_name           = $request->name;
            $employee->admin_lname          = $request->lname;
            $employee->admin_email          = $request->email;
            $employee->admin_gender         = $request->gender;
            $employee->admin_birthday       = Helper::convert_date_format($request->birthday);
            $employee->admin_phone          = $request->phone;
            if ($request->password != null) {
                $employee->password         = Hash::make($request->password);
            }
            if ($request->editimg != null) {
                if ($employee->admin_img != 'noimg.jpg') {
                    Storage::delete('profile/'.$employee->admin_img);
                } 
                foreach ($request->editimg as $key => $value) {
                    $name = $value->getClientOriginalName();
                    $value->storeAs('profile',  $name);
                    $employee->admin_img            = $name;
                }
            }
            $employee->save();
            
            DB::commit();
            return redirect('admin/admin')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/admin')->withError('Something Wrong! User can not Updated.');
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
            $employee = Admin::findOrFail($id);
            Storage::delete('profile/'.$employee->admin_img);
            $employee = Admin::destroy($id);
            DB::commit();
            return redirect('admin/employee')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/employee')->withError('Something Wrong! New User can not Deleted.');
        }
    }
}
