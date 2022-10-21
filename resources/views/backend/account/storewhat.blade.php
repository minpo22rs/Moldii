@extends('backend.layouts.master')
@section('css')

@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-users"></i>
            </div>
            <div class="d-inline-block">
                <h5>Store</h5>
                <span>สถานะ: <label class="label label-primary">ผู้ดูเเลระดับ 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">บัญชีผู้ใช้</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Store</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();
</script>
@endsection
