<style>
    #footer-fixed-bottom {
    position: sticky;
    bottom: 7%;
    width: 100%;
    background-color: #FFFFFF
    }
</style>

@extends('mobile.main_layout.main')
@section('app_header')
<div class="appHeader bg-danger text-light">
    
    <div class="pageTitle">
        ตะกร้าสินค้า
    </div>
</div>
@endsection
@section('content')
    <div class="container m-0 p-0">
       

          <!-- ร้าน start -->

        @foreach($mycart as $key => $mycarts)
            <?php   $store = DB::Table('tb_merchants')->where('merchant_id',$mycarts->store_id)->first();
                    $cartt = DB::Table('tb_carts')->where('store_id',$store->merchant_id)->where('customer_id',Session::get('cid'))->get(); 
            ?>
            <div class="row p-1 border-top " style="color:black; font-size:18px; height:43px;">
                <div class="col-8 mx-0 align-self-center row">

                    <input class="my-1 mx-1 selecttoall checkbox_check{{$key}}" type="checkbox" id="checkbox_check{{$key}}" onclick='selectbox({{$key}},{{$mycarts->store_id}})' value="Select All" >


                    <img src="{{ asset('new_assets/img/icon/shop.svg')}}" alt="alt" style="font-size:1rem;">
                    <h5 class="m-0 ml-1 font-weight-bold align-self-center">{{$store->merchant_name}}</h5>
                    <i class="far fa-angle-right ml-1" style="font-size:1.5rem;"></i>
                    {{-- <a href="{{url('shopping/merchant/'.$store->merchant_id.'')}}" style="color: black"><i class="far fa-angle-right ml-1" style="font-size:1.5rem;"></i></a> --}}
                </div>
                <div class="col-4 mx-0 text-right align-self-center">
                    <div class="edit-cart" id="edit_cart" onclick='editButton({{$key}})' name="edit_cart{{$key}}"  >
                        <h5 class="m-0  font-weight-bold align-self-center mr-1" style="color:rgba(139, 139, 139, 1);">แก้ไข</h5>
                    </div>
                </div>
            </div>

                <!-- -->
                @foreach($cartt as $cartts)
                    <?php   $product = DB::Table('tb_products')->where('product_id',$cartts->product_id)->first();
                            $p = 0;
                            if($product->product_discount != null){
                                $p =$product->product_discount;

                            }else{
                                $p = $product->product_price;

                            }
                    
                    ?>
                    <div class=" px-2 py-3 pl-0 pb-0 border-top border-bottom text-right product-cart">
                        <div class="col-12 row p-0 m-0 ">
                            <div class=" row ml-1">
                                <form action="{{url('checkoutaddress')}}" method="post" id="formcheckoutaddress">
                                    @csrf
                                    <input class="my-1 mx-1 selecttoall" type="checkbox" name="check-list{{$key}}[]" id="check-list{{$cartts->cart_id}}" value="{{$cartts->cart_id}}" onclick="calcart({{$cartts->cart_id}})"> 
                                </form>
                                <img src="{{('https://testgit.sapapps.work/moldii/storage/app/product_cover/'.$product->product_img.'')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                            </div>

                            <div class="col-9 ml-1 row align-self-center justify-content-between ">
                                <div class="col-6 p-0 text-left ">
                                    <h5 class="m-0">{{$product->product_name}}</h5>
                                    <select class="  select-2" aria-label=".form-select-sm example">
                                        <option class="option-2" selected>ตัวเลือกสินค้า</option>
                                        <option class="option-2" value="1">One</option>
                                    </select>

                                    <div class="row col-12">
                                        @if($product->product_discount != null)
                                            <h5 class="m-0 font-weight-bold" style="color:rgba(116, 116, 116, 1);"><s>฿{{number_format($product->product_price,2,'.','')}}</s> </h5>
                                            <h5 class="m-0 font-weight-bold ml-1" style="color:rgba(80, 202, 101, 1);">฿{{number_format($product->product_discount,2,'.','')}}</h5>
                                        @else
                                            <h5 class="m-0 font-weight-bold ml-1" style="color:rgba(80, 202, 101, 1);">฿{{number_format($product->product_price,2,'.','')}}</h5>
                                        @endif
                                    </div>
                                    <div class="my-1 stepper stepper-dark align-self-center" style="font-size: 17px; ">
                                        <a href="#" class=" stepper-down align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-minus-circle" onclick="countdown({{$p}},{{$cartts->cart_id}});"></i></a>
                                        <input type="text" class="form-control font-weight-bold "value="{{$cartts->count}}" id="countupdown{{$cartts->cart_id}}" readonly style="border:none;"  />
                                        <a href="#" class=" stepper-up align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-plus-circle " onclick="countup({{$p}},{{$cartts->cart_id}});"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <a href="javascript:;" class="delete-product text-center delbtn{{$key}}"  onclick="delcartid({{$cartts->cart_id}});">
                            <h3 class="m-0 align-self-center" style="color:#FFFFFF;">ลบ</h3>
                        </a>
                    </div>
                @endforeach
                <!-- -->

          
            <!-- ร้าน end -->
        @endforeach

        
        {{-- โค้ดส่วนลด --}}
        <div class="col-12 p-0 m-0 " id="footer-fixed-bottom">
            {{-- <a href="" class="row py-1 border-top pl-2 mt-3" style="color:black; font-size:18px">
                <div class="col-6 mx-0 pl-0 align-self-center row">
                    <img src="{{ asset('new_assets/img/icon/ticket.svg')}}" alt="alt" style="">

                    <h5 class="m-0 ml-1 font-weight-bold align-self-center">โค้ดส่วนลด</h5>
                </div>
                <div class="col-6 mx-0 text-right">

                    <div class="mx-2 my-1 ml-2 mr-2 row justify-content-end">
                        <h5 class="m-0 mr-2 font-weight-bold align-self-center">เลือกโค้ดส่วนลด</h5>

                        <i class="far fa-angle-right"></i>
                    </div>
                </div>
            </a> --}}
            <div class="col-12 mx-0  py-2 px-3 pl-1 border-top border-bottom align-self-center justify-content-between row " style="margin-top: 60px;">
                <div class="row col-8 mx-0 pl-0 align-self-center">
                    <img src="{{ asset('new_assets/img/icon/coin.svg')}}" style="color:black;">

                    <h5 class="m-0 ml-2 font-weight-bold align-self-center">คะแนนของคุณ {{$my->customer_point}} คะแนน</h5>
                </div>
                <div class="custom-control custom-switch" id="customSwitchdiv">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1" onchange="coinswitch();" {{$my->customer_point==0?'disabled':''}}>
                    <label class="custom-control-label" for="customSwitch1"></label>
                </div>
            </div>
            <div class="col-12 row m-0 pr-0 justify-content-between">
                <div class="col-4 row p-2 pl-1">
                    <div class="form-group_2 select-all align-self-center mr-1">
                        <input type="checkbox" id="select-all" onchange="calcartall();">
                        <label class="label_2 m-0 mx-1" for="select-all">
                            <span class="checkbox">
                                <span class="check"></span>
                            </span>

                        </label>
                    </div>

                    <h5 class="m-0 ml-1">ทั้งหมด</h5>
                </div>
                <div class="col-8 row text-right p-0">
                    <div class="col px-1 py-1 align-self-center">
                        <div class="row p-0 m-0 justify-content-end">
                            <h5 class="m-0 ">ราคาทั้งหมด</h5>
                            <h5 class="m-0 font-weight-bold ml-1" style="color:rgba(80, 202, 101, 1);" >฿<span id="chkout">0</span></h5>
                        </div>
                        <h5 class="m-0 ">ได้รับ 0 คะแนน</h5>
                    </div>
                    <a href="javascript:;" type="button" class="btn btn-success square" onclick="checkoutaddress();"> ชำระเงิน ( <span id="chkcount">0</span>)</a>
                </div>
            </div>
        </div>

    </div>

   
@endsection


@section('custom_script')
<script>
    bottom_now(1);
    var countchk  = 0;
    function editButton(v){  
        // console.log('asdasd');
        const delete_product = document.querySelectorAll('.delbtn'+v); 
        delete_product.forEach( x => x.classList.toggle('show-delete'));
     
    }
   
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.querySelectorAll('.selecttoall');
        
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }

    function coinswitch(){
        var  chk = 0;
        if($('#customSwitch1').is(":checked")){
            chk = 0;
        }else{
            chk = 1; //uncheck

        }

        if(countchk == 0){
            alert('กรุณาเลือกสินค้า');
            document.getElementById('customSwitch1').checked=false;
        }else{
            // $('#formcheckoutaddress').submit();
            $.ajax({
                url: '{{ url("coinswitch")}}',
                type: 'GET',
                dataType: 'HTML',
                data: {'chk':chk},
                success: function(data) {
                    var t  = JSON.parse(data);
                    // console.log(t['colors']);
                    $('#chkout').html(t['sum']);
                    // $('#chkcount').html(t['chkcount']);
                    // countchk =  t['chkcount'];
                }
            });
            // alert('vvvvv');
        }
    }


    function countdown(p,k){
        var v = document.getElementById('countupdown'+k).value;
        var s = "{{Session::get('cartid')}}";
        
        var cv = v-1;
        
        
        if(cv > 0){
            console.log(v);
            console.log(cv);
            $.ajax({
                url: '{{ url("countdown")}}',
                type: 'GET',
                dataType: 'HTML',
                data: {'p':p,'s':s,'k':k},
                success: function(data) {
                    if(data != 1){
                        var t  = JSON.parse(data);
        
                        $('#chkout').html(t['sum']);
                        $('#chkcount').html(t['chkcount']);
                    }
                    
                
                }
            });
        }

       

        
        
        
    }

    function countup(p,k){
        var v = document.getElementById('countupdown'+k).value;
        var s = "{{Session::get('cartid')}}";
      
        
            console.log(v);
            $.ajax({
                url: '{{ url("countup")}}',
                type: 'GET',
                dataType: 'HTML',
                data: {'p':p,'s':s,'k':k},
                success: function(data) {
                    if(data != 1){
                        var t  = JSON.parse(data);
        
                        $('#chkout').html(t['sum']);
                        $('#chkcount').html(t['chkcount']);
                    }
                    
                }
            });
        
    }

      
    function selectbox(v,s){  
        var chkdels = 0;
        

        if ($('input.checkbox_check'+v).is(':checked')) {
    
            var ele=document.getElementsByName('check-list'+v+'[]');  
            for(var i=0; i<ele.length; i++){  
                if(ele[i].type=='checkbox')  
                    ele[i].checked=true;  
            } 
            chkdels = 0;
        }else{
            var ele=document.getElementsByName('check-list'+v+'[]');  
            for(var i=0; i<ele.length; i++){  
                if(ele[i].type=='checkbox')  
                    ele[i].checked=false;      
            }  
            chkdels = 1; //ติ้กออก
        }

        $.ajax({
            url: '{{ url("calcartstore")}}',
            type: 'GET',
            dataType: 'HTML',
            data: {'s':s,'chkdel':chkdels},
            success: function(data) {
                var t  = JSON.parse(data);
                console.log(t['colors']);
                $('#chkout').html(t['sum']);
                $('#chkcount').html(t['chkcount']);
                countchk =  t['chkcount'];
            }
        });


    }  

    function calcart(v){
        var  chkdelid = 0;
        if($('#check-list'+v).is(":checked")){
            chkdelid = 0;
        }else{
            chkdelid = 1; //uncheck

        }
        $.ajax({
            url: '{{ url("calcartid")}}',
            type: 'GET',
            dataType: 'HTML',
            data: {'id':v,'chkdel':chkdelid},
            success: function(data) {
                var t  = JSON.parse(data);
                // console.log(t['sum']);
                $('#chkout').html(t['sum']);
                $('#chkcount').html(t['chkcount']);
                countchk =  t['chkcount'];
            }
        });
    }


    function calcartall(v){
        var  chkdelall = 0;
        if($('#select-all').is(":checked")){
            chkdelall = 0;
        }else{
            chkdelall = 1;

        }
        $.ajax({
            url: '{{ url("calcartall")}}',
            type: 'GET',
            dataType: 'HTML',
            data: {'chkdel':chkdelall},
            success: function(data) {
                var t  = JSON.parse(data);
                // console.log(t['sum']);
                $('#chkout').html(t['sum']);
                $('#chkcount').html(t['chkcount']);
                countchk =  t['chkcount'];
            }
        });
    }


    function delcartid(v){
        $.ajax({
            url: '{{ url("delcartid")}}',
            type: 'GET',
            dataType: 'HTML',
            data: {'id':v},
            success: function(data) {
              
                window.location.reload();
            }
        });
    }




    function checkoutaddress(){
       
        if(countchk == 0){
            alert('กรุณาเลือกสินค้า');
        }else{
            $('#formcheckoutaddress').submit();
        }
    }

</script>
@endsection
