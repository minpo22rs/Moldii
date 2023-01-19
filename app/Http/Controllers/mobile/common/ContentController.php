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
use App\Models\User;


class ContentController extends Controller
{

    public function index($id)
    {
        $c = DB::Table('tb_news')->where('new_id',$id)
                    ->leftJoin('tb_customers','tb_news.customer_id','=','tb_customers.customer_id')
                    ->select('tb_news.*','tb_customers.customer_username','tb_customers.customer_img','tb_customers.provider')
                    ->first();
        $comment = DB::Table('tb_comments')->where('comment_object_id',$id)->get();
        $countreply = DB::Table('tb_comment_replys')->where('news_id',$id)->get();
        $bm = DB::Table('tb_bookmarks')->where('id_ref',$id)->where('customer_id',Session::get('cid'))->first();
        $imggal = DB::Table('tb_new_imgs')->where('new_id',$id)->get();
        $f = DB::Table('tb_followers')->where('id_c_follower',$c->customer_id)->where('id_customer',Session::get('cid'))->first();
        $la = DB::Table('tb_content_likes')->where('content_id',$c->new_id )->where('customer_id',Session::get('cid'))->first();
        $sh = DB::Table('tb_content_shares')->where('new_id',$c->new_id)->get();
        $u = User::where('customer_id',Session::get('cid'))->first();



        // dd($c);
        DB::Table('tb_news')->where('new_id',$id)->increment('viewer', 1);


        return view('mobile.member.common.content.comment')->with(['c'=>$c,'comment'=> $comment,'countreply'=>$countreply,'bm'=>$bm,'imggal'=>$imggal,'f'=>$f,'la'=>$la,'sh'=>$sh,'u'=>$u]);
    }

    public function sendcomment(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        DB::Table('tb_comments')->insert(['comment_text'=> $request->comment,'comment_object_id'=>$request->cid,'comment_type'=>'C','comment_author'=>Session::get('cid')]);
        return back();
    }

    public function sendcommentreply(Request $request)
    {
        date_default_timezone_set('Asia/Bangkok');
        // dd($request->all());
        DB::Table('tb_comment_replys')->insert(['comment_reply_text'=> $request->reply,'news_id'=>$request->newsid,'id_tb_comment'=>$request->cid,'customer_id'=>Session::get('cid')]);
        DB::Table('tb_comments')->where('comment_id',$request->cid)->update(['comment_reply'=> 1]);
        return back();
    }


    // $validator = Validator::make($request->all(), [
    //     'file' => 'max:500000',
    // ]);

    public function userpostcontent(Request $request){
        date_default_timezone_set('Asia/Bangkok');


        DB::beginTransaction();
        try {

            $content = new Tb_user_content();
            $content->customer_id          = Session::get('cid');
            $content->new_type          = 'U';
            if(isset($request->post)){
                $content->new_title        = $request->post;

            }
            if(isset($request->fam)){
                $content->family_id        = $request->fam;

            }
            $content->save();

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

            DB::commit();
            return back()->with('success','โพสต์เรียบร้อยแล้ว');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();

            return back()->with('success','Something Wrong! Content can not Upload.');
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

        DB::Table('tb_news')->where('new_id',$request->id)->delete();
        $sql = DB::Table('tb_new_imgs')->where('new_id',$request->id)->get();
        if( $sql != null){
            foreach($sql as $sqls){
                $image_path = Storage::delete('public/content_img'.$sqls->new_img);

            }

        }
        DB::Table('tb_new_imgs')->where('new_id',$request->id)->delete();

        return 1 ;
    }

    public function hidecontent(Request $request){

        DB::Table('tb_news')->where('new_id',$request->id)->update(['new_published'=>2]);


        return 1 ;
    }


    public function unhidecontent(Request $request){

        DB::Table('tb_news')->where('new_id',$request->id)->update(['new_published'=>1]);


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

    public function sharePost(Request $request){
        $id = $request->input('id');

        $urlen = urlencode('https://modii.sapapps.work/content/'.$id .'');
        $link = "https://modii.sapapps.work/content/$id";
        $html = '
        <br>
                                <div class="row justify-content-around p-1 ">
                                    <a href="https://social-plugins.line.me/lineit/share?url='.$urlen. '"
                                        class="m-0 text-center align-self-end  share-item">
                                        <img src="' . url('new_assets/img/icon/share/LINE.svg') . '" alt="alt"
                                            class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Line</h5>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u='.$urlen. '"
                                        class="m-0 text-center  align-self-end share-item">
                                        <img src="    ' . url('new_assets/img/icon/share/facebook.svg') . '
                                        " alt="alt"
                                            class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Facebook</h5>

                                    </a>
                                    <div onclick="copyLink('.$id.');"   class="m-0 text-center align-self-end  share-item">
                                      <input type="text" id="linkPost" style="display:none;" value="'.$link.'">

                                        <img src="    ' . url('new_assets/img/icon/share/Link.svg') . '
                                        " alt="alt"
                                            class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Copy link</h5>

                                    </div>
                                    <div onclick="messengerShare('.$id.')" class="m-0 text-center align-self-end  share-item">
                                        <img src="    ' . url('new_assets/img/icon/share/Messenger.svg') . '
                                        " alt="alt"
                                            class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Messenger</h5>

                                    </div>

                                    <div class="row col-11 mt-4 p-0">
                                        <button type="button" data-dismiss="modal" class="btn  btn-block font-weight-bold"
                                            style="background-color:rgba(255, 92, 99, 1); color:#FFF; font-size:15px; border-radius: 8px;">ยกเลิก</button>
                                    </div>
                                </div>
                                <br>


        ';
        $data = ['html'=>$html];
        return json_encode($data);

    }

}
