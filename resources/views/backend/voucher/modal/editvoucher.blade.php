<div class="modal fade" id="editmodalvoucher" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Voucher </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('admin/voucher', $voucher->voucher_id)}}" method="POST" enctype="multipart/form-data" id="edit_voucher">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-12">
                                        <input type="text" name="name" class="form-control" placeholder="Name..." value="{{$voucher->voucher_name}}">
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
                                                <input type="text" name="datestart" class="form-control datepicker" placeholder="Start At..." required autocomplete="off" value="{{date('d/m/Y', strtotime($voucher->voucher_start))}}">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="dateend" class="form-control datepicker" placeholder="End At..." required autocomplete="off" value="{{date('d/m/Y', strtotime($voucher->voucher_expire))}}">
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
                                            <input class="border-checkbox" name="canuse[]" type="checkbox" id="discount" value="discount" {{in_array('discount', $voucher->Voucher_decode_canuse($voucher->voucher_use_for)) ? 'checked' : ''}}>
                                            <label class="border-checkbox-label" for="discount">Discount</label>
                                        </div>
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input class="border-checkbox" name="canuse[]" type="checkbox" id="cashback" value="cashback" {{in_array('cashback', $voucher->Voucher_decode_canuse($voucher->voucher_use_for)) ? 'checked' : ''}}>
                                            <label class="border-checkbox-label" for="cashback">Cash Back</label>
                                        </div>
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input class="border-checkbox" name="canuse[]" type="checkbox" id="gift" value="gift" {{in_array('gift', $voucher->Voucher_decode_canuse($voucher->voucher_use_for)) ? 'checked' : ''}}>
                                            <label class="border-checkbox-label" for="gift">Gift Voucher</label>
                                        </div>
                                        {{-- <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input class="border-checkbox" name="canuse[]" type="checkbox" id="access" value="access" {{in_array('access', $voucher->Voucher_decode_canuse($voucher->voucher_use_for)) ? 'checked' : ''}}>
                                            <label class="border-checkbox-label" for="access">Access</label>
                                        </div>
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input class="border-checkbox" name="canuse[]" type="checkbox" id="reward" value="reward" {{in_array('reward', $voucher->Voucher_decode_canuse($voucher->voucher_use_for)) ? 'checked' : ''}}>
                                            <label class="border-checkbox-label" for="reward">Reward</label>
                                        </div>
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input class="border-checkbox" name="canuse[]" type="checkbox" id="coupons" value="coupons" {{in_array('coupons', $voucher->Voucher_decode_canuse($voucher->voucher_use_for)) ? 'checked' : ''}}>
                                            <label class="border-checkbox-label" for="coupons">Coupons</label>
                                        </div>
                                        <div class="border-checkbox-group border-checkbox-group-danger">
                                            <input class="border-checkbox" name="canuse[]" type="checkbox" id="all" value="all" {{in_array('all', $voucher->Voucher_decode_canuse($voucher->voucher_use_for)) ? 'checked' : ''}}>
                                            <label class="border-checkbox-label" for="all">All</label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Value <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="number" name="value" class="form-control" placeholder="Value" min="0" required autocomplete="off" value="{{$voucher->voucher_value}}">
                                    </div>
                                    <div class="col-6">
                                        <div class="form-radio m-b-30">
                                            <div class="radio radiofill radio-primary radio-inline">
                                                <label>
                                                    <input type="radio" name="unit" checked="checked" value="bath" {{$voucher->voucher_unit == 'bath' ? 'checked' : ''}}>
                                                    <i class="helper"></i>Bath
                                                </label>
                                            </div>
                                            <div class="radio radiofill radio-primary radio-inline">
                                                <label>
                                                    <input type="radio" name="unit" value="precision" {{$voucher->voucher_unit == 'precision' ? 'checked' : ''}}>
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
                                <select class="js-example-basic-multiple col-sm-12" name="partner[]" multiple="multiple">
                                    @foreach ($merchant as $item)
                                    <option value="{{$item->merchant_id}}" {{$voucher->partner_selected($voucher->voucher_partner) == $item->merchant_id ? 'selected' : ''}}>{{$item->merchant_name}} {{$item->merchant_lname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
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
                        </div> --}}
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
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light" form="edit_voucher">Submit</button>
            </div>
        </div>
    </div>
</div>

<script>
    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>