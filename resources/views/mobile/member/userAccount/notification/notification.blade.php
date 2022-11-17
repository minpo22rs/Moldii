@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    {{-- <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.location.replace('{{url('/index')}}');"></ion-icon>
    </div> --}}
    <div class="pageTitle">
        การแจ้งเตือน
    </div>
</div>
@endsection
@section('content')
<br>
<div class="container col-12 p-1 m-0">

    <ul class="nav nav-tabs style1 mt-2" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#me" role="tab">เกี่ยวกับคุณ</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#system" role="tab">ระบบ</a></li> 

    </ul>

    <div class="tab-content mt-2">


        <div id="me" class="tab-pane fade in active show">
            @foreach($comment as $comments)
                <?php $user = DB::Table('tb_customers')->where('customer_id',$comments->comment_author)->first(); ?>
                <?php $news = DB::Table('tb_news')->where('new_id',$comments->comment_object_id)->first();?>
                @if($comments->reader=='0')
                    <a href="{{url('readnotification/'.$comments->comment_id.'/'.$comments->comment_object_id.'')}}" class="row p-1 pr-0 border-top border-bottom" style="background-color: #6c757d66">
                @else
                    <a href="{{url('readnotification/'.$comments->comment_id.'/'.$comments->comment_object_id.'')}}" class="row p-1 pr-0 border-top border-bottom" >
                @endif
                        <div class="">
                            @if($user->provider ==null && $user->customer_img == null)
                                <img src="{{asset('original_assets/img/material_icons/woman.png')}}" class="rounded-circle" style="width: 60px; height: 60px; border-radius: 6px;"><br>
                            @elseif($user->provider ==null)
                                <img src="{{asset('storage/profile_cover/'.$user->customer_img.'')}}" class="rounded-circle" style="width: 60px; height: 60px; border-radius: 6px;"><br>
                            @else
                                <img src="{{$user->customer_img}}" class="rounded-circle" style="width: 60px; height: 60px; border-radius: 6px;"><br>
                            @endif


                        </div>
                        <div class="col-10 row align-self-center justify-content-between pr-0 pl-2">
                            <div class="col-9 p-0 ">
                                <h5 class="m-0 align-self-center" >{{$user->customer_username}}</h5>
                                <h6 class="m-0  "><small>แสดงความคิดเห็นในโพสต์ของคุณ</small> </h6>
                            </div>
                            <div class=" p-0 text-center">
                                <h6 class="m-0  ">{{date('Y-m-d',strtotime($comments->created_at))}}</h6>
                                <h6 class="m-0  "><small>{{date('H:i',strtotime($comments->created_at))}}</small> </h6>
                            </div>
                        </div>
                    </a>
                
            @endforeach

        </div>


        <div id="system" class="tab-pane fade ">
            @foreach($sqlid as $sqlids)
                <a href="{{url('')}}" class="row p-1 pr-0 border-top border-bottom">
                    <div class="">
                        <img class="rounded-circle" src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                    </div>
                    <div class="col-10 row align-self-center justify-content-between pr-0 pl-2">
                        <div class="col-9 p-0 ">
                            <h5 class="m-0 align-self-center" >{{$sqlids->noti_title}}</h5>
                            {{-- <h6 class="m-0  "><small>{{$sqlids->noti_detail}}</small> </h6> --}}
                        </div>
                        <div class=" p-0 text-center">
                            <h6 class="m-0  ">{{date('Y-m-d',strtotime($ssqlidsqls->created_at))}}</h6>
                            <h6 class="m-0  "><small>{{date('H:i',strtotime($sqlids->created_at))}}</small> </h6>
                        </div>
                    </div>
                </a>
            @endforeach
            @foreach($sql as $sqls)
                <a href="{{url('')}}" class="row p-1 pr-0 border-top border-bottom">
                    <div class="">
                        <img class="rounded-circle" src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                    </div>
                    <div class="col-10 row align-self-center justify-content-between pr-0 pl-2">
                        <div class="col-9 p-0 ">
                            <h5 class="m-0 align-self-center" >{{$sqls->noti_title}}</h5>
                            <h6 class="m-0  "><small>{{$sqls->noti_detail}}</small> </h6>
                        </div>
                        <div class=" p-0 text-center">
                            <h6 class="m-0  ">{{date('Y-m-d',strtotime($sqls->created_at))}}</h6>
                            <h6 class="m-0  "><small>{{date('H:i',strtotime($sqls->created_at))}}</small> </h6>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    
</div>

@endsection

@section('custom_script')
<script>
    bottom_now(1);
</script>
@endsection