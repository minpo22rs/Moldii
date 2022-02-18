@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        ช่องทางการชำระเงิน
    </div>
</div>
@endsection
@section('content')
<div class="container m-0 p-0">




    <ul class="listview link-listview mb-2">


        <li class="multi-level">
            <a href="#" class="item">
                <h5 class="m-0  font-weight-bold align-self-center">บัตรเคดิต/บัตรเดบิต</h5>
                <div class="row">
                    <span class="font-weight-bold align-self-center mr-2" style="color:rgba(84, 84, 84, 1);">*0000</span>


                </div>

            </a>
            <!-- sub menu -->
            <ul class="listview image-listview pb-0">

                <li>
                    <a href="#" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/Visa_big.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">ธนาคารกสิกรไทย</h5>
                            <div class="row">
                                <span class="font-weight-bold align-self-center mr-1" style="color:rgba(84, 84, 84, 1);">*0000</span>
                                <img src="{{asset('new_assets/img/icon/check_2.svg')}}" style="width:1.4rem; height:1.4rem;" class=" p-0 align-self-center"><br>

                            </div>

                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/Visa_big.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">ธนาคารกสิกรไทย</h5>
                            <div class="row">
                                <span class="font-weight-bold align-self-center mr-1" style="color:rgba(84, 84, 84, 1);">*0000</span>
                                <img src="{{asset('new_assets/img/icon/check_2.svg')}}" style="width:1.4rem; height:1.4rem; opacity: 0; " class=" p-0 align-self-center"><br>

                            </div>

                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/Visa_big.svg')}}" alt="image" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-bold align-self-center">ธนาคารกสิกรไทย</h5>
                            <div class="row">
                                <span class="font-weight-bold align-self-center mr-1" style="color:rgba(84, 84, 84, 1);">*0000</span>
                                <img src="{{asset('new_assets/img/icon/check_2.svg')}}" style="width:1.4rem; height:1.4rem; opacity: 0;" class=" p-0 align-self-center"><br>

                            </div>

                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('user/addCreditCard_2')}}" class="item border-top pr-3">
                        <img src="{{ asset('new_assets/img/icon/plus_2.svg')}}" alt="image" style="height:1.5rem;" class="image mr-1">

                        <div class="in">
                            <h5 class="m-0  font-weight-normal align-self-center">เพิ่มบัตรเครดิต/บัตรเดบิต</h5>


                        </div>
                    </a>
                </li>

            </ul>
            <!-- * sub menu -->
        </li>





    </ul>






















</div>
@endsection