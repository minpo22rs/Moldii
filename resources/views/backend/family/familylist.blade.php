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
            <button class="btn btn-success btn-outline-success btn-round" data-toggle="modal"
                data-target="#modal-add-news"><i class="icofont icofont-ui-add"></i>
                สร้างกลุ่ม</button>
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
         
                        <th style="text-align: center;">เผยเเพร่</th>
                        <th style="text-align: center;">สร้างเมื่อ</th>
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
                            <label class="switch">
                                <label class="switch">
                                    <input type="checkbox" name="published" class="published" value="{{ $item->id}}" {{ $item->published == 1 ? "checked" : "" }}>
                                    <span class="slider round"></span>
                                  </label>
                            </label>
                        </td>
                        <td class="text-center text-middle">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_content({{$item->id}})"><i class="fa fa-edit"></i> เเก้ไข</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_content({{$item->id}})"><i class="icofont icofont-bin"></i> ลบ</a>
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


<div class="modal fade" id="modal-add-news" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">สร้างกลุ่ม</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/addgroup')}}" method="POST" enctype="multipart/form-data" id="addnews" onsubmit="return news()">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพโปรไฟล์</label>
                     
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="img[]" style="display: none;" id="adddocument" required>
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> เพิ่มรูปภาพ</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รูปภาพหน้าปก</label>
                     
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="imgcover[]" style="display: none;" id="adddocuments" required>
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocuments').click();">
                                        <i class="icofont icofont-image"></i> เพิ่มรูปภาพ</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อกลุ่ม</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="ชื่อ..." name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label">ประเภทกลุ่ม</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control col-sm-12" name="type_group">
                                        <option value="">โปรดเลือก</option>
                                        <option value="1">กลุ่มสาธารณะ</option>
                                        <option value="2">กลุ่มส่วนตัว</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div> 
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">รายละเอียด</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="เขียนบางอย่าง..." required ></textarea>
                        </div>
                    </div>
                    {{-- <div class="form-group row">

                        <label class="col-sm-2 col-form-label">กลุ่มประเภท</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control col-sm-12" name="type_group">
                                        <option value="">โปรดเลือก</option>
                                        <option value="1">โมเดล</option>
                                        <option value="2">เกมส์</option>
                                        <option value="3">เพลง</option>
                                        <option value="4">อาหาร</option>
                                        <option value="5">ข่าวสาร</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div> --}}
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addnews">ยืนยัน</button>
            </div>
        </div>
    </div>
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

    $(document).ready(function () {
        $('.published').change(function () { 
            var id = $(this).val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'post',
                url: '{{ url('admin/publishedgroup') }}/' + id,
                data: {id: id},
                success: function (response) {
                    
                }
            });
        });
    });

    function edit_content(id) {
        $.ajax({
            url: '{{ url('admin/familys') }}/' + id + '/edit',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#editmodal").modal('show');
        });
    }


    function del_content(id) {
        var urlaction = '{{url('admin/familys')}}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Submit',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#delete_content").attr('action', urlaction);
                $("#delete_content").submit();
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Content has been Deleted',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Canceled',
                    'Content has been Saved',
                    'error'
                )
            }
        })
    };
</script>
@endsection
