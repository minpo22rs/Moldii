@extends('mobile.main_layout.main')
@section('content')

  

     <!-- App Header -->
     <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">การถอนรายได้</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="m-2">

            <div class = "card shadow bg-primary">
                <div class = "card-header">
                    <div class = "row align-items-center">
                        <div class = "col text-left">
                            <h3 class = "text-white mt-1">
                                ยอดที่ถอนได้
                            </h3>
                        </div>
                    </div>
                </div>
                <div class = "card-body">
                    <div class = "row align-items-center">
                        <div class = "col-12">
                            <div class = "row m-1">
                                <div class = "col-6 text-left">
                                    <span class = "font-weight-bold">ยอดที่ถอนได้ทั้งหมด</span>
                                </div>
                                <div class = "col-6 ml-auto text-right">
                                    <span class = "font-weight-bold">100 บาท</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>

        <div class="m-2">
            <form action = "#">
                <div class = "card shadow bg-danger">
                    <div class = "card-header">
                        <div class = "row align-items-center">
                            <div class = "col text-left">
                                <h3 class = "text-white mt-1">
                                    แจ้งถอนรายได้
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class = "card-body">
                        <div class = "row align-items-center">
                            <div class = "col-12">
                                <div class = "row m-1">
                                    <div class = "col-6 text-left">
                                        <input type = "number" class = "form-control" value = "0.00">
                                    </div>
                                    <div class = "col-6 ml-auto text-right">
                                        <input type = "button" class = "btn btn-warning btn-block" value = "แจ้งถอนเงิน">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="m-2">

            <div class = "card shadow">
                <div class = "card-header">
                    <div class = "row align-items-center">
                        <div class = "col text-left">
                            <h3 class = "text-primary mt-1">
                                วันที่ 1 มกราคม 2564 เวลา 09:00:00
                            </h3>
                        </div>
                    </div>
                </div>
                <div class = "card-body text-danger">
                    <div class = "row align-items-center">
                        <div class = "col-12">
                            <div class = "row m-1">
                                <div class = "col-6 text-left">
                                    <span class = "font-weight-bold">ถอนรายได้</span>
                                </div>
                                <div class = "col-6 ml-auto text-right">
                                    <span class = "font-weight-bold">80 บาท</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>

        <div class="m-2">

            <div class = "card shadow">
                <div class = "card-header">
                    <div class = "row align-items-center">
                        <div class = "col text-left">
                            <h3 class = "text-primary mt-1">
                                วันที่ 1 มกราคม 2564 เวลา 09:00:00
                            </h3>
                        </div>
                    </div>
                </div>
                <div class = "card-body text-danger">
                    <div class = "row align-items-center">
                        <div class = "col-12">
                            <div class = "row m-1">
                                <div class = "col-6 text-left">
                                    <span class = "font-weight-bold">ถอนรายได้</span>
                                </div>
                                <div class = "col-6 ml-auto text-right">
                                    <span class = "font-weight-bold">20 บาท</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>

        



    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <span class = "text-dark">หน้าหลัก</span>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="trophy-outline"></ion-icon>
                <span class = "text-dark">ผลรางวัล</span>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <!-- <ion-icon name="chatbubble-ellipses-outline"></ion-icon> -->
                <!-- <span class="badge badge-danger">5</span> -->
                <ion-icon name="logo-bitcoin"></ion-icon>
                <span class = "text-dark">แทงหวย</span>
            </div>
        </a>
        <a href="#" class="item">
            <div class="col">
                <ion-icon name="create-outline"></ion-icon>
                <span class = "text-dark">โพยหวย</span>
            </div> 
        </a>
        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
                <span class = "text-dark">เมนู</span>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <!-- <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded"> -->
                        </div>
                        <div class="in">
                            <strong>เบอร์โทร</strong>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    เครดิต
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="people-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    ระบบแนะนำ
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="newspaper-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    ข่าวสาร
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="cash-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    บัญชีธนาคาร
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="key-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    เปลี่ยนรหัสผ่าน
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="information-circle-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    ติดต่อ Admin
                                </div>
                            </a>
                        </li>

                    </ul>

                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    <a href="javascript:;" class="button text-danger">
                        <ion-icon name="log-out-outline"></ion-icon>
                        <span class = "text-danger mx-2" style = "font-size: 14px;">ออกจากระบบ</span>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

    @endsection