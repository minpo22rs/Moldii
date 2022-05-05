@extends('mobile.main_layout.main')

@section('app_header')
<style>
  

/* * Post widget * */

input[type="file"] {
display: none;
}
ul {
list-style-type: none;
}

.btn {
padding: .5em 1em;

background-color: transparent;
color: #6b7270;

border: none;
cursor: pointer;
}

.widget-post {
width: 375px;
min-height: 100px;
height: auto;

border: 1px solid #eaeaea;
border-radius: 6px;
box-shadow: 0 1px 2px 1px rgba(130, 130, 130, 0.1);

background-color: #fff;

margin: auto;
overflow: hidden;
}

.widget-post__header {
padding: .2em .5em;

background-color: #eaeaea;
color: #3f5563;
}
.widget-post__title {
font-size: 18px;
margin-top:10px;
}

.widget-post__content {
width: 100%;
height: 50%;
}
.widget-post__textarea {
width: 100%;
height: 100%;
padding: .5em;

border: none;
resize: none;
}
.widget-post__textarea:focus {
outline: none;
}

.widget-post__options {
padding: .5em;
}
.widget-post___input {
display: inline-block;

width: 24%;
padding: .2em .5em;

border: 1px solid #eaeaea;
border-radius: 1.5em;
}
.post-actions__label {
cursor: pointer;
margin-top:10px;

}

.widget-post__actions {
width: 100%;
padding: .5em;
}
.post--actions {
position: relative;
padding: .5em;

background-color: #f5f5f5;
color: #a2a6a7;
}
.post-actions__attachments {
display: inline-block;
width: 60%;
}
.attachments--btn {
background-color: #eaeaea;
color: #007582;

border-radius: 1.5em;
}

.post-actions__widget {
display: inline-block;
width: 38%;
text-align: right;
}
.post-actions__publish {
width: 120px;

background-color: #008391;
color: #fff;

border-radius: 1.5em;
}

.scroller::-webkit-scrollbar {
display: none;
}

.is--hidden {
display: none;
}

.sr-only {
width: 1px;
height: 1px;

clip: rect(1px, 1px, 1px, 1px);
-webkit-clip-path: inset(50%);
clip-path: inset(50%);

overflow: hidden;
white-space: nowrap;

position: absolute;
top: 0;

}


/* *  Placeholder contrast * */
::-webkit-input-placeholder {
color: #666;
}
::-moz-placeholder {
color: #666;
}
:-ms-input-placeholder {
color: #666;
}
:-moz-placeholder {
color: #666;
}
</style>
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
        <img class="justify-content-center w-100" src="{{('https://testgit.sapapps.work/moldii/storage/app/banner/'.$ban->banner_name.'')}}" alt="alt">

    </div>

    <br>
    {{-- <div style="background-color: gray" >
        <div class="row">
            <div class="col-6">
                <h1 class="ml-2 mt-1">MOLDII</h1>
                <h1 class="ml-2"> LIVE</h1> 
            </div>
            <div class="col-6 text-right  ">
                <a href="" style="color: white;top: 60%;position: relative;right: 30px;font-size:21px">More > </a>
            </div>

        </div>
    </div>
    <br> --}}

    {{-- <div class="row">
        <div class="col-6 text-left">
            <h2 class="ml-3">ยอดฮิต</h2>
           
        </div>
        <div class="col-6 text-right " >
            <a href="" class="mr-2" style="color: red">ดูทั้งหมด</a>
        </div>

    </div>
    @include("mobile.member.common.content.prelive")

    <br> --}}
    @include("mobile.member.common.content.story")

    
    <br>
    <div class="row">
        <div class="widget-post" aria-labelledby="post-header-title">
            <div class="widget-post__header">
              <h2 class="widget-post__title" id="post-header-title">
                 <i class="fa fa-pencil" aria-hidden="true"></i>
                Write Me
              </h2>
            </div>
            <form id="widget-form" class="widget-post__form" name="form" aria-label="post widget">
                <div class="widget-post__content">
                    <label for="post-content" class="sr-only">Share</label>
                    <textarea name="post" id="post-content" class="widget-post__textarea scroller" placeholder="What's wrong with r00tme?"></textarea>
                </div>
                <div class="widget-post__options is--hidden" id="stock-options">
                </div>
                <div class="widget-post__actions post--actions">
                    <div class="post-actions__attachments">
                        {{-- <button type="button" class="btn post-actions__stock attachments--btn" aria-controls="stock-options" aria-haspopup="true">
                            <i class="fa fa-usd" aria-hidden="true"></i>
                            stock
                        </button> --}}

                        <button type="button" class="btn post-actions__upload attachments--btn">
                            <label for="upload-image" class="post-actions__label">

                                <i class="fa fa-video " aria-hidden="true"></i> 
                            </label>
                        </button>
                        <input type="file" id="upload-video" name="video" accept="video/*;capture=camera">


                        <button type="button" class="btn post-actions__upload attachments--btn">
                            <label for="upload-image" class="post-actions__label">
                                <i class="fa fa-file-image" aria-hidden="true"></i> 
                            </label>
                        </button>
                        <input type="file" id="upload-image" name="img" accept="image/*;capture=camera">
                    </div>

                    <div class="post-actions__widget">
                        <button class="btn post-actions__publish">publish</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="mt-3" name="story_videos_section" id="story_videos_section">

        {{-- <ul class="nav nav-tabs style1 mt-2" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#video" role="tab">Video</a></li>
            {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#podcast" role="tab">Podcast</a></li> 
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#store" role="tab"> Store</a></li>
            <li class="nav-item active"><a class="nav-link " data-toggle="tab" href="#home" role="tab">Family</a></li>

        </ul> --}}

        <div class="tab-content mt-2">


            <div id="home" class="tab-pane fade in active show">

              

                @foreach ($c as $sqls)
                    <?php   $count = DB::Table('tb_comments')->where('comment_object_id', $sqls->new_id)->get();
                            $countreply = DB::Table('tb_comment_replys')->where('news_id',$sqls->new_id)->get();
                    ?>
                    
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
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$count->count() + $countreply->count()}} รายการ</h6>
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">4 แชร์</h6>

                        </div>

                        <div class="card-footer row justify-content-center align-items-center" style="padding-left: 3px; padding-right: 3px;">

                            <div class="col-3 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1 ">ชื่นชอบ</h5>
                            </div>
                            <div class="col-5 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
                                <a href="{{url('content/'.$sqls->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
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


            {{-- <div id="video" class="tab-pane fade">
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
                            <a href="{{url('content/'.$item->new_id.'')}}"><p class="card-text">{{substr($item->new_title,0,80)}}</p></a>

                        </div>
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
                                <a href="{{url('content/'.$item->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
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
            </div> --}}


            {{-- <div id="podcast" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div> --}}



            {{-- <div id="store" class="tab-pane fade">
                <div class="container p-1 my-3">

                    <img class="justify-content-center w-100" src="{{ asset('new_assets/img/4a1ef46ac4bc5a20dd6ea8c2c5d5f5af.png')}}" alt="alt">
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
            </div> --}}


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
        <script src="script.js">

        </script>
        <script>
            var myInputimage = document.getElementById('upload-image');
            var myInputvideo = document.getElementById('upload-video');

            function sendPic() {
                var file = myInputimage.files[0];

                // Send file here either by adding it to a `FormData` object 
                // and sending that via XHR, or by simply passing the file into 
                // the `send` method of an XHR instance.
            }

            myInputimage.addEventListener('change', sendPic, false);
        </script>
    @endsection