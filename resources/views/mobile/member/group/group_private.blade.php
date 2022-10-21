<!-- Bootstrap 4.6 CSS --> 
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
    width: auto;
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
<br>
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-12" style="background-color: #D5D8DC ; display: grid; grid-template-columns: auto;  grid-template-rows: 250px 100px; "> 
                <img src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$group->group_img.'')}}" alt="alt" >
                
            </div>
            
            <div class="col-md-12">
                <div class="pt-4" style="font-weight: bold; color: #1C2833 ; font-size: 200% ; " >{{$group->name}}  </div> 
                <div class="pt-1 pb-2"><i class="fa fa-solid fa-lock"></i> Private Group<b> {{$cg->count()}}</b> members</div>
                @if($chk != null && $chk->status_group == 2)
                    @foreach($cg as $cgs)

                        <img class=" rounded-circle  " src="{{asset('storage/profile_cover/'.$cgs->customer_img.'')}}" alt="alt" style="width: 50px; height:50px;" >

                    @endforeach
                @endif

                <div class="pt-3" style="font-weight: bold; color: #1C2833 ; font-size: 100% ; " >{{$group->description}}  </div> 
                @if($chk != null && $chk->status_group == 2)
                    <div class="row col-12">
                        <div class="pt-3 pb-2 col-6">
                            <a href="{{url('requestjoingroup/2/'.$group->id.'')}}" type="button" class="btn btn-primary btn-block"><b>Joined</b></a>
                        </div>
                        <div class="pt-3 pb-2 col-6">
                            <a href="{{url('requestjoingroup/3/'.$group->id.'')}}" type="button" class="btn btn-secondary btn-block"><b>Leave group</b></a>
                        </div>
                    </div>

                @elseif($chk == null || $chk->status_group != 1)
                    <div class="pt-3 pb-2"><a href="{{url('requestjoingroup/2/'.$group->id.'')}}" type="button" class="btn btn-primary btn-block"><b>Join Group</b></a></div>
                @else
                    <div class="pt-3 pb-2"><a href="{{url('requestjoingroup/3/'.$group->id.'')}}" type="button" class="btn btn-info btn-block"><b>Pendding</b></a></div>
                @endif
                <hr> <!-- ------------------ -->


                @if($chk != null && $chk->status_group == 2)
                    {{-- Write Me --}}
                  
                    <div class="row">
                        <div class="col-12 pl-2 pr-2">
                            <div class="widget-post" aria-labelledby="post-header-title">
                                <div class="widget-post__header">
                                <h2 class="widget-post__title" id="post-header-title">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Write Me
                                </h2>
                                </div>
                                <form id="widget-form" class="widget-post__form" name="form" action="{{url('userpostcontent')}}" method="POST" aria-label="post widget" enctype="multipart/form-data">
                                    @csrf

                                    <div class="widget-post__content">
                                        <label for="post-content" class="sr-only">Share</label>
                                        <textarea name="post" id="post-content" class="widget-post__textarea scroller" placeholder="What's happening?" required></textarea>
                                        <div class="row" id="rowsocial"> </div>
                                        
                                    </div>
                                    <div class="widget-post__options is--hidden" id="stock-options">
                                    </div>
                                    <div class="widget-post__actions post--actions">
                                        <div class="post-actions__attachments">
                                            {{-- <button type="button" class="btn post-actions__stock attachments--btn" aria-controls="stock-options" aria-haspopup="true">
                                                <i class="fa fa-usd" aria-hidden="true"></i>
                                                stock
                                            </button> --}}

                                            <button type="button" class="btn post-actions__upload attachments--btn" onclick="addimagegallery()">
                                                <label for="upload-video" class="post-actions__label">

                                                    <i class="fa fa-video " aria-hidden="true"></i> 
                                                </label>
                                            </button>
                                            {{-- <input type="file" id="upload-video" name="video[0]" accept="video/mp4;capture=camera" multiple onclick="addimagegallery()"> --}}

                                            <button type="button" class="btn post-actions__upload attachments--btn" onclick="addimagegallery()">
                                                <label for="upload-image" class="post-actions__label">
                                                    <i class="fa fa-file-image" aria-hidden="true"></i> 
                                                </label>
                                            </button>
                                            {{-- <input type="file" id="upload-image" name="img[0]" accept="image/*;capture=camera" multiple onchange="addimagegallery()"> --}}
                                        </div>

                                        <div class="post-actions__widget">
                                            <button class="btn post-actions__publish">Post</button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>

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
                                    @if($sqls->customer_id != 0)
                                        <div class="col-2 row p-0 align-items-center">
                                            <img src="{{asset('new_assets/icon/โดเนท.png')}}" alt="alt" style="width:17px; height:17px;">
                                            <h5 class="mb-0 ml-1">โดเนท</h5>
                                        </div>
                                    @endif

                                </div>
                            </div>
                    @endforeach
                @else

                    <div class="pt-2" style="font-weight: bold; color: #1C2833 ; font-size: 120% ; " > About </div> 
                    <div class="pt-2" style="font-weight: 500; font-size: 110% ;"><i class="fa fa-solid fa-lock"></i> Private </div> 
                    <div> Only members can see who's in the group and what they post. </div>
                    <div class="pt-2" style="font-weight: 500; font-size: 110% ;"><i class="fa fa-solid fa-eye"></i> Visible</div>
                    <div> Anyone can fine this group.</div>
                    <div class="pt-2" style="font-weight: 500; font-size: 110% ;"><i class="fa fa-solid fa-clock"></i> History</div>
                    <div class="pb-2"> Group created on June 25, 2018. Name last changed on June 26, 2018.</div>
                    <div class="pt-2" style="font-weight: 500; font-size: 110% ;"><i class="fa fa-solid fa-user"></i>  {{$cg->count()}} members </div> 
                    <div> Only members can see who's in the group and what they post. </div>
                    <hr> <!-- ------------------ -->
                    <div class="pt-2 pb-2" style="font-weight: bold; color: #1C2833 ; font-size: 120% ; " > Addmins and Moderators <span style=" font-weight: 500; font-size: 90% ; position: absolute; right: 20px;"><a href="#">See All</a></span> </div> 
                    <img class=" rounded-circle  " src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" style="width: 50px; height:50px;" >
                    <img class=" rounded-circle  " src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" style="width: 50px; height:50px;" >
                    <img class=" rounded-circle  " src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" style="width: 50px; height:50px;" >
                    <div ><small >user Join and admins. </small></div>
                    <hr> <!-- ------------------ -->

                    <div style="text-align: center; padding : 0 20 0 20 ; ">
                    <div class="pt-5"><i class="fa fa-solid fa-lock" ></i></div>
                    <div class="pt-2" style="font-weight: bold; color: #1C2833 ; font-size: 130% ;  " > This Group is Private  </div> 
                    <div class="pt-1 pb-5" style="font-weight: 500; font-size: 110% ;">Join this group to view or participate in discussions. </div> 
                    </div>
                    <div class="pb-5"></div>
                @endif
            </div>  


        </div>
    </div>
@endsection


<!-- ###### content [ End ] ###### -->
@section('custom_script')
    <script>

      bottom_now(4);


      
    </script>

        {{-- addimagegallery --}}
        <script>

            function addimagegallery(){

                gallery++;
                newimage =  '<div class="col-12" id="div'+gallery+'" style="padding: 10px;">'+
                            '<input type="file" style="display: none;" accept="image/*;capture=camera" name="sub_gallery['+(gallery).toString()+']" class="form-control chooseImage'+gallery+'" id="slidepicture'+gallery+'" multiple="multiple" onchange="readGalleryURL(this,'+gallery+')">'+
                            '<img id="gallerypreview'+gallery+'" style="max-height:150px ;padding: 10px;" src="{{asset('new_assets/img/brows.png')}}" onclick="browsImage('+gallery+')" />'+
                            '<button  id="btn'+gallery+'"  type="button" class="btn btn-danger" onclick="deletegallery('+gallery+')" style="position: absolute; top: 0px;"><i class="fa fa-trash"></i></button></div>';
                $('#rowsocial').append(newimage);
            }

            function browsImage(id){
                $('.chooseImage'+id).click();
            }


            function writevideo(v,id) {
                gallery++;
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gallerypreview'+id).remove();
                    $('#btn'+id).remove();

                    var videotag= '<video id="video" width="150" height="150" controls ><source src="'+e.target.result+'" type=video/ogg><source src="'+e.target.result+'" type=video/mp4></video><button  type="button" class="btn btn-danger" onclick="deletegallery('+gallery+')" style="position: absolute; top: 0px;"><i class="fa fa-trash"></i></button>';
                        
                    $('#div'+id).append(videotag);
                }
                reader.readAsDataURL(v);
            }


            function readGalleryURL(input,id)
            {

               
                var filelist = input.files;
                for(var i=0; i<filelist.length; i++)
                {
                    gallery++;
                    // console.log(filelist[i].name);
                    var fileName = filelist[i].name;
                    var fileExtension = fileName.split('.').pop();
                    if(fileExtension == 'mp4'){
                        writevideo(filelist[i],id);
                        // var imgs = '<input type="file" name=video['+gallery+'] value="'+filelist[i].name+'" >';
                        // $('#rowsocial').append(imgs);

                    }else{
                        writeimg(filelist[i],id);
                        // var imgs = '<input type="file" name=img['+gallery+'] value="'+filelist[i].name+'" >';
                        // $('#rowsocial').append(imgs);
                    }
                }
               
            }


            function writeimg(v,id) {
                gallery++;
                var reader = new FileReader();
                reader.onload = function(e) {
                    // console.log(e.target.result.name);
                    // var imgtag = '<div class="col-6" id="div'+gallery+'"><img  src="'+e.target.result+'" width="150" height="150"><button  type="button" class="btn btn-danger" onclick="deletegallery('+gallery+')" style="position: absolute; top: 0px;"><i class="fa fa-trash"></i></button></div>';
                    $('#gallerypreview'+id).attr('src', e.target.result);
                        
                    // $('#rowsocial').append(imgtag);
                }
                reader.readAsDataURL(v);
            }


            function deletegallery(num){

                $('#div'+num).remove();
                //gallery--;
                // $('#delete').append('<input type="hidden" name="deletedkey[]" value="'+num+'">');

            }

            // myInputimage.addEventListener('change', sendPic, false);
        </script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
@endsection
