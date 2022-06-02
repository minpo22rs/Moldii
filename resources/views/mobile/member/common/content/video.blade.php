
@extends('mobile.main_layout.main')
<style>
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

@section('app_header')

    <div class="appHeader bg-danger text-light">

        <div class="pageTitle">

        </div>
        <div class="right">

        </div>
        <div class="m-1 w-100">

            <div class="row">
                <div class="col-10">
                    <form action="{{url('video')}}">
                        <div class="form-group searchbox mt-1 mb-0">
                            <input type="text" class="form-control" id="input_search_1" placeholder="Search...">  <!-- ทำหน้ารับฟรอมแล้วแสดงรายการเลย พี่สร้างหน้าใหม่ไม่เป็น ไม่อยากมั่ว Controllers กลัวพัง 55  -->
                            <i class="input-icon">
                                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline" type="submit"></ion-icon>
                            </i>
                        </div>
                    </form>
                </div>
                <div class="col-2">
                    <ion-icon id="btn_search_2" onclick="myFunction()" style="cursor: pointer;" name="funnel" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline">
                    </ion-icon>
                </div>
            </div>

        </div>

        <!-- Show List Menu btn_search_2 [Start]-->
        <div id="search_2" >
            <div class="mt-2">
                <div style="left: 16px;  position: absolute; " class="mt-2">
                     <ion-icon name="close" onclick="myFunction()"  aria-label="search outline" ></ion-icon>
                </div>
                <br><br>     
                    @foreach($c as $cs)
                        <a href="#" style="color:#fff;" class="mr-3  ml-3">{{$cs->cat_name}}</a> 
                    @endforeach  
            </div>
        </div>
        <!-- Show List Menu btn_search_2 [End]--> 

    </div>
@endsection
    
@section('content')
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
                    <a href="{{url('content/'.$item->new_id.'')}}"><p class="card-text">{{$item->new_title}}</p></a>
                    {{-- <a href="{{url('content/'.$item->new_id.'')}}"><p class="card-text">{{substr($item->new_title,0,80)}}</p></a> --}}

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
                        <a href="{{url('content/'.$item->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
                    </div>
                    <div class="col-2 row p-0 justify-content-center ml-1 ">
                        <img src="{{ asset('new_assets/img/icon/share.png')}}" alt="alt" style="width:17px; height:17px;">
                        <h5 class="mb-0 ">แชร์</h5>
                    </div>
                    {{-- <div class="col-3 row p-0 justify-content-center  ">
                        <img src="{{ asset('new_assets/img/icon/diamond.png')}}" alt="alt" style="width:17px; height:17px;">
                        <h5 class="mb-0 ml-1">โดเนท</h5>
                    </div> --}}

                </div>
            </div>
        @endforeach

@endsection

@section('custom_script')
        <script>

            bottom_now(2);


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
    