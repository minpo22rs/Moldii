<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestUiController extends Controller
{
    public function index(){
        return view('mobile.member.common.content.comment');
    }

    public function cm_podcast(){
        return view('mobile.member.common.content.podcast_comment');
    }

<<<<<<< Updated upstream
=======
<<<<<<< HEAD
    public function shoppingTest(){
        return view('mobile.member.common.content.shopping.shopping_1');

    }
    public function shoppingTest_2(){
        return view('mobile.member.common.content.shopping.shopping_2');

    }
  
=======
>>>>>>> Stashed changes
    public function goToView(Request $request)
    {
        $request_all = $request->all();
        if (isset($request_all["view_target"]) && !empty($request_all["view_target"]))
        {
            return view($request_all["view_target"]);
        }
        else
            return "triggered";
    }
<<<<<<< Updated upstream
=======
>>>>>>> ba64fa387615019b89f64bb28cbba9f4b3158f54
>>>>>>> Stashed changes
}
