<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $event = new Event();
            $event->event_merchant_id           = Auth::guard('merchant')->user()->merchant_id;
            $event->event_fs_id                 = $request->fs_id;
            $event->event_accept                = 1;
            $event->save();
            DB::commit();
            return redirect('merchant/index')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('merchant/index')->withError('Something Wrong! You can not registered this Event.');
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

    public function eventdecline($id)
    {
        DB::beginTransaction();
        try {
            $event = new Event();
            $event->event_merchant_id           = Auth::guard('merchant')->user()->merchant_id;
            $event->event_fs_id                 = $id;
            $event->event_accept                = 2;
            $event->save();
            DB::commit();
            return redirect('merchant/index')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('merchant/index')->withError('Something Wrong! You can not decline this Event.');
        }
    }
}
