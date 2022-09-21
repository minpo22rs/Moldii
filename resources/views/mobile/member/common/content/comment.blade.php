@extends('mobile.main_layout.main')
<style>
    .emojireply {
        width: 39px;
        /* height: 50px; */
        border-radius: 13px;
        background: #FFFFFF;
        border: none;
        color: rgba(208, 208, 208, 1);
        box-shadow: 2px 2px 8px 0px rgb(0 0 0 / 17%);
    }
</style>
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.history.back();">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">

    </div>
    <div class="right"></div>
    
</div>
@endsection

@section('content')
<div class="container p-0">
    <div class="card-body row col-12 justify-content-center m-0">
        @if($c->new_type == 'C' || $c->new_type == 'V')
            <img src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
        @else
            @if($c->provider == null)
                <img src="{{asset('storage/profile_cover/'.$c->customer_img.'')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
            @elseif($c->customer_img != null)
                <img src="{{$c->customer_img}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
            @else
                <img src="{{asset('original_assets/img/material_icons/woman.png')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
        
        
            @endif
        @endif

        <div class="card-title col-8  align-self-center m-0 ">
            <div class="card-title m-0 row align-self-center">
                @if($c->new_type == 'C' || $c->new_type == 'V')
                    <h4 class=" m-0 p-0">{{$c->created_by}}</h4>
                @else
                    <h4 class=" m-0 p-0">{{$c->customer_username}}</h4>
                    @if($c->customer_id !== Session::get('cid'))
                        <a href="#" class="ml-1 align-self-center" > 
                            @if($f == null)
                                <h6 class="m-0 p-0 " onclick="followContent({{$c->new_id}},{{$c->customer_id}})" style="color: rgba(255, 92, 99, 1);" id="follow{{$c->new_id}}">ติดตาม</h6>
                            @else
                                <h6 class="m-0 p-0 " onclick="UNfollowContent({{$c->new_id}},{{$c->customer_id}})" style="color: green;" id="unfollow{{$c->new_id}}">ติดตามแล้ว</h6>
                            @endif
                            
                        </a>
                    @endif
                    
                @endif
            </div>
            <h6 class=" m-0 p-0">{{$c->created_at}}</h6>
        </div>

        <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
            @if($bm !== null)

                <div id="bmm{{$c->new_id}}" style="margin-right: 10px">
                    <ion-icon name="bookmark" style="font-size:25px" onclick="unbookmark({{$c->new_id}})" ></ion-icon>
                </div>
            

            @else
                <div id="bmoll{{$c->new_id}}" style="margin-right: 10px">
                    <ion-icon name="bookmark-outline" style="font-size:25px" onclick="bookmarkadd({{$c->new_id}})"></ion-icon>
                </div>
            
            @endif

            <div style="display: none" id="bmol{{$c->new_id}}" style="margin-right: 10px">
                <ion-icon name="bookmark-outline" style="font-size:25px" onclick="bookmarkadd2({{$c->new_id}})"></ion-icon>

            </div>

            <div style="display: none" id="bm{{$c->new_id}}" style="margin-right: 10px">
                <ion-icon name="bookmark" style="font-size:25px" onclick="unbookmark2({{$c->new_id}})" ></ion-icon>
            </div>




            <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px"  data-toggle="dropdown" aria-expanded="false"></ion-icon>
            <div class="dropdown-menu dropdown-menu-right">
                @if($c->customer_id == Session::get('cid'))
                    {{-- <a class="dropdown-item" href="#">แก้ไขโพสต์</a> --}}
                    <a class="dropdown-item" href="javascript:;" onclick="hidecontent({{$c->new_id}})">ซ่อนโพสต์</a>
                    <a class="dropdown-item" href="javascript:;" onclick="deletecontent({{$c->new_id}})">ลบโพสต์</a>
                    <div class="dropdown-divider"></div> <!-- เส้นคั้น -->
                @endif
                <a class="dropdown-item" href="{{url('contentreport/'.$c->new_id.'')}}">report</a>
            </div>


        </div>
    </div>
    <div class="card-body p-2">
        @if($c->new_type=='C' || $c->new_type == 'V')
            <p class="card-text">{{$c->new_content}}</p>
        @elseif($c->new_type=='U')
            <p class="card-text">{{$c->new_title}}</p>
        @endif
    </div>
    
        @if($c->new_type=='C')
                @if($imggal->count() > 1)
                    @foreach($imggal as $imgs)
                        <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$imgs->name.'')}}" alt="alt" class="w-100" style="width: 375px; height: auto;">
                    @endforeach
                @else
                    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$c->new_img.'')}}" alt="alt" class="w-100" style="width: 375px; height: auto;">
                @endif
            
        @elseif($c->new_type=='V')

                {{-- @foreach($imggal as $imgs) --}}
                    <iframe width="400px" height="215" src="https://www.youtube.com/embed/{{$c->new_img}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                {{-- @endforeach --}}
        @else
            @if($imggal->count() != 0)
                @foreach($imggal as $imgs)
                    @if($imgs->type =='I')
                        <img src="{{asset('storage/content_img/'.$imgs->name.'')}}" alt="alt" class="w-100" style="width: 375px; height: auto;">
                    @else
                        <video width="100%" height="215" controls >
                            <source src="{{asset('storage/content_img/'.$imgs->name.'')}}" type=video/ogg>
                            <source src="{{asset('storage/content_img/'.$imgs->name.'')}}" type=video/mp4>
                        </video>
                    @endif
                @endforeach
                
            @endif
        @endif
   
    
    <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
        <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$c->like?$c->like:'0'}} ชื่นชอบ</h6>
        <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$comment->count()+$countreply->count()}} รายการ</h6>
        <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sh->count()}} แชร์</h6>
        <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$c->viewer}} รับชม</h6>
    </div>

    <div class="card-footer row justify-content-center ">
        <div class="col-3 row p-0  justify-content-center">
            <img src="{{ asset('new_assets/icon/ถูกใจ.png')}}" alt="alt" style="width:17px; height:17px;">
            @if($la == null)
                <h5 class="mb-0 ml-1 " id="myLike{{$c->new_id}}" onclick="myLike({{$c->new_id}})">ถูกใจ</h5>
            @else
                <h5 class="mb-0 ml-1 " id="unmyLike{{$c->new_id}}" style="color: green" onclick="UNmyLike({{$c->new_id}})">ถูกใจแล้ว</h5>
            @endif
        </div>
        <div class="col-5 row p-0 justify-content-center ">
            <img src="{{ asset('new_assets/icon/แสดงความคิดเห็น.png')}}" alt="alt" style="width:17px; height:17px;">
            <h5 class="mb-0 ml-1 text-primary">แสดงความคิดเห็น </h5>
            <!--เมื่อคลิก จะส่ง id และ ทำการดึงมาเสดงในหน้า Comment -->
        </div>
        <div class="col-2 row p-0 justify-content-center ">
            <img src="{{ asset('new_assets/icon/แชร์.png')}}" alt="alt" style="width:17px; height:17px;">
            <h5 class="mb-0 " id="icon-share">แชร์</h5>
        </div>
        @if($c->customer_id != 0)
            <div class="col-2 row p-0 align-items-center ml-1" data-toggle="modal" data-target="#donate">
                <img src="{{asset('new_assets/icon/โดเนท.png')}}" alt="alt" style="width:17px; height:17px;">
                <h5 class="mb-0 ml-1">โดเนท</h5>
            </div>
        @endif
    </div>

    {{-- comment --}}
    <div class="card-footer p-1 ">
        @if($comment->count() != 0)
            @foreach ($comment as $comments)
                <?php $detail = DB::Table('tb_customers')->where('customer_id',$comments->comment_author)->first()?>

                <div class=" row justify-content-end pl-1 my-2">
                    <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
                    <div class=" mx-2  col-10 p-1 pl-2" style=" min-height: 85px; background-color: rgba(000, 000, 000, 0.2); border-radius: 10px;">
                        <h4 class="m-0 mb-1">{{$detail->customer_username}}</h4>
                        {{-- <h5 class="m-0">ความคิดเห็น</h5> --}}
                        <h4 class="m-0">{{$comments->comment_text}}</h4>
                        <div class="row  align-self-center  m-0 p-0">
                            <h6 class="m-0 "><small>{{$comments->created_at}}</small></h6>
                            
                            <h6 class="  ml-1 m-0 font-weight-bold" style="color: rgba(255, 92, 99, 1);" onclick="buttonreply({{$comments->comment_id}})">ตอบกลับ</h6>
                        </div>
                   
                            <form class="needs-validation row justify-content-center mt-1" id="reply{{$comments->comment_id}}"  action="{{url('sendcommentreply')}}" method="POST" novalidate style="display: none">
                                @csrf
                                <textarea class="comment-form  form-control col-9 mr-2" placeholder="Reply" name="reply" rows="1" style="height: 50px"></textarea>
                                <input type="hidden" name="cid" value="{{$comments->comment_id}}">
                                <input type="hidden" name="newsid" value="{{$c->new_id}}">

                                <div class="emojireply ml-1 p-1 mt-1">
                                <img src="{{ asset('new_assets/img/icon/chaticon.png')}}" alt="alt" style="width:24px; height:24px;margin-top:1px" onclick="sendcommentreply({{$comments->comment_id}});">
                    
                                </div>
                    
                            </form>
                       
                    </div>
                    @if($comments->comment_reply != null)
                        <?php $reply = DB::Table('tb_comment_replys')->where('id_tb_comment',$comments->comment_id)
                            ->select('tb_comment_replys.*','tb_customers.customer_username')
                            ->leftJoin('tb_customers', 'tb_comment_replys.customer_id', '=', 'tb_customers.customer_id')->get()?>
                        @foreach ($reply as $replys)
                            <div class=" mx-2 my-2 p-0 pr-0 col-10 row justify-content-end" >

                                <div class=" pl-0 col-12 row justify-content-end">
                                    <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 25px; height:25px;">

                                    <div class=" mx-3 mr-0 col-10 p-1 pl-2" style=" min-height: 45px; background-color: rgba(000, 000, 000, 0.2); border-radius: 10px;">
                                        <h5 class="m-0 mb-1">{{$replys->customer_username}}</h5>
                                        <div class="align-self-center  m-0 p-0 ">
                                        
                                            <h5 class="m-0">{{$replys->comment_reply_text}}</h5>
                                        </div>
                                        <div class="row  align-self-center  m-0 p-0 ">
                                            <h6 class="m-0 "><small>{{$replys->updated_at}}</small></h6>
                                            {{-- <a href="">
                                                <h6 class="  ml-1 m-0 font-weight-bold" style="color: rgba(255, 92, 99, 1);">ตอบกลับ</h6>
                                            </a> --}}
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach

        @endif

        <br>
        <form class="needs-validation row justify-content-center" id="sendcomment"  action="{{url('sendcomment')}}" method="POST" novalidate >
            @csrf
            <textarea class="comment-form form-control col-9 mr-2" placeholder="Comment" id="comment" name="comment" rows="1"></textarea>
            <input type="hidden" name="cid" value="{{$c->new_id}}">
            <div class="emoji ml-1 p-1 ">
               <img src="{{ asset('new_assets/img/icon/chaticon.png')}}" alt="alt" style="width:35px; height:35px;" onclick="sendcomment();">

            </div>

        </form>

    </div>

</div>

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
        <?php $urlen = urlencode("https://modii.sapapps.work/content/$c->new_id")?>
        <div class="share-box p-2" id="share_box">
            <div class="text-center">
                <h4 class="font-weight-bold">แบ่งปันข้อมูล</h4>
                <input type="hidden" id="clink" value="{{$urlen}}">
            </div>
            <div class="row justify-content-around p-1 ">
                <a href="https://social-plugins.line.me/lineit/share?url={{$urlen}}" class="m-0 text-center align-self-end  share-item">
                    <img src="{{ asset('new_assets/img/icon/share/LINE.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                    <h5 class="font-weight-bold m-0 mt-1">Line</h5>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{$urlen}}" class="m-0 text-center  align-self-end share-item">
                    <img src="{{ asset('new_assets/img/icon/share/facebook.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                    <h5 class="font-weight-bold m-0 mt-1">Facebook</h5>

                </a>
                <a href="javascript:;" class="m-0 text-center align-self-end  share-item" onclick="clink();">
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
    <script>
       
        bottom_now(1);

        var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
        }

        function buttonreply(v){
            document.getElementById('reply'+v).style.display = '';

        }

        function sendcommentreply(v){
            // console.log(v);
            $('#reply'+v).submit();
        }

        function sendcomment(){
            var c = document.getElementById("comment").value;
            if( c == ''){
                alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                $('#comment').focus();
            }else{
                $('#sendcomment').submit();

            }
        }


        function donate(x,t){
            var donate = "{{$c->customer_id}}";

            var c= "{{$u->customer_coin}}";
            if(x > c){
                if(confirm('จำนวนเหรียญไม่พอ!! \nต้องการเติมเหรียญหรือไม่? ')){
                    window.location.replace('/user/convert');
                }else{

                    
                }
                
            }else{
                $.ajax({
                    url: '{{ url("/submitdonate")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'recive':donate,'name':t,'coin':x},
                    success: function(data) {
                        alert('โดเนทเรียบร้อยแล้ว');
                        window.location.reload();
                    }
                });

            }
        }
   
        

        function clink() {
            /* Get the text field */
            var copyText = document.getElementById("clink");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);
            
            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
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
@endsection