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

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: -1px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        background-color: #FF5370;
        -webkit-transition: .4s;
        transition: .4s;
        /* border: 1px solid #dfdfdf; */
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        box-shadow: 0 1px 3px rgb(0 0 0 / 40%);
    }

    .published:checked+.slider {
        background-color: #4099ff;
    }

    .published:focus+.slider {
        box-shadow: 0 0 1px #4099ff;
    }

    .published:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
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
                <h5>Contents</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Contents</a>
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
                Create Content</button>
        </div>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="" class="table example1" width="100%">
                <thead>
                    <tr>
                        <th style="text-align: center;">#</th>
                        <th style="text-align: center;">Image</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Action</th>
                        <th style="text-align: center;">Published</th>
                        <th style="text-align: center;">Create At</th>
                        <th style="text-align: center;">Management</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($new as $key => $item)
                    <tr>
                        <td class="text-center text-middle">{{$key+1}}</td>
                        <td class="text-center text-middle">
                            <img src="{{asset('storage/app/news/'.$item->new_img.'')}}" class="img-fluid" width="250" height="390">
                        </td>
                        <td class="text-center text-middle">{{ $item->new_title }}</td>
                        <td class="text-center text-middle">
                            <div class="col-12">
                                <i class="icofont icofont-thumbs-up" style="font-size: 22px; color: #4099ff;"></i> : {{$item->count_like('C')}}
                            </div>
                            <hr>
                            <div class="col-12">
                                <i class="icofont icofont-thumbs-down" style="font-size: 22px; color: #FF5370;"></i> : {{$item->count_dislike('C')}}
                            </div>
                            <hr>
                            <div class="col-12">
                                <i class="icofont icofont-eye" style="font-size: 22px; color: #2ed8b6;"></i> : {{$item->new_numberformat($item->viewer)}}
                            </div>
                            <hr>
                            <div class="col-12">
                                <i class="icofont icofont-star" style="font-size: 22px; color: #ffc107;"></i> : {{$item->rating('C')}}
                            </div>
                        </td>
                        <td class="text-center text-middle">
                            <label class="switch">
                                <label class="switch">
                                    <input type="checkbox" name="published" class="published" value="{{ $item->new_id}}" {{ $item->new_published == 1 ? "checked" : "" }}>
                                    <span class="slider round"></span>
                                  </label>
                            </label>
                        </td>
                        <td class="text-center text-middle">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                        <td class="text-center text-middle">
                            <div class="dropdown-primary dropdown open">
                                <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">More</button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                    <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="view_comment({{$item->new_id}})"><i class="icofont icofont-comment"></i> View Comment</a>
                                    <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_content({{$item->new_id}})"><i class="fa fa-edit"></i> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_content({{$item->new_id}})"><i class="icofont icofont-bin"></i> Delete</a>
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

{{-- <div class="row">
    @foreach ($new as $key => $item)
    <div class="col-sm-6">
        <div class="card">
            <div class="card-block">
                <img class="img-fluid" src="{{asset('storage/app/news/'.$item->new_img.'')}}" alt="" width="712" height="390">
            </div>
            <div class="top-cap-text m-10 text-center">
                <button type="button" class="btn btn-warning btn-outline-warning btn-round"  data-toggle="modal" data-target="#edit-Modal" onclick="edit_news({{$item->new_id}})">
                    <i class="icofont icofont-image"></i> Select Image </button> 
            </div>
        </div>
    </div>
    @endforeach
</div> --}}

<div class="modal fade" id="modal-add-news" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Content</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/news')}}" method="POST" enctype="multipart/form-data" id="addnews" onsubmit="return news()">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">Image <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        Image Size: 712 x 390 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="img[]" style="display: none;" id="adddocument">
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> Add Promotion</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Title..." name="title" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Write Something..."></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addnews">Submit</button>
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
                url: '{{ url('admin/published') }}/' + id,
                data: {id: id},
                success: function (response) {
                    
                }
            });
        });
    });

    function edit_content(id) {
        $.ajax({
            url: '{{ url('admin/news') }}/' + id + '/edit',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#editmodal").modal('show');
        });
    }

    function view_comment(id) {
        $.ajax({
            url: '{{ url('admin/view_comment') }}/' + id + '/C',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modalview').html(data);
            $("#viewmodal").modal('show');
        });
    }

    function del_content(id) {
        var urlaction = '{{url('admin/news')}}' + '/' + id;
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
