@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        รายการของฉัน
    </div>
</div>
@endsection
@section('content')
<div class="container m-0 p-0">
    <div class="section full">
        <div class=" transparent p-0">
            <ul class="nav nav-tabs lined iconed" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#purchase" role="tab">
                        <h4 class="m-0 font-weight-bold">การซื้อสินค้า</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#shopping_cart" role="tab">
                        <h4 class="m-0 font-weight-bold">ตะกร้าสินค้า</h4>

                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="section full mb-2">
        <div class="tab-content">

            <!-- purchase -->
            <div class="tab-pane fade show active " id="purchase" role="tabpanel">

                <div class="row justify-content-center my-3">
                    <button class="tabs-btn font-weight-bold justify-content-center active" onclick="openCity(event, 'delivered')">ที่ต้องจัดส่ง</button>
                    <button class="tabs-btn font-weight-bold justify-content-center " onclick="openCity(event, 'receive')">ที่ต้องได้รับ</button>
                    <button class="tabs-btn font-weight-bold justify-content-center " onclick="openCity(event, 'score')">ให้คะแนน</button>
                </div>

                <!-- ที่ต้องจัดส่ง -->
                <div id="delivered" class="tabcontent">
                    <a href="{{url('user/orderDetails')}}" class="row p-2  border-top border-bottom">
                        <div class="mx-1">
                            <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                        </div>
                        <div class="col-10 row align-self-center justify-content-between pl-2">
                            <div class="col-6 p-0 ">
                                <h5 class="m-0">ชื่อร้าน</h5>
                                <h5 class="m-0">จำนวนรายการสินค้า</h5>
                                <h5 class="m-0">ราคาทั้งหมด</h5>
                            </div>
                            <div class="col-4 p-0 ">
                                <h5 class="m-0  text-right">วว/ดด/ปป</h5>
                                <h5 class="m-0  text-right">เวลา</h5>
                                <h5 class="m-0  text-right" style="color:rgba(45, 176, 67, 1);">ชำระเงินเรียบร้อย</h5>
                            </div>
                        </div>
                    </a>
                    <a href="{{url('user/orderDetails')}}" class="row p-2  border-top border-bottom">
                        <div class="mx-1">
                            <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                        </div>
                        <div class="col-10 row align-self-center justify-content-between pl-2">
                            <div class="col-6 p-0 ">
                                <h5 class="m-0">ชื่อร้าน</h5>
                                <h5 class="m-0">จำนวนรายการสินค้า</h5>
                                <h5 class="m-0">ราคาทั้งหมด</h5>
                            </div>
                            <div class="col-4 p-0 ">
                                <h5 class="m-0  text-right">วว/ดด/ปป</h5>
                                <h5 class="m-0  text-right">เวลา</h5>
                                <h5 class="m-0  text-right" style="color:rgba(45, 176, 67, 1);">ชำระเงินเรียบร้อย</h5>
                            </div>
                        </div>
                    </a>
                    {{-- <h2>ที่ต้องจัดส่ง</h2> <!-- Test --> --}}

                </div>
                <!-- ที่ต้องจัดส่ง -->





                <!-- ที่ต้องได้รับ -->
                <div id="receive" class="tabcontent" style="display:none">
                    <a href="{{url('user/orderDetails')}}" class="row p-2  border-top border-bottom">
                        <div class="mx-1">
                            <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                        </div>
                        <div class="col-10 row align-self-center justify-content-between pl-2">
                            <div class="col-6 p-0 text-left">
                                <h5 class="m-0">ชื่อร้าน</h5>
                                <h5 class="m-0">จำนวนรายการสินค้า</h5>
                                <h5 class="m-0">ราคาทั้งหมด</h5>
                            </div>
                            <div class="col-4 p-0 text-right">
                                <h5 class="m-0  ">วว/ดด/ปป</h5>
                                <h5 class="m-0  ">เวลา</h5>
                                <h5 class="m-0  " style="color:rgba(45, 176, 67, 1);">ชำระเงินเรียบร้อย</h5>
                            </div>
                        </div>
                    </a>
                    <a href="{{url('user/orderDetails')}}" class="row p-2  border-top border-bottom">
                        <div class="mx-1">
                            <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                        </div>
                        <div class="col-10 row align-self-center justify-content-between pl-2">
                            <div class="col-6 p-0 text-left">
                                <h5 class="m-0">ชื่อร้าน</h5>
                                <h5 class="m-0">จำนวนรายการสินค้า</h5>
                                <h5 class="m-0">ราคาทั้งหมด</h5>
                            </div>
                            <div class="col-4 p-0 text-right">
                                <h5 class="m-0  ">วว/ดด/ปป</h5>
                                <h5 class="m-0  ">เวลา</h5>
                                <h5 class="m-0  " style="color:rgba(45, 176, 67, 1);">ชำระเงินเรียบร้อย</h5>
                            </div>
                        </div>
                    </a>
                    <h2>ทีต้องได้รับ</h2> <!-- Test -->
                </div>
                <!-- ที่ต้องได้รับ -->



                <!-- ให้คะแนน -->
                <div id="score" class="tabcontent" style="display:none">
                    <div class=" px-2 py-3 border-top border-bottom text-right">
                        <div class="col-12 row p-0 m-0 ">
                            <div class="mx-1">
                                <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                            </div>
                            <div class="col-10 row align-self-center justify-content-between pl-2">
                                <div class="col-6 p-0 text-left ">
                                    <h5 class="m-0">ชื่อร้าน</h5>
                                    <h5 class="m-0">จำนวนรายการสินค้า</h5>
                                    <h5 class="m-0">ราคาทั้งหมด</h5>
                                </div>
                                <div class="col-4 p-0 text-right ">
                                    <h5 class="m-0  ">วว/ดด/ปป</h5>
                                    <h5 class="m-0  ">เวลา</h5>
                                    <h5 class="m-0  " style="color:rgba(45, 176, 67, 1);">ชำระเงินเรียบร้อย</h5>
                                </div>
                            </div>
                        </div>

                        <a href="{{url('user/score')}}" class="btn btn-success col-9 mt-2 mr-2 font-weight-bold" style="font-size:12px; height: 30px; background: #50CA65; border-radius: 8px;"><i class="fal fa-star mx-1"></i>ให้คะแนน</a>
                    </div>
                    <div class=" px-2 py-3 border-top border-bottom text-right">
                        <div class="col-12 row p-0 m-0 ">
                            <div class="mx-1">
                                <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                            </div>
                            <div class="col-10 row align-self-center justify-content-between pl-2">
                                <div class="col-6 p-0 text-left ">
                                    <h5 class="m-0">ชื่อร้าน</h5>
                                    <h5 class="m-0">จำนวนรายการสินค้า</h5>
                                    <h5 class="m-0">ราคาทั้งหมด</h5>
                                </div>
                                <div class="col-4 p-0 text-right ">
                                    <h5 class="m-0  ">วว/ดด/ปป</h5>
                                    <h5 class="m-0  ">เวลา</h5>
                                    <h5 class="m-0  " style="color:rgba(45, 176, 67, 1);">ชำระเงินเรียบร้อย</h5>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('user/score')}}" class="btn btn-success col-9 mt-2 mr-2 font-weight-bold" style="font-size:12px; height: 30px; background: #50CA65; border-radius: 8px;"><i class="fal fa-star mx-1"></i>ให้คะแนน</a>
                    </div>
                    <h2>ให้คะแนน</h2> <!-- Test -->
                </div>
                <!-- ให้คะแนน -->


            </div>
            <!-- * purchase -->


















            <!-- * shopping_cart -->
            <div class="tab-pane fade mt-2" id="shopping_cart" role="tabpanel">
                <a href="{{url('user/shoppingCart')}}" class="row p-2  border-top border-bottom">
                    <div class="mx-1">
                        <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                    </div>
                    <div class="col-10 row align-self-center justify-content-between pl-2">
                        <div class="col-7 p-0 ">
                            <h5 class="m-0">ชื่อร้าน</h5>
                            <h5 class="m-0">จำนวนรายการสินค้า</h5>
                            <h5 class="m-0">ราคาทั้งหมด</h5>
                        </div>
                        <div class=" p-0 text-center">
                            <h5 class="m-0  ">วว/ดด/ปป</h5>
                            <h5 class="m-0  ">เวลา</h5>
                            
                        </div>
                    </div>
                </a>
                <a href="{{url('user/shoppingCart')}}" class="row p-2  border-top border-bottom">
                    <div class="mx-1">
                        <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                    </div>
                    <div class="col-10 row align-self-center justify-content-between pl-2">
                        <div class="col-7 p-0 ">
                            <h5 class="m-0">ชื่อร้าน</h5>
                            <h5 class="m-0">จำนวนรายการสินค้า</h5>
                            <h5 class="m-0">ราคาทั้งหมด</h5>
                        </div>
                        <div class=" p-0 text-center">
                            <h5 class="m-0  ">วว/ดด/ปป</h5>
                            <h5 class="m-0  ">เวลา</h5>
                            
                        </div>
                    </div>
                </a>
                <a href="{{url('user/shoppingCart')}}" class="row p-2  border-top border-bottom">
                    <div class="mx-1">
                        <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                    </div>
                    <div class="col-10 row align-self-center justify-content-between pl-2">
                        <div class="col-7 p-0 ">
                            <h5 class="m-0">ชื่อร้าน</h5>
                            <h5 class="m-0">จำนวนรายการสินค้า</h5>
                            <h5 class="m-0">ราคาทั้งหมด</h5>
                        </div>
                        <div class=" p-0 text-center">
                            <h5 class="m-0  ">วว/ดด/ปป</h5>
                            <h5 class="m-0  ">เวลา</h5>
                            
                        </div>
                    </div>
                </a>
                
                
                
            </div>
            <!-- * shopping_cart -->



        </div>
    </div>
</div>




@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection