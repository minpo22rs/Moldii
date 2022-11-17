@extends('merchant.layouts.master')

@section('title','Order Details')

@push('css_or_js')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header d-print-none p-3" style="background: white">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                           href="{{url('merchant/ordermerchant')}}">คำสั่งซื้อ</a>
                            </li>
                            <li class="breadcrumb-item active"
                                aria-current="page">ข้อมูลคำสั่งซื้อ </li>
                        </ol>
                    </nav>
             
                    <div class="d-sm-flex align-items-sm-center">
                        <h5 class="page-header-title">คำสั่งซื้อ #{{$order->order_code}}</h5>

                        
 
                        <span class="ml-2 ml-sm-3 text-right">
                            <i class="tio-date-range"></i>วันที่ทำรายการ : {{$order->created_at}}
                        </span>
                    </div>
                    {{-- <div class="col-md-6 mt-2">
                        <a class="text-body mr-3" target="_blank"
                           href={{route('admin.orders.generate-invoice',[$order['o_id']])}}>
                            <i class="tio-print mr-1"></i> {{trans('messages.Print')}} {{trans('messages.invoice')}}
                        </a>
                    </div> --}}

                    <!-- Unfold -->

                    {{-- <div class="hs-unfold float-right">
                        <div class="dropdown">
                            <select name="order_status" onchange="order_status(this.value)" class="status form-control"
                                    data-id="{{$order['o_id']}}">

                                <option
                                    value="pending" {{$order->status_pay == 'pending'?'selected':''}} > {{trans('messages.Pending')}}</option>
                                <option
                                    value="processing" {{$order->status_pay == 'processing'?'selected':''}} >{{trans('messages.Processing')}} </option>
                                <option
                                    value="delivered" {{$order->status_pay == 'delivered'?'selected':''}} >{{trans('messages.Delivered')}} </option>
                                <option
                                    value="returned" {{$order->status_pay == 'returned'?'selected':''}} > {{trans('messages.Returned')}}</option>
                                <option
                                    value="failed" {{$order->status_pay == 'failed'?'selected':''}} >{{trans('messages.Failed')}} </option>
                            </select>
                        </div>
                    </div> --}}
                    {{-- <div class="hs-unfold float-right pr-2">
                        <div class="dropdown">
                            <select name="payment_status" class="payment_status form-control"
                                    data-id="{{$order['o_id']}}">

                                <option
                                    onclick="route_alert('{{route('admin.orders.payment-status',['id'=>$order['o_id'],'payment_status'=>'paid'])}}','Change status to paid ?')"
                                    href="javascript:" value="paid" {{$order->status_pay == 'S'?'selected':''}} >
                                    {{trans('messages.Paid')}}
                                </option>
                                <option value="unpaid" {{$order->status_pay == 'W'?'selected':''}} >
                                    {{trans('messages.Unpaid')}}
                                </option>

                            </select>
                        </div>
                    </div> --}}
                    <!-- End Unfold -->
                </div>
            </div>
        </div>

        <!-- End Page Header -->
        <?php 
            $ordetail = DB::Table('tb_order_details')->where('order_id',$order->id_order)
                            ->where('store_id',Auth::guard('merchant')->user()->merchant_id)
                            ->leftJoin('tb_merchants','tb_order_details.store_id','=','tb_merchants.merchant_id')
                            ->leftJoin('tb_customers','tb_order_details.store_id','=','tb_customers.customer_id')
                            ->orderBy('shipping_cost','DESC')->get();
            $shipcom = DB::Table('tb_shipping_companys')->where('id_shipping_company',$ordetail[0]->company_shipping)->first();
            
        ?>


        <div class="row" id="printableArea">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header" style="display: block!important;">
                        <div class="row">
                            <div class="col-12 pb-2 border-bottom">
                                <h6 class="card-header-title">
                                   ข้อมูลคำสั่งซื้อ
                                    <span
                                        {{-- class="badge badge-soft-dark rounded-circle ml-1">{{$order->details->count()}}</span> --}}
                                        class="badge badge-soft-dark rounded-circle ml-1">{{$ordetail->count()}}</span>
                                </h6>
                            </div>
                            <div class="col-6 ">

                            </div>
                            <div class="col-6 ">
                                <div class="text-right">
                                    <h6 class="" style="color: #b60505;">
                                       Payment Method
                                        : {{$order->order_method}}
                                        {{-- : {{str_replace('_',' ',$order['payment_method'])}} --}}
                                    </h6>
                                    @if($order->order_ref_gb!=null)
                                        <h6 class="" style="color: #b60505;">
                                            Payment reference
                                            :{{$order->order_ref_gb}}
                                            {{-- : {{str_replace('_',' ',$order['refno'])}} --}}
                                        </h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="media">
                            {{-- <div class="avatar avatar-xl mr-3">
                                <p>รูปภาพ</p>
                            </div> --}}

                            <div class="media-body">
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <p> รหัสสินค้า</p>
                                    </div>
                                    <div class="col-md-3 ">
                                        <p> ชื่อ</p>
                                    </div>

                                    <div class="col col-md-2 align-self-center p-0 ">
                                        <p> ราคา</p>
                                    </div>

                                    <div class="col col-md-2 align-self-center">
                                        <p>จำนวน</p>
                                    </div>
                                   

                                    <div class="col col-md-2 align-self-center text-right  ">
                                        <p> ยอดรวม</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @php($subtotal=0)
                    @php($total=0)
                    {{-- @php($shipping=0) --}}
                    @php($shipping=$ordetail[0]->shipping_cost)
                    @php($discount=0)
                    @php($tax=0)

                    @foreach($ordetail as $detail)

                        <?php 
                            $prodetail = \App\Models\product::where('product_id',$detail->product_id)->first();
                        ?>


                            <!-- Media -->
                                <div class="media">
                                    {{-- <div class=" mr-3">
                                        <img style="width: 10%;height:10%"
                                             onerror="this.src='{{asset('public/assets/back-end/img/160x160/img2.jpg')}}'"
                                             src="{{asset('storage/app/product_cover/'.$prodetail->product_img.'')}}"
                                             alt="Image">
                                    </div> --}}

                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-md-3 mb-3 mb-md-0 ">
                                                <p>
                                                    {{$prodetail->product_code}}</p>
                                               
                                            </div>
                                            <div class="col-md-3 mb-3 mb-md-0 ">
                                                <p>
                                                    {{$prodetail->product_name}}</p>
                                               
                                            </div>

                                            <div class="col col-md-2 align-self-center p-0 ">
                                                <h6 style="font-size: 12px">{{number_format($detail->price,2,'.',',')}}฿</h6>
                                            </div>

                                            <div class="col col-md-2 align-self-center ">

                                                <h5 style="font-size: 12px">{{$detail->amount}}</h5>
                                            </div>
                                            

                                            <div class="col col-md-2 align-self-center text-right  ">
                                                @php($subtotal=$detail->price*$detail->amount)

                                                <h5 style="font-size: 12px">{{number_format($subtotal,2,'.',',')}}฿</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            {{-- @php($discount+=$prodetail['discount'])
                            @php($tax+=$prodetail['tax']) --}}
                            {{-- @php($shipping+=$detail->shipping_cost ? $detail->shipping_cost :0) --}}

                            @php($total+=$subtotal)
                            <!-- End Media -->
                                <hr>
                           
                    @endforeach

                    <div class="row justify-content-md-end mb-3">
                        <div class="col-md-9 col-lg-8">
                            <dl class="row text-sm-right">
                                <dt class="col-sm-6">ค่าขนส่งสินค้า</dt>
                                <dd class="col-sm-6 border-bottom">
                                    <strong>{{$shipping}}฿</strong>
                                </dd>

                                <dt class="col-sm-6">ทั้งหมด</dt>
                                <dd class="col-sm-6">
                                    <strong>{{number_format($total+$shipping,2,'.',',')}}฿</strong>
                                </dd>

                                <dt class="col-sm-6">รหัสติดตาม</dt>
                                <dd class="col-sm-6 border-bottom">
                                    <strong>{{$ordetail[0]->tracking_code!=null?$ordetail[0]->tracking_code:'No tracking'}}</strong>
                                </dd>

                                <dt class="col-sm-6">บริษัทขนส่ง</dt>
                                <dd class="col-sm-6 border-bottom">
                                    <strong>{{$shipcom->name_company}}</strong>
                                </dd>
                                <br><br>
                                @if($order->status_order==2 || $order->status_order==4 && $ordetail[0]->tracking_code==null)
                                    <dt class="col-sm-6"></dt>
                                    <dd class="col-sm-6 border-bottom">
                                        <form action="{{url('merchant/createbooking')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="oid" id="oid" value="{{$order->id_order}}">
                                            <input type="hidden" name="ship" id="oid" value="{{$shipcom->code}}">
                                            <input type="hidden" name="odid" id="odid" value="{{$ordetail[0]->id_order_detail}}">

                                            <strong><button class="btn btn-success btn-sm" type="submit">ยืนยันทำการจัดส่งออเดอร์ใช่หรือไม่</button></strong>
                                        </form>
                                    </dd>
                                @endif

                            </dl>
                            <!-- End Row -->
                        </div>
                    </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>


            {{--  ลูกค้า--}}
            <div class="col-lg-4">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <h5 class="card-header-title">ลูกค้า</h5>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    @if($order->customer_id)
                        <?php 
                            $people = \App\Models\customer::where('customer_id',$order->customer_id)->first();
                        ?>
                        <div class="card-body">
                            <div class="media align-items-center" href="javascript:">
                                <div class="avatar avatar-circle mr-3">
                                    <img
                                        class="avatar-img" style="width: 75px;height: 42px"
                                        {{-- onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'" --}}
                                        src="{{asset('storage/app/public/profile/'.$people->customer_img)}}"
                                        alt="Image">
                                </div>
                                <div class="media-body">
                                <span
                                    class="text-body text-hover-primary">{{$people['customer_name'].' '.$people['customer_lname']}}</span>
                                </div>
                                <div class="media-body text-right">
                                    {{--<i class="tio-chevron-right text-body"></i>--}}
                                </div>
                            </div>

                            {{-- <hr>

                            <div class="media align-items-center" href="javascript:">
                                <div class="icon icon-soft-info icon-circle mr-3">
                                    <i class="tio-shopping-basket-outlined"></i>
                                </div>
                                <div class="media-body">
                                    <span class="text-body text-hover-primary"> {{$num->count()}} orders</span>
                                </div>
                                <div class="media-body text-right">
                                    <i class="tio-chevron-right text-body"></i>
                                </div>
                            </div> --}}

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <h6>ข้อมูลติดต่อ</h6>
                            </div>

                            <ul class="list-unstyled list-unstyled-py-2">
                                <li>
                                    <i class="tio-online mr-2"></i>
                                    {{$people['customer_email']}}
                                </li>
                                <li>
                                    <i class="tio-android-phone-vs mr-2"></i>
                                    {{$people['customer_phone']}}
                                </li>
                            </ul>

                            <hr>


                            <div class="d-flex justify-content-between align-items-center">
                                <h6>ที่อยู่จัดส่ง</h6>

                            </div>

                            <span class="d-block">
                                ชื่อ :
                                <strong>{{$people['customer_name'].' '.$people['customer_lname']}}</strong><br>
                                ที่อยู่ :
                                <strong>{{$order->order_address ? $order->order_address : "Empty"}}</strong><br>
                                ตำบล :
                                <strong>{{$order->order_tumbon ? $order->order_tumbon : "Empty"}}</strong><br>
                                อำเภอ :
                                <strong>{{$order->order_district ? $order->order_district : "Empty"}}</strong><br>
                                จังหวัด :
                                <strong>{{$order->order_province ? $order->order_province : "Empty"}}</strong><br>
                                รหัสไปรษณีย์ :
                                <strong>{{$order->order_postcode ? $order->order_postcode  : "Empty"}}</strong><br>
                               
                                เบอร์โทรศัพท์ :
                                <strong>{{$people['customer_phone']}}</strong>

                                </span>

                        </div>
                @endif
                <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection

@push('script_2')
<script
    {{-- <script>
        $(document).on('change', '.payment_status', function () {
            var id = $(this).attr("data-id");
            var value = $(this).val();
            Swal.fire({
                title: 'Are you sure Change this?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('admin.orders.payment-status')}}",
                        method: 'POST',
                        data: {
                            "id": id,
                            "payment_status": value
                        },
                        success: function (data) {
                            toastr.success('Status Change successfully');
                            location.reload();
                        }
                    });
                }
            })
        });

        function order_status(status) {
            var value = status;
            Swal.fire({
                title: 'Are you sure Change this?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('admin.orders.status')}}",
                        method: 'POST',
                        data: {
                            "id": '{{$order['id']}}',
                            "order_status": value
                        },
                        success: function (data) {
                            toastr.success('Status Change successfully');
                            location.reload();
                        }
                    });
                }
            })
        }

        $(document).on('change', '.product_status', function () {
            var id = $(this).attr("data-id");
            var value = $(this).val();
            Swal.fire({
                title: 'Are you sure Change this?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: 'Yes, Change it!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('admin.orders.productStatus')}}",
                        method: 'POST',
                        data: {
                            "id": id,
                            "delivery_status": value
                        },
                        success: function (data) {
                            if (data.success == 0) {
                                toastr.warning(data.message);
                            } else {
                                toastr.success('Product Status updated successfully');
                                location.reload();
                            }
                        }
                    });
                }
            })
        });
    </script> --}}
@endpush
