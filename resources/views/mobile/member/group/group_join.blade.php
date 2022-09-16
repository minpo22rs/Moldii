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
    <div class="col-md-12">
        <div class="row">

        <div class="col-md-12" style="background-color: #D5D8DC ; display: grid; grid-template-columns: auto;  grid-template-rows: 250px 100px; "> 
            <img src="{{('https://testgit.sapapps.work/moldii/storage/app/group_cover/'.$group->group_img.'')}}" alt="alt" >
        </div>
        
        <div class="col-md-12">
            <div class="pt-4" style="font-weight: bold; color: #1C2833 ; font-size: 200% ; " >{{$group->name}}  </div> 
            <div class="pt-1 pb-2"><i class="fa fa-solid fa-lock"></i> Private Group<b> {{$cg->count()}}</b> members</div>
            <div class="pt-3 pb-2"><a href="#" type="button" class="btn btn-primary btn-block"><b>Join Group</b></a></div>
            <hr> <!-- ------------------ -->
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
