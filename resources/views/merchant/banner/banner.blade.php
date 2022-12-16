@extends('merchant.layouts.master')
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
    .swal2-cancel {
        margin-right: 30px;
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
                <i class="icofont icofont-cubes"></i>
            </div>
            <div class="d-inline-block">
                <h5>แบนเนอร์</h5>
                <small>ขนาดรูปภาพแบนเนอร์: 390X150 px </small>
                <span>สถานะ: <label class="label label-primary">ร้านค้า</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="{{url('merchant/product')}}">สินค้า</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        @if($banner->count() <2)
            <div class="icon-btn">
                <button class="btn btn-success btn-outline-success btn-round" data-toggle="modal"
                    data-target="#modal-add-banner"><i class="icofont icofont-ui-add"></i>
                    เพิ่มแบนเนอร์</button>
            </div>
        @endif
    </div>
    <div class="card-block">
        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="example1" class="table example1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">รูปภาพ</th>
                            <th style="text-align: center;">ตำแหน่ง</th>
                            
                            <th style="text-align: center;">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $key => $item)
                        <tr>
                            <td class="text-center text-middle">{{$key+1}}</td>
                            <td class="text-center text-middle">
                                <img src="{{asset('storage/app/banner_store/'.$item->banner_promote_img.'')}}" class="img-fluid" width="100" height="100">
                            </td>
                            <td class="text-center text-middle">{{$item->index_of}}</td>
                            
                            <td class="text-center text-middle">
                                <div class="dropdown-primary dropdown open">
                                    <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_product({{$item->id_banner_promote}})"><i class="fa fa-edit"></i> แก้ไข</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_product({{$item->id_banner_promote}})"><i class="icofont icofont-bin"></i> ลบ</a>
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

<div class="modal fade" id="modal-add-banner" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มหน้าปกสไลด์</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('merchant/addbanner')}}" method="POST" enctype="multipart/form-data" id="addbanner" onsubmit="return addbanner()">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">หน้าปก <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 357 x 205 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="img" style="display: none;" id="adddocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> เพิ่มหน้าปก</button> 
                                </div>
                            </div>
                            <center><br><img id="blah" src="#" alt="" width ="80%"></center>

                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label">ตำแหน่ง </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control col-sm-12" name="bannertype" required>
                                        <option value="">โปรดเลือก</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addbanner">ยืนยัน</button>
            </div>
        </div>
    </div>
</div>

<div id="result-modal"></div>
<div id="result-modalview"></div>
<form action="" method="post" id="delete_product">
    @csrf
    <input type="hidden" name="id" id="idbanner">
</form>
@endsection



@section('js')

    @include('flash-message')
    <script>
      
       
        adddocument.onchange = evt => {
            const [file] = adddocument.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
       
        function edit_product(id) {
            $.ajax({
                url: '{{ url('merchant/banneredit') }}/' + id ,
                type: 'GET',
              
            }).done(function (data) {
                $('#result-modal').html(data);
                $("#modal-edit-banner").modal('show');
            });
        }

        function del_product(id,a) {
            var urlaction = '{{url('merchant/bannerdelete')}}' + '/' + id;
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'คุณยืนยันการลบใช่หรือไม่?',
                text: "คุณไม่สามารถกู้คืนได้อีก",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $("#delete_product").attr('action', urlaction);
                    $("#delete_product").submit();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Banner has been Deleted',
                        'success'
                    )
                    
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Canceled',
                        'Banner has been Saved',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection
