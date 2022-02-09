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
        <div class="pageTitle">แทงหวยไทย</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- 
        <div class="m-2">
            <div class = "section m-1">
                <h3 class = ""></h3>
            </div>
        </div> 
        -->
        
        <div class="m-2">

            <form action = "#">
                <div class = "card shadow">
                    <div class = "card-header">
                        <div class = "row align-items-center">
                            <div class = "col text-left">
                                <div class = "row align-items-center">
                                    <!-- <img src = "assets/custom_assets/icons/yeekee.jpg" class = "rounded-circle" style = "width: 5%;"> -->
                                    <h3 class = "text-primary mt-1 ml-1 mr-auto">
                                        กรุณาเลือกตัวเลขที่ต้องการและรายละเอียดรูปแบบตัวเลข
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class = "card-body">
                        
                        <div class = "row align-items-center">

                            <div class = "col-sm-6 col-md-3 col-lg-3 col-xl-3 text-left">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <div class = "m-1">
                                        <span>3 ตัวบน : </span>
                                    </div>
                                    <div class="custom-control custom-switch m-1 ml-0 pl-0">
                                        <input type="checkbox" class="custom-control-input" id="switch_1">
                                        <label class="custom-control-label" for="switch_1"></label>
                                    </div>
                                </div>
                            </div>


                            <div class = "col-sm-6 col-md-3 col-lg-3 col-xl-3 text-left">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <div class = "m-1">
                                        <span>3 ตัวโต๊ด : </span>
                                    </div>
                                    <div class="custom-control custom-switch m-1 ml-0 pl-0">
                                        <input type="checkbox" class="custom-control-input" id="switch_2">
                                        <label class="custom-control-label" for="switch_2"></label>
                                    </div>
                                </div>
                            </div>

                            <div class = "col-sm-6 col-md-3 col-lg-3 col-xl-3 text-left">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <div class = "m-1">
                                        <span>3 ตัวกลับ : </span>
                                    </div>
                                    <div class="custom-control custom-switch m-1 ml-0 pl-0">
                                        <input type="checkbox" class="custom-control-input" id="switch_3">
                                        <label class="custom-control-label" for="switch_3"></label>
                                    </div>
                                </div>
                            </div>


                            <div class = "col-sm-6 col-md-3 col-lg-3 col-xl-3 text-left">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <div class = "m-1">
                                        <span>3 ตัวหน้า : </span>
                                    </div>
                                    <div class="custom-control custom-switch m-1 ml-0 pl-0">
                                        <input type="checkbox" class="custom-control-input" id="switch_4">
                                        <label class="custom-control-label" for="switch_4"></label>
                                    </div>
                                </div>
                            </div>

                            <div class = "col-sm-6 col-md-3 col-lg-3 col-xl-3 text-left">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <div class = "m-1">
                                        <span>3 ตัวหลัง : </span>
                                    </div>
                                    <div class="custom-control custom-switch m-1 ml-0 pl-0">
                                        <input type="checkbox" class="custom-control-input" id="switch_5">
                                        <label class="custom-control-label" for="switch_5"></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class = "row align-items-center justify-content-center">

                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#100">1XX</a>
                                </div>
                            </div>
                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#200">2XX</a>
                                </div>
                            </div>
                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#300">3XX</a>
                                </div>
                            </div>
                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#400">4XX</a>
                                </div>
                            </div>
                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#500">5XX</a>
                                </div>
                            </div>
                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#600">6XX</a>
                                </div>
                            </div>
                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#700">7XX</a>
                                </div>
                            </div>
                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#800">8XX</a>
                                </div>
                            </div>
                            <div class = "col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                <div class = "row m-1 align-items-center justify-content-center"> 
                                    <a type = "button" class = "btn btn-primary" href="#900">9XX</a>
                                </div>
                            </div>
                            

                        </div>

                        <div class = "row align-items-center">

                            <div class = "col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <!-- <div class = "row m-1 align-items-center"> -->
                                    <?php
                                        for ($i = 100; $i <= 999; $i++)
                                        {
                                            $number = $i <= 9 ? "0".$i : $i;
                                            if ($i%10 == 0)
                                            {
                                    ?>
                                            <div class = "row m-1 align-items-center" id = "<?=$i?>">
                                                <div class = "col-sm-0 col-md-1 col-lg-1 col-xl-1"></div>
                                    <?php
                                            }
                                    ?>
                                                <div class = "col-sm-2 col-md-1 col-lg-1 col-xl-1 text-center">
                                                    <input type = "button" class = "btn btn-primary btn-block m-1"  value = "<?=$number?>">
                                                </div>
                                    <?php
                                            if ($i%10 == 9)
                                            {
                                    ?>
                                                <div class = "col-sm-0 col-md-1 col-lg-1 col-xl-1 mb-5"></div>
                                            </div>
                                    <?php
                                            }

                                            if (($i > 100) && ($i%100 == 99))
                                            {
                                                echo "<div class = 'my-5'></div>";
                                            }
                                        }
                                    ?>
                                <!-- </div> -->
                            </div>

                        </div>


                        <div class = "row align-items-center">

                            <div class = "col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class = "row m-1 align-items-center">
                                    <div class = "col-8 offset-2 text-center">
                                        <input type = "button" class = "btn btn-success btn-block" value = "แทง">
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </form>

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