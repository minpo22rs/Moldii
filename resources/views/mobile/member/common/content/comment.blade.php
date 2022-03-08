@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('user/index')}}');">
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
                <h4 class=" m-0 p-0">{{$c->created_by}}</h4>
                <a href="#" class="ml-1 align-self-center">
                    <h6 class="m-0 p-0 font-weight-bold " style="color:  rgba(255, 92, 99, 1);">ติดตาม</h6>
                </a>
            </div>
            <h6 class=" m-0 p-0">{{$c->created_at}}</h6>
        </div>

        <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
            <ion-icon name="bookmark-outline" style="font-size:25px"></ion-icon>
            <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px"></ion-icon>
        </div>
    </div>
    <div class="card-body p-2">
        <p class="card-text">{{$c->new_content}}</p>

    </div>
    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$c->new_img.'')}}" alt="alt" class="w-100" style="width: 375px; height: 197px;">

    <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
        <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$c->like?$c->like:'0'}} ชื่นชอบ</h6>
        <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$comment->count()}} รายการ</h6>
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
            <h5 class="mb-0 ml-1 "><a href="{{url('test/ui')}}">แสดงความคิดเห็น</a> </h5>
            <!--เมื่อคลิก จะส่ง id และ ทำการดึงมาเสดงในหน้า Comment -->
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
                            <a href="">
                                <h6 class="  ml-1 m-0 font-weight-bold" style="color: rgba(255, 92, 99, 1);">ตอบกลับ</h6>
                            </a>
                        </div>
                    </div>
                    @if($comments->comment_reply != null)

                        <div class=" mx-2 my-2 p-0 pr-0 col-10 row justify-content-end" style="">

                            <div class=" pl-0 col-12 row justify-content-end">
                                <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 25px; height:25px;">

                                <div class=" mx-3 mr-0 col-10 p-1 pl-2" style=" min-height: 45px; background-color: rgba(000, 000, 000, 0.2); border-radius: 10px;">
                                    <h5 class="m-0 mb-1">ชื่อ XXXXXXX</h5>
                                    <div class="align-self-center  m-0 p-0 ">
                                       
                                        <h5 class="m-0">{{$comments->comment_reply}}</h5>
                                    </div>
                                    <div class="row  align-self-center  m-0 p-0 ">
                                        <h6 class="m-0 "><small>{{$comments->updated_at}}</small></h6>
                                        {{-- <a href="">
                                            <h6 class="  ml-1 m-0 font-weight-bold" style="color: rgba(255, 92, 99, 1);">ตอบกลับ</h6>
                                        </a> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            @endforeach

        @endif


        <form class="needs-validation row justify-content-center" id="sendcomment"  action="{{url('sendcomment')}}" method="POST" novalidate>
            @csrf
            <input type="text" class="comment-form form-control col-9 mr-2 " placeholder="" id="comment" name="comment">
            <input type="hidden" name="cid" value="{{$c->new_id}}">
            <div class="emoji ml-1 p-1 ">
               <img src="{{ asset('new_assets/img/icon/emoji.png')}}" alt="alt" style="width:35px; height:35px;" onclick="sendcomment();">

            </div>

        </form>

    </div>

</div>



@endsection
@section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
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
   
        bottom_now(1);
    </script>
@endsection