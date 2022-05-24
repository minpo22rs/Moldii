@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('/index')}}');">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">

    </div>
    <div class="right"></div>
    <!-- <div class="m-1 w-100">

            <div class="row" >
            <div class="col-10">
                <form class="search-form">
                    <div class="form-group searchbox mt-1 mb-0">
                        <input type="text" class="form-control" id="input_search_1" placeholder="Search...">
                        <i class="input-icon">
                            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                        </i>
                    </div>
                </form>
            </div>
            <div class="col-2">
                <ion-icon id="btn_search_2" style="cursor: pointer;"name="funnel" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline">
                </ion-icon>
            </div>
        </div>
            
        </div> -->
</div>
@endsection

@section('content')
<div class="m-1">
    <ul class="col-12 row justify-content-around m-0 p-1 cate-container">
        <li class="mx-1 text-center category-shopping active">
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
        @foreach($product as $products)
            <?php $detail = DB::Table('tb_order_details')->where('product_id',$products->product_id)->get()?>

            <a href="{{url('shopping/product/'.$products->product_id.'')}}" style="width: 50%;">
                <div class=" card  my-2 mx-2 align-self-center justify-content-center border-product">
                    <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$products->product_img.'')}}" alt="alt" style=" height:120px;">
                    <div class="card-body col-12 p-1 ">
                        <div class="row pl-1">
                            <h5 class=" font-weight-bolder m-0">{{$products->product_name}}</h5>
                        </div>
                        <div class=" row ">
                            @if($products->product_discount!=null)
                                <div class="row col-7">
                                    <h6 class="mt-1 pl-1 m-0 "><s>฿{{$products->product_price}}</s></h6>
                                    <h6 class="mt-1 pl-1 m-0  font-weight-bold" style="color:#E81F12;">฿{{$products->product_discount}}</h6>

                                </div>
                            @else
                                <div class="row col-7">
                                    <h6 class="mt-1 pl-1 m-0 ">฿{{$products->product_price}}</h6>

                                </div>
                            @endif
                            <div class="pl-2">
                                <h6 class="m-0"><small>ขายได้ {{$detail->count()}} ชิ้น</small></h6>
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
        
        @endforeach
    </div>
</div>
@endsection
@section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
        }

       
   
        bottom_now(1);
    </script>
@endsection