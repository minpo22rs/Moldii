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
                        <span style="background-color: #34C759 ; color: #fff ;  padding: 3px 4px 2px 4px ; border-radius: 25px ;  position: absolute; left: 33px ; top: 2px ; font-size:8px; "> {{$countcart->countt}}</span> 
                    </div>
                </a>
            </div>
            <div class="col-2">
                <a href="{{url('user/notification')}}">
                    <ion-icon name="notifications" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline" >
                    </ion-icon>
                </a>
            </div>
            <div class="col-2">
                <ion-icon id="btn_search_2" style="cursor: pointer;"  onclick="myFunction()" name="funnel" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline">
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
                @foreach($cat as $cs)
                    <a href="{{url('user/searcha/2/'. $cs->cat_name.'')}}" style="color:#fff;" class="mr-3  ml-3">{{$cs->cat_name}}</a> 
                @endforeach  
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


    <br>
    <div class="row">
        <div class="col-6 text-left">
            <h3 class="ml-3">กลุ่ม</h3>
           
        </div>
        <div class="col-6 text-right " >
            <a href="{{url('/index')}}" class="mr-2" style="color: red">ดูทั้งหมด</a>
        </div>

    </div>
   
    @include("mobile.member.group.groupstory")



                @foreach ($c as $sqls)
                    <?php   $count = DB::Table('tb_comments')->where('comment_object_id', $sqls->new_id)->get();
                            $countreply = DB::Table('tb_comment_replys')->where('news_id',$sqls->new_id)->get();
                            $bm = DB::Table('tb_bookmarks')->where('id_ref',$sqls->new_id)->where('customer_id',Session::get('cid'))->first();
                            $la = DB::Table('tb_content_likes')->where('content_id',$sqls->new_id )->where('customer_id',Session::get('cid'))->first();
                            $sh = DB::Table('tb_content_shares')->where('new_id',$sqls->new_id)->get();
                    ?>
                    
                    <div class="card my-3">
                        <div class="card-body row col-12 justify-content-center m-0">
                            <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

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
                            <a href="{{url('content/'.$sqls->new_id.'')}}" class="card-text">{{$sqls->new_title}}</a>

                        </div>
                        <a href="{{url('content/'.$sqls->new_id.'')}}"><img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$sqls->new_img.'')}}" alt="alt" class="w-100" style="width: 375px; height: 197px;"></a>

                        <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sqls->like?''.$sqls->like.'':'0'}} ชื่นชอบ</h6>
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$count->count() + $countreply->count()}} รายการ</h6>
                            <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sh->count()}} แชร์</h6>

                        </div>

                        <div class="card-footer row justify-content-center align-items-center" style="padding-left: 3px; padding-right: 3px;">

                            <div class="col-3 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                                @if($la == null)
                                    <h5 class="mb-0 ml-1 " id="myLike{{$sqls->new_id}}" onclick="myLike({{$sqls->new_id}})">ถูกใจ</h5>
                                @else
                                    <h5 class="mb-0 ml-1 " id="unmyLike{{$sqls->new_id}}" style="color: green" onclick="UNmyLike({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                                @endif
                            </div>
                            <div class="col-5 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
                                <a href="{{url('content/'.$sqls->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
                            </div>
                            <div class="col-2 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/share.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1">แชร์</h5>
                            </div>
                            {{-- <div class="col-2 row p-0 align-items-center">
                                <img src="{{ asset('new_assets/img/icon/diamond.png')}}" alt="alt" style="width:17px; height:17px;">
                                <h5 class="mb-0 ml-1">โดเนท</h5>
                            </div> --}}

                        </div>
                    </div>
                @endforeach

    @endsection


    @section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if (a) {
            alert(a);
        }

        bottom_now(4);

        
    </script>
    <script src="script.js">

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
        
            var x = document.getElementById("myLike"+id);
            
            x.innerHTML = "ถูกใจแล้ว";
            document.getElementById("myLike"+id).style.color = "green";
            $.ajax({
                url: '{{ url("/likecontent")}}',
                type: 'GET',
                dataType: 'HTML',
                data: {'id':id},
                success: function(data) {
                
                }
            });
            
        }


        function UNmyLike(id) {
        
            var x = document.getElementById("unmyLike"+id);
        
        
            x.innerHTML = "ถูกใจ";
            document.getElementById("unmyLike"+id).style.color = "black";
            $.ajax({
                url: '{{ url("/unlikecontent")}}',
                type: 'GET',
                dataType: 'HTML',
                data: {'id':id},
                success: function(data) {
                
                
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
                
                        alert('ติดตามผู้เขียนแล้ว');

                
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
                    
                        alert('เลิกติดตามผู้เขียนแล้ว');

                
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
                        alert('ซ่อนโพสต์เรียบร้อยแล้ว');
                        window.location.reload();
                    }
                });
        } 


        function deletecontent(id){
                if (confirm("ยืนยันการลบโพสต์ใช่หรือไม่") == true) {
                    $.ajax({
                        url: '{{ url("/deletecontent")}}',
                        type: 'GET',
                        dataType: 'HTML',
                        data: {'id':id},
                        success: function(data) {
                            alert('ลบโพสต์เรียบร้อยแล้ว');
                            window.location.reload();
                        
                        }
                    });
                } else {
                    
                }

            
        }
    </script>
    @endsection