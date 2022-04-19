@extends('merchant.layouts.master')
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
                            <th style="text-align: center;">Product Code</th>
             
                            <th style="text-align: center;">Customer Name</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Amount</th>
                            <th style="text-align: center;">Management</th>
                        </tr>
                    </thead>
                    <tbody>
                                <?php $i =1 ;?>
                            @foreach ($sql as $sqls)
                                <tr>
                                    <td style="text-align: center;">{{$i}}</td>
                                    <td style="text-align: center;">{{$sqls->product_code}}</td>
                                    <td style="text-align: center;">{{$sqls->customer_name}}{{$sqls->customer_lname}}</td>
                                    <td style="text-align: center;">{{$sqls->price}}</td>
                                    <td style="text-align: center;">{{$sqls->amount}}</td>
                                    <td style="text-align: center;">รอขนส่งและ payment gateway</td>
                                </tr>
                                <?php $i ++ ;?>
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
