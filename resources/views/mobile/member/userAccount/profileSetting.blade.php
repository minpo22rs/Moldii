
@extends('mobile.main_layout.main')
    @section('app_header')
    <div class="appHeader bg-danger text-light">
        <div class="left">
                <ion-icon name="arrow-back-outline"  onclick = "window.history.back();"></ion-icon>
        </div>
        <div class="pageTitle">
            ตั้งค่าบัญชี
        </div>
    </div>
    @endsection
    @section('content') 
        <div>
            <div class = "col-12 text-center">
                <img src = "{{asset('original_assets/img/material_icons/woman.png')}}" class = "rounded-circle mt-5"  width = "25%" height = "auto"><br>
                <span class = "font-weight-bold"><h3 class = "mb-0"><?php //$my_name ?></h3></span>
            </div>
        </div>

        <div class = "row my-2 mb-3">
            <div class = "col-6 pr-0">
                <div class = "m-1">
                    <div class = "card">
                        <div class = "row w-100 mx-3 my-2 text-center">
                            <img src = "{{asset('original_assets/index_category_icon/wallet-filled-money-tool_blue_blue.svg')}}" width = "15%">
                            <span class = "ml-2"><?php //number_format($available_cash) ?> ฿</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "col-6 pl-0">
                <div class = "m-1">
                    <div class = "card">
                        <div class = "row w-100 mx-3 my-2 text-center">
                            <img src = "{{asset('original_assets/index_category_icon/coin_dark_blue.svg')}}" width = "15%">
                            <span class = "ml-2"><?php //number_format($available_point) ?> คะแนน</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class = "row my-2 border-top">
            <div class = "col-8 mx-0">
                <div class = "mx-2 my-1 ml-2">รายการของฉัน</div>
            </div>
            <div class = "col-4 mx-0 text-right">
                <div class = "mx-2 my-1 ml-2 mr-2"><img src = "{{asset('original_assets/materials/right-arrow.png')}}" width = "10%" height = "auto"></div>
            </div>
        </div>

        <div class = "row my-2 border-top">
            <div class = "col-8 mx-0">
                <div class = "mx-2 my-1 ml-2">สิ่งที่ถูกใจ</div>
            </div>
            <div class = "col-4 mx-0 text-right">
                <div class = "mx-2 my-1 ml-2 mr-2"><img src = "{{asset('original_assets/materials/right-arrow.png')}}" width = "10%" height = "auto"></div>
            </div>
        </div>

        <div class = "row my-2 border-top">
            <div class = "col-8 mx-0">
                <div class = "mx-2 my-1 ml-2">การชำระเงิน</div>
            </div>
            <div class = "col-4 mx-0 text-right">
                <div class = "mx-2 my-1 ml-2 mr-2"><img src = "{{asset('original_assets/materials/right-arrow.png')}}" width = "10%" height = "auto"></div>
            </div>
        </div>

        <div class = "row my-2 border-top">
            <div class = "col-8 mx-0">
                <div class = "mx-2 my-1 ml-2">ข้อมูลส่วนตัว</div>
            </div>
            <div class = "col-4 mx-0 text-right">
                <div class = "mx-2 my-1 ml-2 mr-2"><img src = "{{asset('original_assets/materials/right-arrow.png')}}" width = "10%" height = "auto"></div>
            </div>
        </div>

        <div class = "row my-2  border-top">
            <div class = "col-8 mx-0">
                <div class = "mx-2 my-1 ml-2">การตั้งค่า</div>
            </div>
            <div class = "col-4 mx-0 text-right">
                <div class = "mx-2 my-1 ml-2 mr-2"><img src = "{{asset('original_assets/materials/right-arrow.png')}}" width = "10%" height = "auto"></div>
            </div>
        </div>

        <div class = "row my-2  border-top border-bottom text-danger">
            <div class = "col-12 mx-0">
                <div class = "mx-2 my-2 ml-2" onclick = "window.location.replace('../logout.php');">ออกจากระบบ</div>
            </div>
        </div>
    @endsection

    @section('custom_script')
        <script>
                bottom_now(4);
        </script>
    @endsection