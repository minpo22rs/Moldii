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