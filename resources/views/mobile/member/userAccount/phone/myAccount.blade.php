@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    {{-- <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div> --}}
    <div class="pageTitle">
        บัญชีของฉัน
    </div>
</div>
@endsection
@section('content')
<br>
<div>
    <div class="col-12 text-center">
        @if($sql->provider ==null && $sql->customer_img == null)
            <img src="{{asset('original_assets/img/material_icons/woman.png')}}" class="rounded-circle mt-5" width="25%" height="auto"><br>
        @elseif($sql->provider ==null)
            <img src="{{asset('storage/profile_cover/'.$sql->customer_img.'')}}" class="rounded-circle mt-5" width="25%" height="auto"><br>
        @else
            <img src="{{$sql->customer_img}}" class="rounded-circle mt-5" width="25%" height="auto"><br>
        @endif
        <span class="font-weight-bold">
            <h3 class="mb-0"><?php //$my_name 
                                ?></h3>
        </span>
    </div>
</div>

<div class="row my-2">
    <div class="col-6 pr-0">
        <div class="m-1">
            <a href="{{url('user/wallet')}}" style="color: black">
                <div class="card">
                    <div class="row w-100 mx-3 my-2 text-center">
                        <img src="{{ asset('new_assets/img/icon/pig.svg')}}" width="15%">
                        <span class="ml-2 align-self-center font-weight-bold"> ฿ {{number_format($sql->customer_wallet,2,'.',',')}}</span>
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
                    <span class="ml-2 align-self-center font-weight-bold">{{$sql->customer_point}} คอยน์</span>
                </div>
            </div>
        </div>
    </div>
   
</div>

<div class="row my-2">
    <div class="col-6 pr-0">
        <div class="m-1">
            <a href="๒" style="color: black">
                <div class="card">
                    <div class="row w-100 mx-3 my-2 text-center">
                        <img src="{{ asset('new_assets/img/icon/giftbox.svg')}}" width="15%">
                        <span class="ml-2 align-self-center font-weight-bold"> โดเนท</span>
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
                    <span class="ml-2 align-self-center font-weight-bold">ขอเปิดร้านค้า</span>
                </div>
            </div>
        </div>
    </div>
   
</div>

<a href="{{url('user/myList')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row">
        <i class="far fa-list-alt"></i>
        <h5 class="m-0 ml-2 font-weight-bold">รายการของฉัน</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<a href="{{url('user/mylike')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row">
        <i class="fas fa-heart "></i>
        <h5 class="m-0 ml-2 font-weight-bold">สิ่งที่ถูกใจ</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<a href="{{url('/user/creditCard')}}" class="row py-1 border-top pl-2" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row">
        <i class="fal fa-credit-card"></i>
        <h5 class="m-0 ml-2 font-weight-bold">รายการบัญชีธนาคาร/บัตรที่บันทึก</้>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>

</a>



<a href="{{url('user/profile/setting')}}" class="row py-1  border-top pl-2 border-bottom" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row ">
        <i class="far fa-cog"></i>
        <h5 class="m-0 ml-2 font-weight-bold">การตั้งค่า</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>


<a href="{{url('user/sendslip')}}" class="row py-1  border-top pl-2 border-bottom" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row ">
        <i class="far fa fa-file-invoice"></i>
        <h5 class="m-0 ml-2 font-weight-bold">หน้าแจ้งชำระเงิน</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

<a href="{{url('logout')}}" class="row py-1  border-top pl-2 border-bottom" style="color:black; font-size:18px">
    <div class="col-8 mx-0 align-self-center row ">
        <i class="far fa fa-sign-out"></i>
        <h5 class="m-0 ml-2 font-weight-bold">ลงชื่อออก</h5>
    </div>
    <div class="col-4 mx-0 text-right">
        <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
    </div>
</a>

@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection