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
                <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$sql->product_img.'')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
            </div>
            <div class="col-10 row align-self-center justify-content-between pl-2">
                <div class="col-4 p-0 text-left">
                    <h5 class="m-0">{{$sql->merchant_name}}</h5>
                    <h5 class="m-0">X{{$sql->amount}}</h5>
                    <h5 class="m-0">{{$sql->price*$sql->amount}}</h5>
                </div>
                <div class="col-6 p-0 text-right">
                    <h5 class="m-0  text-right">{{date('d/m/Y',strtotime($sql->created_at))}}</h5>
                    <h5 class="m-0  text-right">{{date('H:i',strtotime($sql->created_at))}}</h5>
                    <h5 class="m-0  text-right" style="color:rgba(45, 176, 67, 1);" >ได้รับสินค้าเรียบร้อยแล้ว</h5>
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

    <form action="{{url('user/sendscore')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$sql->id_order_detail}}">
        <input type="hidden" name="pid" value="{{$sql->product_id}}">
        <input type="hidden" name="star" value="" id="starid">
        <div class="col-12 row justify-content-around m-0 p-2">
            <div class="custom-file-upload " style="width:75px;height:75px; color:;">
                <input type="file" name="imgs[0]" id="fileuploadInput1" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput1">
                    <span>
                        <i class="font-weight-bold fs-11px">รูปภาพ</i>
                        <i class="fal fa-plus-circle fs-1_5rem"></i>
                    </span>
                </label>
            </div>
            <div class="custom-file-upload " style="width:75px;height:75px; color:;">
                <input type="file" name="imgs[1]" id="fileuploadInput2" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput2">
                    <span>
                        <i class="font-weight-bold fs-11px">รูปภาพ</i>
                        <i class="fal fa-plus-circle fs-1_5rem"></i>
                    </span>
                </label>
            </div>
            <div class="custom-file-upload " style="width:75px;height:75px; color:;">
                <input type="file" name="imgs[2]" id="fileuploadInput3" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput3">
                    <span>
                        <i class="font-weight-bold fs-11px">รูปภาพ</i>
                        <i class="fal fa-plus-circle fs-1_5rem"></i>
                    </span>
                </label>
            </div>
            <div class="custom-file-upload " style="width:75px;height:75px; color:;">
                <input type="file" name="imgs[3]" id="fileuploadInput4" accept=".png, .jpg, .jpeg">
                <label for="fileuploadInput4">
                    <span>
                        <i class="font-weight-bold fs-11px">รูปภาพ</i>
                        <i class="fal fa-plus-circle fs-1_5rem"></i>
                    </span>
                </label>
            </div>
        </div>
        <div class="col-12 px-3">
            <div  class="card col-12 m-0 p-1 pb-0">
                
                <textarea class="input-phd form-control" type="text" name="text" style="border:none; height:92px;" placeholder="ใส่ข้อความของคุณ"></textarea>


                <div class="border-top row justify-content-end align-items-center" style="height:46px;">
                    {{-- <a href="">
                        <img src="{{ asset('new_assets/img/icon/happy.svg')}}" alt="alt" style="width: 30px; height: 30px; ">
                    </a> --}}
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
                // console.log(i);
                document.getElementById('starid').value=i+1;
                if (star.className === starClassInactive) {
                    for (i; i >= 0; --i) 
                    stars[i].className = starClassActive
                    // console.log('+'+i)
                } else {
                    for (i; i < starsLength; ++i) 
                    stars[i].className = starClassInactive
                    // console.log('-'+i);
                    
                }
            };
        });
    }
    executeRating(ratingStars);
</script>
@endsection