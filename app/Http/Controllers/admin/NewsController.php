<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use URL;
use App\Models\news;
use App\Models\new_image;
use App\Models\Family;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new = news::where('new_type', 'C')->get();
        // $img = DB::Table('tb_new_imgs')->where('new_id', '=',36)->get();
        $g = Family::where('published','=','1')->get();
        // dd( $img[0]->name);
        $data = array('new' => $new, 'g'=>$g);
        return view('backend.home.new', $data);
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
        // dd($request->all());
        DB::beginTransaction();
        try {
            $news = new news();
            $news->new_title            = $request->title;
            $news->new_content          = $request->content;
            $news->new_type             = 'C';
            $news->created_by             = 'Admin';
            if ($request->file('img') != null)
            {
                $img = $request->file('img');
                foreach($img as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('news',  $name);
                    $news->new_img  = $name;
                }
            }
            $news->save();

            if ($request->file('files') !== null)
            {
                $img = $request->file('files');
                foreach($img as $key => $item) {
                    $image = new new_image();
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('news',  $name);
                    $image->new_id  = $news->new_id;
                    $image->name  = $name;
                    $image->save();
                }
            }


            DB::commit();
            return redirect('admin/news')->with('success', 'Successful');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            return redirect('admin/news')->withError('Something Wrong! New Content can not Saved.');
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
        $new = news::findOrFail($id);
        $img = new_image::where('new_id',$id)->get();
        $data = array('new' => $new,'img'=>$img );
        return view('backend.home.modal.editnew', $data);
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
        // dd($request->all());
        DB::beginTransaction();
        try {
            $news = news::findOrFail($id);
            $news->new_title            = $request->title;
            $news->new_content          = $request->content;
            if ($request->file('editnew') !== null)
            {
                $img = $request->file('editnew');
                foreach($img as $key => $item) {
                    unlink('storage/app/news/'.$news->new_img);
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('news',  $name);
                    $news->new_img = $name;
                }
            }
            $news->save();

            if($request->deletedkey != null){
                $imgcover = new_image::whereIn('id_new_img',$request->deletedkey)->get();

                foreach($imgcover as $key => $item) {
                    unlink('storage/app/news/'.$item->name);
                }
                
                new_image::whereIn('id_new_img',$request->deletedkey)->delete();

            }

            if ($request->file('sub_gallery') !== null)
            {
                $img = $request->file('sub_gallery');
                foreach($img as $key => $item) {
                    $image = new new_image();
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('news',  $name);
                    $image->new_id  = $news->new_id;
                    $image->name  = $name;
                    $image->save();
                }
            }



            DB::commit();
            return redirect('admin/news')->with('success', 'Successful');
        } catch (\Throwable $th) {
          
            DB::rollback();
         
            return redirect('admin/news')->withError('Something Wrong! New can not Updated.');
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
            $new = news::findOrFail($id);
            $image_path = Storage::delete('news/'.$new->new_img);
            $new = news::destroy($id);
            DB::commit();
            return redirect('admin/news')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/news')->withError('Something Wrong! Your Content can not Deleted.');
        }
    }

    public function published($id)
    {
        DB::beginTransaction();
        try {
            $news = news::findOrFail($id);
            if ($news->new_published == 2) {
                $news->new_published          = 1;
            } else {
                $news->new_published          = 2;
            }
            $news->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
