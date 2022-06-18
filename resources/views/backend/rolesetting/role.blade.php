@extends('backend.layouts.master')
@section('css')
<style>
    .swal2-container {
        z-index: 99999999999 !important;
    }

    .mytooltip .tooltip-item2 {
        color: #ff9d10;
    }
    .tooltip-content4 {
        background-color: #2b2b2b;
        color: white;
        border-bottom: 40px solid #ff9d10;
        margin: 0 0 10px -30px !important;
    }
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
                <i class="icofont icofont-gear"></i>
            </div>
            <div class="d-inline-block">
                <h5>การตั้งค่าบทบาท</h5>
                <span>สถานะ: <label class="label label-primary">ผู้ดูเเลระดับ 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">หน้าเเรก</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">การตั้งค่าบทบาท</a>
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
