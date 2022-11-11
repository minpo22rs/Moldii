@extends('backend.layouts.master')
@section('css')

@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-home"></i>
            </div>
            <div class="d-inline-block">
                <h5>หน้าเเรก</h5>
                <span>สถานะ: <label class="label label-primary">ผู้ดูเเลระดับ 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">หน้าเเรก</a>
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
                            <img src="{{asset('/storage/app/logo/Moldii.png')}}" class="img-radius" alt="User-Profile-Image" width="100" height="100">
                        </div>
                        <h6 class="f-w-600 m-t-25 m-b-10">{{ Auth::user()->admin_name }} {{ Auth::user()->admin_lname }}</h6>
                        <p class="text-muted">Active | {{ Auth::user()->admin_gender }} | Born {{date("d/m/Y", strtotime(Auth::user()->admin_birthday))}}</p>
                        {{-- <hr/>
                        <p class="text-muted m-t-15">Activity Level: 87%</p>
                        <ul class="list-unstyled activity-leval">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="bg-c-pink counter-block m-t-10 p-20">
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
                        </div> --}}
                    </div>
                </div>
            </div>
            @if (Carbon\Carbon::create($current)->between($fs->fs_regis_start, $fs->fs_dateend))
            <div class="col-xl-6 col-md-6 col-12">
                <div class="card trnasiction-card">
                    <div class="card-header">
                        <h3 class="text-black">{{$fs->fs_type == 'FS' ? 'Flash Sale' : 'Hot Deals'}}
                            <span class="d-block">{{date('d/m/Y', strtotime($fs->fs_datestart))}} - {{date('d/m/Y', strtotime($fs->fs_dateend))}}</span>
                        </h3>
                        <div class="card-header-right"></div>
                    </div>
                    <div class="card-block">
                        <p>{{$fs->fs_content}}</p>
                    </div>
                    <a href="{{url('admin/calendar')}}">
                        <div class="b-t-default transection-footer row">
                            <div class="col-12  b-r-default bg-c-blue">
                                <span style="color: white;">เหตุการณ์เพิ่มเติม</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @else
            <div class="col-xl-6 col-md-6 col-12">
                <div class="card">
                    <div class="card-block text-center">
                        <i class="icofont icofont-notification text-c-blue d-block f-40"></i>
                        <h4 class="m-b-40">ไม่มีเหตุการณ์</h4>
                        <a href="{{url('admin/calendar')}}" class="btn btn-primary btn-sm btn-round">More Event</a>
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
                        <h6>ร้านค้า</h6>
                        <h2 class="text-right"><i class="icofont icofont-users f-left"></i><span>{{$merchant_count}}</span></h2>
                        <br>
                        <p class="m-b-0">การจัดการ <a href="{{url('admin/merchant')}}" style="color: white"><span class="f-right icon-gopage"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-md-6 col-12">
                <div class="card bg-3 order-card">
                    <div class="card-block">
                        <h6>ลูกค้า</h6>
                        <h2 class="text-right"><i class="icofont icofont-users f-left"></i><span>{{$customer_count}}</span></h2>
                        <br>
                        <p class="m-b-0">การจัดการ <a href="{{url('admin/customer')}}" style="color: white"><span class="f-right icon-gopage"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('flash-message')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection