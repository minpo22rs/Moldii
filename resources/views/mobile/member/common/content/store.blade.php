
@extends('mobile.main_layout.main')

@section('app_header')
<style>
    
#search_box_2 {
    width: 100%;
    height: auto;
    padding: 60px 0;
    text-align: center;
    background-color: white ;
    margin-top: 30px;
    position: sticky;
    display: none;
    transform: translateY( 0%);
    transition: transform 0.5s;
}

#search_2 {
    width: 100%;
    padding: 30px 0;
    text-align: center;
    background-color: #fc684b ;
    margin-top: 30px;
    position: fixed;
    display: none;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="appHeader bg-danger text-light">

    <div class="pageTitle">

    </div>
    <div class="right">

    </div>
    <div class="m-1 w-100">

        <div class="row">

            <div class="col-2">
                <ion-icon id="btn_search_2" style="cursor: pointer;"  onclick="myFunction()" name="list" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline">
                </ion-icon>
            </div>


            <div class="col-6">
                <form action="{{url('user/search')}}" method="POST" class="search-form">
                    @csrf
                    <div class="form-group searchbox mt-1 mb-0">
                        <input type="text" name="text" class="form-control" id="input_search_1" placeholder="Search...">
                        <i class="input-icon">
                            <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                        </i>
                    </div>
                    
                </form>
            </div>
            <?php $countcart = DB::Table('tb_carts')->select(DB::raw('SUM(count) as countt'))->where('customer_id',Session::get('cid'))->first();?>
           
            <div class="col-2 mt-1">
                <a href="{{url('cartindex')}}" > 
                    <div class="  md hydrated  bg-white text-danger rounded  h5 text-center" style="  padding: 6px 5px 4px 5px ; ">
                        <ion-icon name="cart" class=" font-weight-bold" role="img"  aria-label="search outline" ></ion-icon>
                        <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$countcart->countt != null ?$countcart->countt:'0'}}</span> 
                    </div>
                </a>
            </div>

            <div class="col-2">
                <a href="{{url('user/notification')}}">
                    <ion-icon name="notifications" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline" >
                    </ion-icon>
                </a>
            </div>
            
        </div>

    </div>

     <!-- Show List Menu btn_search_2 [Start]-->
     <div id="search_2" >
        <div class="col-md-12 mt-2"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

 
            <div style="left: 16px;  position: absolute; " class="mt-2">
                 <ion-icon name="close" onclick="myFunction()"  aria-label="search outline" ></ion-icon>
            </div><br><br>
            <div class="row" style="overflow: auto ; width: 100%; height: 450px; justify-content: center;">
              @foreach($cat as $cats)
                    <div class="text-center p-1 ">                      
                        <a href="{{url('/shopping/category/'.$cats->cat_id.'')}}"> 
                            <h4 class="mt-1" style="color:#fff;">{{$cats->cat_name}}</h4>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Show List Menu btn_search_2 [End]--> 
</div>
{{-- Recent Search --}}
<div id="search_box_2">
    <h3> Recent Search</h3>

        <p> @if(Session::get('recent') != null)
                @foreach (Session::get('recent') as $text)
                    <a href="{{url('user/searcha/'. $text.'')}}">
                        {{$text}}<br>
                    </a>
                @endforeach
                
            @else
                <p style="text-align: center;">ไม่พบการค้นหาล่าสุด</p>
            @endif
        </p>
  
</div>
@endsection
    

@section('content')
    <div class="container p-1 my-3">

        <img class="justify-content-center w-100" src="{{('https://testgit.sapapps.work/moldii/storage/app/banner/'.$ban->banner_name.'')}}"  alt="alt">
       


        <div class="card-title my-1 font-weight-bold font-weight-bolder pt-2">หมวดหมู่ </div>

        <div class="col-12 pt-1  m-0" >
            <div class="row " style="overflow: auto ; width: 100%; height: 200px; justify-content: center;" >

                @foreach($cat as $cats)
                    
                    
                    <div class="text-center p-1 col-3">                      
                        <a href="{{url('/shopping/category/'.$cats->cat_id.'')}}"><img class=" rounded-circle  " src="{{('https://testgit.sapapps.work/moldii/storage/app/category_cover/'.$cats->cat_img.'')}}" alt="alt" style="width: 53px; height:53px;"></a>
                        <h6 class="mt-1">{{$cats->cat_name}}</h6>
                    </div>
            
                  
                @endforeach
            </div>
        </div>




        
        <br>

        <div class="card-title my-1 font-weight-bold font-weight-bolder">คัดสรรมาเพื่อคุณ </div>

        <div class="" name="story_videos_section" id="story_videos_section">

            <div class="carousel-multiple owl-carousel owl-theme">
                @foreach($pro as $pros)
                    <?php $detail = DB::Table('tb_order_details')->where('product_id',$pros->product_id)->get()?>

                    <a href="{{url('shopping/product/'.$pros->product_id.'')}}">
                        <div class="item">
                            <div class="card ">
                                <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$pros->product_img.'')}}" alt="alt" style=" height:120px;">
                                <div class="card-body col-12 p-1 ">
                                    <div class="row pl-1">
                                        <h5 class=" font-weight-bolder m-0">{{$pros->product_name}}</h5>
                                    </div>
                                    <div class=" row ">
                                        @if($pros->product_discount!=null)
                                            <div class="row col-6">
                                                <h6 class="mt-1 pl-1 m-0 "><s>฿{{$pros->product_price}}</s></h6>
                                                <h6 class="mt-1 pl-1 m-0  font-weight-bold" style="color:#E81F12;">฿{{$pros->product_discount}}</h6>

                                            </div>
                                        @else
                                            <div class="row col-6">
                                                <h6 class="mt-1 pl-1 m-0 ">฿{{$pros->product_price}}</h6>
                                            
                                            </div>
                                        @endif

                                        <div class="col-6 mt-1 text-right">
                                            <h6 class="m-0">ขายได้ {{$detail->count()}} ชิ้น</h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>

        <div class="card-title my-3 font-weight-bold font-weight-bolder">สินค้าแนะนำประจำวัน</div>

        <div class="col-12 row m-0 justify-content-center ">

            @foreach($pro as $products)
                <?php $details = DB::Table('tb_order_details')->where('product_id',$products->product_id)->get()?>

                <a href="{{url('shopping/product/'.$products->product_id.'')}}" style="width: 50%;">
                    <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                        <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$products->product_img.'')}}" alt="alt" style=" height:120px;">
                        <div class="card-body col-12 p-1 ">
                            <div class="row pl-1">
                                <h5 class=" font-weight-bolder m-0">{{$products->product_name}}</h5>
                            </div>
                            <div class=" row ">
                                @if($products->product_discount!=null)
                                    <div class="row col-7">
                                        <h6 class="mt-1 pl-1 m-0 "><s>฿{{$products->product_price}}</s></h6><h6 class="mt-1 pl-1 m-0  font-weight-bold" style="color:#E81F12;">฿{{$products->product_discount}}</h6>

                                    </div>
                                @else
                                    <div class="row col-7">
                                        <h6 class="mt-1 pl-1 m-0 ">฿{{$products->product_price}}</h6>
                                      
                                    </div>
                                @endif
                                <div class="col-5 mt-1 text-right">
                                    <h6 class="m-0">ขายได้ {{$details->count()}} ชิ้น</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>

        <!-- align-self-center justify-content-center -->

    </div>

@endsection

@section('custom_script')
        <script>

            bottom_now(6);


            var a = "{{Session::get('success')}}";
            if (a) {
                alert(a);
            }

            // const btnSearch = document.getElementById('btn_search_2');
            // const offSearch = document.getElementById('off_search_2');
            // const offSearch_2 = document.querySelector('.off');
            // const searchCon = document.getElementById('search_container_2');
            // const searchBox = document.getElementById('search_box_2');


            // btnSearch.addEventListener('click', () => {
            //     searchCon.classList.add('search-container-2');
            //     searchBox.classList.add('show-search-box');
            // });
            // offSearch.addEventListener('click', () => {
            //     searchCon.classList.remove('search-container-2');
            //     searchBox.classList.remove('show-search-box');
            // });
            // offSearch_2.addEventListener('click', () => {
            //     searchCon.classList.remove('search-container-2');
            //     searchBox.classList.remove('show-search-box');
            // });
        </script>

        {{-- searchBox --}}
        <script>
           

            // const btnSearch = document.getElementById('btn_search_2');
            // const offSearch = document.getElementById('off_search_2');
            // const offSearch_2 = document.querySelector('.off');
            const searchCon = document.getElementById('input_search_1');
            const searchBox = document.getElementById('search_box_2');

            
            searchCon.addEventListener('onmouseenter', () => {
                // searchCon.classList.add('search-container-2');
                // searchBox.classList.add('show-search-box');
                if (searchBox.style.display === "none") {
                    searchBox.style.display = "block";
                } else {
                    searchBox.style.display = "none";
                }
            });
            // offSearch.addEventListener('click', () => {
            //     searchCon.classList.remove('search-container-2');
            //     searchBox.classList.remove('show-search-box');
            // });
            // offSearch_2.addEventListener('click', () => {
            //     searchCon.classList.remove('search-container-2');
            //     searchBox.classList.remove('show-search-box');
            // });


            function myFunction() {
                var x = document.getElementById("search_2");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
@endsection
    
