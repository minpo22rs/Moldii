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
<div class="container col-12 p-1 m-0">
    @foreach($sql as $sqls)
        <a href="{{url('')}}" class="row p-1 pr-0 border-top border-bottom">
            <div class="">
                <img class="rounded-circle" src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
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

@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection