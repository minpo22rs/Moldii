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
<div class="appHeader bg-danger text-light">

    {{-- <div class="pageTitle">

    </div> --}}
    {{-- <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.location.replace('/index')"></ion-icon>
    </div> --}}
    <div class="pageTitle">

        <div class="row ml-3">
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
                </ion-icon></a>
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
<div id="search_box_2">
    <h3> Recent Search</h3>
    <p> 
        @if(Session::get('recent') != null)
            @foreach (Session::get('recent') as $text)
                <a href="{{url('user/searcha/1/'. $text.'')}}">
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


  

        <ul class="nav nav-tabs style1 mt-2" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#post" role="tab">Posts</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#product" role="tab">Prodcuts</a></li> 

        </ul>

        <div class="tab-content mt-2">


            <div id="post" class="tab-pane fade in active show">
                @if($sqlc->count() !=0)
                    @foreach ($sqlc as $sqls)
                        <?php   
                        
                                $post = DB::Table('tb_news')->where('new_id', $sqls->tag_fkey)->first();
                                // dd($post);
                                $count = DB::Table('tb_comments')->where('comment_object_id', $post->new_id)->get();
                                $countreply = DB::Table('tb_comment_replys')->where('news_id',$post->new_id)->get();
                                $bm = DB::Table('tb_bookmarks')->where('id_ref',$post->new_id)->where('customer_id',Session::get('cid'))->first();
                                $la = DB::Table('tb_content_likes')->where('content_id',$post->new_id )->where('customer_id',Session::get('cid'))->first();
                                $sh = DB::Table('tb_content_shares')->where('new_id',$post->new_id)->get();
                                $imggal = DB::Table('tb_new_imgs')->where('new_id',$post->new_id)->get();
                        ?>
                        
                        <div class="card my-3">
                            <div class="card-body row col-12 justify-content-center m-0">
                                <img src="{{ asset('new_assets/img/sample/photo/2.jpg')}}" alt="alt" class=" rounded-circle  " style="width: 35px; height:35px;">

                                <div class="card-title col-8  align-self-center m-0 ">
                                    <div class="card-title m-0 row align-self-center">
                                        <h4 class=" m-0 p-0">{{$post->created_by}}</h4>
                                        
                                    </div>
                                    <h6 class=" m-0 p-0">{{$post->created_at}}</h6>
                                </div>

                                <div class="card-title col-3 row p-0 mb-0  align-self-center justify-content-center ">
                                    @if($bm !== null)
    
                                        <div id="bmm{{$post->new_id}}" style="margin-right: 10px">
                                            <ion-icon name="bookmark" style="font-size:25px" onclick="unbookmark({{$post->new_id}})" ></ion-icon>
                                        </div>
                                        
    
                                    @else
                                        <div id="bmoll{{$post->new_id}}" style="margin-right: 10px">
                                            <ion-icon name="bookmark-outline" style="font-size:25px" onclick="bookmarkadd({{$post->new_id}})"></ion-icon>
                                        </div>
                                        
                                    @endif
    
                                    <div style="display: none" id="bmol{{$post->new_id}}" style="margin-right: 10px">
                                        <ion-icon name="bookmark-outline" style="font-size:25px" onclick="bookmarkadd2({{$post->new_id}})"></ion-icon>
    
                                    </div>
    
                                    <div style="display: none" id="bm{{$post->new_id}}" style="margin-right: 10px">
                                        <ion-icon name="bookmark" style="font-size:25px" onclick="unbookmark2({{$post->new_id}})" ></ion-icon>
                                    </div>
    
    
                                    <ion-icon name="ellipsis-horizontal-outline" style="font-size:25px" data-toggle="dropdown" aria-expanded="false"></ion-icon>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        
                                        <a class="dropdown-item" href="{{url('contentreport/'.$post->new_id.'')}}">report</a>
                                    </div>
    
                                </div>
                            </div>
                            

                            <div class="card-body p-2">
                                <a href="{{url('content/'.$post->new_id.'')}}" class="card-text">{{$post->new_title}}</a>
                            </div>

                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
                               
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$post->new_img.'')}}" class="d-block w-100" alt="...">
                                    </div>
                                    @foreach($imggal as $imgs)
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                        </ol>
                                        <div class="carousel-item">
                                            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/news/'.$imgs->name.'')}}" class="d-block w-100" style="width: 375px; height: 197px;">
                                        </div>
                                    @endforeach
                                  
                                </div>
                            </div>
                            

                            <div class="card-title row col-12 mb-0 p-1 pr-0 mt-1 justify-content-end">
                                <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$post->like?''.$post->like.'':'0'}} ชื่นชอบ</h6>
                                <h6 class="mb-0 ml-1 card-subtitle text-muted">ความคิดเห็น {{$count->count() + $countreply->count()}} รายการ</h6>
                                <h6 class="mb-0 ml-1 card-subtitle text-muted">{{$sh->count()}} แชร์</h6>

                            </div>

                            <div class="card-footer row justify-content-center align-items-center" style="padding-left: 3px; padding-right: 3px;">

                                <div class="col-3 row p-0 align-items-center">
                                    <img src="{{ asset('new_assets/img/icon/heart 1.png')}}" alt="alt" style="width:17px; height:17px;">
                                    @if($la == null)
                                        <h5 class="mb-0 ml-1 " id="myLike{{$post->new_id}}" onclick="myLike({{$post->new_id}})">ถูกใจ</h5>
                                    @else
                                        <h5 class="mb-0 ml-1 " id="unmyLike{{$post->new_id}}" style="color: green" onclick="UNmyLike({{$post->new_id}})">ถูกใจแล้ว</h5>
                                    @endif
                                </div>
                                <div class="col-5 row p-0 align-items-center">
                                    <img src="{{ asset('new_assets/img/icon/chat.png')}}" alt="alt" style="width:17px; height:17px;">
                                    <a href="{{url('content/'.$post->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
                                </div>
                                <div class="col-2 row p-0 align-items-center"  data-toggle="modal" data-target="#share" >
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
                @else
                    <p style="text-align: center;">ไม่พบการค้นหาล่าสุด</p>
                @endif
            </div>



            <div id="product" class="tab-pane fade">
                @if($sqlp->count() !=0)
                    @foreach ($sqlp as $sqls)
                        <?php   
                        
                                $product = DB::Table('tb_products')->where('product_id', $sqls->tag_fkey)->first();
                                // dd($post);
                                $count = DB::Table('tb_comments')->where('comment_object_id', $product->product_id )->get();
                                $countreply = DB::Table('tb_comment_replys')->where('news_id',$product->product_id)->get();
                        ?>

                        <div class="mt-3 p-2 col-md-12">
                            <div class="row">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-4">
                                            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$product->product_img.'')}}" class="d-block w-100" alt="...">

                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                            <h5 class="card-title">{{$product->product_name}}</h5>
                                            <p class="card-text">{{$product->product_description}}</p>
                                            <button type="button" class="btn btn-primary btn-sm">ซื้อสินค้า</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    @endforeach
                @else
                    <p style="text-align: center;">ไม่พบการค้นหาล่าสุด</p>
                @endif
            </div>



        </div>


           <!-- Modal share -->
           <div class="modal fade" id="share" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">  <!--  แก้ ID share ให้ตรงกับ data-target ด้านบน -->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" >แบ่งปันข้อมูล</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        
                    
                        <?php $urlen = urlencode("https://modii.sapapps.work/content/1")?>
                    
                            <br>
                            <div class="row justify-content-around p-1 ">
                                <a href="" class="m-0 text-center align-self-end  share-item">
                                    <img src="{{ asset('new_assets/img/icon/share/LINE.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                    <h5 class="font-weight-bold m-0 mt-1">Line</h5>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{$urlen}}" class="m-0 text-center  align-self-end share-item">
                                    <img src="{{ asset('new_assets/img/icon/share/facebook.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                    <h5 class="font-weight-bold m-0 mt-1">Facebook</h5>

                                </a>
                                <a href="" class="m-0 text-center align-self-end  share-item">
                                    <img src="{{ asset('new_assets/img/icon/share/Link.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                    <h5 class="font-weight-bold m-0 mt-1">Copy link</h5>

                                </a>
                                <a href="" class="m-0 text-center align-self-end  share-item">
                                    <img src="{{ asset('new_assets/img/icon/share/Messenger.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                    <h5 class="font-weight-bold m-0 mt-1">Messenger</h5>

                                </a>
                                {{-- <a href="" class="m-0 text-center align-self-end  share-item">
                                    <img src="{{ asset('new_assets/img/icon/share/Email.svg')}}" alt="alt" class=" " style="width:47px; height:47px;">
                                    <h5 class="font-weight-bold m-0 mt-1">Email</h5>
                                </a> --}}
                                <div class="row col-11 mt-4 p-0">
                                    <button type="button" data-dismiss="modal" class="btn  btn-block font-weight-bold" style="background-color:rgba(255, 92, 99, 1); color:#FFF; font-size:15px; border-radius: 8px;">ยกเลิก</button>
                                </div>               
                            </div>
                        <br>

                    </div>
               
                </div>
            </div>
        </div>
        <!-- /end Modal share -->

@endsection


    @section('custom_script')
        <script>
            var a = "{{Session::get('success')}}";
            if (a) {
                alert(a);
            }

            bottom_now(1);

          
            
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
        <script src="script.js"> </script>

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