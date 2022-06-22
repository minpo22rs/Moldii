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
    .swal2-cancel {
        margin-right: 30px;
    }
    .modal-xl{max-width:1200px}
    @media only screen and (max-width: 480px) {
        .mytooltip .tooltip-content4 {
            margin: 0 0 10px -50px !important;
        }
    }

    @media (max-width: 768px) {
        .carousel-inner .carousel-item > div {
            display: none;
        }
        .carousel-inner .carousel-item > div:first-child {
            display: block;
        }
    }
    
    .carousel-inner .carousel-item.active,
    .carousel-inner .carousel-item-next,
    .carousel-inner .carousel-item-prev {
        display: flex;
    }

    /* display 3 */
    @media (min-width: 768px) {
        .carousel-inner .carousel-item-right.active,
        .carousel-inner .carousel-item-next {
          transform: translateX(33.333%);
        }

        .carousel-inner .carousel-item-left.active, 
        .carousel-inner .carousel-item-prev {
          transform: translateX(-33.333%);
        }
    }

    .carousel-inner .carousel-item-right,
    .carousel-inner .carousel-item-left{ 
      transform: translateX(0);
    }
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-flash"></i>
            </div>
            <div class="d-inline-block">
                <h5>Flash Sale</h5>
                <span>สถานะ: <label class="label label-primary">ผู้ดูเเลระดับ 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Flash Sale</a>
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
                data-target="#modal-add-flashsale"><i class="icofont icofont-ui-add"></i>
                สร้าง Flash Sale</button>
        </div>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="" class="table example1" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">รูปภาพ</th>
                        <th style="text-align: center;">ชื่อ</th>
                        <th style="text-align: center;">ข้อมูล</th>
                        <th style="text-align: center;">การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fs as $key => $item)
                    <tr>
                        <td class="text-center text-middle">{{$key+1}}</td>
                        <td class="text-center text-middle">
                            <img src="{{asset('storage/app/flashsale/'.$item->fs_img.'')}}" class="img-fluid" width="250" height="390">
                        </td>
                        <td class="text-center text-middle">{{$item->fs_name}}</td>
                        <td class="text-center text-middle">{{date('d/m/Y', strtotime($item->fs_datestart))}} - {{date('d/m/Y', strtotime($item->fs_dateend))}}</td>
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">เพิ่มเติม</button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="view_fs({{$item->fs_id}})"><i class="icofont icofont-page"></i> ดูรายละเอียด</a>
                                    <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_fs({{$item->fs_id}})"><i class="fa fa-edit"></i> แก้ไข</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_fs({{$item->fs_id}})"><i class="icofont icofont-bin"></i> ลบ</a>
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

<div class="modal fade" id="modal-add-flashsale" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">สร้าง Flash Sale</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/flashsale')}}" method="POST" enctype="multipart/form-data" id="addflashsale" onsubmit="return addproduct()">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="type" value="FS">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">รูปภาพ <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        รูปภาพขนาด: 357 x 205 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="file" name="img[]" style="display: none;" id="adddocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> เพิ่มรูปภาพ</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ชื่อ <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control" placeholder="ชื่อ..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">การลงทะเบียน <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        วันลงทะเบียนสำหรับผู้ค้าก่อนเริ่มดีล.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" name="regis_datestart" class="form-control datepicker" placeholder="เริ่มวันที่..." required autocomplete="off">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="regis_dateend" class="form-control datepicker" placeholder="สิ้นสุดวันที่..." required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">เนื้อหา </label>
                        <div class="col-sm-10">
                            <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">เรื่มวันที่ <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                       ดีลนี้จะเริ่มวันที่.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="datestart" class="form-control datepicker" placeholder="เริ่มวันที่..." autocomplete="off" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="dateend" class="form-control datepicker" placeholder="สิ้นสุดวันที่..." autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ส่วนลดสูงสุด <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="maxsale" class="form-control" min="0" max="100" placeholder="ต่ำสุด = 0%, สูงสุง = 100%" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-12">
                            <div class="dt-responsive table-responsive">
                                <table id="productTable" class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">#</th>
                                            <th style="text-align: center;">รูปภาพ</th>
                                            <th style="text-align: center;">ชื่อผู้ค้า</th>
                                            <th style="text-align: center;">การกระทำ</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addflashsale">แก้ไข</button>
            </div>
        </div>
    </div>
</div>


<div id="result-modal"></div>
<div id="result-modalviewcontent"></div>
<div id="result-modaleditfs"></div>

<form action="" method="post" id="delete_flashsale">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();

    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

    // $('.itemName').select2({
    //     placeholder: 'Select an item',
    //     ajax: {
    //         url: '{{ url('backoffice/selectproduct') }}',
    //         dataType: 'json',
    //         delay: 250,
    //         processResults: function (data) {
    //             return {
    //                 results:  $.map(data, function (item) {
    //                     return {
    //                         text: item.name,
    //                         id: item.id
    //                     }
    //                 })
    //             };
    //         },
    //         cache: true
    //     }
    // });

    function search_product() {
        var product_id = $('.itemKey').val();
        $.ajax({
            url: '{{ url('admin/searchproduct') }}',
            type: 'GET',
            data: {product_id: product_id},
        }).done(function (data) {
            $('#result_search').html(data.html);
        });
    }

    $(document).on('click', '.ignore', function () {
        var id = $(this).attr('data-ignore');
        alert(id);
    })

    function view_fs(id) {
        $.ajax({
            url: '{{ url('admin/flashsale') }}/'+ id,
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modalviewcontent').html(data);
            $("#viewcontentmodal").modal('show');
        });
    }

    function edit_fs(id) {
        $.ajax({
            url: '{{ url('admin/flashsale') }}/'+ id+ '/edit',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modaleditfs').html(data);
            $("#modaleditfs").modal('show');
        });
    }

    $(document).on('click', '.status', function () {
        var id = $(this).val();
        if ($(this).is(":checked")) {
            
        } else {
            
        }
    })

    // $('#recipeCarousel').carousel({
    //     interval: 10000
    // });

    // $('.carousel .carousel-item').each(function(){
    //     var minPerSlide = 3;
    //     var next = $(this).next();
    //     if (!next.length) {
    //         next = $(this).siblings(':first');
    //     }
    //     next.children(':first-child').clone().appendTo($(this));
    //     for (var i=0;i<minPerSlide;i++) {
    //         next=next.next();
    //         if (!next.length) {
    //         	next = $(this).siblings(':first');
    //       	}
    //         next.children(':first-child').clone().appendTo($(this));
    //     }
    // });

    function del_fs(id) {
        var urlaction = '{{url('admin/flashsale')}}' + '/' + id;
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณไม่สามารถกู้คืนได้อีก",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#delete_flashsale").attr('action', urlaction);
                $("#delete_flashsale").submit();
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Product has been Deleted',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Canceled',
                    'Product has been Saved',
                    'error'
                )
            }
        })
    };
</script>
@endsection
