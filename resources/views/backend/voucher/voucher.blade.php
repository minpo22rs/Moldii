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
                <i class="icofont icofont-ticket"></i>
            </div>
            <div class="d-inline-block">
                <h5>Voucher</h5>
                <span>Status: <label class="label label-primary">Admin Level 1</label></span>
            </div>
        </div>
        <div class="col">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item"><a href="">Voucher</a>
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
                data-target="#modal-voucher"><i class="icofont icofont-ui-add"></i>
                Create Voucher</button>
        </div>
    </div>
    <div class="card-block">
        <div class="col-sm-12">
            <div class="dt-responsive table-responsive">
                <table id="example1" class="table example1">
                    <thead>
                        <tr>
                            <th style="text-align: center;">#</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Value</th>
                            <th style="text-align: center;">Code</th>
                            <th style="text-align: center;">Can use for</th>
                            <th style="text-align: center;">Amount</th>
                            <th style="text-align: center;">Date</th>
                            <th style="text-align: center;">Management</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($voucher as $key => $item)
                        <tr>
                            <td class="text-center text-middle">{{$key+1}}</td>
                            <td class="text-middle text-center">{{$item->voucher_name}}</td>
                            <td class="text-center text-middle">{{$item->voucher_value}} {{$item->voucher_unit}}</td>
                            <td class="text-center text-middle">{{$item->voucher_code}}</td>
                            <td class="text-center text-middle">
                                @foreach (json_decode($item->voucher_use_for) as $value)
                                    {{$value}},<br>
                                @endforeach
                                {{-- {{$item->Voucher_decode($item->voucher_use_for)}} --}}
                            </td>
                            <td class="text-center text-middle">
                                {{$item->Count_Vused($item->voucher_code)}} / {{$item->voucher_amount}}
                            </td>
                            <td class="text-center text-middle">
                                @if (Carbon\Carbon::create($current)->between($item->voucher_start, $item->voucher_expire))
                                    <label class="label label-success m-b-20">Available</label>
                                @else
                                    @if ($current > $item->voucher_expire)
                                        <label class="label label-danger m-b-20">Expire</label>
                                    @else
                                        <label class="label label-primary m-b-20">Pedding</label>
                                    @endif
                                @endif
                                <br>
                                <span style="color: #4099ff">MFD.</span> : {{date('d/m/Y', strtotime($item->voucher_start))}}
                                <br>
                                <span style="color: #FF5370">EXP.</span> : {{date('d/m/Y', strtotime($item->voucher_expire))}}
                                <hr>
                                Create At. : {{date('d/m/Y', strtotime($item->created_at))}}
                            </td>
                            <td class="text-center text-middle">
                                <div class="dropdown-primary dropdown open">
                                    <button class="btn btn-outline-primary btn-round dropdown-toggle waves-effect waves-light " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">More</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" style="z-index: 999; position: static;">
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="his_voucher({{$item->voucher_id}})"><i class="icofont icofont-history"></i> History</a>
                                        <a href="#" class="dropdown-item waves-light waves-effect" data-toggle="modal" data-target="#edit-Modal" onclick="edit_voucher({{$item->voucher_id}})"><i class="fa fa-edit"></i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item waves-light waves-effect" onclick="del_voucher({{$item->voucher_id}})"><i class="icofont icofont-bin"></i> Delete</a>
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

<div class="modal fade" id="modal-voucher" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Voucher</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/voucher')}}" method="POST" enctype="multipart/form-data" id="addmerchant" >
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" name="name" class="form-control" placeholder="Name...">
                                    @error('name')<span class="messages text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Date <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" name="datestart" class="form-control datepicker" placeholder="Start At..." required autocomplete="off">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="dateend" class="form-control datepicker" placeholder="End At..." required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Can use for? <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row m-l-10">
                                <div class="border-checkbox-section">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="canuse[]" type="checkbox" id="discount" value="discount">
                                        <label class="border-checkbox-label" for="discount">Discount</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="canuse[]" type="checkbox" id="cashback" value="cashback">
                                        <label class="border-checkbox-label" for="cashback">Cash Back</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="canuse[]" type="checkbox" id="gift" value="gift">
                                        <label class="border-checkbox-label" for="gift">Gift Voucher</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="canuse[]" type="checkbox" id="access" value="access">
                                        <label class="border-checkbox-label" for="access">Access</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="canuse[]" type="checkbox" id="reward" value="reward">
                                        <label class="border-checkbox-label" for="reward">Reward</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" name="canuse[]" type="checkbox" id="coupons" value="coupons">
                                        <label class="border-checkbox-label" for="coupons">Coupons</label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-danger">
                                        <input class="border-checkbox" name="canuse[]" type="checkbox" id="all" value="all">
                                        <label class="border-checkbox-label" for="all">All</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Value <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="value" class="form-control" placeholder="Value" min="0" required autocomplete="off">
                                </div>
                                <div class="col-6">
                                    <div class="form-radio m-b-30">
                                        <div class="radio radiofill radio-primary radio-inline">
                                            <label>
                                                <input type="radio" name="unit" checked="checked" value="bath">
                                                <i class="helper"></i>Bath
                                            </label>
                                        </div>
                                        <div class="radio radiofill radio-primary radio-inline">
                                            <label>
                                                <input type="radio" name="unit" value="precision">
                                                <i class="helper"></i>%
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Partner</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Merchants...">
                                <span class="input-group-addon" id="basic-addon3"><i class="icofont icofont-search-alt-1"></i></span>
                            </div>
                            <label class="label label-primary label-lg">ร้านเสื้อผ้า (D2)
                                <i class="icofont icofont-close pointer"></i>
                            </label>
                            <label class="label label-primary label-lg">ร้านขายเกมส์ (G7)
                                <i class="icofont icofont-close pointer"></i>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Condition</label>
                        <div class="col-sm-10">
                            <div class="form-radio m-b-30">
                                <div class="radio radiofill radio-primary radio-inline">
                                    <label>
                                        <input type="radio" name="condition" checked="checked">
                                        <i class="helper"></i>Maximum Discount
                                    </label>
                                </div>
                                <div class="radio radiofill radio-primary radio-inline">
                                    <label>
                                        <input type="radio" name="condition">
                                        <i class="helper"></i>Only User
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Note</label>
                        <div class="col-sm-10">
                            <textarea name="note" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Amount <span class="text-danger">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" name="amount" class="form-control" placeholder="Amount..." min="0" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">
                            <span class="mytooltip tooltip-effect-1">
                                <span class="tooltip-item2">Announcer</span>
                                <span class="tooltip-content4 clearfix">
                                    <span class="tooltip-text2">
                                        This condition will sending a notification to customers
                                    </span>
                                </span>
                            </span>
                        </label>
                        <div class="col-sm-10">
                            <div class="border-checkbox-section m-l-10">
                                <div class="border-checkbox-group border-checkbox-group-warning">
                                    <input class="border-checkbox" type="checkbox" id="announcer" value="announcer">
                                    <label class="border-checkbox-label" for="announcer"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="addmerchant">Generate</button>
            </div>
        </div>
    </div>
</div>

<div id="result-modalhis"></div>
@endsection
@section('js')
@include('flash-message')
<script>
    $(".example1").DataTable();
    
    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

    $("#all").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    function his_voucher(id) {
        $.ajax({
            url: '{{ url('admin/voucher') }}/' + id,
            type: 'GET',
            data: {id: id},
        }).done(function (data) {
            $('#result-modalhis').html(data);
            $("#hismodal").modal('show');
        });
    }
</script>
@endsection
