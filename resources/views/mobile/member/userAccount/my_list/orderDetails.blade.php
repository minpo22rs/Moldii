@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        รายละเอียดคำสั่งซื้อ
    </div>
</div>
@endsection
@section('content')
<div class="container m-0 p-0">
    <div class="col-12 p-2 " style="background: #DFEDFC;">
        <h5 class="m-0  mt-1 mb-1 font-weight-bold ">คำสั่งซื้อกำลังอยู่ระหว่างส่ง</h5>
        <h5 class=" m-0 ">คุณจะได้รับสินค้าภายใน <a href="" style="color:rgba(0, 0, 0, 1);">26-08-2021</a> </h5>
    </div>

    <!-- //*คำสั่งซื้อสำเร็จแล้ว -->
    <!-- <div class="col-12 p-2 row m-0" style="background: #DFEDFC;">
        <div class="col-10">
            <h5 class="m-0  mt-1 mb-1 font-weight-bold ">คำสั่งซื้อสำเร็จแล้ว</h5>
            <h5 class="  ">ขอบคุณสำหรับการให้คะแนน คุณสามารถแก้ไขรีวิวได้ </h5>
            <h5 class=" m-0 "><a href="" style="color:rgba(0, 0, 0, 1);">26-08-2021</a></h5>
            
        </div>
        <img class="col-2 p-0 m-0" src="{{ asset('new_assets/img/icon/clipboard.svg')}}" alt="alt" style="">
    </div> -->
    <!-- //*คำสั่งซื้อสำเร็จแล้ว -->




    <div class="col-12 row p-2 m-0 border-bottom">
        <div class="col-1 p-0 text-center">
            <img class="col-12 p-0" src="{{ asset('new_assets/img/icon/delivery.svg')}}" alt="alt" style="">
            <img class=" p-0 mt-4" src="{{ asset('new_assets/img/icon/status.svg')}}" alt="alt" style="width:0.5625rem; height:2.1875rem;">
        </div>
        <div class="col-8 pr-0">
            <h5 class="m-0 font-weight-bold">สถานะการจัดส่ง</h5>
            <h5 class="m-0">ชื่อบริษัทที่จัดส่งสินค้า-ประเภทการจัดส่ง</h5>
            <h5 class="">รหัสการจัดส่งสินค้า</h5>

            <h5 class="m-0" style="color:rgba(1, 186, 175, 1);">ชื่อบริษัทที่จัดส่งสินค้า-ประเภทการจัดส่ง</h5>
            <!-- <h5 class="m-0" style="color:rgba(0, 84, 118, 1);">การจัดส่งพัสดุสำเร็จ</h5> -->
            <h5 class="m-0">dd/mm/yyyy 00:00</h5>
        </div>
        <div class="col-3 text-right pr-0">
            <a href="{{url('user/deliveryStatus')}}">
                <h5 class="m-0 font-weight-bold" style="color:rgba(1, 186, 175, 1);">ดูรายละเอียด</h5>
            </a>
        </div>
    </div>

    <div class="col-12 row p-2 m-0 border-bottom" style="height:144px">
        <div class="col-1 p-0">
            <img src="{{asset('new_assets/img/icon/pin.svg')}}" class="col-12 align-self-start"><br>

        </div>
        <div class="col-8 pr-0">
            <h5 class=" font-weight-bold">ที่อยู่ในการจัดส่ง</h5>
            <h5 class="m-0" style="color:rgba(79, 77, 77, 1);">รายละเอียดที่อยู่</h5>

        </div>
        <div class="col-3 text-right pr-0">
            <a href="">
                <h5 class="m-0 font-weight-bold" style="color:rgba(1, 186, 175, 1);">เปลี่ยน</h5>
            </a>
        </div>
    </div>
    <a href="{{url('')}}" class="row py-1 border-bottom pl-2" style="color:black; font-size:18px">
        <div class="col-8 mx-0 align-self-center row">
            <img src="{{asset('new_assets/img/sample/avatar/avatar2.jpg')}}" class="rounded-circle" style="width:20px; height:20px;"><br>

            <h5 class="m-0 ml-2 font-weight-bold align-self-center">ชื่อร้านค้า</h5>
        </div>
        <div class="col-4 mx-0 text-right">
            <div class="mx-2 my-1 ml-2 mr-2"><i class="far fa-angle-right"></i></div>
        </div>
    </a>


    <div class="col-12 row p-2 m-0 border-bottom" style="">

        <div class="col-12 row p-0 ">
            <div class="col-3 p-0">
                <img src="{{asset('new_assets/img/sample/avatar/avatar2.jpg')}}" class="col-12 align-self-start"><br>
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
                    <h5 class="m-0 font-weight-bold ml-1" style="color:rgba(80, 202, 101, 1);">฿100.00</h5>
                </div>

            </div>
        </div>
        <div class="col-12 row p-0 mt-2 ">

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
    </div>


    <div class="col-12 row p-2 pl-3 m-0 border-bottom border-top mt-2">
        <div class="col-8 pr-0">
            <h5 class=" font-weight-bold">ช่องทางการชำระเงิน</h5>
            <h5 class="m-0" style="color:rgba(79, 77, 77, 1);">บัญชีธนาคาร</h5>
        </div>
    </div>

    <div class="col-12 row  p-2 mt-2 m-0 border-top border-bottom ">
        <div class="col-6 p-0 align-self-center">
            <h5 class="  font-weight-bold">หมายเลขคำสั่งซื้อ</h5>
            <h5 class="mb-1 " style="color:rgba(79, 77, 77, 1);">เวลาที่สั่งซื้อ</h5>
            <h5 class="mb-1 " style="color:rgba(79, 77, 77, 1);">เวลาชำระเงิน</h5>
            <h5 class="m-0 " style="color:rgba(79, 77, 77, 1);">เวลาส่งสินค้า</h5>
        </div>
        <div class="col-6 text-right pr-0 align-self-end">
            <a href="">
                <h5 class=" font-weight-bold" style="color:rgba(1, 186, 175, 1);">คัดลอก</h5>
            </a>
            <h5 class="mb-1 font-weight-bold" style="">23-08-2021 14:39</h5>
            <h5 class="mb-1 font-weight-bold" style="">23-08-2021 14:39</h5>
            <h5 class="m-0 font-weight-bold" style="">24-08-2021 14:58</h5>
        </div>
    </div>
    <div class="col-12  p-0 text-center my-3">
        <button type="button" class="btn btn-outline-dark col-11 my-2 ">
            <img src="{{asset('new_assets/img/icon/chat.svg')}}" class="align-self-center"><br>
            <h5 class=" ml-1 m-0 font-weight-bold">ติดต่อผู้ขาย</h5>
        </button>
        <!--//*ดูคะแนน -->
        <!-- <button type="button" class="btn btn-outline-dark col-11 my-2 ">
         <i class=" far fa-star align-self-center" style="font-size:18px; color:rgba(249, 219, 61, 1);"></i>
            <h5 class=" ml-1 m-0 font-weight-bold">ดูคะแนน</h5>
        </button> -->
        <!--//*ดูคะแนน -->
        <button type="button" class="btn btn-outline-dark col-11 my-2 ">
            <img src="{{asset('new_assets/img/icon/time.svg')}}" class="align-self-center"><br>
            <h5 class=" ml-1 m-0 font-weight-bold">ขยายระยะเวลาการจัดส่ง</h5>
        </button>
        <!--//*ซื้ออีกครั้ง -->
        <!-- <button type="button" class="btn  btn-lg btn-block  col-11 my-3 " style="height: 40px; background: #50CA65;">
            <h5 class=" m-0 font-weight-bold align-self-center" style="color:rgba(255, 255, 255, 1);">ซื้ออีกครั้ง</h5>
        </button> -->
        <!--//*ซื้ออีกครั้ง -->
    </div>
    <div class="col-12 row m-0  mb-4 justify-content-between">

        <button type="button" class="btn  btn-lg btn-block  m-0 " style="width:49%; height: 58px; background: #50CA65;">
            <h5 class=" m-0 font-weight-bold align-self-center" style="color:rgba(255, 255, 255, 1);">ขอคืนเงิน/คืนสินค้า</h5>
        </button>

        <button type="button" class="btn  btn-lg btn-block  m-0 " style="width:49%; height: 58px; background: rgba(218, 218, 218, 1); ">
            <h5 class=" m-0 font-weight-bold align-self-center" style="color:rgba(255, 255, 255, 1);">ฉันได้ตรวจสอบและยอมรับสินค้า</h5>
        </button>



    </div>


























</div>
@endsection