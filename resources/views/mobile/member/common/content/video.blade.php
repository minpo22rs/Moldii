
@extends('mobile.main_layout.main')
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


@section('app_header')

    <div class="appHeader bg-danger text-light">

        <div class="pageTitle">

        </div>
        <div class="right">

        </div>
        <div class="m-1 w-100">

            <div class="row">
            
                <div class="col-2 ">
                    <div id="btn_search_2" style="cursor: pointer;"  onclick="myFunction()"  class="md hydrated bg-white text-danger rounded p-1 mt-1 mb-0 h5 text-center">
                     <img  src="{{ asset('new_assets/icon/ตัวกรอง.png')}}" >
                    </div>
                </div>
                
                <div class="col-6">
                    <form action="{{url('user/search')}}" method="POST" class="search-form">
                        @csrf
                        <div class="form-group searchbox mt-1 mb-0">
                            <input type="text" name="text" class="form-control" id="input_search_1" placeholder="Search..." style="padding: 20px ">
                            <!-- <i class="input-icon" >
                                <ion-icon name="search-outline" role="img" class="md hydrated" aria-label="search outline"></ion-icon>
                            </i> -->
                        </div>
                        
                    </form>
                </div>
                <?php $countcart = DB::Table('tb_carts')->select(DB::raw('SUM(count) as countt'))->where('customer_id',Session::get('cid'))->first(); ?>
               
                <div class="col-2 mt-1">
                    <a href="{{url('cartindex')}}" > 
                        <div class="  md hydrated  bg-white text-danger rounded p-1 mb-1 h5 text-center">
                            <!-- <ion-icon name="cart" class=" font-weight-bold" role="img"  aria-label="search outline" ></ion-icon> -->
                            <img  src="{{ asset('new_assets/icon/ตะกร้า.png')}}" >
                            <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$countcart->countt != null ?$countcart->countt:'0'}}</span> 
                        </div>
                    </a>
                </div>
    
                <div class="col-2">
                    <a href="{{url('user/notification')}}">
                        <div  class="md hydrated bg-white text-danger rounded p-1 mt-1 mb-1 h5 text-center">
                            <img  src="{{ asset('new_assets/icon/แจ้งเตือน.png')}}" >
                        </div>
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
ิ<br>
        @foreach ($v as $sqls)
            <?php   $count = DB::Table('tb_comments')->where('comment_object_id', $sqls->new_id)->get();
                    $countreply = DB::Table('tb_comment_replys')->where('news_id',$sqls->new_id)->get();
                    $imggal = DB::Table('tb_new_imgs')->where('new_id',$sqls->new_id)->get();
                    $bm = DB::Table('tb_bookmarks')->where('id_ref',$sqls->new_id)->where('customer_id',Session::get('cid'))->first();
                    $la = DB::Table('tb_content_likes')->where('content_id',$sqls->new_id )->where('customer_id',Session::get('cid'))->first();
                    $sh = DB::Table('tb_content_shares')->where('new_id',$sqls->new_id)->get();
            
            
            ?>
            <div class="card my-3">
                <div class="card-body row col-12 justify-content-center m-0">
                    <img src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">
                   

                    <div class="card-title col-8  align-self-center m-0 ">
                        <div class="card-title m-0 row align-self-center">
                            
                            <h4 class=" m-0 p-0">{{$sqls->created_by}}</h4>
                            
                        </div>
                        <h6 class=" m-0 p-0">{{$sqls->created_at}}</h6>
                    </div>

                    <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
                        @if($bm !== null)

                            <div id="bmm{{$sqls->new_id}}" style="margin-right: 10px">
                                <ion-icon name="bookmark" style="font-size:25px" onclick="unbookmark({{$sqls->new_id}})" ></ion-icon>
                            </div>
                            

                        @else
                            <div id="bmoll{{$sqls->new_id}}" style="margin-right: 10px">
                                <ion-icon name="bookmark-outline" style="font-size:25px" onclick="bookmarkadd({{$sqls->new_id}})"></ion-icon>
                            </div>
                            
                        @endif

                        <div style="display: none" id="bmol{{$sqls->new_id}}" style="margin-right: 10px">
                            <ion-icon name="bookmark-outline" style="font-size:25px" onclick="bookmarkadd2({{$sqls->new_id}})"></ion-icon>

                        </div>

                        <div style="display: none" id="bm{{$sqls->new_id}}" style="margin-right: 10px">
                            <ion-icon name="bookmark" style="font-size:25px" onclick="unbookmark2({{$sqls->new_id}})" ></ion-icon>
                        </div>


                        <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px" data-toggle="dropdown" aria-expanded="false"></ion-icon>
                        <div class="dropdown-menu dropdown-menu-right">
                            
                            <a class="dropdown-item" href="{{url('contentreport/'.$sqls->new_id.'')}}">report</a>
                        </div>

                    </div>
                </div>
                <div class="card-body p-2">
                    <a href="{{url('content/'.$sqls->new_id.'')}}"><p class="card-text">{{$sqls->new_title}}</p></a>
                    {{-- <a href="{{url('content/'.$item->new_id.'')}}"><p class="card-text">{{substr($item->new_title,0,80)}}</p></a> --}}

                </div>
                {{-- <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" class="w-100" style="width: 375px; height: 197px;"> --}}
                <iframe width="auto" height="215" src="https://www.youtube.com/embed/{{$sqls->new_img}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
                    <h6 class="mb-0 ml-1 card-subtitle text-muted" id="countlike{{$sqls->new_id}}">{{$sqls->like?''.$sqls->like.'':'0'}} ชื่นชอบ</h6>
                    <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$count->count() + $countreply->count()}} รายการ</h6>
                    <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sh->count()}} แชร์</h6>
                </div>

                <div class="card-footer row justify-content-center ">

                    <div class="col-3 row p-0  justify-content-center" id="likebutton{{$sqls->new_id}}" style="display: ">
                        <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                        @if($la == null)
                            <h5 class="mb-0 ml-1 " id="myLike{{$sqls->new_id}}" style="color: black" onclick="myLike({{$sqls->new_id}})">ถูกใจ</h5>
                        @else
                            <h5 class="mb-0 ml-1 " id="unmyLike{{$sqls->new_id}}" style="color: green" onclick="UNmyLike({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                        @endif
                    </div>


                    <div style="display: none" class="col-3 row p-0  justify-content-center" id="myLike2{{$sqls->new_id}}" >
                        <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                        <h5 class="mb-0 ml-1 " style="color: black" onclick="myLike2({{$sqls->new_id}})">ถูกใจ</h5>
                    </div>

                    <div style="display: none" class="col-3 row p-0  justify-content-center" id="unmyLike2{{$sqls->new_id}}">
                        <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                        <h5 class="mb-0 ml-1 "  style="color: green" onclick="UNmyLike2({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                    </div>




                    <div class="col-5 row p-0 justify-content-center ml-1 ">
                        <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
                        <a href="{{url('content/'.$sqls->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
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
                Swal.fire({
                    text : a,
                    confirmButtonColor: "#fc684b",
                })
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

            
            searchCon.addEventListener('click', () => {
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



        {{-- bookmarkadd like followContent--}}
        <script>

            function bookmarkadd(id)
            {
                                
                document.getElementById('bm'+id).style.display = '';
                document.getElementById('bmoll'+id).style.display = 'none';
                // document.getElementById('bmol'+id).style.display = 'none';
                $.ajax({
                    url: '{{ url("/bookmarkadd")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
            }

            function unbookmark(id)
            {
                document.getElementById('bm'+id).style.display = 'none';
                document.getElementById('bmol'+id).style.display = '';
                $.ajax({
                    url: '{{ url("/unbookmark")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
            }


            function bookmarkadd2(id)
            {
                                
                document.getElementById('bm'+id).style.display = '';
                document.getElementById('bmol'+id).style.display = 'none';
                // document.getElementById('bmol'+id).style.display = 'none';
                $.ajax({
                    url: '{{ url("/bookmarkadd")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
            }

            function unbookmark2(id)
            {
                document.getElementById('bm'+id).style.display = 'none';
                document.getElementById('bmol'+id).style.display = '';
                $.ajax({
                    url: '{{ url("/unbookmark")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                    }
                });
            }



            function myLike(id) {
            
            // var x = document.getElementById("myLike"+id);
            
            // x.innerHTML = "ถูกใจแล้ว";
            // document.getElementById("myLike"+id).style.color = "green";
                $.ajax({
                    url: '{{ url("/likecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        document.getElementById("countlike"+id).innerHTML = data + ' ชื่นชอบ';
                        document.getElementById("unmyLike2"+id).style.display = '';
                        document.getElementById("likebutton"+id).style.display = 'none';
                    }
                });
                
            }


            function UNmyLike(id) {
            
                // var x = document.getElementById("unmyLike"+id);
            
            
                // x.innerHTML = "ถูกใจ";
                document.getElementById("unmyLike"+id).style.color = "black";
                $.ajax({
                    url: '{{ url("/unlikecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        document.getElementById("countlike"+id).innerHTML = data + ' ชื่นชอบ';
                        document.getElementById("myLike2"+id).style.display = '';
                        document.getElementById("likebutton"+id).style.display = 'none';
                    
                    }
                });
                
                
            }

            function myLike2(id) {
            
                // var x = document.getElementById("myLike2"+id);
                
                // x.innerHTML = "ถูกใจแล้ว";
                // document.getElementById("myLike2"+id).style.color = "green";
                $.ajax({
                    url: '{{ url("/likecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        document.getElementById("countlike"+id).innerHTML = data + ' ชื่นชอบ';
                        document.getElementById("likebutton"+id).style.display = '';
                        document.getElementById("myLike2"+id).style.display = 'none';
                    
                    }
                });
                
            }


            function UNmyLike2(id) {
            
                // var x = document.getElementById("unmyLike2"+id);
            
            
                // x.innerHTML = "ถูกใจ";
                document.getElementById("unmyLike2"+id).style.color = "black";
                $.ajax({
                    url: '{{ url("/unlikecontent")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        document.getElementById("countlike"+id).innerHTML = data + ' ชื่นชอบ';
                        document.getElementById("likebutton"+id).style.display = '';
                        document.getElementById("unmyLike2"+id).style.display = 'none';
                    
                    
                    }
                });
                
                
            }


            function followContent(v,id) {
            
                var x = document.getElementById("follow"+v);

                x.innerHTML = "ติดตามแล้ว";
                document.getElementById("follow"+v).style.color = "green";

                $.ajax({
                    url: '{{ url("/followwriter")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                    
                            Swal.fire({
                                    text : "ติดตามผู้เขียนแล้ว",
                                    confirmButtonColor: "#fc684b",
                                })

                    
                    }
                });

            
            }

            function UNfollowContent(v,id){
                var x = document.getElementById("unfollow"+v);

                x.innerHTML = "ติดตาม";
                document.getElementById("unfollow"+v).style.color = "rgba(255, 92, 99, 1)";

                $.ajax({
                    url: '{{ url("/unfollowwriter")}}',
                    type: 'GET',
                    dataType: 'HTML',
                    data: {'id':id},
                    success: function(data) {
                        
                            Swal.fire({
                                    text : "เลิกติดตามผู้เขียนแล้ว",
                                    confirmButtonColor: "#fc684b",
                                })

                    
                    }
                });

            }

        </script>

        {{-- hide delete --}}
        <script>
            function hidecontent(id){

                    $.ajax({
                        url: '{{ url("/hidecontent")}}',
                        type: 'GET',
                        dataType: 'HTML',
                        data: {'id':id},
                        success: function(data) {
                            Swal.fire({
                                text : "ซ่อนโพสต์เรียบร้อยแล้ว",
                                confirmButtonColor: "#fc684b",
                            })
                            window.location.reload();
                        }
                    });
            } 


            function deletecontent(id){
                    Swal.fire({
                        text: 'ยืนยันการลบโพสต์ใช่หรือไม่',
                        showCancelButton: true,
                        confirmButtonText: 'ยืนยัน',
                        cancelButtonText: 'ยกเลิก',
                        confirmButtonColor: "#fc684b",

                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ url("/deletecontent")}}',
                                type: 'GET',
                                dataType: 'HTML',
                                data: {'id':id},
                                success: function(data) {
                                    Swal.fire({
                                        text : "ลบโพสต์เรียบร้อยแล้ว",
                                        confirmButtonColor: "#fc684b",
                                    })
                                    window.location.reload();
                                
                                }
                            });
                        } else if (result.isDismissed) {
                            
                        }
                    })

                   
                }
        </script>

@endsection
    