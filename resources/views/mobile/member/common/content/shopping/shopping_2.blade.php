@extends('mobile.main_layout.main')
@section('app_header')
    <div class="appHeader bg-danger text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{ url('store') }}');">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle text-center">
            {{ $product->product_name }}
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
    <style>
        .preview-img-review {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1150;
            background-color: rgba(0, 0, 0, 0.24);

            align-items: center;
            justify-content: center;
            display: none;

        }

        .preview-img-review img {
            width: 100%;

        }

        .preview-img-review i {
            position: absolute;
            font-size: 1rem;
            top: 10%;
            right: 5%;
            color: rgba(255, 0, 0, 0.911);
        }
    </style>
@endsection

@section('content')
    <br>
    <div class="m-1 shopping-container">
        <div class="section full mt-3 mb-3">
            <div class="carousel-full owl-carousel owl-theme">
                <div class="item">

                    <img src="{{ 'https://testgit.sapapps.work/moldii/storage/app/product_cover/' . $product->product_img . '' }}"
                        alt="alt" class="imaged w-100 square">
                </div>
                @if ($imggal->count() > 0)
                    @foreach ($imggal as $imggals)
                        <div class="item">

                            <img src="{{ 'https://testgit.sapapps.work/moldii/storage/app/product_img/' . $imggals->img_name . '' }}"
                                alt="alt" class="imaged w-100 square">
                        </div>
                    @endforeach
                    {{-- @else
                <div class="item">

                    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$product->product_img.'')}}" alt="alt" class="imaged w-100 square">
                </div> --}}
                @endif


            </div>
        </div>
        <div class="row">
            <div class="row justify-content-between w-100 p-1  mx-2">
                <h3 class="mb-0">{{ $product->product_name }}</h3>
                <div class="row pr-1" style="font-size: 18px;">
                    <ion-icon name="share-outline" id="icon-share" style="color:rgba(177, 176, 176, 1);"></ion-icon>
                    @if ($like != null)
                        <div id="unheart">
                            <i class="fas fa-heart ml-1" style="color:red;"
                                onclick="unheart({{ $product->product_id }});"></i>

                        </div>
                        <div id="addheart" style="display: none">
                            <i class="fas fa-heart ml-1" style="color:rgba(235, 235, 235, 1);"
                                onclick="addheart({{ $product->product_id }});"></i>

                        </div>
                    @else
                        <div id="unheart" style="display: none">
                            <i class="fas fa-heart ml-1" style="color:red;"
                                onclick="unheart({{ $product->product_id }});"></i>

                        </div>
                        <div id="addheart">
                            <i class="fas fa-heart ml-1" style="color:rgba(235, 235, 235, 1);"
                                onclick="addheart({{ $product->product_id }});"></i>

                        </div>
                    @endif


                    {{-- <i class="fas fa-heart ml-1" style="color:rgba(235, 235, 235, 1);" id="heart" onclick="heart();"></i> --}}
                </div>
            </div>
            <div class="row justify-content-between w-100 px-2 mx-2">
                @if ($product->product_discount != null)
                    <h4 class="mb-0 font-weight-bold" style="color:#E81F12;">฿{{ $product->product_discount }}</h4>
                @else
                    <h5 class="mb-0 font-weight-bold" style="color:rgba(180, 182, 186, 1);">฿{{ $product->product_price }}
                    </h5>
                @endif
                <div class="row pr-1 align-self-center" style="font-size: 18px;">

                    <div class="rating-system2">
                        <i class="fas fa-star " style="color: #F1F437"></i>
                        <i class="fas fa-star " style="color: #F1F437"></i>
                        <i class="fas fa-star " style="color: #F1F437"></i>
                        <i class="fas fa-star " style="color: #F1F437"></i>
                        <i class="fas fa-star " style="color: #F1F437"></i>


                        {{-- <input type="radio" name='rate2' id="star5_2" />
                    <label for="star5_2" class="ml-1" style="width:10px; height:10px;"></label>

                    <input type="radio" name='rate2' id="star4_2" />
                    <label for="star4_2" class="ml-1" style="width:10px; height:10px;"></label>

                    <input type="radio" name='rate2' id="star3_2" />
                    <label for="star3_2" class="ml-1" style="width:10px; height:10px;"></label>

                    <input type="radio" name='rate2' id="star2_2" />
                    <label for="star2_2" class="ml-1" style="width:10px; height:10px;"></label>

                    <input type="radio" name='rate2' id="star1_2" />
                    <label for="star1_2" class="ml-1" style="width:10px; height:10px;"></label> --}}
                    </div>
                    <h5 class=" ml-1 mt-1 font-weight-bold">3.8/5</h5>


                </div>


            </div>


            @if ($product->product_discount != null)
                <div class="row justify-content-between w-100 px-2 mx-2">
                    <h5 class="mb-0 font-weight-bold" style="color:rgba(180, 182, 186, 1);">
                        <s>฿{{ $product->product_price }}</s>
                    </h5>
                    <div class="row pr-1" style="font-size: 18px;">
                        <h6 class="m-0"> ขายได้ {{ $detail->count() }} ชิ้น</h6>
                    </div>
                </div>
            @else
                <div class="row justify-content-between w-100 px-2 mx-2">
                    <div class="row pr-1" style="font-size: 18px;">
                        <h6 class="m-0 pl-1"> ขายได้ {{ $detail->count() }} ชิ้น</h6>
                    </div>
                </div>
            @endif


        </div>
        <hr>
        {{-- merchant --}}
        <div class="col-12">
            <div class="row justify-content-between">
                <div class="row px-2">
                    <img src="{{ 'https://testgit.sapapps.work/moldii/storage/app/merchant/' . $store->merchant_img . '' }}"
                        alt="alt" class=" rounded-circle  " style="width: 50px; height:50px;">

                    <div class="card-title  align-self-center m-0 ml-1 ">
                        <h5 class=" m-0 p-0">{{ $store->merchant_shopname }}</h5>
                        <h6 class=" m-0 p-0">จังหวัดกรุงเทพมหานคร</h6>
                    </div>
                </div>

                <a href="{{ url('/shopping/merchant/' . $store->merchant_id . '') }}"><button type="button"
                        class="btn  btn-sm rounded shadowed  mr-1 p-1 align-self-center "
                        style="width: 53px; height: 22px; background: #FF5C63; color: white; font-size:10px;">ดูร้านค้า</button></a>


            </div>
            <div class="row text-center mt-1 ">
                <div class="col-4 p-1 line-con align-self-center">
                    <h5 class=" m-0 p-0 font-weight-bold">{{ $productstore->count() }}</h5>
                    <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">รายการสินค้า</h6>
                    <div class="line my-1"></div>
                </div>

                <div class="col-4 p-1 align-self-center">
                    <h5 class=" m-0 p-0 font-weight-bold">{{ $store->merchant_score }}</h5>
                    <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">คะแนน</h6>
                    <div class="line my-1"></div>
                </div>

                <div class="col-4 p-1 align-self-center">
                    <h5 class=" m-0 p-0 font-weight-bold">82%</h5>
                    <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">การตอบกลับแชท</h6>
                </div>
            </div>
            <hr>
            <h5 class="font-weight-bold">รายละเอียด</h5>
            <div class="col-12 row">
                <div class=" ">
                    <h6>คลัง </h6>
                    <h6>ส่งจาก</h6>
                </div>
                <div class=" pl-1">
                    <h6 class="ml-3">2000</h6>
                    <h6 class="ml-3">อำเภอ.....,จังหวัด......</h6>
                </div>
            </div>


            <hr class="my-1">
            <div class="col-12 p-1 ">
                <h4 class="text-break ">{{ $product->product_description }}</h4>
                {{-- <a href="" class="text-center">
                <h6 class="   m-0 font-weight-bold" style="color: rgba(255, 92, 99, 1);">เพิ่มเติม</h6>
            </a>
        </div> --}}
                <br>

                {{-- รีวิวจากลูกค้า --}}

                <div class="col-12 card-footer p-1">
                    <br>
                    <h5 class="font-weight-bold">รีวิวจากลูกค้า</h5>

                    @if ($review->count() != 0)
                        @foreach ($review as $reviews)
                            <div class="col-12 row p-0  m-0">
                                <img src="{{ asset('new_assets/img/sample/photo/2.jpg') }}" alt="alt"
                                    class=" rounded-circle  " style="width: 35px; height:35px;">
                                <div class="align-self-center pl-1">

                                    <h5 class=" m-0 p-0">{{ $reviews->customer_username }}</h5>
                                    <div class="rating-system2 row pl-1">
                                        @for ($i = 0; $i < $reviews->score; $i++)
                                            <i class="fas fa-star " style="color: #F1F437"></i>
                                        @endfor


                                    </div>

                                </div>
                            </div>
                            <h4 class="text-break m-0 mt-1 ">{{ $reviews->text }}</h4>
                            <div id="preview_img_review" class="preview-img-review">
                                <img id="show_preview"
                                    src=""
                                    alt="alt">
                                <i id="removeImg" class="icofont icofont-ui-close " onclick="removeImage()"></i>

                            </div>
                            <div class="col-12 m-0 p-0 row mt-3">
                                <div class="col-3">
                                    <img class=" " style=" width:100%;  background-size: cover; border-radius: 15px;"
                                        src="https://images.pexels.com/photos/2478248/pexels-photo-2478248.jpeg?auto=compress&cs=tinysrgb&w=1600"
                                        onclick="previewImg(this.src)" alt="alt">
                                </div>
                                <div class="col-3">
                                    <img class=" " style=" width:100%;  background-size: cover; border-radius: 15px;"
                                        src="https://images.pexels.com/photos/3875821/pexels-photo-3875821.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                        onclick="previewImg(this.src)" alt="alt">
                                </div>
                                <div class="col-3">
                                    <img class=" " style=" width:100%;  background-size: cover; border-radius: 15px;"
                                        src="https://images.pexels.com/photos/2478248/pexels-photo-2478248.jpeg?auto=compress&cs=tinysrgb&w=1600"
                                        onclick="previewImg(this.src)" alt="alt">
                                </div>
                                <div class="col-3">
                                    <img class=" " style=" width:100%;  background-size: cover; border-radius: 15px;"
                                        src="https://images.pexels.com/photos/2478248/pexels-photo-2478248.jpeg?auto=compress&cs=tinysrgb&w=1600"
                                        onclick="previewImg(this.src)" alt="alt">
                                </div>
                            </div>



                        @endforeach
                    @else
                        ยังไม่มีรีวิว
                    @endif
                </div>
                <br>
                <hr class="my-1">
                <br>
                <h4 class="font-weight-bold m-0 mt-1">สินค้าคล้ายกัน</h4>
                <br>

                @if ($productcat->count() > 2)
                    <div class="carousel-multiple owl-carousel owl-theme owl-loaded owl-drag">
                        @foreach ($productcat as $productcats)
                            <?php $sale = DB::Table('tb_order_details')
                                ->where('product_id', $productcats->product_id)
                                ->get(); ?>

                            <a href="{{ url('shopping/product/' . $productcats->product_id . '') }}" style="width: 50%;">
                                <div class="item card ">
                                    <img class="imaged w-100 card-image-top mt-1"
                                        src="{{ 'https://testgit.sapapps.work/moldii/storage/app/product_cover/' . $productcats->product_img . '' }}"
                                        alt="alt" style=" height:120px;">
                                    <div class="card-body col-12 p-1 ">
                                        <div class="row pl-1">
                                            <h5 class=" font-weight-bolder m-0">{{ $productcats->product_name }}</h5>
                                        </div>
                                        <div class=" row ">
                                            @if ($productcats->product_discount != null)
                                                <div class="row col-7">
                                                    <h6 class="mt-1 pl-1 m-0 "><s>฿{{ $productcats->product_price }}</s>
                                                    </h6>
                                                    <h6 class="mt-1 pl-1 m-0  font-weight-bold" style="color:#E81F12;">
                                                        ฿{{ $productcats->product_discount }}</h6>

                                                </div>
                                            @else
                                                <div class="row col-7">
                                                    <h6 class="mt-1 pl-1 m-0 ">฿{{ $productcats->product_price }}</h6>

                                                </div>
                                            @endif
                                            <div class="pl-2">
                                                <h6 class="m-0"><small>ขายได้ {{ $sale->count() }} ชิ้น</small></h6>
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
                @else
                    <div class="col-12 row m-0 justify-content-center ">

                        @foreach ($productcat as $productcats)
                            <?php $sale = DB::Table('tb_order_details')
                                ->where('product_id', $productcats->product_id)
                                ->get(); ?>
                            <a href="{{ url('shopping/product/' . $productcats->product_id . '') }}" style="width: 50%;">
                                <div class="card m-2 ">
                                    <img class="imaged w-100 card-image-top mt-1"
                                        src="{{ 'https://testgit.sapapps.work/moldii/storage/app/product_cover/' . $productcats->product_img . '' }}"
                                        alt="alt" style=" height:120px;">
                                    <div class="card-body col-12 p-1 ">
                                        <div class="row pl-1">
                                            <h5 class=" font-weight-bolder m-0">{{ $productcats->product_name }}</h5>
                                        </div>
                                        <div class=" row ">
                                            @if ($productcats->product_discount != null)
                                                <div class="row col-7">
                                                    <h6 class="mt-1 pl-1 m-0 "><s>฿{{ $productcats->product_price }}</s>
                                                    </h6>
                                                    <h6 class="mt-1 pl-1 m-0  font-weight-bold" style="color:#E81F12;">
                                                        ฿{{ $productcats->product_discount }}</h6>

                                                </div>
                                            @else
                                                <div class="row col-7">
                                                    <h6 class="mt-1 pl-1 m-0 ">฿{{ $productcats->product_price }}</h6>

                                                </div>
                                            @endif
                                            <div class="pl-2">
                                                <h6 class="m-0"><small>ขายได้333333 {{ $sale->count() }} ชิ้น</small>
                                                </h6>
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
                @endif


            </div>


        </div>

    @endsection
    @section('choice')
        <div class="" id="share_container">

            <?php $urlen = urlencode("https://modii.sapapps.work/shopping/product/$product->product_id"); ?>
            <div class="share-box p-2" id="share_box">
                <div class="text-center">
                    <h4 class="font-weight-bold">แบ่งปันข้อมูล</h4>
                    <input type="hidden" id="clink" value="{{ $urlen }}">
                </div>
                <div class="row justify-content-around p-1 ">
                    <a href="https://social-plugins.line.me/lineit/share?url={{ $urlen }}"
                        class="m-0 text-center align-self-end  share-item">
                        <img src="{{ asset('new_assets/img/icon/share/LINE.svg') }}" alt="alt" class=" "
                            style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Line</h5>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $urlen }}"
                        class="m-0 text-center  align-self-end share-item">
                        <img src="{{ asset('new_assets/img/icon/share/facebook.svg') }}" alt="alt" class=" "
                            style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Facebook</h5>

                    </a>
                    <a href="javascript:;" class="m-0 text-center align-self-end  share-item" onclick="clink();">
                        <img src="{{ asset('new_assets/img/icon/share/Link.svg') }}" alt="alt" class=" "
                            style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Copy link</h5>

                    </a>
                    <a href="" class="m-0 text-center align-self-end  share-item">
                        <img src="{{ asset('new_assets/img/icon/share/Messenger.svg') }}" alt="alt" class=" "
                            style="width:47px; height:47px;">
                        <h5 class="font-weight-bold m-0 mt-1">Messenger</h5>

                    </a>

                    <div class="row col-11 mt-4 p-0">
                        <button type="button" id="off_share_btn" class="btn  btn-block font-weight-bold"
                            style="background-color:rgba(255, 92, 99, 1); color:#FFF; font-size:15px; border-radius: 8px;">ยกเลิก</button>

                    </div>
                </div>
            </div>


        </div>
        <div class="" id="buy_goods_container">

            <div class="buy-good-box p-2" id="buy_goods_box">
                <div class="row ">
                    <div class="col-6 p-1">
                        <img src="{{ 'https://testgit.sapapps.work/moldii/storage/app/product_cover/' . $product->product_img . '' }}"
                            alt="alt" style="border-radius: 4px;" class=" imaged w-100 square">

                    </div>
                    <div class="col-6 pt-2">
                        <h4 class="m-0 font-weight-bold">{{ $product->product_name }}</h4>
                        <h4 class="m-0 font-weight-bold" style="color:#E81F12;">฿{{ $product->product_price }}</h4>
                        <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">คลัง: {{ $product->product_amount }}
                        </h6>


                    </div>

                </div>
                <hr class="my-2 ">
                <form action="{{ url('cart') }}" method="POST" id="formcart">
                    @csrf
                    <input type="hidden" name="back" value="1" id="backpage">
                    <input type="hidden" name="id" value="{{ $product->product_id }}">
                    <input type="hidden" name="store_id" value="{{ $store->merchant_id }}">
                    <input type="hidden" name="total"
                        value="{{ $product->product_discount != null ? $product->product_discount : $product->product_price }}">
                    <div class="row justify-content-between  p-1">
                        <h3 class="font-weight-bold mb-0 align-self-center">จำนวน</h3>

                        <div class="stepper stepper-dark align-self-center" style="font-size: 17px; ">
                            <a href="#" class=" stepper-down align-self-center" style="color:rgba(0, 0, 0, 1);"><i
                                    class="far fa-minus-circle"></i></a>
                            <input type="text" class="form-control font-weight-bold " value="1" readonly
                                style="border:none;" name="count" />
                            <a href="#" class=" stepper-up align-self-center" style="color:rgba(0, 0, 0, 1);"><i
                                    class="far fa-plus-circle "></i></a>
                        </div>

                    </div>
                    <hr class="my-2 ">
                    <div class="row justify-content-around p-1 ">


                        <div class="row col-11  mt-2 p-0">
                            <button type="submit" id="off_share_btn" class="btn  btn-block font-weight-bold"
                                style="background-color:rgba(80, 202, 101, 1); color:#FFF; font-size:15px; border-radius: 8px;">
                                ซื้อสินค้า
                            </button>

                        </div>

                    </div>
                </form>
            </div>


        </div>
    @endsection
    @section('choices')
        <div class="row w-100 choice-container m-0" id="choice_container">
            <div class="col-3 m-0 p-1 text-center " style="background-color: #17a2b8">
                <a href="{{ url('/chatMsg/index/' . $store->merchant_id) }}" type="button">
                    <div class="item-cart">
                        <i class="fa fa-comment" style="font-size:24px;"></i>
                        <h5 class="font-weight-bold m-0">แชทเลย</h5>
                    </div>
                </a>
            </div>
            <div class="col-3 m-0 p-1  add-to-cart text-center ">
                <a href="javascript:;" onclick="subcart();">
                    <div class="item-cart">
                        <i class="fal fa-shopping-bag" style="font-size:24px;"></i>
                        <h5 class="font-weight-bold m-0">เพิ่มในตะกร้า</h5>
                    </div>
                </a>
            </div>
            <div id="buy-goods" class="col-6 m-0 p-2  row justify-content-center align-items-center buy-goods h3">
                ซื้อสินค้า
            </div>
        </div>
    @endsection



    @section('custom_script')
        <script>
            var preview_img_review = document.getElementById('preview_img_review');
            const previewImg = src => {
                document.getElementById('show_preview').src = src;
                preview_img_review.style.display = "flex";

            }
            function removeImage(){
                document.getElementById('show_preview').src = '';
                preview_img_review.style.display = "none";

            }

            var a = "{{ Session::get('success') }}";
            if (a) {
                Swal.fire({
                    text: a,
                    confirmButtonColor: "#fc684b",
                })
            }


            function subcart() {
                document.getElementById('backpage').value = 2;
                $('#formcart').submit();
            }


            bottom_now(6);

            function clink() {
                /* Get the text field */
                var copyText = document.getElementById("clink");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);

                /* Alert the copied text */
                alert("Copied the text: " + copyText.value);
            }

            var chk = 0;

            function addheart(id) {

                //    document.getElementById("heart").style.color = "red";
                document.getElementById('unheart').style.display = '';
                document.getElementById('addheart').style.display = 'none';
                $.ajax({
                    url: '{{ url('/likeproduct') }}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {
                        'id': id
                    },
                    success: function(data) {

                    }
                });

            }


            function unheart(id) {



                //    document.getElementById("heart").style.color = "rgba(235, 235, 235, 1)";
                document.getElementById('unheart').style.display = 'none';
                document.getElementById('addheart').style.display = '';
                $.ajax({
                    url: '{{ url('/unlikeproduct') }}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {
                        'id': id
                    },
                    success: function(data) {


                    }
                });


            }
        </script>
    @endsection
