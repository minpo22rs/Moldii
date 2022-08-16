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
        $c = DB::Table('tb_news')->where('new_id',$id)
                    ->leftJoin('tb_customers','tb_news.customer_id','=','tb_customers.customer_id')
                    ->select('tb_news.*','tb_customers.customer_username')
                    ->first();
        $comment = DB::Table('tb_comments')->where('comment_object_id',$id)->get();
        $countreply = DB::Table('tb_comment_replys')->where('news_id',$id)->get();
        $bm = DB::Table('tb_bookmarks')->where('id_ref',$id)->where('customer_id',Session::get('cid'))->first();
        $imggal = DB::Table('tb_new_imgs')->where('new_id',$id)->get();
        $f = DB::Table('tb_followers')->where('id_c_follower',$c->customer_id)->where('id_customer',Session::get('cid'))->first();
        $la = DB::Table('tb_content_likes')->where('content_id',$c->new_id )->where('customer_id',Session::get('cid'))->first();
        $sh = DB::Table('tb_content_shares')->where('new_id',$c->new_id)->get();

        // dd($c);
        DB::Table('tb_news')->where('new_id',$id)->increment('viewer', 1);

       
        return view('mobile.member.common.content.comment')->with(['c'=>$c,'comment'=> $comment,'countreply'=>$countreply,'bm'=>$bm,'imggal'=>$imggal,'f'=>$f,'la'=>$la,'sh'=>$sh]);
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


    // $validator = Validator::make($request->all(), [
    //     'file' => 'max:500000',
    // ]);

    public function userpostcontent(Request $request){
        dd($request->all());
        $content = new Tb_user_content();
        $content->customer_id          = Session::get('cid');
        $content->new_type          = 'U';
        if(isset($request->post)){
            $content->new_title        = $request->post;

        }
        $content->save();



        DB::beginTransaction();
        try {
            if ($request->file('sub_gallery') !== null)
            {

                foreach($request->file('sub_gallery') as $key => $item) {
                        $ext = $item->getClientOriginalExtension();
                        // dd($ext); exit();
                        $name = rand().time().'.'.$item->getClientOriginalExtension();
                        $item->storeAs('public/content_img',  $name);
                        $contentimg = new Tb_content_img();
                        $contentimg->new_id  = $content->id;
                        $contentimg->name  = $name;
                        if($ext =='mp4' || $ext =='MOV'){
                            $contentimg->type  = 'V';
        
                        }else{
                            $contentimg->type  = 'I';
        
                        }
                        $contentimg->save();
                    
                
                }
            }
            // dd('rrr//rr');
            DB::commit();
            return back()->with('success','โพสต์เรียบร้อยแล้ว');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
        
            return redirect('admin/news')->withError('Something Wrong! New can not Updated.');
        }
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
            // dd( $sql);
            


        }
       
        return view('mobile.member.common.search')->with(['sqlp'=>$sqlp,'sqlc'=>$sqlc,'cat'=>$cat]);
    }


    public function deletecontent(Request $request){
      
        DB::Table('tb_news')->where('new_id',$request->id)->update(['new_published'=>3]);
      
        return 1 ;
    }

    public function hidecontent(Request $request){
       
        DB::Table('tb_news')->where('new_id',$request->id)->update(['new_published'=>2]);

        
        return 1 ;
    }

    public function contentreport($id){
        $sql =  DB::Table('tb_content_reports')->where('new_id',$id)->first();
        if($sql != null){
            DB::Table('tb_content_reports')->where('new_id',$id)->increment('count',1);

        }else{
            DB::Table('tb_content_reports')->insert(['new_id'=>$id]);

        }

        
        return back() ;
    }

    
    
}
