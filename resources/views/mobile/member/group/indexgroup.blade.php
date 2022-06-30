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
            <div class="col-2">
                <a href="{{url('cartindex')}}">
                    {{-- <span style="background-color: #34C759 ; color: #fff ;  padding: 2px 5px 2px 5px ; border-radius: 25px ; position: relative; left: 15px ; top: 5px ;">{{$sql->countt}}</span> --}}
                    <ion-icon name="cart" class="md hydrated font-weight-bold bg-white text-danger rounded p-1 mt-1 mb-0 h5" role="img" aria-label="search outline" >
                    </ion-icon>
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
            <h3 class="ml-3">Group</h3>
           
        </div>
        <div class="col-6 text-right " >
            <a href="{{url('/index')}}" class="mr-2" style="color: red">ดูทั้งหมด</a>
        </div>

    </div>
   
    @include("mobile.member.group.groupstory")







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

    @endsection


    @section('custom_script')
    <script>
        var a = "{{Session::get('success')}}";
        if (a) {
            alert(a);
        }

        bottom_now(4);


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
    <script src="script.js">

    </script>
    {{-- <script>
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
    </script> --}}
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
    @endsection