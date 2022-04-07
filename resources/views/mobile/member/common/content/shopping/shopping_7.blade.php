
@extends('mobile.main_layout.main')
@section('app_header')
<style>
  
    .nav-item .nav-link.active {
        background-color: #FF5C63 !important;
        color: white !important;
    }


    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 10px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .accordion:hover {
        background-color: #FF5C63;
        color: #FFF ;
    }


    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }


    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }
        

</style>
<div class="appHeader bg-danger text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.history.back();">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">

    </div>
    <div class="center mt-1 ">ร้านค้า </div>
  
</div>
@endsection

@section('content')

<div class="col-md-12  mt-3 ">
    <div class="container">
        <div class="row justify-content-between">
                    <div class="row px-2">
                        <img src="{{('https://testgit.sapapps.work/moldii/storage/app/merchant/'.$merchant->merchant_img.'')}}" alt="alt" class=" rounded-circle  " style="width: 50px; height:50px;">

                        <div class="card-title  align-self-center m-0 ml-1 ">
                            <h3 class=" m-0 p-0"><b>{{$merchant->merchant_name}}</b></h3>
                            <h6 class=" m-0 p-0" style="color: #A0A0A0;">จังหวัดกรุงเทพมหานคร</h6>
                        </div>
                    </div>

                    <div class="right">
                         <button type="button" class="btn  btn-sm rounded shadowed  mr-1 p-1 align-self-center " style="width: 48px; height: 15px; background: #FF5C63; color: white; font-size:10px;">ติดตาม</button><br>
                         <button type="button" class="btn  btn-sm rounded shadowed  mr-1 p-1 align-self-center " style="width: 48px; height: 15px; background: #E5E6E7; color: white; font-size:10px;">พูดคุย</button>
                    </div>
        </div>

        <div class="row text-center mt-1 ">
            <div class="col-4 p-1 line-con align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">500</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">รายการสินค้า</h6>
                <div class="line my-1"></div>
            </div>

            <div class="col-4 p-1 align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">4.1</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">คะแนน</h6>
                <div class="line my-1"></div>
            </div>

            <div class="col-4 p-1 align-self-center">
                <h5 class=" m-0 p-0 font-weight-bold">82%</h5>
                <h6 class=" m-0 p-0" style="color:rgba(160, 160, 160, 1);">การตอบกลับแชท</h6>
            </div>
        </div>
        


        <div class="mt-2" name="story_videos_section" id="story_videos_section">

            <ul class="nav nav-tabs style1 mt-2" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#foryou" role="tab">สำหรับคุณ</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product" role="tab">สินค้า</a></li> 
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#new" role="tab"> มาใหม่</a></li>
                <li class="nav-item active"><a class="nav-link " data-toggle="tab" href="#cat" role="tab">หมวดหมู่</a></li>

            </ul>

            <div class="tab-content mt-2">


                <div id="foryou" class="tab-pane fade in active show">
                    <div class="carousel-multiple owl-carousel owl-theme mt-2 ">
                        @foreach ($product as $products)
                            <a href="{{url('shopping/product/'.$products->product_id.'')}}">
                                <div class="item">
                                    <div class="card ">
                                        <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$products->product_img.'')}}" alt="alt" style=" height:115px;">
                                        <div class="card-body col-12 p-1 ">
                                            <div class="row pl-1">
                                                <h5 class=" font-weight-bolder m-0">{{$products->product_name}}</h5>
                                            </div>
                                            <div class=" row ">                           
                                                <h6 class="mt-1 pl-1 m-0 col-6" style=" color:#E81F12;">฿ <b>250</b></h6>
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
                                </div>
                            </a>
                        @endforeach

                    </div>
               
                    <div class=" mt-2 mb-3 ">
                        <img class="imaged w-100 card-image-top mt-2" src="{{('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxEkv2NtgH8l4MG6BJKpUkuHOgjkdFqXfRDw&usqp=CAU')}}" alt="alt" style=" width:343px; height: 96px;">
                        <img class="imaged w-100 card-image-top mt-2" src="{{('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxEkv2NtgH8l4MG6BJKpUkuHOgjkdFqXfRDw&usqp=CAU')}}" alt="alt" style=" width:343px; height: 96px;">
                        <img class="imaged w-100 card-image-top mt-2" src="{{('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxEkv2NtgH8l4MG6BJKpUkuHOgjkdFqXfRDw&usqp=CAU')}}" alt="alt" style=" width:343px; height: 96px;">
                        <img class="imaged w-100 card-image-top mt-2" src="{{('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxEkv2NtgH8l4MG6BJKpUkuHOgjkdFqXfRDw&usqp=CAU')}}" alt="alt" style=" width:343px; height: 96px;">
                
                    </div>



                </div>



                <div id="product" class="tab-pane fade ">
                    <div class="col-12 row m-0 justify-content-center mt-2 mb-3 ">
                        @foreach($product as $products)
                            <a href="{{url('shopping/product/'.$products->product_id.'')}}" style="width: 50%;">
                                <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                                    <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$products->product_img.'')}}" alt="alt" style=" height:120px;">
                                    <div class="card-body col-12 p-1 ">
                                        <div class="row pl-1">
                                            <h5 class=" font-weight-bolder m-0">{{$products->product_name}}</h5>
                                        </div>
                                        <div class=" row ">
                                            <h6 class="mt-1 pl-1 m-0 col-6" style=" color:#E81F12;">฿ 250</h6>
                                            <!-- {{-- <h6 class="mt-1 pl-1 m-0 col-6">฿350 ฿250</h6> --}} -->
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
                        @endforeach
                    </div>
                </div>


                <div id="new" class="tab-pane fade ">
                    <div class="col-12 row m-0 justify-content-center mt-2 mb-3 ">
                        @foreach($productnew as $news)
                            <a href="{{url('shopping/product/'.$news->product_id.'')}}" style="width: 50%;">
                                <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                                    <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$news->product_img.'')}}" alt="alt" style=" height:120px;">
                                    <div class="card-body col-12 p-1 ">
                                        <div class="row pl-1">
                                            <h5 class=" font-weight-bolder m-0">{{$news->product_name}}</h5>
                                        </div>
                                        <div class=" row ">
                                            <h6 class="mt-1 pl-1 m-0 col-6" style=" color:#E81F12;">฿ 250</h6>
                                            <!-- {{-- <h6 class="mt-1 pl-1 m-0 col-6">฿350 ฿250</h6> --}} -->
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
                        @endforeach
                    </div>
                </div>


                <div id="cat" class="tab-pane fade ">
                  
                    @foreach ($category as $categorys)

                        <button class="accordion" style="font-weight: 500;">{{$categorys->cat_name}} </button>
                        <div class="panel"> <!-- panel 1 [Start] -->
                            <div class="col-12 row m-0 justify-content-center mt-2 mb-3 ">
                                <?php   $product = DB::Table('tb_products')->where('product_cat_id',$categorys->cat_id)->get(); ?>
                                    @foreach ($product as $products)

                                        <a href="{{url('shopping/product/'.$products->product_id.'')}}" style="width: 50%;">
                                            <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                                                <img class="imaged w-100 card-image-top mt-1" src="{{('https://mpics.mgronline.com/pics/Images/564000010524001.JPEG')}}" alt="alt" style=" height:120px;">
                                                <div class="card-body col-12 p-1 ">
                                                    <div class="row pl-1">
                                                        <h5 class=" font-weight-bolder m-0">{{$products->product_name}}</h5>
                                                    </div>
                                                    <div class=" row ">
                                                        <h6 class="mt-1 pl-1 m-0 col-6" style=" color:#E81F12;">฿ 250</h6>
                                                        <!-- {{-- <h6 class="mt-1 pl-1 m-0 col-6">฿350 ฿250</h6> --}} -->
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
                                    @endforeach

                                </div>
                        </div> <!-- panel 1 [End] -->
            
                    @endforeach
            
                    
                </div>


            </div>
        </div>


            




            
    </div> <!-- container -->
</div> <!-- col-md-12  mt-3 -->


@endsection

@section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if(a){
            alert(a);
        }

       
   
        bottom_now(6);



        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                } 
            });
        }
    </script>
@endsection