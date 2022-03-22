<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Storage;
use App\Models\news;
use App\Models\tag;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new = news::where('new_type', 'P')->get();
        $data = array('new' => $new, );
        return view('backend.home.podcast', $data);
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
            $news = new news();
            $news->new_title            = $request->title;
            $news->new_content          = $request->content;
            $news->new_type             = 'P';
            $news->new_img              = $request->link;
            $news->save();
            DB::commit();
            return redirect('admin/podcasts')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/podcasts')->withError('Something Wrong! New podcast not Saved.');
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
        return view('backend.home.modal.editpodcast', $data);
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
            $news->new_content          = $request->content;
            $news->new_img              = $request->link;
            $news->save();

            if ($request->edit_tag != null) {
                foreach ($request->edit_tag as $key => $value) {
                    $tag = new tag();
                    $tag->tag_name      = $value;
                    $tag->tag_fkey      = $id;
                    $tag->tag_type      = 'C';
                    $tag->save();
                }
            }

            DB::commit();
            return redirect('admin/podcasts')->with('success', 'Successful');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect('admin/podcasts')->withError('Something Wrong! New can not Updated.');
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
        //
    }
}
