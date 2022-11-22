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
    .swal2-cancel {
        margin-right: 30px;
    }
    .modal-xl{
        max-width:1200px;
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
                <i class="icofont icofont-ui-note"></i>
            </div>
            <div class="d-inline-block">
                <h5>กลุ่ม</h5>
                <span>สถานะ: <label class="label label-primary">ผู้ดูเเลระดับ 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">หน้าเเรก</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">กลุ่ม</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="icon-btn">
            
        </div>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="" class="table example1" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">ชื่อกลุ่ม</th>
                        <th style="text-align: center;">รายละเอียด</th>
         
                        <th style="text-align: center;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Family as $key => $item)
                    <tr>
                        <td class="text-center text-middle">{{$key+1}}</td>
                        
                        <td class="text-center text-middle">{{ $item->name }}</td>
                        <td class="text-center text-middle">{{ $item->description }}</td>
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                {{-- <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="#" class="dropdown-item waves-light waves-effect" ><i class="icofont icofont-check-alt" style="color: green"></i>อนุมัติ</a>
                                    <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="view_comment({{$item->id_shutdown}})"><i class="icofont icofont-close" style="color: red"></i>ไม่อนุมัติ</a>
                                </div> --}}
                                
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="javascript:"
                                    onclick="Swal.fire({
                                    title: 'ยืนยันการเปิดกลุ่มนี้ใช่หรือไม่',
                                    showDenyButton: true,
                                    showCancelButton: true,
                                    confirmButtonColor: '#377dff',
                                    cancelButtonColor: '#363636',
                                    confirmButtonText: `ยืนยัน`,
                                    denyButtonText: `ยกเลิก`,
                                    }).then((result) => {
                                        if (result.value) {
                                            location.href='{{url('admin/confirmopengroup',$item->id)}}';
                                        } else{
                                            Swal.fire('Canceled', '', 'info')
                                        }
                                    })" class="dropdown-item waves-light waves-effect" ><i class="icofont icofont-check-alt" style="color: green"></i> อนุมัติ</a>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="shut({{$item->id}})"><i class="icofont icofont-close" style="color: red"></i>ไม่อนุมัติ</a>

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



<div class="modal" tabindex="-1" role="dialog" id="reject">
    <form action="{{url('admin/rejectopengroup')}}" method="POST">
        @csrf

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">เหตุผลที่ไม่อนุมัติการเปิดกลุ่ม</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                    เหตุผล : <textarea rows="5" class="form-control" name="reply" required></textarea>
                    <input type="hidden" id="ids" name="ids">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </div>
    </form>

</div>

<div id="result-modal"></div>
<div id="result-modalview"></div>
<form action="" method="post" id="delete_content">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();

    function shut(id) {
        document.getElementById('ids').value = id;
        $('#reject').modal('show');
    }
</script>
@endsection
