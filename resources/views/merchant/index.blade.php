@extends('merchant.layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/files/bower_components/multiselect/css/multi-select.css')}}" />

<style>
    .swal2-cancel {
        margin-right: 30px;
    }

    .mytooltip .tooltip-item2 {
        color: #ff9d10;
    }
    .tooltip-content4 {
        background-color: #2b2b2b;
        color: white;
        border-bottom: 40px solid #ff9d10;
        margin: 0 0 10px -50px !important;
    }
    .select2-container {    
        z-index: 999999999999;
    }
    .select2-dropdown .select2-dropdown--below {
        z-index: 9999999999999;
    }
    .select2-search__field {
        z-index: 99999999999999;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background: #4099ff !important;
        border: none;
    }
    .modal-xl{max-width:1200px;}
    @media only screen and (max-width: 480px) {
        .mytooltip .tooltip-content4 {
            margin: 0 0 10px -50px !important;
        }
    }
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-dashboard-web"></i>
            </div>
            <div class="d-inline-block">
                <h5>Dashboard</h5>
                <span>Status: <label class="label label-primary">Merchant</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-12">
                <div class="card user-card">
                    <div class="card-block">
                        <div class="usre-image">
                            <img src="{{asset('storage/app/merchant/'.Auth::guard('merchant')->user()->merchant_img.'')}}" class="img-radius" alt="User-Profile-Image" width="100" height="100">
                        </div>
                        <h6 class="f-w-600 m-t-25 m-b-10">{{Auth::guard('merchant')->user()->merchant_name}} {{Auth::guard('merchant')->user()->merchant_lname}}</h6>
                        <p class="text-muted">Active | Male | Born 23.05.1992</p>
                        <hr/>
                        <p class="text-muted m-t-15">Activity Level: 87%</p>
                        <ul class="list-unstyled activity-leval">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="bg-3 counter-block m-t-10 p-20">
                            <div class="row">
                                <div class="col-4">
                                    <i class="ti-comments"></i>
                                    <p>1256</p>
                                </div>
                                <div class="col-4">
                                    <i class="ti-user"></i>
                                    <p>8562</p>
                                </div>
                                <div class="col-4">
                                    <i class="ti-bag"></i>
                                    <p>189</p>
                                </div>
                            </div>
                        </div>
                        <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <hr/>
                        <div class="row justify-content-center user-social-link">
                            <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Carbon\Carbon::create($current)->between($fs->fs_regis_start, $fs->fs_dateend))
            <div class="col-xl-6 col-md-6 col-12">
                <div class="card trnasiction-card">
                    <div class="card-header">
                        <h3 class="text-black">Flash sale<span class="d-block">{{date('d/m/Y', strtotime($fs->fs_datestart))}} - {{date('d/m/Y', strtotime($fs->fs_dateend))}}</span></h3>
                        <div class="card-header-right">
                            @if (empty($fs->Fs_hasO_event))
                            <label class="label label-primary label-lg">Pending...</label>
                            @else
                            {!!$fs->Fs_event_status($fs->Fs_hasO_event->event_accept)!!}
                            @endif
                        </div>
                    </div>
                    <div class="card-block">
                        <h6>เรียน {{Auth::guard('merchant')->user()->merchant_name}} {{Auth::guard('merchant')->user()->merchant_lname}}</h6>
                        <p>{{$fs->fs_content}}</p>
                    </div>
                    @if (!empty($fs->Fs_hasO_event))
                        @if ($fs->Fs_hasO_event->event_accept == 1)
                        <div class="b-t-default transection-footer row">
                            <div class="col-12 b-r-default bg-c-blue">
                                <a href="{{url('merchant/event', $fs->fs_id)}}" class="" style="color: white;">See Detail</a>
                            </div>
                        </div>
                        @endif
                    @else
                    @if (Carbon\Carbon::create($current)->between($fs->fs_regis_start, $fs->fs_regis_end))
                    <div class="b-t-default transection-footer row">
                        <div class="col-6  b-r-default bg-c-green" data-toggle="modal" data-target="#accept">
                            <a href="#!" class="" style="color: white;"><i class="icofont icofont-ui-check m-r-10"></i> Accept</a>
                        </div>
                        <div class="col-6 bg-c-pink" onclick="event_decline({{$fs->fs_id}})">
                            <a href="#!" class="" style="color: white;"><i class="icofont icofont-ui-close m-r-10"></i> Decline</a>
                        </div>
                    </div> 
                    @endif
                    @endif
                </div>
            </div>
            @else
            <div class="col-xl-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-block text-center">
                        <i class="icofont icofont-notification text-c-blue d-block f-40"></i>
                        <h4 class="m-b-40">No Event</h4>
                        <a href="{{url('merchant/calendar')}}" class="btn btn-primary btn-sm btn-round">More Event</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-xl-4">
        <div class="row">
            <div class="col-xl-12 col-md-6 col-12">
                <div class="card bg-1 order-card">
                    <div class="card-block">
                        <h6>Our Product</h6>
                        <h2 class="text-right"><i class="icofont icofont-cubes f-left"></i><span>{{$product_count}}</span></h2>
                        <br>
                        <p class="m-b-0">More detail <a href="{{url('merchant/product')}}" style="color: white"><span class="f-right icon-gopage"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-md-6 col-12">
                <div class="card bg-7 order-card">
                    <div class="card-block">
                        <h6>Order</h6>
                        <h2 class="text-right"><i class="icofont icofont-ui-cart f-left"></i><span>123</span></h2>
                        <br>
                        <p class="m-b-0">More detail <a href="" style="color: white"><span class="f-right icon-gopage"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (Carbon\Carbon::create($current)->between($fs->fs_regis_start, $fs->fs_dateend))
<div class="modal fade" id="accept" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Registeration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('merchant/event')}}" method="POST" enctype="multipart/form-data" id="addcustomer" >
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="First Name..." value="{{Auth::guard('merchant')->user()->merchant_name}}" readonly>
                                    @error('name')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name..." value="{{Auth::guard('merchant')->user()->merchant_lname}}" readonly>
                                    @error('lname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Phone <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone...">
                                    @error('phone')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <hr>
                    <br>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label" style="color: #FF5370;">เลือกสินค้าที่ต้องในแต่ละวันและช่วงเวลา</label>
                    </div> --}}
                    {{-- @for ($i = $fs->fs_datestart; $i <= $fs->fs_dateend; $i++)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{date('d/m/Y', strtotime($i))}}</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#phase1{{$i}}" role="tab">00:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#phase2{{$i}}" role="tab">12:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#phase3{{$i}}" role="tab">18:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#phase4{{$i}}" role="tab">21:00</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="phase1{{$i}}" role="tabpanel">
                                            <div class="form-group row m-t-10">
                                                <label class="col-sm-2 col-form-label">Select Product</label>
                                                <div class="col-sm-4">
                                                    <select class="js-example-basic-multiple col-sm-12" name="product_phase1_{{$i}}[]">
                                                        @foreach ($product as $item)
                                                        <option value="{{$item->product_id}}">{{$item->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="phase2{{$i}}" role="tabpanel">
                                            <div class="form-group row m-t-10">
                                                <label class="col-sm-2 col-form-label">Select Product</label>
                                                <div class="col-sm-10">
                                                    <select class="js-example-basic-multiple col-sm-12" name="product_phase2_{{$i}}[]" multiple="multiple">
                                                        @foreach ($product as $item)
                                                        <option value="{{$item->product_id}}">{{$item->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="phase3{{$i}}" role="tabpanel">
                                            <div class="form-group row m-t-10">
                                                <label class="col-sm-2 col-form-label">Select Product</label>
                                                <div class="col-sm-10">
                                                    <select class="js-example-basic-multiple col-sm-12" name="product_phase3_{{$i}}[]" multiple="multiple">
                                                        @foreach ($product as $item)
                                                        <option value="{{$item->product_id}}">{{$item->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="phase4{{$i}}" role="tabpanel">
                                            <div class="form-group row m-t-10">
                                                <label class="col-sm-2 col-form-label">Select Product</label>
                                                <div class="col-sm-10">
                                                    <select class="js-example-basic-multiple col-sm-12" name="product_phase4_{{$i}}[]" multiple="multiple">
                                                        @foreach ($product as $item)
                                                        <option value="{{$item->product_id}}">{{$item->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    @endfor --}}
                </div>
                <input type="hidden" name="fs_id" value="{{$fs->fs_id}}">
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addcustomer">Submit</button>
            </div>
        </div>
    </div>
</div>
@endif

<form action="" method="post" id="event_decline">
    @csrf
</form>
@endsection
@section('js')
@include('flash-message')
<script>
    function event_decline(id) {
        var urlaction = '{{url('merchant/eventdecline')}}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be accept this event again!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#event_decline").attr('action', urlaction);
                $("#event_decline").submit();
                swalWithBootstrapButtons.fire(
                    'Decline!',
                    'You have decline this event',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Canceled',
                    'You can register again',
                    'error'
                )
            }
        })
    };
</script>
@endsection
