@extends('backend.layouts.master')
@section('css')
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
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
    .modal-xl{max-width:1200px}
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
                <i class="icofont icofont-bullhorn"></i>
            </div>
            <div class="d-inline-block">
                <h5>สินค้าใหม่ & สินค้าขายดี</h5>
                <span>สถานะ: <label class="label label-primary">ผู้ดูเเลระดับ 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">หน้าเเรก</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">สินค้าใหม่ & สินค้าขายดี</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-block">
        <div class="col-12">
            <div class="dt-responsive table-responsive">
                <table id="productTable" class="table" width="100%">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">รูปภาพ</th>
                            <th style="text-align: center;">ชื่อ</th>
                            <th style="text-align: center;">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();

    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

    $(document).ready(function() {
        var table = $('#productTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('admin/searchproduct') }}',
            columns: [
                {data: 'product_id', name: 'product_id'},
                {data: 'img', name: 'img'},
                {data: 'product_name', name: 'product_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });

    $(document).on('click', '.select_item', function () {
        var item = $(this).attr('data-item');
        $.ajax({
            url: '{{ url('admin/updatebestseller') }}/' + item,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            },
            data: {item: item},
        }).done(function (data) {
            
        });
    })
</script>
@endsection
