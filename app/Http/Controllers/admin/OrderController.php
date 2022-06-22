<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Orders;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = DB::Table('tb_orders')->leftJoin('tb_customers', 'tb_orders.customer_id', '=', 'tb_customers.customer_id')->get();
        return view('backend.order.order')->with(['sql'=>$sql]);
    }

    public function tranfer()
    {
        $sql= DB::Table('tb_tranfers')->leftJoin('tb_customers', 'tb_tranfers.customer_id', '=', 'tb_customers.customer_id')
                    ->where('status',1)
                // ->leftJoin('tb_orders', 'tb_tranfers.id_order', '=', 'tb_orders.id_order')
                ->latest('tb_tranfers.created_at')->get();
        // dd( $sql);
        return view('backend.order.tranfer')->with(['sql'=>$sql]);
    }

    public function confirmslip($id)
    {
        // dd($request->all());
        DB::Table('tb_tranfers')->where('id_tranfer',$id)->update(['status'=>2]);
        return redirect('admin/tranfer')->with('success', 'Successful');
    }

    public function rejectslip(Request $request)
    {
        // dd($request->all());
        DB::Table('tb_tranfers')->where('id_tranfer',$request->oid)->update(['reason'=>$request->reason,'status'=>3]);
        return redirect('admin/tranfer')->with('success', 'Successful');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
