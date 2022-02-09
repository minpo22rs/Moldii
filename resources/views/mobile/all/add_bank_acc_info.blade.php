<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>หวยมังกร</title>
    <meta name="description" content="หวยมังกร">
    <meta name="keywords" content="หวยมังกร" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

     <!-- App Header -->
     <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">เพิ่มข้อมูลบัญชีธนาคาร</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="login-form mt-1">
            <div class="section mt-1">
                <h2>กรุณาใส่ข้อมูลให้ครบถ้วน</h2>
            </div>
            <div class="section mt-1 mb-5">
                <form action="#">

                    <div class="form-group boxed">
                        <div class="input-wrapper text-left">
                            <label class = "font-weight-bold">เลือกบัญชีธนาคาร</label>
                        </div>
                    </div>

                    <div class="form-group boxed"><!-- row 1 -->
                        <div class = "row">
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/scb.png" width = "20%" height = "20%"><br>
                                    <span>ธนาคารไทยพาณิชย์</span>
                                </div>
                            </div>
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/kbank.png" width = "20%" height = "20%"><br>
                                    <span>ธนาคารกสิกรไทย</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group boxed"><!-- row 2 -->
                        <div class = "row">
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/ttb.png" width = "40%" height = "20%"><br>
                                    <span>ธนาคารทหารไทยธนชาติ</span>
                                </div>
                            </div>
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/bay.png" width = "20%" height = "20%"><br>
                                    <span>ธนาคารกรุงศรีอยุธยา</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group boxed"><!-- row 3 -->
                        <div class = "row">
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/ktb.png" width = "20%" height = "20%"><br>
                                    <span>ธนาคารกรุงไทย</span>
                                </div>
                            </div>
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/bualuang.png" width = "20%" height = "20%"><br>
                                    <span>ธนาคารกรุงเทพ</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group boxed"><!-- row 4 -->
                        <div class = "row">
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/uob.png" width = "20%" height = "20%"><br>
                                    <span>ธนาคารยูโอบี</span>
                                </div>
                            </div>
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/gsb_1.png" width = "20%" height = "20%"><br>
                                    <span>ธนาคารออมสิน</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group boxed"><!-- row 5 -->
                    <div class = "row">
                            <div class = "col-6">
                                <div class = "m-1 border rounded">
                                    <img src = "assets/custom_assets/bank_icons/baac.png" width = "20%" height = "20%"><br>
                                    <span>ธนาคาร ธกส.</span>
                                </div>
                            </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper text-left">
                            <label class = "font-weight-bold">ชื่อผู้ใช้บัญชีธนาคาร</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name = "owner_bank_acc_name" id="owner_bank_acc_name" placeholder="ชื่อผู้ใช้บัญชีธนาคาร">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper text-left">
                            <label class = "font-weight-bold">หมายเลขบัญชี</label>
                        </div>
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name = "bank_acc_no" id="bank_acc_no" placeholder="หมายเลขบัญชี" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="button" class="btn btn-primary btn-block" value="บันทึกข้อมูล" >
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                </form>
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

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>
    <!--reCAPTCHA v3-->
    <script src="https://www.google.com/recaptcha/api.js"></script>


</body>

</html>