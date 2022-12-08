@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    <div class="left">
        <ion-icon name="arrow-back-outline" onclick="window.history.back();"></ion-icon>
    </div>
    <div class="pageTitle">
        โพสต์
    </div>
</div>
@endsection
@section('content')
<br>
<div class="container m-0 p-0">
    {{-- <div class="section full">
        <div class=" transparent p-0">
            <ul class="nav nav-tabs lined iconed" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#purchase" role="tab">
                        <h4 class="m-0 font-weight-bold">การซื้อสินค้า</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#shopping_cart" role="tab">
                        <h4 class="m-0 font-weight-bold">ตะกร้าสินค้า</h4>

                    </a>
                </li>

            </ul>
        </div>
    </div> --}}
    <div class="section full mb-2">
        <div class="tab-content">

            <!-- purchase -->
            <div class="tab-pane fade show active " id="purchase" role="tabpanel">

                <div class="row justify-content-center my-3">
                    <button class="tabs-btn font-weight-bold justify-content-center active" onclick="openCity(event, 'like')">สิ่งที่ถูกใจ</button>
                    <button class="tabs-btn font-weight-bold justify-content-center " onclick="openCity(event, 'mark')">สิ่งที่บุ๊คมา์ค</button>
                    <button class="tabs-btn font-weight-bold justify-content-center " onclick="openCity(event, 'news')">โพสต์ที่ถูกซ่อน</button>
                </div>


             
                <div id="like" class="tabcontent">
                    @foreach ($like  as $item)
                
                            @if($item->type_like =='C')
                                <?php   $c = DB::Table('tb_news')->where('new_id',$item->content_id)->first();
                                        $u = null;
                                            if($c->new_type == 'U'){
                                                $u = DB::Table('tb_customers')->where('customer_id',$c->customer_id)->first();
                                            }
                                ?>
                                <a href="{{url('content/'.$item->content_id.'')}}" class="row p-2 pr-0 border-top border-bottom">
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
                                                <h5 class="m-0 align-self-center" >{{mb_substr($c->new_title, 0, 100).'...'}}</h5>
                                            </div>
                                    
                                        {{-- <div class=" p-0 text-center">
                                            <h6 class="m-0  ">12/08/2564</h6>
                                            <h6 class="m-0  "><small>เวลา 09.30 น.</small> </h6>
                                        </div> --}}
                                    </div>
                                </a>
                            @else
                                <?php $p = DB::Table('tb_products')->where('product_id',$item->content_id)
                                            ->leftJoin('tb_merchants', 'tb_products.product_merchant_id', '=', 'tb_merchants.merchant_id')->first();
                                ?>
                                <a href="{{url('shopping/product/'.$item->content_id.'')}}" class="row p-2 pr-0 border-top border-bottom">
                                    <div class="">
                                        <img class="rounded-circle" src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$p->product_img.'')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                                    </div>
                                    <div class="col-10 row align-self-center justify-content-between pr-0 pl-2">
                                    
                                            <div class="col-9 p-0 ">
                                            
                                                <h5 class="m-0 align-self-center" >{{$p->merchant_shopname}}</h5>
                                                <h5 class="m-0 align-self-center" >{{$p->product_name}}</h5>
                                            </div>
                                    
                                        {{-- <div class=" p-0 text-center">
                                            <h6 class="m-0  ">12/08/2564</h6>
                                            <h6 class="m-0  "><small>เวลา 09.30 น.</small> </h6>
                                        </div> --}}
                                    </div>
                                </a>
                            @endif
                    @endforeach
                </div>
             



                
                <div id="mark" class="tabcontent" style="display:none">
                    @foreach ($mark  as $item)
                
                            
                                <?php   $c = DB::Table('tb_news')->where('new_id',$item->id_ref)->first();
                                        $u = null;
                                            if($c->new_type == 'U'){
                                                $u = DB::Table('tb_customers')->where('customer_id',$c->customer_id)->first();
                                            }
                                ?>
                                <a href="{{url('content/'.$item->id_ref.'')}}" class="row p-2 pr-0 border-top border-bottom">
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
                                                <h5 class="m-0 align-self-center" >{{mb_substr($c->new_title, 0, 100).'...'}}</h5>
                                            </div>
                                    
                                        {{-- <div class=" p-0 text-center">
                                            <h6 class="m-0  ">12/08/2564</h6>
                                            <h6 class="m-0  "><small>เวลา 09.30 น.</small> </h6>
                                        </div> --}}
                                    </div>
                                </a>
                            
                    @endforeach

                </div>

                <div id="news" class="tabcontent" style="display:none">
                    @if($new->count() != 0)
                        @foreach ($new  as $item)
                    
                                
                                    <?php   
                                            $u = null;
                                            if($item->new_type == 'U'){
                                                $u = DB::Table('tb_customers')->where('customer_id',$item->customer_id)->first();
                                            }
                                    ?>
                                    <a href="{{url('content/'.$item->new_id.'')}}" class="row p-2 pr-0 border-top border-bottom">
                                        <div class="">
                                            
                                            @if($item->new_type == 'U')
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
                                                    <h5 class="m-0 align-self-center" >{{mb_substr($item->new_title, 0, 100).'...'}}</h5>
                                                </div>
                                        
                                            {{-- <div class=" p-0 text-center">
                                                <h6 class="m-0  ">12/08/2564</h6>
                                                <h6 class="m-0  "><small>เวลา 09.30 น.</small> </h6>
                                            </div> --}}
                                        </div>
                                    </a>
                                
                        @endforeach
                    @else
                                ไม่พบข้อมูล
                    @endif
                </div>
                




            </div>
            <!-- * purchase -->





        </div>
    </div>
</div>


ิ<br>

@endsection

@section('custom_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    bottom_now(7);

    var a = "{{Session::get('msg')}}";
    if(a){
        Swal.fire({
            text : a,
            confirmButtonColor: "#fc684b",
        })
    }

</script>
@endsection