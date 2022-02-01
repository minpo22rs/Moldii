@extends('mobile.main_layout.main')
    
    @section('content')
    <div class="card my-3">
        <div class="card-body row col-12 justify-content-center m-0">
            <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

            <div class="card-title col-8  align-self-center m-0 ">
                <div class="card-title m-0 row align-self-center">
                    <h4 class=" m-0 p-0">ชื่อ XXXXXXX</h4>
                    <a href="#" class="ml-1 align-self-center">
                        <h6 class="m-0 p-0 " style="color:  rgba(255, 92, 99, 1);">ติดตาม</h6>
                    </a>
                </div>
                <h6 class=" m-0 p-0">DD-MM-YYYY</h6>
            </div>

            <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
                <ion-icon name="bookmark-outline" style="font-size:25px"></ion-icon>
                <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px"></ion-icon>
            </div>
        </div>
        <div class="card-body row">
            <div class="w-50">
                <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" class=" " style="width:100%; height:100%;">
            </div>
            <div class="w-50">
                <div class="ml-2 pl-1">
                    <h5 class="card-title">หัวข้อเรื่อง</h5>
                    <ul class="p-0 pl-2">
                        <li>XXXXXXXXXXXX</li>

                        <li>XXXXXXXXXXXX</li>

                        <li>XXXXXXXXXXXX</li>
                    </ul>


                </div>





                <div class="w-100 pl-1">
                    <img src="{{ asset('new_assets/img/icon/play.png')}}" alt="alt" class=" rounded-circle  " style="width: 25px; height:25px;">

                </div>
            </div>




        </div>

        <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
            <h6 class="mb-0 ml-1 card-subtitle text-muted">230 ชื่นชอบ</h6>
            <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น 120 รายการ</h6>
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
                <h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5>
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
    </div>
    <div class="card my-3">
        <div class="card-body row col-12 justify-content-center m-0">
            <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

            <div class="card-title col-8  align-self-center m-0 ">
                <div class="card-title m-0 row align-self-center">
                    <h4 class=" m-0 p-0">ชื่อ XXXXXXX</h4>
                    <a href="#" class="ml-1 align-self-center">
                        <h6 class="m-0 p-0 " style="color:  rgba(255, 92, 99, 1);">ติดตาม</h6>
                    </a>
                </div>
                <h6 class=" m-0 p-0">DD-MM-YYYY</h6>
            </div>

            <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
                <ion-icon name="bookmark-outline" style="font-size:25px"></ion-icon>
                <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px"></ion-icon>
            </div>
        </div>
        <div class="card-body row">
            <div class="w-50">
                <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" class=" " style="width:100%; height:100%;">
            </div>
            <div class="w-50">
                <div class="ml-2 pl-1">
                    <h5 class="card-title">หัวข้อเรื่อง</h5>
                    <ul class="p-0 pl-2">
                        <li>XXXXXXXXXXXX</li>

                        <li>XXXXXXXXXXXX</li>

                        <li>XXXXXXXXXXXX</li>
                    </ul>


                </div>





                <div class="w-100 pl-1">
                    <img src="{{ asset('new_assets/img/icon/play.png')}}" alt="alt" class=" rounded-circle  " style="width: 25px; height:25px;">

                </div>
            </div>




        </div>

        <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
            <h6 class="mb-0 ml-1 card-subtitle text-muted">230 ชื่นชอบ</h6>
            <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น 120 รายการ</h6>
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
                <h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5>
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
    </div>
    @endsection