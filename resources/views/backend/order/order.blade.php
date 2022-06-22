@extends('backend.layouts.master')
@section('css')
<style>
    .swal2-cancel {
        margin-right: 30px;
    }
    
    .pointer {cursor: pointer;}
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-cart"></i>
            </div>
            <div class="d-inline-block">
                <h5>Orders</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-block">
        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="example1" class="table example1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Code</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Management</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sql as $key => $item)
                            <tr>
                                <td class="text-center text-middle">{{$key+1}}</td>
                                <td class="text-center text-middle">{{$item->order_code}}</td>
                                <td class="text-center text-middle">{{ $item->customer_name }} {{ $item->customer_lname }}</td>
                                <td class="text-center text-middle">{{ number_format( $item->order_total,2,'.',',')}} ฿</td>

                               
                                <td class="text-center text-middle">
                                    <div class="dropdown-primary dropdown open">
                                        <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                            <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_content({{$item->id_order}})"><i class="fa fa-edit"></i> ดูรายละเอียด</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_content({{$item->id_order}})"><i class="icofont icofont-bin"></i> ลบ</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('flash-message')

@endsection
