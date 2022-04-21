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
                <h5>Product</h5>
                <span>Status: <label class="label label-primary">Merchant</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="{{url('merchant/product')}}">Product</a>
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
                data-target="#modal-add-product"><i class="icofont icofont-ui-add"></i>
                Add Product</button>
        </div>
    </div>
    <div class="card-block">
        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="example1" class="table example1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">image</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Description</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Amount</th>
                            <th style="text-align: center;">Management</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $item)
                        <tr>
                            <td class="text-center text-middle">{{$key+1}}</td>
                            <td class="text-center text-middle">
                                <img src="{{asset('storage/app/product_cover/'.$item->product_img.'')}}" class="img-fluid" width="100" height="100">
                            </td>
                            <td class="text-center text-middle">{{$item->product_name}}</td>
                            <td>{{ Str::limit($item->product_description, 50) }}</td>
                            <td class="text-center text-middle">{{$item->product_price}} ฿</td>
                            <td class="text-center text-middle">{{$item->product_amount}}</td>
                            <td class="text-center text-middle">
                                <div class="dropdown-primary dropdown open">
                                    <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">More</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="view_comment({{$item->product_id}})"><i class="icofont icofont-speech-comments"></i> View Comment</a>
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_product({{$item->product_id}})"><i class="fa fa-edit"></i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_product({{$item->product_id}})"><i class="icofont icofont-bin"></i> Delete</a>
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
                <h4 class="modal-title">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('merchant/product')}}" method="POST" enctype="multipart/form-data" id="addproduct" onsubmit="return addproduct()">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">Cover <span class="text-danger">*</span></span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        Image Size: 357 x 357 px.
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" name="cover[]" style="display: none;" id="adddocument" required>
                                    <button type="button" class="btn btn-success btn-outline-success btn-round" onclick="document.getElementById('adddocument').click();">
                                        <i class="icofont icofont-image"></i> Add Cover</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control" placeholder="Name..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Description..." required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <select class="form-control" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($category as $cats)
                                            <option value="{{$cats->cat_id}}">{{$cats->cat_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Options</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-button">
                                        <input type="text" class="form-control" placeholder="Options Name..." id="option">
                                        <span class="input-group-addon btn btn-primary" id="addoption">
                                            <span class="">Add</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-control">
                                        <div id="resultappend_option"></div>
                                        <div id="resultinput_option"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Amount</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="number" name="amount" class="form-control" placeholder="Amount" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Value</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #2ed8b6;">Price</label>
                                </div>
                                <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #FF5370;">GPoint</label>
                                </div>
                                <div class="col-4">
                                    <label class="col-sm-2 col-form-label" style="color: #FFB64D;">Discount</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <input type="number" name="price" class="form-control form-control-success" placeholder="Price..." required>
                                </div>
                                <div class="col-4">
                                    <input type="number" name="gpoint" class="form-control form-control-danger" placeholder="GPoint..." required>
                                </div>
                                <div class="col-4">
                                    <input type="number" name="discount" class="form-control form-control-warning" placeholder="(optional)...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            Shipping cost</label>
                        <div class="col-sm-10">
                            <div class="row">
                                @foreach($s as $sc)
                                    <div class="col-4">
                                        <label class="col-sm-2 col-form-label">{{$sc->name_company}}</label>
                                    </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                @foreach($s as $sc)
                                    <div class="col-4">
                                        <input type="number" name="ship[{{$sc->id_shipping_company}}][]" class="form-control" placeholder="{{$sc->name_company}}..." required>
                                    </div>
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-button">
                                        <input type="text" class="form-control" placeholder="Tag Name..." id="tag">
                                        <span class="input-group-addon btn btn-primary" id="addtags">
                                            <span class="">Add</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-control">
                                        <div id="resultappend"></div>
                                        <div id="resultinput_tag"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image Gallery</label>
                        <div class="col-sm-7">
                            <input type="file" name="files[]" id="filer_input" multiple="multiple" required>
                        </div>                
                    </div>
                   
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addproduct">Submit</button>
            </div>
        </div>
    </div>
</div>

<div id="result-modal"></div>
<div id="result-modalview"></div>
<form action="" method="post" id="delete_product">
    @csrf
    {{ method_field('delete') }}
</form>
@endsection
@section('js')


@include('flash-message')
<script>
    var count_option = 1;
    $('#addoption').click(function () { 
        var optionname = $('#option').val();
        if (optionname != '') {
            $("#resultappend_option").append('<label class="label label-primary label-lg" id="option_'+count_option+'" data-numoption="'+count_option+'">'+
            ''+optionname+' <i class="icofont icofont-close pointer" onclick="del_option('+count_option+')"></i></label>'+
            '<input type="hidden" name="option[]" id="inputoption_'+count_option+'" value="'+optionname+'">')
            count_option++;
            optionname = $('#option').val('');
        }
    });

    function del_option(option_num) {
        $('#option_'+option_num).fadeOut();
        $('#inputoption_'+option_num).remove();
        count_option--;
    }

    var count_tag = 1;
    $('#addtags').click(function () { 
        if (count_tag <= 3) {
            var tagname = $('#tag').val();
            if (tagname != '') {
                $("#resultappend").append('<label class="label label-primary label-lg" id="tag_'+count_tag+'" data-numtag="'+count_tag+'">'+
                ''+tagname+' <i class="icofont icofont-close pointer" onclick="del_tag('+count_tag+')"></i></label>'+
                '<input type="hidden" name="tag[]" id="inputtag_'+count_tag+'" value="'+tagname+'">')
                count_tag++;
                tagname = $('#tag').val('');
            }
        }
    });

    function del_tag(tag_num) {
        $('#tag_'+tag_num).fadeOut();
        $('#inputtag_'+tag_num).remove();
        count_tag--;
    }
    
    function edit_product(id) {
        $.ajax({
            url: '{{ url('merchant/product') }}/' + id + '/edit',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modal').html(data);
            $("#editmodal").modal('show');
        });
    }

    function view_comment(id) {
        $.ajax({
            url: '{{ url('merchant/view_comment') }}/' + id + '/P',
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modalview').html(data);
            $("#viewmodal").modal('show');
        });
    }

    function del_product(id) {
        var urlaction = '{{url('merchant/product')}}' + '/' + id;
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
                $("#delete_product").attr('action', urlaction);
                $("#delete_product").submit();
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
