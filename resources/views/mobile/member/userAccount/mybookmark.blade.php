@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.location.replace('{{url('/user/myAccount')}}');"></ion-icon>
    </div>
    <div class="pageTitle">
        รายการสิ่งที่บุ๊คมาร์ก
    </div>
</div>
@endsection
@section('content')
<br>
<div class="container col-12 p-1 m-0">

    @foreach ($sql  as $item)
                
            
                <?php   $c = DB::Table('tb_news')->where('new_id',$item->id_ref)->first();
                        $u = null;
                            if($c->new_type == 'U'){
                                $u = DB::Table('tb_customers')->where('customer_id',$c->customer_id)->first();
                            }
                ?>
                <a href="{{url('content/'.$item->id_ref.'')}}" class="row p-1 pr-0 border-top border-bottom">
                    <div class="">
                        
                        @if($c->new_type == 'U')
                            @if($u->provider == null)
                                <img src="{{asset('storage/profile_cover/'.$u->customer_img.'')}}" alt="alt" class=" rounded-circle  " style="width: 60px; height: 60px; border-radius: 6px;">
                            @elseif($u->customer_img != null)
                                <img src="{{$u->customer_img}}" alt="alt" class=" rounded-circle  " style="width: 60px; height: 60px; border-radius: 6px;">
                            @else
                                <img src="{{asset('original_assets/img/material_icons/woman.png')}}" alt="alt" class=" rounded-circle  " style="width: 60px; height: 60px; border-radius: 6px;">
                        
                        
                            @endif


                        @else
                            <img class="rounded-circle" src="{{asset('new_assets/img/Moldii.png')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">

                        @endif
                    </div>
                    <div class="col-10 row align-self-center justify-content-between pr-0 pl-2">
                    
                            <div class="col-9 p-0 ">
                            
                                <h5 class="m-0 align-self-center" >{{$u==null?'Admin':$u->customer_username}}</h5>
                                <h5 class="m-0 align-self-center" >{{$c->new_title}}</h5>
                            </div>
                    
                        {{-- <div class=" p-0 text-center">
                            <h6 class="m-0  ">12/08/2564</h6>
                            <h6 class="m-0  "><small>เวลา 09.30 น.</small> </h6>
                        </div> --}}
                    </div>
                </a>
            
    @endforeach
</div>

@endsection

@section('custom_script')
<script>
    bottom_now(7);
</script>
@endsection