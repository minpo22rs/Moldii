@extends('mobile.main_layout.main')

@section('app_header')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap');


        .postblog_wrapper{
        background: #fff;
        max-width: 475px;
        width: 100%;
        border-radius: 15px;
        padding: 25px 25px 15px 25px;
        box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
        }
        .postblog_input-box{
        padding-top: 10px;
        border-bottom: 1px solid #e6e6e6;
        }
        .postblog_input-box .postblog_tweet-area{
        position: relative;
        min-height: 130px;
        max-height: 170px;
        overflow-y: auto;
        }
        .postblog_tweet-area::-webkit-scrollbar{
        width: 0px;
        }
        .postblog_tweet-area .postblog_placeholder{
        position: absolute;
        margin-top: -3px;
        font-size: 22px;
        color: #98A5B1;
        pointer-events: none;
        }
        .postblog_tweet-area .postblog_input{
        outline: none;
        font-size: 17px;
        min-height: inherit;
        word-wrap: break-word;
        word-break: break-all;
        }
        .postblog_tweet-area .postblog_editable{
        position: relative;
        z-index: 5;
        }
        .postblog_tweet-area .postblog_readonly{
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        color: transparent;
        background: transparent;
        }
        .postblog_readonly .postblog_highlight{
        background: #fd9bb0;
        }

        .postblog_bottom{
        display: flex;
        margin-top: 13px;
        align-items: center;
        justify-content: space-between;
        }
        .postblog_bottom .postblog_icons{
        display: inline-flex;
        }
        .postblog_icons li{
        list-style: none;
        color: #1da1f2;
        font-size: 20px;
        margin: 0 2px;
        height: 38px;
        width: 38px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background 0.2s ease;
        }
        .postblog_bottom .postblog_content{
        display: flex;
        align-items: center;
        justify-content: center;
        }
        .postblog_bottom .postblog_counter{
        color: #333;
        display: none;
        font-weight: 500;
        margin-right: 15px;
        padding-right: 15px;
        border-right: 1px solid #aab8c2;
        }
        .postblog_bottom button{
        padding: 9px 18px;
        border: none;
        outline: none;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 700;
        background: #1da1f2;
        color: #fff;
        cursor: pointer;
        opacity: 0.5;
        pointer-events: none;
        transition: background 0.2s ease;
        }
        .postblog_bottom button.active{
        opacity: 1;
        pointer-events: auto;
        }
        .postblog_bottom button:hover{
        background: #0d8bd9;
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
        <img class="justify-content-center w-100" src="{{ asset('new_assets/img/4a1ef46ac4bc5a20dd6ea8c2c5d5f5af.png')}}" alt="alt">

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

    <div class="row">

        <div class="postblog_wrapper m-2">
            {{-- <div >
                <input type="text" class="form-control" placeholder='หัวข้อ' name="title" style="border: 10px">
                
            </div>
            <br> --}}
            <div class="postblog_input-box">
            <div class="postblog_tweet-area">
                <span class="postblog_placeholder">What's happening?</span>
                <div class="postblog_input postblog_editable" contenteditable="true" spellcheck="false"></div>
                <div class="postblog_input postblog_readonly" contenteditable="true" spellcheck="false"></div>
            </div>
            
            </div>
            <div class="postblog_bottom">
            <ul class="postblog_icons">
                <li><i class="far fa-file-image"></i></li>
                <li><i class="far fa-solid fa-music"></i></li>
                <li><i class="far fa-solid fa-link"></i></li>
            </ul>
            <div class="postblog_content">
                {{-- <span class="postblog_counter">1000</span>  --}}
                <button>Post</button>
            </div>
            </div>
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
            const wrapper = document.querySelector(".postblog_wrapper"),
            editableInput = wrapper.querySelector(".postblog_editable"),
            readonlyInput = wrapper.querySelector(".postblog_readonly"),
            placeholder = wrapper.querySelector(".postblog_placeholder"),
            counter = wrapper.querySelector(".postblog_counter"),
            button = wrapper.querySelector("button");
                
                editableInput.onfocus = ()=>{
                placeholder.style.color = "#c5ccd3";
            }
            editableInput.onblur = ()=>{
                placeholder.style.color = "#98a5b1";
            }
            
            editableInput.onkeyup = (e)=>{
                let element = e.target;
                validated(element);
            }
            editableInput.onkeypress = (e)=>{
                let element = e.target;
                validated(element);
                placeholder.style.display = "none";
            }
            
            function validated(element){
                let text;
                let maxLength = 1000;
                let currentlength = element.innerText.length;
            
                if(currentlength <= 0){
                placeholder.style.display = "block";
                counter.style.display = "none";
                button.classList.remove("active");
                }else{
                placeholder.style.display = "none";
                counter.style.display = "block";
                button.classList.add("active");
                }
            
                counter.innerText = maxLength - currentlength;
            
                if(currentlength > maxLength){
                let overText = element.innerText.substr(maxLength); //extracting over texts
                overText = `<span class="highlight">${overText}</span>`; //creating new span and passing over texts
                text = element.innerText.substr(0, maxLength) + overText; //passing overText value in textTag variable
                readonlyInput.style.zIndex = "1";
                counter.style.color = "#e0245e";
                button.classList.remove("active");
                }else{
                readonlyInput.style.zIndex = "-1";
                counter.style.color = "#333";
                }
                readonlyInput.innerHTML = text; //replacing innerHTML of readonly div with textTag value
            }
        </script>
    @endsection