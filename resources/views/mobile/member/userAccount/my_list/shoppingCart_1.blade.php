<style>
    #footer-fixed-bottom {
    position: fixed;
    bottom: 7%;
    width: 100%;
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
                    $cartt = DB::Table('tb_carts')->where('store_id',$store->merchant_id)->get(); 
            ?>
            <div class="row p-1 border-top " style="color:black; font-size:18px; height:43px;">
                <div class="col-8 mx-0 align-self-center row">

                    <input class="my-1 mx-1 selecttoall checkbox_check{{$key}}"  type="checkbox" name="check-list{{$key}}" onclick='selectbox({{$key}})' value="Select All" >


                    <img src="{{ asset('new_assets/img/icon/shop.svg')}}" alt="alt" style="font-size:1rem;">
                    <h5 class="m-0 ml-1 font-weight-bold align-self-center">{{$store->merchant_name}}</h5>
                    <i class="far fa-angle-right ml-1" style="font-size:1.5rem;"></i>
                </div>
                <div class="col-4 mx-0 text-right align-self-center">
                    <div class="edit-cart" id="edit_cart">
                        <h5 class="m-0  font-weight-bold align-self-center mr-1" style="color:rgba(139, 139, 139, 1);">แก้ไข</h5>
                    </div>
                </div>
            </div>




                <!-- -->
                @foreach($cartt as $cartts)
                    <?php $product = DB::Table('tb_products')->where('product_id',$cartts->product_id)->first();  ?>
                    <div class=" px-2 py-3 pl-0 pb-0 border-top border-bottom text-right product-cart">
                        <div class="col-12 row p-0 m-0 ">
                            <div class=" row ml-1">

                                <input class="my-1 mx-1 selecttoall" type="checkbox" name="check-list{{$key}}" > 

                                <img src="{{ asset('new_assets/img/sample/photo/wide6.jpg')}}" alt="alt" style="width: 60px; height: 60px; border-radius: 6px;">
                            </div>

                            <div class="col-9 ml-1 row align-self-center justify-content-between ">
                                <div class="col-6 p-0 text-left ">
                                    <h5 class="m-0">{{$product->product_name}}</h5>
                                    <select class="  select-2" aria-label=".form-select-sm example">
                                        <option class="option-2" selected>ตัวเลือกสินค้า</option>
                                        <option class="option-2" value="1">One</option>
                                    </select>

                                    <div class="row col-12">
                                        <h5 class="m-0 font-weight-bold" style="color:rgba(116, 116, 116, 1);"><s>฿200.00</s> </h5>
                                        <h5 class="m-0 font-weight-bold ml-1" style="color:rgba(80, 202, 101, 1);">฿100.00</h5>
                                    </div>
                                    <div class="my-1 stepper stepper-dark align-self-center" style="font-size: 17px; ">
                                        <a href="#" class=" stepper-down align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-minus-circle"></i></a>
                                        <input type="text" class="form-control font-weight-bold "value="{{$cartts->count}}" readonly style="border:none;" />
                                        <a href="#" class=" stepper-up align-self-center" style="color:rgba(0, 0, 0, 1);"><i class="far fa-plus-circle "></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <a href="" class="delete-product text-center" id="delete_product">
                            <h3 class="m-0 align-self-center" style="color:#FFFFFF;">ลบ</h3>
                        </a>
                    </div>
                @endforeach
                <!-- -->

          
            <!-- ร้าน end -->
        @endforeach

        
        {{-- โค้ดส่วนลด --}}
        <div class="col-12 p-0 m-0 " id="footer-fixed-bottom">
            <a href="" class="row py-1 border-top pl-2 mt-3" style="color:black; font-size:18px">
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
            </a>
            <div class="col-12 mx-0  py-2 px-3 pl-1 border-top border-bottom align-self-center justify-content-between row ">
                <div class="row col-8 mx-0 pl-0 align-self-center">
                    <img src="{{ asset('new_assets/img/icon/coin.svg')}}" style="color:black;">

                    <h5 class="m-0 ml-2 font-weight-bold align-self-center">คะแนนของคุณ {{$my->customer_point}} คะแนน</h5>
                </div>
                <div class="custom-control custom-switch" id="customSwitchdiv">
                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                    <label class="custom-control-label" for="customSwitch1"></label>
                </div>
            </div>
            <div class="col-12 row m-0 pr-0 justify-content-between">
                <div class="col-4 row p-2 pl-1">
                    <div class="form-group_2 select-all align-self-center mr-1">
                        <input type="checkbox" id="select-all">
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
                            <h5 class="m-0 font-weight-bold ml-1" style="color:rgba(80, 202, 101, 1);">฿100.00</h5>
                        </div>
                        <h5 class="m-0 ">ได้รับ 0 คะแนน</h5>
                    </div>
                    <a href="{{url('user/buyGoods')}}" type="button" class="btn btn-success square ">ชำระเงิน(0)</a>
                </div>
            </div>
        </div>

    </div>

   
@endsection


@section('custom_script')
<script>
    bottom_now(3);


        
   

    const edit_cart = document.getElementById('edit_cart');
    const delete_product = document.getElementById('delete_product');
    

    edit_cart.addEventListener('click', () => {     
        delete_product.classList.toggle('show-delete'); 
        
    });
    
 
    
    // function showDelete() {
    //     delete_product.classList.toggle('show-delete');

    // }

   
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.querySelectorAll('.selecttoall');
    
        
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    }


  
      
    function selectbox(v){  

        if ($('input.checkbox_check'+v).is(':checked')) {
    
            var ele=document.getElementsByName('check-list'+v);  
            for(var i=0; i<ele.length; i++){  
                if(ele[i].type=='checkbox')  
                    ele[i].checked=true;  
            } 

        }else{
            var ele=document.getElementsByName('check-list'+v);  
            for(var i=0; i<ele.length; i++){  
                if(ele[i].type=='checkbox')  
                    ele[i].checked=false;      
            }  

        }
    }  



</script>
@endsection
