<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Chat;
use Auth;



class ChatController extends Controller
{
    //

    public function index()
    {

        $idM = Auth::guard('merchant')->user()->merchant_id;
        $idS = Chat::where('store_id', '=', $idM)->orderBy('id_chat', 'DESC')->leftJoin('tb_customers', 'tb_chats.customer_id', '=', 'tb_customers.customer_id')->groupBy('tb_chats.customer_id')->get();

        // dd($idS[1]['text']);
        return view('merchant.chat.chat_all', compact('idS'));
    }

    public function fetchUserMsg(Request $request)
    {
        $userData = Chat::where('store_id', '=', $request->store_id)->leftJoin('tb_customers', 'tb_chats.customer_id', '=', 'tb_customers.customer_id')->groupBy('tb_chats.customer_id')->get();


        // dd($userData);
        $html = '';

        foreach ($userData as $userMsg) {
            $userText = Chat::where('customer_id', '=', $userMsg->customer_id)->orderBy('tb_chats.created_at', 'DESC')->first();
            $status = Chat::where('customer_id', '=', $userMsg->customer_id)->where('from', '=', 'F')->where('status_text', '=', 0)->get();

            // dd();

            $html .= '
           <a href="' . url('merchant/chat_room/ ' . $userMsg->customer_id . '') . '" class="card page-header p-0">
           <div class="card-block front-icon-breadcrumb row align-items-center p-3">
               <div class="breadcrumb-header d-flex align-items-center col">
                   <div class="big-icon">
                       <img src="' . url('storage/app/merchant/' . $userMsg->customer_img) . '" width="45px"
                           height="45px" class="rounded-circle mr-4 " alt="User-Profile-Image">
                   </div>
                   <div class="d-inline-block align-items-center msg-status_c">

                       ';
            if ($status->count() > 0) {

                $html .= '<h5 class="msg-span_2"> ' . $userMsg->customer_name .    '</h5>';
                $html .= '<span class="msg-span_2">' . $userMsg->customer_name . ' : <label>' . $userText->text . '</label></span>';
            } else {
                if ($userText->from == 'B') {
                    if ($userText->status_text == 1) {
                        $html .= '<h5 class="msg-span"> ' . $userMsg->customer_name .    '</h5>';
                        $html .= ' <span class="msg-span"> คุณ : <label>' . $userText->text . '</label></span>';
                    } else {
                        $html .= '<h5 class="msg-span_2"> ' . $userMsg->customer_name .    '</h5>';
                        $html .= ' <span class="msg-span_2"> คุณ : <label>' . $userText->text . '</label></span>';
                    }
                } else {
                    $html .= '<h5 class="msg-span"> ' . $userMsg->customer_name .    '</h5>';
                    $html .= ' <span class="msg-span">' . $userMsg->customer_name . ' : <label>' . $userText->text . '</label></span>';
                }
            }
            $html .= '
                   </div>
                   </div>';
            if ($status->count() > 0) {

                $html .= ' <span class="status text-center mr-4"></span>';
            } else {
                $html .= ' <span class="status text-center mr-4" style="display:none;"></span>';
            }

            $html .= '</div>
       </a>
       ';
        }









        // dd($html);


        $data = [

            'html' => $html
        ];

        return json_encode($data);
    }

    public function chatRoom($user_id)
    {
        Chat::where('customer_id', $user_id)->where('from', 'F')->update(['status_text' => 1]);
        $idM = Auth::guard('merchant')->user()->merchant_id;
        $user = DB::table('tb_customers')->where('customer_id', $user_id)->first();
        $msg = Chat::where('tb_chats.customer_id', $user_id)->where('store_id', $idM)->get();

        // dd($user);
        return view('merchant.chat.chat_room', compact('msg', 'user'));
    }
    public function sendMessage(Request $request)
    {

        $row = array();

        if ($request->file('file') != null) {
            $name = rand() . time() . '.' . $request->file('file')[0]->getClientOriginalExtension();
            if ($request->file('file')[0]->getClientOriginalExtension() == "mp4") {
                $request->file('file')[0]->storeAs('chats/video', $name);

                $row["video"] = $name;
            } else {
                $request->file('file')[0]->storeAs('chats/img', $name);
                $row["image"] = $name;
            }
        }

        if ($request->text != null || $request->file('file') != null) {
            $row["text"] = $request->text;
            $row["customer_id"] = $request->idc;
            $row["store_id"] = $request->ids;
            $row["from"] = 'B';
            $row["status_text"] = 0;
            DB::table('tb_chats')->insert($row);

            $cid = Chat::where('tb_chats.customer_id', $request->idc)->where('store_id', $request->ids)->get();

            $html = '';
            foreach ($cid as $msg) {
                if ($msg->from == 'F') {


                    if ($msg->image != null) {

                        $html .= '<li class="container p-0  ">
                                     <img class="img-P" src="' . url('http://localhost/moldii_mobile/public/storage/chats/img/' . $msg->image) . '"  alt="">
                                  </li>';
                    }elseif($msg->video != null){
                        $html .= '<li class="container p-0  ">
                                        <video class="video-P" src="' . url('http://localhost/moldii_mobile/public/storage/chats/video/' . $msg->video) . '" controls autoplay muted></video>
                                 </li>';


                    }
                    if ($msg->text != null) {
                        $html .= '<li class="container p-0 Msg-P "> <p class="m-0 ">' . nl2br(e($msg->text)) . '</p> </li>';
                    }
                } elseif ($msg->from == 'B') {
                    if ($msg->image != null) {
                        $html .= '<li class="container p-0  ">
                        <img class="img-D" src="' . url('storage/app/chats/img/' . $msg->image) . '"  alt="">
                        </li>';
                    }elseif($msg->video != null){
                        $html .= '<li class="container p-0  ">
                                        <video class="video-D" src="' . url('storage/app/chats/video/' . $msg->video) . '" controls autoplay muted></video>
                                 </li>';


                    }
                    if ($msg->text != null) {
                        $html .= '<li class="container p-0 Msg-D "> <p class="m-0 ">' . nl2br(e($msg->text)) . '</p> </li>';
                    }
                }
            }
        }
        $data = [
            'cid' => $cid,
            'html' => $html
        ];

        return json_encode($data);
    }



    public function fetchMsg(Request $request)
    {
        Chat::where('customer_id', $request->customer_id)->where('from', 'F')->update(['status_text' => 1]);

        $cid = Chat::where('tb_chats.customer_id', $request->customer_id)->where('store_id', $request->store_id)->get();

        $html = '';

        foreach ($cid as $msg) {

            if ($msg->from == 'F') {


                if ($msg->image != null) {

                    $html .= '<li class="container p-0  ">
                         <img class="img-P" src="' . url('http://localhost/moldii_mobile/public/storage/chats/img/' . $msg->image) . '"  alt="">
                    </li>';
                }elseif($msg->video !=null){
                    $html .= '<li class="container p-0  ">
                                    <video class="video-P" src="' . url('http://localhost/moldii_mobile/public/storage/chats/video/' . $msg->video) . '" controls autoplay muted></video>
                             </li>';


                }
                if ($msg->text != null) {
                    $html .= '<li class="container p-0 Msg-P "> <p class="m-0 ">' . nl2br(e($msg->text)) . '</p> </li>';
                }
            } elseif ($msg->from == 'B') {
                if ($msg->image != null) {
                    $html .= '<li class="container p-0  ">
                    <img class="img-D" src="' . url('storage/app/chats/img/' . $msg->image) . '"  alt="">
                    </li>';
                }elseif($msg->video !=null){
                    $html .= '<li class="container p-0  ">
                                    <video class="video-D" src="' . url('storage/app/chats/video/' . $msg->video) . '" controls autoplay muted></video>
                             </li>';


                }
                if ($msg->text != null) {
                    $html .= '<li class="container p-0 Msg-D "> <p class="m-0 ">' . nl2br(e($msg->text)) . '</p> </li>';
                }
            }
        }
        // dd($user);
        $data = [
            'cid' => $cid,
            'html' => $html
        ];

        return json_encode($data);
    }


}
// $html .='<img src="' . url('storage/app/chats/' . $msg->image) . '" alt=""> ';
