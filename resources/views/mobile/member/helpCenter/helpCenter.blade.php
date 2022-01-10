
@extends('mobile.main_layout.main')
    @section('app_header')
    <div class="appHeader bg-danger text-light">
        <div class="left">
                <ion-icon name="arrow-back-outline"  onclick = "window.history.back();"></ion-icon>
        </div>
        <div class="pageTitle">
            ศูนย์ความช่วยเหลือ
        </div>
    </div>
    @endsection
    @section('content') 
        <div>
            <div class = "row align-items-center">
                <div class = "col-6 text-center">
                    <img src = "{{asset('original_assets/img/material_icons/woman.png')}}" class = "rounded-circle mt-5 mb-3"  width = "25%" height = "auto"><br>
                    <!-- <span class = "font-weight-bold"><h3 class = "mb-0"><?php //$my_name ?></h3></span> -->
                    <span class = "font-weight-bold"><h3 class = "mb-0">Facebook: </h3></span>
                </div>
                <div class = "col-6 text-center">
                    <img src = "{{asset('original_assets/img/material_icons/woman.png')}}" class = "rounded-circle mt-5 mb-3"  width = "25%" height = "auto"><br>
                    <!-- <span class = "font-weight-bold"><h3 class = "mb-0"><?php //$my_name ?></h3></span> -->
                    <span class = "font-weight-bold"><h3 class = "mb-0">Line: </h3></span>
                </div>
            </div>
        </div>

        
        <div class = "row my-4 ">
            <div class = "col-12 mx-0">
                <div class = "mx-2 my-1 ml-2">หมายเลขโทรศัพท์: </div>
            </div>
            <div class = "col-12 mx-0">
                <div class = "mx-2 my-1 ml-2">อีเมล: </div>
            </div>
        </div>

        <div class = "row my-2 border-top">
            <div class = "col-8 mx-0">
                <div class = "mx-2 my-1 ml-2">คำถามที่พบบ่อย</div>
            </div>
            <div class = "col-4 mx-0 text-right">
                <div class = "mx-2 my-1 ml-2 mr-2"><img src = "{{asset('original_assets/materials/right-arrow.png')}}" width = "10%" height = "auto"></div>
            </div>
        </div>

        <div class = "row my-2 border-top">
            <div class = "col-8 mx-0">
                <div class = "mx-2 my-1 ml-2">ให้คะแนนแอป</div>
            </div>
            <div class = "col-4 mx-0 text-right">
                <div class = "mx-2 my-1 ml-2 mr-2"><img src = "{{asset('original_assets/materials/right-arrow.png')}}" width = "10%" height = "auto"></div>
            </div>
        </div>

        <div class = "row my-2 border-top border-bottom ">
            <div class = "col-8 mx-0">
                <div class = "mx-2 my-1 ml-2">ข้อตกลงและเงื่อนไข</div>
            </div>
            <div class = "col-4 mx-0 text-right">
                <div class = "mx-2 my-1 ml-2 mr-2"><img src = "{{asset('original_assets/materials/right-arrow.png')}}" width = "10%" height = "auto"></div>
            </div>
        </div>
        
    @endsection

    @section('custom_script')
        <script>
                bottom_now(4);
        </script>
    @endsection