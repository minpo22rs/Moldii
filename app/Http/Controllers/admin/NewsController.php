<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use URL;
use App\Models\news;

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
        $data = array('new' => $new, );
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
            DB::commit();
            return redirect('admin/news')->with('success', 'Successful');
        } catch (\Throwable $th) {
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
        $data = array('new' => $new, );
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
        DB::beginTransaction();
        try {
            $news = news::findOrFail($id);
            $news->new_title            = $request->title;
            $news->new_content           = $request->content;
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
}
