<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use URL;
use App\Models\Family;
use App\Models\notification;
use Auth;

class FamilyController extends Controller
{
  
    public function index()
    {
        $Family = Family::where('published',1)->where('type_group',2)->get();
        $data = array('Family' => $Family);
        return view('backend.family.familylist', $data);
    }

    public function requestgroup(){
        $Family = Family::where('published',1)->where('type_group',1)->orderby('created_at','DESC')->get();
        $data = array('Family' => $Family);
        return view('backend.family.requestlist', $data);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        
        DB::beginTransaction();
        try {
            $Family = new Family();
            $Family->name            = $request->name;
            $Family->description     = $request->description;
            $Family->group_show      = $request->type_group;
            $Family->type_group      = 2;
            if ($request->file('img') !== null)
            {
                $img = $request->file('img');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('group_cover',  $name);
                    $Family->group_img = $name;
                }
            }

            if ($request->file('imgcover') !== null)
            {
                $img = $request->file('imgcover');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('group_cover',  $name);
                    $Family->group_cover = $name;
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

   
    public function confirmopengroup($id)
    {
        //
        Family::where('id',$id)->update(['type_group'=>2]);
        $sql = Family::where('id',$id)->first();
        $noti = new notification();
        
        $noti->noti_title       = 'อนุมัติคำขอเปิดกลุ่มบนแอปพลิเคชัน Moldii';

        $noti->noti_date        = date('Y-m-d');
        $noti->customer_id      = $sql->created_by;
        // $noti->noti_detail      = $request->detail;
        $noti->noti_create_by   = Auth::user()->admin_id;
        $noti->save();


        return redirect('admin/familys')->with('success', 'Successful');

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
            // $Family->type_group      = $request->type_group;
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
            $Family->group_show      = $request->type_group;

            if ($request->file('editnews') !== null)
            {
                $img = $request->file('editnews');
                foreach($img as $key => $item) {
                    unlink('storage/app/group_cover/'.$Family->group_cover);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('group_cover',  $name);
                    $Family->group_cover = $name;
                }
            }

          
            $Family->save();

            DB::commit();
            return redirect('admin/familys')->with('success', 'Successful');
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollback();
         
            return redirect('admin/familys')->withError('Something Wrong! New can not Updated.');
        }
    }

  
    public function rejectopengroup(Request $request)
    {
        DB::beginTransaction();
        try {
         
            Family::where('id',$request->ids)->update(['reject'=>$request->reply,'type_group'=>3]);
            $sql = Family::where('id',$id)->first();

            $noti = new notification();
            $noti->noti_title       = 'ปฏิเสธคำขอเปิดกลุ่มบนแอปพลิเคชัน Moldii';

            $noti->noti_date        = date('Y-m-d');
            $noti->customer_id      = $sql->create_by;
            $noti->noti_detail      = $request->reply;
            $noti->noti_create_by   = Auth::user()->admin_id;
            $noti->save();
            // $image_path = Storage::delete('group_cover/'.$new->new_img);
            // $new = Family::destroy($id);
            DB::commit();
            return redirect('admin/familys')->with('success', 'Successful');
        } catch (\Throwable $th) {
      
            DB::rollback();
            return redirect('admin/requestgroup')->withError('Something Wrong! Your Content can not Deleted.');
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
