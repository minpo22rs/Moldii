@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ทำการสั่งซื้อ
    </div>
</div>
@endsection
@section('content')
<div class="container m-0 p-0">
    <div class=" p-2 col-12  border-bottom " style="height:144px;">
        <div class="row col-12 m-0">
            <h5 class="font-weight-bold">ชื่อ-นามสกุล</h5>

        </div>
        <div class="row col-12 p-0 m-0">
            <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-1 align-self-start"><br>
            <div class="text-start col-10">
                <h5 class="m-0 " style="height:70px;">รายละเอียดที่อยู่ </h5>
            </div>

            <i class="far fa-angle-right col-1 p-0 align-self-center text-right" style="font-size:1.7rem;"></i>



        </div>
    </div>
    <div class="row p-1 border-top mt-2 " style="color:black; font-size:18px; height:43px;">
        <div class="col-8 mx-0 align-self-center row">

            <img src="{{ asset('new_assets/img/icon/shop.svg')}}" alt="alt" style="font-size:1rem;">
            <h5 class="m-0 ml-1 font-weight-bold align-self-center">ชื่อร้านค้า</h5>
        </div>

    </div>
    <div class="col-12 row p-2 pr-1 border-top m-0">
        <div class="col-3 p-0">
            <img src="{{asset('new_assets/img/sample/avatar/avatar2.jpg')}}" class="col-12 pl-0  align-self-start"><br>
        </div>
        <div class="col-5 pr-0 align-self-center">
            <h5 class="mb-1 ">ชื่อสินค้า</h5>
            <h5 class="mb-1" style="color:rgba(79, 77, 77, 1);">จำนวนสินค้า</h5>
            <h5 class="m-0" style="color:rgba(79, 77, 77, 1);">ราคาต่อหน่วย</h5>
        </div>
        <div class="col-4 text-right pr-0 align-self-end">
            <h5 class="mb-1 font-weight-bold" style="">x1</h5>
            <div class="row justify-content-end col-12 m-0 p-0">
                <!-- <h5 class="m-0 font-weight-bold" style="color:rgba(116, 116, 116, 1);"><s>฿200.00</s> </h5> -->
                <h5 class="m-0 font-weight-bold ml-1">฿100.00</h5>
            </div>

        </div>
    </div>

    <div class="col-12 p-2 pt-1 " style="background: #DFEDFC;">
        <h5 class="m-0  mt-1 mb-1 font-weight-bold " style="color:rgba(80, 202, 101, 1);">ตัวเลือกการจัดส่ง</h5>
        <div class="col-12 row m-0 p-0 pt-1 justify-content-between border-top">
            <div class="col-8 p-0">
                <h5 class="m-0">ชื่อบริษัทขนส่ง - ประเภทของการจัดส่ง </h5>
                <h5 class="m-0">จะได้รับใน dd/mm - dd/mm/yy </h5>
            </div>
            <a href="" class="col-3 p-0 pr-1  row justify-content-end" style="color:black;">
                <h5 class="m-0 align-self-center font-weight-bold mr-1">฿100.00</h5>
                <i class="far fa-angle-right col-1 p-0 align-self-center" style="font-size:1.5rem;"></i>

            </a>
        </div>
    </div>

    <div  class="row p-1 border-top pl-2" style="color:black; height:2.375rem;">
        <div class="col-7 mx-0 align-self-center row p-0">

            <h5 class="m-0 ml-2 font-weight-bold">หมายเหตุ:</h5>
        </div>
        <div class="col-5 p-0 pr-1 mx-0 text-right">
            <input style="border:none; width:100%; height:100%; " type="text" name="name" class="form-control input_2 p-0 " placeholder="ฝากข้อความถึงผู้ขายหรือบริษัทขนส่ง">

            <!-- <h6 class="my-1"><small style="color:rgba(181, 181, 181, 1);"></small> </h6> -->

        </div>
    </div>
    <a href="{{url('')}}" class="row p-1 border-top border-bottom pl-2" style="color:black; height:2.375rem;">
        <div class="col-8 mx-0 align-self-center row p-0">

            <h5 class="m-0 ml-2 font-weight-bold">คำสั่งซื้อทั้งหมด(1ชิ้น):</h5>
        </div>
        <div class="col-4 mx-0 text-right">
            <h5 class="m-0 font-weight-bold mr-1" style="color:rgba(80, 202, 101, 1);">฿123.00</h5>

        </div>
    </a>


    <a href="" class="row py-1 border-top pl-2 mt-1" style="color:black; font-size:18px">
        <div class="col-6 mx-0 pl-0 align-self-center row">
            <img src="{{ asset('new_assets/img/icon/ticket.svg')}}" alt="alt" style="">

            <h5 class="m-0 ml-1 font-weight-bold align-self-center">โค้ดส่วนลด</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                <h5 class="m-0 mr-1 font-weight-bold align-self-center" style="color:rgba(80, 202, 101, 1);">เลือกโค้ดส่วนลด</h5>

                <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
            </div>
        </div>
    </a>
    <div class="col-12 mx-0  py-2 px-3 pl-1 border-top border-bottom align-self-center justify-content-between row ">
        <div class="row col-8 mx-0 pl-0 align-self-center">
            <img src="{{ asset('new_assets/img/icon/coin.svg')}}" style="color:black;">

            <h5 class="m-0 ml-2 font-weight-bold align-self-center">คุณมีคะแนนไม่พอ</h5>
        </div>
        <div class="custom-control custom-switch  ">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1"></label>
        </div>
    </div>

    <a href="" class="row py-1 border-top border-bottom pl-2 mt-2" style="color:black; font-size:18px">
        <div class="col-6 mx-0 pl-0 align-self-center row">
            <img src="{{ asset('new_assets/img/icon/wallet.svg')}}" alt="alt" style="">

            <h5 class="m-0 ml-1 font-weight-bold align-self-center">วิธีการชำระเงิน</h5>
        </div>
        <div class="col-6 mx-0 text-right">

            <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                <h5 class="m-0 mr-1 font-weight-bold align-self-center" style="color:rgba(80, 202, 101, 1);">เลือกวิธีการชำระเงิน</h5>

                <i class="far fa-angle-right" style="font-size:1.5rem;"></i>
            </div>
        </div>
    </a>
    <div class="col-12 row p-0  p-2">

        <div class="col-10 pr-0 align-self-center">
            <h5 class="mb-1  " style="color:rgba(79, 77, 77, 1);">รวมค่าสินค้า</h5>
            <h5 class="mb-1 " style="color:rgba(79, 77, 77, 1);">ค่าจัดส่ง</h5>
            <h5 class="m-0 " style="color:rgba(79, 77, 77, 1);">รวมทั้งหมด</h5>
        </div>
        <div class="col-2 text-right pr-0 align-self-end">
            <h5 class="mb-1 font-weight-bold" style="">฿ 100.00</h5>
            <h5 class="mb-1 font-weight-bold" style="">฿23.00</h5>
            <h5 class="m-0 font-weight-bold" style="">฿ 123.00</h5>
        </div>
    </div>

    <div class="col-12 row m-0 pr-0 border-top justify-content-end">

        <div class="col-12 row text-right p-0">
            <div class="col px-1 py-1 align-self-center">
                <div class="row p-0 m-0 justify-content-end">
                    <h5 class="m-0 ">ยอดชำระเงินทั้งหมด</h5>
                    <h5 class="m-0 font-weight-bold ml-1" style="color:rgba(80, 202, 101, 1);">฿100.00</h5>
                </div>
                <h5 class="m-0 ">ได้รับ 0 คะแนน</h5>
            </div>



            <a href="{{url('user/buyGoods')}}" style="height:4.125rem" type="button" class="btn btn-success square ">ชำระเงิน(0)</a>
        </div>
    </div>






















</div>
@endsection