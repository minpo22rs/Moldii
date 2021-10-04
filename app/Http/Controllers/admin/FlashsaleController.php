<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use DB;
use Storage;
use App\Models\Merchant;
use App\Models\Flashsale;
use Helper;

class FlashsaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fs = Flashsale::where('fs_type', 'FS')->orderBy('fs_id', 'DESC')->get();
        $data = array('fs' => $fs, );
        return view('backend.home.flashsale', $data);
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
            $fs = new Flashsale();
            $fs->fs_name                    = $request->name;
            $fs->fs_datestart               = Helper::convert_date_format($request->datestart);
            $fs->fs_dateend                 = Helper::convert_date_format($request->dateend);
            $fs->fs_regis_start             = Helper::convert_date_format($request->regis_datestart);
            $fs->fs_regis_end               = Helper::convert_date_format($request->regis_dateend);
            $fs->fs_content                 = $request->content;
            $fs->fs_maximum_sale            = $request->maxsale;
            $fs->fs_type                    = $request->type;
            if ($request->img != null) {
                $img = $request->file('img');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('flashsale',  $name);
                    $fs->fs_img  = $name;
                }
            }
            $fs->save();
            DB::commit();
            return redirect('admin/flashsale')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/flashsale')->withError('Something Wrong! New Flash sale can not saved.');
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
        $data = array('fs' => $fs, );
        return view('backend.home.modal.viewcontent', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fs = Flashsale::findOrFail($id);
        $data = array('fs' => $fs, );
        return view('backend.home.modal.editflashsale', $data);
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
            $fs = Flashsale::findOrFail($id);
            $fs->fs_name                    = $request->name;
            $fs->fs_datestart               = Helper::convert_date_format($request->datestart);
            $fs->fs_dateend                 = Helper::convert_date_format($request->dateend);
            $fs->fs_regis_start             = Helper::convert_date_format($request->regis_datestart);
            $fs->fs_regis_end               = Helper::convert_date_format($request->regis_dateend);
            $fs->fs_content                 = $request->content;
            $fs->fs_maximum_sale            = $request->maxsale;
            if ($request->password != null) {
                $fs->password         = Hash::make($request->password);
            }
            if ($request->file('editbanner') != null)
            {
                $img = $request->file('editbanner');
                foreach($img as $key => $item) {
                    unlink('storage/app/flashsale/'.$fs->fs_img);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('flashsale',  $name);
                    $fs->fs_img = $name;
                }
            }
            $fs->save();
            DB::commit();
            return redirect('admin/flashsale')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/flashsale')->withError('Something Wrong! Flash sale can not Updated.');
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
            $fs = Flashsale::findOrFail($id);
            $image_path = Storage::delete('flashsale/'.$fs->fs_img);
            $fs = Flashsale::destroy($id);
            DB::commit();
            return redirect('admin/flashsale')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/flashsale')->withError('Something Wrong! Flash sale can not Deleted.');
        }
    }

    public function searchproduct(Request $request)
    {
        $data = Merchant::all();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('name', function($row){
            $name = $row->merchant_name.' '.$row->merchant_lname;
            return $name;
        })
        ->addColumn('img', function($row){
            $imgtag = asset('storage/app/merchant/'.$row->merchant_img.'');
            $img = '<img src="'.$imgtag.'" class="img-fluid" width="150px" height="150px"> ';
            return $img;
        })
        ->addColumn('action', function($row){
            $switchs = '<label class="switch"><label class="switch"><input type="checkbox" name="published" data-ignore="'.$row->merchant_id.'" class="published ignore" checked><span class="slider round"></span></label></label>';
            return $switchs;
        })
        ->rawColumns(['img','name', 'action'])
        ->make(true);
    }
}
