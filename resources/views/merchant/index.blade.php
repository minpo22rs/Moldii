@extends('merchant.layouts.master')
@section('css')
<style>
    .swal2-cancel {
        margin-right: 30px;
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
                            <div class="col-12  b-r-default bg-c-blue" data-toggle="modal" data-target="#accept">
                                <a href="#!" class="" style="color: white;">See Detail</a>
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
                        <button class="btn btn-primary btn-sm btn-round">More</button>
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
                    <hr>
                    <br>
                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label" style="color: #FF5370;">เลือกสินค้าที่ต้องในแต่ละวันและช่วงเวลา</label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">22/08/2021</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">00:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">12:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages3" role="tab">18:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#settings3" role="tab">21:00</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="home3" role="tabpanel">
                                            <p class="m-0">1. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                                        </div>
                                        <div class="tab-pane" id="profile3" role="tabpanel">
                                            <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                        </div>
                                        <div class="tab-pane" id="messages3" role="tabpanel">
                                            <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                                        </div>
                                        <div class="tab-pane" id="settings3" role="tabpanel">
                                            <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">23/08/2021</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">00:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">12:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages3" role="tab">18:00</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#settings3" role="tab">21:00</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="home3" role="tabpanel">
                                            <p class="m-0">1. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                                        </div>
                                        <div class="tab-pane" id="profile3" role="tabpanel">
                                            <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                        </div>
                                        <div class="tab-pane" id="messages3" role="tabpanel">
                                            <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                                        </div>
                                        <div class="tab-pane" id="settings3" role="tabpanel">
                                            <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
