@extends('backend.layouts.master')
@section('css')
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-bell-alt"></i>
            </div>
            <div class="d-inline-block">
                <h5>Notification</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Notification</a>
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
                data-target="#modal-add-notification"><i class="icofont icofont-ui-add"></i>
                Create Notification</button>
        </div>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="" class="table" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Date</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Detail</th>
                        <th style="text-align: center;">Author</th>
                        <th style="text-align: center;">Management</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noti as $key => $item)
                    <tr>
                        <td class="text-center text-middle">{{$key+1}}</td>
                            <td class="text-center text-middle">{{date('d/m/Y', strtotime($item->noti_date))}} </td>
                            <td class="text-center text-middle">{{$item->noti_title}}</td>
                            <td>{!! Str::limit($item->noti_detail, 150) !!}</td>
                            <td class="text-center text-middle">
                                {{ $item->noti_create_by != "" ? $item->NotigetAuthor->employee_name." ".$item->NotigetAuthor->employee_lname : "No Record" }}
                            </td>
                            <td class="text-center text-middle">
                                <div class="dropdown-primary dropdown open">
                                    <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">More</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                        <a href="#" class="dropdown-item waves-light waves-effect" 
                                            data-toggle="modal" data-target="#edit-Modal" onclick="edit_noti({{$item->noti_id}})"><i class="fa fa-edit"></i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item waves-light waves-effect" 
                                            onclick="del_noti({{$item->noti_id}})"><i class="icofont icofont-bin"></i> Delete</a>
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

<div class="modal fade" id="modal-add-notification" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Flash Sale</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/notification')}}" method="POST" enctype="multipart/form-data" id="addnotification" onsubmit="return addproduct()">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="title" class="form-control" placeholder="Title...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="date" class="form-control datepicker" placeholder="Date..." autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Detail <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="detail" id="summernote" class="form-control summernote" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addnotification">Submit</button>
            </div>
        </div>
    </div>
</div>

<div id="result-modal"></div>

<form action="" method="post" id="delete_noti">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('js')
@include('flash-message')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(".example1").DataTable();

    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
    
    $(document).ready(function() {
        $('.summernote').summernote();
    });

    function edit_noti(id) {
        $.ajax({
            url: '{{ url('admin/notification') }}/' + id + '/edit',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#editmodal").modal('show');
        });
    }

    function del_noti(id) {
        var urlaction = '{{url('admin/notification')}}' + '/' + id;
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
                $("#delete_noti").attr('action', urlaction);
                $("#delete_noti").submit();
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
