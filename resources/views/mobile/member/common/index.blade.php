@extends('mobile.main_layout.main')

@section('app_header')
<style>
  

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
    height: auto;
    padding: 60px 0;
    text-align: center;
    background-color: white ;
    margin-top: 30px;
    position: sticky;
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

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="appHeader bg-danger text-light">

    <div class="pageTitle">

    </div>
    <div class="right">

    </div>
    <div class="m-1 w-100">
        {{-- search --}}
        <div class="row">
            <div class="col-2">
                <ion-icon id="btn_search_2" style="cursor: pointer;"  onclick="myFunction()" name="list" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline">
                </ion-icon>
            </div>
            
            <div class="col-6">
                <form action="{{url('user/search')}}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group searchbox mt-1 mb-0">
                        <input type="text" name="text" class="form-control" id="input_search_1" placeholder="Search...">
                        <i class="input-icon">
                            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                        </i>
                    </div>
                    
                </form>
            </div>
            <?php $countcart = DB::Table('tb_carts')->select(DB::raw('SUM(count) as countt'))->where('customer_id',Session::get('cid'))->first(); ?>
           
            <div class="col-2 mt-1">
                <a href="{{url('cartindex')}}" > 
                    <div class="  md hydrated  bg-white text-danger rounded  h5 text-center" style="  padding: 6px 5px 4px 5px ; ">
                        <ion-icon name="cart" class=" font-weight-bold" role="img"  aria-label="search outline" ></ion-icon>
                        <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$countcart->countt != null ?$countcart->countt:'0'}}</span> 
                    </div>
                </a>
            </div>

            <div class="col-2">
                <a href="{{url('user/notification')}}">
                    <ion-icon name="notifications" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline" >
                    </ion-icon>
                </a>
            </div>
            
        </div>

    </div>

     <!-- Show List Menu btn_search_2 [Start]-->
     <div id="search_2" >
        <div class="mt-2">
            <div style="left: 16px;  position: absolute; " class="mt-2">
                 <ion-icon name="close" onclick="myFunction()"  aria-label="search outline" ></ion-icon>
            </div>
            <br><br>     
                @foreach($cat as $cs)
                    <a href="{{url('user/searcha/2/'. $cs->cat_name.'')}}" style="color:#fff;" class="mr-3  ml-3">{{$cs->cat_name}}</a> 
                @endforeach  
        </div>
    </div>
    <!-- Show List Menu btn_search_2 [End]--> 
</div>
{{-- Recent Search --}}
<div id="search_box_2">
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
@endsection

@section('content')


    <div>
        <img class="justify-content-center w-100" src="{{('https://testgit.sapapps.work/moldii/storage/app/banner/'.$ban->banner_name.'')}}" alt="alt">

    </div>

    <br>
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

    <div class="row">
        <div class="col-6 pr-0">
            <div class="m-1">
                <a href="{{url('user/wallet')}}" style="color: black">
                    <div class="card">
                        <div class="row w-100 mx-3 my-2 text-center">
                            <img src="{{ asset('new_assets/img/icon/pig.svg')}}" width="15%">
                            <span class="ml-2 align-self-center font-weight-bold"> ฿ {{number_format($u->customer_wallet,2,'.',',')}}</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-6 pl-0">
            <div class="m-1">
                <div class="card">
                    <div class="row w-100 mx-3 my-2 text-center">
                        <img src="{{ asset('new_assets/img/icon/$.svg')}}" width="15%">
                        <span class="ml-2 align-self-center font-weight-bold">{{$u->customer_point}} คอยน์</span>
                    </div>
                </div>
            </div>
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
                        <textarea name="post" id="post-content" class="widget-post__textarea scroller" placeholder="What's happening?" required></textarea>
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
                            <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

                            <div class="card-title col-8  align-self-center m-0 ">
                                <div class="card-title m-0 row align-self-center">
                                    @if($sqls->new_type == 'C' || $sqls->new_type == 'V')
                                        <h4 class=" m-0 p-0">{{$sqls->created_by}}</h4>
                                    @else
                                        <h4 class=" m-0 p-0">{{$sqls->customer_username}}</h4>
                                        @if($sqls->customer_id !== Session::get('cid'))
                                            <a href="#" class="ml-1 align-self-center" > 
                                                @if($f == null)
                                                    <h6 class="m-0 p-0 " onclick="followContent({{$sqls->new_id}},{{$sqls->customer_id}})" style="color: rgba(255, 92, 99, 1);" id="follow{{$sqls->new_id}}">ติดตาม</h6>
                                                @else
                                                    <h6 class="m-0 p-0 " onclick="UNfollowContent({{$sqls->new_id}},{{$sqls->customer_id}})" style="color: green;" id="unfollow{{$sqls->new_id}}">ติดตามแล้ว</h6>
                                                @endif
                                                
                                            </a>
                                        @endif
                                        
                                    @endif
                                </div>
                                <h6 class=" m-0 p-0">{{$sqls->created_at}}</h6>
                            </div>

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


                                <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px"  data-toggle="dropdown" aria-expanded="false"></ion-icon>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if($sqls->customer_id == Session::get('cid'))
                                        <a class="dropdown-item" href="#">แก้ไขโพสต์</a>
                                        <a class="dropdown-item" href="#" onclick="hidecontent({{$sqls->new_id}})">ซ่อนโพสต์</a>
                                        <a class="dropdown-item" href="#" onclick="deletecontent({{$sqls->new_id}})">ลบโพสต์</a>
                                        <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                                    @endif
                                    <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">report</a>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card-body p-2">
                            <a href="{{url('content/'.$sqls->new_id.'')}}" class="card-text">{{$sqls->new_title}}</a>
                        </div>
                            
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                                
                                @if($sqls->new_type == 'C')
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$sqls->new_img.'')}}" class="d-block w-100" style="width: 375px; height: 197px;">
                                        </div>
                                        @if($imggal->count() >1)
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                            </ol>
                                            @foreach($imggal as $imgs)
                                                <div class="carousel-item">
                                                    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$imgs->name.'')}}" class="d-block w-100" style="width: 375px; height: 197px;">
                                                </div>
                                            @endforeach
                                        @endif
                                            
                                    </div>
                                @else
                                    <div class="carousel-inner">

                                        @if($imggal->count() != 0)
                                            @if($imggal[0]->type =='I')
                                                <div class="carousel-item active">
                                                    <img src="{{asset('storage/content_img/'.$imggal[0]->name.'')}}" class="d-block w-100" style="width: 375px; height: 197px;">
                                                </div>
                                            @else
                                                <div class="carousel-item active">
                                                    <video width="auto" height="197" controls >
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
                                                @foreach($imggal as $imgs)
                                                    @if($imgs->type =='I')
                                                        
                                                        <div class="carousel-item">
                                                            <img src="{{asset('storage/content_img/'.$imgs->name.'')}}" class="d-block w-100" style="width: 375px; height: 197px;">
                                                        </div>
                                                    @else
                                                       
                                                        <div class="carousel-item">
                                                            <video width="auto" height="197" controls >
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
                     

                        <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sqls->like?''.$sqls->like.'':'0'}} ชื่นชอบ</h6>
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$count->count() + $countreply->count()}} รายการ</h6>
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sh->count()}} แชร์</h6>

                        </div>

                        <div class="card-footer row justify-content-center align-items-center" style="padding-left: 3px; padding-right: 3px;">

                            <div class="col-3 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                                {{-- <i onclick="myLike(this)" class="fa fa-thumbs-up"  style="width:17px; height:17px;"></i> --}}
                                @if($la == null)
                                    <h5 class="mb-0 ml-1 " id="myLike{{$sqls->new_id}}" onclick="myLike({{$sqls->new_id}})">ถูกใจ</h5>
                                @else
                                    <h5 class="mb-0 ml-1 " id="unmyLike{{$sqls->new_id}}" style="color: green" onclick="UNmyLike({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                                @endif
                            </div>
                            <div class="col-5 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
                                <a href="{{url('content/'.$sqls->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
                            </div>
                            <div class="col-2 row p-0 align-items-center" data-toggle="modal" data-target="#share" >
                                <img src="{{ asset('new_assets/img/icon/share.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1" >แชร์</h5>
                            </div>
                            {{-- <div class="col-2 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/diamond.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1">โดเนท</h5>
                            </div> --}}

                        </div>
                    </div>
                @endforeach
            </div>


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

                        <div class="modal-body">
                            
                        
                            <?php $urlen = urlencode("https://modii.sapapps.work/content/1")?>
                        
                                <br>
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
                                        <button type="button" data-dismiss="modal" class="btn  btn-block font-weight-bold" style="background-color:rgba(255, 92, 99, 1); color:#FFF; font-size:15px; border-radius: 8px;">ยกเลิก</button>
                                    </div>               
                                </div>
                            <br>

                        </div>
                   
                    </div>
                </div>
            </div>
            <!-- /end Modal share -->


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
                alert(a);
            }

            bottom_now(1);
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


            function myFunction() {
                var x = document.getElementById("search_2");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
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
               
                var x = document.getElementById("myLike"+id);
                
                x.innerHTML = "ถูกใจแล้ว";
                document.getElementById("myLike"+id).style.color = "green";
                $.ajax({
                    url: '{{ url("/likecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
                   
            }


            function UNmyLike(id) {
               
                var x = document.getElementById("unmyLike"+id);
               
              
                x.innerHTML = "ถูกใจ";
                document.getElementById("unmyLike"+id).style.color = "black";
                $.ajax({
                    url: '{{ url("/unlikecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    
                    }
                });
                   
                
            }

            function followContent(v,id) {
               
                var x = document.getElementById("follow"+v);
      
                x.innerHTML = "ติดตามแล้ว";
                document.getElementById("follow"+v).style.color = "green";

                $.ajax({
                    url: '{{ url("/followwriter")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                       
                            alert('ติดตามผู้เขียนแล้ว');

                    
                    }
                });
        
               
            }

            function UNfollowContent(v,id){
                var x = document.getElementById("unfollow"+v);
      
                x.innerHTML = "ติดตาม";
                document.getElementById("unfollow"+v).style.color = "rgba(255, 92, 99, 1)";

                $.ajax({
                    url: '{{ url("/unfollowwriter")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        
                            alert('เลิกติดตามผู้เขียนแล้ว');

                    
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
                            alert('ซ่อนโพสต์เรียบร้อยแล้ว');
                            window.location.reload();
                        }
                    });
               } 


               function deletecontent(id){
                    if (confirm("ยืนยันการลบโพสต์ใช่หรือไม่") == true) {
                        $.ajax({
                            url: '{{ url("/deletecontent")}}',
                            type: 'GET',
                            dataType: 'HTML',
                            data: {'id':id},
                            success: function(data) {
                                alert('ลบโพสต์เรียบร้อยแล้ว');
                                window.location.reload();
                            
                            }
                        });
                    } else {
                        
                    }

                   
               }
        </script>

       

    {{-- img slide --}}

    {{-- addimagegallery --}}
        <script>

            function addimagegallery(){

                gallery++;
                newimage =  '<div class="col-12" id="div'+gallery+'" style="padding: 10px;">'+
                            '<input type="file" style="display: none;" accept="image/*;capture=camera" name="sub_gallery['+(gallery).toString()+']" class="form-control chooseImage'+gallery+'" id="slidepicture'+gallery+'" multiple="multiple" onchange="readGalleryURL(this,'+gallery+')">'+
                            '<img id="gallerypreview'+gallery+'" style="max-height:150px ;padding: 10px;" src="{{asset('new_assets/img/brows.png')}}" onclick="browsImage('+gallery+')" />'+
                            '<button  id="btn'+gallery+'"  type="button" class="btn btn-danger" onclick="deletegallery('+gallery+')" style="position: absolute; top: 0px;"><i class="fa fa-trash"></i></button></div>';
                $('#rowsocial').append(newimage);
            }

            function browsImage(id){
                $('.chooseImage'+id).click();
            }


            function writevideo(v,id) {
                gallery++;
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gallerypreview'+id).remove();
                    $('#btn'+id).remove();

                    var videotag= '<video id="video" width="150" height="150" controls ><source src="'+e.target.result+'" type=video/ogg><source src="'+e.target.result+'" type=video/mp4></video><button  type="button" class="btn btn-danger" onclick="deletegallery('+gallery+')" style="position: absolute; top: 0px;"><i class="fa fa-trash"></i></button>';
                        
                    $('#div'+id).append(videotag);
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
                gallery++;
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