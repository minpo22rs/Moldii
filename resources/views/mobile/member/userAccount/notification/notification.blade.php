@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        การแจ้งเตือน
    </div>
</div>
@endsection
@section('content')
<div class="container col-12 p-1 m-0">
    <a href="{{url('')}}" class="row p-1 pr-0 border-top border-bottom">
        <div class="">
            <img class="rounded-circle" src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
        </div>
        <div class="col-10 row align-self-center justify-content-between pr-0 pl-2">
            <div class="col-9 p-0 ">
                <h5 class="m-0 align-self-center" >ตย.ข้อความแจ้งเตือนโปรโมทชั่นหรือข่าวสารในการประกวด</h5>
            </div>
            <div class=" p-0 text-center">
                <h6 class="m-0  ">12/08/2564</h6>
                <h6 class="m-0  "><small>เวลา 09.30 น.</small> </h6>
            </div>
        </div>
    </a>
    <a href="{{url('')}}" class="row p-1 pr-0 border-top border-bottom">
        <div class="">
            <img class="rounded-circle" src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
        </div>
        <div class="col-10 row align-self-center justify-content-between pr-0 pl-2">
            <div class="col-9 p-0 ">
                <h5 class="m-0 align-self-center" >ตย.ข้อความแจ้งเตือนโปรโมทชั่นหรือข่าวสารในการประกวด</h5>
            </div>
            <div class=" p-0 text-center">
                <h6 class="m-0  ">19/07/2564</h6>
                <h6 class="m-0  "><small>เวลา 12.13 น.</small> </h6>
            </div>
        </div>
    </a>
    <a href="{{url('')}}" class="row p-1 pr-0 border-top border-bottom">
        <div class="">
            <img class="rounded-circle" src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
        </div>
        <div class="col-10 row align-self-center justify-content-between pr-0 pl-2">
            <div class="col-9 p-0 ">
                <h5 class="m-0 align-self-center" >ตย.ข้อความแจ้งเตือนโปรโมทชั่นหรือข่าวสารในการประกวด</h5>
            </div>
            <div class=" p-0 text-center">
                <h6 class="m-0  ">07/07/2564</h6>
                <h6 class="m-0  "><small>เวลา 16.40 น.</small> </h6>
            </div>
        </div>
    </a>
                
                

</div>




@endsection

@section('custom_script')
<script>
    bottom_now(4);
</script>
@endsection