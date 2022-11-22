<!-- Bootstrap 4.6 CSS --> 
@extends('mobile.main_layout.main')
@section('app_header')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="appHeader bg-danger text-light">

    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('/group')}}');">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        {{$group->name}}
    </div>
    <div class="right"></div>



</div>

@endsection
@section('content')
<br>
    <!-- ###### content [ Start ]  ###### -->
    <div>
        @if($group->created_by == 0)
        {{-- <img class="justify-content-center w-100" src="{{('https://testgit.sapapps.work/moldii/storage/app/banner/'.$ban->banner_name.'')}}" alt="alt"> --}}
            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$group->group_cover.'')}}" alt="alt" width="100%" >
        @else
            <img src="{{asset('storage/group/'.$group->group_img.'')}}" alt="alt"  width="100%">
        @endif
    </div>


    <div class="col-md-12">
        <div class="row">

        {{-- <div class="col-md-12" style="background-color: #D5D8DC ; display: grid; grid-template-columns: auto;  grid-template-rows: 250px 100px; "> 
            image : cover
            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$group->group_cover.'')}}" alt="alt" width="100%" >

        </div> --}}
        
        <div class="col-md-12 pb-2">
            <div class="pt-4" style="font-weight: bold; color: #1C2833 ; font-size: 200% ; " > {{$group->name}} </div> 
            <div class="pt-1 pb-2"><i class="fa fa-solid fa-globe"></i> Public Group <b>{{$cg->count()}}</b> members</div>
            @foreach($cg as $cgs)

                <img class=" rounded-circle  " src="{{asset('storage/profile_cover/'.$cgs->customer_img.'')}}" alt="alt" style="width: 50px; height:50px;" >

            @endforeach
        
            <div class="pt-3 pb-2">
                @if($chk != null && $chk->status_group == 2)

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            เข้าร่วมแล้ว
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{url('requestjoingroup/3/'.$group->id.'')}}">ออกจากกลุ่ม</a>
                            {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                @elseif($chk != null && $chk->status_group == 1)
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ส่งคำขอแล้ว
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{url('requestjoingroup/3/'.$group->id.'')}}">ยกเลิกคำขอ</a>
                            {{-- <a class="dropdown-item" href="#">Another action</a> --}}
                            {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                        </div>
                    </div>
                @else
                    <a href="{{url('requestjoingroup/1/'.$group->id.'')}}" class="btn btn-primary" role="button" >
                        <b>ขอเข้าร่วมกลุ่ม</b>
                    </a>
                @endif
                
                
            </div>


            <hr> <!-- ------------------ -->
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
    
        </div>  <!-- col-md-12 line 13 -->


        </div> <!-- row line 7 -->
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


<!-- ###### content [ End ] ###### -->
@section('custom_script')
    <script>

      bottom_now(4);

        function donatebtn(v){
            document.getElementById("donateid").value = v ;
            $('#donate').modal('show');
            
        }

        function donate(x,t){
 
            var donate = document.getElementById("donateid").value;

            var c= "{{$u->customer_coin}}";
            var id= "{{$id}}";
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
                    data: {'recive':donate,'name':t,'coin':x,'id':id},
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


    </script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> --}}
@endsection
