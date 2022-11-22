@extends('mobile.main_layout.main')

@section('app_header')
<style>
    
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
        height: auto;
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
                        <input type="text" name="text" class="form-control" id="input_search_1" placeholder="Search..." style="padding: 20px ">
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
                        <img  src="{{ asset('new_assets/icon/ตะกร้า.png')}}" >
                        <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$countcart->countt != null ?$countcart->countt:'0'}}</span> 
                    </div>
                </a>
            </div>

            <div class="col-2 mt-1">
                <a href="{{url('user/notification')}}" > 
                    <div class="  md hydrated  bg-white text-danger rounded p-1 mb-1 h5 text-center">
                        <!-- <ion-icon name="cart" class=" font-weight-bold" role="img"  aria-label="search outline" ></ion-icon> -->
                        <img  src="{{ asset('new_assets/icon/แจ้งเตือน.png')}}" >
                        <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$noti->count()+$notiid->count()+$ccomment->count()}}</span> 
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
                            <h4 class="mt-1" style="color:#fff;">{{$cats->cat_name}}</h4>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Show List Menu btn_search_2 [End]-->
</div>
{{-- Recent Search --}}
<div id="search_box_2">
    <h3> Recent Search</h3>

        <p> @if(Session::get('recent') != null)
                @foreach (Session::get('recent') as $text)
                    <a href="{{url('user/searcha/'. $text.'')}}">
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


    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-6 text-left">
            <h3 class="ml-3">กลุ่ม</h3>
           
        </div>
        <div class="col-6 text-right " >
            <a href="{{url('/groupall')}}" class="mr-2" style="color: red">ดูทั้งหมด</a>
        </div>

    </div>
   
    @include("mobile.member.group.groupstory")



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
                            <h4 class=" m-0 p-0">{{$user->customer_username}}</h4>

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
                            {{-- <a class="dropdown-item" href="#">แก้ไขโพสต์</a> --}}
                            <a class="dropdown-item" href="javascript:;" onclick="hidecontent({{$sqls->new_id}})">ซ่อนโพสต์</a>
                            <a class="dropdown-item" href="javascript:;" onclick="deletecontent({{$sqls->new_id}})">ลบโพสต์</a>
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
                            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$sqls->new_img.'')}}" class="d-block w-100" style="width: 375px; height: auto;">
                        </div>
                        @if($imggal->count() >1)
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            @foreach($imggal as $imgs)
                                <div class="carousel-item">
                                    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$imgs->name.'')}}" class="d-block w-100" style="width: 375px; height: auto;">
                                </div>
                            @endforeach
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
                                    <video width="100%" height="197" controls >
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
                                            <img src="{{asset('storage/content_img/'.$imgs->name.'')}}" class="d-block w-100" style="width: 375px; height: auto;">
                                        </div>
                                    @else
                                    
                                        <div class="carousel-item" >
                                            <video width="100%" height="197" controls >
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
                <h6 class="mb-0 ml-1 card-subtitle text-muted" id="countlike{{$sqls->new_id}}">{{$sqls->like?''.$sqls->like.'':'0'}} ชื่นชอบ</h6>
                <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$count->count() + $countreply->count()}} รายการ</h6>
                <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sh->count()}} แชร์</h6>

            </div>

            <div class="card-footer row justify-content-center align-items-center" style="padding-left: 3px; padding-right: 3px;">

                <div class="col-3 row p-0  justify-content-center mr-2" id="likebutton{{$sqls->new_id}}" style="display: ">
                    <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                    @if($la == null)
                        <h5 class="mb-0" id="myLike{{$sqls->new_id}}" style="color: black" onclick="myLike({{$sqls->new_id}})">ถูกใจ</h5>
                    @else
                        <h5 class="mb-0" id="unmyLike{{$sqls->new_id}}" style="color: green" onclick="UNmyLike({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                    @endif
                </div>


                <div style="display: none" class="col-3 row p-0 mr-2 justify-content-center" id="myLike2{{$sqls->new_id}}" >
                    <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                    <h5 class="mb-0" style="color: black" onclick="myLike2({{$sqls->new_id}})">ถูกใจ</h5>
                </div>

                <div style="display: none" class="col-3 row p-0 mr-2 justify-content-center" id="unmyLike2{{$sqls->new_id}}">
                    <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                    <h5 class="mb-0"  style="color: green" onclick="UNmyLike2({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                </div>

                <div class="col-5 row p-0 align-items-center ml-2">
                    <img src="{{ asset('new_assets/icon/แสดงความคิดเห็น.png')}}" alt="alt" style="width:17px; height:17px;">
                    <a href="{{url('content/'.$sqls->new_id.'')}}"><h5 class="mb-0 ml-1">แสดงความคิดเห็น</h5></a>
                </div>
                <div class="col-2 row p-0 align-items-center" data-toggle="modal" data-target="#share" >
                    <img src="{{ asset('new_assets/icon/แชร์.png')}}" alt="alt" style="width:17px; height:17px;">
                    <h5 class="mb-0 " >แชร์</h5>
                </div>
                @if($sqls->customer_id != 0)
                    <div class="col-2 row p-0 align-items-center " onclick="donatebtn({{$sqls->customer_id}});">
                        <img src="{{asset('new_assets/icon/โดเนท.png')}}" alt="alt" style="width:17px; height:17px;">
                        <h5 class="mb-0 ml-1">โดเนท</h5>
                    </div>
                @endif

            </div>
        </div>
    @endforeach
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

    @endsection


    @section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if (a) {
            Swal.fire({
            text : a,
            confirmButtonColor: "#fc684b",
        })
        }

        bottom_now(4);

        
    </script>
    <script src="script.js">

    </script>
   
    {{-- searchBox --}}
    <script>
           
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
            document.getElementById("myLike2"+id).style.color = "green";
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
        
            var x = document.getElementById("follow"+v);

            x.innerHTML = "ติดตามแล้ว";
            document.getElementById("follow"+v).style.color = "green";

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
                    
                        Swal.fire({
                                    text : "เลิกติดตามผู้เขียนแล้ว",
                                    confirmButtonColor: "#fc684b",
                                })

                
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
    @endsection