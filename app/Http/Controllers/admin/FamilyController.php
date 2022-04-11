<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use URL;
use App\Models\Family;

class FamilyController extends Controller
{
  
    public function index()
    {
        $Family = Family::get();
        $data = array('Family' => $Family);
        return view('backend.family.familylist', $data);
    }


    public function store(Request $request)
    {
        dd($request->all());
        DB::beginTransaction();
        try {
            $Family = new Family();
            $Family->name            = $request->name;
            $Family->description     = $request->description;
            $Family->type_group      = $request->type_group;
            if ($request->file('img') !== null)
            {
                $img = $request->file('img');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('group_cover',  $name);
                    $Family->group_img = $name;
                }
            }
            $Family->save();
            DB::commit();
            return redirect('admin/familys')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/familys')->withError('Something Wrong! New Content can not Saved.');
        }
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $Family = Family::findOrFail($id);
        $data = array('Family' => $Family, );
        return view('backend.family.editfamily', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $Family = Family::findOrFail($id);
            $Family->name            = $request->name;
            $Family->description     = $request->description;
            $Family->type_group      = $request->type_group;
            if ($request->file('editnew') != null)
            {
                $img = $request->file('editnew');
                foreach($img as $key => $item) {
                    unlink('storage/app/group_cover/'.$Family->group_img);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('group_cover',  $name);
                    $Family->group_img = $name;
                }
            }
          
            $Family->save();

            DB::commit();
            return redirect('admin/familys')->with('success', 'Successful');
        } catch (\Throwable $th) {
          
            DB::rollback();
         
            return redirect('admin/familys')->withError('Something Wrong! New can not Updated.');
        }
    }

  
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $new = Family::findOrFail($id);
            $image_path = Storage::delete('group_cover/'.$new->new_img);
            $new = Family::destroy($id);
            DB::commit();
            return redirect('admin/familys')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/familys')->withError('Something Wrong! Your Content can not Deleted.');
        }
    }

    public function publishedgroup($id)
    {
        DB::beginTransaction();
        try {
            $news = Family::findOrFail($id);
            if ($news->published == 2) {
                $news->published          = 1;
            } else {
                $news->published          = 2;
            }
            $news->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
