@extends('mobile.main_layout.main')

@section('app_header')
<style>
        
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 50px;
            right: 0;
            margin-top: -1px;
            width: 250px;
        }
        /* * Post widget * */

        input[type="file"] {
        display: none;
        }
        ul {
        list-style-type: none;
        }

        .btn {
        padding: .5em 1em;

        background-color: transparent;
        color: #6b7270;

        border: none;
        cursor: pointer;
        }

        .widget-post {
        width: auto;
        min-height: 100px;
        height: auto;

        border: 1px solid #eaeaea;
        border-radius: 6px;
        box-shadow: 0 1px 2px 1px rgba(130, 130, 130, 0.1);

        background-color: #fff;

        margin: auto;
        overflow: hidden;
        }

        .widget-post__header {
        padding: .2em .5em;

        background-color: #eaeaea;
        color: #3f5563;
        }
        .widget-post__title {
        font-size: 18px;
        margin-top:10px;
        }

        .widget-post__content {
        width: 100%;
        height: 50%;
        }
        .widget-post__textarea {
        width: 100%;
        height: 100%;
        padding: .5em;

        border: none;
        resize: none;
        }
        .widget-post__textarea:focus {
        outline: none;
        }

        .widget-post__options {
        padding: .5em;
        }
        .widget-post___input {
        display: inline-block;

        width: 24%;
        padding: .2em .5em;

        border: 1px solid #eaeaea;
        border-radius: 1.5em;
        }
        .post-actions__label {
        cursor: pointer;
        margin-top:10px;

        }

        .widget-post__actions {
        width: 100%;
        padding: .5em;
        }
        .post--actions {
        position: relative;
        padding: .5em;

        background-color: #f5f5f5;
        color: #a2a6a7;
        }
        .post-actions__attachments {
        display: inline-block;
        width: 60%;
        }
        .attachments--btn {
        background-color: #eaeaea;
        color: #007582;

        border-radius: 1.5em;
        }

        .post-actions__widget {
        display: inline-block;
        width: 38%;
        text-align: right;
        }
        .post-actions__publish {
        width: 120px;

        background-color: #008391;
        color: #fff;

        border-radius: 1.5em;
        }

        .scroller::-webkit-scrollbar {
        display: none;
        }

        .is--hidden {
        display: none;
        }

        .sr-only {
        width: 1px;
        height: 1px;

        clip: rect(1px, 1px, 1px, 1px);
        -webkit-clip-path: inset(50%);
        clip-path: inset(50%);

        overflow: hidden;
        white-space: nowrap;

        position: absolute;
        top: 0;

        }


        /* *  Placeholder contrast * */
        ::-webkit-input-placeholder {
        color: #666;
        }
        ::-moz-placeholder {
        color: #666;
        }
        :-ms-input-placeholder {
        color: #666;
        }
        :-moz-placeholder {
        color: #666;
        }

        #search_box_2 {
            width: 100%;
            padding: 30px ;
            text-align: center;
            background-color: #fc684b  ;
            margin-top: 0px;
            position: fixed;
            display: none;
            transform: translateY( 0%);
            transition: transform 0.5s;
        }

        #search_2 {
            width: 100%;
            padding: 30px 0;
            text-align: center;
            background-color: #fc684b ;
            margin-top: 30px;
            position: fixed;
            display: none;
        }

        .bg-danger-app-bar {
            opacity: 90%;
            /* background: #fff ; */
            color: #fff;
        }

        .pa-fixed-header {
            background-color: #fc684b !important;
            -webkit-transition: background-color 1s ease-out;
            -moz-transition: background-color 1s ease-out;
            -o-transition: background-color 1s ease-out;
            transition: background-color 1s ease-out;
        }


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="pa-fixed-header appHeader text-light " id="navBar">

    <div class="pageTitle">

    </div>
    <div class="right">

    </div>
    <div class="m-1 w-100">
        {{-- search --}}
        <div class="row">
            
            <div class="col-2 ">
                <div id="btn_search_2" style="cursor: pointer;"  onclick="myFunction()"  class="md hydrated bg-white text-danger rounded p-1 mt-1 mb-0 h5 text-center">
                 <img  src="{{ asset('new_assets/icon/ตัวกรอง.png')}}" >
                </div>
            </div>
            
            <div class="col-6">
                <form action="{{url('user/search')}}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group searchbox mt-1 mb-0">
                        <input type="text" name="text" class="form-control" placeholder="Search..." style="padding: 20px "  onclick="out_page()">
                        {{-- <input type="text" name="text" class="form-control" id="input_search_1" placeholder="Search..." style="padding: 20px " > --}}
                        <!-- <i class="input-icon" >
                            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                        </i> -->
                    </div>
                    
                </form>
            </div>
            <?php $countcart = DB::Table('tb_carts')->select(DB::raw('SUM(count) as countt'))->where('customer_id',Session::get('cid'))->first(); ?>
           
            <div class="col-2 mt-1">
                <a href="{{url('cartindex')}}" > 
                    <div class="  md hydrated  bg-white text-danger rounded p-1 mb-1 h5 text-center">
                        <!-- <ion-icon name="cart" class=" font-weight-bold" role="img"  aria-label="search outline" ></ion-icon> -->
                        <span style="background-color: #34C759 ; color: #fff ;   padding: 3px 4px 2px 5px  ; position: absolute; left: 50% ; border-radius: 25px ; font-size:7px;"> {{$countcart->countt != null ?$countcart->countt:'0'}}</span>
                        <img  src="{{ asset('new_assets/icon/ตะกร้า.png')}}" >
                        {{-- <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$countcart->countt != null ?$countcart->countt:'0'}}</span>  --}}
                    </div>
                </a>
            </div>


            <div class="col-2 mt-1">
                <a href="{{url('user/notification')}}" > 
                    <div class="  md hydrated  bg-white text-danger rounded p-1 mb-1 h5 text-center">
                        <!-- <ion-icon name="cart" class=" font-weight-bold" role="img"  aria-label="search outline" ></ion-icon> -->
                        <span style="background-color: #34C759 ; color: #fff ;   padding: 3px 4px 2px 5px  ; position: absolute; left: 50% ; border-radius: 25px ; font-size:7px;"> {{$noti->count()+$ccomment->count()+$notiid->count()}}</span>
                        <img  src="{{ asset('new_assets/icon/แจ้งเตือน.png')}}" >
                        {{-- <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$noti->count()+$ccomment->count()}}</span>  --}}
                    </div>
                </a>
            </div>
           

            
        </div>

    </div>

     <!-- Show List Menu btn_search_2 [Start]-->
     <div id="search_2" >
        <div class="col-md-12 mt-2"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

 
            <div style="left: 16px;  position: absolute; " class="mt-2">
                 <ion-icon name="close" onclick="myFunction()"  aria-label="search outline" ></ion-icon>
            </div><br><br>
            <div class="row" style="overflow: auto ; width: 100%; height: 450px; justify-content: center;">
              @foreach($cat as $cats)
                    <div class="text-center p-1 ">                      
                        <a href="{{url('/shopping/category/'.$cats->cat_id.'')}}"> 
                            <img class=" rounded-circle  " src="{{('https://testgit.sapapps.work/moldii/storage/app/category_cover/'.$cats->cat_img.'')}}" alt="alt" style="width: 53px; height:53px;">
                            <h4 class="mt-1" style="color:#fff;">{{$cats->cat_name}}</h4>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Show List Menu btn_search_2 [End]--> 

    {{-- Recent Search --}}
    <div id="search_box_2" class="fixed-top">

        <div style="left: 16px;  position: absolute;">
            <ion-icon name="close" onclick="out_page()"  aria-label="search outline" ></ion-icon>
        </div><br><br>

        <div class="col-12">
                <form action="{{url('user/search')}}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group searchbox mt-1 mb-0">
                        <input type="text" name="text" class="form-control" id="input_search_1" placeholder="Search..." style="padding: 20px ">
                        <!-- <i class="input-icon" >
                            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                        </i> --> &nbsp; &nbsp;
                        <button class="btn btn-dark"  type="submit">ค้นหา</button>
                     </div> 
            </form>
        </div>
        <br><hr>
            <h3> Recent Search</h3>

            <p> @if(Session::get('recent') != null)
                    @foreach (Session::get('recent') as $text)
                        <a href="{{url('user/searcha/0/'. $text.'')}}">
                            {{$text}}<br>
                        </a>
                    @endforeach
                    
                @else
                    <p style="text-align: center;">ไม่พบการค้นหาล่าสุด</p>
                @endif
            </p>
    </div>

</div>

<div>
    <img class="justify-content-center w-100" src="{{('https://testgit.sapapps.work/moldii/storage/app/banner/'.$ban->banner_name.'')}}" alt="alt" height="auto">

</div>
{{-- Recent Search --}}
{{-- <div id="search_box_2" >
    <h3> Recent Search</h3>

        <p> @if(Session::get('recent') != null)
                @foreach (Session::get('recent') as $text)
                    <a href="{{url('user/searcha/0/'. $text.'')}}">
                        {{$text}}<br>
                    </a>
                @endforeach
                
            @else
                <p style="text-align: center;">ไม่พบการค้นหาล่าสุด</p>
            @endif
        </p>
  
</div> --}}
@endsection

@section('content')
    
    {{-- <div style="background-color: gray" >
        <div class="row">
            <div class="col-6">
                <h1 class="ml-2 mt-1">MOLDII</h1>
                <h1 class="ml-2"> LIVE</h1> 
            </div>
            <div class="col-6 text-right  ">
                <a href="" style="color: white;top: 60%;position: relative;right: 30px;font-size:21px">More > </a>
            </div>

        </div>
    </div>
    <br> --}}

    {{-- <div class="row">
        <div class="col-6 text-left">
            <h2 class="ml-3">ยอดฮิต</h2>
           
        </div>
        <div class="col-6 text-right " >
            <a href="" class="mr-2" style="color: red">ดูทั้งหมด</a>
        </div>

    </div>
    @include("mobile.member.common.content.prelive")

    <br> --}}
    {{-- @include("mobile.member.common.content.story") --}}
    
        {{-- <div class="row">
            <div class="col-12 pl-2 pr-2">
                <div class="m-1">
                        <div class="card">
                            <div class="row w-100 mx-3 my-2 text-center">
                                <a href="{{url('user/wallet')}}" style="color: black">

                                    <img src="{{ asset('new_assets/icon/วอลเล็ท.png')}}" >
                                    <span class="ml-2 align-self-center font-weight-bold" style=" border-right: 2px solid cornflowerblue;padding-right: 0.5rem; "> ฿ {{number_format($u->customer_wallet,2,'.',',')}}</span>
                                </a>
                                <a href="{{url('user/convert')}}" style="color: black">

                                    <img src="{{ asset('new_assets/icon/คอยน์.png')}}"  style="padding-left: 0.6rem;">
                                    <span class="ml-2 align-self-center font-weight-bold" style=" border-right: 2px solid cornflowerblue;padding-right: 0.5rem; ">{{number_format($u->customer_coin,2,'.',',')}} </span>
                                </a>
                                <a href="{{url('user/donate')}}" style="color: black">

                                    <img src="{{ asset('new_assets/icon/โดเนท.png')}}"  style="padding-left: 0.6rem;"> 
                                    <span class="ml-2 align-self-center font-weight-bold"> {{$u->customer_donate}}</span>
                                </a>
                            </div>
                          
                        </div>
                    
                </div>
            </div>
           
        </div> --}}


        <div  class="row" style="overflow: auto ; width: 100%; hight: 100px ; justify-content: center;"> 
            <div class="col-4 ">
                    <a href="{{url('user/wallet')}}" style="color: black">
                        <div class="card">
                            <div class="row w-100 mx-3 my-2 text-center">
                                <img src="{{ asset('new_assets/icon/วอลเล็ท.png')}}" >
                                <span class="ml-1 align-self-center font-weight-bold " >  {{number_format($u->customer_wallet,2,'.',',')}} <h6>กระเป๋าเงิน</h6></span>
                            </div>
                            

                        </div>
                    </a>
            </div>
            <div class="col-4 ">
                <a href="{{url('user/convert')}}" style="color: black">
                    <div class="card">
                        <div class="row w-100 mx-3 my-2 text-center">
                            <img src="{{ asset('new_assets/icon/คอยน์.png')}}" >
                            <span class="ml-1 align-self-center font-weight-bold">{{number_format($u->customer_coin,2,'.',',')}}<h6>คอยน์</h6> </span>
                        </div>
                        
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a href="{{url('user/donate')}}" style="color: black">
                    <div class="card">
                        <div class="row w-100 mx-3 my-2 text-center">
                            <img src="{{ asset('new_assets/icon/โดเนท.png')}}" >
                            <span class="ml-1 align-self-center font-weight-bold">{{number_format($u->customer_donate,2,'.',',')}} <h6>โดเนท</h6></span>
                        </div>
                        
                    </div>
                </a>
            </div>
        </div>
  

    {{-- Write Me --}}
    <br>
    <div class="row">
        <div class="col-12 pl-2 pr-2">
            <div class="widget-post" aria-labelledby="post-header-title">
                <div class="widget-post__header">
                <h2 class="widget-post__title" id="post-header-title">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    Write Me
                </h2>
                </div>
                <form id="widget-form" class="widget-post__form" name="form" action="{{url('userpostcontent')}}" method="POST" aria-label="post widget" enctype="multipart/form-data">
                    @csrf

                    <div class="widget-post__content">
                        <label for="post-content" class="sr-only">Share</label>
                        <textarea name="post" id="post-content" class="widget-post__textarea scroller" placeholder="What's happening?" rows="7" required></textarea>
                        <div class="row" id="rowsocial"> </div>
                        
                    </div>
                    <div class="widget-post__options is--hidden" id="stock-options">
                    </div>
                    <div class="widget-post__actions post--actions">
                        <div class="post-actions__attachments">
                            {{-- <button type="button" class="btn post-actions__stock attachments--btn" aria-controls="stock-options" aria-haspopup="true">
                                <i class="fa fa-usd" aria-hidden="true"></i>
                                stock
                            </button> --}}

                            <button type="button" class="btn post-actions__upload attachments--btn" onclick="addimagegallery()">
                                <label for="upload-video" class="post-actions__label">

                                    <i class="fa fa-video " aria-hidden="true"></i> 
                                </label>
                            </button>
                            {{-- <input type="file" id="upload-video" name="video[0]" accept="video/mp4;capture=camera" multiple onclick="addimagegallery()"> --}}

                            <button type="button" class="btn post-actions__upload attachments--btn" onclick="addimagegallery()">
                                <label for="upload-image" class="post-actions__label">
                                    <i class="fa fa-file-image" aria-hidden="true"></i> 
                                </label>
                            </button>
                            {{-- <input type="file" id="upload-image" name="img[0]" accept="image/*;capture=camera" multiple onchange="addimagegallery()"> --}}
                        </div>

                        <div class="post-actions__widget">
                            <button class="btn post-actions__publish">Post</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>
  

    <div class="mt-3" name="story_videos_section" id="story_videos_section">

        {{-- <ul class="nav nav-tabs style1 mt-2" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#video" role="tab">Video</a></li>
            {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#podcast" role="tab">Podcast</a></li> 
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#store" role="tab"> Store</a></li>
            <li class="nav-item active"><a class="nav-link " data-toggle="tab" href="#home" role="tab">Family</a></li>

        </ul> --}}

        <div class="tab-content mt-2">


            <div id="home" class="tab-pane fade in active show">
                
               
                @foreach ($c as $sqls)
                    <?php   $count = DB::Table('tb_comments')->where('comment_object_id', $sqls->new_id)->get();
                            $countreply = DB::Table('tb_comment_replys')->where('news_id',$sqls->new_id)->get();
                            $imggal = DB::Table('tb_new_imgs')->where('new_id',$sqls->new_id)->get();
                            $f = DB::Table('tb_followers')->where('id_c_follower',$sqls->customer_id)->where('id_customer',Session::get('cid'))->first();
                            $bm = DB::Table('tb_bookmarks')->where('id_ref',$sqls->new_id)->where('customer_id',Session::get('cid'))->first();
                            $la = DB::Table('tb_content_likes')->where('content_id',$sqls->new_id )->where('customer_id',Session::get('cid'))->first();
                            $user = DB::Table('tb_customers')->where('customer_id',$sqls->customer_id)->first();
                            $sh = DB::Table('tb_content_shares')->where('new_id',$sqls->new_id)->get();
                           
                    ?>
                    
                    <div class="card my-3">
                        <div class="card-body row col-12 justify-content-center m-0">
                            @if($sqls->new_type == 'C' || $sqls->new_type == 'V')
                                <img src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
                            @else
                                @if($user->provider == null)
                                    <img src="{{asset('storage/profile_cover/'.$user->customer_img.'')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
                                @elseif($user->customer_img != null)
                                    <img src="{{$user->customer_img}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
                                @else
                                    <img src="{{asset('original_assets/img/material_icons/woman.png')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
                            
                            
                                @endif
                            @endif
                            <div class="card-title col-8  align-self-center m-0 ">
                                <div class="card-title m-0 row align-self-center">
                                    @if($sqls->new_type == 'C' || $sqls->new_type == 'V')
                                        <h4 class=" m-0 p-0">{{$sqls->created_by}}</h4>
                                    @else
                                        <h4 class=" m-0 p-0">{{$sqls->customer_username}}</h4>
                                        @if($sqls->customer_id !== Session::get('cid'))
                                            <a href="#" class="ml-1 align-self-center" > 
                                                @if($f == null)
                                                    <div id="follow{{$sqls->new_id}}"  style="display: " class="allidfollow{{$sqls->customer_id}}" >
                                                        <h6 class="m-0 p-0 "  onclick="followContent({{$sqls->new_id}},{{$sqls->customer_id}})" style="color: rgba(255, 92, 99, 1);" >ติดตาม</h6>

                                                    </div>
                                                   
                                                @else
                                                    <div id="unfollow{{$sqls->new_id}}" style="display: "  class="allidunfollow{{$sqls->customer_id}}">
                                                        <h6 class="m-0 p-0 "  onclick="UNfollowContent({{$sqls->new_id}},{{$sqls->customer_id}})" style="color: green;" >ติดตามแล้ว</h6>

                                                    </div>
                                                    
                                                @endif

                                                <div id="follows{{$sqls->new_id}}"  style="display:none " class="allidfollows{{$sqls->customer_id}}" >
                                                    <h6 class="m-0 p-0 " onclick="followContent2({{$sqls->new_id}},{{$sqls->customer_id}})" style="color: rgba(255, 92, 99, 1);" >ติดตาม</h6>

                                                </div>
                                                <div id="unfollows{{$sqls->new_id}}" style="display: none" class="allidunfollows{{$sqls->customer_id}}" > 
                                                    <h6 class="m-0 p-0 "  onclick="UNfollowContent2({{$sqls->new_id}},{{$sqls->customer_id}})" style="color: green;" >ติดตามแล้ว</h6>

                                                </div>
                                            </a>
                                        @endif
                                        
                                    @endif
                                </div>
                                <h6 class=" m-0 p-0">{{$sqls->created_at}}</h6>
                            </div>

                            {{-- bookmark --}}
                            <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
                                @if($bm !== null)

                                    <div id="bmm{{$sqls->new_id}}" style="margin-right: 10px">
                                        <ion-icon name="bookmark" style="font-size:25px" onclick="unbookmark({{$sqls->new_id}})" ></ion-icon>
                                    </div>
                                   

                                @else
                                    <div id="bmoll{{$sqls->new_id}}" style="margin-right: 10px">
                                        <ion-icon name="bookmark-outline" style="font-size:25px" onclick="bookmarkadd({{$sqls->new_id}})"></ion-icon>
                                    </div>
                                   
                                @endif

                                <div style="display: none" id="bmol{{$sqls->new_id}}" style="margin-right: 10px">
                                    <ion-icon name="bookmark-outline" style="font-size:25px" onclick="bookmarkadd2({{$sqls->new_id}})"></ion-icon>

                                </div>

                                <div style="display: none" id="bm{{$sqls->new_id}}" style="margin-right: 10px">
                                    <ion-icon name="bookmark" style="font-size:25px" onclick="unbookmark2({{$sqls->new_id}})" ></ion-icon>
                                </div>


                                <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false"></ion-icon>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if($sqls->customer_id== Session::get('cid'))
                                        {{-- <li><a class="dropdown-item" tabindex="-1" href="#">แก้ไขโพสต์</a></li> --}}
                                        <li><a class="dropdown-item" tabindex="-1" href="javascript:;" onclick="hidecontent({{$sqls->new_id}})">ซ่อนโพสต์</a></li>
                                        <li><a class="dropdown-item" tabindex="-1" href="javascript:;" onclick="deletecontent({{$sqls->new_id}})">ลบโพสต์</a></li>
                                        <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                                    @endif
                                    <li><a class="dropdown-item" tabindex="-1" href="{{url('content/'.$sqls->new_id.'')}}">แสดงเพิ่มเติม</a></li>
                                    <li><a class="dropdown-item" tabindex="-1" href="javascript:;" onclick="donatebtn({{$sqls->customer_id}});">สนับสนุนโพส</a></li>
                                    <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                                    <li class="dropdown-submenu">
                                        
                                        <a class="test dropdown-item" style="background-color: #FFFFFF !important;color:black !important" tabindex="-1" href="#">รายงานโพสต์</a>
                                            <ul class="dropdown-menu ">
                                                <h6 class="dropdown-header">ตัวเลือกการรายงาน</h6>
                
                                                <li><a class="dropdown-item" tabindex="-1" href="#">ภาพไม่เหมาะสม</a></li>
                                                <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                
                                                <li><a class="dropdown-item" tabindex="-1" href="#">การขายที่ไม่ได้รับอนุญาต</a></li>
                                                <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                
                                                <li><a class="dropdown-item" tabindex="-1" href="#">สแปม</a></li>
                                                <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                
                                                <li><a class="dropdown-item" tabindex="-1" href="#">ความรุนแรง</a></li>
                                                <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                
                                                <li><a class="dropdown-item" tabindex="-1" href="#">คำพูดที่แสดงความเกลียดชัง</a></li>
                                                <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                
                                                <li><a class="dropdown-item" tabindex="-1" href="#">ข้อมูลเท็จ</a></li>
                                                <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                
                                                <li><a class="dropdown-item" tabindex="-1" href="#">การคุกคาม</a></li>
                                                <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                
                                                <li><a class="dropdown-item" tabindex="-1" href="#">อื่นๆ</a></li>
                                            
                                            </ul>
                                    </li>
                                </ul>

                                {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    @if($sqls->customer_id == Session::get('cid'))
                                        <a class="dropdown-item" href="#">แก้ไขโพสต์</a>
                                        <a class="dropdown-item" href="javascript:;" onclick="hidecontent({{$sqls->new_id}})">ซ่อนโพสต์</a>
                                        <a class="dropdown-item" href="javascript:;" onclick="deletecontent({{$sqls->new_id}})">ลบโพสต์</a>
                                        <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                                    @endif
                                    <a class="dropdown-item" href="{{url('content/'.$sqls->new_id.'')}}">แสดงเพิ่มเติม </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:;" onclick="donatebtn({{$sqls->customer_id}});">สนับสนุนโพส </a>
                                    <div class="dropdown-divider"></div>
                                    
                                    <a class="dropdown-toggle" href="javascript:;" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">รายงานโพสต์ </a>

                                    <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">รายงานโพสต์ </a>
                                </div>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                    <h6 class="dropdown-header">ตัวเลือกการรายงาน</h6>
                                    <a class="dropdown-item" href="{{url('content/'.$sqls->new_id.'')}}">ภาพไม่เหมาะสม</a>
                                    <a class="dropdown-item" href="javascript:;" onclick="donatebtn({{$sqls->customer_id}});">การขายที่ไม่ได้รับอนุญาต</a>
                                    <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">สแปม</a>
                                    <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">ความรุนแรง</a>
                                    <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">คำพูดที่แสดงความเกลียดชัง</a>
                                    <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">ข้อมูลเท็จ</a>
                                    <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">การคุกคาม</a>
                                    <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">อื่นๆ</a>
                                </div> --}}
                            </div>
                        </div>
                        

                        <div class="card-body p-2">
                            @if(strlen($sqls->new_title) >500)
                               
                                <a href="{{url('content/'.$sqls->new_id.'')}}" id="read{{$sqls->new_id}}" class="card-text" style="color: black;display:">{{mb_substr($sqls->new_title, 0, 500).'...'}}</a>
                                <a href="javascript:;" style="color:blue;display:" id="btnread{{$sqls->new_id}}" onclick="readmore({{$sqls->new_id}});"> อ่านต่อ</a>

                                <a href="{{url('content/'.$sqls->new_id.'')}}" id="readmore{{$sqls->new_id}}" class="card-text" style="color: black;display:none">{{$sqls->new_title}}</a>

                            @else
                                <a href="{{url('content/'.$sqls->new_id.'')}}" class="card-text" style="color: black">{{$sqls->new_title}}</a>
                            @endif

                        </div>
                        {{-- <a href="{{url('content/'.$sqls->new_id.'')}}"> --}}
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                            
                            @if($sqls->new_type == 'C')
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$sqls->new_img.'')}}" class="d-block w-100" style="width: 375px; height: auto;">
                                    </div>
                                    @if($imggal->count() >1)
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <?php  unset( $imggal[0] );?>

                                        @foreach($imggal as $imgs)
                                            <div class="carousel-item">
                                                <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$imgs->name.'')}}" class="d-block w-100" style="width: 375px; height: auto;">
                                            </div>
                                        @endforeach
                                    {{-- @else --}}
                                        
                                    @endif
                                        
                                </div>
                            @else
                                <div class="carousel-inner">

                                    @if($imggal->count() != 0)
                                        @if($imggal[0]->type =='I')
                                            <div class="carousel-item active">
                                                <img src="{{asset('storage/content_img/'.$imggal[0]->name.'')}}" class="d-block w-100" style="width: 375px; height: auto;">
                                            </div>
                                        @else
                                            <div class="carousel-item active">
                                                <video width="100%" height="auto" controls >
                                                    <source src="{{asset('storage/content_img/'.$imggal[0]->name.'')}}" type=video/ogg>
                                                    <source src="{{asset('storage/content_img/'.$imggal[0]->name.'')}}" type=video/mp4>
                                                </video>
                                            </div>
                                        @endif
                                        @if($imggal->count() > 1)
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            <?php  unset( $imggal[0] );?>
                                            @foreach($imggal as $imgs)
                                                @if($imgs->type =='I')
                                                    
                                                    <div class="carousel-item ">
                                                        <img src="{{asset('storage/content_img/'.$imgs->name.'')}}" class="d-block w-100" style="width: 375px; height: auto;">
                                                    </div>
                                                @else
                                                    
                                                    <div class="carousel-item " >
                                                        <video width="100%" height="auto" controls >
                                                            <source src="{{asset('storage/content_img/'.$imgs->name.'')}}" type=video/ogg>
                                                            <source src="{{asset('storage/content_img/'.$imgs->name.'')}}" type=video/mp4>
                                                        </video>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif


                                        
                                </div>
                            @endif
                            
                        </div>
                        {{-- </a> --}}
                     

                        <a href="{{url('content/'.$sqls->new_id.'')}}">
                            <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
                                <h6 class="mb-0 ml-1 card-subtitle text-muted" id="countlike{{$sqls->new_id}}">{{$sqls->like?''.$sqls->like.'':'0'}} ชื่นชอบ</h6>
                                <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$count->count() + $countreply->count()}} รายการ</h6>
                                <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sh->count()}} แชร์</h6>

                            </div>
                        </a>

                        <div class="card-footer row justify-content-center align-items-center" style="padding-left: 3px; padding-right: 3px;">

                            <div class="col-3 row p-0  justify-content-center" id="likebutton{{$sqls->new_id}}" style="display: ">
                                <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                                @if($la == null)
                                    <h5 class="mb-0 ml-1 " id="myLike{{$sqls->new_id}}" style="color: black" onclick="myLike({{$sqls->new_id}})">ถูกใจ</h5>
                                @else
                                    <h5 class="mb-0 ml-1 " id="unmyLike{{$sqls->new_id}}" style="color: green" onclick="UNmyLike({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                                @endif
                            </div>
        
        
                            <div style="display: none" class="col-3 row p-0  justify-content-center" id="myLike2{{$sqls->new_id}}" >
                                <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1 " style="color: black" onclick="myLike2({{$sqls->new_id}})">ถูกใจ</h5>
                            </div>
        
                            <div style="display: none" class="col-3 row p-0  justify-content-center" id="unmyLike2{{$sqls->new_id}}">
                                <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1 "  style="color: green" onclick="UNmyLike2({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                            </div>


                            <div class="col-5 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/icon/แสดงความคิดเห็น.png')}}" alt="alt" style="width:17px; height:17px;margin-left:15px">
                                <a href="{{url('content/'.$sqls->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
                            </div>
                            <div class="col-2 row p-0 align-items-center" data-toggle="modal" data-target="#share" >
                                <img src="{{ asset('new_assets/icon/แชร์.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1" >แชร์</h5>
                            </div>
                            @if($sqls->customer_id != 0)
                                <div class="col-2 row p-0 align-items-center ml-1" onclick="donatebtn({{$sqls->customer_id}});">
                                    <img src="{{asset('new_assets/icon/โดเนท.png')}}" alt="alt" style="width:17px; height:17px;">
                                    <h5 class="mb-0 ml-1">โดเนท</h5>
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
            <br>


             <!-- Modal share -->
            <div class="modal fade" id="share" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  <!--  แก้ ID share ให้ตรงกับ data-target ด้านบน -->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" >แบ่งปันข้อมูล</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="urlencode" value="1">

                        <div class="modal-body">
                            
                        
                            <?php $urlen = urlencode("https://modii.sapapps.work/content/1")?>
                        
                                <br>
                                <div class="row justify-content-around p-1 ">
                                    <a href="https://social-plugins.line.me/lineit/share?url={{$urlen}}" class="m-0 text-center align-self-end  share-item">
                                        <img src="{{ asset('new_assets/img/icon/share/LINE.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Line</h5>
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{$urlen}}" class="m-0 text-center  align-self-end share-item">
                                        <img src="{{ asset('new_assets/img/icon/share/facebook.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Facebook</h5>

                                    </a>
                                    <a href="" class="m-0 text-center align-self-end  share-item">
                                        <img src="{{ asset('new_assets/img/icon/share/Link.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Copy link</h5>

                                    </a>
                                    <a href="" class="m-0 text-center align-self-end  share-item">
                                        <img src="{{ asset('new_assets/img/icon/share/Messenger.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Messenger</h5>

                                    </a>
                                    {{-- <a href="" class="m-0 text-center align-self-end  share-item">
                                        <img src="{{ asset('new_assets/img/icon/share/Email.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                        <h5 class="font-weight-bold m-0 mt-1">Email</h5>
                                    </a> --}}
                                    <div class="row col-11 mt-4 p-0">
                                        <button type="button" data-dismiss="modal" class="btn  btn-block font-weight-bold" style="background-color:rgba(255, 92, 99, 1); color:#FFF; font-size:15px; border-radius: 8px;">ยกเลิก</button>
                                    </div>               
                                </div>
                            <br>

                        </div>
                   
                    </div>
                </div>
            </div>
            <!-- /end Modal share -->

            <!-- Modal donate -->
            <div class="modal fade" id="donate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  <!--  แก้ ID share ให้ตรงกับ data-target ด้านบน -->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" >Donate</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" name="donateid" value="0" id="donateid">
                        <div class="modal-body">
                            
                          <div class=" row" style="overflow: auto ; width: 100%; height: 450px; justify-content: center;">
                             <!-- Start img Donate -->
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1" > 
                                            <a href="javascript:;" onclick="donate(66,'Ghost');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/ghost.png') }}" alt="alt" class="rounded-circle" width="100%"  style="background-color:#e4e8eb ;  "  >
                                            <h6 class="card-text">66 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center p-1 ">  
                                            <a href="javascript:;" onclick="donate(9,'Hi');">                     
                                            <img src="{{  asset('new_assets/img/IconDonate/Hi.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ; " >
                                            <h6 class="card-text">9 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(26,'Iloveyou');">             
                                            <img src="{{  asset('new_assets/img/IconDonate/iloveyou.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ; " >
                                            <h6 class="card-text">26 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center  p-1">     
                                            <a href="javascript:;" onclick="donate(3789,'Supercar');">                   
                                            <img src="{{  asset('new_assets/img/IconDonate/Supercar.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ; ">
                                            <h6 class="card-text">3,789 เหรียญ</h6>
                                            </a> 
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">     
                                            <a href="javascript:;" onclick="donate(4444,'UFO');">                
                                            <img src="{{  asset('new_assets/img/IconDonate/UFO.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">4,444 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center p-1">  
                                            <a href="javascript:;" onclick="donate(666,'กระโหลก');">                     
                                            <img src="{{  asset('new_assets/img/IconDonate/กระโหลก.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">666 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center p-1 ">     
                                            <a href="javascript:;" onclick="donate(1550,'กล้อง');">                
                                            <img src="{{  asset('new_assets/img/IconDonate/กล้อง.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">1,550 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center p-1 ">  
                                            <a href="javascript:;" onclick="donate(1234,'เกมบอย');">                  
                                            <img src="{{  asset('new_assets/img/IconDonate/เกมบอย.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">1,234 เหรียญ</h6>
                                            </a> 
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">        
                                            <a href="javascript:;" onclick="donate(75,'ของขวัญ');">              
                                            <img src="{{  asset('new_assets/img/IconDonate/ของขวัญ.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">75 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(360,'เข็มฉีดยา');">                         
                                            <img src="{{  asset('new_assets/img/IconDonate/เข็มฉีดยา.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">360 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center p-1 "> 
                                            <a href="javascript:;" onclick="donate(130,'เค้ก');">                       
                                            <img src="{{  asset('new_assets/img/IconDonate/เค้ก.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">130 เหรียญ</h6>
                                            </a> 
                                        </div>                      
                                        <div class="text-center p-1 ">   
                                            <a href="javascript:;" onclick="donate(5000,'เครื่องบิน');">                  
                                            <img src="{{  asset('new_assets/img/IconDonate/เครื่องบิน.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">5,000 เหรียญ</h6>
                                            </a> 
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(1000,'จอยเกม');">              
                                            <img src="{{  asset('new_assets/img/IconDonate/จอยเกม.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">1,000 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(969,'จักรยาน');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/จักรยาน.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">969 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1 ">     
                                            <a href="javascript:;" onclick="donate(88,'เจ๋ง');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/เจ๋ง.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">88 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1 ">    
                                            <a href="javascript:;" onclick="donate(999,'ดวงอาทิตย์');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/ดวงอาทิตย์.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">999 เหรียญ</h6>
                                            </a>
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(1,'ดอกไม้');">                
                                            <img src="{{  asset('new_assets/img/IconDonate/ดอกไม้.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">1 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(12,'ดาว');">                  
                                            <img src="{{  asset('new_assets/img/IconDonate/ดาว.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">12 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">     
                                            <a href="javascript:;" onclick="donate(20,'โดนัท');">                 
                                            <img src="{{  asset('new_assets/img/IconDonate/โดนัท.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">20 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">    
                                            <a href="javascript:;" onclick="donate(18,'ตุ๊กตา');">                  
                                            <img src="{{  asset('new_assets/img/IconDonate/ตุ๊กตา.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">18 เหรียญ</h6>
                                            </a>
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(800 ,'ถ้วยรางวัลที่ 1');">                
                                            <img src="{{  asset('new_assets/img/IconDonate/ถ้วยรางวัลที่ 1.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">800 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(700,'ถ้วยรางวัลที่ 2');">                     
                                            <img src="{{  asset('new_assets/img/IconDonate/ถ้วยรางวัลที่ 2.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">700 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1 ">     
                                            <a href="javascript:;" onclick="donate(600,'ถ้วยรางวัลที่ 3');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/ถ้วยรางวัลที่ 3.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">600 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">    
                                            <a href="javascript:;" onclick="donate(234,'ถุงเงิน');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/ถุงเงิน.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">234 เหรียญ</h6>
                                            </a>
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(456,'ทามาก๊อต');">                 
                                            <img src="{{  asset('new_assets/img/IconDonate/ทามาก๊อต.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">456 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(1888,'ทีวี');">                      
                                            <img src="{{  asset('new_assets/img/IconDonate/ทีวี.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">1,888 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">     
                                            <a href="javascript:;" onclick="donate(300,'เทปคาสเซ็ต');">                   
                                            <img src="{{  asset('new_assets/img/IconDonate/เทปคาสเซ็ต.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">300 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">    
                                            <a href="javascript:;" onclick="donate(45,'ปั้มน้ำมัน');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/ปั้มน้ำมัน.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">45 เหรียญ</h6>
                                            </a>
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(444,'ไฟ');">               
                                            <img src="{{  asset('new_assets/img/IconDonate/ไฟ.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">444 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(2444,'ภูเขาไฟ');">                     
                                            <img src="{{  asset('new_assets/img/IconDonate/ภูเขาไฟ.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">2,444 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1 ">     
                                            <a href="javascript:;" onclick="donate(3333,'มงกุฎ');">                   
                                            <img src="{{  asset('new_assets/img/IconDonate/มงกุฎ.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">3,333 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">    
                                            <a href="javascript:;" onclick="donate(2850,'มอเตอร์ไซค์');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/มอเตอร์ไซค์.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">2,850 เหรียญ</h6>
                                            </a>
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(168,'แมวกวัก');">                  
                                            <img src="{{  asset('new_assets/img/IconDonate/แมวกวัก.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">168 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(5555,'ยานอวกาศ');">                     
                                            <img src="{{  asset('new_assets/img/IconDonate/ยานอวกาศ.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">5,555 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1 ">     
                                            <a href="javascript:;" onclick="donate(555,'ระเบิด');">                  
                                            <img src="{{  asset('new_assets/img/IconDonate/ระเบิด.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">555 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">    
                                            <a href="javascript:;" onclick="donate(99,'รุ้ง');">                   
                                            <img src="{{  asset('new_assets/img/IconDonate/รุ้ง.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">99 เหรียญ</h6>
                                            </a>
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(33,'ลูกโป่ง');">                
                                            <img src="{{  asset('new_assets/img/IconDonate/ลูกโป่ง.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">33 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(5,'ลูกอม');">                
                                            <img src="{{  asset('new_assets/img/IconDonate/ลูกอม.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">5 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">     
                                            <a href="javascript:;" onclick="donate(888,'สายฟ้า');">                  
                                            <img src="{{  asset('new_assets/img/IconDonate/สายฟ้า.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">888 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">    
                                            <a href="javascript:;" onclick="donate(6666,'หีบสมบัติ');">                    
                                            <img src="{{  asset('new_assets/img/IconDonate/หีบสมบัติ.png') }}" alt="alt" class="rounded-circle" width="100%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">6,666 เหรียญ</h6>
                                            </a>
                                        </div>                                                                        
                            </div> 
                            <div class="d-flex justify-content-center"> <!-- แถวล่ะ 4 รูป -->
                                        <div class="text-center p-1">       
                                            <a href="javascript:;" onclick="donate(269,'หุ่นยนต์');">                
                                            <img src="{{  asset('new_assets/img/IconDonate/หุ่นยนต์.png') }}" alt="alt" class="rounded-circle" width="50%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">269 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center p-1">   
                                            <a href="javascript:;" onclick="donate(55,'เห็ดเพิ่มพลัง');">                   
                                            <img src="{{  asset('new_assets/img/IconDonate/เห็ดเพิ่มพลัง.png') }}" alt="alt" class="rounded-circle" width="50%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">55 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                        <div class="text-center  p-1">     
                                            <a href="javascript:;" onclick="donate(30,'ไอศกรีม');">              
                                            <img src="{{  asset('new_assets/img/IconDonate/ไอศกรีม.png') }}" alt="alt" class="rounded-circle" width="50%" style="background-color:#e4e8eb ;  ">
                                            <h6 class="card-text">30 เหรียญ</h6>
                                            </a>
                                        </div>                      
                                                                                                      
                            </div> 
                            <!-- End img Donate -->           
                          
                          </div>

                        </div>
                   
                    </div>
                </div>
            </div>
            <!-- /end Modal donate -->

            {{-- <div id="video" class="tab-pane fade">
                @foreach ($v as $item)
                    <?php $count = DB::Table('tb_comments')->where('comment_object_id', $item->new_id)->get() ?> 
                    <div class="card my-3">
                        <div class="card-body row col-12 justify-content-center m-0">
                            <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

                            <div class="card-title col-8  align-self-center m-0 ">
                                <div class="card-title m-0 row align-self-center">
                                    <h4 class=" m-0 p-0">{{$item->created_by}}</h4>
                                    <a href="#" class="ml-1 align-self-center">
                                        <h6 class="m-0 p-0 " style="color:  rgba(255, 92, 99, 1);">ติดตาม</h6>
                                    </a>
                                </div>
                                <h6 class=" m-0 p-0">{{$item->created_at}}</h6>
                            </div>

                            <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
                                <ion-icon name="bookmark-outline" style="font-size:25px"></ion-icon>
                                <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px"></ion-icon>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <a href="{{url('content/'.$item->new_id.'')}}"><p class="card-text">{{substr($item->new_title,0,80)}}</p></a>

                        </div>
                        <iframe width="390" height="215" src="https://www.youtube.com/embed/{{$item->new_img}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">230 ชื่นชอบ</h6>
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น 120 รายการ</h6>
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">4 แชร์</h6>
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">2.7k รับชม</h6>
                        </div>

                        <div class="card-footer row    justify-content-center ">

                            <div class="col-3 row p-0  justify-content-center">
                                <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1 ">ชื่นชอบ</h5>
                            </div>
                            <div class="col-5 row p-0 justify-content-center ml-1 ">
                                <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
                                <a href="{{url('content/'.$item->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
                            </div>
                            <div class="col-2 row p-0 justify-content-center ml-1 ">
                                <img src="{{ asset('new_assets/img/icon/share.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ">แชร์</h5>
                            </div>
                            <div class="col-3 row p-0 justify-content-center  ">
                                <img src="{{ asset('new_assets/img/icon/diamond.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1">โดเนท</h5>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div> --}}


            {{-- <div id="podcast" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div> --}}



            {{-- <div id="store" class="tab-pane fade">
                <div class="container p-1 my-3">

                    <img class="justify-content-center w-100" src="{{ asset('new_assets/img/4a1ef46ac4bc5a20dd6ea8c2c5d5f5af.png')}}" alt="alt">
                    <div class="col-12 p-2 row justify-content-center m-0">
                        @foreach($cat as $cats)
                            <div class="col-3 p-1 text-center ">
                                <a href="{{url('/shopping/category/'.$cats->cat_id.'')}}"><img class=" rounded-circle  " src="{{('https://testgit.sapapps.work/moldii/storage/app/category_cover/'.$cats->cat_img.'')}}" alt="alt" style="width: 53px; height:53px;"></a>
                                <h6 class="mt-1">{{$cats->cat_name}}</h6>
                            </div>
                        @endforeach


                    </div>
                    <div class="card-title my-1 font-weight-bold font-weight-bolder">คัดสรรมาเพื่อคุณ </div>

                    <div class="" name="story_videos_section" id="story_videos_section">

                        <div class="carousel-multiple owl-carousel owl-theme">
                            @foreach($pro as $pros)
                                <a href="{{url('shopping/product/'.$pros->product_id.'')}}">
                                    <div class="item">
                                        <div class="card ">
                                            <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$pros->product_img.'')}}" alt="alt" style=" height:120px;">
                                            <div class="card-body col-12 p-1 ">
                                                <div class="row pl-1">
                                                    <h5 class=" font-weight-bolder m-0">{{$pros->product_name}}</h5>
                                                </div>
                                                <div class=" row ">
                                                    <h6 class="mt-1 pl-1 m-0 col-6">{{$pros->product_price}}</h6>
                                                    <div class="pl-2">
                                                        <h6 class="m-0"><small>ขายได้ 100 ชิ้น</small></h6>
                                                        <div class="rating-system2">

                                                            <input type="radio" name='rate2' id="star5_2" />
                                                            <label for="star5_2"></label>

                                                            <input type="radio" name='rate2' id="star4_2" />
                                                            <label for="star4_2"></label>

                                                            <input type="radio" name='rate2' id="star3_2" />
                                                            <label for="star3_2"></label>

                                                            <input type="radio" name='rate2' id="star2_2" />
                                                            <label for="star2_2"></label>

                                                            <input type="radio" name='rate2' id="star1_2" />
                                                            <label for="star1_2"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    </div>

                    <div class="card-title my-3 font-weight-bold font-weight-bolder">สินค้าแนะนำประจำวัน</div>

                    <div class="col-12 row m-0 justify-content-center ">

                        @foreach($pro as $products)
                            <a href="{{url('shopping/product/'.$products->product_id.'')}}" style="width: 50%;">
                                <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                                    <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$products->product_img.'')}}" alt="alt" style=" height:120px;">
                                    <div class="card-body col-12 p-1 ">
                                        <div class="row pl-1">
                                            <h5 class=" font-weight-bolder m-0">{{$products->product_name}}</h5>
                                        </div>
                                        <div class=" row ">
                                            <h6 class="mt-1 pl-1 m-0 col-6">{{$products->product_price}}</h6>
                                            <div class="pl-2">
                                                <h6 class="m-0"><small>ขายได้ 100 ชิ้น</small></h6>
                                                <div class="rating-system2">

                                                    <input type="radio" name='rate2' id="star5_2" />
                                                    <label for="star5_2"></label>

                                                    <input type="radio" name='rate2' id="star4_2" />
                                                    <label for="star4_2"></label>

                                                    <input type="radio" name='rate2' id="star3_2" />
                                                    <label for="star3_2"></label>

                                                    <input type="radio" name='rate2' id="star2_2" />
                                                    <label for="star2_2"></label>

                                                    <input type="radio" name='rate2' id="star1_2" />
                                                    <label for="star1_2"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>

                    <!-- align-self-center justify-content-center -->

                </div>
            </div> --}}


        </div>

    </div>
    @endsection


    @section('choice')
        <div class="" id="share_container">
            <?php $urlen = urlencode("https://modii.sapapps.work/content/1")?>
            <div class="share-box p-2" id="share_box">
                <div class="text-center">
                    <h4 class="font-weight-bold">แบ่งปันข้อมูล</h4>
                </div>
                <div class="row justify-content-around p-1 ">
                    <a href="" class="m-0 text-center align-self-end  share-item">
                        <img src="{{ asset('new_assets/img/icon/share/LINE.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Line</h5>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{$urlen}}" class="m-0 text-center  align-self-end share-item">
                        <img src="{{ asset('new_assets/img/icon/share/facebook.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Facebook</h5>

                    </a>
                    <a href="" class="m-0 text-center align-self-end  share-item">
                        <img src="{{ asset('new_assets/img/icon/share/Link.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Copy link</h5>

                    </a>
                    <a href="" class="m-0 text-center align-self-end  share-item">
                        <img src="{{ asset('new_assets/img/icon/share/Messenger.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Messenger</h5>

                    </a>
                    {{-- <a href="" class="m-0 text-center align-self-end  share-item">
                        <img src="{{ asset('new_assets/img/icon/share/Email.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Email</h5>
                    </a> --}}
                    <div class="row col-11 mt-4 p-0">
                        <button type="button" id="off_share_btn" class="btn  btn-block font-weight-bold" style="background-color:rgba(255, 92, 99, 1); color:#FFF; font-size:15px; border-radius: 8px;">ยกเลิก</button>

                    </div>
                </div>
            </div>


        </div>



    @endsection


    @section('custom_script')
    {{-- searchBox --}}
        <script>
            var a = "{{Session::get('success')}}";
            if (a) {
                Swal.fire({
                    text : a,
                    confirmButtonColor: "#fc684b",
                })
            }

            bottom_now(1);

            $(document).ready(function(){
                $('.dropdown-submenu a.test').on("click", function(e){
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });

            function readmore(v){
                document.getElementById('readmore'+v).style.display='';
                document.getElementById('read'+v).style.display='none';
                document.getElementById('btnread'+v).style.display='none';
            }
            
            var gallery = 1000;

            // const btnSearch = document.getElementById('btn_search_2');
            // const offSearch = document.getElementById('off_search_2');
            // const offSearch_2 = document.querySelector('.off');
            const searchCon = document.getElementById('input_search_1');
            const searchBox = document.getElementById('search_box_2');

            
            searchCon.addEventListener('click', () => {
                // searchCon.classList.add('search-container-2');
                // searchBox.classList.add('show-search-box');
                if (searchBox.style.display === "none") {
                    searchBox.style.display = "block";
                } else {
                    searchBox.style.display = "none";
                }
            });
            // offSearch.addEventListener('click', () => {
            //     searchCon.classList.remove('search-container-2');
            //     searchBox.classList.remove('show-search-box');
            // });
            // offSearch_2.addEventListener('click', () => {
            //     searchCon.classList.remove('search-container-2');
            //     searchBox.classList.remove('show-search-box');
            // });
            function out_page() {
                var x = document.getElementById("search_box_2");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }

            function myFunction() {
                var x = document.getElementById("search_2");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }


            function donatebtn(v){
                document.getElementById("donateid").value = v ;
                $('#donate').modal('show');
                
            }

            function donate(x,t){
        
                var donate = document.getElementById("donateid").value;

                var c= "{{$u->customer_coin}}";
                if(x > c){

                    Swal.fire({
                        text: 'จำนวนเหรียญไม่พอ!! \nต้องการเติมเหรียญหรือไม่?',
                        showCancelButton: true,
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก',
                        confirmButtonColor: "#fc684b",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace('/user/convert');
                        } else if (result.isDismissed) {
                            
                        }
                    })

                    
                }else{
                    $.ajax({
                        url: '{{ url("/submitdonate")}}',
                        type: 'GET',
                        dataType: 'HTML',
                        data: {'recive':donate,'name':t,'coin':x},
                        success: function(data) {
                            Swal.fire({
                                text : "โดเนทเรียบร้อยแล้ว",
                                confirmButtonColor: "#fc684b",
                            })
                            window.location.reload();
                        }
                    });

                }
            }
        </script>
        <script src="script.js"></script>

        
        {{-- bookmarkadd like followContent--}}
        <script>

            function bookmarkadd(id)
            {
                                
                document.getElementById('bm'+id).style.display = '';
                document.getElementById('bmoll'+id).style.display = 'none';
                // document.getElementById('bmol'+id).style.display = 'none';
                $.ajax({
                    url: '{{ url("/bookmarkadd")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
            }

            function unbookmark(id)
            {
                document.getElementById('bm'+id).style.display = 'none';
                document.getElementById('bmol'+id).style.display = '';
                $.ajax({
                    url: '{{ url("/unbookmark")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
            }


            function bookmarkadd2(id)
            {
                                
                document.getElementById('bm'+id).style.display = '';
                document.getElementById('bmol'+id).style.display = 'none';
                // document.getElementById('bmol'+id).style.display = 'none';
                $.ajax({
                    url: '{{ url("/bookmarkadd")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
            }

            function unbookmark2(id)
            {
                document.getElementById('bm'+id).style.display = 'none';
                document.getElementById('bmol'+id).style.display = '';
                $.ajax({
                    url: '{{ url("/unbookmark")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
            }


            function myLike(id) {
            
                // var x = document.getElementById("myLike"+id);
                
                // x.innerHTML = "ถูกใจแล้ว";
                // document.getElementById("myLike"+id).style.color = "green";
                $.ajax({
                    url: '{{ url("/likecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        document.getElementById("countlike"+id).innerHTML = data + ' ชื่นชอบ';
                        document.getElementById("unmyLike2"+id).style.display = '';
                        document.getElementById("likebutton"+id).style.display = 'none';
                    }
                });
                
            }


            function UNmyLike(id) {
            
                // var x = document.getElementById("unmyLike"+id);
            
            
                // x.innerHTML = "ถูกใจ";
                document.getElementById("unmyLike"+id).style.color = "black";
                $.ajax({
                    url: '{{ url("/unlikecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        document.getElementById("countlike"+id).innerHTML = data + ' ชื่นชอบ';
                        document.getElementById("myLike2"+id).style.display = '';
                        document.getElementById("likebutton"+id).style.display = 'none';
                    
                    }
                });
                
                
            }

            function myLike2(id) {
            
                // var x = document.getElementById("myLike2"+id);
                
                // x.innerHTML = "ถูกใจแล้ว";
                // document.getElementById("myLike2"+id).style.color = "green";
                $.ajax({
                    url: '{{ url("/likecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        document.getElementById("countlike"+id).innerHTML = data + ' ชื่นชอบ';
                        document.getElementById("likebutton"+id).style.display = '';
                        document.getElementById("myLike2"+id).style.display = 'none';
                    
                    }
                });
                
            }


            function UNmyLike2(id) {
            
                // var x = document.getElementById("unmyLike2"+id);
            
            
                // x.innerHTML = "ถูกใจ";
                document.getElementById("unmyLike2"+id).style.color = "black";
                $.ajax({
                    url: '{{ url("/unlikecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        document.getElementById("countlike"+id).innerHTML = data + ' ชื่นชอบ';
                        document.getElementById("likebutton"+id).style.display = '';
                        document.getElementById("unmyLike2"+id).style.display = 'none';
                    
                    
                    }
                });
                
                
            }

            function followContent(v,id) {
               
                // var x = document.getElementById("follows"+v);
      
                // x.innerHTML = "ติดตามแล้ว";
                // document.getElementById("follows"+v).style.color = "green";


                document.getElementById('unfollows'+v).style.display = '';
                document.getElementById('follow'+v).style.display = 'none';
               
                var elemList = document.getElementsByClassName("allidunfollows"+id);
                var elemLists = document.getElementsByClassName("allidfollows"+id);
                var elem = document.getElementsByClassName("allidfollow"+id);
                

                
                for (let i = 0; i < elemList.length; i++) {
                    // console.log('all');
                    elemList[i].style.display = '';
                }

                for (let i = 0; i < elemLists.length; i++) {
                    // console.log('all');
                    elemLists[i].style.display = 'none';
                }

                for (let i = 0; i < elem.length; i++) {
                    // console.log('all');
                    elem[i].style.display = 'none';
                }

                $.ajax({
                    url: '{{ url("/followwriter")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        Swal.fire({
                            text : "ติดตามผู้เขียนแล้ว",
                            confirmButtonColor: "#fc684b",
                        })
                        
                        console.log('11111');
                    
                    }
                });
        
               
            }

            function UNfollowContent(v,id){
                // var x = document.getElementById("follows"+v);
      
                // x.innerHTML = "ติดตาม";
                // document.getElementById("follows"+v).style.color = "rgba(255, 92, 99, 1)";

                var elemList = document.getElementsByClassName("allidunfollows"+id);
                var elemLists = document.getElementsByClassName("allidfollows"+id);
                var elem = document.getElementsByClassName("allidunfollow"+id);

                // console.log(elemList);
                for (let i = 0; i < elemList.length; i++) {
                    // console.log('all');
                    elemList[i].style.display = 'none';
                }

                for (let i = 0; i < elemLists.length; i++) {
                    // console.log('all');
                    elemLists[i].style.display = '';
                }

                for (let i = 0; i < elem.length; i++) {
                    // console.log('all');
                    elem[i].style.display = 'none';
                }
                $.ajax({
                    url: '{{ url("/unfollowwriter")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        Swal.fire({
                            text : "เลิกติดตามผู้เขียนแล้ว",
                            confirmButtonColor: "#fc684b",
                        })
                        console.log('2222');

                    
                    }
                });

            }


            function followContent2(v,id) {
                
                    // var x = document.getElementById("unfollows"+v);
            
                    // x.innerHTML = "ติดตามแล้ว";
                    // document.getElementById("unfollows"+v).style.color = "green";

                    document.getElementById('follows'+v).style.display = 'none';
                    document.getElementById('unfollows'+v).style.display = '';
                    
                    var elemList = document.getElementsByClassName("allidunfollows"+id);
                    var elemLists = document.getElementsByClassName("allidfollows"+id);
                    // console.log(elemList);
                    for (let i = 0; i < elemList.length; i++) {
                        // console.log('all');
                        elemList[i].style.display = '';
                    }

                    for (let i = 0; i < elemLists.length; i++) {
                        // console.log('all');
                        elemLists[i].style.display = 'none';
                    }


                    $.ajax({
                    url: '{{ url("/followwriter")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        Swal.fire({
                            text : "ติดตามผู้เขียนแล้ว",
                            confirmButtonColor: "#fc684b",
                        })
                        
                        console.log('33333');
                    
                    }
                    });
        
                
            }

            function UNfollowContent2(v,id){
                // var x = document.getElementById("follows"+v);
        
                // x.innerHTML = "ติดตาม";
                // document.getElementById("follows"+v).style.color = "rgba(255, 92, 99, 1)";

                document.getElementById('unfollows'+v).style.display = 'none';
                document.getElementById('follows'+v).style.display = '';

                var elemList = document.getElementsByClassName("allidunfollows"+id);
                var elemLists = document.getElementsByClassName("allidfollows"+id);
                // console.log(elemList);
                for (let i = 0; i < elemList.length; i++) {
                    // console.log('all');
                    elemList[i].style.display = 'none';
                }

                for (let i = 0; i < elemLists.length; i++) {
                    // console.log('all');
                    elemLists[i].style.display = '';
                }
                $.ajax({
                    url: '{{ url("/unfollowwriter")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        Swal.fire({
                            text : "เลิกติดตามผู้เขียนแล้ว",
                            confirmButtonColor: "#fc684b",
                        })
                        console.log('4444');

                    
                    }
                });

            }

        </script>

        {{-- hide delete --}}
        <script>
               function hidecontent(id){

                    $.ajax({
                        url: '{{ url("/hidecontent")}}',
                        type: 'GET',
                        dataType: 'HTML',
                        data: {'id':id},
                        success: function(data) {
                            Swal.fire({
                                text : "ซ่อนโพสต์เรียบร้อยแล้ว",
                                confirmButtonColor: "#fc684b",
                            })
                            window.location.reload();
                        }
                    });
               } 


                function deletecontent(id){
                    Swal.fire({
                        text: 'ยืนยันการลบโพสต์ใช่หรือไม่',
                        showCancelButton: true,
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก',
                        confirmButtonColor: "#fc684b",

                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ url("/deletecontent")}}',
                                type: 'GET',
                                dataType: 'HTML',
                                data: {'id':id},
                                success: function(data) {
                                    Swal.fire({
                                        text : "ลบโพสต์เรียบร้อยแล้ว",
                                        confirmButtonColor: "#fc684b",
                                    })
                                    window.location.reload();
                                
                                }
                            });
                        } else if (result.isDismissed) {
                            
                        }
                    })

                   
                }
        </script>

        <script>
            /* Change Navbar Background Color On Scroll */

            // Toggle the .pa-fixed-header class when the user 
            // scroll 100px 

            window.onscroll = () => {scrollNavbar()};

            scrollNavbar = () => {
                // Target elements
                const navBar = document.getElementById("navBar");
                const links = document.querySelectorAll("#navBar a");

            if (document.documentElement.scrollTop > 120) {
                navBar.classList.add("pa-fixed-header");
            } else {
                navBar.classList.remove("pa-fixed-header");
            }
            }
        </script>


    {{-- addimagegallery --}}
        <script>

            function addimagegallery(){

                gallery++;
                newimage =  '<div class="col-12" id="div'+gallery+'" style="padding: 10px;">'+
                            '<input type="file" style="display: none;" accept="image/*;capture=camera" name="sub_gallery['+(gallery).toString()+']" class="form-control chooseImage'+gallery+'" id="slidepicture'+gallery+'" onchange="readGalleryURL(this,'+gallery+')">'+
                            '<img id="gallerypreview'+gallery+'" style="max-height:150px ;padding: 10px;" src="{{asset('new_assets/img/brows.png')}}" onclick="browsImage('+gallery+')" />'+
                            '<button  id="btn'+gallery+'"  type="button" class="btn btn-danger" onclick="deletegallery('+gallery+')" style="position: absolute; top: 0px;"><i class="fa fa-trash"></i></button></div>';
                $('#rowsocial').append(newimage);
            }

            function browsImage(id){
                $('.chooseImage'+id).click();
            }


            function writevideo(v,id) {
 
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gallerypreview'+id).remove();
                    $('#btn'+id).remove();

                    var media = new Audio(reader.result);
                    media.onloadedmetadata = function(){
                        if(media.duration >15){
                            Swal.fire({
                                text : 'วีดีโอของคุณมีความยาวมากเกินไป สามารถโพสต์วีดีโอได้ไม่เกิน 15 วินาที',
                                confirmButtonColor: "#fc684b",
                            })

                            $('#div'+id).remove();
                        }else{
                            var videotag= '<video id="video" width="150" height="150" controls id="loadvideo'+id+'"><source src="'+e.target.result+'" type=video/ogg><source src="'+e.target.result+'" type=video/mp4></video><button  type="button" class="btn btn-danger" onclick="deletegallery('+id+')" style="position: absolute; top: 0px;"><i class="fa fa-trash"></i></button>';
                            
                            $('#div'+id).append(videotag);
                        }
                    }; 
                    


                }
                reader.readAsDataURL(v);
            }


            function readGalleryURL(input,id)
            {

               
                var filelist = input.files;
                for(var i=0; i<filelist.length; i++)
                {
                    gallery++;
                    // console.log(filelist[i].name);
                    var fileName = filelist[i].name;
                    var fileExtension = fileName.split('.').pop();
                    if(fileExtension == 'mp4'){
                        // var fileURL = URL.createObjectURL(filelist[i]);
                        // vid.src = fileURL;
                        // vid.ondurationchange = function() {
                        //     alert(this.duration);
                        // };
                        // console.log(filelist[i].duration);

                        writevideo(filelist[i],id);
                        // var imgs = '<input type="file" name=video['+gallery+'] value="'+filelist[i].name+'" >';
                        // $('#rowsocial').append(imgs);

                    }else{
                        writeimg(filelist[i],id);
                        // var imgs = '<input type="file" name=img['+gallery+'] value="'+filelist[i].name+'" >';
                        // $('#rowsocial').append(imgs);
                    }
                }
               
            }


            function writeimg(v,id) {
              
                var reader = new FileReader();
                reader.onload = function(e) {
                    // console.log(e.target.result.name);
                    // var imgtag = '<div class="col-6" id="div'+gallery+'"><img  src="'+e.target.result+'" width="150" height="150"><button  type="button" class="btn btn-danger" onclick="deletegallery('+gallery+')" style="position: absolute; top: 0px;"><i class="fa fa-trash"></i></button></div>';
                    $('#gallerypreview'+id).attr('src', e.target.result);
                        
                    // $('#rowsocial').append(imgtag);
                }
                reader.readAsDataURL(v);
            }


            function deletegallery(num){

                $('#div'+num).remove();
                //gallery--;
                // $('#delete').append('<input type="hidden" name="deletedkey[]" value="'+num+'">');

            }

            // myInputimage.addEventListener('change', sendPic, false);
        </script>
    @endsection