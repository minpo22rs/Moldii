<?php

namespace App\Http\Controllers\mobile\common;
use DB;
use Session;
use App\Models\tb_chats;
use Illuminate\Support\Facades\Auth;
use Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //

    public function index($id){

        $merchant = DB::Table('tb_merchants')->where('merchant_id',$id)->first();
        $user_id = Session::get('cid');

        $cid = tb_chats::where('customer_id', $user_id)->where('store_id', $id)->get();


        return view('mobile.member.common.content.shopping.chat', compact('cid','merchant'));
    }

    public function sendMessage(Request $request){


        $row = array();

        if( $request->file('file') != null){
            $name = rand() . time() . '.' . $request->file('file')[0]->getClientOriginalExtension();
            if ($request->file('file')[0]->getClientOriginalExtension() == "mp4") {
                $request->file('file')[0]->storeAs('public/chats/video', $name);

                $row["video"] = $name;
            } else {
                $request->file('file')[0]->storeAs('public/chats/img', $name);
                $row["image"] = $name;
            }




        }

        if($request->text != null || $request->file('file') != null){
            $row["text"] = $request->text;
            $row["customer_id"] = $request->idc;
            $row["store_id"] = $request->ids;
            $row["from"] = 'F';
            $row["status_text"] = 0;
            DB::table('tb_chats')->insert($row);

            $cid = tb_chats::where('tb_chats.customer_id',$request->idc)->where('store_id',$request->ids)->get();

            $html = '';
            foreach($cid as $msg){
                if ($msg->from == 'F') {


                    if($msg->image != ''){

                        $html .='<li class="container p-0  ">
                             <img class="img-D" src="' . url('storage/chats/img/' . $msg->image) . '"  alt="">
                        </li>';
                    }elseif($msg->video != null){
                        $html .= '<li class="container p-0  ">
                                        <video class="video-D" src="' . url('storage/chats/video/' . $msg->video) . '" controls autoplay muted></video>
                                 </li>';


                    }
                    if($msg->text != null){
                        $html .= '<li class="container p-0 Msg-D "> <p class="m-0 ">' . nl2br(e($msg->text)). '</p> </li>';

                    }


                } elseif ($msg->from == 'B') {
                    if($msg->image != ''){
                        $html .='<li class="container p-0  ">
                        <img class="img-P" src="' . url('http://localhost/modii_backend/storage/app/chats/img/' . $msg->image) . '"  alt="">
                        </li>';

                    }elseif($msg->video != null){
                        $html .= '<li class="container p-0  ">
                                        <video class="video-P" src="' . url('http://localhost/modii_backend/storage/app/chats/video/' . $msg->video) . '" controls autoplay muted></video>
                                 </li>';


                    }
                    if($msg->text != null){
                        $html .= '<li class="container p-0 Msg-P "> <p class="m-0 ">' . nl2br(e($msg->text)). '</p> </li>';

                    }

                }


            }


        }


        $data = [
         'cid'=>$cid,
         'html'=>$html
        ];


        return json_encode($data);

    }

    public function fetchMessage(Request $request){

        tb_chats::where('store_id', $request->store_id)->where('from', 'B')->update(['status_text'=> 1]);
        $cid= tb_chats::where('tb_chats.customer_id', $request->customer_id)->where('store_id', $request->store_id)->get();
        $html = '';

        foreach ($cid as $msg) {

            if ($msg->from == 'F') {


                if($msg->image != null){

                    $html .='<li class="container p-0  ">
                         <img class="img-D" src="' . url('storage/chats/img/' . $msg->image) . '"  alt="">
                    </li>';
                }elseif($msg->video != null){
                    $html .= '<li class="container p-0  ">
                                    <video class="video-D" src="' . url('storage/chats/video/' . $msg->video) . '" controls autoplay muted></video>
                             </li>';


                }
                if($msg->text != null){
                    $html .= '<li class="container p-0 Msg-D "> <p class="m-0 ">' . nl2br(e($msg->text)). '</p> </li>';

                }
            } elseif ($msg->from == 'B') {
                if($msg->image != null){
                    $html .='<li class="container p-0  ">
                    <img class="img-P" src="' . url('http://localhost/modii_backend/storage/app/chats/img/' . $msg->image) . '"  alt="">
                    </li>';

                }elseif($msg->video != null){
                    $html .= '<li class="container p-0  ">
                                    <video class="video-P" src="' . url('http://localhost/modii_backend/storage/app/chats/video/' . $msg->video) . '" controls autoplay muted></video>
                             </li>';


                }
                if($msg->text != null){
                    $html .= '<li class="container p-0 Msg-P "> <p class="m-0 ">' . nl2br(e($msg->text)). '</p> </li>';

                }
            }
        }
        // dd($user);
        $data = [
            'cid'=>$cid,
            'html'=>$html
           ];

        return json_encode($data);
    }
}
