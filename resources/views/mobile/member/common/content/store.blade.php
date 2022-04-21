
@extends('mobile.main_layout.main')

@section('app_header')

    <div class="appHeader bg-danger text-light">

        <div class="pageTitle">

        </div>
        <div class="right">

        </div>
        <div class="m-1 w-100">

            <div class="row">
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
                    <ion-icon id="btn_search_2" style="cursor: pointer;" name="funnel" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline">
                    </ion-icon>
                </div>
            </div>

        </div>
    </div>
@endsection
    

@section('content')
    <div class="container p-1 my-3">

        <img class="justify-content-center w-100" src="{{('https://testgit.sapapps.work/moldii/storage/app/banner/'.$ban->banner_name.'')}}"  alt="alt">
        <div class="col-12 p-2 row justify-content-center m-0">
            @foreach($cat as $cats)
                <div class="col-3 p-1 text-center ">
                    <a href="{{url('/shopping/category/'.$cats->cat_id.'')}}"><img class=" rounded-circle  " src="{{('https://testgit.sapapps.work/moldii/storage/app/category_cover/'.$cats->cat_img.'')}}" alt="alt" style="width: 53px; height:53px;"></a>
                    <h6 class="mt-1">{{$cats->cat_name}}</h6>
                </div>
            @endforeach


        </div>
        <div class="card-title my-1 font-weight-bold font-weight-bolder">คัดสรรมาเพื่อคุณ </div>

        <div class="" name="story_videos_section" id="story_videos_section">

            <div class="carousel-multiple owl-carousel owl-theme">
                @foreach($pro as $pros)
                    <a href="{{url('shopping/product/'.$pros->product_id.'')}}">
                        <div class="item">
                            <div class="card ">
                                <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$pros->product_img.'')}}" alt="alt" style=" height:120px;">
                                <div class="card-body col-12 p-1 ">
                                    <div class="row pl-1">
                                        <h5 class=" font-weight-bolder m-0">{{$pros->product_name}}</h5>
                                    </div>
                                    <div class=" row ">
                                        <h6 class="mt-1 pl-1 m-0 col-6">{{$pros->product_price}}</h6>
                                        {{-- <h6 class="mt-1 pl-1 m-0 col-6">฿350 ฿250</h6> --}}
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

        </div>

        <div class="card-title my-3 font-weight-bold font-weight-bolder">สินค้าแนะนำประจำวัน</div>

        <div class="col-12 row m-0 justify-content-center ">

            @foreach($pro as $products)
                <a href="{{url('shopping/product/'.$products->product_id.'')}}" style="width: 50%;">
                    <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                        <img class="imaged w-100 card-image-top mt-1" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$products->product_img.'')}}" alt="alt" style=" height:120px;">
                        <div class="card-body col-12 p-1 ">
                            <div class="row pl-1">
                                <h5 class=" font-weight-bolder m-0">{{$products->product_name}}</h5>
                            </div>
                            <div class=" row ">
                                <h6 class="mt-1 pl-1 m-0 col-6">{{$products->product_price}}</h6>
                                {{-- <h6 class="mt-1 pl-1 m-0 col-6">฿350 ฿250</h6> --}}
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

            const btnSearch = document.getElementById('btn_search_2');
            const offSearch = document.getElementById('off_search_2');
            const offSearch_2 = document.querySelector('.off');
            const searchCon = document.getElementById('search_container_2');
            const searchBox = document.getElementById('search_box_2');


            btnSearch.addEventListener('click', () => {
                searchCon.classList.add('search-container-2');
                searchBox.classList.add('show-search-box');
            });
            offSearch.addEventListener('click', () => {
                searchCon.classList.remove('search-container-2');
                searchBox.classList.remove('show-search-box');
            });
            offSearch_2.addEventListener('click', () => {
                searchCon.classList.remove('search-container-2');
                searchBox.classList.remove('show-search-box');
            });
        </script>
@endsection
    
