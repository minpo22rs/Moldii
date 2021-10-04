@extends('backend.layouts.master')
@section('css')
<style>
    .swal2-cancel {
        margin-right: 30px;
    }
</style>
@endsection
@section('content')
<div class="card page-header p-0">
    <div class="card-block front-icon-breadcrumb row align-items-end">
        <div class="breadcrumb-header col">
            <div class="big-icon">
                <i class="icofont icofont-users"></i>
            </div>
            <div class="d-inline-block">
                <h5>Merchant</h5>
                <span>Status: <label class="label label-primary">Merchant Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Account</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Merchant</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-warning border-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="icofont icofont-close-line-circled"></i>
    </button>
    <strong>คำเตือน!</strong> กรุณากรอกข้อมูลให้ครบ
</div>
<div class="row">
    @foreach ($errors->all() as $message)
    <div class="col-sm-3">
        <div class="alert alert-danger border-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icofont icofont-close-line-circled"></i>
            </button>
            <strong>คำเตือน!</strong> {{ $message }}
        </div>
    </div>
    @endforeach
</div>
@endif
<div class="card">
    <div class="card-header">
        <div class="icon-btn">
            <button class="btn btn-success btn-outline-success btn-round" data-toggle="modal"
                data-target="#modal-add-product"><i class="icofont icofont-ui-add"></i>
                Create Merchant</button>
        </div>
    </div>
    <div class="card-block">
        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="example1" class="table example1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Image</th>
                            <th style="text-align: center;">Email</th>
                            <th style="text-align: center;">Name</th>

                            <th style="text-align: center;">Management</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($merchant as $key => $item)
                        <tr>
                            <td class="text-center text-middle">{{$key+1}}</td>
                            <td class="text-middle text-center">
                                <div class="img-round">
                                    <img src="{{asset('storage/app/merchant/'.$item->merchant_img.'')}}" alt="" class="img-fluid"> 
                                </div>
                            </td>
                            <td class="text-middle">
                                {{$item->merchant_email}}
                            </td>
                            <td class="text-center text-middle">{{$item->merchant_name}} {{$item->merchant_lname}}</td>
                            <td class="text-center text-middle">
                                <div class="dropdown-primary dropdown open">
                                    <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">More</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_merchant({{$item->merchant_id}})"><i class="fa fa-edit"></i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_merchant({{$item->merchant_id}})"><i class="icofont icofont-bin"></i> Delete</a>
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

<div class="modal fade" id="modal-add-product" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Merchant</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/merchant')}}" method="POST" enctype="multipart/form-data" id="addmerchant" >
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="img[]" style="display: none;" id="adddocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> Upload</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="First Name...">
                                    @error('name')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-6">
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name...">
                                    @error('lname')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="email" class="form-control" placeholder="Email...">
                                    @error('email')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password...">
                                    @error('password')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addmerchant">Submit</button>
            </div>
        </div>
    </div>
</div>

<div id="result-modal"></div>

<form action="" method="post" id="delete_merchant">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();

    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

    function edit_merchant(id) {
        $.ajax({
            url: '{{ url('admin/merchant') }}/' + id + '/edit',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#editmodal").modal('show');
        });
    }

    function del_merchant(id) {
        var urlaction = '{{url('admin/merchant')}}' + '/' + id;
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
                $("#delete_merchant").attr('action', urlaction);
                $("#delete_merchant").submit();
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
