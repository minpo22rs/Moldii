<?php

namespace App\Http\Controllers\mobile\common;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Tb_content_img;
use App\Models\Tb_user_content;
use Auth;
use DB;
use Session;

class ContentController extends Controller
{
    
    public function index($id)
    {
        $c = DB::Table('tb_news')->where('new_id',$id)->first();
        $comment = DB::Table('tb_comments')->where('comment_object_id',$id)->get();
        $countreply = DB::Table('tb_comment_replys')->where('news_id',$id)->get();
        DB::Table('tb_news')->where('new_id',$id)->increment('viewer', 1);

       
        return view('mobile.member.common.content.comment')->with(['c'=>$c,'comment'=> $comment,'countreply'=>$countreply]);
    }

    public function sendcomment(Request $request)
    {
        DB::Table('tb_comments')->insert(['comment_text'=> $request->comment,'comment_object_id'=>$request->cid,'comment_type'=>'C','comment_author'=>Session::get('cid')]);
        return back();
    }

    public function sendcommentreply(Request $request)
    {
        // dd($request->all());
        DB::Table('tb_comment_replys')->insert(['comment_reply_text'=> $request->reply,'news_id'=>$request->newsid,'id_tb_comment'=>$request->cid,'customer_id'=>Session::get('cid')]);
        DB::Table('tb_comments')->where('comment_id',$request->cid)->update(['comment_reply'=> 1]);
        return back();
    }

    public function userpostcontent(Request $request){
        // dd($request->all());
        $content = new Tb_user_content();
        $content->customer_id          = Session::get('cid');
        if(isset($request->post)){
            $content->new_title        = $request->post;

        }
        $content->save();

        if ($request->file('sub_gallery') !== null)
        {

            foreach($request->file('sub_gallery') as $key => $item) {
                    $name = rand().time().'.'.$item->getClientOriginalExtension();
                    $item->storeAs('public/content_img',  $name);
                    $contentimg = new Tb_content_img();
                    $contentimg->id_content  = $content->id;
                    $contentimg->name  = $name;
                    if($ext =='mp4'){
                        $contentimg->type  = 'V';
    
                    }else{
                        $contentimg->type  = 'I';
    
                    }
                    $contentimg->save();
                
               
            }
        }
        // dd('rrr//rr');
        return back()->with('success','โพสต์เรียบร้อยแล้ว');

    }

    public function search(Request $request)
    {

        $colors =  Session::get('recent');
    
        if (($key = array_search($request->text, $colors)) !== false) {
            // unset($colors[$key]);
        }else{
            Session::push('recent',$request->text);

        }

        $sqlc = DB::Table('tb_tags')->where('tag_name', 'like', '%' .$request->text. '%')->where('tag_type','=','C')->get();
        $sqlp = DB::Table('tb_tags')->where('tag_name', 'like', '%' .$request->text. '%')->where('tag_type','=','P')->get();
        $cat = DB::Table('tb_category')->where('deleted_at','!=',null)->limit('6')->get();
        $ban = DB::Table('tb_banners')->where('banner_type',1)->first();
        // dd($sqlp);
        return view('mobile.member.common.search')->with(['sqlp'=>$sqlp,'sqlc'=>$sqlc,'cat'=>$cat,'ban'=>$ban]);
    }

    public function searcha($id,$a)
    {
        if($id ==1){

            $colors =  Session::get('recent');
            
    
            if (($key = array_search($a, $colors)) !== false) {
                // unset($colors[$key]);
            }else{
                $x =substr($a,-3);
                if($x != '.js'){
                    Session::push('recent',$a);

                }
    
            }
    
            $sqlc = DB::Table('tb_tags')->where('tag_name', 'like', '%' .$a. '%')->where('tag_type','=','C')->get();
            $sqlp = DB::Table('tb_tags')->where('tag_name', 'like', '%' .$a. '%')->where('tag_type','=','P')->get();
            $cat = DB::Table('tb_category')->where('deleted_at','!=',null)->limit('6')->get();
            $ban = DB::Table('tb_banners')->where('banner_type',1)->first();
            // dd( $sql);



        }else{

            $colors =  Session::get('recent');
    
            if (($key = array_search($a, $colors)) !== false) {
                // unset($colors[$key]);
            }else{
                $x =substr($a,-3);
                if($x != '.js'){
                    Session::push('recent',$a);

                }
    
            }
    
            $sqlc = DB::Table('tb_tags')->where('tag_name', 'like', '%' .$a. '%')->where('tag_type','=','C')->get();
            $sqlp = DB::Table('tb_tags')->where('tag_name', 'like', '%' .$a. '%')->where('tag_type','=','P')->get();
            $cat = DB::Table('tb_category')->where('deleted_at','!=',null)->limit('6')->get();
            $ban = DB::Table('tb_banners')->where('banner_type',1)->first();
            // dd( $sql);
            


        }
       
        return view('mobile.member.common.search')->with(['sqlp'=>$sqlp,'sqlc'=>$sqlc,'cat'=>$cat,'ban'=>$ban]);
    }
    
    
}
