@extends('mobile.main_layout.main')
@section('content')
  

     <!-- App Header -->
     <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">หน้าหลัก</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="m-2">
            <div class = "row align-items-center">
                
                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="download-outline" class = "text-success" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">ฝากเงิน</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="share-outline" class = "text-danger" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">ถอนเงิน</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="grid-outline" class = "" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">แทงหวย</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="card-outline" class = "" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">เครดิต</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="people-outline" class = "" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">การแนะนำ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="newspaper-outline" class = "" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">ข่าวสาร</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="cash-outline" class = "" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">บัญชีธนาคาร</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="key-outline" class = "" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">เปลี่ยนรหัสผ่าน</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "col-sm-12 col-md-6 col-lg-4 col-xl-3">
                    <div class = "m-1">
                        <div class = "card shadow custom_hover">
                            <div class = "card-body">
                                <div class = "row align-items-center text-center">
                                    <div class = "col-12"><ion-icon name="information-circle-outline" class = "" style = "font-size: 36px;"></ion-icon></div>
                                    <div class = "col-12">ติดต่อ Admin</div>
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

    <!-- Modal -->
    <input type="button" style = "display: none;" id = "button_popup_1" class="btn btn-secondary" data-toggle="modal" data-target="#DialogIconedInfo" value = "Info">
    <div class="modal fade dialogbox" id="DialogIconedInfo" data-backdrop="static" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- <div class="modal-icon">
                    <ion-icon name="bluetooth-outline" role="img" class="md hydrated" aria-label="bluetooth outline"></ion-icon>
                </div> -->
                <div class="modal-header">
                    <h5 class="modal-title">หัวข้อข่าว</h5>
                </div>
                <div class="modal-body">
                    เนื้อหาข่าว
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn" data-dismiss="modal">ปิด</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection