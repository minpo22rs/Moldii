<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" /> --}}

    <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=yes">

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="mobile-web-app-capable" content="yes">


    <meta name="theme-color" content="#000000">
    <title>Moldii</title>
    <meta name="title" content="Moldii รวมของเล่น ของสะสมไว้ในที่นี่ที่เดียว">
    <meta name="description" content="Moldii">
    <meta name="keywords" content="Moldii" />
    <meta property="og:image" content="https://modii.sapapps.work/new_assets/img/logo_icon/Moldii Logo 192x192.png.png">
    <link rel="icon" type="image/png" href="{{ asset('/new_assets/img/logo_icon/Moldii Logo 512x512.png') }}" sizes="512x512">

    <link rel="apple-touch-icon" sizes="192x192" href="{{ asset('/new_assets/img/logo_icon/Moldii Logo 192x192.png') }}">
    
    <link rel="apple-touch-startup-image" href="https://modii.sapapps.work/new_assets/img/logo_icon/Moldii Logo 192x192.png.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" />
    <link rel="apple-touch-startup-image" href="https://modii.sapapps.work/new_assets/img/logo_icon/Moldii Logo 192x192.png.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" />
    <link rel="apple-touch-startup-image" href="https://modii.sapapps.work/new_assets/img/logo_icon/Moldii Logo 192x192.png.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" />
    <link rel="apple-touch-startup-image" href="https://modii.sapapps.work/new_assets/img/logo_icon/Moldii Logo 192x192.png.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" />
    <link rel="apple-touch-startup-image" href="https://modii.sapapps.work/new_assets/img/logo_icon/Moldii Logo 192x192.png.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" />
    <link rel="apple-touch-startup-image" href="https://modii.sapapps.work/new_assets/img/logo_icon/Moldii Logo 192x192.png.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" />
    <link rel="apple-touch-startup-image" href="https://modii.sapapps.work/new_assets/img/logo_icon/Moldii Logo 192x192.png.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" />

    <link rel="stylesheet" href="{{ asset('/new_assets/css/style.css') }}">
    <link rel="manifest" href="{{ asset('/new_assets/custom_assets/__manifest.json') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    

</head>

<body class="bg-white">

    <!-- loader -->
    <!-- <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div> -->
    <!-- * loader -->

    <!-- App Header -->
    @yield('app_header')
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('content')
    </div>
    <!-- * App Capsule -->



    @yield('choices')
    <!-- App Bottom Menu -->
    <div class="appBottomMenu bg-danger px-0">
        @yield('choice')


        @yield('numpad')
        <a href="{{url('/index')}}" class="item" id="bottom_button_home">
            <div class="col" >
                <div style="padding-bottom: 5px "><img src="{{ asset('new_assets/icon/หน้าหลัก.png')}}" id="bottom_icon_home"></div>
                <span class="text-white " id="bottom_text_home">หน้าหลัก</span>
            </div>
        </a>
        <a href="{{url('video')}}" class="item" id="bottom_button_yt">
            <div class="col">
                <div style="padding: 8px 0px 8px 0px"><img src="{{ asset('new_assets/icon/คลิป.png')}}" id="bottom_icon_yt"></div> 
                <span class="text-white" id="bottom_text_yt">คลิป</span>
            </div>
        </a>
       
        {{-- <a href="{{url('cartindex')}}" class="item" id="bottom_button_bk">
            
            <div class="col ">
                <span style="background-color: #34C759 ; color: #fff ;  padding: 2px 5px 2px 5px ; border-radius: 25px ; position: relative; left: 15px ; top: 5px ;">{{$sql->countt}}</span>
                <ion-icon name="cart" class="text-white md hydrated" id="bottom_icon_bk"></ion-icon>
                <span class="text-white" id="bottom_text_bk">ตะกร้า</span>
            </div>
        </a> --}}
        <a href="{{url('group')}}" class="item" id="bottom_button_fam">
            <div class="col">
                <div style="padding: 2px 0px 3px 0px"><img src="{{ asset('new_assets/icon/กลุ่ม.png')}}" id="bottom_icon_fam"></div> 
                <span class="text-white" id="bottom_text_fam">กลุ่ม</span>
            </div>
        </a>
        <a href="{{url('auction')}}" class="item" id="bottom_button_noti">
            <div class="col">
                <div style="padding: 2px 0px 3px 0px"><img src="{{ asset('new_assets/icon/ประมูลสินค้า.png')}}" id="bottom_icon_noti"></div> 
                <span class="text-white" id="bottom_text_noti">ประมูลสินค้า</span>
            </div>
        </a>
        <a href="{{url('store')}}" class="item" id="bottom_button_s">
            <div class="col">
            <div style="padding: 1px 0px 3px 0px"><img src="{{ asset('new_assets/icon/ร้านค้า.png')}}" id="bottom_icon_s"></div> 
                <span class="text-white" id="bottom_text_s">ร้านค้า</span>
            </div>
        </a>
        <a href="{{url('user/myAccount')}}" class="item" id="bottom_button_acc">
            <div class="col">
                <div style="padding: 1px 0px 3px 0px"><img src="{{ asset('new_assets/icon/โปรไฟล์.png')}}" id="bottom_icon_acc"></div> 
                <span class="text-white" id="bottom_text_acc">โปรไฟล์</span>
            </div>
        </a>
        <!--  <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
                <span class = "text-dark">เมนู</span>
            </div>
        </a> -->
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
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal" id="button_close_sidebar">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="{{url('user/credit')}}" class="item">
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
                            <a href="{{url('user/news')}}" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="newspaper-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    ข่าวสาร
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('user/myBankAcc')}}" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="cash-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    บัญชีธนาคาร
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('user/formSetNewPassword')}}" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="key-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    เปลี่ยนรหัสผ่าน
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('user/contactUs')}}" class="item">
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
                    <a href="javascript:;" class="button text-danger" data-toggle="modal" data-target="#DialogLogout" onclick="document.getElementById('button_close_sidebar').click();">
                        <ion-icon name="log-out-outline"></ion-icon>
                        <span class="text-danger mx-2" style="font-size: 14px;">ออกจากระบบ</span>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>

    <!-- * App Sidebar -->

    <!-- Modal -->
    <input type="button" style="display: none;" id="button_logout_trigger" class="btn btn-secondary" data-toggle="modal" data-target="#DialogLogout" value="Info">
    <div class="modal fade dialogbox" id="DialogLogout" data-backdrop="static" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-icon">
                    <ion-icon name="log-out-outline" role="img" class="md hydrated text-danger" aria-label="bluetooth outline"></ion-icon>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">คำเตือน</h5>
                </div>
                <div class="modal-body">
                    คุณต้องการออกจากระบบหรือไม่
                </div>
                <div class="modal-footer bg-danger">
                    <div class="btn-inline">
                        <a href="{{url('user/logout')}}" class="btn text-white">ออกจากระบบ</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn" data-dismiss="modal">ปิด</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('custom_modal')

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="{{ asset('new_assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('new_assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('new_assets/js/lib/bootstrap.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('new_assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- jQuery Circle Progress -->
    <script src="{{ asset('new_assets/js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('new_assets/js/base.js') }}"></script>
    <!--reCAPTCHA v3-->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <!-- QR Code -->
    <script src="{{ asset('new_assets/js/lib/qrcode.min.js') }}"></script>
    <!-- fontawesom -->
    <!-- <script src="https://kit.fontawesome.com/6a1519527e.js" crossorigin="anonymous"></script> -->
    <script src="{{ asset('new_assets/js/script.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function triggered() {
            alert('triggered');
        }


        function bottom_now(position) {
            document.getElementById('bottom_button_home').className = 'item';
            document.getElementById('bottom_icon_home').className = 'text-white md hydrated';
            // document.getElementById('bottom_text_home').className = 'text-white';
            
            

            // document.getElementById('bottom_button_bk').className = 'item';
            // document.getElementById('bottom_icon_bk').className = 'text-white md hydrated';
            // document.getElementById('bottom_text_bk').className = 'text-white';

            document.getElementById('bottom_button_noti').className = 'item';
            document.getElementById('bottom_icon_noti').className = 'text-white md hydrated';
            // document.getElementById('bottom_text_noti').className = 'text-white';

            document.getElementById('bottom_button_acc').className = 'item';
            document.getElementById('bottom_icon_acc').className = 'text-white md hydrated';
            // document.getElementById('bottom_text_acc').className = 'text-white';

            document.getElementById('bottom_button_s').className = 'item';
            document.getElementById('bottom_icon_s').className = 'text-white md hydrated';
            // document.getElementById('bottom_text_s').className = 'text-white';

            document.getElementById('bottom_button_yt').className = 'item';
            document.getElementById('bottom_icon_yt').className = 'text-white md hydrated';
            // document.getElementById('bottom_text_yt').className = 'text-white';

            document.getElementById('bottom_button_fam').className = 'item';
            document.getElementById('bottom_icon_fam').className = 'text-white md hydrated';
            // document.getElementById('bottom_text_fam').className = 'text-white';

            if (Number(position) == 1) {
                document.getElementById('bottom_button_home').className = 'item p-1';
                document.getElementById('bottom_icon_home').className = 'text-dark md hydrated';
                // document.getElementById('bottom_text_home').className = 'text-dark';
                document.getElementById('bottom_button_home').style.backgroundColor = '#4f5050';

            } else if (Number(position) == 2) {
                document.getElementById('bottom_button_yt').className = 'item p-1';
                document.getElementById('bottom_icon_yt').className = 'text-dark md hydrated';
                // document.getElementById('bottom_text_yt').className = 'text-dark';
                document.getElementById('bottom_button_yt').style.backgroundColor = '#4f5050';
            // } else if (Number(position) == 3) {
            //     document.getElementById('bottom_button_bk').className = 'item bg-white p-1';
            //     document.getElementById('bottom_icon_bk').className = 'text-dark md hydrated';
            //     document.getElementById('bottom_text_bk').className = 'text-dark';
            } else if (Number(position) == 4) {
                document.getElementById('bottom_button_fam').className = 'item p-1';
                document.getElementById('bottom_icon_fam').className = 'text-dark md hydrated';
                // document.getElementById('bottom_text_fam').className = 'text-dark';
                document.getElementById('bottom_button_fam').style.backgroundColor = '#4f5050';
            }else if(Number(position) == 5){
                document.getElementById('bottom_button_noti').className = 'item p-1';
                document.getElementById('bottom_icon_noti').className = 'text-dark md hydrated';
                // document.getElementById('bottom_text_noti').className = 'text-dark';
                document.getElementById('bottom_button_noti').style.backgroundColor = '#4f5050';
            }
            else if(Number(position) == 6){
                document.getElementById('bottom_button_s').className = 'item p-1';
                document.getElementById('bottom_icon_s').className = 'text-dark md hydrated';
                // document.getElementById('bottom_text_s').className = 'text-dark';
                document.getElementById('bottom_button_s').style.backgroundColor = '#4f5050';
            }
            else if(Number(position) == 7){
                document.getElementById('bottom_button_acc').className = 'item p-1';
                document.getElementById('bottom_icon_acc').className = 'text-dark md hydrated';
                // document.getElementById('bottom_text_acc').className = 'text-dark';
                document.getElementById('bottom_button_acc').style.backgroundColor = '#4f5050';
            }
        }

       
    </script>
    @yield('custom_script')
</body>

</html>