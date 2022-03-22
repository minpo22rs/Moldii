<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use URL;
use App\Models\banner;

class HomeSettingController extends Controller
{
    public function banner()
    {
        $banner = banner::all();
        $data = array('banner' => $banner, );
        return view('backend.home.banner', $data);
    }

    public function addbanner(Request $request)
    {
        DB::beginTransaction();
        try {
            $banner = new banner();
            $banner->banner_status 	 = 1;
            $banner->banner_type 	 = $request->bannertype;
            if ($request->file('img') !== null)
            {
                $img = $request->file('img');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('banner',  $name);
                    $banner->banner_name  = $name;
                }
            }
            $banner->save();
            DB::commit();
            return redirect('admin/banner')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/banner')->withError('Something Wrong! New Banner can not Saved.');
        }
    }

    public function editbanner($id)
    {
        // dd('asasdasdas');
        $banner = banner::findOrFail($id);
        $data = array('banner' => $banner, );
        return view('backend.home.modal.editbanner', $data);
    }

    public function updatebanner(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $banner = banner::findOrFail($id);
            $banner->banner_type 	 = $request->bannertype;

            if ($request->file('editbanner') !== null)
            {
                $imgbanner = $request->file('editbanner');
                foreach($imgbanner as $key => $item) {
                    unlink('storage/app/banner/'.$banner->banner_name);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('banner',  $name);
                    $banner->banner_name = $name;
                }
            }
            $banner->save();

            DB::commit();
            return redirect('admin/banner')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/banner')->withError('Something Wrong! New Banner can not Updated.');
        }
    }

    public function deletebanner($id)
    {
        DB::beginTransaction();
        try {
            $banner = banner::find($id);
            $image_path = Storage::delete('banner/'.$banner->banner_name);
            $banner = banner::destroy($id);
            DB::commit();
            return redirect('admin/banner')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/banner')->withError('Something Wrong! New Banner can not Deleted.');
        }
    }

    public function updatestatus($id)
    {
        DB::beginTransaction();
        try {
            $banner = banner::findOrFail($id);
            if ($banner->banner_status == 1) {
                $banner->banner_status  = 0;
            } else {
                $banner->banner_status  = 1;
            }
            $banner->save();

            DB::commit();
            return redirect('admin/banner')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/banner')->withError('Something Wrong! New Banner can not Updated.');
        }
    }
}
