<!-- Bootstrap 4.6 CSS --> 
@extends('mobile.main_layout.main')
@section('app_header')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="appHeader bg-danger text-light">

    <div class="left">
        <a href="javascript:;" class="headerButton" onclick="window.location.replace('{{url('/group')}}');">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        {{$group->name}}
    </div>
    <div class="right"></div>



</div>

@endsection
@section('content')
    <!-- ###### content [ Start ]  ###### -->
    <div>
        {{-- <img class="justify-content-center w-100" src="{{('https://testgit.sapapps.work/moldii/storage/app/banner/'.$ban->banner_name.'')}}" alt="alt"> --}}
        <img src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$group->group_cover.'')}}" alt="alt" width="100%" >

    </div>


    <div class="col-md-12">
        <div class="row">

        {{-- <div class="col-md-12" style="background-color: #D5D8DC ; display: grid; grid-template-columns: auto;  grid-template-rows: 250px 100px; "> 
            image : cover
            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$group->group_cover.'')}}" alt="alt" width="100%" >

        </div> --}}
        
        <div class="col-md-12 pb-2">
            <div class="pt-4" style="font-weight: bold; color: #1C2833 ; font-size: 200% ; " > {{$group->name}} </div> 
            <div class="pt-1 pb-2"><i class="fa fa-solid fa-globe"></i> Public Group <b>{{$cg->count()}}</b> members</div>
            @foreach($cg as $cgs)

                <img class=" rounded-circle  " src="{{asset('storage/profile_cover/'.$cgs->customer_img.'')}}" alt="alt" style="width: 50px; height:50px;" >

            @endforeach
        
            <div class="pt-3 pb-2">
                <a class="btn btn-info" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <b>Joined</b>
                </a>
                <a class="btn btn-secondary" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <b>Leave group</b>
                </a>
                
                    {{-- <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <b>Joined</b>
                        </a>

                    <a href="#" type="button" class="btn btn-primary"><b>Invite</b></a>   

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">item 1</a>
                            <a class="dropdown-item" href="#">item 2</a>
                            <a class="dropdown-item" href="#">item 3</a>
                        </div>
                    </div> --}}

                
            </div>


            <hr> <!-- ------------------ -->
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
                                    <img src="{{ asset('new_assets/icon/ถูกใจ.png')}}" alt="alt" style="width:17px; height:17px;">
                                    {{-- <i onclick="myLike(this)" class="fa fa-thumbs-up"  style="width:17px; height:17px;"></i> --}}
                                    @if($la == null)
                                        <h5 class="mb-0 ml-1 " id="myLike{{$sqls->new_id}}" onclick="myLike({{$sqls->new_id}})">ถูกใจ</h5>
                                    @else
                                        <h5 class="mb-0 ml-1 " id="unmyLike{{$sqls->new_id}}" style="color: green" onclick="UNmyLike({{$sqls->new_id}})">ถูกใจแล้ว</h5>
                                    @endif
                                </div>
                                <div class="col-5 row p-0 align-items-center">
                                    <img src="{{ asset('new_assets/icon/แสดงความคิดเห็น.png')}}" alt="alt" style="width:17px; height:17px;">
                                    <a href="{{url('content/'.$sqls->new_id.'')}}"><h5 class="mb-0 ml-1 ">แสดงความคิดเห็น</h5></a>
                                </div>
                                <div class="col-2 row p-0 align-items-center" data-toggle="modal" data-target="#share" >
                                    <img src="{{ asset('new_assets/icon/แชร์.png')}}" alt="alt" style="width:17px; height:17px;">
                                    <h5 class="mb-0 ml-1" >แชร์</h5>
                                </div>
                                <div class="col-2 row p-0 align-items-center">
                                    <img src="{{asset('new_assets/icon/โดเนท.png')}}" alt="alt" style="width:17px; height:17px;">
                                    <h5 class="mb-0 ml-1">โดเนท</h5>
                                </div>

                            </div>
                        </div>
                    @endforeach
    
        </div>  <!-- col-md-12 line 13 -->


        </div> <!-- row line 7 -->
    </div>
@endsection




<!-- ###### content [ End ] ###### -->
@section('custom_script')
  <script>

      bottom_now(4);
    </script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
@endsection
