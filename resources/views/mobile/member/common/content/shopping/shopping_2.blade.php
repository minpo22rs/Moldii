@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('store')}}');">
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
<div class="m-1 shopping-container">
    <div class="section full mt-3 mb-3">
        <div class="carousel-full owl-carousel owl-theme">
            @if($imggal->count()>0)
                @foreach($imggal as $imggals)
                    <div class="item">
                    
                        <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_img/'.$imggals->img_name.'')}}" alt="alt" class="imaged w-100 square">
                    </div>
                @endforeach
            @else
                <div class="item">
                        
                    <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$product->product_img.'')}}" alt="alt" class="imaged w-100 square">
                </div>
            @endif
        
           
        </div>
    </div>
    <div class="row">
        <div class="row justify-content-between w-100 p-1  mx-2">
            <h3 class="mb-0">{{$product->product_name}}</h3>
            <div class="row pr-1" style="font-size: 18px;">
                <ion-icon name="share-outline" id="icon-share" style="color:rgba(177, 176, 176, 1);"></ion-icon>
                <i class="fas fa-heart ml-1" style="color:rgba(235, 235, 235, 1);"></i>
            </div>
        </div>
        <div class="row justify-content-between w-100 px-2 mx-2">
            @if($product->product_discount!=null)
                <h4 class="mb-0 font-weight-bold" style="color:#E81F12;">฿{{$product->product_discount}}</h4>
            @else
                <h5 class="mb-0 font-weight-bold" style="color:rgba(180, 182, 186, 1);">฿{{$product->product_price}}</h5>
            @endif
            <div class="row pr-1 align-self-center" style="font-size: 18px;">
                
                <div class="rating-system2">

                    <input type="radio" name='rate2' id="star5_2" />
                    <label for="star5_2" class="ml-1" style="width:10px; height:10px;"></label>

                    <input type="radio" name='rate2' id="star4_2" />
                    <label for="star4_2" class="ml-1" style="width:10px; height:10px;"></label>

                    <input type="radio" name='rate2' id="star3_2" />
                    <label for="star3_2" class="ml-1" style="width:10px; height:10px;"></label>

                    <input type="radio" name='rate2' id="star2_2" />
                    <label for="star2_2" class="ml-1" style="width:10px; height:10px;"></label>

                    <input type="radio" name='rate2' id="star1_2" />
                    <label for="star1_2" class="ml-1" style="width:10px; height:10px;"></label>
                </div>
                <h6 class=" ml-1 font-weight-bold">5/5</h6>
                
               
            </div>
            

        </div>

       
        @if($product->product_discount!=null)
            <div class="row justify-content-between w-100 px-2 mx-2">
                <h5 class="mb-0 font-weight-bold" style="color:rgba(180, 182, 186, 1);"><s>฿{{$product->product_price}}</s></h5>
                <div class="row pr-1" style="font-size: 18px;">
                    <h6 class="m-0"> ขายได้ {{$detail->count()}} ชิ้น</h6>
                </div>
            </div>
        @else
            <div class="row justify-content-between w-100 px-2 mx-2">
                <div class="row pr-1" style="font-size: 18px;">
                    <h6 class="m-0 pl-1"> ขายได้ {{$detail->count()}} ชิ้น</h6>
                </div>
            </div>
        @endif
      

    </div>
    <hr>
    {{-- merchant --}}
    <div class="col-12">
        <div class="row justify-content-between">
            <div class="row px-2">
                <img src="{{('https://testgit.sapapps.work/moldii/storage/app/merchant/'.$store->merchant_img.'')}}" alt="alt" class=" rounded-circle  " style="width: 50px; height:50px;">

                <div class="card-title  align-self-center m-0 ml-1 ">
                    <h5 class=" m-0 p-0">{{$store->merchant_name}}</h5>
                    <h6 class=" m-0 p-0">จังหวัดกรุงเทพมหานคร</h6>
                </div>
            </div>

           <a href="{{url('/shopping/merchant/'.$store->merchant_id.'')}}"><button type="button" class="btn  btn-sm rounded shadowed  mr-1 p-1 align-self-center " style="width: 53px; height: 22px; background: #FF5C63; color: white; font-size:10px;">ดูร้านค้า</button></a>


        </div>
        <div class="row text-center mt-1 ">
            <div class="col-4 p-1 line-con align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">{{$productstore->count()}}</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">รายการสินค้า</h6>
                <div class="line my-1"></div>
            </div>

            <div class="col-4 p-1 align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">{{$store->merchant_score}}</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">คะแนน</h6>
                <div class="line my-1"></div>
            </div>

            <div class="col-4 p-1 align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">82%</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">การตอบกลับแขก</h6>
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
            <h4 class="text-break ">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</h4>
            <a href="" class="text-center">
                <h6 class="   m-0 font-weight-bold" style="color: rgba(255, 92, 99, 1);">เพิ่มเติม</h6>
            </a>
        </div>
        <br>

        {{-- รีวิวจากลูกค้า --}}
        
        <div class="col-12 card-footer p-1">
            <br>
            <h5 class="font-weight-bold">รีวิวจากลูกค้า</h5>
            <div class="col-12 row p-0  m-0">
                <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
                <div class="align-self-center pl-1">
                  
                    <h5 class=" m-0 p-0">ชื่อลูกค้า</h5>
                    <div class="rating-system2 row pl-1">

                        <input type="radio" name='rate2' id="star5_2" />
                        <label for="star5_2" class="ml_4" style="width:6px; height:6px;"></label>

                        <input type="radio" name='rate2' id="star4_2" />
                        <label for="star4_2" class="ml_4" style="width:6px; height:6px;margin-left: 4px;"></label>

                        <input type="radio" name='rate2' id="star3_2" />
                        <label for="star3_2" class="ml_4" style="width:6px; height:6px;margin-left: 4px;"></label>

                        <input type="radio" name='rate2' id="star2_2" />
                        <label for="star2_2" class="ml_4" style="width:6px; height:6px;margin-left: 4px;"></label>

                        <input type="radio" name='rate2' id="star1_2" />
                        <label for="star1_2" class="ml_4" style="width:6px; height:6px;margin-left: 4px;"></label>

                    </div>

                </div>
            </div>
            <h4 class="text-break m-0 mt-1 ">XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</h4>
        </div>
        <br>
        <hr class="my-1">
        <br>
        <h4 class="font-weight-bold m-0 mt-1">สินค้าคล้ายกัน</h4>
        <br>
        
            @if($productcat->count()>2)
                <div class="carousel-multiple owl-carousel owl-theme owl-loaded owl-drag">
                    @foreach ($productcat as $productcats)
                        <?php $sale = DB::Table('tb_order_details')->where('product_id',$productcats->product_id)->get();?>

                            <a href="{{url('shopping/product/'.$productcats->product_id.'')}}" style="width: 50%;">
                                <div class="item card ">
                                    <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$productcats->product_img.'')}}" alt="alt" style=" height:120px;">
                                    <div class="card-body col-12 p-1 ">
                                        <div class="row pl-1">
                                            <h5 class=" font-weight-bolder m-0">{{$productcats->product_name}}</h5>
                                        </div>
                                        <div class=" row ">
                                            @if($productcats->product_discount!=null)
                                                <div class="row col-7">
                                                    <h6 class="mt-1 pl-1 m-0 "><s>฿{{$productcats->product_price}}</s></h6>
                                                    <h6 class="mt-1 pl-1 m-0  font-weight-bold" style="color:#E81F12;">฿{{$productcats->product_discount}}</h6>

                                                </div>
                                            @else
                                                <div class="row col-7">
                                                    <h6 class="mt-1 pl-1 m-0 ">฿{{$productcats->product_price}}</h6>

                                                </div>
                                            @endif
                                            <div class="pl-2">
                                                <h6 class="m-0"><small>ขายได้ {{$sale->count()}} ชิ้น</small></h6>
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
                        <?php $sale = DB::Table('tb_order_details')->where('product_id',$productcats->product_id)->get();?>
                            <a href="{{url('shopping/product/'.$productcats->product_id.'')}}" style="width: 50%;">
                                <div class="card m-2 ">
                                    <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$productcats->product_img.'')}}" alt="alt" style=" height:120px;">
                                    <div class="card-body col-12 p-1 ">
                                        <div class="row pl-1">
                                            <h5 class=" font-weight-bolder m-0">{{$productcats->product_name}}</h5>
                                        </div>
                                        <div class=" row ">
                                            @if($productcats->product_discount!=null)
                                                <div class="row col-7">
                                                    <h6 class="mt-1 pl-1 m-0 "><s>฿{{$productcats->product_price}}</s></h6>
                                                    <h6 class="mt-1 pl-1 m-0  font-weight-bold" style="color:#E81F12;">฿{{$productcats->product_discount}}</h6>

                                                </div>
                                            @else
                                                <div class="row col-7">
                                                    <h6 class="mt-1 pl-1 m-0 ">฿{{$productcats->product_price}}</h6>

                                                </div>
                                            @endif
                                            <div class="pl-2">
                                                <h6 class="m-0"><small>ขายได้333333 {{$sale->count()}} ชิ้น</small></h6>
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

    <div class="share-box p-2" id="share_box">
        <div class="text-center">
            <h4 class="font-weight-bold">แบ่งปันข้อมูล</h4>
        </div>
        <div class="row justify-content-around p-1 ">
            <a href="" class="m-0 text-center align-self-end  share-item">
                <img src="{{ asset('new_assets/img/icon/share/LINE.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                <h5 class="font-weight-bold m-0 mt-1">Line</h5>
            </a>
            <a href="" class="m-0 text-center  align-self-end share-item">
                <img src="{{ asset('new_assets/img/icon/share/ig_instagram.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                <h5 class="font-weight-bold m-0 mt-1">Instagram Stories</h5>

            </a>
            <a href="" class="m-0 text-center align-self-end  share-item">
                <img src="{{ asset('new_assets/img/icon/share/Link.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                <h5 class="font-weight-bold m-0 mt-1">Copy link</h5>

            </a>
            <a href="" class="m-0 text-center align-self-end  share-item">
                <img src="{{ asset('new_assets/img/icon/share/Messenger.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                <h5 class="font-weight-bold m-0 mt-1">Messenger</h5>

            </a>
            <a href="" class="m-0 text-center align-self-end  share-item">
                <img src="{{ asset('new_assets/img/icon/share/Email.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                <h5 class="font-weight-bold m-0 mt-1">Email</h5>
            </a>
            <div class="row col-11 mt-4 p-0">
                <button type="button" id="off_share_btn" class="btn  btn-block font-weight-bold" style="background-color:rgba(255, 92, 99, 1); color:#FFF; font-size:15px; border-radius: 8px;">ยกเลิก</button>

            </div>
        </div>
    </div>


</div>
<div class="" id="buy_goods_container">

    <div class="buy-good-box p-2" id="buy_goods_box">
        <div class="row ">
            <div class="col-6 p-1">
                <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$product->product_img.'')}}" alt="alt" style="border-radius: 4px;" class=" imaged w-100 square">

            </div>
            <div class="col-6 pt-2">
                <h4 class="m-0 font-weight-bold">{{$product->product_name}}</h4>
                <h4 class="m-0 font-weight-bold" style="color:#E81F12;">฿{{$product->product_price}}</h4>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">คลัง: {{$product->product_amount}}</h6>


            </div>

        </div>
        <hr class="my-2 ">
            <form action="{{url('cart')}}" method="POST" id="formcart">
                @csrf
                <input type="hidden" name="back" value="1" id="backpage">
                <input type="hidden" name="id" value="{{$product->product_id}}">
                <input type="hidden" name="store_id" value="{{$store->merchant_id}}">
                <input type="hidden" name="total" value="{{$product->product_discount!=null?$product->product_discount:$product->product_price}}">
                <div class="row justify-content-between  p-1">
                    <h3 class="font-weight-bold mb-0 align-self-center">จำนวน</h3>

                    <div class="stepper stepper-dark align-self-center" style="font-size: 17px; ">
                        <a href="#" class=" stepper-down align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-minus-circle"></i></a>
                        <input type="text" class="form-control font-weight-bold " value="1" readonly style="border:none;" name="count" />
                        <a href="#" class=" stepper-up align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-plus-circle "></i></a>
                    </div>

                </div>
                <hr class="my-2 ">
                <div class="row justify-content-around p-1 ">

                    
                        <div class="row col-11  mt-2 p-0">
                            <button type="submit" id="off_share_btn" class="btn  btn-block font-weight-bold" style="background-color:rgba(80, 202, 101, 1); color:#FFF; font-size:15px; border-radius: 8px;">
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
    <div class="col-6 m-0 p-1  add-to-cart text-center ">
            <a href="javascript:;" onclick="subcart();">
                <div class="item-cart" >
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
        var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
        }


        function subcart(){
            document.getElementById('backpage').value =2;
            $('#formcart').submit();
        }
       
   
        bottom_now(6);
    </script>
@endsection