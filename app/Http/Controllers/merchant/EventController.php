<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\EventApplicant;
use App\Models\Flashsale;
use App\Models\product;
use App\Models\EventSelect;

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
            $event = new EventApplicant();
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
        $fs = Flashsale::findOrFail($id);
        $product = product::where('product_merchant_id', Auth::guard('merchant')->user()->merchant_id)->get();
        $eventselect = EventSelect::where('event_sp_fs_id', $id)->where('event_sp_phase', 1)->get();
        $data = array(
            'fs' => $fs, 
            'product' => $product, 
            'eventselect' => $eventselect, 
        );
        return  view('merchant.event.eventdetail', $data);
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
            $event = new EventApplicant();
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

    public function event_selectproduct(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            if (!empty($request->event_id)) {
                foreach ($request->event_id as $key => $value_product) {
                    $item = EventSelect::findOrFail($value_product);
                    $item->event_sp_product_id      = $request['product'][$key];
                    $item->event_sp_value           = $request['discount'][$key];
                    $item->save();
                }
            }

            if (!empty($request->new_product)) {
                foreach ($request->new_product as $key => $value) {
                    $product_phase_count = EventSelect::where('event_sp_date', $request->date)
                    ->where('event_sp_phase', $request->time)
                    ->where('event_sp_merchant_id', Auth::guard('merchant')->user()->merchant_id)->count();
                    if ($product_phase_count < 3) {
                        $event = new EventSelect();
                        $event->event_sp_product_id     = $value;
                        $event->event_sp_value          = $request->new_discount[$key];
                        $event->event_sp_fs_id          = $id;
                        $event->event_sp_phase          = $request->time;
                        $event->event_sp_date           = $request->date;
                        $event->event_sp_merchant_id    = Auth::guard('merchant')->user()->merchant_id;
                        $event->save();
                    }
                }
            }
            
            DB::commit();
            return back()->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Something Wrong! You can not add your product this Event.');
        }
    }

    public function selectphase(Request $request)
    {
        $product['data'] = EventSelect::where('event_sp_date', $request->date)
        ->where('event_sp_phase', $request->time)
        ->where('event_sp_merchant_id', Auth::guard('merchant')->user()->merchant_id)->get();
        return response()->json($product);
    }
}
