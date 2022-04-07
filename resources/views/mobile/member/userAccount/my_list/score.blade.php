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
    <div class=" px-2 py-3 pb-0 border-top border-bottom text-right">
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
        <div class="rating col-9 mt-2 mr-2">
            <i class="rating__star far fa-star"></i>
            <i class="rating__star far fa-star"></i>
            <i class="rating__star far fa-star"></i>
            <i class="rating__star far fa-star"></i>
            <i class="rating__star far fa-star"></i>
        </div>
    </div>

    <form action="" method="post">
    @csrf

        <div class="col-12 row justify-content-around m-0 p-2">
            <div class="custom-file-upload " style="width:75px;height:75px; color:;">
                <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput">
                    <span>
                        <i class="font-weight-bold fs-11px">รูปภาพ</i>
                        <i class="fal fa-plus-circle fs-1_5rem"></i>
                    </span>
                </label>
            </div>
            <div class="custom-file-upload " style="width:75px;height:75px; color:;">
                <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput">
                    <span>
                        <i class="font-weight-bold fs-11px">รูปภาพ</i>
                        <i class="fal fa-plus-circle fs-1_5rem"></i>
                    </span>
                </label>
            </div>
            <div class="custom-file-upload " style="width:75px;height:75px; color:;">
                <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput">
                    <span>
                        <i class="font-weight-bold fs-11px">รูปภาพ</i>
                        <i class="fal fa-plus-circle fs-1_5rem"></i>
                    </span>
                </label>
            </div>
            <div class="custom-file-upload " style="width:75px;height:75px; color:;">
                <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput">
                    <span>
                        <i class="font-weight-bold fs-11px">รูปภาพ</i>
                        <i class="fal fa-plus-circle fs-1_5rem"></i>
                    </span>
                </label>
            </div>
        </div>
        <div class="col-12 px-3">
            <div  class="card col-12 m-0 p-1 pb-0">
                
                <textarea class="input-phd form-control" type="text" style="border:none; height:92px;" placeholder="ใส่ข้อความของคุณ"></textarea>


                <div class="border-top row justify-content-end align-items-center" style="height:46px;">
                    <a href="">
                        <img src="{{ asset('new_assets/img/icon/happy.svg')}}" alt="alt" style="width: 30px; height: 30px; ">
                    </a>
                    <button type="submit" class="btn btn-success btn-sm font-weight-bold mx-2 mr-2 " style="font-size: 14px; border-radius: 8px; height:22px;">Post</button>
                </div>
            </div>
        </div>
    </form>











</div>
@endsection

@section('custom_script')
<script>

    bottom_now(7);

    const ratingStars = [...document.getElementsByClassName("rating__star")];

    function executeRating(stars) {
        const starClassActive = "rating__star fas fa-star";
        const starClassInactive = "rating__star far fa-star";
        const starsLength = stars.length;
        let i;
        stars.map((star) => {
            star.onclick = () => {
                i = stars.indexOf(star);

                if (star.className === starClassInactive) {
                    for (i; i >= 0; --i) stars[i].className = starClassActive;
                } else {
                    for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
                }
            };
        });
    }
    executeRating(ratingStars);
</script>
@endsection