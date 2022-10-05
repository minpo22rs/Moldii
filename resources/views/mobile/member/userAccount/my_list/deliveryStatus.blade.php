@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        สถานะการจัดส่ง
    </div>
</div>
@endsection
@section('content')
<br>
<div class="container m-0 p-0">
    <div class=" px-2 py-3  border-top border-bottom mt-2 text-right">
        <div class="col-12 row p-0 m-0 ">
            <div class="mx-1">
                <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
            </div>
            <div class="col-10 row align-self-center justify-content-between pl-2">
                <div class="col-12  row text-left my-1 ">
                    <h5 class="m-0 font-weight-bold">จะได้รับในวันที่ </h5>
                    <h5 class="m-0 ml-1 font-weight-bold" style="color:rgba(80, 202, 101, 1);">dd/mm/yy</h5>
                </div>
                <div class="col-10 p-0 text-left ">
                    <h5 class="m-0 ">ให้บริการจัดส่งโดย ชื่อบริษัทที่จัดส่งสินค้า - ประเภทการจัดส่ง</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-1 border-bottom pl-2" style="color:black; height:2.375rem;">
        <div class="col-4 mx-0 align-self-center row p-0">
            <h5 class="m-0 ml-1 font-weight-bold" style="color:rgba(149, 149, 149, 1); font-size:12px; ">หมายเลขติดตามพัสดุ</h5>
        </div>
        <div class="col-8 p-0 pr-2 mx-0 text-right">
            <input type="text" class="p-0 text-right mr-1" style="color:rgba(149, 149, 149, 1);" value="A-2HKJBOYFVJHC" id="myInput">
            <button onclick="myFunction()" class="btn-1 p-0" style="color:rgba(80, 202, 101, 1);">คัดลอก</button>
        </div>
    </div>
    <div class="col-12 border-bottom py-2 mt-1">
        <div class="row col-12  pt-0 py-1">
            <div class="col-2 p-0 text-center">
                <h6 class="m-0">dd/mm/yy</h6>
                <h6 class="m-0">00:00</h6>
            </div>
            <div class=" p-0">
                <img class=" p-0 " src="{{ asset('new_assets/img/icon/status.svg')}}" alt="alt" style="width:0.5625rem; height:2.1875rem;">
            </div>
            <div class="col-9 pl-1 text-left">
                <h5 class="m-0 " style="color:rgba(80, 202, 101, 1);">การจัดส่งพัสดุสำเร็จ</h5>
                <h5 class="m-0 ">dd/mm/yyyy 00:00</h5>
            </div>
        </div>
        <div class="row col-12  pt-0 py-1">
            <div class="col-2 p-0 text-center">
                <h6 class="m-0">dd/mm/yy</h6>
                <h6 class="m-0">00:00</h6>
            </div>
            <div class=" p-0">
                <img class=" p-0 " src="{{ asset('new_assets/img/icon/status.svg')}}" alt="alt" style="width:0.5625rem; height:2.1875rem;">
            </div>
            <div class="col-9 pl-1 text-left">
                <h5 class="m-0 " style="color:rgba(80, 202, 101, 1);">การจัดส่งพัสดุสำเร็จ</h5>
                <h5 class="m-0 ">dd/mm/yyyy 00:00</h5>
            </div>
        </div>
       
       
       
        


        
        
        
        
    </div>


















</div>
@endsection

@section('custom_script')
<script>
    function myFunction() {

        var copyText = document.getElementById("myInput");


        copyText.select();
        copyText.setSelectionRange(0, 99999);


        navigator.clipboard.writeText(copyText.value);



    }
</script>
@endsection