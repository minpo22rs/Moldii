<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\notification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noti = notification::all();
        $data = array('noti' => $noti, );
        return view('backend.notification.notification', $data);
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
            $rawdate = $request->date;
            $date = explode('/', $rawdate);

            $noti = new notification();
            $noti->noti_title       = $request->title;
            $noti->noti_date        = $date[2].'-'.$date[1].'-'.$date[0];
            $noti->noti_detail      = $request->detail;
            $noti->noti_create_by   = Auth::user()->admin_id;
            $noti->save();
            DB::commit();
            return redirect('admin/notification')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/notification')->withError('Something Wrong! New Notification can not saved.');
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
        $noti = notification::findOrFail($id);
        $data = array('noti' => $noti, );
        return view('backend.notification.modal.editnotification', $data);
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
            $rawdate = $request->date;
            $date = explode('/', $rawdate);

            $noti = new notification();
            $noti->noti_title       = $request->title;
            $noti->noti_date        = $date[2].'-'.$date[1].'-'.$date[0];
            $noti->noti_detail      = $request->detail;
            $noti->save();
            DB::commit();
            return redirect('admin/notification')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/notification')->withError('Something Wrong! Notification can not Updated.');
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
            $noti = notification::destroy($id);
            DB::commit();
            return redirect('admin/notification')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/notification')->withError('Something Wrong! Notification can not Deleted.');
        }
    }
}
