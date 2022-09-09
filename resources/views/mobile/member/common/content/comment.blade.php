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
        <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

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
                        <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$imgs->name.'')}}" alt="alt" class="w-100" style="width: 375px; height: 197px;">
                    @endforeach
                @else
                    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$c->new_img.'')}}" alt="alt" class="w-100" style="width: 375px; height: 197px;">
                @endif
            
        @elseif($c->new_type=='V')

                {{-- @foreach($imggal as $imgs) --}}
                    <iframe width="400px" height="215" src="https://www.youtube.com/embed/{{$c->new_img}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                {{-- @endforeach --}}
        @else
            @if($imggal->count() != 0)
                @foreach($imggal as $imgs)
                    @if($imgs->type =='I')
                        <img src="{{asset('storage/content_img/'.$imgs->name.'')}}" alt="alt" class="w-100" style="width: 375px; height: 197px;">
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
            <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
            @if($la == null)
                <h5 class="mb-0 ml-1 " id="myLike{{$c->new_id}}" onclick="myLike({{$c->new_id}})">ถูกใจ</h5>
            @else
                <h5 class="mb-0 ml-1 " id="unmyLike{{$c->new_id}}" style="color: green" onclick="UNmyLike({{$c->new_id}})">ถูกใจแล้ว</h5>
            @endif
        </div>
        <div class="col-5 row p-0 justify-content-center ml-1 ">
            <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
            <h5 class="mb-0 ml-1 text-primary">แสดงความคิดเห็น </h5>
            <!--เมื่อคลิก จะส่ง id และ ทำการดึงมาเสดงในหน้า Comment -->
        </div>
        <div class="col-2 row p-0 justify-content-center ml-1 ">
            <img src="{{ asset('new_assets/img/icon/share.png')}}" alt="alt" style="width:17px; height:17px;">
            <h5 class="mb-0 " id="icon-share">แชร์</h5>
        </div>
        {{-- <div class="col-3 row p-0 justify-content-center  ">
            <img src="{{ asset('new_assets/img/icon/diamond.png')}}" alt="alt" style="width:17px; height:17px;">
            <h5 class="mb-0 ml-1">โดเนท</h5>
        </div> --}}
    </div>


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
                                <img src="{{ asset('new_assets/img/icon/send-message-icon.jpg')}}" alt="alt" style="width:24px; height:24px;margin-top:1px" onclick="sendcommentreply({{$comments->comment_id}});">
                    
                                </div>
                    
                            </form>
                       
                    </div>
                    @if($comments->comment_reply != null)
                        <?php $reply = DB::Table('tb_comment_replys')->where('id_tb_comment',$comments->comment_id)
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
               <img src="{{ asset('new_assets/img/icon/send-message-icon.jpg')}}" alt="alt" style="width:35px; height:35px;" onclick="sendcomment();">

            </div>

        </form>

    </div>

</div>
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