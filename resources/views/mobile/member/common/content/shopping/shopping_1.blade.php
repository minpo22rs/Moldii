@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('user/ThaiLotto/selectMethod')}}');">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">

    </div>
    <div class="right"></div>
    <!-- <div class="m-1 w-100">

            <div class = "row">
                <div class = "col-10">
                    <form class="search-form">
                        <div class="form-group searchbox mt-1 mb-0">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="input-icon">
                                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                            </i>
                        </div>
                    </form>
                </div>
                <div class = "col-2">
                    <ion-icon   name="funnel"  
                                class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5"  
                                
                                role="img" aria-label="search outline">
                    </ion-icon>
                </div>
            </div>
            
        </div> -->
</div>
@endsection

@section('content')
<div class="m-1">
    <ul class="col-12 row justify-content-around m-0 p-1 cate-container">
        <li class="mx-1 text-center category-shopping {{Request::is('#')?'active':''}}">
            <h3 class="m-0 p-1"><a href="{{url('#')}} " class="">เกี่ยวข้อง</a></h3>
        </li>
        <li class="mx-1 text-center category-shopping {{Request::is('#')?'active':''}}">
            <h3 class="m-0 p-1"><a href="{{url('#')}} ">ล่าสุด</a></h3>
        </li>
        <li class="mx-1 text-center category-shopping {{Request::is('#')?'active':''}}">
            <h3 class="m-0 p-1"><a href="{{url('#')}} ">สินค้าขายดี</a></h3>
        </li>
        <li class="mx-1 text-center category-shopping {{Request::is('#')?'active':''}}">
            <h3 class="m-0 p-1"><a href="{{url('#')}} ">ราคา</a></h3>
        </li>
    </ul>


    <div class="col-12 row m-0 justify-content-center ">
        <a href="{{route('shopping_2')}}">
            <div class=" card  my-2 mx-2 align-self-center justify-content-center border-product">
                <img class="imaged w-100 card-image-top mt-1" src="{{ asset('new_assets/img/Rectangle_65.png')}}" alt="alt" style=" height:120px;">
                <div class="card-body col-12 p-1 ">
                    <div class="row pl-1">
                        <h5 class=" font-weight-bolder m-0">ชื่อสินค้า</h5>
                    </div>
                    <div class=" row ">
                        <div class="row col-7">
                            <h6 class="mt-1 pl-1 m-0 "><s>฿350</s></h6>
                            <h6 class="mt-1  m-0  font-weight-bold" style="color:#E81F12;">฿250</h6>

                        </div>
                        <div class="pl-2">
                            <h6 class="m-0"><small>ขายได้ 100 ชิ้น</small></h6>
                            <div class="rating-system2">

                                <input type="radio" name='rate2' id="star5_2" />
                                <label for="star5_2"></label>

                                <input type="radio" name='rate2' id="star4_2" />
                                <label for="star4_2"></label>

                                <input type="radio" name='rate2' id="star3_2" />
                                <label for="star3_2"></label>

                                <input type="radio" name='rate2' id="star2_2" />
                                <label for="star2_2"></label>

                                <input type="radio" name='rate2' id="star1_2" />
                                <label for="star1_2"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{route('shopping_2')}}">
            <div class=" card  my-2 mx-2 align-self-center justify-content-center border-product">
                <img class="imaged w-100 card-image-top mt-1" src="{{ asset('new_assets/img/Rectangle_65.png')}}" alt="alt" style=" height:120px;">
                <div class="card-body col-12 p-1 ">
                    <div class="row pl-1">
                        <h5 class=" font-weight-bolder m-0">ชื่อสินค้า</h5>
                    </div>
                    <div class=" row ">
                        <div class="row col-7">
                            <h6 class="mt-1 pl-1 m-0 "><s>฿350</s></h6>
                            <h6 class="mt-1  m-0  font-weight-bold" style="color:#E81F12;">฿250</h6>

                        </div>
                        <div class="pl-2">
                            <h6 class="m-0"><small>ขายได้ 100 ชิ้น</small></h6>
                            <div class="rating-system2">

                                <input type="radio" name='rate2' id="star5_2" />
                                <label for="star5_2"></label>

                                <input type="radio" name='rate2' id="star4_2" />
                                <label for="star4_2"></label>

                                <input type="radio" name='rate2' id="star3_2" />
                                <label for="star3_2"></label>

                                <input type="radio" name='rate2' id="star2_2" />
                                <label for="star2_2"></label>

                                <input type="radio" name='rate2' id="star1_2" />
                                <label for="star1_2"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>


    </div>
</div>
@endsection