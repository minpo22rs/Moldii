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
<div>

    <div class="mt-3" name="story_videos_section" id="story_videos_section">

        <ul class="nav nav-tabs style1 mt-2" role="tablist">
            <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#home" role="tab">บทความ</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#video" role="tab">วิดีโอ</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#podcast" role="tab">Podcast</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#store" role="tab"> ร้านค้า</a></li>
        </ul>

        <div class="tab-content mt-2">

            @include("mobile.member.common.content.story")

            <div id="home" class="tab-pane fade in active show">
                @foreach ($c as $sqls)
                <?php $count = DB::Table('tb_comments')->where('comment_object_id', $sqls->new_id)->get() ?>
                <div class="card my-3">
                    <div class="card-body row col-12 justify-content-center m-0">
                        <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

                        <div class="card-title col-8  align-self-center m-0 ">
                            <div class="card-title m-0 row align-self-center">
                                <h4 class=" m-0 p-0">{{$sqls->created_by}}</h4>
                                <a href="#" class="ml-1 align-self-center">
                                    <h6 class="m-0 p-0 " style="color:  rgba(255, 92, 99, 1);">ติดตาม</h6>
                                </a>
                            </div>
                            <h6 class=" m-0 p-0">{{$sqls->created_at}}</h6>
                        </div>

                        <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
                            <ion-icon name="bookmark-outline" style="font-size:25px"></ion-icon>
                            <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px"></ion-icon>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <a href="{{url('content/'.$sqls->new_id.'')}}" class="card-text">{{$sqls->new_title}}</a>

                    </div>
                    <a href="{{url('content/'.$sqls->new_id.'')}}"><img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$sqls->new_img.'')}}" alt="alt" class="w-100" style="width: 375px; height: 197px;"></a>

                    <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
                        <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sqls->like?''.$sqls->like.'':'0'}} ชื่นชอบ</h6>
                        <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$count->count()}} รายการ</h6>
                        <h6 class="mb-0 ml-1 card-subtitle text-muted">4 แชร์</h6>

                    </div>

                    <div class="card-footer row justify-content-center align-items-center" style="padding-left: 3px; padding-right: 3px;">

                        <div class="col-3 row p-0 align-items-center">
                            <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                            <h5 class="mb-0 ml-1 ">ชื่นชอบ</h5>
                        </div>
                        <div class="col-5 row p-0 align-items-center">
                            <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
                            <h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5>
                        </div>
                        <div class="col-2 row p-0 align-items-center">
                            <img src="{{ asset('new_assets/img/icon/share.png')}}" alt="alt" style="width:17px; height:17px;">
                            <h5 class="mb-0 ml-1">แชร์</h5>
                        </div>
                        <div class="col-2 row p-0 align-items-center">
                            <img src="{{ asset('new_assets/img/icon/diamond.png')}}" alt="alt" style="width:17px; height:17px;">
                            <h5 class="mb-0 ml-1">โดเนท</h5>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>


            <div id="video" class="tab-pane fade">
                @foreach ($v as $item)
                <?php $count = DB::Table('tb_comments')->where('comment_object_id', $item->new_id)->get() ?>
                <div class="card my-3">
                    <div class="card-body row col-12 justify-content-center m-0">
                        <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

                        <div class="card-title col-8  align-self-center m-0 ">
                            <div class="card-title m-0 row align-self-center">
                                <h4 class=" m-0 p-0">{{$item->created_by}}</h4>
                                <a href="#" class="ml-1 align-self-center">
                                    <h6 class="m-0 p-0 " style="color:  rgba(255, 92, 99, 1);">ติดตาม</h6>
                                </a>
                            </div>
                            <h6 class=" m-0 p-0">{{$item->created_at}}</h6>
                        </div>

                        <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
                            <ion-icon name="bookmark-outline" style="font-size:25px"></ion-icon>
                            <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px"></ion-icon>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <p class="card-text">{{substr($item->new_title,0,80)}}</p>

                    </div>
                    {{-- <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" class="w-100" style="width: 375px; height: 197px;"> --}}
                    <iframe width="390" height="215" src="https://www.youtube.com/embed/{{$item->new_img}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
                        <h6 class="mb-0 ml-1 card-subtitle text-muted">230 ชื่นชอบ</h6>
                        <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น 120 รายการ</h6>
                        <h6 class="mb-0 ml-1 card-subtitle text-muted">4 แชร์</h6>
                        <h6 class="mb-0 ml-1 card-subtitle text-muted">2.7k รับชม</h6>
                    </div>

                    <div class="card-footer row    justify-content-center ">

                        <div class="col-3 row p-0  justify-content-center">
                            <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                            <h5 class="mb-0 ml-1 ">ชื่นชอบ</h5>
                        </div>
                        <div class="col-5 row p-0 justify-content-center ml-1 ">
                            <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
                            <h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5>
                        </div>
                        <div class="col-2 row p-0 justify-content-center ml-1 ">
                            <img src="{{ asset('new_assets/img/icon/share.png')}}" alt="alt" style="width:17px; height:17px;">
                            <h5 class="mb-0 ">แชร์</h5>
                        </div>
                        <div class="col-3 row p-0 justify-content-center  ">
                            <img src="{{ asset('new_assets/img/icon/diamond.png')}}" alt="alt" style="width:17px; height:17px;">
                            <h5 class="mb-0 ml-1">โดเนท</h5>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>


            <div id="podcast" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>



            <div id="store" class="tab-pane fade">
                <div class="container p-1 my-3">

                    <img class="justify-content-center w-100" src="{{ asset('new_assets/img/4a1ef46ac4bc5a20dd6ea8c2c5d5f5af.png')}}" alt="alt">
                    <div class="col-12 p-2 row justify-content-center m-0">
                        @foreach($cat as $cats)
                        <div class="col-3 p-1 text-center ">
                            <img class=" rounded-circle  " src="{{('https://testgit.sapapps.work/moldii/storage/app/category_cover/'.$cats->cat_img.'')}}" alt="alt" style="width: 53px; height:53px;">
                            <h6 class="mt-1">{{$cats->cat_name}}</h6>
                        </div>
                        @endforeach


                    </div>
                    <div class="card-title my-1 font-weight-bold font-weight-bolder">คัดสรรมาเพื่อคุณ </div>

                    <div class="" name="story_videos_section" id="story_videos_section">

                        <div class="carousel-multiple owl-carousel owl-theme">
                            @foreach($pro as $pros)
                            <div class="item">
                                <div class="card ">
                                    <img class="imaged w-100 card-image-top mt-1" src="{{ asset('new_assets/img/Rectangle_65.png')}}" alt="alt" style=" height:120px;">
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
                            @endforeach
                        </div>

                    </div>

                    <div class="card-title my-3 font-weight-bold font-weight-bolder">สินค้าแนะนำประจำวัน</div>

                    <div class="col-12 row m-0 justify-content-center ">

                        @foreach($pro as $products)
                        <div class=" card  my-2 mx-2 align-self-center justify-content-center">
                            <img class="imaged w-100 card-image-top mt-1" src="{{ asset('new_assets/img/Rectangle_65.png')}}" alt="alt" style=" height:120px;">
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
                        @endforeach

                    </div>

                    <!-- align-self-center justify-content-center -->

                </div>
            </div>


        </div>

    </div>
    @endsection


    @section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if (a) {
            alert(a);
        }

        bottom_now(1);


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